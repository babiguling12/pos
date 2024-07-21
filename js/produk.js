DataTable.type("num", "className", "");
const tabel = $("#tabelproduk").DataTable({
  responsive: true,
  scrollX: true,
  ajax: { url: "../process/tabel/produk.php", dataSrc: "" },
  columnDefs: [{ searcable: false, orderable: false, targets: [0, 5] }],
  order: [[1, "asc"]],
  columns: [
    { data: "num" },
    { data: "kode_produk" },
    { data: "nama_produk" },
    { data: "satuan" },
    { data: "harga_jual" },
    { data: "action" },
  ],
});

function tambahData() {
  $.ajax({
    url: "../process/tambah.php",
    type: "post",
    dataType: "json",
    data: $("#formproduk").serialize(),
    success: () => {
      $(".modal").modal("hide"),
        Swal.fire("Sukses", "Sukses Menambahkan Data", "success");
      tabel.ajax.reload();
    },
    error: (response) => {
      console.log(response);
    },
  });
}

function editData() {
  $.ajax({
    url: "../process/edit.php",
    type: "post",
    dataType: "json",
    data: $("#formproduk").serialize(),
    success: () => {
      $(".modal").modal("hide"),
        Swal.fire("Sukses", "Sukses Mengubah Data", "success");
      tabel.ajax.reload();
    },
    error: (response) => {
      console.log(response);
    },
  });
}

function hapus(id) {
  Swal.fire({
    title: "Hapus",
    text: "Hapus data ini?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Hapus",
    cancelButtonText: "Batal",
  }).then((r) => {
    if (r.isConfirmed) {
      $.ajax({
        url: "../process/hapus.php",
        type: "post",
        dataType: "json",
        data: { produk: id },
        success: () => {
          Swal.fire("Sukses", "Sukses Menghapus Data", "success");
          tabel.ajax.reload();
        },
        error: (response) => {
          console.log(response);
        },
      });
    }
  });
}

$("#btntambah").click(function () {
  $(".modal-title").html("Tambah Data"),
    $('.modal button[type="submit"]').html("Tambah"),
    $("#kodeproduk").removeAttr("readonly")
  });

function edit(id) {
  $.ajax({
    url: "../process/get.php",
    type: "post",
    dataType: "json",
    data: { getProdukById: id },
    success: (response) => {
      $("#kodeproduk").val(response.kode_produk),
        $("#kodeproduk").attr("readonly", ""),
        $("#namaproduk").val(response.nama_produk),
        $("#satuan").val(response.satuan),
        $("#hargajual").val(response.harga_jual),
        $(".modal-title").html("Edit Data"),
        $('.modal-footer button[type="submit"]').html("Edit");
    },
    error: (response) => {
      console.log(response);
    },
  });
}

$("#formproduk").validate({
  rules: {
    kodeproduk: "required",
    namaproduk: "required",
    satuan: "required",
    hargajual: "required",
  },
  messages: {
    kodeproduk: "Kode Produk tidak boleh kosong.",
    namaproduk: "Nama produk tidak boleh kosong.",
    satuan: "Satuan tidak boleh kosong.",
    hargajual: "Harga Jual tidak boleh kosong.",
  },
  submitHandler: () => {
    $('.modal-footer button[type="submit"]').html() == "Edit"
      ? editData()
      : tambahData();
  },
});

$(".modal").on("hidden.bs.modal", () => {
  $("#formproduk")[0].reset(), $("#formproduk").validate().resetForm();
});

tabel
  .on("order.dt search.dt", function () {
    let i = 1;
    tabel
      .cells(null, 0, { search: "applied", order: "applied" })
      .every(function (cell) {
        this.data(i++);
      });
  })
  .draw();
