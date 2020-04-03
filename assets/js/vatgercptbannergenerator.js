// VATGER CPT Bannergenerator (JQUERY) JAVASCRIPT by Paul Hollmann

//################################## THE IMAGE PREDISPLAY ####################################
//function for the predisplay
function predisplay() {
    $.get("preview.php?" + $("#img_form").serialize(), function (data) {
        var count = parseInt(data);
        $("#background_image_display").empty();
        if (isNaN(count) || count == 0) {
            $("#background_image_display").html("<div class='container row align-middle'><div class='col align-items-center align-middle'><span class='badge badge-dark'>No images found</span></div></div>");
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
        $.get("preview.php?number=" + (i * 6 + j) + "&" + $("#img_form").serialize(), function (data) {
            col.html(data);
            addEvents(col);
            //enable tooltips
            col.css("pointer-events: none;");
            col.tooltip({ selector: '[data-toggle=tooltip]', relative: true });
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
                backgroundSelectionTriggerUnselect();
                $("#template_image_display").html("<span class='badge badge-dark'>Pending</span>");
                col.children("img").addClass("img-thumbnail");
                col.children("img").addClass("border");
                col.children("img").addClass("border-success");
                $("#form_bg").val(parseInt(col.children("img").attr("data-imageid")));
                templatedisplay();
            });
        }
    }
}
//load the predisplay
predisplay();
$("#background_img_button").click(function () {
    $("#form_tp").val("---");
    $("#form_bg").val("---");
    $("#background_image_display").html("<span class='badge badge-dark'>Pending</span>");
    predisplay();
});
function backgroundSelectionTriggerUnselect() {
    $(".col").each(function () {
        $(this).trigger("background_image_selected");
    });
}
//################################## END OF SECTION ##########################################

//################################## THE TEMPLATE SELECTION ##################################
function templatedisplay() {
    $.get("template.php?background_id=" + $("#form_bg").val(), function (data) {
        var count = parseInt(data);
        $("#template_image_display").empty();
        if (isNaN(count) || count == 0) {
            $("#template_image_display").html("<div class='container row align-middle'><div class='col align-items-center align-middle'><span class='badge badge-dark'>No fitting templates found</span></div></div>");
        } else {
            for (let i = 0; i * 6 < count; i++) {
                var row = $("<div class='row mt-2'></div>");
                row.appendTo("#template_image_display");
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
        $.get("template.php?number=" + (i * 6 + j) + "&background_id=" + $("#form_bg").val(), function (data) {
            col.html(data);
            addEvents(col);
            //enable tooltips
            col.css("pointer-events: none;");
            col.tooltip({ selector: '[data-toggle=tooltip]', relative: true });
        });
    }
    function addEvents(col) {
        col.on("template_image_selected", function () {
            col.children("img").removeClass("border");
            col.children("img").removeClass("border-success");
            col.children("img").removeClass("img-thumbnail");
        });
        var id = parseInt(col.children("img").attr("data-templateid"));
        if (!isNaN(id) && id > 0) {
            col.click(function () {
                templateSelectionTriggerUnselect();
                col.children("img").addClass("img-thumbnail");
                col.children("img").addClass("border");
                col.children("img").addClass("border-success");
                $("#form_tp").val(parseInt(col.children("img").attr("data-templateid")));
            });
        }
    }
}
//load the predisplay
$("#template_img_button").click(function () {
    $("#form_tp").val("---");
    $("#template_image_display").html("<span class='badge badge-dark'>Pending</span>");
    templatedisplay();
});
function templateSelectionTriggerUnselect() {
    $(".col").each(function () {
        $(this).trigger("template_image_selected");
    });
}

//################################## END OF SECTION ##########################################


//set the button action
$("#button").click(function (event) {
    var data = $("#input").serialize();
    $("#outputlink").html($(location).attr("origin") + "/gen.php?" + data);
    $("#preview_img").attr("src", "gen.php?" + data);
});
