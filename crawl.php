<?php 
// set_time_limit(100000);


//  // $servername = "localhost";
//  // $username = "root";
//  // $password = "";
//  // $dbname = "sha";








// include("library/simple_html_dom.php");



// class MyCrawler extends PHPCrawler  
// { 




//   function handleDocumentInfo($DocInfo)  
//   { 


//          $url=$DocInfo->url;
//           if ($DocInfo->received == true) {
//              // $servername = "localhost";
//              // $username = "root";
//              // $password = "";
//              // $dbname = "sha";
//              //      $conn = new mysqli($servername, $username, $password, $dbname);


//              //      if ($conn->connect_error) {
//              //          die("Connection failed: " . $conn->connect_error);
//              //       }
//             if ($DocInfo->received == true)
//             {
//               $html = str_get_html($DocInfo->source);
//               echo "<b>".htmlentities($html)."</b>";
//               $heads =$html->find('h1,h2,h3,h4');
//               foreach ($heads as $head) {
//                 echo $head->plaintext.'<br>';
          
//               }
//     //           $title=$html->find('title',0)->plaintext;
//     //           $des=$html->find('.des',0)->plaintext;
//     //           $sql = "SELECT * FROM crawldata where url='".$url."'";
//     //           $refererurl = $DocInfo->referer_url;
//     //           $result = $conn->query($sql);
//     //           if ($result->num_rows > 0) {
//     //                           $row = $result->fetch_assoc();
//     //                                   if($row["title"]!=$title || $row["des"]!=$des)
//     //                                          {
//     //                                         $sql = "UPDATE crawldata SET title='".$title."', des='".$des."', refc = refc + 1 WHERE url='".$url."'";
//     //                                                  $conn->query($sql);
//     //                                      }
//     //                                      else
//     //                                      {
//     //                                       $sql = "UPDATE crawldata SET refc = refc + 1";

//     //                                         $conn->query($sql);
//     //                                      }

//     //               } 

//     //                else {

//     //                        $stmt = $conn->prepare("INSERT INTO crawldata (url,title,des) VALUES (?, ?, ?)");
//     //                           $stmt->bind_param("sss", $url, $title, $des);
//     //                             $stmt->execute();
//     //                }
//     //                $content = $html-> find("meta[name=content]",0) ->getAttribute('content');
//     //             $cont=strlen($content);
//     //             $sql="UPDATE crawldata SET i=0.3*refc+0.2*".$cont."+0.5*hitcount";
//     //             $conn->query($sql);
//                                 } 
//     //  $conn->close();
//     // flush();
//     } 
//   }  
// } 
// // $conn = new mysqli($servername, $username, $password, $dbname);
// // $sql = "UPDATE crawldata SET refc = 0";

// // $conn->query($sql);

// $crawler = new MyCrawler(); 

// $crawler->setURL("http://stackoverflow.com"); 

// $crawler->addContentTypeReceiveRule("#text/html#"); 

// $crawler->addURLFilterRule("#\.(jpg|jpeg|gif|png)$# i"); 

// $crawler->enableCookieHandling(true); 

// //for large sites use this statement 
// $crawler->setWorkingDirectory("library/ff/" ); 
// $crawler->setUrlCacheType(PHPCrawlerUrlCacheTypes::URLCACHE_SQLITE);

// //$to = "somebody@example.com";
// //$subject = "My subject";
// //$txt = "Hello world!";
// //$headers = "From: webmaster@example.com";

// //mail($to,$subject,$txt,$headers);
// $crawler->setFollowMode(0);
// $crawler->setTrafficLimit(10000000000000 * 1024); 

// $crawler->go(); 

 
// $report = $crawler->getProcessReport(); 

// if (PHP_SAPI == "cli") $lb = "\n"; 
// else $lb = "<br />"; 
//  //////all these goes to the mail    
// echo "Summary:".$lb; 
// echo "Links followed: ".$report->links_followed.$lb; 
// echo "Documents received: ".$report->files_received.$lb; 
// echo "Bytes received: ".$report->bytes_received." bytes".$lb; 
// echo "Process runtime: ".$report->process_runtime." sec".$lb; 
set_time_limit(1000);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sha";
$conn = new mysqli($servername, $username, $password, $dbname);

                    if ($conn->connect_error) 
                    {
                    die("Connection failed: " . $conn->connect_error);
                    }
include("library/simple_html_dom.php");
$url="http://geeksforgeeks.com";
crawl($url , 1,$conn);


function crawl($url , $crawlstatus,$conn)
{
      link_descriptor($url,$conn);
      while($crawlstatus)
      {
        
                    $sql = "SELECT url FROM crawldata where processed=0 limit 1";
                    $result = $conn->query($sql);
                    if ($result->num_rows == 0) 
                    {
                      $crawlstatus=0;
                      echo "No more links to follow , Please enter some another links to crawl";
                    }
                    else
                    {
                      echo "<b>ssssssssssssssssssssssssssssssssss</b>";
                        $row = $result->fetch_assoc(); 
                        link_descriptor($row['url'],$conn);
                    }

      }
}


function link_descriptor($url,$conn)
                        {      
                              $context = stream_context_create(
                    array(
                        'http' => array(
                            'follow_location' => false
                        ),
                        'ssl' => array(
                            "verify_peer"=>false,
                            "verify_peer_name"=>false,
                        ),
                    )
                );

              $html = file_get_html($url,false,$context);
              if(empty($html))
              {
                return;
              }
              $parent = parse_url($url, PHP_URL_HOST);
              $urlscheme=parse_url($url,PHP_URL_SCHEME);
              echo 'Parent: '.$parent;
              $urlhash=md5($url);
              $content='1';
              //find all the headings
              $head=$html->find('h1',0);
              //insert all the headings
               if(!empty($head))
               {
                foreach ($head as $title) {

              $stmt = $conn->prepare("INSERT INTO crawldata (urlhash,title) VALUES (?,?)");
                              $stmt->bind_param("ss",$urlhash,$title);
                                $stmt->execute();
                              }
              }
              //find all the descriptions
               $des=$html->find('p');
              //insert all the headings
               if(!empty($des))
               {
                $desc='';
                foreach ($des as $p) {
                        $desc=$desc.".....".$p;
                              }
                              $sql = "UPDATE crawldata SET desc ='".$desc."'";
                              $conn->query($sql);
                }
              //find code tags
               $code=$html->find('code');
              if(!empty($code))
              {
                    $content=$content.':2';  
              }
              //find all the img tags
                $img=$html->find('img');
              if(!empty($img))
              {
                    $content=$content.':3';  
              }
              

              //find all the outlinks
             foreach($html->find('a') as $e) 
              {
                $link=$e->href;
                $link = trim($link);  
   if (substr($link, 0, 7) !== 'http://' && substr($link, 0, 8) !== 'https://')  
   { 
    $link=$urlscheme.'://'.$parent.$link;
    echo $link.'<br>';
   } 
              $sql = "SELECT url FROM crawldata where url='".$link ."'";
              $result = $conn->query($sql);
                    if ($result->num_rows > 0) {

                          $sql = "UPDATE crawldata SET refc = refc + 1";
                          $conn->query($sql);

                  } 

                   else {
                        $link = trim($link);  
                         if (substr($link, 0, 7) !== 'http://' && substr($link, 0, 8) !== 'https://')  
                         { 
                          $link=$urlscheme.'://'.$parent.$link;
                          echo $link.'<br>';
                         } 
                           $stmt = $conn->prepare("INSERT INTO crawldata (url) VALUES (?)");
                              $stmt->bind_param("s",$link);
                                $stmt->execute();
                   }
                 }
              

             

        } 

?>




