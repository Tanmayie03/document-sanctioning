document.addEventListener("DOMContentLoaded", function() {
  var formSubmitted = false; 
  var form = document.getElementById("qForm");
  form.addEventListener("submit", function(event) {
    if (formSubmitted) {
      event.preventDefault();
      return;
    }
    formSubmitted = true;
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var message = document.getElementById("message").value;
  
    var xhr = new XMLHttpRequest();
    xhr.open("POST", form.action, true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4) {
        if (xhr.status === 200) {
          console.log("Data stored successfully!");
          window.location.href = "query.php";
        } else {
          console.log("Error storing data.");
          formSubmitted = false; // Reset the formSubmitted flag
        }
      }
    };
    xhr.send("name=" + encodeURIComponent(name) + "&email=" + encodeURIComponent(email) + "&message=" + encodeURIComponent(message));
  });
});

function updateDateTime() {
    var currentDate = new Date();
    var dateElement = document.getElementById("date");
    var timeElement = document.getElementById("time");
    var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    var formattedDate = currentDate.toLocaleDateString(undefined, options);
    var formattedTime = currentDate.toLocaleTimeString();
    dateElement.textContent =  formattedDate;
    timeElement.textContent =  formattedTime;
  }
  
  updateDateTime();
  setInterval(updateDateTime, 1000);
      