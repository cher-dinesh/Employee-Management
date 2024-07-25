<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Employee Added</title>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

.popup {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
    max-width: 400px;
    text-align: center;
}

.popup h2 {
    color: #333;
}

.popup p {
    color: #666;
    margin-bottom: 20px;
}

.popup button {
    background-color: #4CAF50;
    color: white;
    border: none;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.popup button:hover {
    background-color: #45a049;
}
</style>
</head>
<body>
<div class="popup">
    <h2>Employee Added Successfully!</h2>
    <p>You have successfully added a new employee to the database.</p>
    <button onclick="closePopup()">Close</button>
</div>

<script>
function closePopup() {
    window.location.href = 'index.php';
}
</script>

</body>
</html>
