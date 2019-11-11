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
}
