function applyFilter() {
    var formData = new FormData(document.getElementById("filterForm"));
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "searchhome.php", true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var results = xhr.responseText;
            // Update the image containers with search results
            document.querySelectorAll('.gallery').forEach(function(container) {
                container.innerHTML = results;
            });
        }
    };
    xhr.send(formData);
}




document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('searchForm').addEventListener('submit', function(e) {
        e.preventDefault(); // Prevent form submission
        
        // Retrieve form data
        var formData = new FormData(this);
        
        // AJAX request to fetch student details
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    var responseData = JSON.parse(xhr.responseText); // this xhr.responseText is where the data located if php response successful
                    var tableBody = document.getElementById('studentTableBody');
                    // Clear existing table body content
                    tableBody.innerHTML = '';
                    // Loop through the response data and dynamically create table rows
                    if (responseData.length > 0) {
                        responseData.forEach(function(row) {
                            var tr = document.createElement('tr');
                            tr.innerHTML = "<td>" + row['id'] + "</td>" +
                                           "<td>" + row['first_name'] + "</td>" +
                                           "<td>" + row['last_name'] + "</td>" +
                                           "<td>" + row['program'] + "</td>" +
                                           "<td>" + row['course'] + "</td>" +
                                           //the openModal function name is in the retrieve_data.js to less boiler plate code since they have the same button function
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

