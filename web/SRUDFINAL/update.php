<?php
require_once("DBClass.php");
require_once("connect.php");
switch($_POST['name_table']){
    case "companytb":
        $tablename = $_POST['name_table'];

        $data = array(
            'url' => $_POST['url_site'],
            'name_company' => $_POST['url_site'],
            'date' => $_POST['date_creation'],
            'descriptin' => $_POST['description_activities']
        );
        $id_in_table="id_company";
        $id=$_POST['id_company'];
        $location='index.php';
        break;
    case "office_tb":
        $tablename = $_POST['name_table'];
        $data = array(
            'address' => $_POST['address'],
        );
        $id_in_table="id_office";
        $id=$_POST['id_office'];
        $location='secect_office.php';
        break;
    case "persons_tb":
        $tablename = $_POST['name_table'];
        $data = array(
            'name_person' => $_POST['name_person'],
        );
        $id_in_table="id_person";
        $id=$_POST['id_person'];
        $location='seclect_peaple.php';
        break;

    case "phones_tb":
        $tablename = $_POST['name_table'];
        $data = array(
            'phone' => $_POST['phone'],
        );
        $id_in_table="id";
        $id=$_POST['id'];
        $location='seclect_phone.php';
        break;
}
var_dump($_POST);
$db->update($tablename,$data, $id_in_table.'=:id', array(':id' =>$id));
unset($tablename);
unset($data);
unset($id_in_table);
unset($id);
header('Location:'.$location);