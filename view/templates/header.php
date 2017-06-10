<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Studenten app</title>	
	<link rel="stylesheet" href="<?= URL ?>css/bootstrap-3.3.7.css">
	<link rel="stylesheet" href="<?= URL ?>css/style.css">
</head>
<body>
	<nav>
	<ul>
        <?php // show 'login' link (if user not logged in) or 'logout' link (if user is logged in)
        if (isset($_SESSION['username'])) { ?>
            <li><a href="<?= URL ?>user/logout"><?= $_SESSION['username'] ?> afmelden</a></li>
        <?php } else { ?>
            <li><a href="<?= URL ?>user/login">Inloggen</a></li>
        <?php } ?>

		<li><a href="<?= URL ?>home/index">Home</a></li>
		<li><a href="<?= URL ?>student/index">Students</a></li>
	</ul>
	</nav>

    <?php
        // if errors found, print them
        if (isset($_SESSION['errors']) && is_array($_SESSION['errors']) && sizeof($_SESSION['errors'])>0 ) {
            echo '<div class="alert alert-danger"><strong>Fout!</strong> <ul>';
            foreach($_SESSION['errors'] as $error) {
                echo '<li>' . $error . '</li>';
            }
            echo '</ul></div>';

            // errors are shown. now remove them from session
            $_SESSION['errors'] = [];
        }
    ?>

