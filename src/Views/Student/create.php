<h1>Create new student</h1>
<form method='post' action='#'>
    <div class="form-group">
        <label for="title">NAME</label>
        <input type="text" class="form-control" id="name" placeholder="Enter a name" name="name">
    </div>

    <div class="form-group">
        <label for="description">BIRTHDAY</label>
        <input type="text" class="form-control" id="birthday" placeholder="Enter a birthday" name="birthday">
    </div>
    <div class="form-group">
        <label for="description">GENDER</label>

        <select name="gender" id="gender" class="form-control" required="required">
            <option value="1">Male</option>
            <option value="0">Female</option>
        </select>

    </div>
    <div class="form-group">
        <label for="description">ADDRESS</label>
        <input type="text" class="form-control" id="address" placeholder="Enter a address" name="address">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>