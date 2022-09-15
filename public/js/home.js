jQuery(document).ready(function ($) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    let user_id=jQuery("#user_id").attr('user_id');
    let date_id=
    $(document).on("click", ".book_appointment", function (e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: `book_appointment/${date_id}`,
            data: {
                user_id:user_id,

            },
            dataType: "json",
            success: function (data) {
            
                jQuery(`#appointment_dates${appointment_id}`).append(appointment_date);
                jQuery("#new_date_form").trigger("reset");
                jQuery("#add_new_date_model").modal("hide");
            },
            error: function (data) {
                console.log(data);
            },
        });

    });
    
});
