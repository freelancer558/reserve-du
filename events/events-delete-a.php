
<html>
<?php include_once "connDB.php"; ?>
<head>
<META HTTP-EQUIV="Refresh"CONTENT="0;URL=events-a.php">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Authority Page</title>
<link href="../text1.css" rel="stylesheet" type="text/css" />

<link href="../text1.css" rel="stylesheet" type="text/css" />
<link href="styles_menu.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="style.css" />
<link href="smooth-php-cal.css" rel="stylesheet" />
<script src="jquery.js" type="text/javascript"></script>
<script src="smooth-php-cal-min.js" type="text/javascript"></script>

</head>

<body>

 
  <div id="header">
    <div class="hdrl"></div>
    <div class="hdrr"></div>
  </div>

  <?php if(!empty($_POST)) require_once('smoothcalendar.php'); ?>

 <div id="content">
<?php 
require_once('smoothcalendar.php');

$id = (isset($_GET["group_id"]) && is_numeric($_GET["group_id"])) ? (int)$_GET["group_id"] : "";
?>

<div class="main-content">
  <div class="header" >
    <div class="hdrl"></div>
    <div class="hdrr"></div>
    <h2>Delete Result</h2>
  </div>
  <div class="block">
<?php

if (strcmp($id, "") != 0)
{
  $result = $calendar->hideEvent($id);
  if (isset($result["error"]))
  {
?>
      <p class="message error">
        <?php echo $result["error"]; ?>
      </p>
<?php
  }
  else
  {
?>
      <p class="message">
        Done deleting event. <?php if (isset($_SERVER["HTTP_REFERER"])) { ?><a href="<?php echo $_SERVER["HTTP_REFERER"]; ?>">go back</a><?php } ?>
      </p>
<?php
  }
}
else 
{
?>
      <p class="message error">
        There was a problem with this request.
      </p>
<?php
}
?>
  </div>
  <div class="bdrl"></div>
  <div class="bdrr"></div>
</div>
</div></td>   
  </tr>
  
  
</body>
</html>
