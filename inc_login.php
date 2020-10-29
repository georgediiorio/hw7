<?php

    function checklogin($email, $password) {
        if  ($email == "user@test.com" && $password == "12345") {
            echo '<p class="text-success">You are now logged in.</p>';
        }
         else {
            echo '<p class="text-success">That email and password are not found.</p>';
        }
    }


    //echo '<h2 class="text-center mb-4">Login</h2>';
    // Check to see if form was submitted.
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $problem = false;  //No issues with form

        //Check  each value that is entered into the form.
    
        if (empty($_POST['email'])) {
            $problem = true;
            echo '<p class="text-danger">Please enter your email address</p>';
        }

        if (empty($_POST['password'])) {
            $problem = true;
            echo '<p class="text-danger">Please enter a password.</p>';
        }


        if (!$problem) {

            checklogin($_POST['email'],  $_POST['password']);
            $_POST = [];
        } 
        else {
            echo '<p class="text-danger">Please Try Again!</p>';
        }
    }           
?>
        <div class="wrapper"> 
            <form action="login.php" method="POST" class="form-signin">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" size="20" value="<?php if (isset($_POST['email'])) {print htmlspecialchars($_POST['email']); } ?>">

                <label for="password1">Password</label>
                <input type="password" class="form-control" name="password" size="20" value="<?php if (isset($_POST['password'])) {print htmlspecialchars($_POST['password']); } ?>">

                <button class="btn btn-lg btn-danger btn-block">Confirm Identity</button>                    
            </form>             
        </div>