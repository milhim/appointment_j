jQuery(document).ready(function ($) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    
    $(document).on("click", ".book_appointment", function (e) {
        e.preventDefault();
        let date_id=$(this).attr('id');
        let btn=$(this);
        $.ajax({
            type: 'put',
            url: `book_appointment/${date_id}`,
            data: "",
            dataType: "json",
            success: function (data) {
                btn.prop("disabled", true);
                btn.addClass('btn-secondary');
                btn.removeClass('btn-success');
                btn.html('Booked!')
                jQuery("#new_date_form").trigger("reset");
                jQuery("#add_new_date_model").modal("hide");
            },
            error: function (data) {
                console.log(data);
            },
        });

    });
    
});
