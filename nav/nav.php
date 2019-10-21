<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">

    <div class="container">

    <a class="navbar-brand" href="#"> <i class="fas fa-gem"></i> Rewards</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item <?php echo ($_SERVER['PHP_SELF'] == '/BR/home.php' ? ' active' : '');?>">
          <a class="nav-link" href="home.php">Deals <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item <?php echo ($_SERVER['PHP_SELF'] == '/BR/campaigns.php' ? ' active' : '');?>">
          <a class="nav-link" href="campaigns.php">Current Campaigns</a>
        </li>
        <li class="nav-item <?php echo ($_SERVER['PHP_SELF'] == '/BR/points.php' ? ' active' : '');?>">
          <a class="nav-link" href="points.php">My Points</a>
        </li>
        <li class="nav-item <?php echo ($_SERVER['PHP_SELF'] == '/BR/earned_rewards.php' ? ' active' : '');?>">
          <a class="nav-link" href="earned_rewards.php">Earned Rewards</a>
        </li>
        <!-- Dropdown -->
        <li class="nav-item dropdown <?php echo ($_SERVER['PHP_SELF'] == '/BR/redemptions.php' || $_SERVER['PHP_SELF'] == '/BR/earnings.php' ? ' active' : '');?>">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
               History
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="redemptions.php"> Redemptions</a>
                <a class="dropdown-item" href="earnings.php"> Earnings </a>
            </div>
        </li>
        <li class="nav-item dropdown <?php echo ($_SERVER['PHP_SELF'] == '/BR/profile.php'  ? ' active' : '');?>">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop myname" data-toggle="dropdown">
               <my-profile>
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="profile.php"> My Profile</a>
                <a class="dropdown-item" href="logout.php"> Logout </a>
            </div>
        </li>
      </ul>
      </div>
    </div>
  </nav>
