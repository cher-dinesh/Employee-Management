<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .employee-card {
            height: 100%;
        }
        .employee-card .card {
            height: 100%;
            border-radius: 10px;
        }
        .employee-card .card-body {
            display: flex;
            flex-direction: column;
        }
        .employee-card .card-body a{
            margin-top: auto;
        }
        .employee-card .card-img-top {
            object-fit: cover;
            height: 200px; 
            border-radius: 10px;
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
            <form class="form-inline my-2 my-lg-0 ml-auto" method="GET" action="index.php">
                <input class="form-control mr-sm-2" type="search" placeholder="Search by name" aria-label="Search" name="search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="add_employee.php">Add Employee</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row">
            <?php
            require_once 'session.php';
            require_once 'db.php';

            $search = isset($_GET['search']) ? $_GET['search'] : '';

            if (!empty($search)) {
                $sql = "SELECT * FROM employees WHERE firstname LIKE '%$search%' OR lastname LIKE '%$search%'";
            } else {
                $sql = "SELECT * FROM employees";
            }

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
            ?>
                    <div class="col-xl-3 col-md-4 col-sm-6 mb-3">
                        <div class="employee-card">
                            <div class="card h-100">
                                <img src="uploads/<?php echo $row['profile_picture']; ?>" class="card-img-top" alt="Profile Picture">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row['firstname'] . ' ' . $row['lastname']; ?></h5>
                                    <p class="card-text"><strong>Email:</strong> <?php echo $row['email']; ?></p>
                                    <p class="card-text"><strong>Phone:</strong> <?php echo $row['phone']; ?></p>
                                    <p class="card-text"><strong>Position:</strong> <?php echo $row['position']; ?></p>
                                    <a href="edit_employee.php?id=<?php echo $row['id']; ?>" class="btn btn-primary mb-2">Edit</a>
                                    <button type="button" class="btn btn-danger" onclick="deleteEmployee(<?php echo $row['id']; ?>)">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "<div class='col-md-12'><p class='text-center'>No employees found.</p></div>";
            }
            ?>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function deleteEmployee(id) {
            if (confirm('Are you sure you want to delete this employee?')) {
                $.ajax({
                    url: 'delete_employee.php',
                    type: 'POST',
                    data: { id: id },
                    success: function(response) {
                        console.log(response);
                        if (response.trim() === "Employee deleted successfully.") {
                            window.location.reload();
                        } else {
                            alert("Failed to delete employee: " + response);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error deleting employee:', error);
                        alert('Error deleting employee: ' + error);
                    }
                });
            }
        }
    </script>
</body>
</html>
