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
                            <h1>Reset Password</h1></div>
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
                                    <form  method="post" action="<?php echo vendor_app_util::url(array('ctl'=>'login','act'=> 'resetPassWord','params'=> ['reset_token' => $this->reset_token])); ?>" class="iwj-form iwj-login-form">
                                        <?php if($this->errors) {?>
                                        <div class="iwj-respon-msg">
                                            <div class="alert alert-danger">
                                                <?php echo $this->errors['message']; ?>
                                            </div>
                                        </div>
                                        <?php }?>
                                        <div class="iwj-field">
                                            <label>Mật khẩu mới</label>
                                            <div class="iwj-input"> <i class="fa fa-user"></i>
                                                <input type="password" class="form-control" id="newpassword" name="password" placeholder="Password" required>
                                            </div>
                                        </div>

                                        <div class="iwj-field">
                                            <label>Xác nhận mật khẩu</label>
                                            <div class="iwj-input"> <i class="fa fa-user"></i>
                                                <input type="password" class="form-control" id="repeatnewpassword" name="confirmpassword" placeholder="confirm Password" required>
                                            </div>
                                        </div>
                                        
                                        <div class="iwj-button-loader">
                                            <button type="submit" name="btn_submit" class="iwj-btn iwj-btn-primary iwj-btn-full iwj-btn-large iwj-login-btn">Thay Đổi Mật Khẩu</button>
                                        </div>
                                    </form>
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

