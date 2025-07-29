
<?php 
   include 'connection.php';
   
          
          $name=$_POST['Name'];
		  $img= $_POST['image'];
          $year=$_POST['Year'];
          $lan=$_POST['lang'];
          $duration=$_POST['dur'];
          $genre=$_POST['genre'];
          $director=$_POST['director'];
          $stars=$_POST['stars'];
          $summary=$_POST['summ'];
              
          
               $sql="INSERT INTO moviedetails(moviename, image, year,language,duration,genre,director,stars,summary)
               VALUES('$name', '$img', '$year','$lan','$duration','$genre','$director','$stars','$summary')";

               if(mysqli_query($conn,$sql)){
                    echo "successful";
                     header('location:showall.php');
                }
               else{
                    echo "Error" . mysqli_error($conn);
               }
                    
         

?>