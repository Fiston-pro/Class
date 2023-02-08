

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
                    <form method="post" enctype="multipart/form-data" action="process.php?action=addproject">
                        <div class="form-group">
                            <label>Project Name</label>
                            <input type="text" name="project_name" class="form-control" placeholder="Project Name" required/>
                        </div>
                        <div class="form-group">
                            <label>Project Description</label>
                            <textarea rows="3" type="text" name="project_description" class="form-control" placeholder="Project Description" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Project Income</label>
                            <input type="number" name="project_income" class="form-control" placeholder="Project Income" required/>
                        </div>
                        <div class="form-group">
                            <label>Project Expenditures</label>
                            <input type="number" name="project_expenditures" class="form-control" placeholder="Project Expenditures" required/>
                        </div>
                        <div class="form-group">
                            <label>Customer Name</label>
                            <input type="text" name="customer_name" class="form-control" placeholder="Customer Name" required/>
                        </div>
                        <div class="form-group">
                            <label>Customer Contact Person</label>
                            <input type="text" name="customer_contact_person" class="form-control" placeholder="Customer Contact Person" required/>
                        </div>
                        <div class="form-group">
                            <label>Customer e-mail address</label>
                            <input type="email" name="customer_email_address" class="form-control" placeholder="Customer e-mail address" required/>
                        </div>
                        <div class="form-group">
                            <label>Customer Full Address</label>
                            <input type="text" name="customer_full_address" class="form-control" placeholder="Customer Full Address" required/>
                        </div>
                        <div class="form-group">
                            <label>Customer Phone Number</label>
                            <input type="number" name="customer_phone_number" class="form-control" placeholder="Customer Phone Number" required/>
                        </div>
                        <div class="form-group">
                            <label for="num_items">Number of files</label>
                            <input type="number" id="num_items" name="num_items" class="form-control" placeholder="Number of Items" required>
                        <br>
                        <div id="item_fields" class="form-group"></div>

                        <div class="form-group">
                            <label for="num_employees">Number of Employees</label>
                            <input type="number" id="num_employees" name="num_employees" class="form-control" placeholder="Number of Employees" required>
                        <br>
                        <div id="employee_fields" class="form-group"></div>

                        <input type="submit" value="Create" class="btn btn-primary mb-5 "/>
                    </form>
                </div>
            </div>
        </div>
        
        <script>
        document.getElementById("num_items").addEventListener("change", function(){
            var num_items = document.getElementById("num_items").value;
            var item_fields = document.getElementById("item_fields");
            item_fields.innerHTML = ""; // Clear previous fields
            for(var i = 0; i < num_items; i++){
                var item_input = document.createElement("input");
                item_input.type = "text";
                item_input.setAttribute("class","form-control mb-1");
                item_input.name = "file" + (i+1);
                item_input.placeholder = "File " + (i+1);
                item_fields.appendChild(item_input);
            }
        });
        document.getElementById("num_employees").addEventListener("change", function(){
            var num_employees = document.getElementById("num_employees").value;
            var employee_fields = document.getElementById("employee_fields");
            employee_fields.innerHTML = ""; // Clear previous fields
            for(var i = 0; i < num_employees; i++){

                var employee_name = document.createElement("input");
                employee_name.type = "text";
                employee_name.setAttribute("class","form-control mb-1");
                employee_name.name = "name" + (i+1);
                employee_name.placeholder = "Name of "+ (i+1)+" employee";
                employee_fields.appendChild(employee_name)

                var employee_surname = document.createElement("input");
                employee_surname.type = "text";
                employee_surname.setAttribute("class","form-control mb-1");
                employee_surname.name = "surname" + (i+1);
                employee_surname.placeholder = "Surname of "+ (i+1)+" employee";
                employee_fields.appendChild(employee_surname)

                var employee_address = document.createElement("input");
                employee_address.type = "text";
                employee_address.setAttribute("class","form-control mb-1");
                employee_address.name = "address" + (i+1);
                employee_address.placeholder = "Address of "+ (i+1)+" employee";
                employee_fields.appendChild(employee_address)

                var employee_phone_number = document.createElement("input");
                employee_phone_number.type = "text";
                employee_phone_number.setAttribute("class","form-control mb-1");
                employee_phone_number.name = "phone_number" + (i+1);
                employee_phone_number.placeholder = "Phone number of "+ (i+1)+" employee";
                employee_fields.appendChild(employee_phone_number)

                var employee_email_address = document.createElement("input");
                employee_email_address.type = "text";
                employee_email_address.setAttribute("class","form-control mb-1");
                employee_email_address.name = "email_address" + (i+1);
                employee_email_address.placeholder = "Email Address of "+ (i+1)+" employee";
                employee_fields.appendChild(employee_email_address)

                var employee_role = document.createElement("input");
                employee_role.type = "text";
                employee_role.setAttribute("class","form-control mb-1");
                employee_role.name = "role" + (i+1);
                employee_role.placeholder = "Role of "+ (i+1)+" employee";
                employee_fields.appendChild(employee_role)

            }
        });
        </script>


    </body>
</html>



