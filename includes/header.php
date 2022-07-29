    <nav class="navbar navbar-expand-md navbar-light bg-light">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="mainpage.php">Home <span class="sr-only">(current)</span></a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="messages.php">Messages</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="groups.php">Groups</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="events.php">Events</a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="profile.php">My profile</a>
          </li>
		  <?PHP
		  if ($_SESSION["profile"]==1){
			  ?>
			  <li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Analytics</a>
				<div class="dropdown-menu" aria-labelledby="dropdown01">
				  <a class="dropdown-item" href="#">Users</a>
				  <a class="dropdown-item" href="#">Posts analytics</a>
				  <a class="dropdown-item" href="#">Access analytics</a>
				  <a class="dropdown-item" href="#">Search analytics</a>
				  <a class="dropdown-item" href="#">Images analytics</a>
				  <a class="dropdown-item" href="#">Groups analytics</a>
				  <a class="dropdown-item" href="#">Events analytics</a>
				</div>
			  </li>		  		  
			  <?
		  }
		  ?>  
		  <li class="nav-item">
            <a class="nav-link" href="logout.php">Log out</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>