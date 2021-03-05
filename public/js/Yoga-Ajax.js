$(document).ready(function () {
    // register ajax
    $("#reg-save-btn").on("click", function () {
        var regname = $("#yoga-reg-name").val();
        var regmail = $("#yoga-reg-email").val();
        var regpass = $("#yoga-reg-pass").val();
        var regrepass = $("#yoga-reg-repass").val();
        

        if (regname == "" || regmail == "" || regpass == "" || regrepass == "") {
            
            $("#yoga-reg-name-error").html("Field Required");
            $("#yoga-reg-name-error").css("color", " #F90A0A");
            $("#yoga-reg-name-error").css("font-size", "12px");

            $("#yoga-reg-email-error").html("Field Required");
            $("#yoga-reg-email-error").css("color", " #F90A0A");
            $("#yoga-reg-email-error").css("font-size", "12px");

            $("#yoga-reg-pass-error").html("Field Required");
            $("#yoga-reg-pass-error").css("color", " #F90A0A");
            $("#yoga-reg-pass-error").css("font-size", "12px");

            $("#yoga-reg-repass-error").html("Field Required");
            $("#yoga-reg-repass-error").css("color", " #F90A0A");
            $("#yoga-reg-repass-error").css("font-size", "12px");

        } else {

            $.ajax({
                url: "http://localhost:8080/api-Insert",
                type: "POST",
                data: { uname: regname, uemail: regmail, upass: regpass },
                success: function (data) {
                    if (data == 0) {
                        $("#yoga-reg-result").html("Registration Unsuccessfull").fadeOut(4000);

                    }
                    else {
                        $("#yoga-reg-result").html("Registration Done successfully").fadeOut(4000);
                        $("#yoga-reg-name").html("");
                        $("#yoga-reg-email").html("");
                        $("#yoga-reg-pass").html("");
                        $("#yoga-reg-repass").html("");

                    }
                }
            });
        }
    });


// $(document).ready(function(){
//     //register ajax
//     $("#reg-save-btn").on("click",function(){
//         var fname = $("#yoga-reg-name").val();
//         var fmail = $("#yoga-reg-email").val();
//         var fage = $("#yoga-reg-age").val();
//         var fpass = $("#yoga-reg-pass").val();

//         $.ajax({
//             url :"http://localhost:8080/api-Insert",
//             type:"POST",
//             data: {uname:fname, uemail:fmail, uage:fage, upass:fpass},
//             success:function(data){
//                 if(data==0)
//                 {
//                     $("#yoga-reg-result").html("data not inserted");
//                     $("#yoga-reg-result").css("color","#ff0000");
                    

//                 }else{
//                     $("#yoga-reg-result").html("Register successfully");
//                     $("#yoga-reg-result").css("color","#34F458");
//                     $("#yoga-reg-form")[0].reset();
//                 //    $("#result").css("color","");
//                 }
//             }
//         });
//     });


    // login ajax
    $("#login-btn").on("click", function () {

        var logmail = $("#email1").val();
        var logpass = $("#password1").val();

        if (logmail == "" && logpass == "") {
            $("#email1-error").html("Field Required");
            $("#email1-error").css("color", " #F90A0A");
            $("#email1-error").css("font-size", "12px");

            $("#password1-error").html("Field Required");
            $("#password1-error").css("color", " #F90A0A");
            $("#password1-error").css("font-size", "12px");

        } else {

            //console.log(logmail,logpass);
            $.ajax({
                url: "http://localhost:8080/api-login",
                type: "POST",
                data: { lemail: logmail, lpass: logpass },
                success: function (data) {
                    if (data == 0) {
                        $("#result").html("Username or password incorrect").fadeOut(4000);
                        $("#result").css("color", "red");
                        //alert("hii");
                    } else {
                        // $("#login-error-success").html("Username or password incorrect");
                        //localStorage.token = data['token'];
                        $("#result").html("login successfully").fadeOut(4000);
                        $("#result").css("color","#34F458");
                        $("#loginForm")[0].reset();
                        localStorage.token = data['token'];
                        window.location.assign('http://localhost:8080/Login');



                        //window.location.replace("http://localhost:8888/care-test-profile");

                    }
                }
            });
        }

    });
    
    $('#registermodal').on('hidden.bs.modal', function(){
        $(this).find('form')[0].reset();
        $("#yoga-reg-name-error").html("");
        $("#yoga-reg-email-error").html("");
        $("#yoga-reg-pass-error").html("");
        $("#yoga-reg-repass-error").html("");
        
    });
    $('#loginmodal').on('hidden.bs.modal', function(){
        $(this).find('form')[0].reset();
        $("#email1-error").html("");
        $("#password1-error").html("");
        
    });
});
//    // login ajax
//     $("#login-btn").on("click",function(){
//         var logmail = $("#email1").val();
//         var logpass = $("#password1").val();
//         //console.log(logmail,logpass);
//         $.ajax({
//             url :"http://localhost:8080/api-login",
//              //url :"apilogin.php",
            
//             type:"POST",
//             data: {lemail:logmail, lpass:logpass},
//             success:function(data){
//                 if(data==0)
//                 {
//                   $("#result").html("Username or password incorrect");
//                     $("#result").css("color","#ff0000");
                   
           

//                 }else{
                    
//                   $("#result").html("login successfully");
//                     $("#result").css("color","#34F458");
//                     $("#loginForm")[0].reset();
//                     localStorage.token = data['token'];
//                     window.location.assign('http://localhost:8080/Login');
                 
//                 }
//             }
//         });
//     });
// });
