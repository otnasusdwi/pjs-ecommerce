<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Test extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }
    public function  index()
    {
        $product_id = '35,15';
        $data =  is_exist_in_current_flash_sale($product_id);

        if ($data) {
            echo "123";
            return;
        } else {
            echo "13";
            return;
        }
    }
    public function hello(){
        echo "hello meet";
    }
}
