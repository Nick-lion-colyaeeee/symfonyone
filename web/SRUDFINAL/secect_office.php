<?php
require_once("DBClass.php");
require_once("connect.php");
if($_POST['id_company'])
{
    $data=$db->select('companytb','*','id_company = :id', array(':id' => $_POST['id_company']));
}
{
    $data = $db->select('office_tb', '*');
}
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
        <th>Address offices</th>
    </tr>
    </thead>
    <form method="post"  name="form_more_chuse">
        <tbody>
        <?php foreach($data as $key=>$value): ?>
            <tr>
                <th><input type="text" name="address" placeholder="Address offices" value="<?php echo $value['address']; ?>" required /></th>

                <th>
                    <input type="hidden" name="id_office" value="<?php echo $value['id_office']; ?>">
                    <input type="hidden" value="office_tb" name="name_table" >
                    <button type="submit" name="persons_tb" value="persons_tb" onClick="changeFormActionPeaple()"><strong>PEAPLE</strong></button>
                    <button type="submit" name="phones_tb" value="phones_tb" onClick="changeFormActionPhone()" ><strong>PHONE</strong></button>
                    <button type="submit" name="delete" value="DELETE" onClick="hangeFormActionDelete()" ><strong>DELETE</strong></button>
                </th>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </form>
</table>
<form class="form add" id="form_company" method="post" action="">
    <div class="input_container"
        <label for="names_company">Address offices <span class="required">*</span></label>

        <div class="field_container">
            <input type="text" class="text" name="address"  value="" required>
        </div>
    </div>
    <div class="input_container">
        <label for="url_site">Company: <span class="required">*</span></label>
        <div class="field_container">
            <select name="id_company" placeholder>
            <?php
            $data2=$db->select('companytb','*');
            foreach($data2 as $key=>$value): ?>
                <option type="text" value="<?php echo $value['id_company']; ?>"> <?php echo $value['name_company']; ?></option>
            <?php endforeach; ?>
            </select>
        </div>

    </div>
    <input type="hidden" value="office_tb" name="name_table" >
    <input type="submit" value="Submit">
</form>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous">
    </script>
<script>
    function changeFormActionPeaple()
    {
        document.forms.form_more_chuse.action = 'seclect_peaple.php';
    }
    function changeFormActionPhone()
    {
        document.forms.form_more_chuse.action = 'seclect_phone.php';
    }
    function changeFormActionDelete()
    {
        document.forms.form_more_chuse.action = 'delete.php';
    }
</script>
</body>
</html>
