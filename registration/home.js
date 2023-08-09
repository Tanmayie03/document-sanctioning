const home= window.location.pathname;
const navLinks=document.querySelectorAll('navBar a').forEach(link=>{
    if(link.href.includes(`${home}`)){
    console.log(`${home}`);}
})

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
      