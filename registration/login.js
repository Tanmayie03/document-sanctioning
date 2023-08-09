document.addEventListener("DOMContentLoaded", function() {
  var loginForm = document.getElementById("loginForm");
  loginForm.addEventListener("submit", function(event) {
    // Perform client-side validation
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;

    if (username === "" || password === "") {
      event.preventDefault(); // Prevent form submission if validation fails
      alert("Please enter both a username and a password.");
    }else {
      // Redirect to home.php after form submission
      window.location.href = "home.php";
    }
  });
});
