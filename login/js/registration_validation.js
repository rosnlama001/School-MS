// function msgreset() {
//   $(this).on("input", function () {
//     $("#" + msg).text("");
//   })
//   return;
// }
$("document").ready(function () {
  var username_state = false;
  var email_state = false;
  var pass_state = false;
  $("#userName").on("blur", function () {
    $(this).on("input", function () {
      $("#" + msg).text("");
    })
    var msg = "userNameMsg";
    var username = $(this).val();
    var pattern = /^[A-Za-z]{2,}$/;
    if (username == "") {
      username_state = false;
      $("#" + msg).attr("class", "danger").text("ユーザー名は空白にしないでください。")
      return;
    }
    $.ajax({
      url: "../php/process.php",
      type: "post",
      data: {
        username_check: 1,
        username: username,
      },
      success: function (response) {
        if (response == "exist") {
          username_state = false;
          $("#" + msg).attr("class", "danger").html("ユーザー名はすでに存在しています。")
        } else if (response == "available") {
          if (!pattern.test(username)) {
            username_state = false;
            $("#" + msg).attr("class", "danger").text("ユーザー名は文字のみにする必要があります。")
          } else {
            username_state = true;
            $("#" + msg).attr("class", "success").text("ユーザー名が利用可能です。")
          }
        }
      },
    });
  });

  $("#regeMail").on("blur", function () {
    $(this).on("input", function () {
      $("#" + msg).text("");
    })
    var msg = "emailMsg";
    var email = $(this).val();
    var pattern = /^[\w]+@sms.com$/;
    if (email == "") {
      email_state = false;
      $("#" + msg).attr("class", "danger").text("メールは空白にしないでください。")
      return;
    }
    $.ajax({
      url: "../php/process.php",
      type: "post",
      data: {
        email_check: 1,
        email: email,
      },
      success: function (response) {
        if (response == "exist") {
          email_state = false;
          $("#" + msg).attr("class", "danger").text("メールはすでに存在しています。")
        } else if (response == "available") {
          if (!pattern.test(email)) {
            email_state = false;
            $("#" + msg).attr("class", "danger").text("メールは例よにお書きください。")
          } else {
            email_state = true;
            $("#" + msg).attr("class", "success").text("ユーザー名が利用可能です。")
          }
        }
      },
    });
  });

  $("#regpass").on("blur", function () {
    $(this).on("input", function () {
      $("#" + msg).text("");
    })
    var msg = "passMsg";
    var pass = $(this).val();
    var pattern = /^[\w\W]{8,15}$/;
    if (pass == "") {
      pass_state = false;
      $("#" + msg).attr("class", "danger").text("パスワードは空白にしないでください。")
    } else if (!pattern.test(pass)) {
      $("#" + msg).attr("class", "danger").text("パスワードは8〜15文字で入力してください。")
    } else {
      pass_state = true;
      $("#" + msg).attr("class", "success").text("パスワードが利用可能です。")
      return;
    }
  });
  $("#regbtn").on("click", function () {
    console.log("clicked")
    var status = $("#stat").val();
    var username = $("#userName").val();
    var email = $("#regeMail").val();
    var pass = $("#regpass").val();
    if (
      username_state == false ||
      email_state == false ||
      pass_state == false
    ) {
      console.log("finish all");
    } else {
      console.log(status);
      console.log(email);
      console.log(pass);
      // proceed with form submission
      $.ajax({
        url: "../php/process.php",
        type: "post",
        data: {
          reg: 1,
          status: status,
          username: username,
          email: email,
          pass: pass,
        },
        success: function (response) {
          if (response == "saved") {
            $(location).attr("href", "../html/otp.php");
          }
        },
      });
    }
  });
});
