// VATGER CPT Bannergenerator by Paul Hollmann

//load the predisplay
var count;
$.get("preview.php", {}, function (data) {
    count = parseInt(data);
    if (count == 0) {
        $("#background_image_display").html = "<div class='row no-gutters'><span class='badge badge-dark'>No images found</span></div>";
    } else {
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
    }
});
function getPreview(col, i, j) {
    $.get("preview.php", { number: (i * 6 + j) }, function (data) {
        col.html(data);
        addEvents(col);
    });
}
function addEvents(col) {
    col.on("background_image_selected", function () {
        col.children("img").removeClass("border");
        col.children("img").removeClass("border-success");
    });
    var id = parseInt(col.children("img").attr("data-imageid"));
    if (!isNaN(id) && id > 0) {
        col.click(function () {
            $(".col").each(function () {
                $(this).trigger("background_image_selected");
            })
            col.children("img").addClass("border");
            col.children("img").addClass("border-success");
            $("#form_bg").val(parseInt(col.children("img").attr("data-imageid")));
        });

    }
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

