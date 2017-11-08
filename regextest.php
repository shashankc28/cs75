<?php


 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "sha";
 $word ="shashank";



$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
 }



 	  SELECT * FROM crawldata WHERE title like'%sort%' or  title like'%quick%' or title like'%hello%'
      $stmt = $conn->prepare("SELECT * FROM crawldata WHERE title RLIKE ?");
      $stmt->bind_param("s", $word);
      $result=$stmt->execute();
  echo 'hii111i';
if ($result->num_rows > 0) {
 echo 'hii222i';
        $row = $result->fetch_assoc();
              echo $row["title"];
              echo $row["des"];
                }                          







?>