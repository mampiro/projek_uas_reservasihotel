<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view("tamu/head.php") ?>
</head>
<body id="page-top">

<?php $this->load->view("tamu/navbar.php") ?>

<div id="wrapper">
  <div id="content-wrapper">
    <div class="container-fluid">

    <!-- search box-->
      <div class="container-fluid">
            
        <h2 >Login User</h2>
        <hr style="border: 1px solid">
          
          <!--end search box-->

        <div class="row">

          <div class="col-lg-9 col-sm-9 mx-auto mt-5">
            <?php echo form_open('welcome/proses_login');?>
              <input type="text" class="form-control" name="email" placeholder="Email">
              <input type="password" class="form-control" name="password" placeholder="Password">
              <button type="submit" class="btn btn-success" name="Submit" >Login</button>
            <?php echo form_close();?> 
          </div>

          <?php $this->load->view("tamu/footer.php") ?>

        </div>

      </div>


    </div>
  </div>
</div>
<!-- /#wrapper -->


<?php $this->load->view("tamu/scrolltop.php") ?>
<?php $this->load->view("tamu/modal.php") ?>
<?php $this->load->view("tamu/js.php") ?>
    
</body>
</html>