<?php
  $page_title = 'Users';

  // include header & navs pages
  include "../inc/templates/header.php";
  include "../inc/templates/navs.php";
  include "../config/functions.php";

  //Display Users information

//  include bread crumb status bar
include "../inc/templates/breadcrumb.php";
?>

<div class="container">
  <div class="row">

    <?php include "../inc/templates/states.php";?>

            <div class="col-9">
            <div class="bg-danger rounded">
                <p class="text-light lead p-2 ">Users</p>   
            </div>
            <div class="container border border-light">
                <div class="row overview text-center">
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Created at</th>
                            <th scope="col">Operations</th>
                          </tr>
                        </thead>
                        <tbody>
                        <!-- loop throw users and diplay them in rows -->
                        <?php foreach($users as $user){?>
                          <tr>
                            <th scope="row"><?php echo $user['id']; ?></th>
                            <td><?php echo $user['username']; ?></td>
                            <td><?php echo $user['email']; ?></td>
                            <td><?php echo $user['role']; ?></td>
                            <td><?php echo $user['created_at']; ?></td>
                            <td>
                                <a class="btn btn-light border" href="../models/edit_user?name=users&id=<?php echo $user['id']; ?>"><i class="fa fa-pencil"></i> Edit</a>
                                <a class="btn btn-danger" href="../models/delete?name=users&id=<?php echo $user['id']; ?>"><i class="fa fa-times"></i> Delete</a>
                            </td>
                          </tr>
                        <?php }?>
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
  </div>
</div>
<?php
  //footer page 
  include "../inc/templates/footer.php";
?>