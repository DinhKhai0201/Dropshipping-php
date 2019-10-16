<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo RootREL; ?>media/img/logods.ico">
    <title>DropShipping - Dashboard</title>

    <!-- <link type="text/css" media="all" href="<?php echo RootREL; ?>media/css/autoptimize2.css" rel="stylesheet"/> -->
    <link rel="stylesheet" href="<?php echo RootREL; ?>media/admin/libs/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    
    <link rel="stylesheet" href="<?php echo RootREL; ?>media/admin/libs/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo RootREL; ?>media/admin/libs/bootstrap/css/bootstrap-extend.css">
    <link rel="stylesheet" href="<?php echo RootREL; ?>media/admin/css/master_style.css">
    <link rel="stylesheet" href="<?php echo RootREL; ?>media/admin/css/_all-skins.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="<?php echo RootREL; ?>media/libs/date-range-picker/daterangepicker.css"> -->

    <link rel="stylesheet" href="<?php echo RootREL; ?>media/admin/css/style.css">
     <link rel="stylesheet" href="<?php echo RootREL; ?>media/admin/css/flexslider.css">
    <link rel="stylesheet" href="<?php echo RootREL; ?>media/admin/css/customs.css">
    <script src="<?php echo RootREL; ?>media/admin/libs/js/jquery.min.js"></script>
    <script src="<?php echo RootREL; ?>media/admin/libs/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      var rootUrl   = "<?=RootURL;?>";
    </script>
  </head>
<body class="hold-transition skin-yellow sidebar-mini">
  <div class="wrapper">
    <?php include_once 'views/admin/layout/'.$this->layout.'header.php'; ?>

    <?php 
      if(isset($_SESSION['user'])){
        switch($_SESSION['user']['role']){
          case 5:
            include_once 'views/admin/layout/'.$this->layout.'left-sidebar-ads.php';
            break;
          case 3:
            include_once 'views/admin/layout/'.$this->layout.'left-sidebar-supplier.php';
            break;
          case 1:
          default:
            include_once 'views/admin/layout/'.$this->layout.'left-sidebar.php';
        }
      } 
    ?>
    <div class="content-wrapper">
    <a href="#" id="back-to-top" title="Back to top">▲
    </a>