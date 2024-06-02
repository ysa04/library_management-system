document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('studentSearch').addEventListener('submit', function(e) {
        e.preventDefault(); // Prevent form submission this form submission is from registeredStudent.php
        searchStudent();
    });
});

function searchStudent() {
    var firstName = document.getElementById('first_name').value;
    var lastName = document.getElementById('last_name').value;
    var course = document.getElementById('course').value;
    var usnNumber = document.getElementById('usn_number').value;

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'searchStudents.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                console.log(JSON.parse(xhr.responseText)); // Just checking data in console
                var data = JSON.parse(xhr.responseText);
                var tableBody = document.getElementById('adminTable');
                // tableBody.innerHTML = ''; // Clear existing table rows
                if (data.length > 0) {
                    data.forEach(function(row) {
                        var tr = document.createElement('tr');
                        tr.innerHTML = "<td>" + row['id'] + "</td>" +
                                       "<td>" + row['first_name'] + "</td>" +
                                       "<td>" + row['last_name'] + "</td>" +
                                       "<td>" + row['age'] + "</td>" +
                                       "<td>" + row['email'] + "</td>" +
                                       "<td>" + row['usn_number'] + "</td>" +
                                       "<td>" + row['contact_number'] + "</td>" +
                                       "<td><button class='book_details' onclick='updateStudent(" + row['id'] + ")'>edit details</button></td>";
                        tableBody.appendChild(tr);
                    });
                }
            } else {
                console.error('Error:', xhr.status);
            }
        }
    };
    var params = 'first_name=' + encodeURIComponent(firstName) +
                 '&last_name=' + encodeURIComponent(lastName) +
                 '&course=' + encodeURIComponent(course) +
                 '&usn_number=' + encodeURIComponent(usnNumber);
    xhr.send(params);
}


function updateStudent(Id) {
    console.log(Id);
    var bookModal = document.querySelector('.bookModaldetails');
    bookModal.style.display = 'block'; // Display the modal
    // Apply CSS transitions to smoothly animate the modal appearance
    bookModal.style.opacity = '0'; // Start with opacity 0
    bookModal.style.transition = '0.8s ease'; // Apply transition for opacity property

// Use setTimeout to delay the modal appearance
setTimeout(function() {
    bookModal.style.opacity = '1'; // Set opacity to 1 after a short delay
}, 50); 


// Make an AJAX request to fetch additional details for the student with studentId
var xhr = new XMLHttpRequest();
xhr.open('GET', 'modaldetails.php?id=' + encodeURIComponent(Id), true);
xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
            // Handle the response here to populate the modal with additional details
            bookModal.innerHTML = xhr.responseText;
   
        } else {
            console.error('Error: ' + xhr.status);
        }
    }
};
xhr.send();

};
