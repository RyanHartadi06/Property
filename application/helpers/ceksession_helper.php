<?php 
function belumlogin(){
    $check = get_instance();
    if(!$check->session->userdata('nama_pengguna')){
        redirect("Auth");
    }
}
?>