<?php
    require 'database.php';
    if(!isset($_GET['id']) || !is_numeric($_GET['id']) || $_GET['id'] < 1 ) {
        echo '<h1>Error!</h1>';
        exit();
    }

    $id = $_GET['id'];

    // Prepare and execute the SQL statement
    $sql = "SELECT * FROM projects JOIN customers on projects.customerId = customers.id WHERE projects.Id=$id";
    $result = mysqli_query($mysqli, $sql);

    // Fetch the data as an associative array
    $row = mysqli_fetch_assoc($result);
    
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

        <title>Create Project</title>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Customer Relationship Management system</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">List all</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="create.php">Create</a>
                </li>
            </ul>

        </div>
    </div>
</nav>
        <div class="container">
            <div class="row">
                <div class="col-4 ">
                    <h1 class="mt-2">Adding a Project</h1>
                    <form method="post" enctype="multipart/form-data" action="process.php?action=updateproject">
                        <div class="form-group">
                            <label>Project Id</label>
                            <input type="text" name="project_id" class="form-control" placeholder="Project Id" value= <?php echo $id; ?> readonly/>
                        </div>
                        <div class="form-group">
                            <label>Project Name</label>
                            <input type="text" name="project_name" class="form-control" placeholder="Project Name" value="<?php echo $row["name"]; ?>" required/>
                        </div>
                        <div class="form-group">
                            <label>Project Description</label>
                            <textarea rows="3" type="text" name="project_description" class="form-control" placeholder="Project Description" required> <?php echo $row["description"]; ?> </textarea>
                        </div>
                        <div class="form-group">
                            <label>Project Income</label>
                            <input type="number" name="project_income" class="form-control" placeholder="Project Income" value= "<?php echo $row["project_income"]; ?>"required/>
                        </div>
                        <div class="form-group">
                            <label>Project Expenditures</label>
                            <input type="number" name="project_expenditures" class="form-control" placeholder="Project Expenditures" value= "<?php echo $row["project_expenditures"]; ?>"required/>
                        </div>
                        <div class="form-group">
                            <label>Customer Name</label>
                            <input type="text" name="customer_name" class="form-control" placeholder="Customer Name" value= "<?php echo $row["customer_name"]; ?>" required/>
                        </div>
                        <div class="form-group">
                            <label>Customer Contact Person</label>
                            <input type="text" name="customer_contact_person" class="form-control" placeholder="Customer Contact Person" value= "<?php echo $row["contact_person"]; ?>"required/>
                        </div>
                        <div class="form-group">
                            <label>Customer e-mail address</label>
                            <input type="email" name="customer_email_address" class="form-control" placeholder="Customer e-mail address" value= "<?php echo $row["email_address"]; ?>"required/>
                        </div>
                        <div class="form-group">
                            <label>Customer Full Address</label>
                            <input type="text" name="customer_full_address" class="form-control" placeholder="Customer Full Address" value= "<?php echo $row["full_address"]; ?>"required/>
                        </div>
                        <div class="form-group">
                            <label>Customer Phone Number</label>
                            <input type="number" name="customer_phone_number" class="form-control" placeholder="Customer Phone Number" value= "<?php echo $row["phone_number"]; ?>"required/>
                        </div>
                        <div class="form-group">
                            <label>Filename</label>
                            <?php
                                $result = mysqli_query($mysqli, "SELECT * FROM filename WHERE projectId = " . $id) or die(mysqli_error($mysqli));
                                $num_rows = mysqli_num_rows($result);
                                echo '<label>Number of Files: ' . $num_rows . '</label>';

                                echo '<input type="hidden" name="numfiles" value="'.$num_rows.'"';

                                if(mysqli_num_rows($result) > 0) {
                                    $num = 1;
                                    while ($row = mysqli_fetch_assoc($result)){
                                        $namefile = "file" . $num;
                                        $namefileid = $namefile . "id";
                                        echo '<input type="hidden" name="dummy" class="form-control mb-1" value= "dummy" required/>';
                                        echo '<input type="text" name="'.$namefile.'" class="form-control mb-1" value= "'.$row["filename"].'" required/>';
                                        echo '<input type="hidden" name="'.$namefileid.'" class="form-control mb-1" value= "'.$row["id"].'" />';
                                        $num++;
                                    }
                                } else {
                                    echo " Files found ";
                                }  
  
                            ?>
                        </div>
                        <input type="submit" value="Save" class="btn btn-primary mb-5 "  />
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>



