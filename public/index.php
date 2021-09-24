<!DOCTYPE html>
<html lang="en">
      <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- UIkit CSS -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.7.3/dist/css/uikit.min.css" />
      
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="css/style.css">
      <title>Test Edusogno</title>
      </head>
      <body class="uk-animation-fade uk-padding-small">
            <form action="php/create_db.php" method="POST" class="uk-position-fixed">
                  <input type="submit" onclick="this.disabled" value="Create DB" class="db_btn uk-animation-scale-up">
            </form>
            <div class="uk-container">

                  <h2 class="uk-text-center uk-text-uppercase uk-animation-slide-left">User form</h2>
                  <!-- Form utente -->
                  <form action="php/user_insert.php" method="post">
                        <label for="userName">Name</label>
                        <input type="text" id="userName" name="user_name" class="uk-input uk-margin-bottom" placeholder="Insert your name" maxlength="50"></input>

                        <label for="userSurname">Surname</label>
                        <input type="text" id="userSurname" name="user_surname" class="uk-input uk-margin-bottom" placeholder="Insert your surname" maxlength="100"></input>

                        <label for="userEmail">Email</label>
                        <input type="email" id="userEmail" name="user_email" class="uk-input uk-margin-bottom" placeholder="Insert your email" maxlength="255"></input>

                        <input type="submit" value="Submit" onclick="this.disabled" class="submit uk-padding-small uk-animation-shake">
                  </form>

                  <h2 class="uk-text-center uk-text-uppercase uk-animation-slide-left">Event form</h2>
                  <!-- Form evento -->
                  <form action="php/event_insert.php" method="post">
                        <label for="eventName">Name</label>
                        <input type="text" id="eventName" name="event_name" class="uk-input uk-margin-bottom" placeholder="Insert event name" maxlength="100"></input>

                        <label for="eventDescription">Description</label>
                        <input type="text" id="eventDescription" name="event_description" class="uk-textarea uk-margin-bottom" placeholder="Insert a short event description" maxlength="255"></input>

                        <label for="eventDate">Date</label>
                        <input type="date" id="eventDate" name="event_date" class="uk-input uk-margin-bottom" placeholder="Insert event date"></input>

                        <label for="eventHour">Hour</label>
                        <input type="time" id="eventHour" name="event_hour" class="uk-input uk-margin-bottom" placeholder="Insert event hour"></input>

                        <input type="submit" value="Submit" onclick="this.disabled" class="submit uk-padding-small uk-animation-shake">
                  </form>

            </div>

            <!-- UIkit JS -->
            <script src="https://cdn.jsdelivr.net/npm/uikit@3.7.3/dist/js/uikit.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/uikit@3.7.3/dist/js/uikit-icons.min.js"></script>
      </body>
</html>