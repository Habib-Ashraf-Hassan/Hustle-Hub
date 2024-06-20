let menuicn = document.querySelector(".menuicn"); 
let nav = document.querySelector(".navcontainer"); 
  
menuicn.addEventListener("click", () => { 
    nav.classList.toggle("navclose"); 
})

function showDashboard() {
    // Hide Technicians content
    document.getElementById("techniciansboard").style.display = "none";
    document.getElementById("clientsboard").style.display = "none";
    document.getElementById("appprovalboard").style.display = "none";
    document.getElementById("feedbackboard").style.display = "none";
    document.getElementById("updateprofile").style.display = "none";

    // Show existing content
    document.querySelector(".box-container").style.display = "flex";
    document.querySelector(".report-container").style.display = "block";
}

function showTechnicians() {
    // Hide existing content
    document.querySelector(".box-container").style.display = "none";
    document.querySelector(".report-container").style.display = "none";
    document.getElementById("clientsboard").style.display = "none";
    document.getElementById("appprovalboard").style.display = "none";
    document.getElementById("feedbackboard").style.display = "none";
    document.getElementById("updateprofile").style.display = "none";



    // Show Technicians content
    document.getElementById("techniciansboard").style.display = "block";
}
function showClients() {
    // Hide existing content
    document.querySelector(".box-container").style.display = "none";
    document.querySelector(".report-container").style.display = "none";
    document.getElementById("techniciansboard").style.display = "none";
    document.getElementById("appprovalboard").style.display = "none";
    document.getElementById("feedbackboard").style.display = "none";
    document.getElementById("updateprofile").style.display = "none";



    // Show Technicians content
    document.getElementById("clientsboard").style.display = "block";
}
function showfeedbacks() {
    // Hide existing content
    document.querySelector(".box-container").style.display = "none";
    document.querySelector(".report-container").style.display = "none";
    document.getElementById("techniciansboard").style.display = "none";
    document.getElementById("appprovalboard").style.display = "none";
    document.getElementById("clientsboard").style.display = "none";
    document.getElementById("updateprofile").style.display = "none";



    // Show Technicians content
    document.getElementById("feedbackboard").style.display = "block";
}
function showapprovals() {
    // Hide existing content
    document.querySelector(".box-container").style.display = "none";
    document.querySelector(".report-container").style.display = "none";
    document.getElementById("techniciansboard").style.display = "none";
    document.getElementById("clientsboard").style.display = "none";
    document.getElementById("feedbackboard").style.display = "none";
    document.getElementById("updateprofile").style.display = "none";



    // Show Technicians content
    document.getElementById("appprovalboard").style.display = "block";
}
function showupdateprofile() {
    // Hide existing content
    document.querySelector(".box-container").style.display = "none";
    document.querySelector(".report-container").style.display = "none";
    document.getElementById("techniciansboard").style.display = "none";
    document.getElementById("clientsboard").style.display = "none";
    document.getElementById("feedbackboard").style.display = "none";
    document.getElementById("appprovalboard").style.display = "none";



    // Show Technicians content
    document.getElementById("updateprofile").style.display = "block";
}

function showProfile() {
    // Get the parent div
    var parentDiv = document.getElementById("main");

    // Loop through all child divs
    while (parentDiv.firstChild) {
        // Check if the child div is not the one with id updateprofile
        if (parentDiv.firstChild.id !== "updateprofile") {
            // Remove the child div
            parentDiv.removeChild(parentDiv.firstChild);
        } else {
            // If it's the div with id updateprofile, break the loop
            break;
        }
    }
}

