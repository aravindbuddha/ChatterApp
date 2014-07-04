/*
Name:ChatterEngine.js
Description:ChatterEngine Main file
Date:
Author:
*/
var ChatterEngine = (function() {
  var
  $loginForm = "",
    $email = "",
    $pass = "",
    $submit = "";
  return {
    init: function() {
      this.buildUI();
    },
    buildUI: function() {
      this.buildLoginUI();
    },
    buildLoginUI: function() {
      var html =
        '<form method="post" action="" class="login" id="login-form">' +
        ' <p>' +
        '  <label for="email">Email:</label>' +
        '  <input type="text" name="email" id="email" >' +
        ' </p>' +
        ' <p>' +
        '  <label for="password">Password:</label>' +
        '  <input type="password" name="password" id="password" >' +
        ' </p>' +
        ' <p class="login-submit">' +
        '  <button type="submit" class="login-button" id="login-btn">Login</button>' +
        ' </p>' +
        ' <p class="forgot-password"><a href="index.html">Forgot your password?</a>' +
        '  <a href="register.html" id="register">Register</a>' +
        ' </p>' +
        '</form>';
      $('body').html(html);
      this.LoginUIEvents();
    },
    //Login element event handling
    LoginUIEvents: function() {
      $loginForm = $("#login-form");
      $email = $('#email');
      $pass = $("#pass");
      $submit = $('#login-btn');
      $loginForm.on('submit', function() {

      });
    }
  }
}());

ChatterEngine.init();