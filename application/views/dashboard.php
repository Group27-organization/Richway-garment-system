<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
</head>
<body>
<h1>You are logged in.</h1>

<?php if($this->getSession('userId')): ?>
    <ul><a href="<?php echo BASEURL; ?>/dashboardController/logout">Logout</a></ul>
<?php endif; ?>

</body>
</html>