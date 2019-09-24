<?php include_once 'views/admin/layout/'.$this->layout.'top.php'; ?>
<link rel="stylesheet" href="<?php echo RootREL; ?>media/admin/css/fakeLoader.min.css">
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <?php if( isset($_SESSION['user']) && isset($_SESSION['user']['role']) && $_SESSION['user']['role']==$this->rolesFlip['admin'] ){ ?>
    <section class="content">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-xs-6">
          <div class="small-box bg-info">
            <div class="inner">
              <h3>Accounts</h3>
              <p><?= ($this->noUsers-$this->noNonAdminUsers); ?> admins and <?= $this->noNonAdminUsers; ?> users</p>
            </div>
            <a href="<?php echo vendor_app_util::url(["ctl"=>"users"]); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
       <!--  <div class="col-lg-3 col-md-6 col-xs-6">
          <div class="small-box bg-success">
            <div class="inner">
              <h3>Static page</h3>
              <p><?= $this->noStaticPages ?> Static page</p>
            </div>
            <a href="<?php echo vendor_app_util::url(["ctl"=>"static_pages"]); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div> -->
        <div class="col-lg-3 col-md-6 col-xs-6">
          <div class="small-box bg-dark">
            <div class="inner">
              <h3>Categories</h3>
              <p><?= $this->noCategories; ?> Categories</p>
            </div>
           
            <a href="<?php echo vendor_app_util::url(["ctl"=>"categories"]); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-xs-6">
          <div class="small-box bg-info">
            <div class="inner">
              <h3>Ads</h3>
              <p><?= $this->noAds; ?> Advertisements</p>
            </div>
          
            <a href="<?php echo vendor_app_util::url(["ctl"=>"ads"]); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <!-- <div class="col-lg-3 col-md-6 col-xs-6">
          <div class="small-box bg-success" style="background-color: #dc3545 !important;">
            <div class="inner">
              <h3>Sitemap</h3>
              <p><span class="RefreshSitemap">Update sitemap</span></p>
            </div>
              <a class="small-box-footer RefreshSitemap" href="javascript:void(0)">Update sitemap <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div> -->
      </div>
    </section>
    <?php } ?>
    <?php if( isset($_SESSION['user']) && isset($_SESSION['user']['role']) && $_SESSION['user']['role']==$this->rolesFlip['jobmanager'] ){ ?>
    <section class="content">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-xs-6">
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>Jobs</h3>
              <p><?= $this->noJobs ?> Jobs</p>
            </div>
           
            <a href="<?php echo vendor_app_util::url(["ctl"=>"jobs"]); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
    </section>
    <?php } ?>
    <?php if( isset($_SESSION['user']) && isset($_SESSION['user']['role']) && $_SESSION['user']['role']==$this->rolesFlip['adsmanager'] ){ ?>
    <section class="content">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-xs-6">
          <div class="small-box bg-info">
            <div class="inner">
              <h3>Ads</h3>
              <p><?= $this->noAds; ?> Advertisements</p>
            </div>
          
            <a href="<?php echo vendor_app_util::url(["ctl"=>"ads"]); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
    </section>
    <?php } ?>
  </div>
  <div class="fakeLoader"></div>

<?php include_once 'views/admin/layout/'.$this->layout.'footer.php'; ?>

<script src="<?php echo RootREL; ?>media/admin/js/fakeLoader.min.js"></script>
<script type="text/javascript">
	$(function () {
    $.fakeLoader({
      bgColor: '#cccccc9e',
      spinner: 'spinner2',
    });
    $('.RefreshSitemap').on('click', function(){
          console.log('test');
          let refresh = confirm("Are you sure to update sitemap ?");
          if(refresh){
            $('.RefreshSitemap').html('Updating...')
            $('.RefreshSitemap').append('<i class="fa fa-cog fa-spin Updating"></i>')
            $('.fakeLoader').css('display','block');
            $.ajax({
              url: "<?php echo RootURL; ?>sitemap-generator.php",
              success: function (data) {
                data = JSON.parse(data);
                if(data.status == true) {
                  $('.fakeLoader').css('display','none');
                  $('.RefreshSitemap').html('Update sitemap <i class="fa fa-arrow-circle-right"></i>')
                  $('.Updating').remove();
                } 
              }
            })
          }
        })
	})
</script>


