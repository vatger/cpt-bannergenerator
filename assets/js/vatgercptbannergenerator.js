// VATGER CPT Bannergenerator by Paul Hollmann

//load the predisplay
function predisplay() {
    $("#background_image_display").html = "LOADING";
    $.get("preview.php", { rg: "", station: "", airport: "" }, function (data) {
        var count = parseInt(data);
        if (isNaN(count) || count == 0) {
            $("#background_image_display").html = "<div class='row align-middle'><span class='badge badge-dark'>No images found</span></div>";
        } else {
            for (let i = 0; i * 6 < count; i++) {
                var row = $("<div class='row mt-2'></div>");
                row.appendTo("#background_image_display");
                for (let j = 0; j < 6; j++) {
                    var col = $("<div class='col align-items-center align-middle'></div>");
                    getPreview(col, i, j);
                    row.append(col);
                }
            }
        }
    });
    function getPreview(col, i, j) {
        col.html('<div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div>');
        $.get("preview.php", { number: (i * 6 + j) }, function (data) {
            col.html(data);
            addEvents(col);
        });
    }
    function addEvents(col) {
        col.on("background_image_selected", function () {
            col.children("img").removeClass("border");
            col.children("img").removeClass("border-success");
            col.children("img").removeClass("img-thumbnail");
        });
        var id = parseInt(col.children("img").attr("data-imageid"));
        if (!isNaN(id) && id > 0) {
            col.click(function () {
                $(".col").each(function () {
                    $(this).trigger("background_image_selected");
                })
                col.children("img").addClass("img-thumbnail");
                col.children("img").addClass("border");
                col.children("img").addClass("border-success");
                $("#form_bg").val(parseInt(col.children("img").attr("data-imageid")));
            });
        }
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

