function editLaporan(id) {
    save_method = 'update';
    $('#kt_modal_add_laporan_form')[0].reset(); 
    $.ajax({
        url : base_url + 'dashboard/laporan/update/' + id,
        type: "GET",
        dataType: "JSON",
        success: function(respond)
        {
            $('[name="id"]').val(respond.data.id);
            $('[name="name"]').val(respond.data.name);
            $('[name="table"]').val(respond.data.table);
            $('[name="start_date"]').val(respond.data.start_date);
            $('[name="end_date"]').val(respond.data.end_date);
            $('#kt_modal_add_laporan').modal('show');
            $('.modal-title').text('Edit Laporan'); 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            Swal.fire({
                icon: 'error',
                title: textStatus,
                text: errorThrown,
            });
        }
    });
}

function saveLaporan() {
    var url;
    var id = $("#id").val();
    if(!id) {
        url = base_url + 'dashboard/laporan/list';
    } else {
        url = base_url + 'dashboard/laporan/update/' + id;
    }

    $.ajax({
        url : url,
        type: 'POST',
        data: $('#kt_modal_add_laporan_form').serialize(),
        dataType: "JSON",
        success: function(respond){
            Swal.fire({
                icon: respond.icon,
                title: respond.title,
                text: respond.text,
                timer: 3000,
                showCancelButton: false,
                showConfirmButton: false
            }).then (function() {
                location.reload();
            });
        },
        error: function (jqXHR, textStatus, errorThrown) {
            Swal.fire({
                icon: 'error',
                title: textStatus,
                text: errorThrown,
            });
        }
    });
}

function deleteLaporan(id) {
    Swal.fire({
        title: 'Anda yakin?',
        text: "Aksi ini tidak dapat dipulihkan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus!'
    }).then(function (result) {
        if (result.value) {
            $.ajax({
                url: base_url + 'dashboard/laporan/delete/' + id,
                type: "GET",
                dataType: 'JSON',
                success: function (respond) {
                    swal.fire({
                        position: 'top-end',
                        icon: respond.icon,
                        title: respond.text,
                        showConfirmButton: false,
                        timer: 2000
                    }).then (function() {
                        location.reload();
                    });
                },
                error: function (textStatus, jqXHR, errorThrown) {
                    Swal.fire({
                        icon: 'error',
                        title: textStatus,
                        text: errorThrown,
                    });
                }
            });
        };
    });
}

var modal = document.getElementById("kt_modal_add_laporan");
var closeBtn = document.getElementsByClassName("close")[0];

closeBtn.onclick = function() {
  modal.style.display = "none";
  location.reload();
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
    location.reload();
  }
}