$(document).ready(function() {
    // Ketika user memilih "Tambah Kategori Baru"
    $('#category-select').change(function() {
        if ($(this).val() == 'new') {
            $('#new-category-modal').modal('show'); // Tampilkan input kategori baru
        } else {
            $('#new-category-modal').modal('hide'); // Sembunyikan jika tidak memilih kategori baru
        }
    });

    // Ketika tombol "Tambahkan Kategori" ditekan
    $('#add-category-btn').click(function(e) {
        e.preventDefault();
        
        var newCategory = $('#new-category').val();
        if (newCategory.trim() === '') {
            alert('Nama kategori tidak boleh kosong.');
            return;
        }

        var csrf_token = $('meta[name="csrf-token"]').attr("content");

        // Kirim kategori baru via AJAX
        $.ajax({
            url: "/kategori-artikel", // route untuk menambahkan kategori
            method: 'POST',
            data: {
                _token: csrf_token,
                name: newCategory
            },
            success: function(response) {
                // Tambahkan kategori baru ke select option
                var newOption = $('<option></option>')
                    .attr('value', response.data.id)
                    .text(response.data.name);
                $('#category-select').append(newOption);

                // Refresh Selectric untuk memperbarui tampilan dropdown
                $('#category-select').selectric('refresh');

                // Pilih kategori yang baru ditambahkan
                $('#category-select').val(response.data.id).selectric('refresh');

                // Sembunyikan modal dan kosongkan input
                $('#new-category-modal').modal('hide');
                $('#new-category').val('');
            },
            error: function() {
                alert('Gagal menambahkan kategori baru.');
            }
        });
    });
});