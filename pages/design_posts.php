<?php
$page_title = 'Design Posts';
  
// include header & nav pages
  include "../inc/templates/header.php";
  include "../inc/templates/navs.php";
  require_once "../config/functions.php";

  //  include bread crumb status bar
  include "../inc/templates/breadcrumb.php";
?>


    <!-- Main Satus Area  -->
    <div class="container">
      <div class="row">

          <?php include "../inc/templates/states.php";?>

        <!-- Main Right Status Area -->
        <div class="col-9">
          <div class="bg-danger rounded">
            <p class="text-light lead p-2 "><?php echo $page_title; ?></p>
          </div>
          <div class="container border border-light">
            <div class="row overview text-center">
              <table class="table table-hover">
              <thead>
              <tr>
                  <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Created</th>
                <th scope="col">Operations</th>
              </tr>
              </thead>
                <tbody>
                <?php foreach($dPosts as $dpost) {?>
                  <tr>
                      <th><?php echo $dpost['id']; ?></th>
                    <th scope="row"><a href="desgin_posts_page?id=<?php echo $dpost['id'];?>"><?php echo $dpost['title'];?></a></th>
                    <td><?php echo $dpost['created_at']; ?></td>
                    <td>
                      <a class="btn btn-light border" href="../models/edit_dpost?id=<?php echo $dpost['id']; ?>">
                      <i class="fa fa-pencil"></i> Edit</a>
                      <a class="btn btn-danger" href="../models/delete?name=design_posts&id=<?php echo $dpost['id'];?>"><i class="fa fa-times"></i> Delete</a>
                    </td>
                  </tr>
                  <?php }?>
<!--                 end foreach-->
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

<?php include "../inc/templates/footer.php";?>