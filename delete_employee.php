<?php
require_once 'session.php';
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM employees WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);

    if ($stmt->execute()) {
        echo "Employee deleted successfully.";
    } else {
        echo "Error deleting employee: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Invalid request."; 
}

$conn->close();
?>
