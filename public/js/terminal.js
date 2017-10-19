$(function() {
    $("#terminal").attr("src", "http://" + document.location.hostname + ":57125");

    $("#terminal").height($("#leftsidebar").height()-170);
});
