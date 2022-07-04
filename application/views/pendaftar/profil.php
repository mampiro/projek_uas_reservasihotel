<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view("template_pendaftar/head.php") ?>
</head>
<body id="page-top">

<?php $this->load->view("template_pendaftar/navbar.php") ?>

<div id="wrapper">
  <div id="content-wrapper">



    <?php
    foreach ($cek_pendaftar->result_array() as $a) 
    { 
      $data=$a;
    }

    //echo $data['nama'];

    
    ?>


    <?php
    if($data['ktp']=="")
    {
        redirect('pendaftar');
    }
    else
    {
    ?>
    
      <div class="container-fluid">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <h3>Profil Anda</h3>
              <br>
              <?php if (isset($_GET['proses'])) 
              { 
              ?>
              <div class="alert alert-success">
              <?= $_GET['proses']; ?>
              </div>
              <?php 
              } 
              ?>


              <?php 
              if($this->session->flashdata('dataeror'))
              {
              ?> 
                    <div class="alert alert-danger"><?=$this->session->flashdata('dataeror');?></div>                    
              <?php
              }
              else if($this->session->flashdata('data'))
              {
              ?>
                    <div class="alert alert-success"><?=$this->session->flashdata('data');?></div>
              <?php
              }
              ?>
              <br />        





                <center>
                  <?php
                  if($data['foto']=="")
                  {
                  ?>
                      <img src="<?= base_url() ?>uploads/img/nophoto.gif" width="200">
                  <?php
                  }
                  else
                  {
                  ?>

                      <img src="<?= base_url() ?>uploads/<?=$data['foto']; ?>" width="200">
                  <?php
                  }
                  ?> 
                  <p></p>
                  <!-- <input type="file" name="foto"> -->

                  <input type="hidden" name="hidden_foto" value="<?=$data['foto']; ?>"  >
                </center>



                  <input type="text" class="form-control" name="nama"  readonly value="<?=$data['nama'];?>">
                  <input type="text" class="form-control" name="email"  readonly value="<?=$data['email'];?>"">
                  <input type="text" class="form-control" name="no_hp" value="<?=$data['no_hp'];?>" placeholder="Masukkan Nomor Handphone" readonly>
                  <input type="text" class="form-control" name="ktp" value="<?=$data['ktp'];?>" placeholder="Masukkan Nomor ktp" required readonly>
                  <input type="text" class="form-control" name="alamat" value="<?=$data['alamat'];?>" placeholder="Masukkan Alamat" required readonly>
              
              

                <br><br>


            </div>
          </div>
        </div>
      </div>

    <?php

    }//foreach ($cek_pendaftar->result_array() as $a) 
    ?>


  
    <!-- Sticky Footer -->
    <?php $this->load->view("template_pendaftar/footer.php") ?>


  </div>  <!-- /.content-wrapper -->
</div><!-- /#wrapper -->


<?php $this->load->view("template_pendaftar/scrolltop.php") ?>
<?php $this->load->view("template_pendaftar/modal.php") ?>
<?php $this->load->view("template_pendaftar/js.php") ?>
    
</body>
</html>