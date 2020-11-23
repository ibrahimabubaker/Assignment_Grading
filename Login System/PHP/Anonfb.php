    
<html>
<?php
    include('session.php');
    include('config.php');

    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    } 

   if(isset($_POST['submit'])){
      $InstructorName = $_POST['InstructorName'];
      $Question1 = $_POST['Question1'];
      $Question2 = $_POST['Question2'];
      $Question3 = $_POST['Question3'];
      $Question4 = $_POST['Question4'];

      if (empty($InstructorName) or empty($Question1) or empty($Question2) or empty($Question3) or empty($Question4)) {
          $missing_error = "Please complete field(s) below";
       } 
      else {
         //query the user data into the database 
          $sql = "INSERT INTO feedback (InstructorName, Question1, Question2, Question3, Question4) 
         VALUES ('$InstructorName', '$Question1', '$Question2', '$Question3', '$Question4')";
          $result = $db->query($sql);
          $Feedback_Submitted = "Feedback has been submitted";
      }

   }

?>
    
    <head>
      <title>Anonymous Feedback</title>
    </head>
        <header>
            <center>
				<h1>CSCB20 - Introduction to Databases and Web Applications</h1>
                    <h2><a href = "logout.php"> Sign Out</a></h2>
				<ul>
					<li> <a href="welcomestudent.php">Home</a></li>
					<li> <a href="https://portal.utoronto.ca/webapps/blackboard/execute/announcement?method=search&context=course_entry&course_id=_933761_1&handle=announcements_entry&mode=view">Announcements</a></li>
					<li> <a href="Course Team S.php">Course Team</a></li>
					<li> <a href="http://www.utsc.utoronto.ca/iits/computer-labs">UTSC Labs</a></li>
					<li> <a href="Labs S.php">Lab Exercises</a></li>
					<li> <a href="https://portal.utoronto.ca/bbcswebdav/pid-6516914-dt-content-rid-42416760_2/courses/Winter-2018-CSCB20H3-S-LEC01/CSCB20CourseSyllabus.pdf">Syllabus</a></li>
					<li> <a href="Anonfb.php">Feedback</a></li>
					<li> <a href="Assignments S.php">Assignments</a></li>
					<li> <a href="https://markus.utsc.utoronto.ca/cscb20w18/?locale=en">Markus</a></li>
					<li> <a href="https://piazza.com/class/jcpjjp5l4bywd?cid=155">Piazza</a></li>
				</ul>
            </center>
        </header>
     <style type="text/css">
        body {
	margin: 0;
	padding-top: 220px;
	background:linear-gradient(45deg, #c68fff,#283747);
	font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
}


h1{
	color: white;
	font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	text-shadow: 5px 5px #000066;
	font-size: 35px
}

h2{
	color: white;
	text-shadow: 3px 3px black
	font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
}
p{
	color:white;
}
button{
	color: black;
}


.cd{
	border-radius: 20px;
	background: #999999;
	color:white;
	padding: 20px .5px;
	margin-left:5%;
	margin-right:5%;
}
.btn_color{
	color:white;
}

.pr{
	border-radius: 20px;
	background: #999999;
	color:white;
	padding: 20px .5px;
	margin-left:5%;
	margin-right:5%;

}

.e{
	border-radius: 20px;
	background: #999999;
	color:white;
	padding: 20px .5px;
	margin-left:5%;
	margin-right:5%;
}

.i{
	border-radius: 20px;
	background: #999999;
	color:white;
	padding: 20px .5px;
	margin-left:5%;
	margin-right:5%;
}

.si{
	border-radius: 20px;
	background: #999999;
	color:white;
	padding: 20px .5px;
	margin-left:5%;
	margin-right:5%;
}
input{
	color:white;
}
	
header{
	background:linear-gradient(180deg, #5b039a, #283747);
	position: fixed;
	margin: 0;
	padding: 5px 0 5px 0;
	width: 100%;
	top: 0px;
}

header ul li {
	border-radius: 20px;
	background: linear-gradient(45deg, black, #800000);
	color: white;
	display: inline-block;
	list-style-type: none
	margin:0;
	padding: 1.5% 1%;
}

header ul li a {
	color: white;
}

header ul a:hover { 
	border-radius: 20px;
	background: linear-gradient(45deg, black, #800000);
	color: yellow;
	display: inline-block;
	margin:0;
	padding: 5px 5px; 
	transition: all .5s ease;
}


a:visited{
	color: #a0e3ec;
}

a:hover {
	color: #0089FF;
	transition: all .5s ease;
}

footer{
	color: white;
	padding-top: 15px
}
    </style>
    
    <body>
        <center>
        <h1>Anonymous Feedback</h1>
            <form action = "Anonfb.php" method = "post">
            <div class = "fb_incomplete"> <?php if (isset($missing_error)); ?>
            <span> <?php echo $missing_error ?> </span> </div>
            <div class="input_style">
            <p> Who is your Instructor?</p> 
            <?php
            $temp = "instructor_user";
            $sql = 'SELECT username FROM users WHERE user_type ="'.$temp.'";';
            $result = $db->query($sql);

            $list = [];
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $list .= $row["username"];
                    echo "<center><input type='radio' name='InstructorName' value= ".$row["username"].">" .$row['username'];
            }
            } else {
                echo "0 results";
            }
    
            ?>
            <p>What do you like about the instructors teaching?</p>
            <input type="text" name="Question1" placeholder="Answer"> <br>
            <p>What do you recommend the instructor do to improve their teaching?</p>
            <input type="text" name="Question2" placeholder="Answer"> <br>
            <p>What do you like about the labs?</p>
            <input type="text" name="Question3" placeholder="Answer"> <br>
            <p>What do you recomment the lab instructors to do to improve their labs teaching?</p>
            <input type="text" name="Question4" placeholder="Answer"> <br>
            </div> 
                
            <button type="submit" name="submit"> Submit </button> <br>
            <p style="color:#b85be8; "> <?php echo $Feedback_Submitted;?> </p>

            </form>
     </center>
   </body>
</html>