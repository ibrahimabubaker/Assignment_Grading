<?php
   include('session.php');
?>
<html>
    <body>
        <head>
            <title>Welcome</title>
        </head>
    <header>
        <center>
        <h1>Introduction to Databases and Web Applications</h1>
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
        
            <li> <a href="viewremarks.php">Remark</a></li>
           </ul>
        </center>
    </header>
    <center>
    <h1>Welcome <?php echo $user_check; ?></h1> 
    <form method="post" action="grades-instructor.php"><p class="button_name">View All Student Grade</p><br>
  	<input type="submit" name="Button1" value="Student Grades"><br>
	</form>
    
        <h2>Course Description</h2>
		<div class="cd">
		 A practical introduction to databases and Web app development. Databases: terminology and applications; creating, querying and updating databases; the entity-relationship model for database design. Web documents and applications: static and interactive documents; Web servers and dynamic server-generated content; Web application development and interface with databases.</div>

		<h2>Prerequisite</h2>
		<div class="pr">Some experience with programming in an imperative language such as Python, Java or C.</div>

		<h2>Exclusion</h2>
		<div class="e">This course may not be taken after - or concurrently with - any C- or D-level CSC course.</div>

		<h2>Instructor: Abbas Attarwala</h2>
		<div class="i"><strong>Email:</strong> Abbas.Attarwala@utoronto.ca <br>
			<strong>Lecture Hours:</strong>  Mondays 9am to 11am in SW 319 <br>
			<strong>Office Hours:</strong> Mondays and Fridays: 11:30am-1:15pm <br>
			<strong>Office Location:</strong> IC 478 <br>
		</div>

		<h2>Software Installation</h2>
		<div class="si">
		<ol>
			<li> Download MySQL Community edition on your computer from here: <br> <a href="">https://dev.mysql.com/downloads/mysql/</a> <br>
			During installation, a random password will be generated and presented to you as a dialog box. Make sure to save this!! You will use this later in SequelPro to connect to your database. </li>

			<li> Download SequelPro from here: <br><a href="">https://www.sequelpro.com</a></li>

			<li> If you are on Windows or Mac or Linux (you can use this 30 day trial version) <a href="">UTSC Labs</a> <br>
			https://razorsql.com/download_win.html</li>			
		</ol>

		From 2 and 3 you only require one of the other. You do not require both of them. If you want to use the command line or MySQLWorkBench these are also some other alternative. <br>

		You require 1) and 2) for your first assignment.
		</div>

        
        <footer>
	   Site design by Asad Hasan and Ibrahim Abubaker<br>
	   Faculty of Computer Science at UofT - <a href="">http://www.utsc.utoronto.ca/cms/faculty-of-computer-science</a>
        </footer>
            <style type="text/css">
        body {
	margin: 0;
	padding-top: 220px;
	background:linear-gradient(45deg, #34495E,#283747);
	font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
}

/*header{
	background:linear-gradient(45deg, #283747, #34495E);
	color: white;
	padding: 5%
	position: fixed;
}
*/

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

.button_name{
	color:white;
	font-size: 15px;
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
        </center>
    </body>
</html>