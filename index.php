<?php
header("X-XSS-Protection: 0");
?>
<?php
$value = 'MYPASSWORDISUNCRACKABLE';
setcookie("Innocentguy", $value);
?>
<html>
<head>
    <title>XSS</title>
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <?php include('bower_includes.html') ?>
</head>
<body>
<div class="row">
    <div class="jumbotron text-center">
        <h1>GOOGLE CODE IN XSS TESTING</h1>
        <h2>The Website is all yours, Do whatever you wantt to! NO Restrictions</h2>
    </div>
</div>
<form method="get" action="xss.php">
    <div class="row text-center">
        <div class="col-md-12">
            <input type="text" name="vulnerability">
            <input type="submit" value="Submit">
        </div>

    </div>
</form>
</body>
</html>