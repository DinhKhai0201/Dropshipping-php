<?php
class product_controller extends vendor_main_controller
{
    public function view()
    {
        global $app;
        $conditions = "";
        if (isset($app['slug']) && isset($app['id'])) {
            $id = $app['id'];
            $slug = $app['slug'];
            $conditions .= (($conditions) ? " AND " : "") . " id={$id} and slug='{$slug}'";
            // exit(json_encode($conditions));
            $product_model = new product_model();
            $this->products = $product_model->getAllRecords('products.*,(SELECT image FROM galleries WHERE product_id = products.id limit 1) as oneImage', [
                'conditions' => $conditions,
                'order' => 'id ASC',
            ]);
            $gallery_model = new gallery_model();
            $this->galleries = $gallery_model->getAllRecords('*', [
                'conditions' => 'product_id ='.$id,
                'order' => 'id ASC',
            ]);
            // also purchase
            $this->alsoproducts = $product_model->getAllRecords('products.*,(SELECT image FROM galleries WHERE product_id = products.id limit 1) as oneImage', [
                'conditions' => 'best_selling = 1',
                'order' => 'id ASC',
            ]);
            //previous and next product
            $this->previousproduct = $product_model->nextProduct($id, true);
            $this->nextproduct = $product_model->nextProduct($id, false);
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
                'conditions' => 'product_id =' . $id,
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
