<?php
error_reporting(0);
session_start();
$did=$_SESSION['did'];
$cid=$_SESSION['cid'];
$cod=$_SESSION['con_id'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MY Documents</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
 <link href="css/bootswatch.css" rel="stylesheet">
  <link href="bootstrap.min.css" rel="stylesheet">
  <link href="css/main-style.css" rel="stylesheet">
  
  <!--<link href="css/bootstrap-responsive.min.css" rel="stylesheet">-->
<style type="text/css">
	
	
</style>
</head>

<body class="preview" data-spy="scroll" data-target=".subnav" data-offset="80">
 <script src="js/bsa.js"></script>
<div class="navbar navbar-fixed-top">
   <div class="navbar-inner">
     <div class="container">
       <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
       </a>
       <a class="brand" style="margin-right: 45px;margin-left: -141px;" href="index.php">[My Health Package]</a>
       <div class="nav-collapse" id="main-menu">
        <ul class="nav" id="main-menu-left">
          <li><a onClick="pageTracker._link(this.href); return false;" href="index.php">Home</a></li>
          <!--<li><a id="swatch-link" href="pres.php">Prescription</a></li>-->
          <!--<li><a id="swatch-link" href="Doctor_Profile.php">My Profile</a></li>-->
          <!--<li><a id="swatch-link" href="addpackage.php">Add Package</a></li>-->
 <!--<li><a id="swatch-link" href="mypackage.php">My Packages</a></li>-->
          <li >

            <!-- <a  href="#">Message</a></li> -->
          <!--   <ul class="dropdown-menu" id="swatch-menu">
          
              <li class="divider"></li>
              <li><a href="amelia">Amelia</a></li>
              <li><a href="cerulean">Cerulean</a></li>
             
            </ul>
          </li>
         -->  <li class="dropdown" id="preview-menu">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Keywords<b class="caret"></b></a>
            <ul class="dropdown-menu">
        

         <li><a href='mkey.php'>Add Keywords</a></li>
         
         
         
         
         
         
              <!-- <li><a target="_blank" href="bootstrap.min.css">bootstrap.min.css</a></li>
              <li><a target="_blank" href="bootstrap.css">bootstrap.css</a></li> -->
            
            </ul>
          </li>
        </ul>
     
     

  <ul class="nav" id="main-menu-left">
        
          <!--<li><a id="swatch-link" href="pres.php">Prescription</a></li>-->
          <!--<li><a id="swatch-link" href="Doctor_Profile.php">My Profile</a></li>-->
          <!--<li><a id="swatch-link" href="addpackage.php">Add Package</a></li>-->
 <!--<li><a id="swatch-link" href="mypackage.php">My Packages</a></li>-->
          <li >

            <!-- <a  href="#">Message</a></li> -->
          <!--   <ul class="dropdown-menu" id="swatch-menu">
          
              <li class="divider"></li>
              <li><a href="amelia">Amelia</a></li>
              <li><a href="cerulean">Cerulean</a></li>
             
            </ul>
          </li>
         -->  <li class="dropdown" id="preview-menu">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Statistics<b class="caret"></b></a>
            <ul class="dropdown-menu">
        



         <li><a href='Doctor_Searching_word.php'>Search Words</a></li>
         
         <li><a href='Doctor_query.php'>Search Doctors</a></li>
         
         
         
         
         
         
              <!-- <li><a target="_blank" href="bootstrap.min.css">bootstrap.min.css</a></li>
              <li><a target="_blank" href="bootstrap.css">bootstrap.css</a></li> -->
            
            </ul>
          </li>
        </ul>
     
     


        


        <ul class="nav pull-right" id="main-menu-right">
         <!-- <li><a href='#'>Statics</a></li> -->
        
        <li><a href="chngpsswd.php">Change password</a></li>
          <li><a href="logout.php">Logout <i class="icon-share-alt"></i></a></li>
        </ul>
       </div>
     </div>
   </div>
 </div>
<div class="container">
<!--	<div class="hero-unit" style="margin:0px; padding:10px 0px; text-align:left">-->
<!--    	<div class="span7">fetch value</div>-->
<!--        	<div class="span4 text-right">-->
	<!--                <form class="" style="">-->
	<!--                        <input type="text" class="input-medium search-query">-->
	<!--                        <button type="submit" class="btn btn-success">Search</button>-->
<!--                  </form>-->
<!--                  </div>-->
                  <div style="clear:both"></div>
			</div>


  
  <div style="clear:both; margin:10px 0px"></div>
    
            
