<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
?><!-- Content Row -->
<div class="container card">
    <form method="GET">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search by Name" name="search">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </div>
        </div>
    </form>

    <?php
    include('includes/dbconfig.php');

    // Initialize search query
    $search_query = "";

    // Check if search query is set
    if (isset($_GET['search'])) {
        $search = $_GET['search'];
        $search_query = "WHERE full_name LIKE '%$search%'";
    }

    // Fetch users from the database based on search query
    $users_query = "SELECT * FROM users $search_query";
    $users_result = $conn->query($users_query);

    // Check if there are users
    if ($users_result->num_rows > 0) {
    ?>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Job</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $count = 1;
            while ($row = $users_result->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td><?php echo $row["full_name"]; ?></td>
                    <td><?php echo $row["email"]; ?></td>
                    <td><?php echo $row["job"]; ?></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    <?php
    } else {
        echo "No users found.";
    }

    // Close connection
    $conn->close();
    ?>
</div>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
