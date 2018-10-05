<<!DOCTYPE html>
<html>
<head></head>
<body>
    <p>Dear <?php $username ?></p>
    <div>
        <label>Reset Password Link: </label><a href="<?php echo $resent_password_link ?>"><?php echo $resent_password_link ?></a>
    </div>
</body>
</html>