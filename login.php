
<?php
include "admin/PhpFunctions/connection.php";
if(isset($_COOKIE['userid'])){
  header("location: index.php");
  exit;
}elseif (isset($_COOKIE["email"])) {
  $email = $_COOKIE["email"];

  // Use a prepared statement to query the database
  $stmt = $connection->prepare("SELECT * FROM `wait-list` WHERE email = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();

  // Check if there are rows in the result
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
      header("location: otp.html");
      exit;
  }
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;500&#038;display=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="css/alertify.min.css" />
    <!-- include a theme -->
    <link rel="stylesheet" href="css/themes/default.min.css" />

    <link rel="stylesheet" href="css/Normalize.css" />
    <link rel="stylesheet" href="css/imagehover.min.css" />
    <link rel="stylesheet" href="css/imagehover.css" />
    <link rel="stylesheet" href="css/all.min.css" />
    <link rel="stylesheet" href="css/framework.css" />
    <link rel="stylesheet" href="css/master.css" />
    <link rel="stylesheet" href="css/bootstrapp.min.css" />
    <link rel="stylesheet" href="css/animate.min.css" />
    <link rel="stylesheet" href="css/hover.css" />
    <link rel="stylesheet" href="css/login.css" />
    <title>Login</title>
    <link rel="icon" type=" image/svg+xml" href="imgs/logo.svg" />

    <style></style>
  </head>

  <body>
    <div class="page p-relative w-100 h-100">
      <div class="pageins p-20 p-absolute">
        <div class="signin bg-white mt-30 p-30 mb-3">
          <form class="form">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label"
                >UserName Or Email address</label
              >
              <input
                required
                name="usernameORemail"
                autocomplete="off"
                style="background-color: #a6e3e9"
                type="text"
                class="form-control rad-6"
                id="exampleInputEmail1"
                aria-describedby="emailHelp"
              />
            </div>
            <div class="mb-5">
              <label for="exampleInputPassword1" class="form-label"
                >Password</label
              >
              <input
                required
                name="password"
                autocomplete="off"
                style="background-color: #9ae0ff"
                type="password"
                class="form-control"
                id="exampleInputPassword1"
              />

              <div class="d-flex justify-content-end mt-2">
                <a href="forgot.html" class="Forgetpass">Forgot Password ? </a>
              </div>
            </div>

            <button type="submit" class="btn btn-primary form-control submit">
              Login
            </button>
            <p
              class="c-red txt-c fs-13 mt-20 mb-20 passoruser password-or-user"
            >
              Your Password or Username is Wrong ,Try Again
            </p>
          </form>
        </div>

        <span class="p-10 bg-white txt-c mt-10 form-control mb-30"
          >Don't have an account?
          <a href="register.html">Create an account </a></span
        >

        <div
          class="form-control d-flex align-center justify-content-evenly footlink"
        >
          <a href="#">Terms</a>
          <a href="#">Privacy</a>
          <a href="#">Security</a>
          <a href="#">Contatcts</a>
        </div>
      </div>
    </div>

    <script src="js/alertify.min.js"></script>

    <script src="js/jquery-3.6.1.min.js"></script>
    <script>

      let submitButton = $(".submit");
      $(".form").submit(function (e) {
        e.preventDefault();
        if (
          $("#exampleInputPassword1").val().length <= 1 ||
          $("#exampleInputEmail1").val().length <= 1
        ) {
          $(".password-or-user").removeClass("passoruser");
        } else {
          $(".password-or-user").addClass("passoruser");
          $.ajax({
            method: "POST",
            url: "phpUserFuntions/checkUser.php",
            dataType: "json",
            data: {
              password: $("#exampleInputPassword1").val(),
              userNameOrEmail: $("#exampleInputEmail1").val(),
            },
            beforeSend: function () {
              $(submitButton).addClass("disabled");
            },
            success: function (response) {
              console.log(response);
              if (response.status == "error") {
                $("#exampleInputPassword1").addClass("is-invalid");
                $("#exampleInputEmail1").addClass("is-invalid");
                $("#exampleInputPassword1").removeClass("is-valid");
                $("#exampleInputEmail1").removeClass("is-valid");
                $(".password-or-user").text(response.message);
                alertify.notify(response.message, "error", 2, function () {
                  $(".password-or-user").removeClass("passoruser");
                  $(submitButton).removeClass("disabled");
                  $(submitButton).blur();
                });
              } else if (response.status == "success") {
                $("#exampleInputPassword1").removeClass("is-invalid");
                $("#exampleInputEmail1").removeClass("is-invalid");
                $("#exampleInputPassword1").addClass("is-valid");
                $("#exampleInputEmail1").addClass("is-valid");
                alertify.notify(response.message, "success", 2, function () {
                  $(submitButton).removeClass("disabled");
                  $(submitButton).blur();
                  window.location.href =
                    "setusercokiee.php?id=" + response.userId;
                });
              }
            },
          });
        }
      });
    </script>
  </body>
</html>
