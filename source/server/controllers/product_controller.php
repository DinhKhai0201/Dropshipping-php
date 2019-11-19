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
            $cm = new comment_model();
            $rm = new reply_model();
            $this->comment = $cm->allp('comments.*', [
                'conditions' => 'product_id = '.$id,
                'joins' => ['product', 'user'],
                'pagination' => [
                    'nopp' => 5
                ],
                'order' => 'id DESC',
            ]);
            $this->reply = $rm->getAllRecords('replies.*', [
                'conditions' => 'replies.product_id ='.$id,
                'joins' => ['product', 'user','comment'],
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
            $this->products = $product_model->getAllRecords('*,(SELECT image FROM galleries WHERE product_id = products.id limit 1) as oneImage', [
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
    public function comment() {
        $status = false;
        if (isset($_SESSION['user'])) {
            $dataComment['user_id'] = $_SESSION['user']['id'];
            if (isset($_POST['id'])) {
                $dataComment['product_id'] = $_POST['id'];
            }
            if (isset($_POST['content'])) {
                $dataComment['contents'] = $_POST['content'];
            }
            $cm = new comment_model();
            $valid = $cm->validator($dataComment);
            if ($valid['status']) {
                if ($idcm = $cm->addRecord($dataComment)) {
                    $status = true;
                } 
            }
            if ($status == true) {
                 $this->res = $cm->getAllRecords('comments.*', [
                    'conditions' => 'comments.id ='.$idcm,
                    'joins' => ['product','user']
                ]);
                $data =[];
                foreach ($this->res as $value) {
                    $data[] = $value;
                }
                echo json_encode($data);
            } else {
                 echo json_encode($status);
            }
            
        }
    }
     public function reply() {
        $status = false;
        if (isset($_SESSION['user'])) {
            $dataReply['user_id'] = $_SESSION['user']['id'];
            if (isset($_POST['id_p'])) {
                $dataReply['product_id'] = $_POST['id_p'];
            }
            if (isset($_POST['id_c'])) {
                $dataReply['comment_id'] = $_POST['id_c'];
            }
             if (isset($_POST['content'])) {
                $dataReply['content'] = $_POST['content'];
            }
            $lm = new reply_model();
            $valid = $lm->validator($dataReply);
            if ($valid['status']) {
                if ($idlm = $lm->addRecord($dataReply)) {
                    $status = true;
                } 
            }
            if ($status == true) {
                 $this->res = $lm->getAllRecords('replies.*', [
                    'conditions' => 'replies.id ='.$idlm,
                    'joins' => ['product','user','comment']
                ]);
                $data =[];
                foreach ($this->res as $value) {
                    $data[] = $value;
                }
                echo json_encode($data);
            } else {
                 echo json_encode($status);
            }
            
        }
    }
  
    
}
