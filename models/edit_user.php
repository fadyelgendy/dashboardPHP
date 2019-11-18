<?php
  $page_title = 'Edit User';

  include "../inc/templates/header.php";
  include "../inc/templates/navs.php";
  include "../config/functions.php";

  $userId = isset($_GET['id']) ? $_GET['id'] : 0;
  $table = isset($_GET['name']) ? $_GET['name'] : '';

  // get that user from DB
  
  $sql = "SELECT * FROM users WHERE id = $userId";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $user = $stmt->fetch();

  // Processing form data when form is submitted
if(isset($_POST['submit'])){
    $id = $user['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    echo $username;

    try{
      $sql = 'UPDATE users SET username = :username, email = :email, password = :password, role = :role WHERE  id  = :id';

      $stmt = $pdo->prepare($sql);
      
      $stmt->execute([
        "username" => $username,
        "email" => $email,
        "password" => $password,
        "role" => $role,
        "id" => $id
      ]);

      echo "Records were updated successfully.";

    } catch(PDOException $e){
      die("ERROR: Could not able to execute $sql. " . $e->getMessage());
    }
  }
  //  include bread crumb status bar
  include "../inc/templates/breadcrumb.php";
?>

<style>
  span.err {
    color:red;
  }
</style>
<div class="container m-5">
  <div class="row">
    <div class="col">
      <h1 class="display-3">Update User</h1>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ;?>" method="POST">
        <div class="form-group">
            <label>Username</label>
            <input type="text" class="form-control" name="username" value="<?php echo $user['username'];?>"/>
           
        </div>

        <div class="form-group">
            <label>Email address</label>
            <input type="text" class="form-control" name="email" value="<?php echo $user['email'];?>"/>
            
        </div>

        <div class="form-group">
            <label>Password (6 characters at least )</label>
            <input type="password" class="form-control" name="password" value="<?php echo $user['password'];?>"/>
            
        </div>

        <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" class="form-control" name="confirm_password"value="<?php echo $user['password'];?>"/>
            
        </div>

        <div class="form-group">
            <label class="form-check-label mr-5"> Role
            </label>
            <input type="radio" class="form-check-input" name="role" value="admin"/>
            <label class="form-check-label mr-5" >Admin</label>
            <input type="radio" class="form-check-input" name="role" value="user"/>
            <label class="form-check-label mr-5">User</label>
          
        </div>

        <hr>

        <div class="form-group form-check">
            <a href="../pages/users" class="btn btn-secondary">Cancel</a>
            <button type="submit" name="submit" class="btn btn-primary float-right border border-danger bg-danger">Update</button>
        </div>
    </form>
    </div>
  </div>
</div>


<?php
  // include footer
  include "../inc/templates/footer.php";
?>