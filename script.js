document.getElementById("main-cont").style.display = "block";
document.getElementById("first-pass").maxLength = "255";
document.getElementById("first-pass").minLength = "8";
document.getElementById("second-pass").maxLength = "255";
document.getElementById("second-pass").minLength = "8";
const regbtn = document.getElementById("reg-btn-active");

$("#first-pass").on("keyup", function() {
  var password = $("#first-pass").val();
  if (password.length < 8) {
    $("#first-pass").css("color", "red");
  } else if (password.length >= 8 && password.length < 15) {
    $("#first-pass").css("color", "yellow");
  } else {
    $("#first-pass").css("color", "green");
  }
  enable();
});

$("#second-pass").on("keyup", function() {
  var password = $("#second-pass").val();
  if (password.length < 8) {
    $("#second-pass").css("color", "red");
  } else if (password.length >= 5 && password.length < 15) {
    $("#second-pass").css("color", "yellow");
  } else {
    $("#second-pass").css("color", "green");
  }
  enable();
});

$("#email").on("keyup", function() {
  enable();
});

function validateEmail(email) {
  var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(String(email).toLowerCase());
}

function enable() {
  let email = $("#email").val();
  let pass1 = document.getElementById("first-pass").value;
  let pass2 = document.getElementById("second-pass").value;
  if (validateEmail(email) == true && pass1.length >= 8 && pass1 == pass2) {
    regbtn.removeAttribute("disabled");
  }
}