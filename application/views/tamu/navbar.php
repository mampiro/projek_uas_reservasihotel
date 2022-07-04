<nav class="navbar navbar-expand navbar-dark bg-secondary static-top">


    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <a class="navbar-brand mr-1" href="<?php echo site_url('Welcome') ?>"><?php echo SITE ?></a>


    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle text-white" href="<?php echo site_url('welcome/saran') ?>"  role="button" >
                <i class="fas fa-envelope-open -circle fa-fw"></i> KRITIK & SARAN
            </a>
            
        </li>
    </ul>
 





    <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle text-white" href="<?php echo site_url('welcome/pendaftaran') ?>"  role="button" >
            <i class="fas  fa-address-card fa-fw " ></i> Daftar
            </a>
            
        </li>
    </ul>


    
    <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle text-white" href="<?php echo site_url('welcome/login') ?>"  role="button" >
            <i class="fas fa-user-circle fa-fw " ></i> Login
            </a>
            
        </li>
    </ul>



    
    
    <!--
    <ul class="navbar-nav ml-auto ml-md-0">
        
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle text-white" href="<?php echo site_url('login') ?>"  role="button" >
                <i class="fas fa-user-circle fa-fw " ></i> LOGIN
            </a>
            
        </li>
    </ul>
    -->
</nav>


