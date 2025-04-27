$(".remove-product").click(function(e) {
    e.preventDefault();
    var id = $(this).data('id');
    swal({
        title: 'Apakah Anda yakin?',
        icon: 'warning',
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                document.getElementById('delete-product-form').action = '/produk/hapus-produk/' + id;
                document.getElementById('delete-product-form').submit();
            } else {
                swal('Produk batal dihapus');
            }
        }
    );
});