<?php
session_start();
require_once(dirname(__DIR__) . "/model/db.php");
require_once(dirname(__DIR__) . "/utilities.php");

$data = file_get_contents("php://input");
$dataset = json_decode($data, true);

if (!is_null($dataset)) {
  if (array_key_exists("context", $dataset)) {
    switch ($dataset['context']) {
      case ('refreshManage'):
        echo json_encode(refresh_manage_table());
        break;
    }
  }
}

function refresh_manage_table()
{
  $username = $_SESSION['username'];
  $rs = manage_table_model($username);
  // TODO manipulate result set
  $position = [
    ['position' => 'Operations Manager', 'slotAmount' => 2, 'jobType' => 'Full-Time', 'location' => 'Chicago', 'workHours' => '40 Hours/Week'],
    ['position' => 'Software Engineer', 'slotAmount' => 5, 'jobType' => 'Full-Time', 'location' => 'New York', 'workHours' => '40 Hours/Week'],
    ['position' => 'Graphic Designer', 'slotAmount' => 3, 'jobType' => 'Part-Time', 'location' => 'San Francisco', 'workHours' => '20 Hours/Week'],
    ['position' => 'IT Support Tech', 'slotAmount' => 4, 'jobType' => 'Contract', 'location' => 'Miami', 'workHours' => '30 Hours/Week'],
    ['position' => 'Financial Analyst', 'slotAmount' => 2, 'jobType' => 'Full-Time', 'location' => 'Seattle', 'workHours' => '40 Hours/Week']
  ];

  return $position;
}
