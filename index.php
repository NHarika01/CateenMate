<?php include('partials/menu.php'); ?>

<!-- Main Content Section Starts -->
<div class="main-content">
    <div class="wrapper">
        <h1>Dashboard</h1>
        <br><br>
        <?php 
            if (isset($_SESSION['login'])) {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
        ?>
        <br><br>

        <div class="col-4 text-center">
            <?php 
                // SQL Query 
                $sql = "SELECT * FROM tbl_category";
                // Execute Query
                $res = mysqli_query($conn, $sql);
                // Count Rows
                $count = mysqli_num_rows($res);
            ?>
            <h1><?php echo $count; ?></h1>
            <br />
            Categories
        </div>

        <div class="col-4 text-center">
            <?php 
                // SQL Query 
                $sql2 = "SELECT * FROM tbl_food";
                // Execute Query
                $res2 = mysqli_query($conn, $sql2);
                // Count Rows
                $count2 = mysqli_num_rows($res2);
            ?>
            <h1><?php echo $count2; ?></h1>
            <br />
            Foods
        </div>

        <div class="col-4 text-center">
            <?php 
                // SQL Query 
                $sql3 = "SELECT * FROM tbl_order";
                // Execute Query
                $res3 = mysqli_query($conn, $sql3);
                // Count Rows
                $count3 = mysqli_num_rows($res3);
            ?>
            <h1><?php echo $count3; ?></h1>
            <br />
            Total Orders
        </div>

        <div class="col-4 text-center">
            <?php 
                // Create SQL Query to Get Total Revenue Generated for Delivered Orders
                $sql4 = "SELECT SUM(total) AS Total FROM tbl_order WHERE status='Delivered'";

                // Execute the Query
                $res4 = mysqli_query($conn, $sql4);

                // Check if the query was successful
                if ($res4) {
                    // Fetch the result
                    $row4 = mysqli_fetch_assoc($res4);

                    // Get the Total Revenue and handle NULL value
                    $total_revenue = $row4['Total'] ?? 0; // Use 0 if Total is NULL
                } else {
                    // Output query error if any
                    $total_revenue = 0; // Default to 0 if query fails
                    echo "Error: " . mysqli_error($conn);
                }
            ?>
            <h1>Rs. <?php echo number_format($total_revenue, 2); ?></h1> <!-- Format as currency -->
            <br />
            Revenue Generated
        </div>

        <div class="clearfix"></div>
    </div>
</div>
<!-- Main Content Section Ends -->

<?php include('partials/footer.php') ?>
