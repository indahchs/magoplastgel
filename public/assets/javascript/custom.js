(function ($) {
    "use strict";

    $('#plus-counter').click(function() {
        const currentValue = parseInt($("#quantity").val());
        $("#quantity").val(currentValue + 1);
    });

    $('#minus-counter').click(function() {
        const currentValue = parseInt($("#quantity").val());
        if (currentValue > 1) {
            $("#quantity").val(currentValue - 1);
        }
    });

    $('.slider-images img').click(function() {

        let newSrc = $(this).attr('src');
        $('.main-images').attr('src', newSrc);
    });

    $(".single-image").click(function () {
        // Hapus kelas 'image-active' dari semua elemen gambar
        $(".single-image").removeClass("image-active");

        // Tambahkan kelas 'image-active' ke elemen yang diklik
        $(this).addClass("image-active");

        // Mengambil URL gambar dari elemen yang diklik
        let imgSrc = $(this).find("img").attr("src");

        let mainImage = $(".main-image img");

        // Tambahkan kelas 'fading' untuk memulai transisi fade-out
        mainImage.addClass("fading");

        // Setelah gambar memudar, ganti gambar dan fade-in
        setTimeout(function () {
            mainImage.attr("src", imgSrc);
            mainImage.removeClass("fading"); // Kembalikan opacity ke 1 (fade-in)
        }, 300); // Waktu sesuai dengan durasi transisi (0.5 detik)
    });


    // Pop Up ChatAI
    $("#popUpChat").hide(); // Sembunyikan pop-up chat saat halaman pertama kali dimuat

    $("#btnChatAi").click(function (event) {
        event.preventDefault(); // Mencegah action default dari anchor <a>

        // Toggle visibility dari pop-up chat
        $("#popUpChat").toggle(); // Menampilkan atau menyembunyikan chat box
        return false;
    });

    $("#closeChat").click(function() {
        $("#popUpChat").hide(); // Menampilkan atau menyembunyikan chat box
    });




})(jQuery);
