DataTable.type("num", "className", "");
const tabel = $("#tabelpembeli").DataTable({
  responsive: true,
  scrollX: true,
  ajax: { url: "../process/tabel/pembeli.php", dataSrc: "" },
  columnDefs: [{ searcable: false, orderable: false, targets: [0, 5] }],
  order: [[1, "asc"]],
  columns: [
    { data: "num" },
    { data: "nama_member" },
    { data: "nik" },
    { data: "alamat" },
    { data: "nohp" },
    { data: "action" },
  ],
});

function tambahData() {
  $.ajax({
    url: "../process/tambah.php",
    type: "post",
    dataType: "json",
    data: $("#formpembeli").serialize(),
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
    data: $("#formpembeli").serialize(),
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
                data: { pembeli: id },
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
    data: { getPembeliById: id },
    success: (response) => {
      $("#idmember").val(response.id_member),
        $("#namamember").val(response.nama_member),
        $("#nik").val(response.nik),
        $("#alamat").val(response.alamat),
        $("#nohp").val(response.nohp),
        $(".modal-title").html("Edit Data"),
        $('.modal-footer button[type="submit"]').html("Edit");
    },
    error: (response) => {
      console.log(response);
    },
  });
}

$("#formpembeli").validate({
  rules: {
    namamember: "required",
    nik: {
      required: true,
      minlength: 16,
      maxlength: 16,
    },
    alamat: "required",
    nohp: "required",
  },
  messages: {
    namamember: "Nama tidak boleh kosong.",
    nik: {
      required: "NIK tidak boleh kosong.",
      minlength: "NIK harus memiliki panjang 16 angka.",
      maxlength: "NIK harus memiliki panjang 16 angka.",
    },
    alamat: "Alamat tidak boleh kosong.",
    nohp: "Nomor HP tidak boleh kosong.",
  },
  submitHandler: () => {
    $('.modal-footer button[type="submit"]').html() == "Edit"
      ? editData()
      : tambahData();
  },
});

$(".modal").on("hidden.bs.modal", () => {
  $("#formpembeli")[0].reset(), $("#formpembeli").validate().resetForm();
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
