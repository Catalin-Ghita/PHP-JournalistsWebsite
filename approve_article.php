<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "articole";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $articleId = $_POST["article_id"];

    // Copy the approved article to 'aprobate' table
    $sqlCopy = "INSERT INTO aprobate SELECT * FROM articole WHERE id = $articleId";
    $resultCopy = $conn->query($sqlCopy);

    if ($resultCopy === TRUE) {
        echo "Articolul a fost aprobat cu succes!";
    } else {
        echo "Error: " . $sqlCopy . "<br>" . $conn->error;
    }

    // Optionally, you might want to delete the approved article from 'articole' table
    $sqlDelete = "DELETE FROM articole WHERE id = $articleId";
    $resultDelete = $conn->query($sqlDelete);

    if ($resultDelete === TRUE) {
        echo "";
    } else {
        echo "Error: " . $sqlDelete . "<br>" . $conn->error;
    }
}

$conn->close();
?>
