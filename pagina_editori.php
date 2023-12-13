<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fetch and Approve Articles</title>
    <link rel="stylesheet" href="css.css">

</head>
<body>
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

    // Fetch articles from the 'articole' table
    $sql = "SELECT * FROM articole";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<div>";
            echo "<h3>" . $row["titlu"] . "</h3>";
            echo "<p>Author: " . $row["autor"] . "</p>";
            echo "<p>Date: " . $row["data"] . "</p>";
            echo "<p>" . $row["content"] . "</p>";
            echo "<form action='approve_article.php' method='post'>";
            echo "<input type='hidden' name='article_id' value='" . $row["id"] . "'>";
            echo "<input type='submit' value='Approve'>";
            echo "</form>";
            echo "</div>";
        }
    } else {
        echo "0 results";
    }

    $conn->close();
    ?>
</body>
</div>
        <a href="logout.php" class="btn btn-warning">Logout</a>
</div>
</html>
