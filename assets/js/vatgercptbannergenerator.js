// VATGER CPT Bannergenerator by Paul Hollmann

//load the predisplay
$("#background_image_display").html;

//set the button action
$("#button").click(function (event) {
    var data = $("#input").serialize();
    $("#outputlink").html($(location).attr("origin") + "/gen.php?" + data);
    $("#preview_img").attr("src", "gen.php?" + data);
});

//lazyload images
$(document).ready(function () {
    $("img[data-lazysrc]").each(function () {
        //* set the img src from data-src
        $(this).attr("src", $(this).attr("data-lazysrc"));
    });
});

