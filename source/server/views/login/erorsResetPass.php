<?php
global $mediaFiles;
array_push($mediaFiles['css'], RootREL . "media/css/about_page.css");
?>
<?php include_once 'views/layout/' . $this->layout . 'header.php'; ?>
<div class="main-container col1-layout">
    <div class="main container">
        <div class="col-main">

            <div class="page-title">
                <h1>Error Reset PassWord?</h1>
            </div>
        </div>
    </div>
</div>
<?php
array_push($mediaFiles['js'], RootREL . "media/js/home.js");
array_push($mediaFiles['js'], RootREL . "media/libs/select2/select2.min.js");
?>
<?php include_once 'views/layout/' . $this->layout . 'footer.php'; ?>