<!DOCTYPE html>
<html>

<head>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" crossorigin="anonymous">
  
  <!-- Optional theme -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" crossorigin="anonymous">
  
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.7.1.js" crossorigin="anonymous"></script>
  
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
  
  <title>Restaurant</title>
</head>

<body style="background-color: #f5f5f5;">
  <div class="container" style="background-color: #fff; border-radius: 10px; margin-top: 50px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
    <h1 class="text-center" style="margin-top: 20px;">Edit Food Suggestion</h1>
    
    <form action="controller.php" method="POST" enctype="multipart/form-data" style="padding: 20px;">
      <?php
          getRecord($_GET['id']);
      ?>
      <div class="form-group text-center" style="margin-top: 20px;">
        <button type="submit" class="btn btn-primary" name="update_record">Update Suggestion</button>
      </div>
    </form>
  </div>
</body>

</html>

<?php
function getRecord($recno) {
    include("includes/sqlconnection.php");
    $sql = "SELECT * FROM studinfo WHERE id='$recno'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          
            $imagePath = 'uploads/' . htmlspecialchars($row['pic']);
            echo '
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="txtname">Customer Name</label>
                            <input type="hidden" name="txtid" value="'.htmlspecialchars($row['id']).'">
                            <input type="text" class="form-control" name="txtname" value="'.htmlspecialchars($row['fullname']).'">
                        </div>
                        <div class="form-group">
                            <label for="txtcontact">Contact Number</label>
                            <input type="text" class="form-control" name="txtcontact" value="'.htmlspecialchars($row['contact']).'">
                        </div>
                        <div class="form-group">
                            <label for="txtemail">Email Address</label>
                            <input type="text" class="form-control" name="txtemail" value="'.htmlspecialchars($row['email']).'">
                        </div>
                        <div class="form-group">
                            <label for="txtfood">Food Name</label>
                            <input type="text" class="form-control" name="txtfood" value="'.htmlspecialchars($row['foodname']).'">
                        </div>
                        <div class="form-group">
                            <label for="txtpic">Food Picture</label>
                            <input type="file" class="form-control" name="txtpic">
                            <input type="hidden" name="txtpic_old" value="'.htmlspecialchars($row['pic']).'">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <img src="'.$imagePath.'" alt="Current Picture" class="img-responsive img-thumbnail" style="max-width: 100%; height: auto;">
                    </div>
                </div>
            ';
        }
    } else {
        echo "No record found";
    }
    $conn->close();
}
?>
