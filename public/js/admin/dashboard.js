jQuery(document).ready(function ($) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    jQuery("#btn-add").click(function () {
        jQuery("#btn-save").val("add");
        jQuery("#myForm").trigger("reset");

        $(document).on("click", "#btn-save", function (e) {
            e.preventDefault();
            let formData = {
                appointment_name: jQuery("#appointment_name").val(),
            };
            let state = jQuery("#btn-save").val();
            let type = "POST";
            let ajaxurl = "/admin/appointments";
            $.ajax({
                type: type,
                url: ajaxurl,
                data: formData,
                dataType: "json",
                success: function (data) {
                    let appointment = `
                        <tr id=appointment${data.id}>
                        <td>${data.appointment_name}</td>
                        <td>
                        <ul id="appointment_dates${data.id}" class="list-group list-group-flush"></ul>

                        </td>
                        <td>
                            <button type="button" class="btn btn-dark add_date" id="${data.id} " add_new_date=${data.id}  data-bs-toggle="modal"
                                data-bs-target="#add_new_date_model">
                                Add Date
                            </button>
                        </td>
                        </tr>`;

                    if (state === "add") {
                        jQuery("#appointments-list").append(appointment);
                    }
                    jQuery("#myForm").trigger("reset");
                    jQuery("#formModal").modal("hide");
                    console.log(state);
                },
                error: function (data) {
                    console.log(data);
                },
            });
        });
    });

    //add date

    jQuery(".add_date").click(function () {

        jQuery("#new_date_form").trigger("reset");
        let appointment_id = $(this).attr("id");

        $(document).on("click", "#save_date", function (e) {

            e.preventDefault();
            let formData = {
                appointment_date: jQuery("#appointment_date").val(),
                status: "available",
            };
            let type = "POST";
            let ajaxurl = `/admin/appointments/${appointment_id}/add_new_appointment_date`;
            $.ajax({
                type: type,
                url: ajaxurl,
                data: formData,
                dataType: "json",
                success: function (data) {
                    let appointment_date = `
                                    <li id="appointment_date${data.id}" class="list-group-item d-flex justify-content-between align-items-start">
                                            ${data.appointment_date}
                                                <span class="badge bg-success rounded-pill">${data.status}</span>
                                    </li>
                    `;
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
});
