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
              <h3>Histori Reservasi</h3>
              <br>

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


                
              <table width="100%" border="1" cellpadding="5">
                <tr align="center">
                    <th>No</th>
                    <th>Tanggal Transaksi</th>
                    <th>Total Harga</th>
                    <th>Jumlah Kamar</th>
                    <th>Status Pembayaran</th>
                    <th>Opsi</th>
                </tr>
                <?php
                $no=1;
                foreach ($histori_transaksi->result_array() as $a) 
                { 
                 

                ?>
                <tr align="center">
                    <td><?=$no;?></td>
                    <td ><?=$a['tgl_entry'];?></td>
                    <td>Rp. <?=number_format($a['total_harga'],0,",",".");?></td>
                    <td ><?=$a['jumlah_kamar'];?></td>
                    <td >
                        

                        <?php
                        if ($a['status_pembayaran'] == 0) 
                        { 
                        ?>
                            <font color=red>Belum Pembayaran</font>
                             
                        <?php
                        }
                        else if ($a['status_pembayaran'] == 1) 
                        { 
                        ?>
                           <font color=blue>Sudah Bayar</font>
                           
                      
                        <?php
                        }
                        ?>


                      
                    </td>

                    <td>

                   
                        <a class="btn btn-primary" href="<?php echo base_url();?>pendaftar/reservasi_detail/<?php echo $a['id_reservasi'];?>" >Detail </a>

                   


                      </td>
                   



                </tr>

              




               <?php
               $no++;
                }
                ?>
              </table>

            



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