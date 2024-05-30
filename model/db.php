<?php
$server = "localhost"; //127.0.0.1
$dbuser = "root";
$dbpass = "";
$dbname = "charms";
$con = mysqli_connect($server, $dbuser, $dbpass, $dbname);
if (!$con) {
  die("unable to connect");
}

function login_model($username, $password)
{
  $con = mysqli_connect("localhost", "root", "", "charms");
  $rs = null;

  // some sort of statement
  //$pst = $con->prepare("SELECT id, account_type, verified_status FROM users WHERE username = ? AND password = ?");

  return $rs;
}

function request_model()
{
  $con = mysqli_connect("localhost", "root", "", "charms");

  $pst = $con->prepare("SELECT id, account_type, verified_status FROM users WHERE username = ? AND password = ?");
  $pst->bind_param("ss", $username, $password);
}

function email_exists_db(): bool
{
  return false;
}

function username_exists_db(): bool
{
  return false;
}

function register_alumni_db(): bool
{
  return true;
}

function register_faculty_db(): bool
{
  return true;
}

function register_employer_db(): bool
{
  return true;
}

function manage_table_model()
{
}
