<?php include('conn_db.php') ?>
<?php
    if (isset($_GET['ID'])) {

        $ID = $_GET['ID'];

        $sql = "DELETE from person where ID='$ID'";
        $conn->query($sql);


        
    }
    header("location:index.php?deleted=Deleted Successfully!");
?>