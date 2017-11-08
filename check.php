<?php
   $words = array("and", "is", "the", "me", "he", "she", "our", "they", "their", "there", "his", "her", "because", "are", "will", "be", "to", "from", "we", "i", "am", "was", "were", "do", "did", "does", "all", "in", "into", "us", "of", "it", "on", "a", "with", "for", "now", "then", "so", "why", "what", "when", "an","at","how","this","or","my","but","as","also","like","by","not","too","thus","that","although","if","may","unlike","program","perform");
$text=" <h1>hello i am hello sort</h1>";
$text=htmlentities($text);

$text=" ".$text." ";

	    foreach($words as $strip)
	    {
		$text = preg_replace("/\s". $strip ."\s/i", " ", $text);
	}
	echo $text."<br>"; 



?>