<!DOCTYPE html>
<html>
      <head>
      <!-- UIkit CSS -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.7.3/dist/css/uikit.min.css" />

      <title>Event insert page</title>
      </head>
      <body>
            <div class="uk-container">

                  <?php
                        include "../db/db_connection.php";
                        // Taking all 3 values from the form data(input)
                        $name =  trim($_REQUEST['event_name']);
                        $description = trim($_REQUEST['event_description']);
                        $date =  trim($_REQUEST['event_date']);
                        $hour = trim($_REQUEST['event_hour']);
                        
                        // Performing insert query execution
                        $sql = "INSERT INTO events (event_name, event_description, event_date, event_hour) VALUES ('$name', 
                        '$description', '$date', '$hour')";
                        
                        if(mysqli_query($conn, $sql)){
                              echo "<h3>Event data correctly registered</h3>";  
                              $last_id = $conn->insert_id;  
                              // echo nl2br("\n$name\n" 
                              //       . "$description\n "
                              //       . "$date\n"
                              //       . "$hour");
                              echo("<form action='../api/quickstart.php'>
                                          <input readonly type='hidden' name='id' value=$last_id></input><br>
                                          <input readonly type='text' name='name' value=$name></input><br>
                                          <input readonly type='date' name='date' value=$date></input><br>
                                          <input readonly type='time' name='hour' value=$hour></input><br>
                                          <input type='submit' onclick='this.disabled' value='Create Google Calendar event'>
                                    </form>");
                        } else {
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