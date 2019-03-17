<?php

$dbServerName = "localhost";
$dbUserName = "root";
$dbPassword = "";
$dbName = "bikelabs1";

$conn = mysqli_connect($dbServerName,$dbUserName,$dbPassword,$dbName);

if(!$conn)
{
	die("Connection failed: ".mysqli_connect_error());
}