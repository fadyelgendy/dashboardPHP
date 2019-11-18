<?php
  require_once "../config/functions.php";
  
?>
<div class="col-3">
  <div class=" rounded">
    <table class="table table-hover border bg-light p-3 border">
      <thead>
      <tr class="bg-light">
        <th scope="col" class=""><i class="fa fa-cog"></i> Dashboard</th>
      </tr>
      </thead>
      <tbody>
        <tr>
        <th scope="col"><i class="fa fa-users"></i> Users <span class="bg-secondary rounded text-light p-1 float-right">
            <?php echo $userCount; ?>
          </span></th>
      </tr>
      <tr>
        <th scope="col "><i class="fa fa-book"></i> projects<span class="bg-secondary rounded text-light p-1 float-right">
                <?php echo $projectCount; ?></span></th>
      </tr>
      <tr>
        <th scope="col"><i class="fa fa-cogs"></i> Management Posts<span class="bg-secondary rounded text-light p-1 float-right">
                <?php echo $pPostsCount; ?>
            </span></th>
      </tr>
      <tr>
          <th scope="col"><i class="fa fa-tree"></i> Design Posts<span class="bg-secondary rounded text-light p-1 float-right">
                  <?php echo $dPostsCount; ?>
              </span></th>
      </tr>
      
      </tbody>
    </table>
  </div>
</div>