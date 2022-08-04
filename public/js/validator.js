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

function auto_tag_genaretor(slug, title) {
    // var btn = document.getElementById(btn);
    var slug = document.getElementById(slug);
    var title = document.getElementById(title);
    const intervals = [];

    title.addEventListener("click", function () {
        const time2 = setInterval(function () {
        var gen = title.value.toLowerCase().replaceAll(" ", "-");
        slug.value = gen;
        }, 500);
        intervals.push(time2);
    });
    slug.addEventListener("click", function() {
        intervals.forEach(clearInterval);
    });
    // slug.addEventListener("click", function () {
    //     clearInterval(time2);
    // });
}


try {
    auto_tag_genaretor("slug", "title");
} catch {
    //
}

try {
    auto_tag_genaretor("category_slug", "category_name");
} catch {
    //
}

try {
    auto_tag_genaretor("edit_category_check_slug", "edit_category_check_name");
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


// Spinner
var spinner = function () {
    setTimeout(function () {
        if ($('#spinner').length > 0) {
            $('#spinner').removeClass('show');
        }
    }, 1000);
};
spinner();
