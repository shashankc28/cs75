<?php
include("library/simple_html_dom.php");

$content="";
$html = str_get_html('');
foreach($html->find('title') as $element) 
       echo $element . '<br>';

?>