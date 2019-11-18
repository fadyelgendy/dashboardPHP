<?php
  $page_title = 'Edit';
  include (' inc/templates/header.php');
  include (' inc/templates/navs.php');
  include (' config/functions.php');

    $userId = isset($_GET['id']) ? $_GET['id'] : 0;
    $table = isset($_GET['name']) ? $_GET['name'] : '';
    $element = getElement($table, $userId);

if(isset($_POST['submit'])){
    // This gets all the other information from the form
    $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
    $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);

    editPostOrProject($table ,$userId, $title, $description);

}
?>

<div class="container mt-5">
  <div class="row">
    <div class="col">
      <form action="#" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label for="name" class="col-form-label">Title</label>
          <input type="text" class="form-control" id="name" name="title" value="<?php echo $element['title'];?>">
        </div>
        <div class="form-group">
          <label for="img" class="col-form-label">Image received </label>
          <span class="alert alert-warning"><?php echo $element['img_title'];?></span>
        </div>
        <div class="form-group">
          <label for="description" class="col-form-label">Description</label>
          <textarea type="text" name="description" id="description" class="form-control"><?php echo $element['description'];?></textarea>
        </div>
        <div class="form-group">
          <a href=" pages/dashboard" class="btn btn-secondary"> Cancel </a>
          <input type="submit" class="btn btn-primary" value="Update" name="submit"/>
        </div>
      </form>
    </div>
  </div>
</div>

<?php
  // include footer
  include " inc/templates/footer.php";
?>

