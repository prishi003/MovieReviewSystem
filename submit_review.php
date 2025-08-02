<?php
session_start();
include 'connection.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userid = $_POST["userid"];  // Assuming userid is stored in session
    $mid = $_GET["movieid"];
    $review = mysqli_real_escape_string($conn, $_POST["review"]);

    // Insert the review into the database
    $sql = "INSERT INTO review (userid, movieid, review) VALUES ('$userid', '$mid', '$review')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Review submitted successfully!'); window.location.href='review.php?mid=$movieid';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
