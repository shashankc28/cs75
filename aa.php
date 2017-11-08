<?php
$files= array('');
if ($handle = opendir('./ff')) {
$i=0;
    while (false !== ($entry = readdir($handle))) {

        if ($entry != "." && $entry != "..") {

           
            $files[$i]=$entry;
           $i++;
        }
    }

    closedir($handle);
}
$k=0;
print_r($files);
 foreach ($files as $fl) {
 	$myfile = fopen("library.php", "r") or die("Unable to open file!");

$filecontent='';
while(!feof($myfile)) {
  $filecontent=$filecontent.fgets($myfile);
}

  $myfile1 = fopen("./ff/".$fl, "r") or die("Unable to open file!");
$filecontent1='';
while(!feof($myfile1)) {
  $filecontent1=$filecontent1.fgets($myfile1);
}
$filecontent=htmlentities($filecontent);
  $filecontent = str_replace("::::::::::", "<code>".$filecontent1."</code>", $filecontent);
  $filecontent =html_entity_decode($filecontent);
  	$k++;
  $my = fopen("./ccss/lib".$k.".php", "w") or die("Unable to open file!");
fwrite($my, $filecontent);
fclose($my);
fclose($myfile1);
fclose($myfile);
 }
?>