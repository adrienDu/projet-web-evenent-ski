<?php
require('../bdd.php');
setUserValid($_GET['id']);
header('Location: admin.php');
