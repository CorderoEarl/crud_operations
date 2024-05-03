<!DOCtype html>
<?php session_start(); ?>

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" crossorigin="anonymous">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.js" crossorigin="anonymous"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>

<html>
    <head>
    <title>Food Suggestion Records</title>
        <style>
            body {
                background-color: #f8f9fa;
                padding-top: 20px;
            }
            .table-container {
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
                padding: 20px;
                border-radius: 8px;
                background-color: #fff;
            }
            table {
                margin-bottom: 20px;
            }
            .btn-primary {
                background-color: #0056b3;
                margin-top: 10px;
            }
            .btn-primary:hover {
                background-color: #003580;
            }
            .alert {
                margin-top: 20px;
            }
            .action-buttons .btn {
                margin-right: 5px; 
            }

            .edit-btn {
                color: white;
                background-color: #17a2b8;
                border-color: #17a2b8;
            }

            .edit-btn:hover {
                background-color: #138496;
                border-color: #117a8b;
            }

            .delete-btn {
                color: white;
                background-color: #dc3545; 
                border-color: #dc3545;
            }

            .delete-btn:hover {
                background-color: #c82333;
                border-color: #bd2130;
            }


        </style>
    </head>

    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <center><h1>Food Suggestion Records</h1></center>
                    <?php
                        if(isset($_SESSION['status']) && $_SESSION['status'] != '') {
                            echo "<div class='alert alert-success' role='alert'>" . $_SESSION['status'] . "</div>";
                            unset($_SESSION['status']);
                        }
                    ?>
                    <div class="table-container">
                        <table class="table table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Customer Name</th>
                                    <th>Contact Number</th>
                                    <th>Email</th>
                                    <th>Food Name</th>
                                    <th>Photo</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php viewAll(); ?>
                            </tbody>
                        </table>
                    </div>

                    <center>
                        <form action="insert.php" method="POST">
                            <button type="submit" class="btn btn-primary" name="add_record">Add New Record</button>
                        </form>
                    </center>
                </div>
            </div>
        </div>


    
</html>


<?php
    function viewAll(){
        include("includes/sqlconnection.php");
        $sql = "SELECT * FROM studinfo order by id";
        $result = $conn->query($sql);

        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo"
                    <tr>
                        <td>$row[id]</td>
                        <td>$row[fullname]</td>
                        <td>$row[contact]</td>
                        <td>$row[email]</td>
                        <td>$row[foodname]</td>
                        <td>
                            <img src='uploads/$row[pic]' width='100' height='75' alt='$row[pic]'>
                        </td>
                           
                        <td class='action-buttons'>
                        <a href='edit.php?id=$row[id]' class='btn edit-btn'>Edit</a>   
                        <a href='controller.php?id=$row[id]&pic=$row[pic]' class='btn delete-btn'>Delete</a>
                        </td>
                    </tr>
                ";


            }
        }
        else{
            echo "
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
            
            
            ";
        }

        $conn->close();
    }


?>