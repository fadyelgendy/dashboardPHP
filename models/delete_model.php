<?php
$page_title= 'Delete Form';

include (' inc/templates/header.php');
include (' inc/templates/navs.php');
include (' config/functions.php');
//  Register new user
//get data from form

//get the user id from request
$userId = isset($_GET['id'])?$_GET['id']: 0;
$tableName = isset($_GET['name'])?$_GET['name']: "";
delete($tableName, $userId);

?>

<?php
// include footer
include(' inc/templates/footer.php');
?>