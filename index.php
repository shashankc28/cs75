<!DOCTYPE html>
<html lang="en">
<head>
  <title>cs75</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/global.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<style type="text/css">
body , html{
  font : 1em "Lato" , sans-serif;
}
input{
  font:inherit;
}


.tt-menu{
  width: 100%;
  background-color:#fff;
  border: 1px solid #bbb;
  border-top: 0;
  padding: 0;
}
.tt-input:focus{
  outline:none;
}

.tt-suggestion{
  padding: 5px 10px;
  margin:0;
  cursor:pointer;
}

.tt-suggestion p{
  margin:5px 0;
}

.tt-suggestion.tt-cursor,.tt-suggestion:hover {

  background-color:#ddd;
}
.tt-hint{
  color:#bbb;
}


input[type="text"] {
  width: 100%;
  height: 35px;
  font-size: 20px;
  display: inline-block;
  font-weight:0.5px;
  border: none;
  outline: none;
  padding: 3px;
  border-bottom: 1px solid #BBB;
  padding-right: 1px;
  background: none;
  z-index: 9;
  cursor: default;
}
  
#custom-search-input {
        margin:0;
        margin-top: 10px;
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
        left: -30px;
        bottom:  -5px ;
        /* IE7-8 doesn't have border-radius, so don't indent the padding */
        margin-bottom: 0;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        color:#D9230F;
    }
</style>


</head>
<body id="sha">
<!-- header -->
	
<br><br><br><br><br><br><br><br><br><br><br><br>
  <form action="search.php" method="get">

<div class="container">
<div class="col-sm-4"></div>
<div class="col-sm-4">
  <div class="row">
           <div id="custom-search-input">
                            <div class="col-xs-12">
                                <input type="text" id="q" name="q" spellcheck="true" class="form-control" placeholder="Search" autofocus="true" />
                                <input type="hidden" name="content" id="content" value=''>
                                 <button type="submit" class="btn btn-info">
    <span class="glyphicon glyphicon-search"></span> 
  </button>
                            </div>
                        </div>
  </div>
</div>
<div class="col-sm-4">
  </div>
</div>

	</form>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
<script src="js/typeahead.js"></script>
<script src="js/global.js"></script>

</body>
</html>