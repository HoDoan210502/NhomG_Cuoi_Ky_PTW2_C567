<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="{{asset('FE/css/log_reg.css')}}" />
    <title>Login_Register Page</title>
</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-up">
            <form>
                <h1>Create Account</h1>
                <br>
                <input type="text" placeholder="Name" maxlength="200">
                <input type="email" placeholder="Email" maxlength="200">
                <input type="password" placeholder="Password" maxlength="200">
                <button>Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form>
                <h1>Log In</h1>
                <br>
                <input type="email" placeholder="Email" maxlength="200" id="userEmail">
                <input type="password" placeholder="Password" maxlength="200" id="userPass">
                <a href="#">Forget Your Password?</a>
                <a href="{{URL::to('/')}}" class="Login_Button" id="loginButton">Log In</a>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores sed reiciendis unde mollitia?</p>
                    <button class="hidden" id="login">Log In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hello!!!</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis eaque mollitia sed a impedit quas ipsum nemo facere! Quae, assumenda.</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('FE/js/log_reg.js')}}"></script>
    
</body>

</html>