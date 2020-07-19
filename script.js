$(function () {

    // view button
    $('.view').click(function (event) {

        // ajax call
        $.ajax({
            type: "GET",
            url: "user.php",
            success: function (data) {
                if (data == 'error') {
                    console.log("Error in diplaying Data");
                }
            },
            error: function () {
                $("#signupmessage").html("<div class='alert alert-danger'>Error in Ajax Call. Try again later.</div>");
            }
        });

    })

    // submit button


})