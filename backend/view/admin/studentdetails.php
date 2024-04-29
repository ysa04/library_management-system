<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMA MAKATI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/frontend/css/student.css">
    <link rel="stylesheet" href="/frontend/css/admin.css">
    
   </head>
   <body>

   <?php
    
   echo $student_data['first_name']; 
// Now you can use $studentId to fetch additional details for the student from your database or perform any other actions
?>

    <h4>student details</h4>
   <table>
    <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Firstname</th>
      <th scope="col">Lastname</th>
      <th scope="col">Age</th>
      <th scope="col">Email</th>
    </tr>
   </thead>
   <tbody>
    <tr>
     
      <th><?php echo $student_data['id']; ?></th>
      <th><?php echo $student_data['first_name']; ?></th>
      <th><?php echo $student_data['last_name']; ?></th>
      <th><?php echo $student_data['age']; ?></th>
      <th><?php echo $student_data['email']; ?></th>
    </tr>
  </tbody>
   <thead>
      <tr>
      <th scope="col">Usn</th>
      <th scope="col">Contact No.</th>
      <th scope="col">No. of visit</th>
      <th scope="col">Books Barrowed</th>
      <th scope="col">Books Returned</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th><?php echo $student_data['usn_number']; ?></th>
      <th><?php echo $student_data['contact_number']; ?></th>
      <th><?php echo $student_data['number_visit']; ?></th>
      <th><?php echo $student_data['no_books_barrowed']; ?></th>
      <th><?php echo $student_data['no_books_returned']; ?></th>
    </tr>
  </tbody>
  <thead>
  <th scope="col">Penalty</th>
      <th scope="col">Paid Penalty</th>
      <th scope="col">Added at</th>
      <th scope="col">Program</th>
      <th scope="col">Course</th>
  </thead>
  <tbody>
    <tr>
      <th><?php echo $student_data['penalty']; ?></th>
      <th><?php echo $student_data['paid_penalty']; ?></th>
      <th><?php echo $student_data['added_at']; ?></th>
      <th><?php echo $student_data['program']; ?></th>
      <th><?php echo $student_data['course']; ?></th>
    </tr>
  </tbody>
    </table>
    <br/>
   <div>
    <button>update details</button>
    <button class="close-tab" onclick="closeTab()">Close Tab</button>

   </div>

   <script>
    function closeTab() {
      var modalClose = document.querySelector('.details');
      modalClose.style.display = "none";
    }
   </script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>