<?php
require_once("DBClass.php");
require_once("connect.php");
if (isset($_POST['id_office']))
{
    $data = $db->select('phones_tb', '*', 'id_office = :id', array(':id' => $_POST['id_office']));
} else{
    $data = $db->select('phones_tb', '*');
}
if(!$data){echo ("no phones");}else{ echo "yes phone";}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>phones_tb</title>
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
        <th>id_phone</th>
        <th>Phone</th>
        <th>Id_office</th>
    </tr>
    </thead>
    <form method="post" action="" name="form_more_chuse">
        <tbody>
        <?php foreach($data as $key=>$value): ?>
            <tr>
                <th><?php echo $value['id']; ?></th>
                <th><input type="number" name="phone" placeholder="Phone" value="<?php echo $value['phone']; ?>" required /></th>
                <th><?php echo $value['id_office']; ?></th>
                <th>
                    <input type="hidden" name="name_table"  value="phones_tb"  >
                    <input type="hidden"  name="id"   value="<?php echo $value['id']; ?>">
                    <input type="hidden" name="id_office" value="<?php echo $value['id_office']; ?>">

                    <button type="submit" name="update" value="phones_tb" onClick="changeFormActionUpdate()" ><strong>Update</strong></button>
                    <button type="submit" name="delete" value="DELETE" onClick="changeFormActionDelete()" ><strong>DELETE</strong></button>
                </th>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </form>
</table>

<form class="form add" id="form_company" method="post" action="insert.php">
    <div class="input_container"
    <label for="names_company">Address Phone <span class="required">*</span></label>
    <div class="field_container">
        <input type="number" class="text" name="phone"  required>
    </div>
    </div>
    <div class="input_container">
        <label for="url_site">Office: <span class="required">*</span></label>
        <div class="field_container">
            <select name="id_office" placeholder>
                <?php
                $data2=$db->select('office_tb','*');
                foreach($data2 as $key=>$value): ?>
                    <option type="text"  value="<?php echo $value['id_office']; ?>"> <?php echo $value['address']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <input type="hidden" value="phones_tb" name="name_table" >
    <input type="submit" value="Submit">
</form>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous">
<script>
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
