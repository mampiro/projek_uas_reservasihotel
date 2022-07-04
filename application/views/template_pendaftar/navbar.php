<nav class="navbar navbar-expand navbar-dark bg-secondary static-top">


    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <a class="navbar-brand mr-1" href="<?php echo site_url('pendaftar') ?>"><?php echo SITE ?></a>


    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        
    </form>

    <!-- Navbar -->
<!--      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle text-white" href="<?php echo site_url('welcome/saran') ?>"  role="button" >
                <i class="fas fa-envelope-open -circle fa-fw"></i> KRITIK & SARAN
            </a>
            
        </li>
    </ul>
 -->    




    <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle text-white" href="<?php echo site_url('pendaftar/histori_transaksi') ?>"  role="button" >
                <i class="fas fa-history"></i> Transaksiku
            </a>
            
        </li>
    </ul>


    <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle text-white" href="<?php echo site_url('pendaftar/reservasi') ?>"  role="button" >
                <i class="fas fa-shopping-cart"></i> Reservasi 

                <?php
                $jumlah_temp=$this->db->query("select * from temp_reservasi where id_pendaftar='".$this->session->userdata('id_pendaftar')."' ");
                echo $jumlah_temp->num_rows();
                ?>
                
            </a>
            
        </li>
    </ul>
     
    
    <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle text-white" href="<?php echo site_url('welcome/logout') ?>"  role="button" >
            <i class="fas fa-user-circle fa-fw " ></i> Keluar
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


<div class="container-fluid">
    <div class="row"  style="padding: 10px;">
        <div class="col-sm-3">Selamat Datang di: <?php echo SITE ?></div>
        <div class="col-sm-9" align="right">
            <a href="<?php echo site_url('pendaftar/profil') ?>">Profil</a> | Ganti Password |  Nama Akun Anda : <b><font color="blue"><?=$this->session->userdata('nama');?></font></b>
        </div>
    </div>
</div>
<hr>