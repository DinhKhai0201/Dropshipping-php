<?php
class product_controller extends vendor_main_controller
{
    public function view()
    {
        global $app;
        $conditions = "";

        // exit($app['slug']);
        if (isset($app['slug']) && isset($app['id'])) {
            $id = $app['id'];
            $slug = $app['slug'];
            $conditions .= (($conditions) ? " AND " : "") . " id={$id} and slug='{$slug}'";

            $product_model = new product_model();
            $this->products = $product_model->getAllRecords('*', [
                'conditions' => $conditions,
                // 'joins' => ['gallery', 'user'],
                'order' => 'id ASC',
                // 'get-child'=>true
            ]);

            // exit(json_encode($this->products));

            $gallery_model = new gallery_model();
            $this->galleries = $gallery_model->getAllRecords('*', [
                'conditions' => $id,
                'order' => 'id ASC',
            ]);
            $this->display();
        }else{
            include "views/" . $app['areaPath'] . "staticpages/error.php";
            exit();
        }
        
    }
    public function quickview()
    {
        global $app;
        $conditions = "";
        if (isset($app['slug']) && isset($app['id'])) {
            $id = $app['id'];
            $slug = $app['slug'];
            $conditions .= (($conditions) ? " AND " : "") . " id={$id} and slug='{$slug}'";

            $product_model = new product_model();
            $this->products = $product_model->getAllRecords('*', [
                'conditions' => $conditions,
                'order' => 'id ASC',
            ]);
            $gallery_model = new gallery_model();
            $this->galleries = $gallery_model->getAllRecords('*', [
                'conditions' => $id,
                'order' => 'id ASC',
            ]);
            $this->display();
        } else {
            include "views/" . $app['areaPath'] . "staticpages/error.php";
            exit();
        }
        $this->display();
    }
    public function addtocart() {
        if (!empty($_POST["id"])) {	
            exit("asdasdasd");
        }
    }
}
