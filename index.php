<?php
session_start();
?>
<!doctype html>

<html lang="en" data-bs-theme="light">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="css/style.css" rel="stylesheet">
  <link href="node_modules/animate.css/animate.css" rel="stylesheet">
  <style>
    html,
    body {
      height: 100%;
    }

    .signForm {
      max-width: 500px;
      padding: 1rem;
    }

    .signLogo {
      max-width: 500px;
    }

    .pattern {
      height: 100vh;
      z-index: -2;
      opacity: 0.3;
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      background-image: radial-gradient(#444cf7 1px, #e5e5f7 1px);
      background-size: 20px 20px;

    }

    .custom-shape-divider-top-1716877928 {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      overflow: hidden;
      line-height: 0;
      z-index: -1;
      transform: rotate(180deg);
    }

    .custom-shape-divider-top-1716877928 svg {
      position: relative;
      display: block;
      width: calc(159% + 1.3px);
      height: 148px;
    }

    .custom-shape-divider-top-1716877928 .shape-fill {
      fill: #5174db;
    }

    .animate__animated .animate__pulse {
      --animate-duration: 0.25;
    }
  </style>
  <script type="module">
    import './node_modules/bootstrap/dist/js/bootstrap.bundle.min.js';
  </script>
</head>

<body class="d-flex row align-items-center">
  <div class="custom-shape-divider-top-1716877928 g-0">
    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
      <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" class="shape-fill"></path>
    </svg>
  </div>
  <div class="pattern g-0"></div>
  <form id="loginForm" method="post" class="signForm bg-opacity-50 m-auto row g-3 border border-3 border-primary-subtle rounded col shadow ">
    <div id="title" class="col-12 text-center text-primary-emphasis">
      <h1>Login</h1>
    </div>
    <div class="col-12" id="divInputUsername">
      <label for="inputUsernameLog" class="form-label">Username</label>
      <input type="text" class="form-control" id="inputUsernameLog" required>
    </div>
    <div class="col-12" id="divInputPassword">
      <label for="inputPasswordLog" class="form-label">Password</label>
      <input type="password" class="form-control" id="inputPasswordLog" required>
    </div>
    <div id="loginAlert" class="alert alert-danger alert-dismissible d-none" role="alert">
    </div>
    <div class="text-center col-12">
      <div id="loginLoading" class="spinner-border text-secondary text-center m-auto" role="status" style="display: none">
        <span class="visually-hidden">Loading...</span>
      </div>
    </div>
    <div class="col-12 text-center" id="divLoginBtn">
      <button type="button" id="loginBtn" class="btn btn-primary" onclick="loginNext()">Continue</button>
    </div>
    <a href="view/register.php" class="link-underline-opacity-10 link-secondary link-underline-opacity-50-hover text-center">Sign Up Instead</a>
  </form>
  <!--
  <div class="modal fade" id="loginModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="loginModalTitle">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div id="loginModalBody" class="modal-body">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  -->
  <script defer src="app.js"></script>
  <script>
    async function loginNext() {
      let username = document.getElementById("inputUsernameLog").value;
      let password = document.getElementById("inputPasswordLog").value;
      let logged = false;
      let role = 0;
      let errors = [];

      if (!password || !username) {
        if (!username) {
          addDanger("inputUsernameLog");
        }
        if (!password) {
          addDanger("inputPasswordLog");
        }
        errors.push("Fill-up all fields");
      }

      let login_request = {
        "username": username,
        "password": password,
        "context": "login",
      };

      await fetch("controller/auth.php", {
        "method": "POST",
        "headers": {
          "Content-Type": "application/json; charset=utf-8"
        },
        "body": JSON.stringify(login_request),
      }).then(function(response) {
        return response.json();
      }).then(function(data) {
        if (!data[0]) {
          addDanger("inputUsernameLog");
          addDanger("inputPasswordLog");
        } else {
          logged = true;
          role = data[1];
        }
      }).catch(error => {
        console.error("Err", error);
      })

      if (errors.length > 0) {
        shakeForm(document.getElementById("loginForm"));
        showErrors(errors, "loginAlert");
      } else if (logged == false) {
        shakeForm(document.getElementById("loginForm"));
      } else {
        switch (role) {
          case (1):
            window.location.href = "view/employer.php";
            break;
          case (2):
            window.location.href = "view/alumni.php";
            break;
          case (3):
            window.location.href = "view/faculty.php";
            break;
          case (4):
            window.location.href = "view/admin.php";
            break;
        }
      }
    }
  </script>
</body>

</html>
