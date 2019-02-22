<?php
require __DIR__."/../Config.php";

session_start();
session_destroy();

header("location:http://$root/");

?>