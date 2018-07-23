<?php
    session_start();

    /*echo $_SESSION['id'];
    echo $_POST['heading'];
    echo $_POST['newsbody'];*/
    require 'config.php';
    /*Fetch data from test table*/
    $sql = "select * from test where id='".$_SESSION['id']."';";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) 
    {
        while($row = mysqli_fetch_assoc($result))
        {
            $idEdit=$row["id"];
            $headingEdit=$row["heading"];
            $summertextEdit=$row["summertext"];
            $datetimeEdit=$row["datetime"];
        }
    } 
    else 
    {
        echo "0 results";
    }
    /*Update data in test table*/
    $sql1 = "UPDATE test SET heading='".$_POST['heading']."',summertext='".$_POST['newsbody']."' WHERE id='".$_SESSION['id']."';";
    /*Insert data in edit table fetched from test table*/
    $sql2 = "INSERT INTO edit (id,heading,summertext,datetime)
    VALUES ('".$idEdit."', '".$headingEdit."', '".$summertextEdit."','".$datetimeEdit."')";
    if (mysqli_query($conn, $sql1) && mysqli_query($conn, $sql2))
    {
        header('location:listdata.php');
    } 
    mysqli_close($conn);
?>