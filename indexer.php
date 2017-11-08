<?php
if(isset($_GET['url']))
{
    require 'core.inc.php';
    if(isset($_SESSION['ip'])&&!empty($_SESSION['ip']))
    {
        $url=$_GET['url'];
    $conn = new mysqli("localhost","root", "", "sha");
    $sql = "UPDATE crawldata SET hitcount=hitcount+1 WHERE url='".$url."'";
     $conn->query($sql);  
    $ip=$_SERVER['REMOTE_ADDR'];
    if($ip<>$_SESSION['ip'])
    {
        echo "The ip address you are using is not same as the one which requested this page. please go to the search page and try again.";
        die();
    }
    
    if (!in_array($url, $_SESSION['urls']))
    {
    array_push($_SESSION['urls'], $url);
    }
    else
    {

      header("Location:".$url);  
        die();
    }
    $count=count($_SESSION['urls']);
    print_r( $_SESSION['urls']);
    echo "count=".$count;
      
     if ($conn->connect_error) 
     {
        echo "If you are not automatically redirected to the page you requested please click <a href='".$url."'>here</a> ";
        die();
     } 
     
     $i=1;
     foreach ($_SESSION['urls'] as $urll) {
         if($i==$count)
         {
            $sql = "UPDATE crawldata SET i = i + 0.7 WHERE url='".$urll."'";
            $res=$conn->query($sql);
         }
         else if($i==$count-1)
         {
            $sql = "UPDATE crawldata SET i = i - 0.5 WHERE url='".$urll."'";
            $res=$conn->query($sql);
         }
         $i=$i+1;
         
     }
                if ($res === TRUE) 
                {
                header("Location:".$url);
                }
                else
                {
                echo "If you are not automatically redirected to the page you requested please click <a href='".$url."'>here</a> ";
                die();
                }
  }
}
else
{
    echo "we did not receive any url to redirect you please go back to the search page and try again!";
}

?>