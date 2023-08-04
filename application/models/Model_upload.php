<?php

class Model_upload extends CI_Model {
    public function do_upload($loc){
        $config['upload_path'] = './images/'.$loc; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|GIF|JPG|PNG|JPEG|BMP'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //enkripsi nama file ketika di upload
        $config['file_size'] = 10000;
 
        $this->upload->initialize($config);
        if(!empty($_FILES['foto']['name'])){
            if ($this->upload->do_upload('foto')){
                $gbr = $this->upload->data();
                $config['image_library']='gd2';
                $config['source_image']='./images/'.$loc.'/'.$gbr['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= TRUE;
                $config['quality']= '100%';
                $config['new_image']= './images/'.$loc.'/'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $this->image = $gbr['file_name'];

                return $gbr['file_name'];
            }else{
                return $this->upload->display_errors();
                return 1;
            }
        }else{
            return 2;
            // return "File is not found!";
        }
    }
}