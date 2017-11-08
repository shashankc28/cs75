<?php

if(!isset($_GET['query'])){
echo json_encode([]);
exit();
}



$text=$_GET['query'];
$text = preg_replace("/\s+/", "::", $text);
$exptext=explode("::",$text);
$rquery="SELECT title from ((SELECT  title,i FROM crawldata WHERE title like '%".$exptext[0]."%'";
$k=0;
foreach($exptext as $wd)
{
	if($k==0)
	{
		$k=1;
		continue;
	}
	else
	{
		$rquery=$rquery." and title like '%".$wd."%'";		
	}
}
$rquery=$rquery.")";

$rquery=$rquery."UNION (SELECT  title,i FROM crawldata WHERE title like '%".$text."%'";

$rquery=$rquery."))as custom order by i desc ";
$db= new PDO('mysql:host=127.0.0.1;dbname=sha','root','');
$users=$db->query($rquery);
echo json_encode($users->fetchAll());

?>