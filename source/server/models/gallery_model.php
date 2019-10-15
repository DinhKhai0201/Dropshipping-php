<?php
class gallery_model extends vendor_pagination_model
{
    public $nopp = 10;
    public function rules()
    {
        global $app;
        return [
            'name' => ['required', 'unique', 'string', ['max', 'value' => 50]],
            'slug' => ['required', 'unique', 'string', ['max', 'value' => 50]],
        ];
    }

    // protected $relationships = [
    //     'belongTo' => [
    //         ['product', 'key' => 'product_id', 'on_del' => true],
    //     ],
    // ];
}
