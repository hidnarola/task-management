<!DOCTYPE html>
<html>
<head></head>
<body>
    <p>Dear <?php echo $first_name ?>,</p>
    <div>
		<label>Portal Link: </label><a href="<?php echo $portal_link ?>"><?php echo $portal_link ?></a> <br>
		<label>email: </label><?php echo $email ?><br>
		<label>password: </label> <?php echo $password ?>
    </div>
</body>
</html>