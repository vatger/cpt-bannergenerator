function clicked_preview() {
    var data = $("#input").serialize();
    $("#outputlink").html("//link-to-mainfolder/?"+data);
    $("#preview_img").attr("src", "?"+data);
}