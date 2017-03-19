<?php
require_once("DBClass.php");
require_once("connect.php");
switch($_POST['name_table']){
    case "companytb":
        $tablename = $_POST['name_table'];
        $id_in_table="id_company";
        $id=$_POST['id_company'];
        $location='index.php';
        break;
    case "office_tb":
//        id_office
        $tablename = $_POST['name_table'];
        $id_in_table="id_office";
        $id=$_POST['id_office'];
        $location='secect_office.php';
        break;
    case "persons_tb":
        $tablename = $_POST['name_table'];
        $id_in_table="id_person";
        $id=$_POST['id_person'];
        $location='seclect_peaple.php';
        break;

    case "phones_tb":
        $tablename = $_POST['name_table'];
        $id_in_table="id";
        $id=$_POST['id'];
        $location='seclect_phone.php';
        break;
}
$db->delete($tablename, $id_in_table.'=:id', array(':id' =>$id));
unset($tablename);
unset($id_in_table);
unset($id);
header('Location:'.$location);