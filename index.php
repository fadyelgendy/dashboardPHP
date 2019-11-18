<?php

    $page_title = 'Login';
    include "inc/templates/header.php";
    // Initialize the session

    session_start();
    // Check if the user is already loggedin, if yess then rediresct hime to dashboard.
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        header("location: pages/dashboard.php");
        exit;
    }

    //Include db file
    require_once "config/db.php";

    // Define variable and initialize it with empty values
    $username = $password = "";
    $username_err = $password_err = "";
    
    // get login variable from form
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Check if user name is empty
        if(empty(trim($_POST['username']))){
            $username_err = "Please Enter username. ";
        } else {
            $username = trim($_POST['username']);
        }

        // Check if password is empty
        if(empty(trim($_POST['password']))){
            $password_err = "Please enter password. ";
        } else {
            $password = trim($_POST['password']);
            
        }

        // validate credentials
        if(empty($username_err) && empty($password_err)){
            // prepare a select statment
            $sql = "SELECT id, username, password FROM users WHERE username = :username";

            if($stmt = $pdo->prepare($sql)){
                // Bind variable to the prepared statement as Parameters
                $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);

                // Set Parameter
                $param_username = trim($_POST["username"]);

                // Attempt to execute the prepared statement
                if($stmt->execute()){
                    // Check is the username exists, if yes then verify password

                    if($stmt->rowCount() == 1){
                        if($row = $stmt->fetch()){
                            $id = $row['id'];
                            $username = $row['username'];
                            $hashed_password = $row['password'];
                            if(password_verify($password, $hashed_password)){
                                // Password is correct, so start a new session
                                session_start();
                                // Store data in session variables
                                $_SESSION["loggedin"] = true;
                                $_SESSION["id"] = $id;
                                $_SESSION["username"] = $username;

                                // Redirect user to dashboard
                                // echo "<script>alert('Welcome Back')</script>";
                                header("location: pages/dashboard.php");
                            } else {
                                // Display error message if password is invalid
                                $password_err = "The password you entered is not valid. ";
                            }
                        }
                    } else {
                        // Display an error message if username doesn't exist
                        $username_err = "No account found with that username. ";
                    }
                } else {
                    echo "Something went wrong. Please try again later. ";
                }
            }
            // Close statement
            unset($stmt);
        }
        // close Connection
    }
?>
<style>
    span.err{
        color:red;
    }
</style>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <a class="navbar-brand" href="#">AdminPanel</a>
    </nav>

    <!-- subnav -->
    <nav class="navbar navbar-dark bg-dark">
        <div class="col-9 text-center">
            <a class="navbar-brand" href="#">
                <i class="fa fa-cogs"></i>
                <span class="display-4">AdminPanel </span>
                <span class="lead">Account Login</span>
            </a>
        </div>
    </nav>
<!-- main content -->
<div class="container mt-5">
<div class="row">
    <div class="col">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">

            <div class="form-group <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>">
                <label>Name</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="form-text err"><?php echo $username_err; ?></span>
            </div>

            <div class="form-group <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <label>Password</label>
                <input type="password" class="form-control" name="password">
                <span class="form-text err"><?php echo $password_err; ?></span>
            </div>
            <input type="submit" class="btn btn-primary float-right border border-danger bg-danger" name="submit" value="Login"/>
        </form>
    </div>
</div>
</div>

<?php
    // footer page 
    include('inc/templates/footer.php');
?>