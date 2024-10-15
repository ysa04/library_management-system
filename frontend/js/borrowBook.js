function closeBorrow() {
    var borrowClose = document.getElementById('book-borrow');
    borrowClose.style.display = "none";
  };


    function bookBorrow(studentId) {
    console.log(studentId);
    var div = document.getElementById('book-borrow');
    div.style.display = 'block';

    // Send AJAX request to PHP script to retrieve student data
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // On successful response, parse JSON data and render it
                var studentData = JSON.parse(xhr.responseText);
                console.log(studentData);
               renderStudentData(studentData);
            } else {
                console.error('Error: ' + xhr.status);
                // Provide feedback to the user about the error
                alert('Error: Failed to retrieve student data. Please try again later.');
            }
        }
    };
    xhr.open('GET', 'retrieve_borrow_book.php?studentId=' + encodeURIComponent(studentId), true);
    xhr.send();
}

function renderStudentData(studentData) {
    // Get reference to the tbody element
    var tbody = document.getElementById('borrow-main-table');

        // Clear existing table rows for the successive user action.
        tbody.innerHTML = "";


    if(studentData.length === 0){
        var noResult = document.createElement('tr');
        var noData = document.createElement('td');
        noData.textContent = "No result";
        noResult.appendChild(noData);
        tbody.appendChild(noResult);
    }else {

              // Clear existing table rows
      tbody.innerHTML = "";

       // Iterate over the studentData array and create table rows
       studentData.forEach(function(student) {
        // Create a new table row (tr)
        var row = document.createElement('tr');
        
        var cell1 = document.createElement('td');
        cell1.textContent = student.book_id; 

        var cell2 = document.createElement('td');
        cell2.textContent = student.student_id; 

        var cell3 = document.createElement('td');
        cell3.textContent = student.book_title; 

        var cell4 = document.createElement('td');
        cell4.textContent = student.date_borrowed; 

        var cell5 = document.createElement('td');
        cell5.textContent = student.date_returned; 

        // var cell6 = document.createElement('td');
        // cell6.textContent = student.number_of_books; 

        var cell7 = document.createElement('td');
        cell7.textContent = student.status; 

        var cell8 = document.createElement('td');
        cell8.textContent = student.penalty; 

        // Append cells to the row
        row.appendChild(cell1);
        row.appendChild(cell2);
        row.appendChild(cell3);
        row.appendChild(cell4);
        row.appendChild(cell5);
        // row.appendChild(cell6);
        row.appendChild(cell7);
        row.appendChild(cell8);

        // Append the row to the tbody
        tbody.appendChild(row);
    });

    }

   }



