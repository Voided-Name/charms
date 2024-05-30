<?php
require_once(dirname(__DIR__) . "/model/db.php");
require_once(dirname(__DIR__) . "/utilities.php");

$data = file_get_contents("php://input");
$dataset = json_decode($data, true);

if (!is_null($dataset)) {
  if (array_key_exists("context", $dataset)) {
    switch ($dataset['context']) {
      case ('refreshManage'):
        $username = $dataset['username'];
    }
  }
}

function login_controller($username, $password)
{
  $rs = login_model($username, $password);
  // TODO interact with result set

  $loginSuccess = true;
  $role = 1;

  if ($loginSuccess) {
    $_SESSION['username'] = $username;
    $_SESSION['role'] = $role;
  }

  return [$loginSuccess, $role];
}

function register_controller($dataset)
{
  $rs = null;
  switch ($dataset['specContext']) {
    case ('registerAlumni');
      $rs = register_alumni_db();
      break;
    case ('registerFaculty');
      $rs = register_faculty_db();
      break;
    case ('registerEmployer');
      $rs = register_employer_db();
      break;
  }
  // TODO interact with result set

  return [true];
}
