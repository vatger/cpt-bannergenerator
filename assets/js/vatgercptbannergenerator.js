// VATGER CPT Bannergenerator by Paul Hollmann

//load the predisplay
var count;
$.get("preview.php", {}, function (data) {
    count = parseInt(data);
    for (let i = 0; i * 6 < count; i++) {
        var row = $("<div class='row no-gutters'></div>");
        row.appendTo("#background_image_display");
        for (let j = 0; j < 6; j++) {
            var col = $("<div class='col'></div>");
            col.html('<div class="spinner-border" role="status"><span width="150" height="66" class="sr-only">Loading...</span></div>');
            getPreview(col, i, j);
            row.append(col);
        }
    }
});
function getPreview(col, i, j) {
    $.get("preview.php", { number: (i * 6 + j) }, function (data) {
        col.html(data);
    });
}

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

