<?php 
session_start();
include 'connection.php';  
include 'navloguser.html';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Reviews</title>
    <style>
        body {
            background-image: url('images/main2.jpg');
            background-size: cover;
            background-position: center;
        }
        .review-container {
            background: rgba(29, 45, 38, 0.7);
            padding: 20px;
            border-radius: 10px;
            color: white;
            width: 60%;
            margin: 50px auto;
        }
        .review-box {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: none;
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border-radius: 5px;
    border: none;
    background: white;  /* Ensure background is white */
    color: black;  /* Set text color to black */
    font-size: 16px; /* Improve readability */

        }
        .submit-btn {
            background-color: rgb(255, 200, 150);
            border: none;
            padding: 10px;
            border-radius: 5px;
            color: black;
            font-weight: bold;
        }
        .review-list {
            margin-top: 20px;
            background: rgba(255, 255, 255, 0.2);
            padding: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<?php
// Ensure movieid is set in the URL
if (isset($_GET["movieid"])) {
    $mid = $_GET["movieid"];
    $sql = "SELECT * FROM moviedetails WHERE mid='$mid'";
    $result = mysqli_query($conn, $sql);
    
    if ($movie = mysqli_fetch_assoc($result)) {
?>

<div class="review-container">
    <h2 style="color: rgb(255, 200, 150);">Reviews for <?php echo $movie["moviename"]; ?></h2>
    
    <?php if (isset($_SESSION["username"])) { ?>
        <form method="post" action="submit_review.php?movieid=<?php echo $mid; ?>">
            <textarea name="review" class="review-box" placeholder="Write your review here..." required></textarea>
            <textarea name="userid" class="review-box" placeholder="Your userid" required></textarea>
            <input type="submit" value="Submit" class="submit-btn">
        </form>
    <?php } else { ?>
        <p><a href="login.php" style="color: rgb(255, 200, 150); font-weight: bold;">LOGIN TO ADD A REVIEW</a></p>
    <?php } ?>

    <div class="review-list">
        <h4 style="color: rgb(255, 200, 150);">User Reviews:</h4>
        <?php
        $review_query = "SELECT * FROM review WHERE movieid={$mid}";
        $reviews = mysqli_query($conn, $review_query);
        
        if (mysqli_num_rows($reviews) > 0) {
            while ($row = mysqli_fetch_assoc($reviews)) {
                echo "<p><strong>" . $row["userid"] . "</strong>: " . $row["review"]."</p>";
            }
        } else {
            echo "<p>No reviews yet. Be the first to review!</p>";
        }
        ?>
    </div>
</div>

<?php 
    } else {
        echo "<p style='color: white; text-align: center;'>Movie not found.</p>";
    }
} else {
    echo "<p style='color: white; text-align: center;'>Invalid request. No movie selected.</p>";
}

mysqli_close($conn);
?>

</body>
</html>
