<!DOCTYPE html>
<html> 
      <head>
      <!-- UIkit CSS -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.7.3/dist/css/uikit.min.css" />

      <title>User insert page</title>
      </head>
      <body>
            <div class="uk-container">

                  <?php
                        include "../db/db_connection.php";
                        // Taking all 3 values from the form data(input)
                        $name =  trim($_REQUEST['user_name']);
                        $surname = trim($_REQUEST['user_surname']);
                        $email =  trim($_REQUEST['user_email']);
                        $inbox_email = 'https://generator.email/'.trim($_REQUEST['user_email']);
                        
                        // Performing insert query execution
                        $sql = "INSERT INTO users (usr_name, usr_surname, usr_email, inbox_email) VALUES ('$name', 
                        '$surname', '$email', '$inbox_email')";
                        
                        if(mysqli_query($conn, $sql)){
                              echo "<h3>User data correctly registered</h3>";     
                              echo( nl2br("\n$name\n $surname\n "
                                    . "$email\n"));
                        } else{
                              echo "ERROR: Hush! Sorry $sql. " 
                                    . mysqli_error($conn);
                        }
                        
                        // Close connection
                        mysqli_close($conn);
                  ?>

            </div>
            <!-- UIkit JS -->
            <script src="https://cdn.jsdelivr.net/npm/uikit@3.7.3/dist/js/uikit.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/uikit@3.7.3/dist/js/uikit-icons.min.js"></script>
      </body>
</html>