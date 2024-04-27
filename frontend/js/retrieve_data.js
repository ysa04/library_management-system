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
                        renderTable(data);
                    } else {
                        console.error('Error: ' + xhr.status);
                    }
                }
            };
            xhr.send();
        });
    });
});

function renderTable(data) {
    var tableContainer = document.querySelector('.table');

    // Clear the existing content of the table body
    var tableBody = tableContainer.querySelector('tbody');
    if (tableBody) {
        tableBody.innerHTML = '';
    } else {
        tableBody = document.createElement('tbody');
        tableContainer.appendChild(tableBody);
    }

    // Loop through the retrieved data and construct table rows
    data.forEach(function (rowData, index) {
        // Create a new row (<tr>) for each data entry
        var row = document.createElement('tr');

        // Create cells (<td>) for firstname, lastname, and program
        var uniqueId = document.createElement('td');
        uniqueId.textContent = rowData.id;
        row.appendChild(uniqueId);

        var firstNameCell = document.createElement('td');
        firstNameCell.textContent = rowData.first_name;
        row.appendChild(firstNameCell);

        var lastNameCell = document.createElement('td');
        lastNameCell.textContent = rowData.last_name;
        row.appendChild(lastNameCell);

        var programCell = document.createElement('td');
        programCell.textContent = rowData.program;
        row.appendChild(programCell);

        var courseCell = document.createElement('td');
        courseCell.textContent = rowData.course;
        row.appendChild(courseCell);

        var button = document.createElement('td');
        var link = document.createElement('a');
        link.href = 'studentdetails.php?program='
        link.textContent = "more details"
        button.appendChild(link);
        row.appendChild(button);

        // Append the row to the table body
        tableBody.appendChild(row);

         // Add click event listeners to the links
         link.addEventListener('click', function(event) {
            event.preventDefault();
            openModal(rowData.id);
        });

    });
}

function navigateToPhpFile(phpFile, paramName, paramValue) {
    // Construct the URL with the specific query parameter
    var url = phpFile + '?' + paramName + '=' + encodeURIComponent(paramValue);
    // Navigate to the URL
    window.location.href = url;
}

function openModal(details){
    var modalContent = document.querySelector('.details');

    modalContent.style.display = "block";
}




// function openModal(studentId) {
//     // Find the modal div in your HTML
//     var modal = document.querySelector('.details');

//     // Make the modal visible
//     modal.style.display = 'block';

//     // Make an AJAX request to fetch additional details for the student with studentId
//     var xhr = new XMLHttpRequest();
//     xhr.open('GET', 'studentdetails.php?id=' + encodeURIComponent(studentId), true);
//     xhr.onreadystatechange = function() {
//         if (xhr.readyState === XMLHttpRequest.DONE) {
//             if (xhr.status === 200) {
//                 // Handle the response here to populate the modal with additional details
//                 var additionalDetails = JSON.parse(xhr.responseText);
//                 // Populate modal with additionalDetails
            
//             } else {
//                 console.error('Error: ' + xhr.status);
//             }
//         }
//     };
//     xhr.send();
// }
