<?php
class wishlist_model extends vendor_pagination_model
{
    public $nopp = 10;
    protected $relationships = [
        'belongTo' => [
            ['product', 'key' => 'product_id'],
            ['user', 'key' => 'user_id']
           
        ]
    ];
    public function rules()
    {
        global $app;
        return [
           
        ];
    }
    public function delALlWishlist()
    {
        $sql = "DELETE FROM wishlists WHERE user_id = ".$_SESSION['user']['id'];
        if ($this->con->query($sql)) {
            return true;
        } else {
            return false;
        }
    }
}
