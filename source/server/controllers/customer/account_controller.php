<?php
class account_controller extends vendor_main_controller
{
    protected  $errors = false;
	public function index() 
	{
        global $app;
        if (!isset($_SESSION['user'])) {
            header("Location: " . vendor_app_util::url(array('area' => '', 'ctl' => 'login')));
        } else {
            $order = new order_model();
            $this->noorder = $order->getCountRecords(['conditions' => 'orders.user_id =' . $_SESSION['user']['id']]);
            $this->recordsorder = $order->allp('*', [
                'conditions' => 'orders.user_id =' . $_SESSION['user']['id'],
                'joins' => false,
                'pagination' => [
                    'page' => 1,
                    'nopp' => 5
                ],
                'order' => 'id DESC'
            ]);
            $this->display();
        }
		
    }
    public function edit()
    {
        global $app;
        if (!isset($_SESSION['user'])) {
            header("Location: " . vendor_app_util::url(array('area' => '', 'ctl' => 'login')));
        } else {
            $id = $_SESSION['user']['id'];
            $um = new user_model();
            $this->record = $um->getRecord($id);
            if (isset($_POST['btn_submit'])) {
                $userData = $_POST['user'];
                if ($_FILES['image']['tmp_name']) {
                    if ($this->record['avata'] && file_exists(RootURI . "/media/upload/" . $this->controller . '/' . $this->record['avata']))
                        unlink(RootURI . "/media/upload/" . $this->controller . '/' . $this->record['avata']);
                    $userData['avata'] = vendor_app_util::uploadImg($_FILES);
                }
                $valid = $um->validator($userData, $id);
                if ($valid['status']) {
                    if (isset($_POST['change_password']) && $_POST['change_password'] == 'on') {
                        if ($_POST['new_password'] !== $_POST['confirmation_password']) {
                            $this->errors = ['pass_confirm' => 'Password not match!'];
                        } else {
                            $userData['password'] = vendor_app_util::generatePassword($_POST['new_password']);
                        }
                    } else {
                        $userData['password'] = vendor_app_util::generatePassword($userData['password']);
                    }
                    if ($um->editRecord($id, $userData)) {
                        header("Location: " . vendor_app_util::url(array('area' => 'customer', 'ctl' => 'account')));
                    } else {
                        $this->errors = ['database' => 'An error occurred when editing data!'];
                        $this->record = $userData;
                    }
                } else {
                    $this->errors = $um::convertErrorMessage($valid['message']);
                    $this->record = $userData;
                    $this->record['id'] = $id;
                }
            }
            $this->display();
        }
       
       
    }
    public function address()
    {
        global $app;
        if (!isset($_SESSION['user'])) {
            header("Location: " . vendor_app_util::url(array('area' => '', 'ctl' => 'login')));
        } else {
            $id = $_SESSION['user']['id'];
             if(isset($_POST['btn_submit'])) { 
                    $address = [$_POST['street'],$_POST['province'],$_POST['city'],$_POST['country'],$_POST['postcode']];
                    $um = new user_model();
                    $userData = $_POST['user'];
                    $userData['address'] = implode(",", $address);
                     $valid = $um->validator($userData, $id);
                    if ($valid['status']) {
                        
                        if ($um->editRecord($id, $userData)) {
                            $um = new user_model();
                            $um->editRecord(
                                $id,
                                [
                                    'remember_token' 	=> '',
                                ]
                            );

                            session_unset(); 
                            session_destroy(); 
                            $time = 3600;
                            unset($_COOKIE['remember_token']);
                            setcookie('remember_token', '', time() - $time, '/');
                            
                            header( "Location: ".vendor_app_util::url(array('area' => '', 'ctl'=>'login')));
                        } else {
                            $this->errors = ['database' => 'An error occurred when editing data!'];
                            $this->record = $userData;
                        }
                    } else {
                        $this->errors = $um::convertErrorMessage($valid['message']);
                        $this->record = $userData;
                        $this->record['id'] = $id;
                    }
                    //  exit(json_encode($userData));
              }
           
           
            $this->display();
        }
    }
}
?>