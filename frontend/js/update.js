// function for closing the tab of student details
function closeTab() {
  var modalClose = document.querySelector('.details');
  var bookModal = document.querySelector('.bookModaldetails');
  bookModal.style.display = "none";
  modalClose.style.display = "none";

};


function closeBookTab() {
    var bookModal = document.querySelector('.bookModaldetails');
    bookModal.style.display = "none";
  };

//function for update student details button

function updateDetails(getId){

    var id = getId;// Get the student ID from PHP
    var firstName = document.getElementById("first_name").value;
    var lastName = document.getElementById("last_name").value;
    var age = document.getElementById("age").value;
    var email = document.getElementById("email").value;
    var usn= document.getElementById("usn_number").value;
    var contact = document.getElementById("contact_number").value;
    var numberVisit = document.getElementById("number_visit").value;
    var addedAt = document.getElementById("added_at").value;
    var program = document.getElementById("program").value;
    var course = document.getElementById("course").value;
    // Get values of other input fields for other details as needed

    console.log(id);

    var newData = {
  
      firstName: firstName,
      lastName: lastName,
      age: age,
      email: email,
      usn: usn,
      contact: contact,
      numberVisit: numberVisit,
      addedAt: addedAt,
      program: program,
      course: course
  };

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "updatedetails.php", true);
    xhr.setRequestHeader("Content-Type", "application/json");

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Handle the response if needed
            alert(xhr.responseText);
           
            // You can also show a success message or update the UI accordingly
        } else if (xhr.status !== 200) {
            // Handle errors if any
            console.error(xhr.responseText);
        }
    };

    // Convert newData to JSON and send it in the request body
    xhr.send(JSON.stringify({ id: id, newData: newData }));

};




