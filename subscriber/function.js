$(document).ready(function () {

    $('#emailresponsive-modal').modal('hide');
    $('#phoneresponsive-modal').modal('hide');

    $('#verifyEmail').click(function () {
        $('#emailresponsive-modal').modal('show');
        $('#responsive-modal').modal('hide');
    });
    $('#verifyPhone').click(function () {
        $('#emailresponsive-modal').modal('hide');
        $('#phoneresponsive-modal').modal('show');
    });

    $('#verifyOTPCode').click(function () {

        verifyMail();

    });

    $('#verifyPhoneCode').click(function () {

        verifyPhone();

    });

    //

    function verifyMail() {
        var otp = $('#otp').val();
        var userid = $('#showMaail').val();
        var request = new XMLHttpRequest();
        var url = "modules/verifyMail.php?userid=" + userid + "&otp=" + otp;
        request.open("GET", url, false);
        request.send();
        if (request.status == 200) {
            var resp = request.responseText;
            if (resp == "Verified") {
                location.reload();
            }
            else if (resp == "null") {
                alert("Invalid Otp code");
            }
            else if (resp == "Incorrect") {
                alert("Otp specifoed is incorrect");
            }
        }



    }


    function verifyPhone() {
        var otp = $('#phoneotp').val();
        var userid = $('#showMaail').val();
        var request = new XMLHttpRequest();
        var url = "modules/verifyPhone.php?userid=" + userid + "&otp=" + otp;
        request.open("GET", url, false);
        request.send();
        if (request.status == 200) {
            var resp = request.responseText;
            if (resp == "Verified") {
                location.reload();

                alert("Congrats... Account has been activated.. Click Ok to redirect to dashboard");
                window.location = 'index.php';
            }
            else if (resp == "null") {
                alert("Invalid Otp code");
            }
            else if (resp == "Incorrect") {
                alert("Otp specifoed is incorrect");
            }
        }



    }

})