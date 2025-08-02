<?php session_start();
    include 'connection.php';  
    include 'navbar.html';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Details</title>
    <style>
        html, body {
            background-color: #4a8e77; /* Green color - match your header */
            margin: 0;
            padding: 0;
            min-height: 100%;
            padding-top: 30px; /* adjust according to navbar height */

			background-image: url('images/main2.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;
        }
        .movie-container {
            background-color: rgba(29, 45, 38, 0.7); /* Black translucent background */
            color: white;
            padding: 20px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
            max-width: 60%;
            margin: 30px auto;
        }
        .movie-poster {
            flex: 1;
            text-align: center;
        }
        .movie-poster img {
            width: 300px;
            height: 450px;
            border-radius: 8px;
        }
        .movie-details {
            flex: 2;
            padding: 15px;
        }
        .movie-title {
            font-family: Verdana;
            font-size: 36px;
            color: rgb(255, 204, 102); /* Gold color for contrast */
            margin-bottom: 10px;
        }
        .movie-info {
            font-family: Verdana;
            font-size: 12px;
            line-height: 1.4;

        }
        .rating-section {
            text-align: center;
            font-size: 18px;
            margin-top: 10px;
        }
        select, .btn-sm {
            font-size: 16px;
            padding: 5px;
        }
    </style>
</head>
<body>
<div >
    <?php
        $sql = "SELECT * FROM moviedetails";
        $result = mysqli_query($conn, $sql);
        $mid = $_GET["mid"];
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                if ($row["mid"] == $mid) {
                    $mname = $row["moviename"];
                    $location1 = $row["image"];
                    echo '<div class="movie-container">';
                    echo '<div class="movie-poster"><img src="' . $location1 . '" alt="Movie Poster"></div>';
                    echo '<div class="movie-details">';
                    echo '<p class="movie-title">' . $row["moviename"] . '</p>';
                    echo '<p class="movie-info">Year: ' . $row["year"] . '<br>';
                    echo 'Language: ' . $row["language"] . '<br>';
                    echo 'Duration: ' . $row["duration"] . '<br>';
                    echo 'Genre: ' . $row["genre"] . '<br>';
                    echo 'Director: ' . $row["director"] . '<br>';
                    echo 'Stars: ' . $row["stars"] . '</p>';
                    echo '<p class="movie-info"><strong>Summary:</strong> ' . $row["summary"] . '</p>';
                    
                    // Fetch and display average rating
                    $avg = "SELECT avg(rating) as avg FROM rating WHERE moviename='$mname'";
                    $answer = mysqli_fetch_assoc(mysqli_query($conn, $avg));
                    echo '<p class="rating-section">Rating: ' . round($answer["avg"], 2) . ' <img src="images/star.png" width="20" height="24"></p>';
                    
                    // Rating form
                    if (isset($_SESSION["username"])) {
                        echo '<form method="POST" action="rating.php?id=' . $row["moviename"] . '&uname=' . $_SESSION["username"] . '">
                            <select name="rating">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <input type="submit" name="rate" value="Rate" class="btn btn-sm">
                            
                        </form>';
                    } else {
                        echo '<br><a href="login.php" style="color: red; font-weight: bold;">LOGIN TO RATE & Review</a>';
                    }
                    
                    echo '</div></div>'; // Closing movie-container
                    break;
                }
            }
        } else {
            echo "No results found.";
        }

        mysqli_close($conn);
    ?>
</div>
</body>
</html>
