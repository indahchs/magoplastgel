$(".confirm-delete").click(function() {
    var id = $(this).data('id');
    swal({
        title: 'Apakah Anda yakin?',
        text: 'Setelah dihapus, data artikel tidak dapat dikembalikan!',
        icon: 'warning',
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                document.getElementById('delete-article').action = '/artikel/hapus-permanen-artikel/' + id;
                document.getElementById('delete-article').submit();
            } else {
                swal('Artikel batal dihapus');
            }
        }
    );
});