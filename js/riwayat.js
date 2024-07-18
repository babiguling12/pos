DataTable.type("num", "className", "");
const tabel = $("#tabelriwayat").DataTable({
  responsive: true,
  scrollX: true,
  ajax: { url: "../process/tabel/riwayat.php", dataSrc: "" },
  columnDefs: [{ searcable: false, orderable: false, targets: [0, 8] }],
  order: [[1, "desc"]],
  columns: [
    { data: "num" },
    { data: "tgl_transaksi" },
    { data: "nama_member" },
    { data: "kode_produk" },
    { data: "nama_produk" },
    { data: "jumlah_uang" },
    { data: "qty" },
    { data: "total_harga" },
    { data: "action" },
  ],
});

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
        data: { riwayat: id },
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
