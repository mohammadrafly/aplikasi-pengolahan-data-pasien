function editStok(id) {
    save_method = 'update';
    $('#kt_modal_add_stok_form')[0].reset(); 
    $.ajax({
        url : base_url + 'dashboard/stok/update/' + id,
        type: "GET",
        dataType: "JSON",
        success: function(respond)
        {
            $('[name="id"]').val(respond.data.id);
            $('[name="name"]').val(respond.data.name);
            $('[name="quantity"]').val(respond.data.quantity);
            $('#kt_modal_add_stok').modal('show');
            $('.modal-title').text('Edit Stok'); 
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

function saveStok() {
    var url;
    var id = $("#id").val();
    if(!id) {
        url = base_url + 'dashboard/stok/list';
    } else {
        url = base_url + 'dashboard/stok/update/' + id;
    }

    $.ajax({
        url : url,
        type: 'POST',
        data: $('#kt_modal_add_stok_form').serialize(),
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

function deleteStok(id) {
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
                url: base_url + 'dashboard/stok/delete/' + id,
                type: "GET",
                dataType: 'JSON',
                success: function (data) {
                    swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Stok berhasil dihapus!',
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

var modal = document.getElementById("kt_modal_add_stok");
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