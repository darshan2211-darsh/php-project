<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $website = $_POST['website'];
    $comment = $_POST['comment'];
    $gender = $_POST['gender'];
    
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "FCT";
 
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
 
    // Insert query
    $sql = "INSERT INTO users (name, email, website, comment, gender)
            VALUES ('$name', '$email', '$website', '$comment', '$gender')";
    ?>
 
    <!DOCTYPE html>
    <html>
    <head>
    <title>Form Submission Result</title>
    </head>
    <body>
    <?php
        if (mysqli_query($conn, $sql)) {
            echo "<h2>✅ New record created successfully!</h2>";
            echo "<h3>Submitted Information:</h3>";
            echo "<ul>";
            echo "<li><strong>Name:</strong> " . htmlspecialchars($name) . "</li>";
            echo "<li><strong>Email:</strong> " . htmlspecialchars($email) . "</li>";
            echo "<li><strong>Website:</strong> " . htmlspecialchars($website) . "</li>";
            echo "<li><strong>Comment:</strong> " . htmlspecialchars($comment) . "</li>";
            echo "<li><strong>Gender:</strong> " . htmlspecialchars($gender) . "</li>";
            echo "</ul>";
        } else {
            echo "<h3>❌ Error: " . $sql . "<br>" . mysqli_error($conn) . "</h3>";
        }
    
        mysqli_close($conn);
        ?>
    </body>
    </html>
