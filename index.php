<?php include('header.php') ?>
<?php include('footer.php') ?>
<?php include('conn_db.php') ?>

<?php
$csvFilePath = 'data.csv';//it is used to store the file path
$csvFile=fopen($csvFilePath,'w');
fputcsv($csvFile, ["ID", "First", "Last", "Email", "Phone", "Location", "Hobby"]);


?>

<?php
$sql = "SELECT * from person";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        fputcsv($csvFile, [$row["ID"],$row["First"],$row["Last"],$row["Email"],$row["Phone"],$row["Location"],$row["Hobby"]]);
        ?>
        <tr>
            <td>
                <b><?php echo $row["ID"] ?><b>
            </td>
            <td>
                <?php echo $row["First"] ?>
            </td>
            <td>
                <?php echo $row["Last"] ?>
            </td>
            <td>
                <?php echo $row["Email"] ?>
            </td>
            <td>
                <?php echo $row["Phone"] ?>
            </td>
            <td>
                <?php echo $row["Location"] ?>
            </td>
            <td>
                <?php echo $row["Hobby"] ?>
            </td>
            <td><a href="update.php?ID=<?php echo $row["ID"] ?>" class="btn btn-warning">Edit</a>
            <a href="del.php?ID=<?php echo $row["ID"] ?>" class="btn btn-danger">Del</a>
            </td>
        </tr>
        <?php
          
    }
    fclose($csvFile);
}
else {
    ?>
    <div class="alert alert-danger">
    <h6 style="display: inline;">Empty Table!</h6>
    <p style="display: inline;">Please Insert Items</p>
    </div>
    <?php  
}


if  (isset($_GET['updated'])) { //for successfull updation message
    $msg = $_GET['updated'];
?>
<div class="alert alert-success"> 
    <h6 style="display: inline;"><?php echo $msg; ?></h6>
    
    </div>
  <?php  
}

if(isset($_GET['inserted'])) {//for successfull insertion message
    $msg = $_GET['inserted'];
    ?>
        <div class="alert alert-success">
    <h6 style="display: inline;"><?php echo $msg; ?></h6>
    
    </div>
    <?php
}


if(isset($_GET['deleted'])) {//for successfull deletion message
    $msg = $_GET['deleted'];
    ?>
        <div class="alert alert-success">
    <h6 style="display: inline;"><?php echo $msg; ?></h6>
    
    </div>
    <?php
}
?>

</tbody>

</table>

<div class="box">

    <a href="csvdownload.php"class="btn btn-primary">Download CSV</a>
   <a href="insert.php" class="btn btn-success">Add Item</a>
</div>


