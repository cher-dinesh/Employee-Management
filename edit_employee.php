<?php
require_once 'session.php';
require_once 'db.php';

$id = $_GET['id'];

$sql = "SELECT * FROM employees WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Employee</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <style>
            .edit-form-container {
                line-height: 0.7;
                max-width: 600px;
                margin-top: -40px;
                margin-left: auto;
                margin-right: auto;
                padding: 10px 30px 30px 30px;
                border: 1px solid #ccc;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                background-color: #fff;
            }
            .edit-form-container h2 {
                text-align: center;
                margin-bottom: 20px;
            }
            .edit-form-container .form-group {
                margin-bottom: 20px;
                display: flex;
                flex-direction: row;
            }
            .edit-form-container .form-group label{
                width: 200px;
                align-self: center;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Employee Management System</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="add_employee.php">Add Employee</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container mt-5">
            <div class="edit-form-container">
                <h2 class="heading">Update Employee</h2>
                <form action="update_employee.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <div class="form-group">
                        <label for="firstname">First Name</label>
                        <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $row['firstname']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="lastname">Last Name</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $row['lastname']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $row['phone']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="position">Position</label>
                        <input type="text" class="form-control" id="position" name="position" value="<?php echo $row['position']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="profile_picture">Profile Picture</label>
                        <br><br>
                        <input type="file" class="form-control-file" id="profile_picture" name="profile_picture">
                    </div>
                    <img src="uploads/<?php echo $row['profile_picture']; ?>" class="img-thumbnail mb-3" width="150">
                    <button type="submit" class="btn btn-primary btn-block">Update Employee</button>
                </form>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <?php
        if (isset($_GET['success']) && $_GET['success'] == 'true') {
            echo '<script>';
            echo '$(document).ready(function() {';
            echo '$("#successModal").modal("show");';
            echo '});';
            echo '</script>';
        }
        ?>

        <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="successModalLabel">Employee Updated Successfully!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>You have successfully updated the employee details.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
                    </div>
                </div>
            </div>
        </div>
    </body>
    </html>
    <?php
} else {
    echo "Employee not found.";
}

$conn->close();
?>
