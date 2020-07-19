$(function () {
    $('.send').click(function (event) {
        event.preventDefault();

        var datatopost = $('form').serializeArray();
        // console.log(datatopost);

        $.ajax({
            type: "POST",
            url: "transfer.php",
            data: datatopost,
            success: function (data) {
                if (data == "success") {
                    $('.contentmessage').html("<div class='alert alert-success alert-dismissible fade show'>Credits send successfully. Refreshing....</div>");
                    setInterval(function () {
                        location.reload();
                    }, 1000);

                } else {
                    $('.contentmessage').html("<div class='alert alert-danger alert-dismissible fade show'>" + '<strong>' + data + '</strong>' + "</div>");
                    // setInterval(function () {
                    //     location.reload();
                    // }, 2000);
                }

            },
            error: function () {
                $("#signupmessage").html("<div class='alert alert-danger'>Error in Ajax Call. Try again later.</div>");
            }
        });
    })

})