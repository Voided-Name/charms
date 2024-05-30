<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="../css/style.css" rel="stylesheet">
  <link href="../node_modules/animate.css/animate.css" rel="stylesheet">
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
    import '../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js';
  </script>
</head>

<body class="d-flex row align-items-center bg-light" onload="registerOnload()">
  <div class="custom-shape-divider-top-1716877928 g-0">
    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
      <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" class="shape-fill"></path>
    </svg>
  </div>
  <div class="pattern g-0"></div>
  <form id="signUpForm" method="post" onload="loadAnimate()" class="signForm bg-opacity-50 m-auto row g-3 border border-3 bg-light border-primary-subtle rounded col shadow ">
    <div id="title1" class="col-12 text-center text-primary-emphasis">
      <h1>Register</h1>
    </div>
    <div id="title2" class="col-12 text-center text-primary-emphasis" style="display: none">
      <h1>Personal Information</h1>
    </div>
    <div id="title3" class="col-12 text-center text-primary-emphasis" style="display: none">
      <h1>Role</h1>
    </div>

    <div class="col-6" id="divInputEmail">
      <label for="inputEmail" class="form-label">Email</label>
      <input type="email" class="form-control" id="inputEmail" required>
    </div>
    <div class="col-6" id="divInputUsername">
      <label for="inputUsername" class="form-label">Username</label>
      <input type="text" class="form-control" id="inputUsername" required>
    </div>
    <div class="col-6" id="divInputPassword">
      <label for="inputPassword" class="form-label">Password</label>
      <input type="password" class="form-control" id="inputPassword" required>
    </div>
    <div class="col-6" id="divInputCPassword">
      <label for="inputCPassword" class="form-label">Confirm Password</label>
      <input type="password" class="form-control" id="inputCPassword" required>
    </div>

    <div class="col-6" id="divInputFName" style="display: none;">
      <label for="inputFName" class="form-label">First Name</label>
      <input type="text" class="form-control" id="inputFName" placeholder="Mark" required>
    </div>
    <div class="col-6" id="divInputLName" style="display: none;">
      <label for="inputLName" class="form-label">Last Name</label>
      <input type="text" class="form-control" id="inputLName" placeholder="Santos" required>
    </div>
    <div class="col-12" id="divInputAddress" style="display: none;">
      <label for="inputAddress" class="form-label">Address</label>
      <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" required>
    </div>
    <div class="col-6" id="divInputCPNumber" style="display: none;">
      <label for="inputCPNum" class="form-label">Contact Number</label>
      <input type="text" class="form-control" id="inputCPNum" placeholder="09XXXXXXXXX" maxlength="11" required>
    </div>
    <div class="col-6" id="divInputBDate" style="display: none;">
      <label for="inputBDate" class="form-label">Birth Date</label>
      <input id="inputBDate" class="form-control" type="date" required />
    </div>

    <div class="col-12" id="divInputRole" style="display: none;">
      <label for="inputRole" class="form-label">Role</label>
      <select id="inputRole" class="form-select">
        <option value="1">Alumni</option>
        <option value="2">Employer</option>
        <option value="3">Faculty</option>
      </select>
    </div>

    <div class="col-12" id="divInputSID" style="display: none;">
      <label for="inputSID" class="form-label">Student ID</label>
      <input type="text" class="form-control" id="inputSID">
    </div>
    <div class="col-6" id="divInputEID" style="display: none;">
      <label for="inputEID" class="form-label">Employer ID</label>
      <input type="text" class="form-control" id="inputEID">
    </div>
    <div class="col-6" id="divInputCompanyName" style="display: none;">
      <label for="inputCompanyName" class="form-label">Company Name</label>
      <input type="text" class="form-control" id="inputCompanyName">
    </div>
    <div class="col-12" id="divInputFID" style="display: none;">
      <label for="inputFID" class="form-label">Faculty ID</label>
      <input type="text" class="form-control" id="inputFID">
    </div>

    <div class="col-12" id="termsNCondition" style="display: none;">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="gridCheck">
        <label class="form-check-label" for="gridCheck">
          Terms and Conditions
        </label>
      </div>
    </div>

    <div id="signUpAlert" class="alert alert-danger alert-dismissible d-none" role="alert">
    </div>

    <div class="col-6" id="divBackBtn1">
      <button type="button" id="backBtn1" class="btn btn-primary" disabled>Back</button>
    </div>
    <div class="col-6 text-end" id="divNextBtn1">
      <button type="button" id="nextBtn1" class="btn btn-primary" onclick="next1()">Next</button>
    </div>
    <div class="col-6" style="display: none;" id="divBackBtn2">
      <button type="button" id="backBtn2" class="btn btn-primary" onclick="back2()">Back</button>
    </div>
    <div class="col-6 text-end" style="display: none;" id="divNextBtn2">
      <button type="button" id="nextBtn2" class="btn btn-primary" onclick="next2()">Next</button>
    </div>
    <div class="col-6" style="display: none;" id="divBackBtn3">
      <button type="button" id="backBtn3" class="btn btn-primary" onclick="back3()">Back</button>
    </div>
    <div class="col-6 text-end" style="display: none;" id="divNextBtn3">
      <button type="button" id="nextBtn3" class="btn btn-primary" disabled>Next</button>
    </div>
    <div class="text-center col-12">
      <div id="registerLoading" class="spinner-border text-secondary text-center m-auto" role="status" style="display: none">
        <span class="visually-hidden">Loading...</span>
      </div>
    </div>
    <div class="col-12 text-center" id="divSignUpBtn" style="display: none;">
      <button type="button" id="signUpBtn" class="btn btn-primary" onclick="register()">Sign Up</button>
    </div>
    <a href="../index.php" class="link-secondary link-underline-opacity-10 link-underline-opacity-50-hover text-center">Login Instead</a>
  </form>

  <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="registerModalTitle">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div id="registerModalBody" class="modal-body">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <script defer src="../app.js"></script>
</body>

</html>
