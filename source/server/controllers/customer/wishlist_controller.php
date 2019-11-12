<?php
class wishlist_controller extends vendor_main_controller
{
    public function index()
    {
        global $app;
        if (!isset($_SESSION['user'])) {
            header("Location: " . vendor_app_util::url(array('area' => '', 'ctl' => 'login')));
        } else {
            $wishlist = new wishlist_model();
            $this->nowishlist = $wishlist->getCountRecords();
            $this->products = $wishlist->getAllRecords('wishlists.*', [
                'conditions' => 'wishlists.user_id =' . $_SESSION['user']['id'],
                'joins' => ['product', 'user']
            ]);
            $this->display();
        }
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
        $wishData['image'] = $_POST['image'];

        $wm = new wishlist_model();
        $valid = $wm->validator($wishData);
        if ($valid['status']) {
            if ($wm->addRecord($wishData)) {
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
    public  function removewishlist()
    {
        global $app;
        if (isset($_SESSION['user'])) {
            $id = $_POST['id'];
            $wishlist = new wishlist_model();
            $wishlist->delRelativeRecord($id);
            echo json_encode($id);
        }
    }
    
    public function removewishlistmany()
    {
        $status = false;
        if (isset($_SESSION['user'])) {
            $wishlist = new wishlist_model();
            if($wishlist->delALlWishlist()) {
                $status = true;
            } 
            echo json_encode($status);
        }
    }
    public function oneWishlistToCart()
    {
        $status = false;
        if (isset($_SESSION['user'])) {
            $wishlist = new wishlist_model();
            $cart = new cart_model();
            $id = $_POST['id'];
            $this->record = $wishlist->getRecord($id);
            if ($this->record) {
                $data = $this->record;
                $cartData['product_id'] = $data['product_id'];
                $cartData['user_id'] = $_SESSION['user']['id'];
                $cartData['quantity'] = $data['quantity'];
                $cartData['color'] = $data['color'];
                $cartData['size'] = $data['size'];
                $cartData['price'] = $data['price'];
                $cartData['image'] = $data['image'];
            }
            $valid = $cart->validator($cartData);
            if ($valid['status']) {
                if ($res = $cart->addRecord($cartData)) {
                    $status = true;
                    $cartData['id'] = $res;
                }
            }
            if ($status ==true) {
                echo json_encode($cartData);
            } else {
                echo json_encode($status);
            }
            
        }
    }
    public function allWishlistToCart()
    {
        $status = false;
        if (isset($_SESSION['user'])) {
            $wishlist = new wishlist_model();
            $cart = new cart_model();
            $iduser = $_SESSION['user']['id'];
            $this->data = $wishlist->getAllRecords('wishlists.*', [
                'conditions' => 'wishlists.user_id =' . $iduser,
                'joins' => ''
            ]);
            foreach ($this->data as $key => $value) {
                $data = $value;
                $cartData['product_id'] = $data['product_id'];
                $cartData['user_id'] = $_SESSION['user']['id'];
                $cartData['quantity'] = $data['quantity'];
                $cartData['color'] = $data['color'];
                $cartData['size'] = $data['size'];
                $cartData['price'] = $data['price'];
                $cartData['image'] = $data['image'];
                $valid = $cart->validator($cartData);
                if ($valid['status']) {
                    if ($cart->addRecord($cartData)) {
                        $status = true;
                    }
                }
            }
            echo json_encode($status);
        }
    } 
}
