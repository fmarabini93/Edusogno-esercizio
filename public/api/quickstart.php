<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.7.3/dist/css/uikit.min.css" />
    
    <title>Event page</title>
  </head>
  <body>
    <div class="uk-container">
      
      <?php
      require __DIR__ . '/vendor/autoload.php';
      include '../db/db_connection.php';

      // if (php_sapi_name() != 'cli') {
      //     throw new Exception('This application must be run on the command line.');
      // }

      /**
       * Returns an authorized API client.
       * @return Google_Client the authorized client object
       */
      function getClient()
      {
          $client = new Google_Client();
          $client->setApplicationName('Google Calendar API PHP Quickstart');
          $client->setScopes(Google_Service_Calendar::CALENDAR);
          $client->setAuthConfig(__DIR__ .'/credentials.json');
          $client->setAccessType('offline');
          $client->setPrompt('select_account consent');

          // Load previously authorized token from a file, if it exists.
          // The file token.json stores the user's access and refresh tokens, and is
          // created automatically when the authorization flow completes for the first
          // time.
          $tokenPath = 'token.json';
          if (file_exists($tokenPath)) {
              $accessToken = json_decode(file_get_contents($tokenPath), true);
              $client->setAccessToken($accessToken);
          }

          // If there is no previous token or it's expired.
          if ($client->isAccessTokenExpired()) {
              // Refresh the token if possible, else fetch a new one.
              if ($client->getRefreshToken()) {
                  $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
              } else {
                  // Request authorization from the user.
                  $authUrl = $client->createAuthUrl();
                  printf("Open the following link in your browser:\n%s\n", $authUrl);
                  print 'Enter verification code: ';
                  $authCode = trim(fgets(STDIN));

                  // Exchange authorization code for an access token.
                  $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
                  $client->setAccessToken($accessToken);

                  // Check to see if there was an error.
                  if (array_key_exists('error', $accessToken)) {
                      throw new Exception(join(', ', $accessToken));
                  }
              }
              // Save the token to a file.
              if (!file_exists(dirname($tokenPath))) {
                  mkdir(dirname($tokenPath), 0700, true);
              }
              file_put_contents($tokenPath, json_encode($client->getAccessToken()));
          }
          return $client;
      }


      // Get the API client and construct the service object.
      $client = getClient();
      $service = new Google_Service_Calendar($client);

      // Print the next 10 events on the user's calendar.
      $calendarId = 'primary';
      $optParams = array(
        'maxResults' => 10,
        'orderBy' => 'startTime',
        'singleEvents' => true,
        'timeMin' => date('c'),
      );
      $results = $service->events->listEvents($calendarId, $optParams);
      $events = $results->getItems();

      // if (empty($events)) {
      //     print "No upcoming events found.\n";
      // } else {
      //     print "Upcoming events:\n";
      //     foreach ($events as $event) {
      //         $start = $event->start->dateTime;
      //         if (empty($start)) {
      //             $start = $event->start->date;
      //         }
      //         printf("%s (%s)\n", $event->getSummary(), $start);
      //     }
      // }

      
      // Event data
      $id = $_REQUEST['id'];
      $name =  $_REQUEST['name'];
      $date =  $_REQUEST['date'];
      $hour = $_REQUEST['hour'];
      $dateTime= date("c", strtotime($date." ".$hour));
      
      // Users data
      $sql = "SELECT * FROM users";
      $result = mysqli_query($conn, $sql);
      $attendees = [];
      $attendees_email = [];
      while ($row = $result->fetch_assoc()) {
        $attendees[] = $row;
      };
      foreach($attendees as $attendee){
        array_push($attendees_email, ['email' => $attendee['usr_email']]);
      };
      
      $event = new Google_Service_Calendar_Event(array(
        'summary' => $name,
        'location' => 'Somewhere in Italy..',
        'start' => array(
          'dateTime' => $dateTime,
          'timeZone' => 'America/Los_Angeles',
        ),
        'end' => array(
          'dateTime' => $dateTime,
          'timeZone' => 'America/Los_Angeles',
        ),
        'attendees' => $attendees_email,
        'reminders' => array(
          'useDefault' => FALSE,
          'overrides' => array(
            array('method' => 'email', 'minutes' => 24 * 60)
          ),
        ),
        'conferenceData' => [
          'createRequest' => [
            'requestId' => 'randomString'.time()
          ]
        ]
      ));

      $calendarId = 'primary';
      $event = $service->events->insert($calendarId, $event, array("sendUpdates"=>"all", 'conferenceDataVersion' => 1));
      
      // Insert Meet link into DB
      $link = $event['hangoutLink'];
      $add = mysqli_query($conn, "ALTER TABLE events ADD meet_link VARCHAR(100) DEFAULT NULL AFTER event_hour");
      $sql = "UPDATE events SET meet_link='$link' WHERE id=$id";
      if ($conn->query($sql) === FALSE) {
        echo "Error updating record: " . $conn->error;
      }
      echo "<h1>GCal event created!</h1>
            <form action='./sendemail.php'>
              <input readonly type='hidden' name='event_name' value=$name></input>
              <input readonly type='hidden' name='event_date' value=$date></input>
              <input readonly type='hidden' name='event_hour' value=$hour></input>
              <input readonly type='hidden' name='event_link' value=$link></input>
              <input type='submit' onclick='this.disabled' value='Send email to attendees'>
            </form>"
      ;
      ?>

    </div>
    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.7.3/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.7.3/dist/js/uikit-icons.min.js"></script>
  </body>
</html>

