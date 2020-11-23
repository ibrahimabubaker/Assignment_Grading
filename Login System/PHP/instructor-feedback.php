
<?php 
include('session.php');
?>
<html>
    <head>
      <title>Anonymous Feedback</title>
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
         
         <li> <a href="viewremarks.php">Remark</a>
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

.mainn_table { 
  display: table;
  width: 600px;
  border-style: groove;
  border-color: #660001;
  border-width: 10px;
  background-color: #AEB6BF; 
  box-shadow:  8px 5px 5px grey;
  margin-bottom: 70px;
  margin-left: 50px; 
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

.table_cell{
  padding: 5px;
  color: black;
  margin-left: 10px;
  text-align: left;
  width: 100px;
}

.table_row { 
  display: table-row;
  font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;

}

  ::-webkit-scrollbar {
    width: 0.5px;
    height: 1px; 

}
::-webkit-scrollbar-track {
    border-radius: 3px;
}
::-webkit-scrollbar-thumb {
    border-radius: 10px;
    -webkit-box-shadow: inset 0 0 3px rgba(0,0,0,1); 
}

::-webkit-scrollbar-thumb:hover {

  transition: 0.2s;  
  background: rgba(56, 205, 250, 1); 
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
        <h1>Your Feedback</h1>
      </center>

      <div class="mainn_table">
        <div class="table_row">
          <div class="table_head"> <strong> Question 1 </strong> </div>
          <div class="table_head"> <strong> Question 2 </strong> </div>
          <div class="table_head"> <strong> Question 3 </strong> </div>
          <div class="table_head"> <strong> Question 4 </strong> </div>
        </div>


        <?php 
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "deleteMe1";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    $sql = "SELECT * FROM feedback WHERE InstructorName='$user_check' ";
    $result = $conn->query($sql);

      if ($result->num_rows >0) {
      while ($row = $result->fetch_assoc()) { 

      echo '<div class="table_row">'.'<div class="table_cell">'.$row['Question1'].'</div>'.'<div class="table_cell">'.$row['Question2'].'</div>'.'<div class="table_cell">'.$row['Question3'].'</div>'.'<div class="table_cell">'.$row['Question4'].'</div>'.'</div>';
            }
      }
      else{

         echo "0 result";
        }

      $conn -> close(); 

            ?>

      </div>






   </body>
</html>