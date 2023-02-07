<?php
    require 'database.php';
    if(!isset($_GET['id']) || !is_numeric($_GET['id']) || $_GET['id'] < 1 ) {
        echo '<h1>Error!</h1>';
        exit();
    }

    $project_id = $_GET['id'];

    // get customerId and filenameId
    $query = "SELECT customerId FROM projects WHERE id = $project_id";
    $result = mysqli_query($mysqli, $query);
    $row = mysqli_fetch_assoc($result);
    //delete in projects
    $query = "DELETE FROM projects WHERE id = $project_id";
    $result = mysqli_query($mysqli, $query);

    //delete in customers, comments and filename
    $customerId = $row["customerId"];
    $query = "DELETE FROM customers WHERE id = $customerId";
    $result = mysqli_query($mysqli, $query);

    $query = "DELETE FROM filename WHERE projectId = $project_id";
    $result = mysqli_query($mysqli, $query);

    $query = "DELETE FROM comments WHERE projectId = $project_id";
    $result = mysqli_query($mysqli, $query);

    // Redirect to homepage
    header("Location: index.php");
?>