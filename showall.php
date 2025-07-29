<?php 
session_start();
include 'connection.php';  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ShowAll - Ghibliesque</title>
    
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url('images/main2.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            min-height: 100vh;
            font-family: Arial, sans-serif;
        }
        
        .movie-container {
            text-align: center;
            margin-top: 20px;
            padding: 20px;
            margin: 20px auto;
            max-width: 1200px;
        }
        
        .movie-image {
            width: 200px;
            height: 300px;
            margin: 10px;
            transition: transform 0.4s ease-in-out;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.3);
            object-fit: cover;
        }
        
        .movie-image:hover {
            transform: scale(1.06);
            box-shadow: 0 8px 25px rgba(0,0,0,0.5);
        }
        
        footer {
            margin-top: 40px;
            padding: 20px 0;
            background-color: rgba(211, 211, 211, 0.9);
            text-align: center;
            backdrop-filter: blur(5px);
        }
        
        footer h4 {
            margin: 0;
            color: #333;
            font-size: 1.1rem;
        }
        
        /* Responsive Design */
        @media (max-width: 1200px) {
            .movie-image {
                width: 180px;
                height: 270px;
                margin: 8px;
            }
        }
        
        @media (max-width: 992px) {
            .movie-image {
                width: 160px;
                height: 240px;
                margin: 6px;
            }
        }
        
        @media (max-width: 768px) {
            .movie-container {
                margin: 10px;
                padding: 15px;
            }
            
            .movie-image {
                width: 140px;
                height: 210px;
                margin: 5px;
            }
        }
        
        @media (max-width: 576px) {
            .movie-image {
                width: 120px;
                height: 180px;
                margin: 4px;
            }
        }
        
        @media (max-width: 480px) {
            .movie-image {
                width: 100px;
                height: 150px;
                margin: 3px;
            }
        }
    </style>
</head>
<body>
    <?php include 'navbar.html'; ?>

    <div class="movie-container">
        <?php
        $sql = "SELECT * FROM moviedetails ORDER BY moviename ASC";
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) > 0) {
            $count = 0;
            while($row = mysqli_fetch_assoc($result)) {
                $location = $row["image"];
                $movie_title = htmlspecialchars($row["moviename"]);
                echo '<a href="details.php?mid='.$row["mid"].'">';
                echo '<img src="'.$location.'" class="movie-image" alt="'.$movie_title.'" title="'.$movie_title.'">';
                echo '</a>'; 
                
                $count++;
                if($count == 5) {
                    echo '<br><br>';
                    $count = 0;
                }
            }
        } else {
            echo "<p style='color: white; font-size: 1.5rem;'>No movies found in our collection.</p>";
        }
        mysqli_close($conn);
        ?>
    </div>

    <footer>
        <h4>&copy; 2024 Studio Ghibli - Ghibliesque</h4>
    </footer>
</body>
</html>
