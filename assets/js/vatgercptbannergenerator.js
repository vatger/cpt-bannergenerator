// VATGER CPT Bannergenerator by Paul Hollmann

$(document).ready(function () {
    $('#button').click(function (event) {
        var data = $("#input").serialize();
        $("#outputlink").html($(location).attr("origin") + "/gen.php?" + data);
        $("#preview_img").attr("src", "gen.php?" + data);
    });
});

