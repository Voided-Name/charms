<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="../css/style.css" rel="stylesheet">
  <link href="../node_modules/animate.css/animate.css" rel="stylesheet">
  <script type="module">
    import '../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js';
  </script>
  <script>
    async function refreshManageVacancies() {
      const table = document.getElementById("manageVacanciesTable");
      const tbody = document.getElementById("manageVacanciesTbody");
      let newTbody = document.createElement('tbody');

      employerRequest = {
        "context": "refreshManage",
      }

      await fetch("../controller/employerController.php", {
        "method": "POST",
        "headers": {
          "Content-Type": "application/json; charset=utf-8"
        },
        "body": JSON.stringify(employerRequest),
      }).then(function(response) {
        return response.json();
      }).then(function(data) {
        data.forEach(function(item, index) {
          const row = newTbody.insertRow();
          row.insertCell(0).textContent = index + 1; // Assuming # is an auto-incrementing index
          row.insertCell(1).textContent = item.position;
          row.insertCell(2).textContent = item.slotAmount;
          row.insertCell(3).textContent = item.jobType;
          row.insertCell(4).textContent = item.location;
          row.insertCell(5).textContent = item.workHours;
        })
      }).catch(error => {
        console.error("Err", error);
      })

      table.replaceChild(newTbody, tbody);
    }
  </script>
</head>

<body onload="refreshManageVacancies()">
  <nav class="navbar navbar-expand-lg bg-body-tertiary py-2 m-auto">
    <div class="container-fluid row">
      <a class="navbar-brand col-4" href="#">
        <img src="../img/logoCharms.png" width="30" height="30">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse col-8" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Job Vacancies</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Announcements</a>
          </li>
        </ul>
        <div class="dropdown">
          <img class="btn btn-secondary dropdown-toggle img-responsive" role="button" type="button" data-bs-toggle="dropdown" aria-expanded="false" alt="Profile">
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="#">Account</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item text-danger" href="#">Log Out</a></li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="manage-vacancies-tab" data-bs-toggle="tab" data-bs-target="#manage-vacancies-pane" type="button" role="tab" aria-controls="manage-vacancies-pane" aria-selected="true">Manage</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="create-vacancies-tab" data-bs-toggle="tab" data-bs-target="#create-vacancies-pane" type="button" role="tab" aria-controls="create-vacancies-pane" aria-selected="false">Create</button>
    </li>
  </ul>
  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active " id="manage-vacancies-pane" role="tabpanel" aria-labelledby="manage-vacancies" tabindex="0">
      <div class="container row m-auto my-4 bg-secondary-subtle p-3 rounded-1 gap-3">
        <div class="col bg-primary bg-gradient text-light rounded-3 text-center ">
          <h3>Total Vacancies</h3>
          <h2 class="fw-bold">5</h2>
        </div>
        <div class="col bg-success bg-gradient text-light rounded-3 text-center ">
          <h3>Applications Received</h3>
          <h2 class="fw-bold">5</h2>
        </div>
      </div>
      <table id="manageVacanciesTable" class="table table-primary table-striped">
        <thead>
          <tr>
            <th scope=" col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Position</th>
            <th scope="col">Slot</th>
            <th scope="col">Location</th>
            <th scope="col">Work Hours</th>
          </tr>
        </thead>
        <tbody id="manageVacanciesTbody">
        </tbody>
      </table>
      <div class="container row mx-5  rounded-1 gap-5 d-flex justify-content-center">
        <div class="col container"></div>
        <div class="col-3 bg-dark bg-gradient text-light rounded-3 text-center d-flex justify-content-center align-items-center">
          <h4 class="align-items-center">Edit</h4>
        </div>
        <div class="col-3 bg-dark bg-gradient text-light rounded-3 text-center d-flex justify-content-center align-items-center">
          <h4>Delete</h4>
        </div>
        <div class="col-3 bg-dark bg-gradient text-light rounded-3 text-center d-flex justify-content-center align-items-center">
          <h4>View Applications</h4>
        </div>
      </div>
    </div>
    <div class="tab-pane fade" id="create-vacancies-pane" role="tabpanel" aria-labelledby="create-vacancies" tabindex="0">
    </div>
  </div>
</body>

</html>
