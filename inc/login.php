<?php

    if(isset($_POST['login'])){
        //ellentorzes
        $email=$_POST['email'];
        $pwd=$_POST['pwd'];
        $result=mysqli_query($con,"SELECT * FROM user WHERE email='$email' and password='$pwd'");
        if(mysqli_num_rows($result) == 1) {
            print "<h1>Sikeres bejelentkezés</h1>";
           // mysqli_query($con,"UPDATE user SET utolso_belepes=now() WHERE email='$email' and password='$pwd'");

            $row=mysqli_fetch_assoc($result);
            mysqli_query($con,"UPDATE user SET utolso_belepes=now() WHERE id='$row[id]'");
            $_SESSION['login_id'] = $row['id'];
            $_SESSION['login_jog'] = $row['jog']; 
            ugras("index.php",1000);


        }
        else {
            print "<h1>Hibás email vagy jelszó.</h1>";
        }
    }
    else {
        //urlap
        ?>
<div class="page-heading">
    <h1>Bejelentkezés</h1>
    <span class="subheading">Add meg az adataidat vagy <a href="index.php?oldal=reg">regisztrálj!</a></span>
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
                    <form id="contactForm" action="index.php?oldal=login" method="POST">

                        <div class="form-floating">
                            <input class="form-control" id="email" name="email" type="text" placeholder="E-mail"
                                data-sb-validations="required" />
                            <label for="name">Email</label>
                            <div class="invalid-feedback" data-sb-feedback="name:required">
                                Email is required.</div>
                        </div>
                        <div class="form-floating">
                            <input class="form-control" id="pwd" name="pwd" type="password" placeholder="password"
                                data-sb-validations="required" />
                            <label for="name">Jelszó</label>
                            <div class="invalid-feedback" data-sb-feedback="name:required">
                                Password is required.</div>
                        </div>

                        <div class="d-none" id="submitErrorMessage">
                            <div class="text-center text-danger mb-3">Error sending message!</div>
                        </div><br>
                        <input class="btn btn-primary text-uppercase" type="submit" name="login" value="Bejelentkezés">

                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<?php    
}

?>