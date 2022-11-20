<?php
    $result = mysqli_query($con, "SELECT * FROM jogosultsagok");
    if (mysqli_num_rows($result) < 10) {
        print  '<a href="index.php?oldal=jog_hozzaad">Jogosultság hozzáadása</a><br><br>';
    }
    print_r($_POST);
    if (isset($_POST['modosit'])) {

     }
    
   
    while($row=mysqli_fetch_assoc($result))
    {
      ?>
      <form action="index.php?oldal=jogosultsagok" method="POST">
        <input type="text" hidden name="id" value="<?php print $row['id']?>">
        <input type="text", style='width:5%'> <input type="text">
        <input type="submit" name='torol' value="Töröl">
        <input type="submit" value="Módosít"<br> 
       </form>
       <?php
    }
   
?>

