<?php session_start();
    include 'connection.php';  
    include 'admin_navbar.html';
?>
<!DOCTYPE html>
<html>
<head>
    <
    <title>Details</title>
    <style>
         html, body {
            background-color: #4a8e77; /* Green color - match your header */
            margin: 0;
            padding: 0;
            min-height: 100%;

			background-image: url('images/main2.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;
        }
        .movie-container {
            background: rgba(29, 45, 38, 0.7); /* Translucent background */
            padding: 20px;
            border-radius: 10px;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            max-width: 800px;
            margin: 50px auto;
        }
        .movie-poster img {
            width: 250px;
            height: auto;
            border-radius: 10px;
        }
        .movie-details {
            padding-left: 12px;
            max-width: 500px;
        }
        .rating-section {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div >
<?php
    $sql = "SELECT * FROM moviedetails";
    $result = mysqli_query($conn, $sql);
    $mid = $_GET["mid"];
    if (mysqli_num_rows($result) > 0) 
    {
        while($row = mysqli_fetch_assoc($result)) 
        {
            if($row["mid"]==$mid)
            {   
                $mname = $row["moviename"];
                $location1 = $row["image"];
                $avg = "SELECT avg(rating) as avg from rating where moviename='$mname'";
                $answer = mysqli_fetch_assoc(mysqli_query($conn,$avg));
                ?>
                <div class="movie-container">
                    <div class="movie-poster">
                        <img src="<?php echo $location1; ?>" alt="Movie Poster">
                    </div>
                    <div class="movie-details">
                        <h2><?php echo $row["moviename"]; ?></h2>
                        <p><strong>Year of Release:</strong> <?php echo $row["year"]; ?></p>
                        <p><strong>Language:</strong> <?php echo $row["language"]; ?></p>
                        <p><strong>Duration:</strong> <?php echo $row["duration"]; ?></p>
                        <p><strong>Genre:</strong> <?php echo $row["genre"]; ?></p>
                        <p><strong>Directors:</strong> <?php echo $row["director"]; ?></p>
                        <p><strong>Stars:</strong> <?php echo $row["stars"]; ?></p>
                        <p><strong>Summary:</strong> <?php echo $row["summary"]; ?></p>
                        <p><strong>Rating:</strong> <?php echo round($answer["avg"],2); ?> <img src="images/star.png" width="25" height="30"/></p>
                    </div>
                </div>
                <div class="rating-section">
                    <!-- Rating form goes here -->
                </div>
                <?php
                break;
            }   
        }
    } 
    else {
        echo "<p style='text-align:center; color:white;'>0 results</p>";
    }
    mysqli_close($conn);
?>
</div>
</body>
</html>
