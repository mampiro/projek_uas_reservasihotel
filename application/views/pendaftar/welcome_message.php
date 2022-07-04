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
    ?>
    
      <div class="container-fluid">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <h3>Lengkapi Profil Anda</h3>
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


              <form class="user" method="post" action="<?= base_url('pendaftar/update_user'); ?>" enctype="multipart/form-data">


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
                  <input type="file" name="foto">

                  <input type="hidden" name="hidden_foto" value="<?=$data['foto']; ?>"  >
                </center>



                  <input type="text" class="form-control" name="nama"  readonly value="<?=$data['nama'];?>">
                  <input type="text" class="form-control" name="email"  readonly value="<?=$data['email'];?>"">
                  <input type="text" class="form-control" name="no_hp" value="<?=$data['no_hp'];?>" placeholder="Masukkan Nomor Handphone" required>
                  <input type="text" class="form-control" name="ktp" value="<?=$data['ktp'];?>" placeholder="Masukkan Nomor ktp" required>
                  <input type="text" class="form-control" name="alamat" value="<?=$data['alamat'];?>" placeholder="Masukkan Alamat" required>
                  <button type="submit" class="btn btn-success" name="Submit">Update</button>
              
              
              </form>

                <br><br>


            </div>
          </div>
        </div>
      </div>

    <?php
    }
    else
    {
    ?>
        
      <div class="container-fluid">

        <!-- search box-->
          <div class="container-fluid">
            <div class="search-form"><h4><span class="fa fa-search"></span> Pencarian Kelas Kamar</h4>
            <?php echo form_open('Pendaftar/cari');?>
              <div class="row">

                <div class="col-lg-12">
                    <select class="form-control" name="id_kelas_kamar">
                      <option value="">Pilih Kelas Kamar</option>
                      <?php
                      foreach ($kelas_kamar->result_array() as $value) { ?>
                          <option value="<?php echo $value['id_kelas_kamar']; ?>"><?php echo $value['nama_kelas_kamar'] ?></option>
                      <?php
                      }
                      ?>
                    
                    </select>
                    </div>
                </div>

              <button class="btn btn-primary">Cari</button>

            <?php echo form_close();?>
          </div>
          <hr style="border: 1px solid">
        <!--end search box-->


      <!-- Icon Cards-->
        <div class="row">

        <?php foreach ($kamar->result_array() as $value) { ?>
        <div class="col-xl-3 col-sm-6 mb-3" >

        <div class="properties" style="background-color: white; ">
          <div class="text-black font-weight-bold center">
              <img src="<?php echo base_url();?>/assets/images/<?php echo $value['nama_kamar_gambar'];?>" class="img-responsive" alt="properties" style="width:278.5px;height:150px;">



                  <?php


                  $cek_temp=$this->db->query("select *  from  temp_reservasi where id_kamar='".$value['id_kamar']."' and id_pendaftar='".$this->session->userdata('id_pendaftar')."' ");


        
                  if($cek_temp->num_rows()>0)
                  { 
                  ?>


                    <div class="card-body status new">
                    <div style="color: white;">Kamar ini Sedang Anda Pesan</div>
                    </div>

                  <?php
                  }
                  elseif ($value['status_kamar']=="1") 
                  { 
                  ?>

                    <div class="card-body status new">
                    <div style="color: white;">Sudah dipesan Reserved</div>
                    </div>

                  <?php
                  }
                  else 
                  { 
                  ?>
                   
                     <div class="card-body status sold">
                      <div style="color: white;"> Kamar Tersedia</div>
                      </div>

                  <?php 
                  }
                  ?>





                  <h3><a href="<?php echo base_url();?>pendaftar/kamardetail/<?php echo $value['id_kamar'];?>"><?php echo $value['no_kamar'];?></a></h3>
                    <hr style="margin-top: 1; margin-bottom: 1;">
                    <h5><p class="price">Harga: <?php echo rupiah($value['harga_kamar']);?></p></h5>
                    <hr style="margin-top: 1; margin-bottom: 1;">
                    <div class="listing-detail"><?php echo $value['nama_kelas_kamar'];?>   </div>
                    <a class="btn btn-primary" href="<?php echo base_url();?>pendaftar/kamardetail/<?php echo $value['id_kamar'];?>">selengkapnya</a>

          </div>

          
          
        </div>
        </div>
        
        <?php
        }
        ?>

        </div> <!-- /.iron-card -->
      </div> <!-- /.container-fluid -->

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