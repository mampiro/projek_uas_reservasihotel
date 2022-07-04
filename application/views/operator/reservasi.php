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
            Pemesanan</div>
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
              <!--<a class="btn btn-success " href="new_reservasi_tambah">Add <i class="fa fa-plus"></i></a><br>-->
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <br>
                <thead>
                  <tr>
                    <th width="1%">No</th>
                  
                    <th >Nama</th>
                    <th >Telp</th>
                    <th >Alamat</th>
                    <th >JML Kamar</th>
                    <th >Total Harga</th>

                    <th>Status Pembayaran</th>

                    <th >Opsi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $no = 1;
                  foreach($reservasi as $r){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                    
                      <td><?php echo $r->nama; ?></td>
                      <td><?php echo $r->no_hp; ?></td>
                      <td><?php echo $r->alamat; ?></td>
                      <td><?php echo $r->jumlah_kamar; ?></td>
                      <td>Rp. <?=number_format($r->total_harga,0,",",".");?></td>
                      <td >
                          

                          <?php
                          if ($r->status_pembayaran == 0) 
                          { 
                          ?>
                              <font color=red>Belum Pembayaran</font>
                              <a  class="btn btn-success" href="<?php echo base_url().'operator/pembayaran_reservasi/'.$r->id_reservasi?>">Klik Bayar</a>
                              
                          <?php
                          }
                          else if ($r->status_pembayaran == 1) 
                          { 
                          ?>
                            <font color=blue>Sudah Bayar</font>
                            
                        
                          <?php
                          }
                          ?>


                        
                      </td>








                      <td>
                      <a  class="btn btn-success" href="<?php echo base_url().'operator/reservasi_detail/'.$r->id_reservasi?>">Detail</a> 

                      </td>
                    <?php 
                  }
                  ?>
                </tbody> 
            </table>
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