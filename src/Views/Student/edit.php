<h1>Edit student</h1>
<?php
$name = (!empty($student->getName())) ? $student->getName() : '';
$birthday = (!empty($student->getBirthday())) ? $student->getBirthday() : '';
$male = '';
$female = '';
if ($student->getGender() == 1) {
    $male = 'selected';
} else {
    $female = 'selected';
}
$address = (!empty($student->getAddress())) ? $student->getAddress() : '';
?>
<form method='post' action='#'>
    <div class="form-group">
        <label for="title">NAME</label>
        <input type="text" class="form-control" id="name" placeholder="Enter a name" value="<?php echo $name; ?>" name="name">
    </div>

    <div class="form-group">
        <label for="description">BIRTHDAY</label>
        <input type="text" class="form-control" id="birthday" placeholder="Enter a birthday" value="<?php echo $birthday; ?>" name="birthday">
    </div>
    <div class="form-group">
        <label for="description">GENDER</label>
        <select name="gender" id="gender" class="form-control" required="required">
            <option <?php echo $male; ?> value="1">Male</option>
            <option <?php echo $female; ?> value="0">Female</option>
        </select>

    </div>
    <div class="form-group">
        <label for="description">ADDRESS</label>
        <input type="text" class="form-control" id="address" placeholder="Enter a address" value="<?php echo $address; ?>" name="address">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>