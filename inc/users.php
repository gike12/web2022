<?php
    $result = mysqli_query($con, "SELECT * FROM user");
    while($row=mysqli_fetch_assoc($result))
    {
        print "$row[id] - $row[email] - $row[utolso_belepes]
        <a href=index.php?oldal=user_torol&id=$row[id]> Töröl </a>
        <a href=index.php?oldal=user_modosit&id=$row[id]>Módosít</a><br>";
    }