let total = 0,
  tabel = $("#tabeltransaksi").DataTable({
    responsive: true,
    lengthChange: false,
    searching: false,
    scrollX: true,
    paging: false,
  });

function tambah() {
  $.ajax({
    url: "../process/get.php",
    type: "post",
    dataType: "json",
    data: { getProdukById: $('input[name="produk"]:checked').val() },
    success: (response) => {
      let barcode = response.kode_produk,
        namaproduk = response.nama_produk,
        harga = parseInt(response.harga_jual),
        jumlah = parseInt($("#jumlah").val());

      let a = tabel
        .rows()
        .indexes()
        .filter((a, t) => barcode === tabel.row(a).data()[0]);
      if (a.length > 0) {
        let row = tabel.row(a[0]),
          data = row.data();

        data[3] += jumlah;
        row.data(data).draw();
        $("#total").html((total += harga * jumlah));
        kembalian();
      } else {
        tabel.row
          .add([
            barcode,
            namaproduk,
            harga,
            jumlah,
            `<button name="${barcode}" class="btn btn-sm btn-danger" onclick="hapus('${barcode}')">Hapus</btn>`,
          ])
          .draw();
        $("#total").html((total += harga * jumlah));
        $("#jumlah").val("");
        $("#tambah").attr("disabled", "disabled");
        kembalian();
      }
    },
    error: (response) => {
      console.log(response);
    },
  });
}

function cekJumlah() {
  let produk = $('input[name="produk"]:checked').val(),
    jumlah = $("#jumlah").val();
  if (produk !== undefined && jumlah !== "" && parseInt(jumlah) >= 1) {
    $("#tambah").removeAttr("disabled");
  } else {
    $("#tambah").attr("disabled", "disabled");
  }
}

function hapus(kode) {
  let data = tabel.row($("[name=" + kode + "]").closest("tr")).data(),
    stok = data[3],
    harga = data[2];
  $("#total").html((total -= stok * harga));
  tabel
    .row($("[name=" + kode + "]").closest("tr"))
    .remove()
    .draw();
  kembalian();
}

function cekUang() {
  let jumlahuang = $("#jumlahuang").val();
  if (jumlahuang !== "" && jumlahuang >= total && total !== 0) {
    $("#bayar").removeAttr("disabled");
  } else {
    $("#bayar").attr("disabled", "disabled");
  }
}

function kembalian() {
  let jumlahuang = $("#jumlahuang").val();
  $("#kembalian").html(jumlahuang - total);
  cekUang();
}

function transaksi() {
  let data = tabel.rows().data(),
    qty = [],
    barcode = [];
  $.each(data, (index, value) => {
    qty.push(value[3]);
    barcode.push(value[0]);
  });
  $.ajax({
    url: "../process/tambah.php",
    type: "post",
    dataType: "json",
    data: {
      qty: qty,
      barcode: barcode,
      idpembeli: $("#pembeli").val(),
      jumlahuang: $("#jumlahuang").val(),
      total: total,
      transaksi: 'transaksi'
    },
    success: (response) => {
      Swal.fire({
        title: "Cetak?",
        text: "Ingin mencetak transaksi ini?",
        icon: "question",
        showDenyButton: true,
        confirmButtonText: "Cetak",
        denyButtonText: "Tidak",
        allowOutsideClick: false,
        allowEscapeKey: false
      }).then((r) => {
        if (r.isConfirmed) {
          Swal.fire("Sukses", "Sukses Membayar", "success").then(
            () => (window.location.href = `../public/print.php?id=${response}`)
          );
        } else if (r.isDenied) {
          Swal.fire("Sukses", "Sukses Membayar", "success").then(() =>
            window.location.reload()
          );
        }
      });
    },
    error: (response) => {
      console.log(response);
    },
  });
}
