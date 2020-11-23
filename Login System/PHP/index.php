<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']);

   
      $user_type = mysqli_real_escape_string($db,$_POST['user_type']);
      
      $sql = "SELECT * FROM users WHERE username = '$myusername' and password = '$mypassword' and user_type = '$user_type' "; 

          
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);

      // If result matched $myusername and $mypassword, table row must be 1 row

      if (($count == 1) && $user_type == 'student_user')  {
         $_SESSION['login_user'] = $myusername;

         // This line can change based on where you want student to go  
         header("Location: welcomestudent.php"); 
 
     } 
      elseif (($count == 1) && $user_type == 'TA_user') {

         $_SESSION['login_user'] = $myusername;

         // This line can change based on where you want TA to go
         header("Location: welcometa.php"); 

      } 
      elseif (($count == 1) && $user_type == 'instructor_user') {

         $_SESSION['login_user'] = $myusername;

         // This line can change based on where you want student to go
         header("Location: welcomeinstructor.php"); 
      }

      else {
         $error = "Incorrect log in details, please try again";
      }
   }
 
?>

<html>
   
   <head>
      <title> Login Page </title>
      
      <style type = "text/css">
         body {
            background-color: #242729;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;
            margin-top: 150px;
         }
         
         .label_box {
            border:black solid 2px;
            background-color: white;
            margin-left: 3px;
         }

         b {
            font-size: 26px;
         }

         .box_big {
            width: 350px;
            border:solid 3px #939393;
            text-align: center;
         }

         .box_top {
            background-color: #e9e9e9;
            color: black;
            padding: 20px 15px 20px 15px;
            text-align: center;
            font-family: "Arial";
            
         }
         .inner_boxes {
            margin: 0px;
            padding: 20px 40px 50px 40px;
            background-color: #e9e9e9;
         }

         .invalid_login{
            font-size:12px; 
            color: red; 
            margin: 0px 0px 10px 0px;
            
         }

         .utsc_logo {
            margin: 0px 0px 0px 0px;
            padding: 0px 0px 0px 0px;

         }

         input {
            padding: 10px;
            color: black;
            margin: 5px 0px 0px 0px;
            text-align: left;
            font-size: 15px;
         }

         input:hover {
            transition: 0.3s; 
            background-color: #33ccff;
            border-color: teal;
            color:white;
            
         }

         button {
            background-color: teal;
            color: white;
            padding: 10px;
            font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
            font-size: 17px;
            border-radius: 15px

         }

         button:hover{ 
            transition: 0.3s;
            background-color: white;
            color:black;
         }

      </style>
      
   </head>
   
   <body>
	
      <div align = "center">

         <div class ="box_big">
            <div class="box_top"> <b>SIGN IN TO CSCB20 </b> </div>
            <div class="inner_boxes">
               <form action = "" method = "post">
                  <input type = "text" name = "username" class = "label_box" placeholder= "Username" /><br /><br />
                  <input type = "password" name = "password" class = "label_box" placeholder="Password" /><br/>

                  <div class="access"> <p> Access Level </p> </div> 

                  <label class="user_level">
                     <input type="radio" name="user_type" value = "student_user"> Student  
                  </label>
                  <label class="user_level">
                        <input type="radio" name="user_type" value="TA_user"> TA
                  </label> 
                  <label class="user_level">
                        <input type="radio" name="user_type" value="instructor_user"> Instructor
                  </label> 

                  <div class="invalid_login"> <?php echo $error; ?> </div>

                  <button type = "submit" name = "submit"> Login </button>
               </form>
               <div> <a href="signup.php"> <button> Sign Up </button> </a> </div> 
               
            </div>
				
         </div>
			
      </div>

      

      
      
   </body>
</html>