<?php
require_once("DBClass.php");
require_once("connect.php");

    $data = $db->select('companytb', '*');
?>
<!doctype html>
<html lang="en">

<meta charset="UTF-8">
<meta name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Document</title>

<link rel="stylesheet" href="style.css" type="text/css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

</head>
<body>

<ul class="navbar-nav mr-auto">
    <li  class="disabled"><a href="index.php">company</a></li>
    <li  class="disabled"><a href="secect_office.php">office </a></li>
    <li  class="disabled"><a href="seclect_phone.php">phones</a></li>
    <li  class="disabled"><a href="seclect_peaple.php">people</a></li>
</ul>

<table class="datatable" id="table_companies">
    <thead>
    <tr>

        <th>id company</th>
        <th>Names off company</th>
        <th>Date creation</th>
        <th>Deescription off activities:</th>
        <th>Url</th>
        <th>Ofiice</th>
    </tr>
    </thead>
    <form method="post" name="form_more_chuse"  action="">
        <tbody>
        <?php foreach($data as $key=>$value): ?>
            <tr>
                <th> <input  type="text" name="id_company" value="<?php echo $value['id_company']; ?>"></th>

                <th><input type="text" name="names_company" placeholder="Names off company" value="<?php echo $value['name_company']; ?>" required /></th>
                <th><input type="text" name="date_creation" placeholder="Names off company" value="<?php echo $value['date']; ?>" </th>
                <th><input type="text" name="description_activities" placeholder="Deescription" value="<?php echo $value['descriptin']; ?>" required /></th>
                <th><input type="text" name="url_site" placeholder="Deescription" value="<?php echo $value['url']; ?>" required /></th>
                <th>
                    <input type="hidden" name="id_office" value="<?php echo $value['id_office']; ?>">

                    <input type="hidden" value="companytb" name="name_table" >


                    <button type="submit" name="abtn-Office" value="" onClick="changeFormActionSubmit()"><strong>Offices</strong></button></th><th>
                    <button type="submit"  value="" onClick="changeFormActionUpdate()" ><strong>Update</strong></button>
                    <button type="submit" name="delete" value="DELETE" onClick="changeFormActionDelete()" ><strong>DELETE</strong></button>
                </th>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </form>
</table>

<form  method="post" action="insert.php">
    <div class="input_container">
        <label for="names_company">Names  company <span class="required">*</span></label>

        <div class="field_container">
            <input type="text" class="text" name="names_company" id="names_company" value="" required>
        </div>
    </div>
    <div class="input_container">
        <label for="url_site">Url: <span class="required">*</span></label>

        <div class="field_container">
            <input type="text" min="0" class="text" name="url_site" id="url_site" value="" required>
        </div>
    </div>

    <div class="input_container">
        <label for="date_creation">Date creation<span class="required">*</span></label>

        <div class="field_container">
            <input type="date" min="0" class="text" name="date_creation" id="date_creation" value="" required>
        </div>
    </div>
    <div class="input_container">
        <label for="description_activities">Deescription activities: <span class="required">*</span></label>

        <div class="field_container">
            <input type="text" min="0" class="text" name="description_activities" id="description_activities" value=""
                   required>
        </div>
    </div>
    <input type="hidden" value="companytb" name="name_table" >
    <input type="submit" value="Submit">



</form>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<script>
    function changeFormActionSubmit()
    {
        document.forms.form_more_chuse.action = 'secect_office.php';
    }
    function changeFormActionUpdate()
    {
        document.forms.form_more_chuse.action = 'update.php';
    }
    function changeFormActionDelete()
    {
        document.forms.form_more_chuse.action = 'delete.php';
    }
</script>

</body>
</html>
