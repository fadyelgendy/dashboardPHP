<?php
  $page_title= 'Add New User';
  include "../inc/templates/header.php";
  include "../inc/templates/navs.php";
  require_once "../config/db.php";

  // Define variables an initialize it with empty values
  $username = $email = $password = $confirm_password = $role = ""; 
  $username_err = $email_err = $password_err = $confirm_password_err = $role_err = "";

  // Processing form data when form is submitted
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    //Validate username
    if(empty(trim($_POST['username']))){
        $username_err = "Please enter username. ";
    } else {
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = :username";
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statements as parameters
            $stmt->bindParam(":username", $param_username);

            // Attempt to execute teh prepared statement
            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    $username_err = "This username is already taken. ";
                } else {
                    $username = trim($_POST['username']);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later";
            }
        }
        //Close statement
        unset($stmt);
    }

    //validate email
    if(empty(trim($_POST['email']))){
        $email_err = "Please enter email. ";
    } elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $email_err = "Please enter a valid email. ";
    } else {
        $sql = "SELECT id FROM users WHERE email = :email";
        if($stmt = $pdo->prepare($sql)){
            $stmt->bindParam(":email", $param_email);
            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    $email_err = "This email is already taken. ";
                } else {
                    $email = trim($_POST['email']);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later";
        }

    }

        // close statement
         unset($stmt);
    }

    // Validate password
    if(empty(trim($_POST['password']))){
        $password_err = "Please enter password. ";
    } elseif(strlen(trim($_POST['password'])) < 6){
        $password_err = "Password must be at least 6 chars. ";
    } else {
        $password = trim($_POST['password']);
    }

    // Validate confirm password
    if(empty(trim($_POST['confirm_password']))){
        $password_err = "Please confirm password. ";
    }  else {
        $confirm_password = trim($_POST['password']);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match. ";
        }
    }
    // check for role
    if(empty($_POST['role'])){
        $role_err = "Please chose a role. ";
        
    } else {
        $sql = "SELECT id FROM users WHERE role = :role";
        if($stmt = $pdo->prepare($sql)){
            $stmt->bindParam(":role", $param_role);
            if($stmt->execute()){
               
                $role = $_POST['role'];
            } else {
            echo "Oops! Something went wrong. Please try again later";
            }
        }

        // close statement
         unset($stmt);
    }

    // check input error before inserting in database
    if(empty($username_err) && empty($email_err) && empty($password_err) && empty($role_err)){
        $sql = "INSERT INTO users(username, email, password, role) VALUES (:username, :email, :password, :role)";
        if($stmt = $pdo->prepare($sql)){
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            $stmt->bindParam(":email", $param_email,PDO::PARAM_STR);
            $stmt->bindParam(":password", $param_password,PDO::PARAM_STR);
            $stmt->bindParam(":role", $param_role,PDO::PARAM_STR);
            // SET PARAMS
            $param_username = $username;
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // create a password hash
            $param_role = $role;

            if($stmt->execute()){
                header("location: ../pages/users.php");
            } else {
                echo "Something went wrong. Please try agian later. ";
            }
        }
        // close statement
        unset($stmt);
    }
    // close Connection
    unset($pdo);
}


//  include bread crumb status bar
include "../inc/templates/breadcrumb.php";
?>
<style>
    span.err {
        color:red;
    }
</style>

<div class="container mt-5">
    <div class="row">
        <div class="col">
            <h1 class="display-3">Add New User</h1>
        </div>
    </div>

    <div class="row">

        <div class="col">

            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ;?>" method="POST">

                <div class="form-group <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>">
                    <label>User Name</label>
                    <input type="text" class="form-control" name="username"/>
                    <span class="err form-text"><?php echo $username_err; ?></span>
                </div>

                <div class="form-group <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>">
                    <label>Email address</label>
                    <input type="text" class="form-control" name="email"/>
                    <span class="err form-text"><?php echo $email_err; ?></span>
                </div>

                <div class="form-group <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                    <label>Password (6 characters at least )</label>
                    <input type="password" class="form-control" name="password"/>
                    <span class="err form-text"><?php echo $password_err; ?></span>
                </div>

                <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>">
                    <label>Confirm Password</label>
                    <input type="password" class="form-control" name="confirm_password"/>
                    <span class="err form-text"><?php echo $confirm_password_err; ?></span>
                </div>

                <div class="form-group <?php echo (!empty($role_err)) ? 'is-invalid' : ''; ?>">
                    <label class="form-check-label mr-5"> Role
                    </label>
                    <input type="radio" class="form-check-input" name="role" value="admin"/>
                    <label class="form-check-label mr-5" >Admin</label>
                    <input type="radio" class="form-check-input" name="role" value="user"/>
                    <label class="form-check-label mr-5">User</label>
                    <span class="err form-text"><?php echo $role_err; ?></span>
                </div>
                <hr>
                <div class="form-group form-check">
                    <a href="home" class="btn btn-secondary">Cancel</a>
                    <button type="submit" name="submit" class="btn btn-primary float-right border border-danger bg-danger">Register</button>
                </div>
            </form>

        </div>

    </div>
</div>

<?php 
  // include footer
  include "../inc/templates/footer.php";
?>