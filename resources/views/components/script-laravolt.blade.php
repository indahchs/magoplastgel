<script>

    // Default data form auth user
    var defaultProvince = '{{ Auth::user() ? Auth::user()->province : null }}';
    var defaultCity = '{{ Auth::user() ? Auth::user()->city : null }}';
    var defaultDistrict = '{{ Auth::user() ? Auth::user()->kecamatan : null }}';
    var defaultVillage = '{{ Auth::user() ? Auth::user()->kelurahan : null }}';

    if (defaultProvince) {
        // Load cities and then load districts based on the selected city
        onChangeSelect('/cities', defaultProvince, 'kota', defaultCity, function() {
            // After cities are loaded, load districts
            onChangeSelect('/districts', defaultCity, 'kecamatan', defaultDistrict, function() {
                // After districts are loaded, load villages
                onChangeSelect('/villages', defaultDistrict, 'kelurahan', defaultVillage);
            });
        });
    }

    function onChangeSelect(url, name, tag, selected = null, callback = null) {
        // send ajax request to get the cities of the selected province and append to the select tag
        $.ajax({
            url: url,
            type: 'GET',
            data: {
                name: name
            },
            success: function (data) {
                $('#' + tag).empty();
                $('#' + tag).append('<option value="">-- Pilih --</option>');
                $.each(data, function (key, value) {
                    $('#' + tag).append('<option value="' + value + '"'+ (value == selected ? ' selected' : '') + '>' + value + '</option>');
                });
                    // If a callback is provided, execute it after the data is loaded
                if (callback) {
                    callback();
                }
            }
        });
    }

    $(function () {
        $('#provinsi').on('change', function () {
            onChangeSelect('/cities', $(this).val(), 'kota', null, function() {
                // Clear kecamatan and kelurahan when province changes
                $('#kecamatan').empty().append('<option>-- Pilih --</option>');
                $('#kelurahan').empty().append('<option>-- Pilih --</option>');
            });
        });

        $('#kota').on('change', function () {
            onChangeSelect('/districts', $(this).val(), 'kecamatan', null, function() {
                // Clear kelurahan when city changes
                $('#kelurahan').empty().append('<option>-- Pilih --</option>');
            });
        });

        $('#kecamatan').on('change', function () {
            onChangeSelect('/villages', $(this).val(), 'kelurahan');
        });
    });
</script>
