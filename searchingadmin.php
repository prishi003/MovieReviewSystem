<?php 
session_start(); 
include 'admin_navbar.html';
include "connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<style>
  body {
    background-image: url('images/main2.jpg'); /* Use the same image as the movie page */
    color: rgb(47, 47, 76); 
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    width: 100vw; /* Ensures it covers the full viewport width */
    min-height: 100vh; /* Ensures it covers the full viewport height */
    margin: 0;
    padding: 0;
  }
.search-container {
  font-family: 'Times new roman', sans-serif;
    background: rgba(244, 244, 234, 0.56); /* Dark transparent background */
    padding: 20px;
    border-radius: 10px;
    width: 50%;
    margin: auto;
    text-align: center;
}

</style>
    <title>Movie Search</title>
</head>
<body>

<div class="search-container">
    <h2 class="text-center">Search for a Movie</h2>
        <form method="POST" class="form-inline text-center">
        <input type="text" name="search" class="form-control" placeholder="Enter movie name" required>
        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    <br>

    <?php   
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
        $var = trim($_POST['search']); // Trim spaces

        // Use prepared statement to prevent SQL injection
        $stmt = $conn->prepare("SELECT * FROM moviedetails WHERE moviename LIKE ?");
        $searchTerm = "%$var%";
        $stmt->bind_param("s", $searchTerm);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo '<table class="table table-hover">
            <tr>
               <th>Movie Name</th>
               <th>Year</th>
               <th>Language</th>
               <th>Genre</th>
               <th>Details</th>
            </tr> ';

            while ($row = $result->fetch_assoc()) {
                $mname = htmlspecialchars($row["moviename"]);
                echo "<tr>";
                echo "<td><b>" . $mname . "</b></td>";
                echo "<td>" . htmlspecialchars($row["year"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["language"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["genre"]) . "</td>";
                echo "<td><a href='details_admin.php?mid=" . urlencode($row["mid"]) . "' class='btn btn-info'>View Details</a></td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p class='text-danger text-center'>No results found.</p>";
        }

        $stmt->close();
    }

    $conn->close();
    ?>
</div>

</body>
</html>
