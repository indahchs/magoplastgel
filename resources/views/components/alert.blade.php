@if ($message = Session::get('success'))
    <div class="alert-box" id="alertBox">
        <div class="">
            <button class="close" onclick="closeAlert()">
                <span>×</span>
            </button>
            <p class="text-custom-primary">{{ $message }}</p>
        </div>
    </div>

@elseif ($message = Session::get('error'))
    <div class="alert-box" id="alertBox">
        <div class="">
            <button class="close" onclick="closeAlert()">
                <span>×</span>
            </button>
            <p class="text-custom-primary">{{ $message }}</p>
        </div>
    </div>
@endif

<script>
    function closeAlert() {
        const alertBox = document.getElementById("alertBox");
        alertBox.style.animation = "slideOut 0.5s forwards";

        // Remove the element after the animation completes
        setTimeout(() => {
            alertBox.style.display = "none";
        }, 500); // Match this duration with the animation time
    }

    // Menghilangkan alert otomatis setelah 5 detik
    setTimeout(closeAlert, 5000);

</script>
