<?php

//including the database connection file
    include("config.php");

    $id = $_GET['id'];

    $sql = "update test set isvalid=1 where id='".$id."'";
    $result = mysqli_query($conn, $sql);

    if ($result)
    {
        header("Location:listdata.php");
    }
    
?>

