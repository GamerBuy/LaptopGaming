<?php
// diều hướng đến các controller
include_once 'config.php';
if (isset($_GET['mod'])) {
    switch ($_GET['mod']) {
        case 'page':
            $ctrl_name = 'page';
            break;
        case 'product':
            $ctrl_name = 'product';
            break;
        case 'user':
            $ctrl_name = 'user';
            break;
        case 'category':
            $ctrl_name = 'category';
            break;
        case 'admin':
            $ctrl_name = 'admin';
            break;
        default:

            break;
    }
    include_once 'controller/c_' . $ctrl_name . '.php';
} else {
    header('location: index.php?mod=page&act=home');
}
