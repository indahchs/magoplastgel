(function ($) {
    "use strict";

    // Formatting text
    function formatApiResponse(response) {
        // Menghilangkan style sebelumnya
        let formattedResponse = response;

        // Menghapus karakter backslash
        formattedResponse = formattedResponse.replace(/\\/g, "");

        // Mengatur Ordered List dengan nomor
        formattedResponse = formattedResponse.replace(
            /<ol>/g,
            '<ol style="list-style-type: decimal; margin-left: 20px">'
        );

        // Mengatur Unordered List dengan disc
        formattedResponse = formattedResponse.replace(
            /<ul>/g,
            '<ul style="list-style-type: disc; margin-left: 20px">'
        );

        // Mengonversi teks diapit ** ke tag <b>
        formattedResponse = formattedResponse.replace(
            /\*\*(.*?)\*\*/g,
            "<b>$1</b>"
        );

        // Menambahkan line break sebelum setiap nomor pada daftar bernomor
        formattedResponse = formattedResponse.replace(/(\d+\. )/g, "<br>$1");

        // Menghapus petik markdown
        formattedResponse = formattedResponse
            .replace(/```html/g, "")
            .replace(/```/g, "");

        return formattedResponse;
    }

    function scrollToBottom() {
        var chatBox = document.getElementById("roomChat");
        chatBox.scrollTop = chatBox.scrollHeight;
    }

    const csrfToken = $('meta[name="csrf-token"]').attr("content");

    // Set up csrf token
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": csrfToken,
        },
    });

    $("#sendMessage").on("click", function (e) {
        var message = $("#message").val();
        if (message !== "") {
            // Show message from user
            $("#roomChat").append(
                `<div class="d-flex chat-row right-chat">
                <div class=" chat chat-text">` +
                    message +
                    `</div>
                <img class="chat-profile" src="https://img.icons8.com/color/48/000000/circled-user-female-skin-type-7.png" >
            </div>`
            );
            $("#message").val("");
            scrollToBottom();

            // Get response from ai
            $.ajax({
                type: "POST",
                url: "chatbot/ai",
                data: {
                    message: message,
                },
                success: function (response) {
                    // Respon dari API
                    var apiResponse = response.message;


                    // Formatting respon
                    var formattedResponse = formatApiResponse(apiResponse);
                    // console.log(formattedResponse);

                    // Validasi respon API
                    if (response.status) {
                        // Jika status dari response adalah true (berhasil)
                        $("#roomChat").append(
                            `<div class="d-flex chat-row left-chat">
                                <img class="chat-profile" src="https://img.icons8.com/color/48/000000/circled-user-male-skin-type-7.png">
                                <div class="chat chat-text"></div>
                            </div>`
                        );

                        // Menambahkan HTML ke elemen yang baru dibuat
                        $("#roomChat .chat-text")
                            .last()
                            .html(formattedResponse); // Tampilkan pesan error jika ada
                        scrollToBottom();
                    } else {
                        // console.log(response.message); // Tampilkan pesan error jika ada
                        $("#roomChat").append(
                            `<div class="d-flex chat-row left-chat">
                                <img class="chat-profile" src="https://img.icons8.com/color/48/000000/circled-user-male-skin-type-7.png">
                                <div class="chat chat-text"></div>
                            </div>`
                        );

                        // Menambahkan HTML ke elemen yang baru dibuat
                        $("#roomChat .chat-text")
                            .last()
                            .html(formattedResponse); // Tampilkan pesan error jika ada
                        scrollToBottom();
                    }
                },
                error: function (xhr, status, error) {
                    console.error(error); // Tampilkan error jika request gagal
                },
            });
        }
    });
})(jQuery);
