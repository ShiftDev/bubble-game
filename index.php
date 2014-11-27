<?php
include_once('inc/config.php');
//include_once('inc/DB.inc.php');
//include_once('inc/fbsdk.inc.php');
include_once('inc/applogic.php');

//page routing
$route = 'register';
if ( isset($_REQUEST['r']) )
{
    $route = $_REQUEST['r'];
}

// isRegisteredUser
if ( isRegisteredUser( $fb_user_id, $fb_user_email ) )
{
    $route = 'init';
}

// actions
if ( isset($_REQUEST['action']) )
{
    if ( $_REQUEST['action'] == 'register' )
    {
        print '<p>register action. register the user and update database. If valid, redirect user to next step. Click to go <a href="index.php?r=intro">next</a></p>';
        
        if ( registerTheUser( $_REQUEST['email'] ) )
        {
            //header('location:index.php?r=intro');
        }
    }
}
?>
<!DOCTYPE>
<html>

<head>

<title><?php print TITLE; ?></title>
    
<link href="css/styles.css" rel="stylesheet" type="text/css" />
    
<script src="js/libs/jquery.min.js" type="text/javascript"></script>
    
</head>
    
<body>
    
    <div id="wrapper">
        
        <?php include_once($route.'.php'); ?>
    
    </div> <!--/wrapper-->

</body>
</html>