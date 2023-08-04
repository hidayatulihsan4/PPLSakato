<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log extends CI_Controller {

	public function in(){
        $data = $this->input->post();

        if($this->Model_log->check_user($data['username'],md5($data['password']))){
            $temp = $this->Model_user->get_data_by_id($data['username']);
            
            $level = $this->Model_log->get_user_level($temp->level);
            if($level == 'customer'){
                $temp_customer = $this->Model_user_customer->get_data_by_username($data['username']);
                $data_session = array(
                    'id' => $temp_customer->id,
                    'username' => $temp->username,
                    'level' => $level,
                    'name' => $temp_customer->nama,
                    'alamat' => $temp_customer->alamat,
                    'nama_penanggung_jawab' => $temp_customer->nama_penanggung_jawab,
                    'telp' => $temp_customer->telp,
                    'provinsi' => $temp_customer->provinsi,
                    'kota' => $temp_customer->kota,
                    'kode_pos' => $temp_customer->kode_pos,
                );
                $this->session->set_userdata($data_session);

                $data_flash = array(
                    'is_message' => true,
                    'title' => 'Login',
                    'message' => "Login Customer ".$temp_customer->nama." Berhasil",
                );

                $this->session->set_flashdata($data_flash);
                redirect('main','refresh');
            }else{
                $temp_toko = $this->Model_user_toko->get_data_by_username($data['username']);
                $data_session = array(
                    'id' => $temp_toko->id,
                    'username' => $temp->username,
                    'name' => $temp_toko->nama,
                    'level' => $level,
                    'jabatan' => $temp_toko->jabatan
                );
                $this->session->set_userdata($data_session);

                $data_flash = array(
                    'is_message' => true,
                    'title' => 'Login',
                    'message' => "Login ".$temp_toko->jabatan." ".$temp_toko->nama." Berhasil",
                );

                $this->session->set_flashdata($data_flash);
                redirect('dashboard','refresh');
            }
        }else{
            
            $data_flash = array(
                'is_message' => true,
                'title' => 'Login',
                'message' => "Login Gagal",
            );

            $this->session->set_flashdata($data_flash);
            redirect('main/login','refresh');
        }
    }

    public function out(){
        $this->session->sess_destroy();
        redirect('main/login','refresh');
    }

    public function regis(){
        $data = $this->input->post();

        if(count($this->Model_user->get_data_by_field('username', $data['username'])) > 0){
            echo " <script> alert('Username Sudah digunakan'); </script>";
            redirect('main/register','refresh');
            exit;
        }else{
            if($data['password'] == $data['konf_password']){
                
                $data_user['username'] = $data['username']; 
                $data_user['password'] = md5($data['password']); 
                $data_user['level'] = 1;
                
                $data_customer['username'] = $data['username'];
                $data_customer['nama'] = $data['nama'];
                $data_customer['alamat'] = $data['alamat'];
                $data_customer['nama_penanggung_jawab'] = $data['nama_penanggung_jawab'];
                $data_customer['telp'] = $data['telp'];
                $data_customer['provinsi'] = $data['provinsi'];
                $data_customer['kota'] = $data['kota'];
                $data_customer['kode_pos'] = $data['kode_pos'];

                try {
                    $this->Model_user->add($data_user);
                    $this->Model_user_customer->add($data_customer);

                    $data_flash = array(
                        'is_message' => true,
                        'title' => 'Register',
                        'message' => "Pendaftaran Berhasil",
                    );

                    $this->session->set_flashdata($data_flash);
                    redirect('main/login','refresh');
                } catch (\Throwable $th) {
                    $data_flash = array(
                        'is_message' => true,
                        'title' => 'Register',
                        'message' => "Pendaftaran Gagal",
                    );
        
                    $this->session->set_flashdata($data_flash);
                    redirect('main/register','refresh');
                }
            }else{
                
                $data_flash = array(
                    'is_message' => true,
                    'title' => 'Register',
                    'message' => "Password dan Konfirmasi Password harus sama",
                );
    
                $this->session->set_flashdata($data_flash);
                redirect('main/register','refresh');
                exit;
            }
        }
        
        $data_flash = array(
            'is_message' => true,
            'title' => 'Register',
            'message' => "Pendaftaran Gagal",
        );

        $this->session->set_flashdata($data_flash);
        redirect('main/register','refresh');
        exit;
    }

}
