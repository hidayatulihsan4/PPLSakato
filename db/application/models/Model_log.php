<?php

class Model_log extends CI_Model {

    function get_user_level($level){
      switch($level){
        case 1:
          return 'customer';
          break;
        case 2:
          return 'kurir';
          break;
        case 3:
          return 'operator';
          break;
        case 4:
          return 'pemilik';
          break;
        case 5:
          return 'admin';
          break;
        default:
          break;
      }
      return '';
    }

    function check_user($id, $pass){
      $this->db->where('username', $id);
      $this->db->where('password', $pass);
      $this->db->from('user');
      return $this->db->count_all_results();
  }
    

}