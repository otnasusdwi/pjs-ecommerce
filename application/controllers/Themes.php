<?php
class Themes extends CI_Controller
{
    public function switch($slug = '')
    {
        if (!empty($slug) && is_dir("assets/front_end/$slug")) {
            // echo "Theme exists";
            $this->session->set_userdata('theme', $slug);
            
            // $theme = fetch_details('themes' , ['slug' => $slug], 'name');  
            // print_r($theme);
            // die;
            // if($slug == 'modern'){
            //     $this->db->where('slug', $theme[0]['name'])->set(['status' => '1'])->update('themes');
            //     $this->db->where('slug', 'classic')->set(['status' => '0'])->update('themes');
            // }
            // if($slug == 'classic'){
            //     $this->db->where('slug', $theme[0]['name'])->set(['status' => '1'])->update('themes');
            //     $this->db->where('slug', 'modern')->set(['status' => '0'])->update('themes');
            // }
        }
        redirect(base_url());
    }
}
