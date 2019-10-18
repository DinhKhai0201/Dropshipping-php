<?php 
    global $mediaFiles;
    array_push($mediaFiles['css'], RootREL."media/css/about_page.css");
?>
<?php include_once 'views/layout/'.$this->layout.'header.php'; ?>
    <div class="wrapper">
        <div class="iw-overlay"></div>
        <div class="iw-header-version3 iw-header-version6">
            <div class="header header-default header-style-default v3 v6 header-sticky no-header-sticky-mobile ">
                <?php include_once 'views/layout/'.$this->layout.'navbar.php'; ?>
            </div>
        </div>   
        <div class="page-heading default">
            <div class="container-inner">
                <div class="container">
                    <div class="page-title">
                        <div class="iw-heading-title">
                            <h1>Error Reset Password</h1></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="contents-main" id="contents-main">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <article id="post-143" class="post-143 page type-page status-publish hentry">
                            <div class="entry-content">
                                <div class="iwj-login">
                                <?php if($this->errors) { ?>
                                  <div class="alert alert-danger alert-dismissible error-change" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <?php echo $this->errors['message']; ?>
                                  </div>
                                  <?php } ?>
                                </div>
                            </div>
                        </div>
                    <div class="clearfix"></div>
                    <footer class="entry-footer "></footer>
                </article>
            </div>
        </div>
    </div>
</div>  
<?php
    array_push($mediaFiles['js'], RootREL."media/js/home.js");
    array_push($mediaFiles['js'], RootREL."media/libs/select2/select2.min.js");

?>     
<?php include_once 'views/layout/'.$this->layout.'footer.php'; ?>

