  // making this foreach loop to get all class program-link when click 
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
                        var data = JSON.parse(xhr.responseText);
                        var tableBody = document.getElementById('studentTableBody');
                        tableBody.innerHTML = '';
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
                            // If no results are found, display a message in the table body
                            var tr = document.createElement('tr');
                            tr.innerHTML = "<td colspan='6'>No results found</td>";
                            tableBody.appendChild(tr);
                        }
                    
                     
                        console.log(data); // try to log the retrieved data to console.
                    } else {
                        console.error('Error: ' + xhr.status);
                    }
                }
            };
            xhr.send();
        });
    });
});


//     function renderTable(data) { //manipulate data
//     var tableContainer = document.querySelector('.table');

//     // Clear the existing content of the table body
//     var tableBody = tableContainer.querySelector('tbody');
//     tableBody.innerHTML = '';

//     // Loop through the retrieved data and construct table rows
//     data.forEach(function (rowData) {
//         // Create a new row (<tr>) for each data entry
//         var row = document.createElement('tr');

//         // Create cells (<td>) for firstname, lastname, and program
//         var uniqueId = document.createElement('td');
//         uniqueId.textContent = rowData.id; //value of the td
//         row.appendChild(uniqueId);

//         var firstNameCell = document.createElement('td');
//         firstNameCell.textContent = rowData.first_name;
//         row.appendChild(firstNameCell);

//         var lastNameCell = document.createElement('td');
//         lastNameCell.textContent = rowData.last_name;
//         row.appendChild(lastNameCell);

//         var programCell = document.createElement('td');
//         programCell.textContent = rowData.program;
//         row.appendChild(programCell);

//         var courseCell = document.createElement('td');
//         courseCell.textContent = rowData.course;
//         row.appendChild(courseCell);

//         var td = document.createElement('td');
//         var link = document.createElement('a');
//         link.href = 'studentdetails.php?id='+ encodeURIComponent(rowData.id); 
//         link.textContent = "more details";
//         td.appendChild(link);
//         row.appendChild(td);
    
//         // Append the row to the table body
//         tableBody.appendChild(row);

               
//         link.addEventListener('click', function(e) {
//             e.preventDefault(); // Prevent the default navigation behavior
//             openModal(rowData.id); // Call the openModal function to show the modal
//         });

    
//     });
// };


 
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
