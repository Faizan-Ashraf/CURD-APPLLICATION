<?php
$csvFilePath = 'data.csv';
if(file_exists($csvFilePath)) { 

    header("Content-Type:text/csv");
    header('Content-Disposition:attachment; filename="data.csv"');

    readfile($csvFilePath);
exit();
} 
else {
    echo 'File not Found';
}
header('location:index.php');
?>