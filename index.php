

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
    <table class="table table-bordered">
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
      $('#saveData').on('click', function() {
       debugger;
        let name = $('#name').val();
        let email = $('#email').val();
        let password = $('#password').val();
        if (name === "" || email === "" || password === "") {
          alert('Please fill all fields.');
          return;
        }
        $.ajax({
          url: 'insert.php', 
          type: 'POST',      
          data: { 
            name: name, 
            email: email, 
            password: password 
          },
          success: function(response) {
            if (response.success) {
              let newRow = `<tr>
                              <td>${response.id}</td>
                              <td>${name}</td>
                              <td>${email}</td>
                              <td>${password}</td>
                            </tr>`;
              $('#dataForm')[0].reset();
              $('#addItemModal').modal('hide');
            } else {
              'Failed to add data.';
            }
          },
        });
      });
    });
  </script>
  <?php
  include('model.php');
  
  
  ?>
</body>
</html>

