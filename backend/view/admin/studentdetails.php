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


    <div  class="table-details">
   <table>
   <h4 class="table-h4">Student Details</h4>
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
     
      <th> <input type="text" id="id" value="<?php echo $student_data['id'];?>" style="width: 200px;"/> </th>
      <th> <input type="text" id="first_name" value="<?php echo $student_data['first_name'];?>" style="width: 200px;"/> </th>
      <th> <input type="text" id="last_name" value="<?php echo $student_data['last_name'];?>" style="width: 200px;"/> </th>
      <th> <input type="text" id="age" value="<?php echo $student_data['age'];?>" style="width: 200px;"/> </th>
      <th> <input type="text" id="email" value="<?php echo $student_data['email'];?>" style="width: 200px;"/> </th>
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
     
     <th> <input type="text" id="usn_number" value="<?php echo $student_data['usn_number'];?>" style="width: 200px;"/> </th>
      <th> <input type="text" id="contact_number" value="<?php echo $student_data['contact_number'];?>" style="width: 200px;"/> </th>
      <th> <input type="text" id="number_visit" value="<?php echo $student_data['number_visit'];?>" style="width: 200px;"/> </th>
      <th> <input type="text" id="number_barrowed" value="<?php echo $student_data['number_barrowed'];?>" style="width: 200px;"/> </th>
      <th> <input type="text" id="book_returned" value="<?php echo $student_data['book_returned'];?>" style="width: 200px;"/> </th>
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

    <th> <input type="text" id="penalty" value="<?php echo $student_data['penalty'];?>" style="width: 200px;"/> </th>
      <th> <input type="text" id="paid_penalty" value="<?php echo $student_data['paid_penalty'];?>" style="width: 200px;"/> </th>
      <th> <input type="text" id="added_at" value="<?php echo $student_data['added_at'];?>" style="width: 200px;"/> </th>
      <th> <input type="text" id="program" value="<?php echo $student_data['program'];?>" style="width: 200px;"/> </th>
      <th> <input type="text" id="course" value="<?php echo $student_data['course'];?>" style="width: 200px;"/> </th>
    </tr>
  </tbody>
    </table>
    </div>
    <br/>

   <div class="table-button">
     <button onclick="updateDetails(<?php echo $student_data['id'];?>)">Update Details</button>
    <button class="close-tab" onclick="closeTab()">Close Tab</button>
   </div>

  

<script src="/frontend/js/update.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>