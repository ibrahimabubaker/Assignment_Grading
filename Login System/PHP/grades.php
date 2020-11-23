<?php 
include('session.php');
 ?>
<html>
<head>
    <title>Grades</title>
</head>
<header>
    <center>
    <h1>Introduction to Databases and Web Applications</h1>
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
.main_table { 
	display: table;
	width: 800px;
	border-style: groove;
	border-color: #660001;
	border-width: 10px;
	background-color: #AEB6BF; 
	box-shadow:  8px 5px 5px grey;
	margin-bottom: 70px;
	margin-top: 50px;
 }

.table_row { 
	display: table-row;
	font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	overflow: scroll;

}

.table_data { 
	display: table-row-group; 
}

.table_cell, .table_head { 
	display: table-cell;
	padding: 15px;
	border: 1px solid #CCC;

}

.table_head {
	display: table-cell;
	padding: 10px;
	background: #4b0001; 
	color: white;
	font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
}

.table_row:nth-child(odd){
	background: #dadada;
}

.table_row:hover {
	margin: 0;
	background-color: #910404;
	color: white;
	opacity: 0.9;
	transition: all 0.5s ease
}
.table_cell{
	padding:20px;
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
button {
	background-color: teal;
	color: white;
	padding: 10px;
	font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	font-size: 13px;
	border-radius: 15px;
	margin-bottom: 10px; 
	margin-top: 10px;
}

button:hover{

    transition: 0.3s;
    background-color: white;
    color:black;
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
	    <div class="main_table">
	    	<div class="table_row">
		    	<div class="table_head"> <strong> Username </strong> </div>
				<div class="table_head"> <strong> Quiz 1 </strong> </div>
				<div class="table_head"> <strong> Quiz 2 </strong> </div>
				<div class="table_head"> <strong> Quiz 3 </strong> </div>
				<div class="table_head"> <strong> A1 </strong> </div>
				<div class="table_head"> <strong> A2 </strong> </div>
				<div class="table_head"> <strong> A3 </strong> </div>
				<div class="table_head"> <strong> Labs </strong> </div>
				<div class="table_head"> <strong> Midterm </strong> </div>
				<div class="table_head"> <strong> Final </strong> </div>
	    	</div>

	    	<?php 
			$servername = "localhost";
			$username = "root";
			$password = "root";
			$dbname = "deleteMe1";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);

			$sql = "SELECT * FROM marks WHERE username ='$user_check' ";
			$result = $conn->query($sql);

		    if ($result->num_rows >0) {
		    while ($row = $result->fetch_assoc()) { 

		    echo '<div class="table_row">'.'<div class="table_cell">'.$row['username']."<br>".'<a href="remark.php">'.'<button>'."Request a Remark".'</button>'.'</a>'.'</div>'.'<div class="table_cell">'.$row['quiz1'].'</div>'.'<div class="table_cell">'.$row['quiz2']."<br>".'</div>'.'<div class="table_cell">'.$row['quiz3']."<br>".'</div>'.'<div class="table_cell">'.$row['a1']."<br>".'</div>'.'<div class="table_cell">'.$row['a2'].'</div>'.'<div class="table_cell">'.$row['a3'].'</div>'.'<div class="table_cell">'.$row['lab'].'</div>'.'<div class="table_cell">'.$row['midterm'].'</div>'.'<div class="table_cell">'.$row['exam'].'</div>'.'</div>';
		    
		    			}
		    }
		    else{

		   		 echo "0 result";
		    	}

		    if (isset($_POST['submit'])) {
		    $Quiz = $_POST['Quiz'];
		    $Asmnt = $_POST['Asmnt'];
		    $Lab = $_POST['Lab'];
		    $Midterm = $_POST['Midterm'];
		    $Exam = $_POST['Exam'];

		    $sql_req = "INSERT INTO remark (Quiz, Asmnt, Lab, Midterm, Exam)
         							VALUES ('$Quiz', '$Asmnt', '$Lab', '$Midterm', '$Exam')";
         	$result = $db->query($sql);

		    			}

		    $conn -> close(); 

	    		?>
	</center>
	

</body>
</html>
