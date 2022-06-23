function validator(input_field, error_field, button_field) {
    var input_field = document.getElementById(input_field);
    var error_field = document.getElementById(error_field);
    var button_field = document.getElementById(button_field);

    input_field.addEventListener("click", function () {
        setInterval(function () {
            if (input_field.value.length < 4) {
                input_field.classList.add("is-invalid");
                error_field.classList.remove("hidden");
                button_field.classList.add("disabled");
            } else {
                input_field.classList.remove("is-invalid");
                error_field.classList.add("hidden");
                button_field.classList.remove("disabled");
            }
        }, 500);
    });
}

validator("add_category_check", "add_error", "add_btn");
validator("edit_category_check", "edit_error", "edit_btn");