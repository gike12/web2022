<?php
    mysqli_query($con,"DELETE FROM user WHERE id='$_GET[id]'");
    ugras("index.php?oldal=users",1);