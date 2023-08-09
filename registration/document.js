function openDialog() {
  document.getElementById("dialogueBox").style.display = "block";
  document.getElementById("detailsTable").style.display = "none";
}

function handleRequest(event) {
  event.preventDefault(); // Prevent the default form submission

  var docName = document.getElementById("docName").value;
  var descript = document.getElementById("descript").value;
  var authenticate = document.getElementById("authenticate").value;

  console.log("Document Name: " + docName);
  console.log("Description: " + descript);
  console.log("Authentication: " + authenticate);

  addRowToTable(docName, descript, authenticate); // Add the data to the table

  closeDialog();
}

function closeDialog() {
  document.getElementById("dialogueBox").style.display = "none";
  document.getElementById("detailsTable").style.display = "table";
}

function addRowToTable(docName, descript, authenticate) {
  var tableBody = document.getElementById("detailsTableBody");
  var newRow = tableBody.insertRow();
  var cell1 = newRow.insertCell(0);
  cell1.textContent = docName;
  var cell2 = newRow.insertCell(1);
  cell2.textContent = descript;
  var cell3 = newRow.insertCell(2);
  cell3.textContent = authenticate;
}


function updateDateTime() {
  var currentDate = new Date();
  var dateElement = document.getElementById("date");
  var timeElement = document.getElementById("time");
  var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
  var formattedDate = currentDate.toLocaleDateString(undefined, options);
  var formattedTime = currentDate.toLocaleTimeString();
  dateElement.textContent = formattedDate;
  timeElement.textContent = formattedTime;
}

updateDateTime();
setInterval(updateDateTime, 1000);
