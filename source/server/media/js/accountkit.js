$(document).ready(function(){
    //https://developers.facebook.com/docs/accountkit/webjs
    $(".message").append("<p>initialized Account Kit.</p>");

    // login callback
    function loginCallback(response) {
        if (response.status === "PARTIALLY_AUTHENTICATED") {
            var code = response.code;
            var csrf = response.state;
            $(".message").append("<p>Received auth token from facebook -  " + code + ".</p>");
            $(".message").append("<p>Triggering AJAX for server-side validation.</p>");

            $.post("login/accountkit", {
                code: code,
                csrf: csrf
            }, function(result) {
                let data = JSON.parse(result);
                if(data.status === 'success'){
                    window.location.href = RootABSNoPort;
                }
            });

        } else if (response.status === "NOT_AUTHENTICATED") {
            $(".message").append("<p>( Error ) NOT_AUTHENTICATED status received from facebook, something went wrong.</p>");
        } else if (response.status === "BAD_PARAMS") {
            $(".message").append("<p>( Error ) BAD_PARAMS status received from facebook, something went wrong.</p>");
        }
    }
    $('.smsLogin').click(function(){
        var countryCode = document.getElementById("country_code").value;
        var phoneNumber = document.getElementById("phone_number").value;
        $(".message").append("<p>Triggering phone validation.</p>");
        AccountKit.login(
            'PHONE', {
                countryCode: countryCode,
                phoneNumber: phoneNumber
            }, // will use default values if not specified
            loginCallback
        );
    })
    $('.emailLogin').click(function() {
        var emailAddress = document.getElementById("email").value;
        AccountKit.login(
            'EMAIL', {
                emailAddress: emailAddress
            },
            loginCallback
        );
    })
})