<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head(); ?>
</head>
<body>
<div class="user-popup">
    <div class="popup-header">
        <div class="popup-title">User Details</div>
        <div class="popup-close">X</div>
    </div>
    <div class="popup-content"></div>
</div>
<table id="wpc-users" class="display">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Username</th>
        <th>Email</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    </tbody>
</table>
<?php wp_footer(); ?>
</body>
</html>