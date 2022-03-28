<h1>Đăng nhập</h1>
<?php 
    echo $mess = (isset($mess)) ? $mess : '';
    
?>
<form method='post' action='#'>
    <div class="form-group">
        <label for="name">Tên đăng nhập</label>
        <input type="text" class="form-control" id="name" placeholder="Enter a name" name="name">
    </div>

    <div class="form-group">
        <label for="password">Mật khẩu</label>
        <input type="password" class="form-control" id="description" placeholder="Enter a password" name="password">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>