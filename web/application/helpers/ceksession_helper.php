<?php
function belumlogin()
{
    $check = get_instance();
    if (!$check->session->userdata('id_user')) {
        redirect("Login");
    }
}
