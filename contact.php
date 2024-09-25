<?php include('partials-front/menu.php'); ?>

<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "food-order"; // Change this to your actual database name

// Create a connection
$con = mysqli_connect($server, $username, $password, $database);

// Check the connection
if(!$con) {
    die("Connection to the database failed: " . mysqli_connect_error());
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $Name = $_POST['name'];
    $Email = $_POST['email'];
    $Subject = $_POST['subject'];
    $Message = $_POST['message'];

    // SQL query to insert data into tbl_contact
    $sql = "INSERT INTO `tbl_contact` (`Name`, `Email`, `Subject`, `Message`) VALUES ('$Name', '$Email', '$Subject', '$Message')";

    // Execute the query and check for success
    if (mysqli_query($con, $sql)) {
        echo "Message submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
}

// Close the connection
mysqli_close($con);
?>

<div class="main-container">
    <div class="contact-container">
        <div class="contact-info">
            <h2>Contact CanteenMate Team</h2>
            <p><strong>Address:</strong> GCTC Canteen Mate Team </p>
            <p><strong>Email:</strong> supportcanteenmate@gmail.com</p>
            <p><strong>Phone:</strong> 7780438599</p>
        </div>

        <div class="contact-form">
            <h3>Get in Touch</h3>
            <form action="" method="POST">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" required>
                
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
                
                <label for="subject">Subject:</label>
                <input type="text" name="subject" id="subject" required>
                
                <label for="message">Message:</label>
                <textarea name="message" id="message" required></textarea>
                
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>
</div>

<?php include('partials-front/footer.php'); ?>
