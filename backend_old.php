<?php
if (isset($_GET['name']) && isset($_GET['x']) && isset($_GET['y'])) {
     $name = $_GET['name'];
     $x = $_GET['x'];
     $y = $_GET['y'];
     $date = date('Y-m-d');
		    
     $line = "$date,$name,$x,$y\n";
     file_put_contents('history.csv', $line, FILE_APPEND);
		        
     echo "Data appended successfully!";
} else {
    echo "Please provide name, x, and y parameters.";
}
?>

