<?php include 'link.php'; ?>
<!DOCTYPE>
<html>
	<body>
		<form method="post" id="reg_Form" name="addUser">
            <div class="row">
              <div class="col-12 m-auto shadow p-4">
                <div class="form-group">
                  <label for="name"> Name </label>
                    <input type="text" name="name"  id="name" class="form-control" placeholder="Enter your Name">
                    <span id="fname_error_message" class="text-danger"></span>
                </div>
      
                <div class="form-group">
                  <label for="email"> Email </label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter your Email">         
                    <span id="email_error_message" class="text-danger"></span>
                    <span id="email_success_message" class="text-success"></span>

                  </div>

                <div class="form-group">
                  <label for="pass">Password</label>
                    <input type="password" name="pass" id="pass" class="form-control" placeholder="Enter your Password"> 
                    <span id="password_error_message" class="text-danger"></span>
                  </div>
      
                <div class="form-group">
                  <input type="submit" id="submitbtn" name="submitbtn" class="btn btn-success btn-md" value="Save" onclick> 
                  <input type="submit" id="cancelbtn" name="deletebtn" class="btn btn-danger btn-md" value="Close"> 
                </div> 
                
                <div id="result"> </div>
                <div id="error"></div>
                <div id="success"></div>
              </div>
            </div>
          </form>

	<script type="text/javascript">
  		$(document).ready(function(){
    
    
		    // add data
		    $("#submitbtn").on("click",function(){
		      var uname   =   $("#name").val();
		      var uemail  =   $("#email").val();
		      var upass   =   $("#pass").val();
		     		     
		        $.ajax({
			        url: "index.php",
			        type:"POST",
			        data:{user_name:uname, user_email:uemail, user_pswd:upass},
			        success : function(data){
			          $("#success").html("Data Inserted successfully").fadeOut(3000);
			          $("#success").css("color", "#34F458");
			          $("#reg_Form")[0].reset();
			        }
		        });
		    });
  		});
 	</script>
 </body>
</html>
