<?php
require('../bdd.php');
setUserUnvalid($_GET['id']);
header('Location: admin.php');
