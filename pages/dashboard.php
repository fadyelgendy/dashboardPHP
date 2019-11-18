<?php
    session_start();

    // Check if the user is logged in, if not then redirect him to login page
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location:  index.php");
        exit;
    }
     // include header & naviagtion pages
    include "../inc/templates/header.php";
    include "../inc/templates/navs.php";
    require_once "../config/db.php";

    // include bread crumb status bar
    include "../inc/templates/breadcrumb.php";
?>
      <!-- Body -->
<div class="container">
    <div class="row">
      <?php include "../inc/templates/states.php"; ?>

              <div class="col-9">
              <div class="bg-danger rounded">
                  <p class="text-light lead p-2 ">Website Overview</p>   
              </div>
              <div class="container border border-light mb-5">
                  <div class="row overview">
                      <div class="col p-2 bg-light text-center rounded">
                          <h3><i class="fa fa-user"></i>  <?php echo $userCount;?></h3>
                          <p class="lead">Users</p> 
                      </div>
                      <div class="col p-2 bg-light text-center rounded">
                          <h3><i class="fa fa-book"></i> <?php echo $projectCount;?></h3>
                          <p class="lead">projects</p>
                      </div>
                      <div class="col p-2 bg-light text-center rounded">
                          <h3><i class="fa fa-cogs"></i> <?php echo $pPostsCount;?></h3>
                          <p class="lead">Management Posts</p>
                      </div>
                      <div class="col p-2 bg-light text-center rounded">
                          <h3><i class="fa fa-tree"></i> <?php echo $dPostsCount;?></h3>
                          <p class="lead">Design Posts</p>
                      </div>
                  </div>
              </div>
              
              <div class="bg-danger rounded">
                  <p class="text-light lead p-2 ">Latest Users</p>   
              </div>
              <div class="container border border-light">
                  <div class="row overview">
                      <table class="table table-hover">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">name</th>
                              <th scope="col">Email</th>
                              <th scope="col">Joined</th>
                              <th scope="col">Role</th>
                            </tr>
                          </thead>
                          <tbody>

                            <?php foreach($users as $user) {?>
                            <tr>
                              <th scope="row"><?php echo $user['id']; ?></th>
                              <td><?php echo $user['username']; ?></td>
                              <td><?php echo $user['email']; ?></td>
                              <td><?php echo $user['created_at']; ?></td>
                              <td><?php echo $user['role']; ?></td>
                            </tr>
                            <?php } ?>

                          </tbody>
                        </table>
                  </div>
              </div>
              <div class="bg-danger rounded">
                  <p class="text-light lead p-2 ">Latest Projects</p>   
              </div>
              <div class="container border border-light">
                  <div class="row overview">
                      <table class="table table-hover">
                          <thead>
                            <tr>
                              <th scope="col">ID</th>
                              <th scope="col">Title</th>
                              <th scope="col">Created At</th>

                            </tr>
                          </thead>
                          <tbody>

                            <?php foreach($projects as $project) {?>
                            <tr>
                              <th scope="row"><?php echo $project['id']; ?></th>
                              <td><a href="project?id=<?php echo $project['id'];?>"><?php echo $project['title']; ?></a></td>
                              <td><?php echo $project['created_at']; ?></td>
                            </tr>
                            <?php } ?>

                          </tbody>
                        </table>
                  </div>
              </div>
                  <div class="bg-danger rounded">
                      <p class="text-light lead p-2 ">Latest Projects management Posts</p>
                  </div>
                  <div class="container border border-light">
                      <div class="row overview">
                          <table class="table table-hover">
                              <thead>
                              <tr>
                                  <th scope="col">ID</th>
                                  <th scope="col">Title</th>
                                  <th scope="col">Created At</th>

                              </tr>
                              </thead>
                              <tbody>

                              <?php foreach($pPosts as $post) {?>
                                  <tr>
                                      <th scope="row"><?php echo $post['id']; ?></th>
                                      <td><a href="project?id=<?php echo $post['id'];?>"><?php echo $post['title']; ?></a></td>
                                      <td><?php echo $post['created_at']; ?></td>
                                  </tr>
                              <?php } ?>

                              </tbody>
                          </table>
                      </div>
                  </div>
                  <div class="bg-danger rounded">
                      <p class="text-light lead p-2 ">Latest Design Posts</p>
                  </div>
                  <div class="container border border-light">
                      <div class="row overview">
                          <table class="table table-hover">
                              <thead>
                              <tr>
                                  <th scope="col">ID</th>
                                  <th scope="col">Title</th>
                                  <th scope="col">Created At</th>
                              </tr>
                              </thead>
                              <tbody>

                              <?php foreach($dPosts as $post) {?>
                                  <tr>
                                      <th scope="row"><?php echo $post['id']; ?></th>
                                      <td><a href="project?id=<?php echo $post['id'];?>"><?php echo $post['title']; ?></a></td>
                                      <td><?php echo $post['created_at']; ?></td>
                                  </tr>
                              <?php } ?>

                              </tbody>
                          </table>
                      </div>
                  </div>
          </div>
    </div>
</div>

<?php include "../inc/templates/footer.php";?>