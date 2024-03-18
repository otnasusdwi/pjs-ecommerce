<?php
defined('BASEPATH') or exit('No direct script access allowed');

class file_manager extends CI_Controller
{
    public function index()
    {
        $this->load->view('admin/file-manager');
    }

    public function test()
    {
        print_r("hello world");
    }
}
