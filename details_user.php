<?php 
session_start();
include 'connection.php';  
include 'navloguser.html';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Details</title>
    <style>
        body {
            background-image: url('images/main2.jpg');
            background-size: cover;
            background-position: center;
            padding-top: 30px; /* adjust according to navbar height */

        }
        .movie-container {
            background: rgba(29, 45, 38, 0.7); /* Translucent background */
            padding: 20px;
            border-radius: 10px;
            color: white;
            width: 60%;
            margin: 50px auto;
            display: flex;
            align-items: center;
            flex-wrap: wrap;
        }
        .movie-poster {
            width: 250px;
            height: auto;
            border-radius: 5px;
            margin-right: 20px;
        }
        .movie-details {
            flex: 1;
            font-size: 12px;
            line-height: 1.6;
        }
        .movie-title {
            font-size: 36px;
            font-weight: bold;
            color: rgb(255, 200, 150);
        }
        .rating-container {
            text-align: center;
            margin-top: 20px;
        }
    </style>
    <script>
        function change(id) {
            var cname = document.getElementById(id).className;
            var ab = document.getElementById(id+"_hidden").value;
            document.getElementById(cname+"rating").value = ab;
            for(var i = ab; i >= 1; i--) {
                document.getElementById(cname + i).src = "images/star2.png";
            }
            var id = parseInt(ab) + 1;
            for(var j = id; j <= 5; j++) {
                document.getElementById(cname + j).src = "images/star1.png";
            }
        }
    </script>
</head>
<body>

<?php
$sql = "SELECT * FROM moviedetails";
$result = mysqli_query($conn, $sql);
$mid = $_GET["mid"];

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row["mid"] == $mid) {
            $mname = $row["moviename"];
            $location1 = $row["image"];
            $avg_query = "SELECT AVG(rating) AS avg FROM rating WHERE moviename='$mname'";
            $answer = mysqli_fetch_assoc(mysqli_query($conn, $avg_query));
            ?>

            <div class="movie-container">
                <img src="<?php echo $location1; ?>" class="movie-poster" alt="Movie Poster">
                <div class="movie-details">
                    <p class="movie-title"><?php echo $row["moviename"]; ?></p>
                    <p><strong>Year of Release:</strong> <?php echo $row["year"]; ?></p>
                    <p><strong>Language:</strong> <?php echo $row["language"]; ?></p>
                    <p><strong>Duration:</strong> <?php echo $row["duration"]; ?></p>
                    <p><strong>Genre:</strong> <?php echo $row["genre"]; ?></p>
                    <p><strong>Director/s:</strong> <?php echo $row["director"]; ?></p>
                    <p><strong>Stars:</strong> <?php echo $row["stars"]; ?></p>
                    <p><strong>Summary:</strong> <?php echo $row["summary"]; ?></p>
                    <p><strong>Rating:</strong> <?php echo round($answer["avg"], 2); ?> <img src="images/star.png" width="20" height="20"></p>
                    <p><a href="review.php?movieid=<?php echo $mid; ?>" style="color: rgb(255, 200, 150); font-weight: bold; font-size: 18px; text-decoration: none;">Reviews</a></p>
                </div>
            </div>

            <div class="rating-container">
                <?php if (isset($_SESSION["username"])) { ?>
                    <form method="post" action="rating.php?id=<?php echo $row["moviename"]; ?>&uname=<?php echo $_SESSION["username"]; ?>">
    <div class="ratings" style="display: flex; gap: 5px; justify-content: center;">
        <?php for ($i = 1; $i <= 5; $i++) { ?>
            <input type="hidden" id="php<?php echo $i; ?>_hidden" value="<?php echo $i; ?>">
            <img src="images/star1.png" onmouseover="change(this.id);" id="php<?php echo $i; ?>" class="php" width="40px" height="40px">
        <?php } ?>
    </div>
    
    <div style="display: flex; justify-content: center; align-items: center; gap: 15px; margin-top: 10px;">
        <input type="hidden" name="phprating" id="phprating" value="0">
        <input type="submit" value="Submit" name="rate" class="btn btn-warning">  
    </div>
</form>


                <?php } else { ?>
                    <p><a href="login.php" style="color: rgb(255, 200, 150); font-weight: bold;">LOGIN TO RATE & Review</a></p>
                <?php } ?>
            </div>

            <?php
            break;
        }
    }
} else {
    echo "<p style='color: white; text-align: center;'>No results found.</p>";
}
mysqli_close($conn);
?>

</body>
</html>
