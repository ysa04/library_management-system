
 // Function to fetch data from PHP script
 function fetchTableNames() {
    fetch('http://localhost/library_system/backend/view/student/retrieve_category.php')
        .then(response => response.text())
        .then(data => {
            // Extract JSON part from the response
            //The reason for this approach is that the server response contains additional text 
            //("Connected successfully<br>") before the actual JSON array. By finding the indices of the start and end of the JSON array,
            // we can extract only the JSON data part from the mixed response and then parse it as valid JSON.
            const jsonStartIndex = data.indexOf('[');
            const jsonEndIndex = data.lastIndexOf(']') + 1;
            const jsonData = data.substring(jsonStartIndex, jsonEndIndex);
            
            // Parse the extracted JSON data
            const tableNames = JSON.parse(jsonData);
 

            renderTableNames(tableNames);
            
            
            // Log the table names to the console
            console.log(tableNames);
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });
}


//this function can callback the tableNames data so that we can still manipulate the data and render it to P tag in student_home.php
function renderTableNames(tableNames) {
    const pTags = document.querySelectorAll('.book-category');

    tableNames.forEach((tableName, index) => {
        if (pTags[index]) {
            pTags[index].textContent = tableName;
        } else {
            const pTag = document.createElement('p');
            pTag.className = 'book-category';
            pTag.textContent = tableName;
            document.body.appendChild(pTag);
        }
    });
}

// Call the function to fetch table names
fetchTableNames();


