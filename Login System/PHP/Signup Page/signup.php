<?php
   include("config.php");
   session_start();

   if(isset($_POST['submit'])){
      // all of this data is going representing the columns of the user table
      $first = $_POST['first'];
      $last = $_POST['last'];
      $UTORid = $_POST['UTORid'];
      $user_type = $_POST['user_type'];
      $email = $_POST['email'];
      $username = $_POST['username'];
      $password = $_POST['password'];

      $sql_u = "SELECT * FROM users WHERE username = '$username'"; 
      $res_u = mysqli_query($db, $sql_u) or die (mysqli_error($db));

      if (mysqli_num_rows($res_u) > 0) {
         $name_error = "sorry...that username is taken";
      }
      elseif (empty($username) || empty($password) || empty($first) || empty($last) || empty($UTORid) || empty($user_type) || empty($email)) {
          $missing_error = "Please complete field(s) below";
       } else {
         //query the user data into the database 
         $sql = "INSERT INTO users (UTORid, first, last, email, user_type, username, password) 
         VALUES ('$UTORid', '$first', '$last', '$email', '$user_type', '$username', '$password')";
         $result = $db->query($sql);

         $registration_complete = "Registration complete! Please log in.";

      }

   }
?>


<html>
   
   <head>
      <title>Sign Up Page</title>
      
      <style type = "text/css">
          body {
            background-color: #242729;
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
            margin-top: 50px;
         }

         button {
            margin-top: 10px;
            margin-bottom: 5px;
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

         .return_login {
            margin: 20px 0px 0px 0px;
         }

         .name_err {
            color: red;
            font-family: "Arial";
            font-size: 13px;
         }

         .user_incomplete{
            color: red;
         }

         .top_register_box {
            background-color: #e9e9e9;
            color: black;
            font-size: 25px;
            padding: 20px 15px 0px 25px;
            text-align: center;
            font-family: "Arial";

         }
         .register_boxes{
            padding: 20px 10px 20px 40px;
            width: 350px;
            background-color: #e9e9e9;
         }

         .register_big_box {
            width:400px;
            border: solid 1px #333333;
            text-align: center; 
         }

         .container{
            color: #0099cc;
            font-weight: bold;
         }

         a {
            color: teal;
            font-family: "Palatino";
            font-size: 15px;

         }

         input {
            padding: 10px;
            color: black;
            margin: 5px 0px 5px 0px;
            text-align: left;
            font-size: 15px;
            width: 250px;
         }

         input[type="radio"]{
            width: 10px;
            margin-left: 20px;
            margin-right: 3px; 
            vertical-align: middle;
         }

         input:hover {
            transition: 0.3s; 
            background-color: #33ccff;
            border-color: teal;
            color:white;
            
         }



      </style>
      
   </head>
   
   <body>
	
      <div align = "center">
         <div class="register_big_box">
            <div class="top_register_box"><b>REGISTER</b></div>
				
            <div class="register_boxes">
               
               <form action = "signup.php" method = "post">
                  <div class = "user_incomplete"> <?php if (isset($missing_error)); ?>
                     <span> <?php echo $missing_error; ?> </span> </div>
                  <div class="input_style">
                  <input type="text" name="first" placeholder="First Name"> <br>
                  <input type="text" name="last" placeholder="Last Name"> <br>
                  <input type="text" name="UTORid" placeholder="UTORid"> <br>
                  <input type="text" name="email" placeholder="email@utoronto.ca"> <br>
                     
                  </div>   
                  
                  <div class="containers"> 
                     <label class="container">
                     <input type="radio" name="user_type" value = "student_user"> Student  
                     </label>
                     <label class="container">
                        <input type="radio" name="user_type" value="TA_user"> TA
                     </label> 
                     <label class="container">
                        <input type="radio" name="user_type" value="instructor_user"> Instructor
                     </label> 

                  </div>
                   
                  <input type="text" name="username" placeholder="Username"> <br>
                  <div class = "name_err"> <?php if (isset($name_error)); ?>
                     <span> <?php echo $name_error; ?> </span> </div>
                  <input type="password" name="password" placeholder="Password"> <br>

                  <button type="submit" name="submit"> Register </button> <br>
                  <p style="color:#b85be8; "> <?php echo $registration_complete; ?> </p>

                  <div class="return_login"> <a href="index.php"> Have an account? Login here!</a> </div>

               </form>          

					
            </div>
				
         </div>
			
      </div>


      
   </body>
</html>