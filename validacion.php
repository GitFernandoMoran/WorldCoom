<?php
if(!isset( $_SESSION ['admin']))
{
    include("head_sec.php");
    include ('login.php');
    include("foot_sec.php");
    die();
}
?>