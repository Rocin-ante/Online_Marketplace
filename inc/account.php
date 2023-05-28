<section class="h-100 bg-dark">
  <form action="backend/user/Register.inc.php" method="POST">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col">
          <div class="card card-registration my-4">
            <div class="row g-0">
              <div class="col-xl-6 d-none d-xl-block">
                <img src="./res/img/ahornhain.jpg"
                  alt="Sample photo" class="img-fluid"
                  style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
              </div>
            <div class="col-xl-6">
              <div class="card-body p-md-5 text-black">
                <h3 class="mb-5 text-uppercase">Register</h3>

                <div class="form-outline mb-4">
                    <input type="text" id="email"name="email"  class="form-control form-control-lg" required/>
                    <label class="form-label" for="email"name="email"   >E-Mail-Adresse</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" id="pwd" name="pwd" class="form-control form-control-lg" required />
                  <label class="form-label" for="pwd" name="pwd">Password</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" id="pwdRepeat" name="pwdRepeat" class="form-control form-control-lg" required />
                  <label class="form-label" for="pwdRepeat" name="pwdRepeat">Password repeat</label>
                </div>
                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <input type="text" id="first_name" name="first_name" class="form-control form-control-lg" maxlength="20" required />
                      <label class="form-label" for="first_name" name="first_name">First name</label>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <input type="text" id="last_name" name="last_name" class="form-control form-control-lg" required   />
                      <label class="form-label" for="last_name" name="last_name">Last name</label>
                    </div>
                  </div>
                </div>

                <div class="form-outline mb-4">
                  <input type="text" id="shipping_address" name="shipping_address" class="form-control form-control-lg" required />
                  <label class="form-label" for="shipping_address" name="shipping_address">shipping address</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="text" id="payment_method" name="payment_method" class="form-control form-control-lg" required />
                  <label class="form-label" for="payment_method" name="payment_method">payment method</label>
                </div>

                <div class="d-flex justify-content-end pt-3">
                  <button type="submit" name="submit" class="btn btn-warning btn-lg ms-2">Submit form</button>
                </div>

                <br>
                <?php
                if (isset($_GET["error"] )) {

                  if ($_GET["error"] == "Passworddonotmatch") {
                    echo "<h1 class='text-warning'>Password donot match!</h1>";
                  }
                  if($_GET["error"] == "stmtfailed"){
                    echo "<h1 class='text-warning'>Dieser Benutzername existiert bereits!</h1>";
                  }
                  elseif ($_GET["error"] == "none") {
                    echo "<h1 class='text-warning'>Erfolg!</h1>";
                  }
                }
                ?>
              </div>
              </div>
            </div>
         </div>
        </div>
      </div>
    </div>
    
  </form>
</section>