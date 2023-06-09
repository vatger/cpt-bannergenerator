// VATGER CPT Bannergenerator (JQUERY) JAVASCRIPT by Paul Hollmann

//################################## THE IMAGE SELECTION ####################################
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
                    $(this).children("img").removeClass("border-secondary");
                    $(this).children("img").removeClass("img-thumbnail");
                });
                $(this).click(function () {
                    $("#background_image_display").children("div").each(function () {
                        $(this).trigger("background_image_selected");
                    });
                    $(this).children("img").addClass("img-thumbnail");
                    $(this).children("img").addClass("border");
                    $(this).children("img").addClass("border-secondary");
                    $("#form_bg").val(parseInt($(this).children("img").attr("data-imageid")));
                    templatedisplay();
                });
                $(this).css("pointer-events: none;");
                $(this).tooltip({ selector: '[data-toggle=tooltip]', relative: true });
            }
        });
    });
}
//load on finish
$(document).ready(function () {
    predisplay();
    $("#background_img_button").click(function () {
        predisplay();
        templatedisplay();
    });
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
                    $("#template_image_display").children("div").each(function () {
                        $(this).trigger("template_image_selected");
                    });
                    $(this).children("img").addClass("img-thumbnail");
                    $(this).children("img").addClass("border");
                    $(this).children("img").addClass("border-success");
                    $("#form_tp").val(parseInt($(this).children("img").attr("data-templateid")));
                    $("#warnings_show_image").empty();
                });
                $(this).css("pointer-events: none;");
                $(this).tooltip({ selector: '[data-toggle=tooltip]', relative: true });
            }
        });
    });
}
//################################## END OF SECTION ##########################################

//################################## THE MODAL SELECTION ##################################
//set the button action
$(document).ready(function () {
    $("#button_show_image").click(function () {
        $("#warnings_show_image").empty();
        if ($("#form_bg").val() == "---" || $("#form_tp").val() == "---"|| !$("#input").valid()) {
            if ($("#form_bg").val() == "---") {
                $("#warnings_show_image").append("<span class='badge badge-warning'>Kein Hintergrundbild ausgewählt</span><br>");
            }
            if ($("#form_tp").val() == "---") {
                $("#warnings_show_image").append("<span class='badge badge-warning'>Keine Vorlage ausgewählt</span><br>");
            }
            if (!$("#input").valid()){
                $("#warnings_show_image").append("<span class='badge badge-warning'>Nicht alle Textfelder ausgefüllt</span><br>");
            }

        } else {
            var data = $("#input").serialize();
            $("#outputlink").val($(location).attr("origin") + "/gen.php?" + data);
            $("#preview_img").attr("src", "gen.php?" + data);
            $("#image_result").modal();
        }
    });
    $("#button_gen_forum").click(function () {
        $("#warnings_gen_forum").empty();
        $("#warnings_gen_forum").append("<span class='badge badge-info'>Kommt noch</span><br>");
    });
});



function copyToClipboard(elementId) {
    var copyText = document.getElementById(elementId);
    copyText.select();
    copyText.setSelectionRange(0, 99999); /*For mobile devices*/
    document.execCommand("copy");
}
//################################## END OF SECTION ##########################################

