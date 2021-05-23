
<?php
  setlocale(LC_ALL, 'fr_FR@euro');

    //address of the server where db is installed
    $servername = "localhost";
    //username to connect to the db
    //the default value is root
    $username = "root";
    //password to connect to the db
    //this is the value you would have specified during installation of WAMP stack
    $password = "";
    //name of the db under which the table is created
    $dbName = "LPABD_LOUKILI_JAOUANI";
    //establishing the connection to the db.
    $conn = new mysqli($servername, $username, $password, $dbName);
    //checking if there were any error during the last connection attempt
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    //the SQL query to be executed
    $query = "
    SELECT WEEKDAY(dateaccord) As dt,DAY(dateaccord) as y,count(*) as nbr
    FROM pret
    GROUP BY DAY(dateaccord),MONTH(dateaccord)    ";
    //storing the result of the executed query
    $result = $conn->query($query);
    //initialize the array to store the processed data
    $jsonArray = array();
    //check if there is any data returned by the SQL Query
    if ($result->num_rows > 0) {
      //Converting the results into an associative array
      while($row = $result->fetch_assoc()) {
        $jsonArrayItem = array();
        $phpdate = strtotime($row['dt']);
        date_default_timezone_set('UTC');
        $jr = $row['y'];
        switch ($row['dt']) {
          case 0:
              $jsonArrayItem['label'] = $jr.' Lundi';
              break;
          case 1:
            $jsonArrayItem['label'] = $jr.' Mardi';
            break;
          case 2:
            $jsonArrayItem['label'] = $jr. ' Mercredi';
            break;
          case 3:
                $jsonArrayItem['label'] = $jr.' Jeudi';
                break;
          case 4:
              $jsonArrayItem['label'] = $jr.' Vendredi';
              break;
          case 5:
            $jsonArrayItem['label'] = $jr.' Samedi';
            break;            
           case 6:
              $jsonArrayItem['label'] = $jr.' Dimanche';
              break;
      
      }

        $jsonArrayItem['value'] =  $row['nbr'];
        //append the above created object into the main array.
        array_push($jsonArray, $jsonArrayItem);
      }
    }
    //Closing the connection to DB
    $conn->close();
    //set the response content type as JSON
    header('Content-type: application/json');
    //output the return value of json encode using the echo function.
    echo json_encode($jsonArray);
?>