<?php include_once"sysgem/mySession.php"?>
</style>
<nav class="navbar navbar-expand-lg bg-primary p-3">
  <div class="container-fluid">
       <a class="navbar-brand text-white english" href="index.php"><h3>HOME</h3></a>
       <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" >
       <span class="navbar-toggler-icon"></span>
       </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav  ms-auto mb-2 mb-lg-0 p-2 ">

      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white english" href="#" role="button" id="mydd" data-bs-toggle="dropdown" aria-expanded="false">
            <?php
              if(checkSession("username")){
                 echo getSession("username");
                } else {
                 echo "Default Value";
                }
             ?>
          </a>
          <ul class="dropdown-menu display-1" aria-labelledby="mydd">
         <?php
        if(checkSession("username")){
            echo "<li><a class='dropdown-item' href='logout.php'>logout</a></li>";
        } else {
            echo "
                <li><a class='dropdown-item' href='register.php'>register</a></li>
                <li><a class='dropdown-item' href='login.php'>login</a></li>";
        }
        ?>
    </ul>
</li>


        <li class="nav-item">
          <a class="nav-link text-white english" href="filterpost.php?sid=1">Politics</a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white english" href="filterpost.php?sid=2">Wars</a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white english" href="filterpost.php?sid=3">IT News</a>
        </li>

      </ul>
    </div>
  </div>
</nav>