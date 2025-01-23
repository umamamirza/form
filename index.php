

<!DOCTYPE html> 
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Table with Modal</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- jQuery Library -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</head>
<body>
  <div class="container mt-5">
    <h1>Data Table</h1>
    
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addItemModal">
      Add
    </button>
    
    <!-- Table-->
    <table class="table table-bordered" id="studentlist">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Password</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    $(document).ready(function() {

       Loadstudents();

      $('#saveData').on('click', function() {
        let name = $('#name').val();
        let email = $('#email').val();
        let password = $('#password').val();
        if (name === "" || email === "" || password === "") {
          alert('Please fill all fields.');
          return;
        }
        Addstudent(name,email,password);
      });
    });
     
    function Addstudent(studentname,studentemail,studentpassword){

      $.ajax({
          url: 'insert.php', 
          type: 'POST',        
          data: { 
            name: studentname, 
            email: studentemail, 
            password: studentpassword 
          },
          success: function(response) {
           alert("data inserted successfully");
          },

          error: function(response) {
            alert("error in your Ajax");
          }
        });

    }
function Loadstudents(){
  $.ajax({
          url: 'select.php', 
          type: 'GET',      
        
          success: function(response) {
                if (response.message) {
                    // Handle case when no records are found
                    $('#studentlist tbody').html('<tr><td colspan="5" class="text-center">' + response.message + '</td></tr>');
                } else {
                    // Populate table
                    let rows = '';
                    response.forEach(function(student) {
                        rows += `<tr>
                            <td>${student.id}</td>
                            <td>${student.name}</td>
                            <td>${student.email}</td>
                            <td>${student.password}</td>
                            <td>
                                <button class="btn btn-primary btn-sm edit-btn" data-id="${student.id}">Edit</button>
                                <button class="btn btn-danger btn-sm delete-btn" data-id="${student.id}">Delete</button>
                            </td>
                        </tr>`;
                    });
                    $('#studentlist tbody').html(rows);
                }
            },
          error: function(response) {
            alert("error in your Ajax");
          }
        });
}
  </script>
  <?php
  include('model.php');
  
  
  ?>
</body>
</html>

