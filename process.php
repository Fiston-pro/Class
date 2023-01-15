<?php
    require 'database.php';
    
    if(!isset($_GET["action"]) || empty($_GET["action"])) {
    exit();
    }

    $action = $_GET['action'];

    switch ($action) {
    case 'addproject':
        $project_name = $_POST['project_name'];
        $created_at = date("H:i:s");
        $project_description = $_POST['project_description'];
        $project_income = $_POST['project_income'];
        $project_expenditures = $_POST['project_expenditures'];

        $customer_name = $_POST['customer_name'];
        $customer_contact_person = $_POST['customer_contact_person'];
        $customer_email_address = $_POST['customer_email_address'];
        $customer_full_address = $_POST['customer_full_address'];
        $customer_phone_number = $_POST['customer_phone_number'];

        $filename = $_POST['filename'];

        // insert into customer table
        $customerId = "";
        $customersql = "INSERT INTO customers (customer_name, contact_person, email_address, full_address, phone_number ) VALUES ('$customer_name', '$customer_contact_person', '$customer_email_address','$customer_full_address','$customer_phone_number')";
        if (mysqli_query($mysqli, $customersql)) {
            $customerId = mysqli_insert_id($mysqli);
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
        }
        // insert into filename table
        $filenameId = "";
        $filenamesql = "INSERT INTO filename (filename) VALUES ('$filename')";
        mysqli_query($mysqli, $filenamesql);
        if (mysqli_query($mysqli, $filenamesql)) {
            $filenameId = mysqli_insert_id($mysqli);
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
        }
        // insert into projects table
        $projectsql = "INSERT INTO projects (name, created_at, description, project_income, project_expenditures, customerId, filenameId ) VALUES ('$project_name', '$created_at', '$project_description','$project_income','$project_expenditures','$customerId','$filenameId')";
        mysqli_query($mysqli, $projectsql);

        // Redirect to homepage
        header("Location: index.php");

    case 'updateproject':
        $project_id = $_POST['project_id'];
        $project_name = $_POST['project_name'];
        $created_at = date("H:i:s");
        $project_description = $_POST['project_description'];
        $project_income = $_POST['project_income'];
        $project_expenditures = $_POST['project_expenditures'];

        $customer_name = $_POST['customer_name'];
        $customer_contact_person = $_POST['customer_contact_person'];
        $customer_email_address = $_POST['customer_email_address'];
        $customer_full_address = $_POST['customer_full_address'];
        $customer_phone_number = $_POST['customer_phone_number'];

        $filename = $_POST['filename'];

        // update into projects table
        $projectsql = mysqli_prepare($mysqli,"UPDATE projects SET name=?, created_at=?, description=?, project_income=?, project_expenditures=? WHERE id =? ");
        mysqli_stmt_bind_param($projectsql, "sssiii", $project_name, $created_at, $project_description,$project_income,$project_expenditures,$project_id);
        mysqli_stmt_execute($projectsql);

        // Get the customerId and filenameId
        $query = "SELECT customerId, filenameId FROM projects WHERE id = $project_id";
        $result = mysqli_query($mysqli, $query);
        $row = mysqli_fetch_assoc($result);

        // update into customer table
        $customerId = $row["customerId"];
        $customersql = mysqli_prepare($mysqli,"UPDATE customers SET customer_name=?, contact_person=?, email_address=?, full_address=?, phone_number=? WHERE id =? ");
        mysqli_stmt_bind_param($customersql, "sssssi", $customer_name, $customer_contact_person, $customer_email_address,$customer_full_address,$customer_phone_number, $customerId);
        mysqli_stmt_execute($customersql);

        // update into filename table
        $filenameId = $row["filenameId"];
        $filenamesql = mysqli_prepare($mysqli,"UPDATE filename SET filename=? WHERE Id =? ");
        mysqli_stmt_bind_param($filenamesql, "si", $filename , $filenameId );
        mysqli_stmt_execute($filenamesql);
        

        // Redirect to homepage
        header("Location: index.php");
            


    }

?>

