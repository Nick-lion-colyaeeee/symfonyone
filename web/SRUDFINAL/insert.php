<?php
require_once("DBClass.php");
require_once("connect.php");
$location='#';
switch($_POST['name_table']){
    case "companytb":
        $tablename = $_POST['name_table'];

        $data = array(
            'url' => $_POST['url_site'],
            'name_company' => $_POST['name_company'],
            'date' => $_POST['date_creation'],
            'descriptin' => $_POST['description_activities']
        );
        $location='index.php';
        break;
    case "office_tb":
        $tablename = $_POST['name_table'];
        $data = array(
            'address' => $_POST['address'],
            'id_company' => $_POST['id_company']
        );
        $location='secect_office.php';
        break;
    case "persons_tb":
        $tablename = $_POST['name_table'];
        $data = array(
            'name_person' => $_POST['name_person'],
            'id_office' => $_POST['id_office']
        );
        $location='seclect_peaple.php';
        break;

    case "phones_tb":
        $tablename = $_POST['name_table'];
        $data = array(
            'phone' => $_POST['phone'],
            'id_office' => $_POST['id_office']
        );
        $location='seclect_phone.php';
        break;
}
$db->insert($tablename, $data);

header('Location:'.$location);
?>