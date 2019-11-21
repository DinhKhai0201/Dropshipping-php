<?php
class static_pages_controller extends vendor_main_controller
{
    public function index()
    {
       
        global $app;
        $title_slug['title_slug'] = $app['prs'][1];
        $im = new static_page_model();
        $this->record = $im->getRecordWhere($title_slug);
        if (isset($this->record) && $this->record != null) {
            $app['title'] = $this->record['title'];
            $this->display();
        } else {
            include "views/".$app['areaPath']."staticpages/error.php";
            exit();
        }
    }

    public function errorpage()
    {
        $this->display();
    }
    public function sendmailcontact() {
        if(isset($_POST['btn-submit'])) {
                $mTo = $_POST['email'];
				$title = '[EMAIL] GUIDE TO GET CONTACT';
			
				$content = "
					<div style='padding: 0 100px;'>
						<div style='padding: 0 20px;border: 1px #ccc solid;border-radius: 4px;'>
							<p>Xin chào <strong>" . $_POST['name'] . " " . $_POST['email'] . "</strong>,</p>
						</div>
					</div>
				";
				$nTo = 'User';
                if (vendor_app_util::sendMail($title, $content, $nTo, $mTo)) {
                    $this->errors = ['message' => '<a href="https://mail.google.com/mail">Thank! Check  your gmail to get contact !</a>'];
                     header("Location: " . vendor_app_util::url(['area'=>'','ctl' => 'static_pages','act'=>'index/contact-us']));
                }
				
				
        }
    }
}
?>