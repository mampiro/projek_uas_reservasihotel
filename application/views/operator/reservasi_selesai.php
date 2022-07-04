<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view("operator/_partials/head.php") ?>
</head>
<body id="page-top">

<?php $this->load->view("operator/_partials/navbar.php") ?>

<div id="wrapper">

  <?php $this->load->view("operator/_partials/sidebar.php") ?>

  <div id="content-wrapper">

    <div class="container-fluid">

        <!-- 
        karena ini halaman overview (home), kita matikan partial breadcrumb.
        Jika anda ingin mengampilkan breadcrumb di halaman overview,
        silahkan hilangkan komentar (//) di tag PHP di bawah.
        -->
    <?php //$this->load->view("operator/_partials/breadcrumb.php") ?>

   

    <!-- Area Chart Example-->
    <div class="card mb-3">
          <div class="card-header bg-success">
           
            <i class="fas fa-table"></i>
            Pemesanan Selesai</div>
             <?php 
                  
                          if($this->session->flashdata('in')){
                            echo "<div class='alert alert-success'>
                                           <span>Pemesanan Check IN SUCCESS</span>  
                                        </div>";
                          }
                          else if($this->session->flashdata('out')){

                            echo "<div class='alert alert-success'>
                                           <span>Pemesanan Check OUT SUCCESS</span>  
                                        </div>";

                          }
                          else if($this->session->flashdata('berhasil')){

                            echo "<div class='alert alert-success'>
                                           <span>Pemesanan Baru SUCCESS</span>  
                                        </div>";

                          }

                          else if($this->session->flashdata('perpanjang')){

                            echo "<div class='alert alert-success'>
                                           <span>Perpanjang SUCCESS</span>  
                                        </div>";

                          }
                          
                        
              ?>
          <div class="card-body">
          



          <div class="table-responsive">

              <table class="table table-bordered"  width="100%" cellspacing="0">
                <br>
                <thead>
                  <tr>
                    <th width="1%">No</th>

                    <th >Aksi</th>

                    <th >No Kamar</th>
                    <th >Tanggal Masuk</th>
                    <th >Tanggal Keluar</th>

                    <th>Status Reservasi</th>

                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $no = 1;
                  foreach($reservasi_selesai as $r){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                    

                      <td>

                        <?php
                        if ($r->status_pembayaran == 0) 
                        { 
                        ?>
                            Lakukan Pembayaran Dahulu
                        <?php
                        }
                        else
                        {
                        ?>


                            <?php
                            if ($r->status_reservasi == 0) { ?>

                            <a  class="btn btn-success" href="<?php echo base_url().'operator/proses_checkin/'.$r->id_reservasi_detail?>/<?=$r->id_reservasi;?>">Proses Check-IN</a> 
                            <?php
                            }
                            else if ($r->status_reservasi == 1) { ?>
                              <a  class="btn btn-danger" href="<?php echo base_url().'operator/proses_checkout/'.$r->id_reservasi_detail?>/<?=$r->id_reservasi;?>/<?=$r->id_kamar;?>"> Proses Check-OUT</a> 
                              
                            <?php
                            }
                            else { ?>
                              <span class="label label-success">CHECK OUT SUCCESS</span>
                            <?php
                            }
                            ?>

                        <?php
                        }
                        ?>


                      </td>

                      
                      <td><?php echo $r->no_kamar; ?> </td>
                      <td><?php echo $r->tgl_reservasi_masuk ; ?></td>
                      <td><?php echo $r->tgl_reservasi_keluar ; ?></td>



                      <td >
                          
                      
                        <?php
                        if ($r->status_reservasi == 0) 
                        { 
                        ?>
                            Lakukan Proses Checkin
                            
                        <?php
                        }
                        else if ($r->status_reservasi == 1) 
                        { 
                        ?>
                          Sudah Checkin 
                          
                        <?php
                        }
                        else 
                        { 
                        ?>
                          Sudah Checkout
                        <?php
                        }
                        ?>
                        
                      </td>








                    
                    <?php 
                  }
                  ?>
                </tbody> 
              </table>




              <!-- <div align="right"><a  class="btn btn-success" href="<?php echo base_url().'operator/new_reservasi_in/'.$r->id_reservasi?>/1">Checkin-All</a></div> -->



          </div>












          </div>
        </div>
      </div>
<hr style="border: 1px solid">

    

    </div>
    <!-- /.container-fluid -->

    <!-- Sticky Footer -->
    <?php $this->load->view("operator/_partials/footer.php") ?>

  </div>
  <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->


<?php $this->load->view("operator/_partials/scrolltop.php") ?>
<?php $this->load->view("operator/_partials/modal.php") ?>
<?php $this->load->view("operator/_partials/js.php") ?>
    
</body>
</html>