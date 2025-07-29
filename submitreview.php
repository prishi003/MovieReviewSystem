<?php
session_start();
include 'connection.php';

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if user is logged in
    if (!isset($_SESSION["username"])) {
        header("Location: login.php");
        exit;
    }
    
    // Get form data
    $uid = $_POST['uid'];
    $moviename = $_POST['moviename'];
    $review_text = $_POST['review_text'];
    
    // Find the movie ID for the given movie name
    $mid_query = "SELECT mid FROM moviedetails WHERE moviename = '$moviename'";
    $mid_result = mysqli_query($conn, $mid_query);
    
    if (mysqli_num_rows($mid_result) > 0) {
        $mid_row = mysqli_fetch_assoc($mid_result);
        $mid = $mid_row['mid'];
        
        // Check if this user has already reviewed this movie
        $check_sql = "SELECT * FROM reviews WHERE uid = '$uid' AND moviename = '$moviename'";
        $check_result = mysqli_query($conn, $check_sql);
        
        if (mysqli_num_rows($check_result) > 0) {
            // Update existing review
            $sql = "UPDATE reviews SET review_text = '$review_text', review_date = CURRENT_TIMESTAMP WHERE uid = '$uid' AND moviename = '$moviename'";
        } else {
            // Insert new review
            $sql = "INSERT INTO reviews (uid, moviename, review_text) VALUES ('$uid', '$moviename', '$review_text')";
        }
        
        if (mysqli_query($conn, $sql)) {
            // Redirect back to movie page
            header("Location: detailsuser.php?mid=" . $movieid . "&success=1");
            exit;
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Movie not found.";
    }
}
mysqli_close($conn);
?>