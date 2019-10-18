$(document).ready(function() {
  //popup-login
  $(".form-login").submit(function(e) {
    $(".form-login-login").addClass("hide");

    e.preventDefault();
    email = $(this)
      .find("input[name=email]")
      .val();
    password = $(this)
      .find("input[name=password]")
      .val();
    $.ajax({
      method: "POST",
      url: rootURL + "login/api",
      data: {
        user: {
          email,
          password
        }
      },
      dataType: "json"
    })
      .done(function(result) {
        window.location.reload();
      })
      .fail(function(err) {
        $(".form-login-login").removeClass("hide");
      })
      .always(function() {});
  });

  var modal = document.getElementById("modalLogin");
  var span = document.getElementsByClassName("close")[0];
  $(".openPopupLogin").on("click", function() {
    modal.style.display = "block";
  });
  span.onclick = function() {
    modal.style.display = "none";
  };
  //[END] popup-login

  //[END] popup-update-info
  var modalUpdateInfo = document.getElementById("modalUpdateInfo");

  let isShowUpdateInfo = getCookie("isShowUpdateInfo");
  if (isShowUpdateInfo === "1") {
    modalUpdateInfo.style.display = "block";
  }

  $("#modalUpdateInfo .skip").click(function() {
    modalUpdateInfo.style.display = "none";
    document.cookie =
      "isShowUpdateInfo=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
  });

  $("#modalUpdateInfo .form-update-info a").click(function() {
    document.cookie =
      "isShowUpdateInfo=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
  });
  //[END] popup-update-info

  window.onclick = function(event) {
    if (event.target == modal || event.target == modalUpdateInfo) {
      modal.style.display = "none";
    }

    $target = $(event.target);
  };

  function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(";");
    for (var i = 0; i < ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == " ") {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }
});