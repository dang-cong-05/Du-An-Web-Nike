<?php

?>
<div class="modal-container" data-aos="fade-down">
    <div class="modal" id="modal">
        <button class="close-button" onclick="closeModal()"><i class="fa-solid fa-xmark"></i></button>
        <div class="form-container sign-up">
            <form action="index.php?action=register" method="POST">
                <h1>Create Account</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google"></i></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin"></i></a>
                </div>

                <span>or use your email for registration</span>
                <input type="text" placeholder="Name" name="username" />

                <input type="email" placeholder="Email" name="email" />

                <input type="password" placeholder="Password" name="password" />


                <button type="submit" name="signup">Register</button>
            </form>
        </div>

        <div class="form-container sign-in">
            <form action="index.php?action=login" method="POST">
                <h1>Log In</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google"></i></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin"></i></a>
                </div>
                <span>or use your account</span>
                <input type="email" placeholder="Email" name="email" />
                <input type="password" placeholder="Password" name="password" />
                <a href="#">Forgot your password?</a>
                <button type="submit" name="login">Log In</button>
            </form>
        </div>

        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-right">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your information to start shopping with us.</p>
                    <button class="ghost" id="register">Register</button>
                </div>
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>To continue shopping, Please log in with your personal information.</p>
                    <button class="hidden" id="signIn">Login</button>
                </div>
            </div>
        </div>
    </div>
</div>