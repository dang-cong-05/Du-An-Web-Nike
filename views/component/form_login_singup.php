
<div class="modal-container" data-aos="fade-down">
        <div class="modal" id="modal">
          <button class="close-button" onclick="closeModal()"><i class="fa-solid fa-xmark"></i></button>
          <div class="form-container sign-up">
              <form action="" method="$_POST">
                  <h1>Create Account</h1>
                  <div class="social-icons">
                      <a href="#" class="icon"><i class="fa-brands fa-google"></i></i></a>
                      <a href="#" class="icon"><i class="fa-brands fa-facebook"></i></a>
                      <a href="#" class="icon"><i class="fa-brands fa-linkedin"></i></a>
                  </div>
  
                  <span>or use your email for registration</span>
                  <input type="text" placeholder="Name" name="username"/>
                  <input type="email" placeholder="Email" name="email"/>
                  <input type="password" placeholder="Password" name="password_hash" />
                  <button type="submit" name="signup">Sign Up</button>
              </form>
          </div>
    
          <div class="form-container sign-in">
              <form action="process_login.php" method="$_POST">
                  <h1>Log In</h1>
                  <div class="social-icons">
                      <a href="#" class="icon"><i class="fa-brands fa-google"></i></i></a>
                      <a href="#" class="icon"><i class="fa-brands fa-facebook"></i></a>
                      <a href="#" class="icon"><i class="fa-brands fa-linkedin"></i></a>
                  </div>
                  <span>or use your account</span>
                  <input type="email" placeholder="Email" name="email" />
                  <input type="password" placeholder="Password" name="password_hash" />
                  <a href="#">Forgot your password?</a>
                  <button type="submit" name="login">Log In</button>
              </form>
          </div>
  
          <div class="toggle-container">
              <div class="toggle">
                  <div class="toggle-panel toggle-right">
                      <h1>Welcome Back!</h1>
                      <p>To continue shopping, Please log in with your personal information.</p>
                      <button class="ghost" id="register">Sign In</button>
                  </div>
                  <div class="toggle-panel toggle-left">
                      <h1>Hello, Friend!</h1>
                      <p>Enter your information to start shopping with us.</p>
                      <button class="hidden" id="signIn">Sign Up</button>
                  </div>
              </div>
          </div>
        </div>
    </div>