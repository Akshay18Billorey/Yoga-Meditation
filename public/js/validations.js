$(function() {
   
    $("#yoga-reg-name-error").hide();
    $("#yoga-reg-email-error").hide();
    $("#yoga-reg-pass-error").hide();
    $("#yoga-reg-repass-error").hide();


    $("#yoga-reg-name").keyup(function(){
       check_fname();
    });
   
    $("#yoga-reg-email").keyup(function() {
       check_email();
    });
    
    $("#yoga-reg-pass").keyup(function() {
       check_password();
    });

    $("#yoga-reg-repass").keyup(function() {
       check_retype_password();
    });

    function check_fname() {
       var pattern = /^[a-zA-Z\s_, ]*$/;
       var fname = $("#yoga-reg-name").val();
       var name_length = $("#yoga-reg-name").val().length;
       if (pattern.test(fname) && fname !== '' && name_length > 2 ) {
          $("#yoga-reg-name-error").hide();
          //$("#diet-reg-name").css("border","2px solid #34F458");
          
          
         } else {
          $("#yoga-reg-name-error").html("!!Should contain only Characters and name length should be start with 3 letters!!");
          $("#yoga-reg-name-error").show();
          //$("#diet-reg-name").css("border","2px solid #F90A0A");
         
       }
    }
   
    function check_password() {
      var paspattern   = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;
      var pswd=$("#yoga-reg-pass").val();
       var password_length = $("#yoga-reg-pass").val().length;
     if (paspattern.test(pswd) && pswd !== '' && password_length > 5) {
       //console.log('right');
        //$("#diet-reg-pass").css("border","2px solid #34F458");
        $("#yoga-reg-pass-error").hide();
        
     }
      else {
          //console.log('wrong');
         $("#yoga-reg-pass-error").html("!!Fill the password correctly in alphanumeric form and have atleast 6 character!!");
        $("#yoga-reg-pass-error").show();
         //$("#diet-reg-pass").css("border","2px solid #F90A0A");
     }
  }

    function check_retype_password() {
       var password = $("#yoga-reg-pass").val();
       var retype_password = $("#yoga-reg-repass").val();
       if (password !== retype_password) {
          $("#yoga-reg-repass-error").html("Passwords Did not Matched");
          $("#yoga-reg-repass-error").show();
          //$("#diet-reg-repass").css("border","2px solid #F90A0A");
       
       } else {
          $("#yoga-reg-repass-error").hide();
          //$("#diet-reg-repass").css("border","2px solid #34F458");
       }
    }

    function check_email() {
       var pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
       var email = $("#yoga-reg-email").val();
       if (pattern.test(email) && email !== '') {
         console.log('right');
          $("#yoga-reg-email-error").hide();
          //$("#diet-reg-email").css("border","2px solid #34F458");
       } else {
         console.log('wrong');
          $("#yoga-reg-email-error").html("Invalid Email");
          $("#yoga-reg-email-error").show();
          //$("#diet-reg-email").css("border","2px solid #F90A0A");
       }
    }

    $("#yoga-reg-form").submit(function() {
       var error_fname = false;
       var error_email = false;
       var error_password = false;
       var error_retype_password = false;

       check_fname();
       check_email();
       check_password();
       check_retype_password();

       if (error_fname === false &&  error_email === false && error_password === false && error_retype_password === false) {
          return true;
       } else {
          alert("Please Fill the form Correctly");
          return false;
       }


    });

 });