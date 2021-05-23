
<?php
if (false !== setlocale(LC_ALL, 'fr_FR@euro')) {
    $locale_info = localeconv();
    print_r($locale_info);
}
?>
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
    SELECT MONTH(dateaccord) As dt,count(*) as nbr,YEAR(dateaccord) as y
    FROM pret
    GROUP BY MONTH(dateaccord)
    ";
    //storing the result of the executed query
    $result = $conn->query($query);
    //initialize the array to store the processed data
    $jsonArray = array();
    //check if there is any data returned by the SQL Query
    if ($result->num_rows > 0) {
      //Converting the results into an associative array
      while($row = $result->fetch_assoc()) {
        $jsonArrayItem = array();
        switch ($row['dt']) {
            case 1:
                $jsonArrayItem['label'] = 'Janvier '.$row['y'];
                break;
            case 2:
              $jsonArrayItem['label'] = 'Février '.$row['y'];
              break;
            case 3:
              $jsonArrayItem['label'] = 'Mars '.$row['y'];
              break;
            case 4:
                  $jsonArrayItem['label'] = 'Avril '.$row['y'];
                  break;
            case 5:
                $jsonArrayItem['label'] = 'Mai '.$row['y'];
                break;
            case 6:
              $jsonArrayItem['label'] = 'Juin '.$row['y'];
              break;            
             case 7:
                $jsonArrayItem['label'] = 'Juillet '.$row['y'];
                break;
            case 8:
              $jsonArrayItem['label'] = 'Aout '.$row['y'];
              break;
            case 9:
              $jsonArrayItem['label'] = 'Septemer '.$row['y'];
              break;
            case 10:
                  $jsonArrayItem['label'] = 'October '.$row['y'];
                  break;
            case 11:
                $jsonArrayItem['label'] = 'November '.$row['y'];
                break;
            case 12:
              $jsonArrayItem['label'] = 'December '.$row['y'];
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