<?php include('conn_db.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert new Item</title>
    <link rel="stylesheet" href="external.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .container {
            width: 50%;

        }
    </style>
</head>

<body>

    <?php
    if (isset($_GET['ID'])) {

        $Id = $_GET['ID'];

        $sql = "SELECT * from person where ID='$Id'";
        $result = $conn->query($sql);


        $row = $result->fetch_assoc();
        
    }
    
    if (isset($_POST['update'])) {
       
        $ID=$_REQUEST['ID'];
        $First=$_REQUEST['First'];
        $Last=$_REQUEST['Last'];
        $Phone=$_REQUEST['Phone'];
        $Email=$_REQUEST['Email'];
        $Location=$_REQUEST['Location'];
        $Hobby=$_REQUEST['Hobby'];
    
        $sql = "UPDATE `person` SET `ID`='$ID', `First`='$First', `Last`='$Last', `Email`='$Email', `Phone`='$Phone', `Location`='$Location', `Hobby`='$Hobby' WHERE `ID`='$ID'";

        $conn->query($sql);      
       
        header("location:index.php?updated=Updated Successfully!");
    }

    ?>

    <h1>Update the data</h1>
    <div class="container">
        <form action="update.php" method="post">
            <label for="id"> ID: </label>
            <input type="number" id="id" class="form-control" name="ID" value="<?php echo $row["ID"] ?>">
            <label for="f_name"> First: </label>
            <input type="text" id="f_name" class="form-control" name="First" value=" <?php echo $row["First"] ?>">
            <label for="l_name"> Last: </label>
            <input type="text" id="l_name" class="form-control" name="Last" value="<?php echo $row["Last"] ?>">
            <label for="email"> Email: </label>
            <input type="email" id="email" class="form-control" name="Email" value="<?php echo $row["Email"] ?>">
            <label for="phone"> Phone: </label>
            <input type="tel" id="phone" class="form-control" name="Phone" value="<?php echo $row["Phone"] ?>">
            <label for="location"> Location: </label>
            <input type="text" id="location" class="form-control" name="Location" value="<?php echo $row["Location"] ?>">
            <label for="hobby"> Hobby: </label>
            <input type="text" id="hobby" class="form-control" name="Hobby" value=" <?php echo $row["Hobby"] ?>">

            <input type="submit" class="btn btn-success" value="Save Changes" name="update" style="margin-left: 45%; margin-top: 8px;">
        </form>

    </div>
</body>

</html>