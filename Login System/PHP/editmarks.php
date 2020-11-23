<!DOCTYPE html>
<html>
<?php 
include('session.php');
 
if(isset($_POST['submit'])){
      $student_user = $_POST['username'];
      $q1 = $_POST['quiz1'];
      $q2 = $_POST['quiz2'];
      $q3 = $_POST['quiz3'];
      $a1 = $_POST['a1'];
      $a2 = $_POST['a2'];
      $a3 = $_POST['a3'];
      $lab = $_POST['lab'];
      $midterm = $_POST['midterm'];
      $exam = $_POST['exam'];

      $sql = "SELECT * FROM marks WHERE username ='$student_user' ";

      $result = mysqli_query($db, $sql);
      $count = mysqli_num_rows($result); 

      //check if the student already exists in the database, if so update marks
      if ($count == 1) {

      	//if there is data in the input on quiz 1
      	//create a second page that is designed for only editing marks 
      	//create a first page that is meant to store all of the marks 
      	if(!empty($q1)){
      		//if $q1 is an integer input
      		if(is_numeric($q1)){
      		    $sql =	"UPDATE marks SET quiz1='$q1' WHERE username='$student_user' ";
      			$result = mysqli_query($db, $sql);
      			$q1_updated = "Quiz 1 Mark Updated Successfully";
      		}else{
      			$invalid_q1 = "Please input valid numbers"; 
      		}
      	} 
      	elseif(!empty($q2)){
      		if (is_numeric($q2)) {

      	      	$sql =	"UPDATE marks SET quiz2='$q2' WHERE username='$student_user' ";
      			$result = mysqli_query($db, $sql);
      			$q2_updated = "Quiz 2 Mark Updated Successfully";
      		}else{
      			$invalid_q2 = "Please input valid numbers";
      		}
      	}
      	elseif(!empty($q3)){
      		if (is_numeric($q3)) {
	      		$sql =	"UPDATE marks SET quiz3='$q3' WHERE username='$student_user' ";
	      		$result = mysqli_query($db, $sql);
	      		$q3_updated = "Quiz 3 Mark Updated Successfully";
      		}else{
      			$invalid_q3 = "Please input valid numbers";
      		}
      	}
      	elseif(!empty($a1)){
      		if (is_numeric($a1)) {
      			$sql =	"UPDATE marks SET a1='$a1' WHERE username='$student_user' ";
	      		$result = mysqli_query($db, $sql);
	      		$a1_updated = "Assignment 1 Mark Updated Successfully";
      		}else{
      			$invalid_a1 = "Please input valid numbers";
      		}
      	}
      	elseif(!empty($a2)){
      		if (is_numeric($a2)) {
      			$sql =	"UPDATE marks SET a2='$a2' WHERE username='$student_user' ";
      			$result = mysqli_query($db, $sql);
      			$a2_updated = "Assignment 2 Mark Updated Successfully";
      		}else{
      			$invalid_a2 = "Please input valid numbers";
      		}

      	}
      	elseif(!empty($a3)){
      		if (is_numeric($a3)) {
      			$sql =	"UPDATE marks SET a3='$a3' WHERE username='$student_user'";
      			$result = mysqli_query($db, $sql);
      			$a3_updated = "Assignment 3 Mark Updated Successfully";
      		}else{
      			$invalid_a3 = "Please input valid numbers";
      		}
     
      	}
      	elseif(!empty($lab)){
      		if (is_numeric($lab)) {
      			$sql =	"UPDATE marks SET lab='$lab' WHERE username='$student_user' ";
      			$result = mysqli_query($db, $sql);
      			$lab_updated = "Lab Mark Updated Successfully";
      		}else{
      			$invalid_lab = "Please input valid numbers";
      		}
   
      	}
      	elseif(!empty($midterm)){
      		if (is_numeric($midterm)) {
      			$sql =	"UPDATE marks SET midterm='$midterm' WHERE username='$student_user' ";
      			$result = mysqli_query($db, $sql);
      			$midterm_updated = "Midterm Mark Updated Successfully";
      		}else{
      			$invalid_midterm = "Please input valid numbers";
      		}
  
      	}
      	elseif(!empty($exam)){
      		if (is_numeric($exam)) {
      			$sql =	"UPDATE marks SET exam='$exam' WHERE username='$student_user' ";
      			$result = mysqli_query($db, $sql);
      			$exam_updated = "Final Exam Mark Updated Successfully";
      		}else{
      			$invalid_exam = "Please input valid numbers";
      		}
      	}
      	
      } else{
      	$sql = "INSERT INTO marks (username, quiz1, quiz2, quiz3, a1, a2, a3, lab, midterm, exam)
      		VALUES ('$student_user', '$q1', '$q2', '$q3', '$a1', '$a2', '$a3', '$lab', '$midterm', '$exam')";
      		$result = mysqli_query($db, $sql);
      		$grades_submitted = "Grades Sumbitted Successfully";
      		header("Location: grades-instructor.php"); 
      }
  }

 ?>
<head>
	<title></title>
</head>
 <header>
         <center>
				<h1>CSCB20 - Introduction to Databases and Web Applications</h1>
                 <h2><a href = "logout.php"> Sign Out</a></h2>
				<ul>
			        <li> <a href="welcomeinstructor.php">Home</a></li>
			        <li> <a href="https://portal.utoronto.ca/webapps/blackboard/execute/announcement?method=search&context=course_entry&course_id=_933761_1&handle=announcements_entry&mode=view">Announcements</a></li>
			        <li> <a href="Course Team I.php">Course Team</a></li>
			        <li> <a href="http://www.utsc.utoronto.ca/iits/computer-labs">UTSC Labs</a></li>
			        <li> <a href="Labs I.php">Lab Exercises</a></li>
			        <li> <a href="https://portal.utoronto.ca/bbcswebdav/pid-6516914-dt-content-rid-42416760_2/courses/Winter-2018-CSCB20H3-S-LEC01/CSCB20CourseSyllabus.pdf">Syllabus</a></li>
			        <li> <a href="instructor-feedback.php">Feedback</a></li>
			        <li> <a href="Assignments I.php">Assignments</a></li>
			        <li> <a href="https://markus.utsc.utoronto.ca/cscb20w18/?locale=en"> Markus </a></li>
			        <li> <a href="https://piazza.com/class/jcpjjp5l4bywd?cid=155">Piazza</a></li>
                    <li> <a href="viewremarks.php">Remark</a></li>
				</ul>
            </center>
        </header>
     <style type="text/css">
        body {
	margin: 0;
	padding-top: 220px;
	background:linear-gradient(45deg, #34495E,#283747);
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


.cd{
	border-radius: 20px;
	background: #999999;
	color:white;
	padding: 20px .5px;
	margin-left:5%;
	margin-right:5%;
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
.title{
	color: white;
}
.invalid{
	color:red;
}
.updated{
	color: cyan;
}
p.
button[type="submit"]{
	width: 20%;
	display: inline-block;
	border-radius: 5px; 
	margin-top: 10px;
	padding: 7px;
}

input{
	width: 20%; 
	display: inline-block;
	border-radius: 5px; 
	padding: 10px; 
	box-shadow:inset 0 0 2px 2px #888;
  	background: white;
	font-size: 15px;
}

header{
	background:linear-gradient(180deg, #5b039a, #283747);
	position: fixed;
	margin: 0;
	padding: 5px 0 5px 0;
	width: 100%;
	top: 0px;
	margin-bottom: 50px;
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

	<form name="grade_form" action = "editmarks.php" method = "post">
		 	<p class="title"> Student Username </p>
		 	<?php if (isset($name_error)); ?>
		 		<span> <?php echo $name_error ?> </span>
            <input type="text" name="username" placeholder="Username"> <br>
        
            <p class="title">Quiz 1 </p>
            <p class="updated"><?php echo $q1_updated; ?></p>
            <p class="invalid"><?php echo $invalid_q1; ?></p>
            <input type="text" name="quiz1" placeholder="Mark"> <br>
            <button type="submit" name="submit" value="quiz1"> Edit This Grade </button>
            <p class="title">Quiz 2</p>
            <p class="updated"><?php echo $q2_updated; ?></p>
            <p class="invalid"><?php echo $invalid_q2; ?></p>
            <input type="text" name="quiz2" placeholder="Mark"> <br>
            <button type="submit" name="submit" value="quiz2"> Edit This Grade </button>
            <p class="title">Quiz 3</p>
            <p class="updated"><?php echo $q3_updated; ?></p>
            <p class="invalid"><?php echo $invalid_q3; ?></p>
            <input type="text" name="quiz3" placeholder="Mark"> <br>
            <button type="submit" name="submit" value="quiz3"> Edit This Grade </button>
            <p class="title">Assignment 1</p>
            <p class="updated"><?php echo $a1_updated; ?></p>
            <p class="invalid"><?php echo $invalid_a1; ?></p>
            <input type="text" name="a1" placeholder="Mark"> <br>
            <button type="submit" name="submit" value="a1"> Edit This Grade </button>
            <p class="title">Assignment 2</p>
            <p class="updated"><?php echo $a2_updated; ?></p>
            <p class="invalid"><?php echo $invalid_a2; ?></p>
            <input type="text" name="a2" placeholder="Mark"> <br>
            <button type="submit" name="submit" value="a2"> Edit This Grade </button>
            <p class="title">Assignment 3</p>
            <p class="updated"><?php echo $a3_updated; ?></p>
            <p class="invalid"><?php echo $invalid_a3; ?></p>
            <input type="text" name="a3" placeholder="Mark"> <br>
            <button type="submit" name="submit" value="a3"> Edit This Grade </button>
            <p class="title">Labs</p>
            <p class="updated"><?php echo $lab_updated; ?></p>
            <p class="invalid"><?php echo $invalid_lab; ?></p>
            <input type="text" name="lab" placeholder="Mark"> <br>
            <button type="submit" name="submit" value="lab"> Edit This Grade </button>
            <p class="title">Midterm</p>
            <p class="updated"><?php echo $midterm_updated; ?></p>
            <p class="invalid"><?php echo $invalid_midterm; ?></p>
            <input type="text" name="midterm" placeholder="Mark"> <br>
            <button type="submit" name="submit" value="midterm"> Edit This Grade </button>
            <p class="title">Exam</p>
            <p class="invalid"><?php echo $invalid_exam; ?></p>
            <input type="text" name="exam" placeholder="Mark"> <br>
            <button type="submit" name="submit" value="exam"> Edit This Grade </button>
            </div> <br>
            <p style="color:#b85be8; "> <?php echo $Grade_Submitted;?> </p>
            <p class="title"><?php echo $grades_submitted; ?></p>
            <p class="title"><?php echo $mark_updated; ?></p>
    </form>
		
	</center>
	
</body>
</html>

