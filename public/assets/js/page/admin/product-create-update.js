$("select").selectric();
    $.uploadPreview({
        input_field: "#image-upload-1",   // Default: .image-upload
        preview_box: "#image-preview-1",  // Default: .image-preview
        label_field: "#image-label-1",    // Default: .image-label
        label_default: "Choose File",   // Default: Choose File
        label_selected: "Change File",  // Default: Change File
        no_label: false,                // Default: false
        success_callback: null          // Default: null
    });
    $.uploadPreview({
        input_field: "#image-upload-2",   // Default: .image-upload
        preview_box: "#image-preview-2",  // Default: .image-preview
        label_field: "#image-label-2",    // Default: .image-label
        label_default: "Choose File",   // Default: Choose File
        label_selected: "Change File",  // Default: Change File
        no_label: false,                // Default: false
        success_callback: null          // Default: null
    });
    $.uploadPreview({
        input_field: "#image-upload-3",   // Default: .image-upload
        preview_box: "#image-preview-3",  // Default: .image-preview
        label_field: "#image-label-3",    // Default: .image-label
        label_default: "Choose File",   // Default: Choose File
        label_selected: "Change File",  // Default: Change File
        no_label: false,                // Default: false
        success_callback: null          // Default: null
    });
    $.uploadPreview({
        input_field: "#image-upload-4",   // Default: .image-upload
        preview_box: "#image-preview-4",  // Default: .image-preview
        label_field: "#image-label-4",    // Default: .image-label
        label_default: "Choose File",   // Default: Choose File
        label_selected: "Change File",  // Default: Change File
        no_label: false,                // Default: false
        success_callback: null          // Default: null
    });
    $.uploadPreview({
        input_field: "#image-upload-5",   // Default: .image-upload
        preview_box: "#image-preview-5",  // Default: .image-preview
        label_field: "#image-label-5",    // Default: .image-label
        label_default: "Choose File",   // Default: Choose File
        label_selected: "Change File",  // Default: Change File
        no_label: false,                // Default: false
        success_callback: null          // Default: null
    });
    $(".inputtags").tagsinput('items');
    var cleaveC = new Cleave(".currency", {
        numeral: true,
        numeralThousandsGroupStyle: "thousand",
    });

    document.getElementById("form").addEventListener("submit", function (event) {
        // Ambil input dengan class 'currency'
        var input = document.querySelector(".currency");

        // Set nilai input ke raw value (tanpa format) sebelum form dikirim
        input.value = cleaveC.getRawValue();
    });

    $('.delete-prev-image').on('click', function(){
        $(this).parent().css("background-image", "none")
        $(this).hide()
        $(this).siblings('.delete-image-list').prop('checked', true)
        $(this).siblings(".change-image").prop("required", true);
    });

    $('.change-image').on('change', function(){
        if($(this).val() != ''){
            $(this).siblings('.delete-image-list').prop('checked', false)
        }
    });