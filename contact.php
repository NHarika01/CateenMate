<?php include('partials/menu.php'); ?>

<?php
// Step 1: Connect to the database
$server = "localhost";
$username = "root";
$password = "";
$database = "food-order"; // Your database name for CanteenMate

// Create a connection
$con = mysqli_connect($server, $username, $password, $database);

// Check the connection
if(!$con) {
    die("Connection to the database failed: " . mysqli_connect_error());
}

// Step 2: Retrieve data from the tbl_contact table
$sql = "SELECT * FROM tbl_contact"; // Query to fetch all contacts
$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Contact Submissions</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        .main-container {
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="main-container">
        <h1>Contact Form Submissions</h1>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Step 3: Display the data in the table
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['Name'] . "</td>";
                        echo "<td>" . $row['Email'] . "</td>";
                        echo "<td>" . $row['Subject'] . "</td>";
                        echo "<td>" . $row['Message'] . "</td>";
                    
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No submissions found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <?php
    // Step 4: Close the database connection
    mysqli_close($con);
    ?>
</body>
</html>

<?php include('partials/footer.php'); ?>
