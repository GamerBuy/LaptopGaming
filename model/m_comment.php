<?php
include_once("m_pdo.php");
    function comment_add($MaSP, $MaTK, $content,$stars){
        pdo_execute("INSERT INTO binhluan(`MaSP`,`MaTK`,`NoiDung`,`SoSao`) VALUES (?,?,?,?)",$MaSP, $MaTK, $content, $stars);
    }
    function get_all_comment($id){
        return pdo_query("SELECT * FROM binhluan bl INNER JOIN taikhoan tk on bl.MaTK = tk.MaTK WHERE bl.MaSP = ?",$id);
    }
?>