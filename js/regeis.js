(async () => {
  let uniqueUser, uniqueEmail, confirmPass;

  $("#fname").keypress(function (event) {
    if (isNaN(event.key) || event.keyCode == 8 || event.keyCode == 32) {
    } else {
      event.preventDefault();
    }
  });

  $(".phonenum").keypress(function (event) {
    if (isNaN(event.key)) {
      event.preventDefault();
    } else if (event.key != 1 && $(".phonenum").val().length == 0) {
      event.preventDefault();
    }
  });

  $("#vpassword").keyup(function () {
    if ($("#vpassword").val() != $("#password").val()) {
      // $(".wrong-pass").css("display", "block");
      document.querySelector(".wrong-pass").style.display = "block";
      confirmPass = false;
      $("#vpassword").removeClass("is-valid");
      $("#vpassword").addClass("is-invalid");
    } else {
      $(".wrong-pass").css("display", "none");
      confirmPass = true;
      $("#vpassword").addClass("is-valid");
      $("#vpassword").removeClass("is-invalid");
    }
  });

  $("#password").keyup(function () {
    if ($("#vpassword").val().length > 0) {
      if ($("#vpassword").val() != $("#password").val()) {
        // $(".wrong-pass").css("display", "block");
        document.querySelector(".wrong-pass").style.display = "block";
        confirmPass = false;
        $("#vpassword").removeClass("is-valid");
        $("#vpassword").addClass("is-invalid");
      } else {
        $(".wrong-pass").css("display", "none");
        confirmPass = true;
        $("#vpassword").addClass("is-valid");
        $("#vpassword").removeClass("is-invalid");
      }
    }
  });

  $("#submit").click(function (event) {
    if ($("#vpassword").val() != $("#password").val()) {
      event.preventDefault();
    }
  });

  $("#username").blur(function () {
    $.ajax({
      method: "POST",
      url: "phpUserFuntions/checkUniqueUser.php",

      dataType: "json",
      data: {
        username: $("#username").val(),
      },
      beforeSend: function () {
        $(".usernameerror").html(`<div className="spinner-border" role="status">
  <span className="visually-hidden">Checking for username...</span>
</div>`);
        $(".usernameerror").css("display", "block");
      },
      success: function (response, st, xhr) {
        console.log(response);
        $(".usernameerror").html(response.message);
        console.log(response.status);
        $(".usernameerror").css("display", "block");

        if (response.status == "sucsess") {
          console.log("sucssess");
          uniqueUser = true;
          $("#username").removeClass("is-invalid");
          $("#username").addClass("is-valid");
          $(".servererror").css("display", "none");
        } else if (response.status == "error") {
          uniqueUser = false;
          $("#username").addClass("is-invalid");
          $("#username").removeClass("is-valid");
        }
      },
      error: function (xhr, status, err) {},
    });
  });

  $("#email").blur(function () {
    $.ajax({
      method: "POST",
      url: "phpUserFuntions/checkUniqueEmail.php",

      dataType: "json",
      data: {
        email: $("#email").val(),
      },
      beforeSend: function () {
        $(".emailerror").html(`<div className="spinner-border" role="status">
  <span className="visually-hidden">Checking for E-mail...</span>
</div>`);
        $(".emailerror").css("display", "block");
      },
      success: function (response, st, xhr) {
        console.log(response);
        $(".emailerror").html(response.message);
        $(".emailerror").css("display", "block");
        if (response.status == "sucsess") {
          uniqueEmail = true;
          $(".servererror").css("display", "none");
          $("#email").removeClass("is-invalid");
          $("#email").addClass("is-valid");
        } else if (response.status == "error") {
          uniqueEmail = false;
          $("#email").addClass("is-invalid");
          $("#email").removeClass("is-valid");
        }
      },
      error: function (xhr, status, err) {},
    });
  });

  $("form").submit(function (event) {
    console.log("Submit");
    event.preventDefault();
    let fullName = $("#fname").val();
    let userName = $("#username").val();
    let email = $("#email").val();
    let gender = parseInt($('input[name="gender"]:checked').val());
    let inPassword = $("#password").val();
    // let phoneNumber = $(".phonenum").val();

    let obData = {
      username: userName,
      email: email,
      password: inPassword,
      fullname: fullName,
      gender: gender || "1",
      // phone: phoneNumber,
    };

    // if (phoneNumber.length == 0) {
    //   delete obData.phone;
    // }
    // let jsonData = JSON.stringify(obData);

    if (uniqueEmail && uniqueUser) {
      $(".servererror").css("display", "none");
      $.ajax({
        method: "POST",
        url: "phpUserFuntions/waitlistemail.php",

        dataType: "json",
        data: obData,
        beforeSend: function () {
          $("#submit").addClass("disabled");
        },
        success: function (response, st, xhr) {
          console.log(response);

          if (response.status == "error") {
            $(".password-or-user").text(response.message);
            alertify.notify(response.message, "error", 2, function () {
              $(".password-or-user").removeClass("servererror");
              $("#submit").removeClass("disabled");
              $("#submit").blur();
            });
          } else if (response.status == "succses") {
            if (!$(".password-or-user").hasClass("servererror")) {
              $(".password-or-user").addClass("servererror");
            }
            alertify.notify(response.message, "success", 2, function () {
              $("#submit").removeClass("disabled");
              $("#submit").blur();
              window.location.href = "otp.html";
            });
          }
        },
        error: function (xhr, status, err) {},
      });
    } else {
      $(".servererror").text("Check your inputs agian");
      $(".servererror").css("display", "block");
    }
  });
})();
