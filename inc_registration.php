<?php

   // echo '<h2> Registration Form</h2>
             //<p>Sign up for more evil.</p>';
    // Check to see if form was submitted.
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $problem = false;  //No issues with form

        //Check  each value that is entered into the form.
        if (empty($_POST['first_name'])) {
            $problem = true;
            echo '<p class="text-danger">Please enter your first name.</p>';
        }

        if (empty($_POST['last_name'])) {
            $problem = true;
            echo '<p class="text-danger">Please enter your last name.</p>';
        }

        if (empty($_POST['email_address'])) {
            $problem = true;
            echo '<p class="text-danger">Please enter your email</p>';
        }

        if (empty($_POST['password1'])) {
            $problem = true;
            echo '<p class="text-danger">Please enter a password.</p>';
        }

        if (($_POST['password1'] != $_POST['password2'])) {
            $problem = true;
            echo '<p class="text-danger">Your password did not match your confirmed password!</p>';
        }

        if (!$problem) {
           
           //Connect to Database
           require('mysqli_connect.php'); 

            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $email = $_POST['email_address'];
            $password = $_POST['password1'];
            
            $add_user = "INSERT INTO USER (first_name, last_name, email_address, password)
                                  VALUES ('$first_name', '$last_name', '$email', '$password')";
            $result = mysqli_query($connection, $add_user);    
            
            if ($result) {
                echo '<p class="text-success">You are now Registered! </p>';
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
            <form action="register.php" method="POST" class="form-register">
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" class="form-control" name="first_name" size="20" value="<?php if (isset($_POST['first_name'])) {print htmlspecialchars($_POST['first_name']); } ?>">
                </div>

                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control" name="last_name" size="20" value="<?php if (isset($_POST['last_name'])) {print htmlspecialchars($_POST['last_name']); } ?>">
                </div>

                <div class="form-group">
                    <label for="email_address">Email</label>
                    <input type="email" class="form-control" name="email_address" size="20" value="<?php if (isset($_POST['email_address'])) {print htmlspecialchars($_POST['email_address']); } ?>">
                </div>
        
                <div class="form-group">
                    <label for="password1">Password</label>
                    <input type="password" class="form-control" name="password1" size="20" value="<?php if (isset($_POST['password1'])) {print htmlspecialchars($_POST['password1']); } ?>">
                </div>

                <div class="form-group">
                    <label for="password2">Confirm Password</label>
                    <input type="password" class="form-control" name="password2" size="20" value="<?php if (isset($_POST['password2'])) {print htmlspecialchars($_POST['password2']); } ?>">
                </div>

                    <button class="btn btn-lg btn-success btn-block">Register</button>                    
            </form>
     </div>

    