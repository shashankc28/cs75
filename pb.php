<?php 

 
set_time_limit(100); 




include("library/PHPCrawler.class.php"); 
include("library/simple_html_dom.php");

class MyCrawler extends PHPCrawler  
{ 
  function handleDocumentInfo($DocInfo)  
  { 
         $url=$DocInfo->url;
     if (PHP_SAPI == "cli") $lb = "\n";
    else $lb = "<br />";

    // Print the URL and the HTTP-status-Code
    
    
    // Print the refering URL
    

          if ($DocInfo->received == true) {
          	  
               $html = str_get_html($DocInfo->source);
              $title=$html->find('title',0)->plaintext;
              $des=$html->find('.des',0)->plaintext;
              //	$myfile=fopen("./crawled files/$title.txt","w");
               //foreach($html->find('code') as $element)
               //{ 
               //$outstring = $element->plaintext . $lb;
               //echo $outstring;
              // fwrite($myfile,$outstring);
        // }
           //echo $lb.$lb.$lb.$lb;
          		echo $title;
          		echo $url.$lb.$lb;
              echo $des.$lb.$lb;
            // fwrite($myfile,$code);
            // fclose($myfile);
                                 }   
     
    flush(); 
  }  
} 



$crawler = new MyCrawler(); 



$crawler->setURL("http://www.cs75.in"); 


$crawler->addContentTypeReceiveRule("#text/html#"); 

$crawler->addURLFilterRule("#\.(jpg|jpeg|gif|png)$# i"); 


$crawler->enableCookieHandling(true); 


$crawler->setTrafficLimit(10000000 * 1024); 

$crawler->go(); 

 
$report = $crawler->getProcessReport(); 

if (PHP_SAPI == "cli") $lb = "\n"; 
else $lb = "<br />"; 
 //////all these goes to the mail    
echo "Summary:".$lb; 
echo "Links followed: ".$report->links_followed.$lb; 
echo "Documents received: ".$report->files_received.$lb; 
echo "Bytes received: ".$report->bytes_received." bytes".$lb; 
echo "Process runtime: ".$report->process_runtime." sec".$lb;  
?>




