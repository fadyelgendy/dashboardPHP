<?php
$page_title= 'Delete Form';

include "../inc/templates/header.php";
include "../inc/templates/navs.php";
include  "../config/functions.php";

//  Register new user
//get data from form

//get the user id from request
$userId = isset($_GET['id'])?$_GET['id']: 0;
$table = isset($_GET['name'])?$_GET['name']: 0;

try{
    $sql = "DELETE FROM $table WHERE id = $userId";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    header('location: ../pages/dashboard');
  }catch(PDOException $e){
     die("ERROR: Could not able to execute $sql. " . $e->getMessage());
 	}

?>

<?php 
  // include footer
  include "../inc/templates/footer.php";
?>