
<?php
require 'core.inc.php';
if(isset($_GET['q']))
{
$ip=$_SERVER['REMOTE_ADDR'];
$_SESSION['ip']=$ip;
$_SESSION['urls']=array();
$content='';
$content=$_GET['content'];
$text=$_GET['q'];
$text=htmlentities($text);
$showtext=$text;
$start = microtime(true);
// $words = array("and", "is", "the", "me", "he", "she", "our", "they", "their", "there", "his", "her", "because", "are", "will", "be", "to", "from", "we", "i", "am", "was", "were", "do", "did", "does", "all", "in", "into", "us", "of", "it", "on", "a", "with", "for", "now", "then", "so", "why", "what", "when", "an","at","how","this","or","my","but","as","also","like","by","not","too","thus","that","although","if","may","unlike");
// $count=0;
// $text=" ".$text." ";

//       foreach($words as $strip)
//       {
//     $text = preg_replace("/\s". $strip ."\s/i", " ", $text);
//   }
$text=trim($text);
if($text!="")
{
#$text = preg_replace("/\s+/", "::", $text);
$exptext=explode(" ",$text);

$rquery="Select * from(SELECT url,des,title,i,content,if(MATCH (title) AGAINST ('%".$exptext[0]."%'),1,0)"; 
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
    $rquery=$rquery."+ if(MATCH (title) AGAINST  ('%".$wd."%'),1,0)";    
  }
}

$rquery=$rquery."as weight from crawldata order by weight desc,i desc)as custom where weight>0 and content like '%".$content."%' limit 10";

$db= new PDO('mysql:host=127.0.0.1;dbname=sha','root','');
$result=$db->prepare($rquery);
$result->execute();
$count=$result->rowCount();
}
sam:
$end = microtime(true);
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <title>cs75</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/global.css">

<script>
$(function () {
  $('[data-toggle="popover"]').popover()
})
function updatefeed(idgrab)
{
if(window.XMLHttpRequest){
xmlhttp= new XMLHttpRequest();
}
else{
xmlhttp= new ActiveXObject('Microsoft.XMLHTTP');
}

xmlhttp.onreadystatechange = function(){
if(xmlhttp.readyState == 4  && xmlhttp.status == 200)
{
document.getElementById('feedresp').innerHTML = xmlhttp.responseText;
}
}

 xmlhttp.open('GET' , 'feedinp.php?url='+idgrab.id+'&value='+document.getElementById(idgrab.id).checked , true);
 xmlhttp.send();
}
</script>

<script src="js/typeahead.js"></script>
<script src="js/global.js"></script>
<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover(); 
});
</script>
<style>


.tgl {
  display: none;
}
.tgl, .tgl:after, .tgl:before, .tgl *, .tgl *:after, .tgl *:before, .tgl + .tgl-btn {
  box-sizing: border-box;
}
.tgl::-moz-selection, .tgl:after::-moz-selection, .tgl:before::-moz-selection, .tgl *::-moz-selection, .tgl *:after::-moz-selection, .tgl *:before::-moz-selection, .tgl + .tgl-btn::-moz-selection {
  background: none;
}
.tgl::selection, .tgl:after::selection, .tgl:before::selection, .tgl *::selection, .tgl *:after::selection, .tgl *:before::selection, .tgl + .tgl-btn::selection {
  background: none;
}
 .tgl + .tgl-btn {
 	display: inline-flex;
	text-align: center;
	margin-top: -45px;
	top: 32px;
  outline: 0;
  width: 3em;
  height: 3em;
  position: relative;
  cursor: pointer;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
}
.tgl + .tgl-btn:after, .tgl + .tgl-btn:before {
  content: "";
  width: 10%;
  height: 30%;
}
.tgl + .tgl-btn:after {
  left: 0;
}
.tgl + .tgl-btn:before {
  display: none;
}
.tgl:checked + .tgl-btn:after {
  left: 50%;
}
.tgl-flip + .tgl-btn {
  padding: 2px;
  -webkit-transition: all .2s ease;
  transition: all .2s ease;
  font-family: sans-serif;
  -webkit-perspective: 100px;
          perspective: 100px;
}
.tgl-flip + .tgl-btn:after, .tgl-flip + .tgl-btn:before {
  display: inline-block;
  -webkit-transition: all .4s ease;
  transition: all .4s ease;
  width: 100%;
  text-align: center;
  position: absolute;
  line-height: 1em;
  font-weight: bold;
  color: #fff;
  position: absolute;
  top: -50;
  left: 0;
  -webkit-backface-visibility: hidden;
          backface-visibility: hidden;
  border-radius: 4px;
}
.tgl-flip + .tgl-btn:after {
  content: attr(data-tg-on);
  background: #02C66F;
  -webkit-transform: rotateY(-180deg);
          transform: rotateY(-180deg);
}
.tgl-flip + .tgl-btn:before {
  background: #FF3A19;
  content: attr(data-tg-off);
}
.tgl-flip + .tgl-btn:active:before {
  -webkit-transform: rotateY(-20deg);
          transform: rotateY(-20deg);
}
.tgl-flip:checked + .tgl-btn:before {
  -webkit-transform: rotateY(180deg);
          transform: rotateY(180deg);
}
.tgl-flip:checked + .tgl-btn:after {
  -webkit-transform: rotateY(0);
          transform: rotateY(0);
  left: 0;
  background: #7FC6A6;
}
.tgl-flip:checked + .tgl-btn:active:after {
  -webkit-transform: rotateY(20deg);
          transform: rotateY(20deg);
}

#foot2
{
  visibility: hidden;
}
#menu{
  color:  #660000;
  text-decoration: none;
  float:center;
}


a:hover {
text-decoration: none;
border-bottom: 0.5px solid;
padding: 0;
margin: 0;
}

.glyphicon.glyphicon-th {
    font-size: 25px;
}
.popover {
    -moz-border-radius: 0;
    -webkit-border-radius: 0;
    border-radius: 0;
}
.popover-content {
      width: 400px;
      height: 500px;
      overflow: auto;
    }
  .nav-pills > .active > a{
  	color: #3366ff !important;
    background-color: transparent !important;
    text-decoration: none;
   border-radius:0px;
   border-bottom-width: 4px;
   border-bottom-style: solid;
   border-bottom-color:  #660000;
  }

  .nav-pills > .active > a:hover{
  	color: #3366ff !important;
    background-color: transparent !important;
    text-decoration: none;
   border-radius:0px;
   border-bottom-width: 4px;
   border-bottom-style: solid;
   border-bottom-color:  #660000;
  }
   .nav-pills > li > a:hover {
    color: #000 !important;
    background-color: transparent !important;
    text-decoration: none;
   border-radius:0px;
 
         }
    .nav-pills > li > a{
    border-radius:0px;
    font-size: 13px;
     }
input[type="text"]:hover{
outline: none;
box-shadow: 0px 5px 10px rgba(0,0,0,0.15);
 cursor: auto;
}
input[type="text"]:focus::after{
outline: none;
box-shadow: 0px 5px 8px rgba(0,0,0,0.15);
border:1px solid #5AB0DB;
}

input[type="text"] {
box-shadow: 0 1px 2px rgba(0,0,0,0.15);
  transition: box-shadow 0.2s ease-in-out;
  width: 300%;
  height: 40px;
  font-size: 20px;
  display: inline-block;
  font-weight:0.5px;
  border: none;
  outline: none;
  padding: 3px;
  border-bottom: 1px solid #BBB;
  padding-right: 1px;
  background: transparent !important;
  z-index: 9;
  cursor: default;
}


  
#custom-search-input {
        margin:0;
        margin-top: 20px;
        padding: 0;
    }
 
 
    #custom-search-input button {
      z-index: 10;
        border: 0;
        background: none;
        /** belows styles are working good */
        padding: 2px 2px;
        margin-top: 2px;
        position: relative;
        left: 400px;
        bottom:  -8px ;
        /* IE7-8 doesn't have border-radius, so don't indent the padding */
        margin-bottom: 0;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        color: #660000;
    }


    @media only screen and (max-width: 1000px) {
    #menu,#icon {
        display: none;
    }
    #q{
      width: 180%;
    }
    #custom-search-input button {
    left: 130px;
  }
  .tt-menu{
  width: 180%;
}
#foot1{
  visibility: hidden;

}
#foot2
{
  visibility: visible;
}

}
</style>



</head>
<body id="sha">
<!-- header -->
<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>

  <form action="search.php" method="get">

<div class="container col-sm-12" style ='background-color: rgb(248, 248, 248); border-bottom: 1px solid rgb(225, 225, 225);'>
  <div class="row">
           <div id="custom-search-input">
                            
                            <div id="icon" class="container col-sm-2">
                            <img src="images/cs751.png" alt="cs75" width="160px" height="55px" style="margin-top: -20px;margin-left: 25px;margin-bottom: -60px;">
                            </div>
                            <div class="container col-sm-7">
                                <input type="text" oninvalid="this.setCustomValidity('Please enter something to search')" oninput="setCustomValidity('')" required id="q" name="q" class="" spellcheck="true" value="<?php  echo $showtext ?>"/>
                                
                                 <button type="submit" id="searchbutton" data-toggle="tooltip" data-placement="bottom" title="Press to Search" class="btn btn-info">
    <span class="glyphicon glyphicon-search"></span> 
  </button>
  </div>
  <div class="container col-sm-2">
                  
<a href="#" id="menu" data-toggle="popover"  data-placement="bottom" data-html="true"  data-content="<div><b>Example popover</b><br> - content</div>" ><span style ='padding-top: 10px; float: right;' class="glyphicon glyphicon-th"></span></a>

                            </div>
                            <div class="container col-sm-1"></div>
                            </div>
                        </div>

<div class="container col-sm-2">
                            
                            </div>
                            <input type="hidden" value="<?php echo $content;?>" name="content" id="content">

<ul class="nav nav-pills">
  <li class="<?php if($content==''){echo 'active';}?>"><a href="search.php?q=<?php echo $showtext;?>&content=">All</a></li>
  <li class="<?php if($content=='1'){echo 'active';}?>"><a href="search.php?q=<?php echo $showtext;?>&content=1">Videos</a></li>
  <li class="<?php if($content=='2'){echo 'active';}?>"><a href="search.php?q=<?php echo $showtext;?>&content=2">Topics</a></li>
  <li class="<?php if($content=='3'){echo 'active';}?>"><a href="search.php?q=<?php echo $showtext;?>&content=3">Blog</a></li>
</ul>


</div>
	</form>

<div class="container col-sm-12">
<div class="container col-sm-2">
                           
 </div>
 <div class="container col-sm-6" style ='padding-left: 30px;'>
 <p style ='color:#9c9696; font-size: 14px; padding-top: 10px;'><?php echo 'Showing results in <b>'.($end-$start).' </b> seconds' ;?></p>
<div style ='padding-top: 25px;'></div>


<?php
if($count>'0')
              {
              while($row = $result->fetch(PDO::FETCH_ASSOC))
               {
                ?>


              <div id="chk">
              <a href="indexer.php?url=<?php echo $row['url']; ?> " target="_blank" onclick="return showcheck(<?php echo $row['url']; ?>);" style='color:  #660000;font-weight: 20px ;font-size: 18px;'>

              <?php
              echo $row['title'].' </a><input class="tgl tgl-flip" id="'.$row['url'].'" value="yes" type="checkbox" title="Press to Search" onclick="return updatefeed(this);"/>
    <label class="tgl-btn" data-tg-off="Nope" data-tg-on="Yeah!" for="'.$row['url'].'"> </label><br>';
              ?>
             
				</div>
              <p style='color: #264d00; font-size: 13px;'>
              <?php
              echo $row['url'];
              $expcontent=explode(":",$row['content']);
              foreach ( $expcontent as $cc) {
              if ($cc==1) {
               echo '<span style="font-size:7px;margin-left:2px;margin-right:2px;bottom:-8px; " class="label label-default">Text</span>';
                continue;
              }
              else if($cc==2){
                echo '<span style="font-size:7px;margin-left:2px;margin-right:2px;margin-top:-5px;" class="label label-success">Code</span>';
                continue;
              }
              else if($cc==3){
                echo '<span style="font-size:7px;margin-left:2px;margin-right:2px;" class="label label-primary">Video</span>';
                continue;
              }
              else if($cc==4){
               echo '<span style="font-size:7px;margin-left:2px;margin-right:2px;" class="label label-info">Blog</span>';
                continue;
              }
              }
              echo '<br>';

              ?></p>
              <p style='color:  #413f41; font-size: 15px;margin-top: -9px;'>
               <?php

              echo $row['des'].'...<br><br>';
              ?> 

              </p>

              <?php
              }
}
else
{
echo "<h3>No search result found for the query :<b>".$showtext."</b></h3><br><br>";
echo "<b>Options:</b><br>";
echo "&nbsp&nbsp&nbsp<b>1:-</b>  Please check the spelling of the words you have typed.<br>";
echo "&nbsp&nbsp&nbsp<b>2:-</b>  Two words might be missing a space between them.<br>";
echo "&nbsp&nbsp&nbsp<b>3:-</b>  The query you typed was not found in any of the documents.<br>";
echo "&nbsp&nbsp&nbsp<b>4:-</b>  Your input contains only spaces or connector words like a,an,the...<br>";
}
}
else
{
header('Location: index.php');
}
?>

<div style="margin-bottom: 50px"></div>
</div>
<div class="container col-sm-4">
<p style="position: relative; top: 100px;"><pre><code><b>Disclaimer:</b> <br>You can flip the button given next to every link if the page satisfied your query , this will help us providing better results in future.. </pre></code></p>
</div>
</div>

<footer style="
    position:fixed;
    height:30px;
    bottom:0px;
    left:0px;
    right:0px;
">
<div class="container col-sm-12" style ='background-color: rgb(248, 248, 248);border-top: 1px solid rgb(230, 230, 230);'>

<div id="foot1" style="view: inline-block; text-decoration: none;font-size: 15px;margin-top: 2px;margin-left: 50px;">
  <a style="margin-left:20px;margin-right:20px;" href="#">Terms</a>
  <a style="margin-left:20px;margin-right:20px;" href="#">Privacy Policy</a>
  <a style="margin-left:20px;margin-right:20px;" href="#">Services</a>
  <a style="margin-left:20px;margin-right:20px;" href="#">Copyrights</a>
  <p style="color: #660000;padding-right: 10px;font-size: 14px;text-shadow: 10em; text-align:right;float: right;">Your ip address for this session is: <b><?php  echo " ".$ip; ?></p>
</div>
<div id="foot2">
  <a style="margin-left:5px;margin-right:5px;" href="#">Home</a>
  <a style="margin-left:5px;margin-right:5px;" href="#">Copyrights</a>
</div>
</div>
</footer>
</body>
</html>