<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <title>Login and Registeration Form</title>
        <link rel="stylesheet" href="style.css">

    </head>
    <body>
        <div class="hero">
            <div class="form-box">
                <div class="button-box">
                    <div id="btn"></div>
                    <button type="button" class="toggle-btn" onclick="login()">Login</button>
                    <button type="button" class="toggle-btn" onclick="signup()">Sign Up</button>
                </div>
                <form id="login" class="input-group">
                    <input type="text" class="input-field" placeholder="Username" required>
                    <input type="text" class="input-field" placeholder="Enter password" required>
                    <input type="checkbox" class="check-box"><span>Remember password</span>
                    <button type="submit" class="submit-btn">Login</button>
                </form>
                <form id="signup" class="input-group">
                    <input type="text" class="input-field" placeholder="Username" required>
                    <input type="email" class="input-field" placeholder="Email" required>
                    <input type="text" class="input-field" placeholder="Enter password" required>
                    <input type="checkbox" class="check-box"><span>I agree to the terms & conditions</span>
                    <button type="submit" class="submit-btn">Sign Up</button>
                </form>
            </div>
        </div>
        <script>
            var x= document.getElementById("login");
            var y= document.getElementById("signup");
            var z= document.getElementById("btn");

            function signup(){
                x.style.left= "-400px";
                y.style.left= "50px";
                z.style.left= "110px";
            }
            function login(){
                x.style.left= "50px";
                y.style.left= "450px";
                z.style.left= "0";
            }
            
         
         

        </script>
    </body>
</html>

