<?php
class register_controller extends vendor_main_controller
{
    protected $errors = false;
    public function index()
    {
        global $app;
        if (isset($_POST['btn_submit'])) {
            $um = new user_model();
            $userData = $_POST['user'];
            $userData['status'] = 0;
            // exit($userData);
            $valid = $um->validator($userData);
            if ($valid['status']) {
                $userData['password'] = vendor_app_util::generatePassword($userData['password']);
                unset($userData['password_confirm']);

                if ($um->addRecord($userData)) {
                    $email = $userData['email'];
                    $fgpm = new forgotpass_model();
                    if ($fgpm->checkOldEmail($email)) {
                        $tokenRemember = time() . rand(10000, 99999);
                        $fgpm->addRememberToken($tokenRemember, $email);

                        $mTo = $email;
                        $title = 'XÁC THỰC TÀI KHOẢN';
                        $href = RootABS .
                            vendor_app_util::url([
                                'ctl' => 'register',
                                'act' => 'activeAccount',
                                'params' => ['remember_active_token' => $tokenRemember]
                            ]);
                        $content = "
                                        <div style='padding: 0 100px;'>
                                            <div style='padding: 0 20px;border: 1px #ccc solid;border-radius: 4px;'>
                                                <p>Xin chào <strong>" . $userData['lastname'] . " " . $userData['firstname'] . "</strong>,</p>
                                                <p>Bạn đã đăng ký thành công tài khoản Người Tìm Việc tại <a target='_blank' href='https://dropshipping.vn/'>dropshipping.vn</a></p>
                                                <p>Dưới đây thông tin đã được tạo :</p>
                                                <p>- Tài khoản : " . $userData['email'] . "</p>
                                                <p>- Mật khẩu : ********</p>
                                              
                                                <p style='width:100%;text-align: center;'><a style='padding:15px; display: inline-block;border-radius: 4px;background: #2980b9; color:#fff;text-decoration: none;font-weight: 600;' target='_blank' href='" . $href . "'>XÁC THỰC TÀI KHOẢN</a></p>
                                                <p style='display: inline-block;'><strong>Bạn gặp khó khăn? Liên hệ Hotline hỗ trợ Người tìm việc: 02363.663.688</strong></p>
                                            </div>
                                        </div>
                                        ";
                        $nTo = 'Việc làm Đà Nẵng';
                        vendor_app_util::sendMail($title, $content, $nTo, $mTo);
                        $this->errors = 'Sign up successfully. Please check your email to activate  your account.';
                    }
                } 
                else {
                    $this->errors = 'An error occurred when inserting data!';
                    $this->record = $userData;
                }
            } else {
                 $this->errors = 'Invalid';
                $this->record = $userData;
            }
        }
        $this->display();
    }
    public function activeAccount()
    {
        global $app;
        $tokenActive = $app['prs']['remember_active_token'];
        $um = new user_model();
        $result = $um->getRecordWhere([
            'remember_active_token' => $tokenActive,
        ]);
        if ($result) {
            $data['status'] = 1;
            $um->editRecord($result['id'], $data);
        } else {
            $this->errors['message'] = "The token does not exist. Please try again!";
        }

        header("Location: " . vendor_app_util::url(['area'=>'','ctl' => '']));
    }
}