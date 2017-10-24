$(function() {

    $("#video-output").on("click", function() {
        showDialog();
        $.ajax({
            type: "POST",
            url: '/settings/set-video/',
            data: {
                video: $("[name=video]").val()
            },
            success: function(response) {
                if (response.success) {
                    showMessage("Video output changed successfully.");
                } else {
                    showMessage("Cannot change video output!");
                }
            },
            error: function() {
                showMessage("Cannot change video output!");
            }
        });
    });

    $("#m4-status").on("click", function() {
        showDialog();
        $.ajax({
            type: "POST",
            url: '/settings/set-m4/',
            data: {
                m4: $("[name=m4]").val()
            },
            success: function(response) {
                if (response.success) {
                    showMessage("M4 status changed successfully.");
                } else {
                    showMessage("Cannot change M4 status!");
                }
            },
            error: function() {
                showMessage("Cannot change M4 status!");
            }
        });
    });

    $("#port").on("click", function() {
        showDialog();
        $.ajax({
            type: "POST",
            url: '/settings/set-http-port/',
            data: {
                port: $("[name=port]").val()
            },
            success: function(response) {
                if (response.success) {
                    showMessage("Port changed successfully.");
                } else {
                    showMessage("Cannot change port!");
                }
            },
            error: function() {
                showMessage("Cannot change port!");
            }
        });
    });

    function showMessage(errorText) {
        $('#waitDialog div.loading').addClass("hidden");
        $('#waitDialog div.modal-footer').removeClass("hidden");
        $('#waitDialog div.done-message').html(errorText).removeClass("hidden");
    }

    function showDialog() {
        $('#waitDialog div.loading').removeClass("hidden");
        $('#waitDialog div.done-message').addClass("hidden");
        $('#waitDialog div.modal-footer').addClass("hidden");
        $('#waitDialog').modal('show');
    }

});
