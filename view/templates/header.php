<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Examenplanning</title>
	<link rel="stylesheet" href="<?= URL ?>css/bootstrap-3.3.7.css">
	<link rel="stylesheet" href="<?= URL ?>css/style.css">
</head>
<body>
	<nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="<?= URL ?>home/index">Examenplanning</a>
            </div>

            <ul class="nav navbar-nav">
                <li><a href="<?= URL ?>home/index">Home</a></li>

                <?php if (isset($_SESSION['userdocent']) && $_SESSION['userdocent'] == '1') { ?>
                    <li><a href="<?= URL ?>user/all">Studenten</a></li>
                    <li><a href="<?= URL ?>planning/all">Alle geplande examens</a></li>
                <?php } ?>

                <?php if (isset($_SESSION['userdocent']) && $_SESSION['userdocent'] == '0') { ?>
                    <li><a href="<?= URL ?>planning/student">Mijn examens</a></li>
                <?php } ?>


            </ul>

            <!-- navbar part that's on the right side -->
            <ul class="nav navbar-nav navbar-right">
                <?php // show 'docent' if user has 'docent' property
                if (isset($_SESSION['userdocent']) && $_SESSION['userdocent'] == '1') { ?>
                    <li><a href="#"><span class="glyphicon glyphicon-education"></span> [docent]</a></li>
                <?php } ?>

                <?php // show 'login' link (if user not logged in) or 'logout' link (if user is logged in)
                if (isset($_SESSION['username'])) { ?>
                    <li><a href="<?= URL ?>user/logout"><span class="glyphicon glyphicon-user"></span> <?= ucwords($_SESSION['username']); ?> afmelden</a></li>
                <?php } else { ?>
                    <li><a href="<?= URL ?>user/login"><span class="glyphicon glyphicon-log-in"></span> Inloggen</a></li>
                <?php } ?>
            </ul>

        </div>
	</nav>

    <?php
        // if errors found, print them
        if (isset($_SESSION['errors']) && is_array($_SESSION['errors']) && sizeof($_SESSION['errors'])>0 ) {
            echo '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Fout!</strong> <ul>';
            foreach($_SESSION['errors'] as $error) {
                echo '<li>' . $error . '</li>';
            }
            echo '</ul></div>';

            // errors are shown. now remove them from session
            $_SESSION['errors'] = [];
        }
    ?>


    <?php
    // if info messages found, print them
    if (isset($_SESSION['info']) && is_array($_SESSION['info']) && sizeof($_SESSION['info'])>0 ) {
        echo '<div class="alert alert-success alert-dismissable" id="alert-success-1"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Gelukt!</strong> <ul>';
        foreach($_SESSION['info'] as $info) {
            echo '<li>' . $info . '</li>';
        }
        echo '</ul></div>';

        // errors are shown. now remove them from session
        $_SESSION['info'] = [];
    }
    ?>

