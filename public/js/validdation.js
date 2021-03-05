$(function(){
    $("#email1").keyup(function () {
        check_log_email();
    });
    // $("#form_password").keyup(function () {
    //     check_log_password();
    // });
    function check_log_email() {
            var pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            var email = $("#email1").val();
            if(email == ''){
                $("#email1-error").hide();

            }else if (pattern.test(email) && email !== '') {
                $("#email1-error").hide();

            } else {
               console.log(email);
                $("#email1-error").html("Invalid Email");
                $("#email1-error").show();
                $("#email1-error").css("color", " #F90A0A");
                $("#email1-error").css("font-size", "10px");
                
            }
    }
   
});

$(function(){

    $("#yoga-reg-name").keyup(function () {
        check_reg_name();
    });
    $("#yoga-reg-email").keyup(function () {
        check_reg_email();
    });
    $("#yoga-reg-pass").keyup(function () {
        check_reg_password();
    });
    $("#yoga-reg-repass").keyup(function () {
        check_reg_repassword();
    });

    function check_reg_name() {
        var pattern = /^[a-zA-Z ]*$/;
        var fname = $("#yoga-reg-name").val();
        var fname_length = $("#yoga-reg-name").val().length;
        if(fname == ''){
            $("#yoga-reg-name-error").hide();

        }else if (pattern.test(fname) && fname !== '' && fname_length >= 4) {
            $("#yoga-reg-name-error").hide();

        } else {
            $("#yoga-reg-name-error").html("only Characters & above 4 letters");
            $("#yoga-reg-name-error").show();
            $("#yoga-reg-name-error").css("color", " #F90A0A");
            $("#yoga-reg-name-error").css("font-size", "10px");
        }
    }

    function check_reg_email() {
        var pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        var email = $("#yoga-reg-email").val();
        if(email == ''){
            $("#yoga-reg-email-error").hide();

        }else if (pattern.test(email) && email !== '') {
            $("#yoga-reg-email-error").hide();

        } else {
            $("#yoga-reg-email-error").html("Invalid Email");
            $("#yoga-reg-email-error").show();
            $("#yoga-reg-email-error").css("color", " #F90A0A");
            $("#yoga-reg-email-error").css("font-size", "10px");   
        }
    }
    function check_reg_password() {
        var paspattern   = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;
        var pswd=$("#yoga-reg-pass").val();
        var password_length = $("#yoga-reg-pass").val().length;
        if(pswd == ''){
            $("#yoga-reg-pass-error").hide();

        }else if (paspattern.test(pswd) && pswd !== '' && password_length > 5) {
            $("#yoga-reg-pass-error").hide();
          
        }else {   
            $("#yoga-reg-pass-error").html("Fill it in Alphanumberic form atleast 6 character");
            $("#yoga-reg-pass-error").show();
            $("#yoga-reg-pass-error").css("color", " #F90A0A");
            $("#yoga-reg-pass-error").css("font-size", "10px");
           
       }
    }
    function check_reg_repassword() {
        var password = $("#yoga-reg-pass").val();
        var retype_pswd = $("#yoga-reg-repass").val();
        if(retype_pswd == ''){
            $("#yoga-reg-repass-error").hide();

        }else if (password !== retype_pswd) {
            $("#yoga-reg-repass-error").html("Passwords Do not Matched");
            $("#yoga-reg-repass-error").show();
            $("#yoga-reg-repass-error").css("color", "#F90A0A");
            $("#yoga-reg-repass-error").css("font-size", "10px");
           
        } else {
           
            $("#yoga-reg-repass-error").html("Passwords Matched");
            $("#yoga-reg-repass-error").css("color","#34F458");
            $("#yoga-reg-repass-error").css("font-size", "10px");
        }
    }
    

});


// check email validation

$(document).ready(function () {
    $("#yoga-reg-email").on('change', function () {

        var regmail = $("#yoga-reg-email").val();
        $.ajax({
            url: "http://localhost:8080/api-checkmail",
            type: "POST",
            data: { uemail: regmail },
            success: function (data) {
                if (data == 1) {
                    $("#yoga-reg-email-error").html("Email already Exists");
                    $("#yoga-reg-email-error").show();
                    $("#yoga-reg-email-error").css("color", " #F90A0A");
                    $("#yoga-reg-email-error").css("font-size", "10px");
                } else {
                    //$("#care-reg-email-error").hide();

                }
            }
        });

    });
});





