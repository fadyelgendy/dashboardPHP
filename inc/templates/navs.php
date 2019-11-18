<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
  <a class="navbar-brand" href="../pages/dashboard">AdminPanel</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <div class="col-10">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="../pages/dashboard">Dashboard <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a href="../pages/users" class="nav-link">Users</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../pages/projects">Projects</a>
        </li>
        <li class="nav-item">
          <a href="../pages/manage_posts" class="nav-link">Managment Posts</a>
        </li>
        <li class="nav-item">
          <a href="../pages/design_posts" class="nav-link">Design Posts</a>
        </li>
        
      </ul>
    </div>
    <div class="col-2">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="../pages/dashboard" >Welcome, Admin</a>
        </li>
        <li class="nav-item">
            <a class="btn btn-secondary" href="../pages/logout">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- subnav -->
<nav class="navbar navbar-dark bg-dark">
  <div class="col-9">
    <a class="navbar-brand" href="/">
      <i class="fa fa-cogs"></i>
      <span class="display-4">Dashboard </span>
      <span class="lead">Manage Your Site</span>
    </a>
  </div>
  <div class="col-3">
    <div class="dropdown">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Create Content
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="../models/add_user">User</a>
        <a class="dropdown-item" href="../models/add_project">Project</a>
        <a class="dropdown-item" href="../models/add_manage_post">Management Post</a>
        <a class="dropdown-item" href="../models/add_design_post">Design Post</a>
      </div>
    </div>
  </div>
</nav>
