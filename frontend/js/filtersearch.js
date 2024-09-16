 // student directory from student_home.php
 function applyFilter() {
    var formData = new FormData(document.getElementById("filterForm"));
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "searchhome.php", true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var results = xhr.responseText;
            // Update the gallery with search results
            console.log(results);
            document.querySelector('.gallery').innerHTML = results;
        }
    };
    xhr.send(formData);
}

// this area is an old code you can delete

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('searchForm').addEventListener('submit', function(e) {
        e.preventDefault(); // Prevent form submission
        // const pagination = document.querySelector('.pagination');

        // Retrieve form data
        var formData = new FormData(this);
        
        // AJAX request to fetch student details
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    console.log(xhr.responseText);
                    var responseData = JSON.parse(xhr.responseText); // this xhr.responseText is where the data located if php response successful
                    var tableBody = document.getElementById('studentTableBody');
                    const paginationControls = document.querySelector('.pagination');
                    // Clear existing table body content
                    tableBody.innerHTML = '';
                    paginationControls.innerHTML = ''; // Clear previous pagination  
                    // Loop through the response data and dynamically create table rows
                    if (responseData.length > 0) {
                        responseData.forEach(function(row) {
                            var tr = document.createElement('tr');
                            tr.innerHTML = "<td>" + row['id'] + "</td>" +
                                           "<td>" + row['first_name'] + "</td>" +
                                           "<td>" + row['last_name'] + "</td>" +
                                           "<td>" + row['program'] + "</td>" +
                                           "<td>" + row['course'] + "</td>" +
                                           //the openModal function name is in the retrieve_data.js reuse it to less boiler plate code.
                                           "<td class='more_details'><button onclick='openModal(" + row['id'] + ")'>more details</button></td>";
                            tableBody.appendChild(tr);
                        });
                    } else {
                        // If no results are found, display a message in the table body
                        var tr = document.createElement('tr');
                        tr.innerHTML = "<td colspan='6'>No results found</td>";
                        tableBody.appendChild(tr);
                    }
                } else {
                    console.error('Request failed:', xhr.statusText);
                }
            }
        };
        xhr.open('POST', 'searchResult.php'); // this where i can pass the post request
        xhr.send(formData);
    });
    
});



function showSuggestions(value) {
    if (value.length === 0) {
        document.getElementById("suggestions").innerHTML = "";
        return;
    }
    
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "input_suggestion.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById("suggestions").innerHTML = xhr.responseText;
        }
    };
    xhr.send("title=" + encodeURIComponent(value));
}



function selectSuggestion(title) {
    document.getElementById("titleInput").value = title;
    document.getElementById("suggestions").innerHTML = ""; // Clear suggestions
}
