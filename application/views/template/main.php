<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo isset($title)?$title:"Mesin Team"; ?></title>

  <!-- head style -->
  <?php $this->load->view("template/head"); ?>

</head>
<body class="hold-transition skin-blue sidebar-mini fixed">
<!-- Site wrapper -->
<div class="wrapper">

    <!-- header -->
  <?php $this->load->view("template/header"); ?>


  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <?php $this->load->view("template/sidebar"); ?>

  <!-- =============================================== -->


  <!-- Konten-->
  <div class="content-wrapper" id="content">
  

    <?php if(isset($konten)){ 
        $this->load->view($konten);
    }else{ 
        echo "File Konten Tidak Ada";} 
    ?>
  </div>
  <!-- /.konten -->

  <?php $this->load->view("template/footer"); ?>
</div>
<!-- ./wrapper -->

<?php $this->load->view("template/js"); ?>
</body>
</html>
