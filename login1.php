<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link href="style.css" rel="stylesheet" type="text/css">


</head>
<style>
/* ***************************************** */

body {
    margin: 0;
    /* color: #6a6f8c; */
    background: #f5f5f5;
    font: 600 16px/18px 'Open Sans', sans-serif;
}

*,
:after,
:before {
    box-sizing: border-box
}

.clearfix:after,
.clearfix:before {
    content: '';
    display: table
}

.clearfix:after {
    clear: both;
    display: block
}

a {
    color: inherit;
    text-decoration: none
}

.login-wrap {
    width: 100%;
    margin: auto;
    max-width: 525px;
    min-height: 600px;
    margin-top: 30px;
    position: relative;
    /* background: url(https://p-u.popcdn.net/blogs/covers/000/000/530/cover/00_Blog_Cover.jpg?1584603833) no-repeat center; */
    box-shadow: 0 12px 15px 0 rgba(0, 0, 0, .24), 0 17px 50px 0 rgba(0, 0, 0, .19);
}

.login-html {
    width: 100%;
    height: 100%;
    position: absolute;
    padding: 60px 70px 50px 70px;
    background: #f5f5f5;
}

.login-html .sign-in-htm,
.login-html .sign-up-htm {
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    position: absolute;
    transform: rotateY(180deg);
    backface-visibility: hidden;
    transition: all .4s linear;
}

.login-html .sign-in,
.login-html .sign-up,
.login-form .group .check {
    display: none;
}

.login-html .tab,
.login-form .group .label,
.login-form .group .button {
    text-transform: uppercase;
}

.login-html .tab {
    font-size: 22px;
    margin-right: 15px;
    padding-bottom: 5px;
    margin: 0 15px 10px 0;
    display: inline-block;
    border-bottom: 2px solid transparent;
}

.login-html .sign-in:checked+.tab,
.login-html .sign-up:checked+.tab {
    color: #000;
    border-color: #04AA6D;
}

.login-form {
    min-height: 345px;
    position: relative;
    perspective: 1000px;
    transform-style: preserve-3d;
}

.login-form .group {
    margin: 8px 0;
    margin-bottom: 15px;
}

.login-form .group .label,
.login-form .group .input {
    width: 100%;
    color: #000;
    display: block;
    margin: 8px 0;
}

.login-form .group .button {
    width: 100%;
    color: #fff;
    display: block;
}

.login-form .group .input,
.login-form .group .button {
    border: none;
    padding: 15px 20px;
    border-radius: 25px;
    background: rgba(255, 255, 255, 1);
}

.login-form .group input[type="password"] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

.login-form .group .label {
    color: #000;
    font-size: 12px;
}

.login-form .group .button {
    background: #04AA6D;
}

.login-form .group label .icon {
    width: 15px;
    height: 15px;
    border-radius: 2px;
    position: relative;
    display: inline-block;
    background: rgba(255, 255, 255, .1);
}

.login-form .group label .icon:before,
.login-form .group label .icon:after {
    content: '';
    width: 10px;
    height: 2px;
    background: #fff;
    position: absolute;
    transition: all .2s ease-in-out 0s;
}

.login-form .group label .icon:before {
    left: 3px;
    width: 5px;
    bottom: 6px;
    transform: scale(0) rotate(0);
}

.login-form .group label .icon:after {
    top: 6px;
    right: 0;
    transform: scale(0) rotate(0);
}

.login-form .group .check:checked+label {
    color: #000;
}

.login-form .group .check:checked+label .icon {
    background: #04AA6D;
}

.login-form .group .check:checked+label .icon:before {
    transform: scale(1) rotate(45deg);
}

.login-form .group .check:checked+label .icon:after {
    transform: scale(1) rotate(-45deg);
}

.login-html .sign-in:checked+.tab+.sign-up+.tab+.login-form .sign-in-htm {
    transform: rotate(0);
}

.login-html .sign-up:checked+.tab+.login-form .sign-up-htm {
    transform: rotate(0);
}


.foot-lnk {
    text-align: center;
}
</style>

<body>


    <div class="login-wrap">
        
        <div class="login-html">
            <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign
                In</label>
            <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
            <div class="login-form">
                <div class="sign-in-htm">
                    <form class="group" method="post" action="http://localhost/project/home.php">
                        <div>
                        <?php
                            echo '<img src="../img/ku1.png" id="icon" alt="ku Icon" width="400"  >';  
                        ?>
                        </div>

                        <div class="group" >
                            <label for="user" class="label">Username</label>
                            <input id="user" placeholder="Enter Username" required type="text" class="input">
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Password</label>
                            <input id="pass" placeholder="Enter Password" type="password" class="input" required>
                        </div>
                        <div class="group">
                            <input id="check" type="checkbox" class="check" checked>
                            <label for="check"><span class="icon"></span> Keep me Signed in</label>
                        </div>

                        <button type="submit" class="button" value="Sign In">SIGN IN</button>
                        <br>
                        <!-- <div class="foot-lnk">
                            <a href="#forgot">Forgot Password?</a>
                        </div> -->
                    </form>
                </div>
                <div class="sign-up-htm">
                    <form class="group" method="post" action=" ">
                        <div class="group">
                            <label for="user" class="label">Username</label>
                            <input id="user" type="text" class="input" placeholder="Enter Username" required>
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Password</label>
                            <input id="pass" type="password" class="input" placeholder="Enter Password" required>
                        </div>

                        <div class="group">
                            <label for="pass" class="label">Repeat Password</label>
                            <input id="pass" type="password" class="input" placeholder="Repeat Password" required>
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Email Address</label>
                            <input id="pass" type="text" class="input" placeholder="Email Address" required>
                        </div>
                        <div class="group">
                            <input type="submit" class="button" value="Sign Up">
                        </div>
                        <div class="foot-lnk">
                            <label for="tab-1">Already Member?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>