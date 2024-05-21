<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/frontend/css/student.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>student Home Page</title>
    <style>
 

        .book-cover {
            flex: 0 0 calc(100% - 20px); /* Adjust the width for covers per row */
            margin: 15px 0px px 50px; /* Adjust the margin as needed */
            max-width: 250px; /* Set a maximum width for the book cover */
            height: auto; /* Automatically adjust the height to maintain aspect ratio */
        }
        
    </style>
</head>
<body>
<?php include 'studentNavbar.php'; ?> 

   <div style="background-color: rgb(191, 222, 234); border-radius: 5px; position: relative;" class="container">

    <div class="main-content ">
    <h4>"If you study to remember, you will forget; But if you study to understand you will remember" </h4>
    <h1>BOOK CATEGORIES</h1>

          <!-- where is toggleFilter use for? -->
    <form class="nav-search" onclick="toggleFilter()" id="filterForm">
        <div class="">
            <input type="text" name="title" id="titleInput" placeholder="Title">
            <input type="text" name="author" id="authorInput" placeholder="Author">
            <input type="text" name="year" id="yearInput" placeholder="Publication Year">
            <select name="genre" id="genreSelect">
                <option value="">Select Genre</option>
                <option value="Business">Business</option>
                <option value="Nursing">Nursing</option>
                <option value="IT">IT</option>
                <option value="Fantasy">Fantasy</option>
                <option value="Comedy">Comedy</option>
                <!-- Add more genre options as needed -->
            </select>
            <select name="status" id="statusSelect">
                <option value="">Select Status</option>
                <option value="Available">Available</option>
                <option value="Borrowed">Borrowed</option>
            </select>
            <button class="search-button" type="button" onclick="applyFilter()">Search</button> <!-- Use type="button" to prevent form submission -->
        </div>
    </form>
   </div>

   <div class="gallery">
        <?php include_once "searchhome.php"; ?>
    </div>
     
     <div class="chatbot-div">
      <img src="/frontend/img/chatbot.jpg" alt="chatbot" width="65" height="65"/>
      <a href="/">Chat with Amaia</a>  
     </div>

  </div>

<?php
include '../../../frontend/components/student/footer.html';
?>


    
<script src="/frontend/js/bookNavigate.js"></script>
<script src="/frontend/js/retrieve_data.js"></script>
<script src="/frontend/js/filtersearch.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>
</html>
