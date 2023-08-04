<?php
    $this->load->view('template/header');
    $this->load->view('template/sidenav_'.$user_level);
    $this->load->view($user_level.'/'.$content);
    $this->load->view('template/footer');
?>