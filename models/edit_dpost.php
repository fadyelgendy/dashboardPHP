<?php
$page_title = 'Edit Post';
include "../inc/templates/header.php";
include "../inc/templates/navs.php";
include "../config/functions.php";

$postId = isset($_GET['id'])? $_GET['id']: 0;

$sql = "SELECT * FROM design_posts WHERE id = $postId";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $post = $stmt->fetch();

if(isset($_POST['submit'])){
    // This gets all the other information from the form
    $title = $_POST['title'];
    $img_title = ($_FILES['img']['name']);
    $description = $_POST['description'];

    $target = "/img/projects/";
    $target = $target . basename( $_FILES['img']['name']);

    // get that user from DB
    $id = $post['id'];
    try {
        $sql = 'UPDATE design_posts SET title = :title, img_title = :img_title, img_title = :description WHERE id = :id';
        $stmt = $pdo->prepare($sql);

        $stmt->execute(['title' => $title,'img_title' => $img_title, 'description' => $description, 'id' => $id]);
        header("location: ../pages/design_posts");
    }catch(PDOException $e){
        die($e->getMessage());
    }
}

//  include bread crumb status bar
include "../inc/templates/breadcrumb.php";
?>

<div class="container mt-5">
    <div class="row">
        <div class="col">
            <h1><?php echo $page_title; ?></h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name" class="col-form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?php echo $post['title'];?>">
                </div>
                <div class="form-group">
                    <label for="img" class="col-form-label">Image (600x600) </label>
                    <input type="file" name="img" id="img">
                </div>
                <div class="form-group">
                    <label for="description" class="col-form-label">Description</label>
                    <textarea type="text" name="description" id="description" class="form-control"><?php echo $post['description'];?></textarea>
                </div>
                <div class="form-group">
                    <a href=" pages/dashboard" class="btn btn-secondary"> Cancel </a>
                    <input type="submit" class="btn btn-primary" value="Upadte" name="submit"/>
                </div>
            </form>
        </div>
    </div>
</div>


<?php
//include footer
include "../inc/templates/footer.php";
?>

