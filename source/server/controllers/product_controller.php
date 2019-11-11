<?php
class product_controller extends vendor_main_controller
{
    protected  $errors = false;

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
  
    public function addtowishlist()
    {

        $pm = new product_model();
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $this->record = $pm->getRecord($id);
        }
        $wishData['product_id'] = $id;
        $wishData['user_id'] = $_SESSION['user']['id'];
        $wishData['quantity'] = $_POST['qty'];
        $wishData['price'] = $_POST['price'];
        $wishData['color'] = $_POST['color'];

        $wm = new wishlist_model();
        $valid = $wm->validator($wishData);
        if ($valid['status']) {
            if ($wm->addRecord($wishData)){
                $this->errors = ['OK' => 'OK!'];
                echo (json_encode($this->record));
             } else {
                $this->errors = ['database' => 'An error occurred when inserting data!'];
                echo (json_encode($this->errors['database']));
            }
        } else {
            $this->errors = ['valid' => 'Not valid data!'];
            echo (json_encode($this->errors['valid']));
        }
    }
}
