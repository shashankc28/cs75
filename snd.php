<?php


 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "sha";
$word ="prgrm";


$soundkey=soundex($word);


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
 }




                     $stmt = $conn->prepare("INSERT INTO words (word,soundkey) VALUES (?,?)");
                         $stmt->bind_param("ss", $word, $soundkey);
                       $stmt->execute();









?>