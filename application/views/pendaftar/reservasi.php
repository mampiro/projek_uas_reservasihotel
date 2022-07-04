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
              <h3>Reservasi Anda</h3>
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


              <form class="user" method="post" action="<?= base_url('snap'); ?>" enctype="multipart/form-data">

              <div class="temp">
                
              <table width="100%" border="1" cellpadding="5">
                <tr align="center">
                    <th>No</th>
                    <th>Nomor Kamar</th>
                    <th>Tanggal Reservasi Masuk</th>
                    <th>Tanggal Reservasi Keluar</th>
                     <th>Status</th>
                    <th>Harga</th>
                    <th>Opsi</th>
                </tr>
                <?php
                $no=1;
                foreach ($cek_temp->result_array() as $a) 
                { 
                  $harga_kamar_array_sum[]=$a['harga_kamar'];

                ?>
                <tr align="center">
                    <td><?=$no;?></td>
                    <td ><?=$a['no_kamar'];?></td>
                    <td><?=$a['tgl_reservasi_masuk'];?></td>
                    <td><?=$a['tgl_reservasi_keluar'];?></td>
                    <td >

                        <?php
                          if ($a['status_kamar']==0) 
                          { 
                            echo "<font color=blue>Avaliable</font>";
                          }
                          else
                          {
                            echo "<font color=red>Not Avaliable</font>";
                          }

                        ?>

                    </td>
                    <td>

                    <?php
                    $date1=date_create($a['tgl_reservasi_masuk']); //mis. tgl chekin
                    $date2=date_create($a['tgl_reservasi_keluar']); //mis. tgl chekout
                    $diff=date_diff($date1,$date2); //menyimpan didalam fungsi date_diff
                    $jumlah_hari=$diff->format("%d%"); //menampilkan jumlah hari
                    //echo $jumlah_hari;


                    $harga=$jumlah_hari * $a['harga_kamar']; //mengkalikan jumlah hari dengan nilai tertentu
                    //echo Rupiah($harga,2,",","."); //menampilkan harga dalam format currency IDR

                    ?>


                    <?php
                    echo $jumlah_hari." hari x ".number_format($a['harga_kamar'],0,",",".")." = ".Rupiah($harga,0,",",".");
                    ?>


                      </td>
                    <td>
                      

                    <a class="btn btn-primary" href="#" id="hapus<?=$a['id_temp_reservasi'];?>" >Hapus</a>

                    <hr>

                      <a class="btn btn-primary" href="<?php echo base_url();?>pendaftar/kamardetail/<?php echo $a['id_kamar'];?>" target="_blank" >Detail Kamar</a>
                      
                    </td>



                </tr>

                <input type="hidden" id="id_temp_reservasi<?=$a['id_temp_reservasi'];?>" value="<?=$a['id_temp_reservasi'];?>">


                <script type="text/javascript">
                $(document).ready(function()
                {
                  





               /*    $("#unit<?=$b['id_keranjang_belanja'];?>").click(function() {
                  <!-- mendapatkan value dari combobox -->
                  var unit = $(this).val();
                  
                  var id_keranjang_belanja = $("#id_keranjang_belanja<?=$b['id_keranjang_belanja'];?>").val();

                  
                  $.ajax({
                    type:"get",
                    url:"<?php echo base_url();?>index.php/transaksi/update_temp",
                  data: { 'unit':unit, 'id_keranjang_belanja':id_keranjang_belanja},
                  
                    //data:"id="+ idkategori, 
                    success: function(data)
                  {
                    $(".temp").html(data);
                    }
                  });
                  
                  
                  
                  
                }); */



                  $("#hapus<?=$a['id_temp_reservasi'];?>").click(function() {
                  <!-- mendapatkan value dari combobox -->
                  var opsi4 = $(this).val();
                  
                  var id_temp_reservasi = $("#id_temp_reservasi<?=$a['id_temp_reservasi'];?>").val();

                  
                  $.ajax({
                    type:"get",
                    url:"<?php echo base_url();?>index.php/pendaftar/hapus_temp",
                  data: { 'opsi4':opsi4, 'id_temp_reservasi':id_temp_reservasi},
                  
                    //data:"id="+ idkategori, 
                    success: function(data)
                  {
                    $(".temp").html(data);
                    }
                  });
                  
                  
                  
                  
                });


                });
                </script>









               <?php
               $no++;
                }
                ?>
              </table>

              <br>
              <a  href="<?php echo site_url('pendaftar') ?>"> << Kembali Booking Kamar</a>




              <br>
              <?php
              if($cek_temp->num_rows()>0)
              {
              ?>

                <hr>
                <font size="2">
                <div class="row">
                  <div class="col-lg-6">Total :</div> <div class="col-lg-6" align="right"><b>Rp. <?=number_format(array_sum($harga_kamar_array_sum), 0, ",", ".");?></b></div>
                </div>
                </font>

             <?php
              }
              ?>

              </div><!--temp-->




              <?php
              if($cek_temp->num_rows()>0)
              {
              ?>
                <p></p>
                <div align="right"><button type="submit" class="btn btn-primary">Checkout</button></div>
             <?php
              }
              ?>

              </form>

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