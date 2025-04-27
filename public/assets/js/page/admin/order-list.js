function timestampToDatetime(time) {
    return new Date(time).toLocaleString('id-ID', { year: 'numeric', month: '2-digit', day: '2-digit', hour: '2-digit', minute: '2-digit' }).replace(',', '');
}
$(document).ready(function() {
    var csrf_token = $('meta[name="csrf-token"]').attr("content");

    $('.tracking-button').on('click', function(){
        $('#tracking-modal').modal('show');

        var id = $(this).data('id');
        var activities = "";

        $(".activities").html(activities);

        $.ajax({
            url: '/pesanan/lacak/' + id,
            type: 'GET',
            data: {
                _token: csrf_token
            },
            success: function(response) {
                console.log(response.data.history);

                response.data.history.forEach(activity => {
                    $(".activities").append(`<div class="activity">
                    <div class="activity-icon bg-primary shadow-primary text-white">
                        <i class="fa fa-chevron-down"></i>
                    </div>
                    <div class="activity-detail">
                        <div class="mb-2">
                            <span class="text-job">${timestampToDatetime(activity.updated_at)}</span>

                        </div>
                        <p>${activity.note}</p>
                        ${activity.status == 'delivered' ? '<button class="btn btn-success mt-2 finish-order" data-id="' + id + '">Selesaikan pesanan</button>' : ''}
                    </div>
                </div>`);
                });
            }
        });

    })

    $('#tracking-modal').on('click', '.finish-order', function(){
        var id = $(this).data('id');

        console.log('click');


        $.ajax({
            url: '/pesanan/selesai/' + id,
            type: 'PUT',
            data: {
                _token: csrf_token
            },
            success: function(response) {
                window.location.reload();
            }
        });
    })
});
