<nav class="mb-3 navbar navbar-expand sticky-top bg-primary border-bottom border-body no_print" data-bs-theme="dark">
  <div class="container-fluid">
      <a class="navbar-brand text-white" href="index.php" style="font-family: Arial, Helvetica, sans-serif;font-weight: bolder;">LMOS</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse d-flex flex-row-reverse" id="navbarText">                
          <ul class="navbar-nav me-5" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">
            <li class="nav-item dropdown mx-1 btn-primary">
              <button class="btn text-dark">
                <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-file"></i> Tax Declaration
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="taxdec_pending.php">Pending Tax Declaration</a></li>
                  <li><a class="dropdown-item" href="taxdec_active.php">Active Tax Declaration</a></li>
                  <li><a class="dropdown-item" href="taxdec_cancelled.php">Cancelled Tax Declaration</a></li>
                  <li><a class="dropdown-item" href="revision.php">Revision</a></li>
                  <li><a class="dropdown-item" href="notice.php">Notice</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </button>
            </li>
            
            <li class="nav-item dropdown mx-1 btn-primary">
              <button class="btn text-dark">
                <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fa-solid fa-download"></i> Downloadables
                </a>
                <ul class="dropdown-menu" id="dropdown_link">
                  <li><a class="dropdown-item " href="assessment_roll.php">Assessment Roll</a></li>                                    
                  <li><a class="dropdown-item " href="certificates.php">Certificates</a></li>                                    
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </button>
            </li>

            <li class="nav-item dropdown mx-1 btn-primary">
              <button class="btn text-dark">
                <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fa-solid fa-gear"></i> Settings
                </a>
                <ul class="dropdown-menu" id="dropdown_link">
                  <li><a class="dropdown-item " href="general_class.php">General Classes</a></li>
                  <li><a class="dropdown-item " href="classifications.php">Land Settings</a></li>
                  <li><a class="dropdown-item " href="classifications2.php">Building Settings</a></li>
                  <li><a class="dropdown-item " href="classifications3.php">Machinery Settings</a></li>                    
                  <li><a class="dropdown-item " href="barangay.php">Barangay Settings</a></li>                                      
                </ul>
              </button>
            </li>

            <li class="nav-item dropdown mx-1 btn-primary">
              <button class="btn text-dark">
                <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fa-solid fa-gear"></i> Accounts
                </a>
                <ul class="dropdown-menu" id="dropdown_link">
                  <li><a class="dropdown-item" href="accounts.php">Account Settings</a></li>
                  <li><a class="dropdown-item" onclick="Cookies.remove('id',  {domain:'localhost', path: '/lmos'});" href="../index.html">Log Out</a></li>                                    
                </ul>
              </button>
            </li>

                                
          </ul>              
      </div>        
  </div>
</nav> 