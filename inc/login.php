<section class="vh-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 text-black">
                <div class="px-5 ms-xl-4">
                    <i class="fas fa-crow fa-2x me-3 pt-5 mt-xl-4 text-primary"></i>
                </div>

                <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">
                    <form style="width: 23rem;" action="backend/user/login.inc.php" method="POST" onsubmit="return check()">
                        <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Log in</h3>

                        <div class="form-outline mb-4">
                            <input type="email" name="email" id="email" class="form-control form-control-lg" />
                            <label class="form-label" for="email">Email address</label>
                        </div>

                        <div class="form-outline mb-4">
                            <input type="password" name="pwd" id="pwd" class="form-control form-control-lg" />
                            <label class="form-label" for="pwd">Password</label>
                        </div>

                        <div class="pt-1 mb-4">
                            <button type="submit" name="submit" class="btn btn-warning">Log in</button>
                        </div>
                        <p class="small mb-3"><a class="text-primary" href="?site=Anzeige">Warum Login?</a></p>
                        <p class="small mb-3"><a class="text-muted" href="#!">Forgot password?</a></p>
                        <p>Don't have an account? <a class="text-primary" href="?site=account">Register here</a></p>
                    </form>
                </div>
            </div>

            <div class="col-sm-6 px-0 d-none d-sm-block">
                <img src="./res/img/login_bild.jpg" alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
            </div>
        </div>
    </div>
</section>

<script>
    // Check if the username and password are valid
    function check() {
        let Username = document.getElementsByName('email')[0].value.trim();
        let Password = document.getElementsByName('pwd')[0].value.trim();

        // Validate input data
        let UsernameReg = /^[a-zA-Z0-9_\-]+@([a-z A-Z 0-9]+\.)+(com|cn|net|org|at)$/;
        if (!UsernameReg.test(Username)) {
            alert('Illegal characters in username or password!');
            return false;
        }

        let PasswordReg = /^[a-zA-Z0-9_*]{3,10}$/;
        if (!PasswordReg.test(Password)) {
            alert('Illegal characters in username or password!');
            return false;
        }

        return true;
    }
</script>
