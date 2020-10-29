<?php

   // echo '<h2> Registration Form</h2>
             //<p>Sign up for more evil.</p>';
    // Check to see if form was submitted.
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $problem = false;  //No issues with form

        //Check  each value that is entered into the form.
        if (empty($_POST['department_name'])) {
            $problem = true;
            echo '<p class="text-danger">Please Enter Department Name.</p>';
        }

        if (empty($_POST['num_of_employees'])) {
            $problem = true;
            echo '<p class="text-danger">Please Enter Number Of Employees</p>';
        }

        if (empty($_POST['building_number'])) {
            $problem = true;
            echo '<p class="text-danger">Please Enter Building Number.</p>';
        }

        if (!$problem) {
           
           //Connect to Database
           require('mysqli_connect.php'); 

           $depart_name = $_POST['department_name'];
            $employees = $_POST['num_of_employees'];
            $building = $_POST['building_number'];
            
            $add_department = "INSERT INTO DEPARTMENT (department_name, num_of_employees, building_number)
                                  VALUES ('$depart_name', '$employees', '$building')";
            $result = mysqli_query($connection, $add_department);    
            
            if ($result) {
                echo '<p class="text-success center">New Department Added! </p>';
            }
            else{
                echo '<p class="text-danger">Something went wrong! </p>';
            }

            $_POST = [];
        } 
        else {
            echo '<p class="text-danger">Please Try Again!</p>';
        }
    }           
?>
    <div class="wrapper-register">
             <form action="add_department.php" method="POST" class="form-register">
                    <div class="form-group">
                        <label for="department_name">Department Name</label>
                        <input type="text" class="form-control" name="department_name" size="20" value="<?php if (isset($_POST['department_name'])) {print htmlspecialchars($_POST['department_name']); } ?>">
                    </div>

                    <div class="form-group">
                        <label for="num_of_employees">Number of Employees</label>
                        <input type="number" class="form-control" name="num_of_employees" size="20" value="<?php if (isset($_POST['num_of_employees'])) {print htmlspecialchars($_POST['num_of_employees']); } ?>">
                    </div>

                    <div class="form-group">
                        <label for="building_number">Building Number</label>
                        <input type="text" class="form-control" name="building_number" size="20" value="<?php if (isset($_POST['building_number'])) {print htmlspecialchars($_POST['building_number']); } ?>">
                    </div>
                        <button class="btn btn-lg btn-info btn-block">Register</button>                    
            </form>
     </div>

    