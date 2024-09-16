<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/frontend/css/student.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Material+Symbols+Outlined:opsz, wght, FILL, GRAD@48,400,0,0">
    <link rel="stylesheet" href="student_chatbox.css">
    <script src="student_chatbox.js" defer></script>
    <title>student Home Page</title>
    
</head>
<body>
<?php include 'studentNavbar.php'; ?> 



<div style="background-color: rgb(191, 222, 234);">

    <h4 class="main-h4">"If you study to remember, you will forget; But if you study to understand you will remember"</h4>
        <div class="main-content">
           
        <div style="padding-right: 60px; padding-left: 10px;">
         <h4>Book Search</h4>
            <form class="nav-search" id="filterForm">
                <div>
                    <input type="text" name="title" id="titleInput" placeholder="Title" onkeyup="showSuggestions(this.value)">
                    <!-- applyfilter() is in filtersearch.js -->
                    <button class="search-button" type="button" onclick="applyFilter()">Search</button>
                    <div id="suggestions" class="suggestions-box"></div> <!-- Suggestion box -->
                </div>
            </form>
         </div>

         <div class="gallery pagination-container">
        <?php include_once "searchhome.php"; ?>
      </div>
            
        
          </div>
            </div>
           
        <!-- Chatbot section -->
        <button class="chatbot-toggler">
            <img src="/frontend/img/chatbot.png" alt="Chatbot Icon" class="chatbot-img">
            <span class="material-symbols-outlined">close</span>
        </button>
        <div class="chatbot">
            <header>
                <h2>Amaia</h2>
                <span class="close-btn material-symbols-outlined">close</span>
            </header>
            <ul class="chatbox">
                <li class="chat incoming">
                    <span class="material-symbols-outlined">smart_toy</span>
                    <p>Hi i'm Amaia <br> How can I help you today?</p>
                </li>
            </ul>
            <div class="chat-input">
                <textarea placeholder="Enter a message..."></textarea>
                <span id="send-btn" class="material-symbols-outlined">send</span>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include '../../../frontend/components/student/footer.html'; ?>

    <!-- Scripts -->
    <script src="/frontend/js/bookNavigate.js"></script>
    <script src="/frontend/js/retrieve_data.js"></script>
    <script src="/frontend/js/filtersearch.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    <!-- Student Chatbox JS -->
    
</body>
</html>
