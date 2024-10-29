<?php
include_once("m_pdo.php");
function get_all_category(){
    return pdo_query("SELECT * FROM danhmuc");
}
?>