<section class="vh-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 text-black">

                <div class="px-5 ms-xl-4">
                    <i class="fas fa-crow fa-2x me-3 pt-5 mt-xl-4" style="color: #709085;"></i>
                    <span class="h1 fw-bold mb-0"><img src="./res/img/logo.png"></span>
                </div>

        <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

          <form style="width: 23rem;" action="ins/post_signin.php" method="post" onsubmit="return check()" >

            <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Log in</h3>

            <div class="form-outline mb-4">
              <input type="email" id="form2Example18" class="form-control form-control-lg" />
              <label class="form-label" for="form2Example18">Email address</label>
            </div>

            <div class="form-outline mb-4">
              <input type="password" id="form2Example28" class="form-control form-control-lg" />
              <label class="form-label" for="form2Example28">Password</label>
            </div>

            <div class="pt-1 mb-4">
                <button type="submit" class="btn btn-warning butten" formaction="ins/post_signin.php">Log in</button>
            </div>
            <p class="small mb-5 pb-lg-2"><a class="text-primary nav-link <?= ($site == "Anzeige") ? "active" : "" ?>" href="?site=Anzeige"> Warum Login?</a></p>
            <p class="small mb-5 pb-lg-2"><a class="text-muted" href="#!">Forgot password?</a></p>
            <p>Don't have an account? </p>
            <a class="text-primary  nav-link <?= ($site == "account") ? "active" : "" ?>" href="?site=account" > Register here</a>
            

          </form>

        </div>

      </div>
      <div class="col-sm-6 px-0 d-none d-sm-block">
        <img src="./res/img/login_bild.jpg"
          alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
      </div>
    </div>
  </div>
</section>
    <script>
        //检查用户名和密码是否有效
        //Prüfen Sie, ob der Benutzername und das Passwort gültig sind
        function check() {
            let Username = document.getElementsByName('Username')[0].value.trim();
            let Password = document.getElementsByName('Password')[0].value.trim();
            //验证输入数据
            let UsernameReg = /^[a-zA-Z0-9]{3,10}$/;
            if (!UsernameReg.test(Username)) {
                alert('Illegal characters in username or password ! ! !');
                return false;
            }
            let PasswordReg = /^[a-zA-Z0-9_*]{6,10}$/;
            if (!PasswordReg.test(Password)) {
                alert('Illegal characters in username or password ! ! !');
                return false;
            }
            return ture;
        }
    </script>
