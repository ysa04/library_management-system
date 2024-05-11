document.addEventListener('DOMContentLoaded', function() {
    var links = document.querySelectorAll('.program-link');
    links.forEach(function(link) {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            var program = event.target.textContent;

            // Encode the program name before appending it to the URL
            var encodedProgram = encodeURIComponent(program);

            // Make an AJAX request to retrieve data for the selected program
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'retrieve_data.php?program=' + encodedProgram, true); 
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var data = xhr.responseText;
                        console.log(data);
                        var tableBody = document.getElementById('studentTableBody');
                        tableBody.innerHTML = '';
                        try {
                            data = JSON.parse(data);
                            if (data.length > 0) {
                                data.forEach(function(row) {
                                    var tr = document.createElement('tr');
                                    tr.innerHTML = "<td>" + row['id'] + "</td>" +
                                                   "<td>" + row['first_name'] + "</td>" +
                                                   "<td>" + row['last_name'] + "</td>" +
                                                   "<td>" + row['program'] + "</td>" +
                                                   "<td>" + row['course'] + "</td>" +
                                                   "<td class='more_details'><button onclick='openModal(" + row['id'] + ")'>more details</button></td>";
                                    tableBody.appendChild(tr);
                                });
                            } else {
                                var tr = document.createElement('tr');
                                tr.innerHTML = "<th>No results found for program: " + program + "</th>";
                                tableBody.appendChild(tr);
                                console.log("No results found for program: " + program);
                            }
                        } catch (error) {
                            var tr = document.createElement('tr');
                            tr.innerHTML = "<th>no results found</th>";
                            tableBody.appendChild(tr);
                            console.error('no results found');
                        }
                    } 
                }
            };
            xhr.send();
        });
    });
});


 
function openModal(studentId) {

    console.log(studentId);

    var modal = document.querySelector('.details');
    modal.style.display = 'block'; // Display the modal
    // Apply CSS transitions to smoothly animate the modal appearance
    modal.style.opacity = '0'; // Start with opacity 0
    modal.style.transition = '0.8s ease'; // Apply transition for opacity property

// Use setTimeout to delay the modal appearance
setTimeout(function() {
    modal.style.opacity = '1'; // Set opacity to 1 after a short delay
}, 50); 

// Make an AJAX request to fetch additional details for the student with studentId
var xhr = new XMLHttpRequest();
xhr.open('GET', 'modaldetails.php?id=' + encodeURIComponent(studentId), true);
xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
            // Handle the response here to populate the modal with additional details
            modal.innerHTML = xhr.responseText;
   
        } else {
            console.error('Error: ' + xhr.status);
        }
    }
};
xhr.send();

};
