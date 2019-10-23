<?php
class product_controller extends vendor_main_controller
{
    public function view($id)
    {
        global $app;
        $conditions = "";
        if (isset($app['prs']['id'])) {
            $id = $app['prs']['id'];
            $conditions .= (($conditions) ? " AND " : "") . " products.id=" . $id;
        }
        $product_model = new product_model();
        $this->products = $product_model->getAllRecords('*', [
            'conditions' => $id,
            // 'joins' => ['gallery', 'user'],
            'order' => 'id ASC',
            // 'get-child'=>true
        ]);
        $gallery_model = new gallery_model();
        $this->galleries = $gallery_model->getAllRecords('*', [
            'conditions' => $id,
            // 'joins' => ['gallery', 'user'],
            'order' => 'id ASC',
            // 'get-child'=>true
        ]);
        $this->display();
    }
}
