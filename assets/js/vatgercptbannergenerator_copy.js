// VATGER CPT Bannergenerator (JQUERY) JAVASCRIPT by Paul Hollmann

//################################## THE IMAGE PREDISPLAY ####################################
//function for the predisplay
function predisplay() {
    $("#form_bg").val("---");
    $.get("backgrounds.php?" + $("#img_form").serialize(), function (data) {
        $("#background_image_display").empty();
        $("#background_image_display").html(data);
        $("#background_image_display").children("div").each(function () {
            var id = parseInt($(this).children("img").attr("data-imageid"));
            if (!isNaN(id) && id > 0) {
                $(this).children("img").each(function () {
                    $(this).attr("src", $(this).attr("data-lazysrc")).removeAttr("data-lazysrc");
                });
                $(this).on("background_image_selected", function () {
                    $(this).children("img").removeClass("border");
                    $(this).children("img").removeClass("border-success");
                    $(this).children("img").removeClass("img-thumbnail");
                });
                $(this).click(function () {
                    $("#background_image_display").children("div").each(function () {
                        $(this).trigger("background_image_selected");
                    });
                    $(this).children("img").addClass("img-thumbnail");
                    $(this).children("img").addClass("border");
                    $(this).children("img").addClass("border-success");
                    $("#form_bg").val(parseInt($(this).children("img").attr("data-imageid")));
                    templatedisplay();
                });
                $(this).css("pointer-events: none;");
                $(this).tooltip({ selector: '[data-toggle=tooltip]', relative: true });
            }
        });
    });
}
//load the predisplay
predisplay();
$("#background_img_button").click(function () {
    predisplay();
    templatedisplay();
});
//################################## END OF SECTION ##########################################

//################################## THE TEMPLATE SELECTION ##################################
function templatedisplay() {
    $("#form_tp").val("---");
    $.get("templates.php?background_id=" + $("#form_bg").val(), function (data) {
        $("#template_image_display").empty();
        $("#template_image_display").html(data);
        $("#template_image_display").children("div").each(function () {
            var id = parseInt($(this).children("img").attr("data-templateid"));
            if (!isNaN(id) && id > 0) {
                $(this).children("img").each(function () {
                    $(this).attr("src", $(this).attr("data-lazysrc")).removeAttr("data-lazysrc");
                });
                $(this).on("template_image_selected", function () {
                    $(this).children("img").removeClass("border");
                    $(this).children("img").removeClass("border-success");
                    $(this).children("img").removeClass("img-thumbnail");
                });
                $(this).click(function () {
                    $("#background_image_display").children("div").each(function () {
                        $(this).trigger("template_image_selected");
                    });
                    $(this).children("img").addClass("img-thumbnail");
                    $(this).children("img").addClass("border");
                    $(this).children("img").addClass("border-success");
                    $("#form_tp").val(parseInt($(this).children("img").attr("data-templateid")));
                });
                $(this).css("pointer-events: none;");
                $(this).tooltip({ selector: '[data-toggle=tooltip]', relative: true });
            }
        });
    });
}
$("#template_img_button").click(function () {
    templatedisplay();
});
//################################## END OF SECTION ##########################################

//set the button action
$("#button").click(function (event) {
    var data = $("#input").serialize();
    $("#outputlink").html($(location).attr("origin") + "/gen.php?" + data);
    $("#preview_img").attr("src", "gen.php?" + data);
});
