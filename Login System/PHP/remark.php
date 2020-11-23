<html>
<?php
include('session.php');


$sql = "SELECT * FROM marks WHERE username ='$user_check'";
$result = mysqli_query($db, $sql);

             
    if(isset($_POST['submit'])){
	    $student_user = $_POST['username'];
	    $q1reason = $_POST['q1reason'];
	    $q2reason = $_POST['q2reason'];
	    $q3reason = $_POST['q3reason'];
	    $a1reason = $_POST['a1reason'];
	    $a2reason = $_POST['a2reason'];
	    $a3reason = $_POST['a3reason'];
        $labreason = $_POST['labreason'];
	    $midtermreason = $_POST['midtermreason'];
	    $examreason = $_POST['examreason'];

	    if (empty($q1reason) && empty($q2reason) && empty($q3reason) && empty($a1reason) && empty($a2reason) && empty($a3reason) && empty($lab) && empty($midtermreason) && empty($examreason)) {
	    	$empty_error = "Please choose an assessment to remark";
	    }
	    else{
			$sql = "INSERT INTO remark (username, q1reason, q2reason, q3reason, a1reason, a2reason, a3reason,labreason, midtermreason, examreason) VALUES ('$student_user', '$q1reason','$q2reason', '$q3reason', '$a1reason', '$a2reason', '$a3reason','$labreason', '$midtermreason', '$examreason')";
 			$request_sent = "Your remark request has been submitted"; 
        	$result = mysqli_query($db, $sql);
	    }
	}


?>
<head>
    <title>Grades</title>
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
        <li> <a href="remark.php"> Remark </a></li>

       
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

.req{
	margin: 5px;
}

.error{
	color: red;
	font-family: "Palatino";
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
p{
	color:white;
	margin:5px;
}
.submitted{
	color: pink;
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
input{
	width: 20%; 
	display: inline-block;
	border-radius: 5px; 
	padding: 10px; 
	box-shadow:inset 0 0 2px 2px #888;
  	background: white;
	font-size: 15px;
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

    	<form name="_form" action = "remark.php" method = "post">
		 	<p class="title"> Student Username </p>
		 	<?php if (isset($name_error)); ?>
		 		<span> <?php echo $name_error ?> </span><br>
		 		<p class="error"><?php echo $empty_error; ?><p>
		 	<p class="submitted"><?php echo $request_sent; ?></p> 
            <input type="text" name="username" placeholder="Username"> <br>
            <p class="title">Quiz 1 </p><br>
           
            <input type="text" name="q1reason" placeholder="Explanation"> <br>
            <button type="submit" name="submit" value="q1reason" class="req"> Submit Request </button>
            <p class="title">Quiz 2</p><br>

            <input type="text" name="q2reason" placeholder="Explanation"> <br>
            <button type="submit" name="submit" value="q2reason" class="req"> Submit Request </button>
            <p class="title">Quiz 3</p><br>

            <input type="text" name="q3reason" placeholder="Explanation"> <br>
            <button type="submit" name="submit" value="q3reason" class="req"> Submit Request </button>
            <p class="title">Assignment 1</p><br>
  
            <input type="text" name="a1reason" placeholder="Explanation"> <br>
            <button type="submit" name="submit" value="a1reason" class="req"> Submit Request </button>
            <p class="title">Assignment 2</p><br>
  
            <input type="text" name="a2reason" placeholder="Explanation"> <br>
            <button type="submit" name="submit" value="a2reason" class="req"> Submit Request </button>
            <p class="title">Assignment 3</p><br>

            <input type="text" name="a3reason" placeholder="Explanation"> <br>
            <button type="submit" name="submit" value="a3reason" class="req"> Submit Request </button>
            <p class="title">Labs</p><br>
   
            <input type="text" name="labreason" placeholder="Explanation"> <br>
            <button type="submit" name="submit" value="labreason" class="req"> Submit Request </button>
            <p class="title">Midterm</p><br>
     
            <input type="text" name="midtermreason" placeholder="Explanation"> <br>
            <button type="submit" name="submit" value="midtermreason" class="req"> Submit Request </button>
            <p class="title">Exam</p><br>

            <input type="text" name="examreason" placeholder="Explanation"> <br>
            <button type="submit" name="submit" value="examreason" class="req"> Submit Request </button>
            </div> <br>
            <p style="color:#b85be8; "> <?php echo $Grade_Submitted;?> </p>
            <p class="title"><?php echo $grades_submitted; ?></p>
            <p class="title"><?php echo $mark_updated; ?></p>
    </form>
		

    
    </center>
</body>
</html>
