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
<div class="wrapper">
    <div class="page-header">
        <a href="<?php echo esc_url(site_url("users")); ?>">< All Users</a>
    </div>
    <div class="loading">Loading...</div>
    <div class="user-card" style="display: none">
        <div class="card-header">
            <h1 class="card-title user--name">User Name</h1>
            <div class="card-subtitle user--url">Website URL</div>
        </div>
        <div class="card-footer">
            <div class="card-details">
                <h3 class="details-title">Information</h3>
                <ul class="details-list">
                    <li><b>Phone:</b><span class="user--phone"></span></li>
                    <li><b>Email:</b><span class="user--email"></span></li>
                    <li><b>Username:</b><span class="user--username"></span></li>
                </ul>
            </div>
            <div class="card-details">
                <h3 class="details-title">Company</h3>
                <ul class="details-list">
                    <li><b class="user--company">Company Name</b></li>
                    <li><span class="user--company-detail"></span></li>
                </ul>
            </div>
            <div class="card-details">
                <h3 class="details-title">Address</h3>
                <ul class="details-list">
                    <li><b>Street:</b><span class="user--address-street"></span></li>
                    <li><b>Email:</b><span class="user--address-suite"></span></li>
                    <li><b>City:</b><span class="user--address-city"></span></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php wp_footer(); ?>
</body>
</html>