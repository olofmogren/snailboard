<?php
if (isset($_GET['name']) && isset($_GET['x']) && isset($_GET['y'])) {
    $name = $_GET['name'];
    $x = $_GET['x'];
    $y = $_GET['y'];
    $date = date('Y-m-d');
		    
    $newLine = "$date,$name,$x,$y\n";
    $file = 'history.csv';
		        
    $lines = file($file, FILE_IGNORE_NEW_LINES);
    $found = false;
			    
    foreach ($lines as $key => $line) {
        list($lineDate, $lineName) = explode(',', $line);
        if ($lineDate == $date && $lineName == $name) {
            $lines[$key] = $newLine;
            $found = true;
            break;
        }
    }
			        
    if (!$found) {
        $lines[] = $newLine;
    }
			        
    file_put_contents($file, implode("\n", $lines) . "\n");
			        
    echo "Data processed successfully!";
} else {
    echo "Please provide name, x, and y parameters.";
}
?>

