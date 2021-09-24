<!DOCTYPE html>
<html lang="en">
      <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- UIkit CSS -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.7.3/dist/css/uikit.min.css" />
      
      <link rel="stylesheet" href="css/style.scss">
      <title>Test Edusogno</title>
      </head>
      <body>
            <form action="php/create_db.php" method="POST">
                  <input type="submit" value="Create DB">
            </form>
            <div class="uk-container">

                  <h2 class="uk-text-center uk-text-uppercase">User form</h2>
                  <!-- Form utente -->
                  <form action="php/user_insert.php" method="post">
                        <label for="userName">Name</label>
                        <input type="text" id="userName" name="user_name" class="uk-input uk-margin-bottom" placeholder="Insert your name"></input>

                        <label for="userSurname">Surname</label>
                        <input type="text" id="userSurname" name="user_surname" class="uk-input uk-margin-bottom" placeholder="Insert your surname"></input>

                        <label for="userEmail">Email</label>
                        <input type="email" id="userEmail" name="user_email" class="uk-input uk-margin-bottom" placeholder="Insert your email"></input>

                        <input type="submit" value="Submit" class="submit uk-width-1-1 uk-padding-small">
                  </form>

                  <hr class="uk-width-1-2 uk-margin-auto">

                  <h2 class="uk-text-center uk-text-uppercase">Event form</h2>
                  <!-- Form evento -->
                  <form action="php/event_insert.php" method="post">
                        <label for="eventName">Name</label>
                        <input type="text" id="eventName" name="event_name" class="uk-input uk-margin-bottom" placeholder="Insert event name"></input>

                        <label for="eventDescription">Description</label>
                        <input type="text" id="eventDescription" name="event_description" class="uk-textarea uk-margin-bottom" placeholder="Insert an event description"></input>

                        <label for="eventDate">Date</label>
                        <input type="date" id="eventDate" name="event_date" class="uk-input uk-margin-bottom" placeholder="Insert event date"></input>

                        <label for="eventHour">Hour</label>
                        <input type="time" id="eventHour" name="event_hour" class="uk-input uk-margin-bottom" placeholder="Insert event hour"></input>

                        <input type="submit" value="Submit" class="submit uk-width-1-1 uk-padding-small">
                  </form>

            </div>

            <!-- UIkit JS -->
            <script src="https://cdn.jsdelivr.net/npm/uikit@3.7.3/dist/js/uikit.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/uikit@3.7.3/dist/js/uikit-icons.min.js"></script>
      </body>
</html>