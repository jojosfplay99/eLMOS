<?php

include 'assessor/db.php';

mysqli_query($con,"INSERT INTO user (name, user, password, designation, status) VALUES ('$_POST[name]','$_POST[username]','$_POST[password]','$_POST[select_designation]', 'PENDING')");





?>