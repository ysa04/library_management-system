

// coming from retrieveBooks.php
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('bookForm').addEventListener('submit', function(e) {
        e.preventDefault(); // Prevent form submission
        searchBooks();
    });
});

function searchBooks() {
    var title = document.getElementById('title').value;
    var author = document.getElementById('author').value;

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'searchBookAdmin.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                console.log(JSON.parse(xhr.responseText)); // just checking data in console
                var data = JSON.parse(xhr.responseText);
                var tableBody = document.getElementById('adminTableBody');
                tableBody.innerHTML = '';
                if(data.length > 0){
                  data.forEach(function(row){
                    var tr = document.createElement('tr');
                    tr.innerHTML = "<td>" + row['id'] + "</td>" +
                                                   "<td>" + row['title'] + "</td>" +
                                                   "<td>" + row['author'] + "</td>" +
                                                   "<td>" + row['genre'] + "</td>" +
                                                   "<td>" + row['book_count'] + "</td>" +
                                                   "<td>" + row['publication_year'] + "</td>" +
                                                   "<td>" + row['stat'] + "</td>" +
                                                   "<td><button class='book_details' onclick='updateBook(" + row['id'] + ")'>edit details</button></td>";
                                    tableBody.appendChild(tr);
                  })
                }
              
            } else {
                console.error('Error:', xhr.status);
            }
        }
    };
    var params = 'title=' + encodeURIComponent(title) + '&author=' + encodeURIComponent(author);
    xhr.send(params);
}


function updateBook(bookId) {
    console.log(bookId);
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
xhr.open('GET', 'updateBook.php?id=' + encodeURIComponent(bookId), true);
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
