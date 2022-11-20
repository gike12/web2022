<?php
if (isset($_POST['ment'])) {
    //ellentorzes
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $pwd2 = $_POST['pwd2'];
    $jog = $_POST['jog'];
    $id = $_POST['id'];
    $same_email_resoult = mysqli_query($con, "SELECT * FROM user WHERE email='$email' AND NOT id='$id'");

    if (mysqli_num_rows($same_email_resoult) > 0) {
        print("<h1>A megadott e-mail cím már használatban van.</h1>");
        ugras("index.php?oldal=user_modosit&id=$id", 1000);
        return false;
    }

    if ($pwd == $pwd2) {
        print "<h1>Sikeresen módosítva.</h1>";
        mysqli_query($con, "UPDATE user SET email= '$email', password= '$pwd', jog= '$jog',utolso_belepes = now() WHERE id= '$id'");
        ugras('index.php?oldal=users', 1000);
    } else {
        print '<h1>A megadott két jelszó nem egyezik.</h1>';
        ugras("index.php?oldal=user_modosit&id=$_GET[id]", 1000);
    }
} else {

    //urlap
    $result = mysqli_query($con, "SELECT * FROM user WHERE id='$_GET[id]'");

    $row = mysqli_fetch_assoc($result);
?>
<div class="page-heading">
    <h1>Módosítás</h1>
    <!--<span class="subheading">Add meg az adataidat vagy <a href="index.php?oldal=reg">regisztrálj!</a></span>-->
</div>
</div>
</div>
</div>
</header>
<!-- Main Content-->
<main class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="my-5">
                    <form id="contactForm" action="index.php?oldal=user_modosit" method="POST">
                        <!--data-sb-form-api-token="API_TOKEN"-->
                        <input hidden name="id" value="<?php print $_GET['id']; ?>">
                        <div class="form-floating">
                            <input class="form-control" id="email" name="email" value=<?php print $row['email']; ?>
                                type="text" placeholder="E-mail" data-sb-validations="required" />
                            <label for="name">Email</label>
                        </div>
                        <div class="form-floating">
                            <input class="form-control" id="pwd" name="pwd" value=<?php print $row['password']; ?>
                                type="password" placeholder="password" data-sb-validations="required" />
                            <label for="name">Jelszó</label>
                        </div>
                        <div class="form-floating">
                            <input class="form-control" id="pwd2" name="pwd2" value=<?php print $row['password']; ?>
                                type="password" placeholder="password" data-sb-validations="required" />
                            <label for="name">Jelszó ismét</label>
                        </div> <br>


                        <select class="form-control" id="jog" name="jog">
                            <option value="0">Válassz...</option>
                            <?php
                                $result = mysqli_query($con, "SELECT * FROM jogosultsagok");
                                while ($row2 = mysqli_fetch_assoc($result)) {
                                ?>
                            <option value=<?php print $row2['id']; ?>
                                <?php if ($row['jog'] == $row2['id']) print 'selected'; ?>>
                                <?php print $row2['megnevezes']; ?></option>
                            <?php
                                }
                                ?>
                        </select>

                        <br> <input class="btn btn-primary text-uppercase" type="submit" name="ment" value="Mentés">

                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
}

?>