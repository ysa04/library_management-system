function updateBookDetails(getId){
    // Get values of other input fields for other details as needed
    var id = getId;// Get the student ID from PHP
    var bookTitle = document.getElementById("title").value;
    var bookAuthor = document.getElementById("author").value;
    var genre = document.getElementById("genre").value;
    var bookCount= document.getElementById("book_count").value;
    var publicationYear = document.getElementById("publication_year").value;
    var stat = document.getElementById("stat").value;
    var shelve = document.getElementById("shelve").value;
    var summary = document.getElementById("summary").value;
    console.log(id);

    var newData = {
     
        bookTitle: bookTitle,
        bookAuthor:bookAuthor,
        genre:genre,
        bookCount: bookCount,
        publicationYear:publicationYear,
        stat:stat,
        shelve:shelve,
        summary:summary
  };

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "updateBookDetails.php", true);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Handle the response if needed
            console.log(xhr.responseText);
            alert(xhr.responseText);
           
            // You can also show a success message or update the UI accordingly
        } else if (xhr.status !== 200) {
            // Handle errors if any
            console.log(xhr.responseText);
        }
    };

    // Convert newData to JSON and send it in the request body
    xhr.send(JSON.stringify({ id: id, newData: newData }));

};