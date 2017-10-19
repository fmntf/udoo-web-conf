$(function() {
    $("#terminal").attr("src", "http://" + document.location.hostname + ":5712");

    $("#terminal").height($("#leftsidebar").height()-170);
});
