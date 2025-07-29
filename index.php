<?php 
session_start(); 
include "connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Crimson+Text:wght@400;600&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Welcome to Ghibliesque - Studio Ghibli Movie Collection</title>
    
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Inter', Arial, sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .hero-section {
            background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.6)), url('images/main2.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            min-height: 80vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            flex: 1;
        }

        .hero-content {
            max-width: 800px;
            padding: 40px 20px;
            background: rgba(0,0,0,0.1);
            border-radius: 15px;
            backdrop-filter: blur(3px);
        }

        .hero-content h1 {
            font-family: 'Crimson Text', serif;
            font-size: 3.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.8);
        }

        .hero-content p {
            font-size: 1.3rem;
            margin-bottom: 2rem;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.8);
            line-height: 1.6;
        }

        .action-buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 30px;
        }

        .btn-primary-custom {
            background: linear-gradient(45deg, #64b49a, #7ac3a8);
            border: none;
            color: white;
            padding: 15px 30px;
            font-size: 1.1rem;
            font-weight: 500;
            border-radius: 50px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s ease;
            min-width: 180px;
            justify-content: center;
        }

        .btn-primary-custom:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(100, 180, 154, 0.4);
            color: white;
        }

        .btn-secondary-custom {
            background: linear-gradient(45deg, #ffcc66, #ffd700);
            border: none;
            color:rgb(245, 242, 241);
            padding: 15px 30px;
            font-size: 1.1rem;
            font-weight: 500;
            border-radius: 50px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s ease;
            min-width: 180px;
            justify-content: center;
        }

        .btn-secondary-custom:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(255, 204, 102, 0.4);
            color: #2f1b15;
        }





        footer {
            background: linear-gradient(135deg,#64b49a,#64b49a);
            color: white;
            text-align: center;
            padding: 10px 0px;
            margin-top: auto;
        }

        footer h5 {
            margin: 0;
            font-family: 'Crimson Text', serif;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero-content h1 {
                font-size: 2.5rem;
            }
            
            .hero-content p {
                font-size: 1.1rem;
            }
            
            .action-buttons {
                flex-direction: column;
                align-items: center;
            }
            
            .btn-primary-custom,
            .btn-secondary-custom {
                width: 250px;
            }
        }
    </style>
</head>
<body>
    <?php include 'navbar.html'; ?>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-content">
            <h1>Welcome to Ghibliesque</h1>
            <p>Discover the magical world of Studio Ghibli films. Join the community and share the love for these timeless stories. </p>
            
            <div class="action-buttons">
                <a href="showall.php" class="btn-primary-custom">
                    <i class="fas fa-film"></i>Browse Movies
                </a>
                <a href="login.php" class="btn-secondary-custom">
                    <i class="fas fa-sign-in-alt"></i>Sign In
                </a>
            </div>
        </div>
    </section>





    <!-- Footer -->
    <footer>
        <h5>&copy; 2024 Ghibliesque - Celebrating Studio Ghibli</h5>
        <p style="margin: 5px 0 0 0; opacity: 0.8;">Made with <i class="fas fa-heart" style="color: #ff6b6b;"></i> for Ghibli fans worldwide</p>
    </footer>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

