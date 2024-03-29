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
            $conditions .= (($conditions) ? " AND " : "") . " products.id={$id} and products.slug='{$slug}'";
            // exit(json_encode($conditions));
            $product_model = new product_model();
            $orther = "LEFT JOIN coupons ON product_use_coupons.coupon_id = coupons.id";
            $this->products = $product_model->getAllRecords('products.*,coupons.id as coupons_id,coupons.name as coupons_name,coupons.slug as coupons_slug,coupons.id as coupons_id,coupons.coupon_code as coupons_coupon_code,coupons.status as coupons_status,coupons.decription as coupons_decription,coupons.type as coupons_type,coupons.percent_value as coupons_percent_value,coupons.fix_value as coupons_fix_value,coupons.time_start as coupons_time_start,coupons.time_end as coupons_time_end,(SELECT image FROM galleries WHERE product_id = products.id limit 1) as oneImage', [
                'orther'=>$orther,
                'conditions' => $conditions,
                'joins'=>['product_use_coupon'],
                'search-left-join'=>true,
                'order' => 'products.id ASC',
            ]);
           
            $gallery_model = new gallery_model();
            $this->galleries = $gallery_model->getAllRecords('*', [
                'conditions' => 'product_id ='.$id,
                'order' => 'id ASC',
            ]);
            // also purchase
            
            $this->alsoproducts = $product_model->getAllRecords('products.*,coupons.id as coupons_id,coupons.name as coupons_name,coupons.slug as coupons_slug,coupons.id as coupons_id,coupons.coupon_code as coupons_coupon_code,coupons.status as coupons_status,coupons.decription as coupons_decription,coupons.type as coupons_type,coupons.percent_value as coupons_percent_value,coupons.fix_value as coupons_fix_value,coupons.time_start as coupons_time_start,coupons.time_end as coupons_time_end,(SELECT image FROM galleries WHERE product_id = products.id limit 1) as oneImage', [
                'orther'=>$orther,
                'conditions' => 'best_selling = 1',
                'joins'=>['product_use_coupon'],
                'search-left-join'=>true,
                'order' => 'id ASC',
            ]);
            $cm = new comment_model();
            $rm = new reply_model();
            $rate = new rate_model();
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
            $this->rating = $rate->allp('rates.*', [
                'conditions' => 'rates.product_id =' . $id,
                'joins' => ['product', 'user'],
                'pagination' => [
                    'nopp' => 5
                ],
                'order' => 'id DESC',
            ]);
            $this->one = $rate->getCountRecords(['conditions' => 'rates.product_id =' . $id.' AND rating = 1']);
            $this->two = $rate->getCountRecords(['conditions' => 'rates.product_id =' . $id . ' AND rating = 2']);
            $this->three = $rate->getCountRecords(['conditions' => 'rates.product_id =' . $id . ' AND rating = 3']);
            $this->four = $rate->getCountRecords(['conditions' => 'rates.product_id =' . $id . ' AND rating = 4']);
            $this->five = $rate->getCountRecords(['conditions' => 'rates.product_id =' . $id . ' AND rating = 5']);
            $this->sum = ($this->one  +  $this->two +  $this->three  +  $this->four +  $this->five);
            if ($this->sum > 0) {
                $this->avenge = round((float) (($this->one * 1 +  $this->two * 2 +  $this->three * 3 +  $this->four * 4 +  $this->five * 5) / ($this->sum)), 1);
            } else {
                $this->avenge = 0;
            }
            
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
    public function rate()
    {
        $status = false;
        if (isset($_SESSION['user'])) {
            $dataRate['user_id'] = $_SESSION['user']['id'];
            if (isset($_POST['product_id'])) {
                $dataRate['product_id'] = $_POST['product_id'];
            }
            if (isset($_POST['rating'])) {
                $dataRate['rating'] = $_POST['rating'];
            }
            if (isset($_POST['contents'])) {
                $dataRate['contents'] = $_POST['contents'];
            }
            $rm = new rate_model();
            $valid = $rm->validator($dataRate);
            if ($valid['status']) {
                if ($idrm = $rm->addRecord($dataRate)) {
                    $status = true;
                }
            }
            if ($status == true) {
                $this->res = $rm->getAllRecords('rates.*', [
                    'conditions' => 'rates.id =' . $idrm,
                    'joins' => ['product', 'user']
                ]);
                $data = [];
                foreach ($this->res as $value) {
                    $data[] = $value;
                }
                echo json_encode($data);
            } else {
                echo json_encode($status);
            }
        }
    }
    public function fetch_comment()
    {
        $status = false;
       
            if (isset($_POST['id_p'])) {
                $id = $_POST['id_p'];
            }
            if (isset($_POST['page'])) {
                $page = $_POST['page'];
            }
            $cm = new comment_model();
            $lm = new reply_model();
            $this->comment = $cm->allp('comments.*', [
                'conditions' => 'product_id = ' . $id,
                'joins' => ['product', 'user'],
                'pagination' => [
                    'page'=>$page,
                    'nopp' => 5
                ],
                'order' => 'id DESC'
            ]);
            $data['comment'] = $this->comment['data'];
            $data['norecords'] = $this->comment['norecords'];
            $data['nocurp'] = $this->comment['nocurp'];
            $data['curp'] = $this->comment['curp'];
            $data['nopp'] = $this->comment['nopp'];
            foreach($this->comment['data'] as $comment) {
                $this->reply = $lm->getAllRecords('replies.*', [
                    'conditions' => 'replies.product_id = ' . $id. ' AND replies.comment_id ='. $comment['id'],
                    'joins' => ['product', 'user'],
                    'order' => 'id DESC'
                ]);
                foreach($this->reply as $reply) {
                    $data['replies'][]=$reply;
                }
            }
            echo json_encode($data);
    }
    public function fetch_rating()
    {
        $status = false;

        if (isset($_POST['id_p'])) {
            $id = $_POST['id_p'];
        }
        if (isset($_POST['page'])) {
            $page = $_POST['page'];
        }
        $rm = new rate_model();
        $this->rates = $rm->allp('rates.*', [
            'conditions' => 'product_id = ' . $id,
            'joins' => ['product', 'user'],
            'pagination' => [
                'page' => $page,
                'nopp' => 5
            ],
            'order' => 'id DESC'
        ]);
       
        echo json_encode($this->rates);
    }
    public function click() {
        if (isset($_POST['product_id'])) {
            $id = $_POST['product_id'];
            $pm = new product_model();
            $this->record = $pm->getRecord($id);
            $data['num_of_view'] = intval($this->record['num_of_view']) + 1;
            if ($pm->editRecord($id,  $data)) echo "Change status successful";
            else echo "error";
        }
    }
    
}
