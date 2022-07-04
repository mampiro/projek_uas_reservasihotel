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
            Proses Check Out</div>
          
          <div class="card-body">
              
                    <?php if(validation_errors()) { ?>
                <div class="alert alert-danger">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <?php echo validation_errors(); ?>
                </div>
                <?php 
                } 
                ?>
                    
                      <?php echo form_open_multipart('operator/new_reservasi_out_simpan/','class="form-horizontal"'); ?>
                      <div class="form-body">
                      
                      
                        <input type="hidden" name="id_reservasi" value="<?php echo $id_reservasi;?>">
                        <input type="hidden" name="status_reservasi" value="<?php echo $status_reservasi;?>">
                      
                        <h3 class="form-section">Informasi</h3>
                        <hr>
                        <div class="card-body">
                        
                        <div class="row">
                          
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3">Nama</label>
                              <div class="col-md-9">
                                <input type="text" class="form-control"  name="nama_reservasi" value="<?php echo $nama;?>" disabled>
                                
                              </div>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3">Telp</label>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="no_hp" value="<?php echo $no_hp;?>" disabled>
                                
                              </div>
                            </div>
                          </div>
                          
                        </div>


                        <div class="row">
                          
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3">Alamat</label>
                              <div class="col-md-9">
                                <input type="text" class="form-control"  name="alamat" value="<?php echo $alamat;?>" disabled>
                                
                              </div>
                            </div>
                          </div>


                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3">No KTP</label>
                              <div class="col-md-9">
                                <input type="text" class="form-control"  name="alamat_reservasi" value="<?php echo $ktp;?>" disabled>
                                
                              </div>
                            </div>
                          </div>


                         
                        </div>

                    


                        
                      </div>

                        <h3 class="form-section">Pembayaran</h3>
                        <hr>
                        <div class="card-body">
                          

                          <div class="row">
                          
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3">Total Bayar</label>
                              <div class="col-md-9">
                                <input type="text" class="form-control"  name="total_bayar" id="total_bayar" value="<?=number_format($total_harga,0,",",".");?>" readonly>
                                
                              </div>
                            </div>
                          </div>

                          
                          
                        </div>

                        <div class="row">
                          
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3">Status Pembayaran</label>
                              <div class="col-md-9">
                              

                                <select name="status_pembayaran" class="form-control">
                                 
                              
                                <option value="0" <?php if($status_pembayaran==0){ echo "selected";}?>> Belum Bayar</option>

                                <option value="1" <?php if($status_pembayaran==1){ echo "selected";}?>> Sudah Bayar</option>

                               </select>


                                
                              </div>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-4">Status Reservasi</label>
                              <div class="col-md-9">
                               

                                <?php
                                if ($status_reservasi == 0) 
                                { 
                                ?>
                                    Lakukan Proses Checkin
                                     
                                <?php
                                }
                                else if ($status_reservasi == 1) 
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


                                
                              </div>
                            </div>
                          </div>
                          
                        </div>
                      </div>

                      </div>
                      <div class="form-actions">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="row">
                              <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn btn-success">Checkout</button>
                                </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                          </div>
                        </div>
                      </div>
                    <?php echo form_close();?>  
                    

          </div>
        </div>
      </div>

    

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