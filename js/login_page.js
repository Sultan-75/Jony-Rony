const inputs = document.querySelectorAll(".input");

function addcl() {
  let parent = this.parentNode.parentNode;
  parent.classList.add("focus");
}

function remcl() {
  let parent = this.parentNode.parentNode;
  if (this.value == "") {
    parent.classList.remove("focus");
  }
}

inputs.forEach((input) => {
  input.addEventListener("focus", addcl);
  input.addEventListener("blur", remcl);
});

// Usesr Login
$("#loginsubmit").click(function () {
  var user_email = $("#user_email").val();
  var user_pass = $("#user_pass").val();

  var dataString = "user_email=" + user_email + "&user_pass=" + user_pass;
  $.ajax({
    type: "POST",
    url: "getlogin.php",
    data: dataString,
    success: function (data) {
      if ($.trim(data) == "empty") {
        $(".empty").show();
        setTimeout(function () {
          $(".empty").fadeOut();
        }, 3000);
        /* $(".Disable").hide(); // Not need to hide() if you used display :none.//
                    $(".eror").hide(); */
      } else if ($.trim(data) == "Disable") {
        /* $(".empty").hide();  */
        $(".Disable").show();
        setTimeout(function () {
          $(".Disable").fadeOut();
        }, 3000);
        /* $(".eror").hide();  */ // Not need to hide() if you used display :none.//
      } else if ($.trim(data) == "eror") {
        /*  $(".empty").hide(); 
                    $(".Disable").hide();  */ // Not need to hide() if you used display :none.//
        $(".eror").show();
        setTimeout(function () {
          $(".eror").fadeOut();
        }, 3000);
      } else {
        window.location = "exam.php";
      }
    },
  });
  return false;
});
