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

<?php
// Check if user is logged in (assuming this session is from userslogin.php)
if (!isset($_SESSION['usn']) || !isset($_SESSION['first_name']) || !isset($_SESSION['last_name']) || !isset($_SESSION['course']) || !isset($_SESSION['age']) || !isset($_SESSION['contact_number'])|| !isset($_SESSION['year']) || !isset($_SESSION['photo'])) {
    // Redirect to login page or perform appropriate action
    // header("Location: studentlogin.php");
    // exit();
}

// Extract session variables
$usn = $_SESSION['usn'];
$name = $_SESSION['first_name'];
$surName = $_SESSION['last_name'];
$age = $_SESSION['age'];
$course = $_SESSION['course'];
$contactNumber = $_SESSION['contact_number'];
$email = $_SESSION['email'];
$year = $_SESSION['year'];
$photo = $_SESSION['photo'];

// Base64 encode the photo for embedding in the HTML
$encodedPhoto = base64_encode($photo);
$photoMimeType = 'image/jpeg'; // Adjust this if your image is not JPEG

?>


<section style="background-color:rgb(191, 222, 234); min-height: 100vh;">
  <div class="container py-5">

    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
          <img src="data:<?php echo $photoMimeType; ?>;base64,<?php echo $encodedPhoto; ?>" alt="User Photo" class="rounded-circle img-fluid" style="width: 150px;" >
  
          </div>
        </div>
        <div class="card mb-4 mb-lg-0">
          <div class="card-body p-0">
            <ul class="list-group list-group-flush rounded-3">
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <!-- <i class="fas fa-globe fa-lg text-warning"></i> -->
                <a href="#" onclick="loadContent('personalinfo.php')">Your Personal Details</a>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <!-- <i class="fab fa-github fa-lg text-body"></i> -->
                <a href="#" onclick="loadContent('reserveBook.php')">Your Summary</a>

              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <!-- <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i> -->
                <a href="#">change password</a>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <!-- <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i> -->
                <a href="#" onclick="loadContent('bookHistory.php')">Borrow History</a>
              </li>
            </ul>
          </div>
        </div>
      </div>

    


      <div class="col-lg-8">
  
      <div class="sample">
      <h4 >Hello, <?php echo $name . ' ' . $surName; ?> </h4>
        <p>Please follow the steps below to borrow a book through this student portal:
          <p>Select a Book: Begin by clicking on the book you wish to borrow.</p>
          <p>Choose Borrow Option: You will have two options:</p>
          <p>Borrow Inside:</p>
          After selecting this option, your request will be processed.
          You can check the status of your request in the "Borrow History" section.
          If your request is marked as Pending, please wait for admin approval.
          Once approved, visit the library reception to collect your book.
          Please note that you have 5 hours to return the book after borrowing it inside.
        </p>
        <p>Borrow Outside:
         <p>If you choose this option, you will have 3 days to return the book.</p>
           Failure to return the book by the due date will result in a penalty of 500 pesos, 
           along with an accumulation fee for each day the book is overdue.
           <hr/>
           <p>Thank you for your cooperation, and happy reading!</p>
         </p>
      </div>
      <div class="page">
        <!-- page -->
      </div>
      </div>
      

      
    </div>
  </div>
</section>


<script>

function loadContent(page) {
  document.querySelector('.sample').style.display = 'none';
            var xhr = new XMLHttpRequest();
            xhr.open('GET', page, true);

            xhr.onload = function() {
                if (xhr.status == 200) {

                    document.querySelector('.page').innerHTML = xhr.responseText;
                } else {
                    document.querySelector('.page').innerHTML = 'Error loading page.';
                }
            };

            xhr.onerror = function() {
                document.querySelector('.page').innerHTML = 'Request error.';
            };

            xhr.send();
        }


</script>

    <!-- Scripts -->
    <script src="/frontend/js/bookNavigate.js"></script>
    <script src="/frontend/js/retrieve_data.js"></script>
    <script src="/frontend/js/filtersearch.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    <!-- Student Chatbox JS -->
    
</body>
</html>
