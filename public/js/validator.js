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


try {
    validator("add_category_check", "add_error", "add_btn");
    validator("edit_category_check", "edit_error", "edit_btn");
} catch {
    //
}

function auto_tag_genaretor(btn, slug, title) {
    var btn = document.getElementById(btn);
    var slug = document.getElementById(slug);
    var title = document.getElementById(title);

    btn.addEventListener("click", function () {
        var gen = title.value.toLowerCase().replaceAll(" ", "-");
        slug.value = gen;
    });
}


try {
    auto_tag_genaretor("auto-tag-genarate", "slug", "title");
} catch {
    //
}

function news_to_post(cls_name) {
    var post = document.getElementsByClassName(cls_name);
    for (var i = 0; i < post.length; i++) {
        post[i].style.font_weight = "normal";
        // post[i].innerText = post[i];
    }
}

try {
    //
} catch {
    //
}

news_to_post("news_post");
