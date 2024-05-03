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
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 50px;
        }
        .form-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 500px;
            margin: auto;
        }
        .form-container h1 {
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 10px;
        }
        button {
            background-color: #0056b3;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            margin-top: 20px;
        }
        button:hover {
            background-color: #003580;
        }
    </style>
    
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="form-container">
                        <h1>Suggest New Food</h1>

                        <form action="controller.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="txtname">Customer Name</label>
                                <input type="text" class="form-control" id="txtname" name="txtname">
                            </div>
                            <div class="form-group">
                                <label for="txtcontact">Contact Number</label>
                                <input type="text" class="form-control" id="txtcontact" name="txtcontact">
                            </div>
                            <div class="form-group">
                                <label for="txtemail">Email Address</label>
                                <input type="email" class="form-control" id="txtemail" name="txtemail">
                            </div>
                            <div class="form-group">
                                <label for="txtfood">Food Name</label>
                                <input type="text" class="form-control" id="txtfood" name="txtfood">
                            </div>
                            <div class="form-group">
                                <label for="txtpic">Food Picture</label>
                                <input type="file" class="form-control" id="txtpic" name="txtpic">
                            </div>
                            <button type="submit" name="save_record">Save Suggestion</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
