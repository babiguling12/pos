DataTable.type("num", "className", "");
const tabel = $("#tabelpengguna").DataTable({
  responsive: true,
  scrollX: true,
  ajax: { url: "../process/tabel/pengguna.php", dataSrc: "" },
  columnDefs: [{ searcable: false, orderable: false, targets: [0, 4] }],
  order: [[1, "asc"]],
  columns: [
    { data: "num" },
    { data: "nama_pengguna" },
    { data: "jabatan" },
    { data: "nohp_pengguna" },
    { data: "action" },
  ],
});

function tambahData() {
  $.ajax({
    url: "../process/tambah.php",
    type: "post",
    dataType: "json",
    data: $("#formpengguna").serialize(),
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
    data: $("#formpengguna").serialize(),
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
        confirmButtonText: 'Hapus',
        cancelButtonText: 'Batal'
      }).then((r) => {
        if(r.isConfirmed) {
            $.ajax({
                url: '../process/hapus.php',
                type: 'post',
                dataType: 'json',
                data: { pengguna: id },
                success: () => {
                    Swal.fire("Sukses", "Sukses Menghapus Data", "success");
                    tabel.ajax.reload();
                },
                error: (response) => {
                    console.log(response);
                }
            })
        }
      })
}

$("#btntambah").click(function () {
  $(".modal-title").html("Tambah Data"),
    $('.modal button[type="submit"]').html("Tambah");
});

function edit(id) {
  $.ajax({
    url: "../process/get.php",
    type: "post",
    dataType: "json",
    data: { getPenggunaById: id },
    success: (response) => {
      $("#idpengguna").val(response.id_pengguna),
        $("#username").val(response.user_name),
        $("#password").val(''),
        $("#namapengguna").val(response.nama_pengguna),
        $("#jabatan").val(response.jabatan),
        $("#nohppengguna").val(response.nohp_pengguna),
        $(".modal-title").html("Edit Data"),
        $('.modal-footer button[type="submit"]').html("Edit");
    },
    error: (response) => {
      console.log(response);
    },
  });
}

$("#formpengguna").validate({
  rules: {
    username: "required",
    password: {
      required: true,
      minlength: 8,
      maxlength: 12,
    },
    namapengguna: "required",
    jabatan: "required",
    nohppengguna: "required",
  },
  messages: {
    username: "Username tidak boleh kosong.",
    password: {
      required: "Password tidak boleh kosong.",
      minlength: "Password harus memiliki panjang minimal 8 karakter dan maksimal 12 karakter.",
      maxlength: "Password harus memiliki panjang minimal 8 karakter dan maksimal 12 karakter.",
    },
    namapengguna: "Nama Pengguna tidak boleh kosong.",
    jabatan: "Jabatan tidak boleh kosong.",
    nohppengguna: "Nomor HP tidak boleh kosong.",
  },
  submitHandler: () => {
    $('.modal-footer button[type="submit"]').html() == "Edit"
      ? editData()
      : tambahData();
  },
});

$(".modal").on("hidden.bs.modal", () => {
  $("#formpengguna")[0].reset(), $("#formpengguna").validate().resetForm();
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
