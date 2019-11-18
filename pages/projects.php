<?php
  $page_title = 'Projects';

  include "../inc/templates/header.php";
  include "../inc/templates/navs.php";
  require_once "../config/functions.php";

    //  include bread crumb status bar
  include "../inc/templates/breadcrumb.php";
?>
<div class="container">
    <div class="row">
          <?php include "../inc/templates/states.php";?>
              <div class="col-9">
              <div class="bg-danger rounded">
                  <p class="text-light lead p-2 ">Projects </p>
              </div>
              <div class="container border border-light">
                  <div class="row overview text-center">
                      <table class="table table-hover">
                          <thead>
                            <tr>
                              <th scope="col">ID</th>
                              <th scope="col">Title</th>
                              <th scope="col">Created at</th>
                              <th scope="col">Operations</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php foreach($projects as $project){ ?>
                            <tr>
                              <th scope="row"><?php echo $project['id'] ?></th>
                              <td><a href="project.php?id=<?php echo $project['id'] ?>"><?php echo $project['title'] ?></a></td>
                              <td><?php echo $project['created_at'] ?></td>
                              <td>
                                  <a href="../models/edit_project?id=<?php echo $project['id'];?>" class="btn btn-light border"> <i class="fa fa-pencil"></i> Edit</a>
                                  <a class="btn btn-danger" href="../models/delete?name=projects&id=<?php echo $project['id'];?>"><i class="fa fa-times"></i> Delete</a>
                              </td>
                            </tr>
                          <?php } ?>
                          </tbody>
                        </table>
                  </div>
              </div>
          </div>
    </div>
</div>

<?php include "../inc/templates/footer.php"; ?>