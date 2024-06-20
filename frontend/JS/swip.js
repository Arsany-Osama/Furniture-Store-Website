const overlayEl = document.getElementById('overlay');
const dialogEl = document.getElementById('dialog');

// Function to show the dialog
function showDialog(content) {
    dialogEl.innerHTML = content;
    overlayEl.style.display = 'block';
}

// Function to close the dialog
function closeDialog() {
    overlayEl.style.display = 'none';
}

// Function to show the login form
function showSignForm() {
    const loginFormContent = `<main>
    <div class="container" id="di_container"> 
        <section>
            <div class="right">
                <input type="checkbox" id="chk" aria-hidden="true">
                <section class="login">
                <form class="form" action="../../../furniture/backend/login.php" method="post">
                    <p class="title">Login </p>
                    <p class="message">Signup now and get full access to our app. </p>
                    

                    <label>
                        <input required="" placeholder="" name="email" type="email" class="input">
                        <span>Email</span>
                    </label>
                    
                    <label>
                        <input required="" placeholder="" name="password" type="password" class="input">
                        <span>Password</span>
                    </label>
                    <a href="#" onclick=" showForgotPasswordForm() ">forgetpassword?</a>
                    <div class="mydict">
                    <div>
                        
                    </div>
                    </div>
                    <button class="submit">Submit</button>
                    <p class="signin"> have not an acount ? <a onclick="v()" href="#"><label for="chk" aria-hidden="true">SignUp</label></a> </p>
                    <p class="signin"> _________  Or Sign In With  Social Media Accounts ___________</p>
                    <button class="Social">
                        <span>Google</span></button>
                    <button class="Social">Facebook</button>
                    <input class="custom-social-button" type="submit" value="Cancel" onclick="closeDialog()">
                    
                </form>
                </section>
                
                <br>
                <section class="Register">

                    <form action="../../../furniture/backend/register.php" method="post" class="form">
                    <input type="hidden" name="source" value="user.html">
                        <p class="title">Register </p>
                        <p class="message">Signup now and get full access to our app. </p>
                            <div class="flex">
                            <label>
                                <input required="" placeholder="" type="text" class="input" name="fname">
                                <span>Firstname</span>
                            </label>
                            
                            <label>
                                <input required="" placeholder="" type="text" class="input" name="lname">
                                <span>Lastname</span>
                            </label>
                        </div>  
                        <label>
                            <input required="" placeholder="" type="text" class="input" name="username">
                            <span>Username</span>
                        </label>
                        <label>
                            <input required="" placeholder="" type="email" class="input" name="email">
                            <span>Email</span>
                        </label>    
                        <label>
                            <input required="" placeholder="" type="number" class="input" name="telephone">
                            <span>Telephone</span>
                        </label> 
                        <label>
                            <input required="" placeholder="" type="text" class="input" name="address">
                            <span>Address</span>
                        </label> 
                        <div class="flex">
                        <label>
                            <input required="" placeholder="" type="text" class="input" name="city">
                            <span>City</span>
                        </label>
                        <label>
                            <input required="" placeholder="" type="text" class="input" name="country">
                            <span>Country</span>
                        </label>
                        </div> 
                            
                        <label>
                            <input required="" placeholder="" type="password" class="input" name="ps">
                            <span>Password</span>
                        </label>
                        <label>
                            <input required="" placeholder="" type="password" class="input" name="cps">
                            <span>Confirm password</span>
                        </label>
                        <button class="submit">Submit</button>
                        <p class="signin">Already have an acount ? <a onclick="v()" href="#"><label for="chk" aria-hidden="true">SignIn</label></a> </p>
                        <input class="custom-social-button" type="submit" value="Cancel" onclick="closeDialog()">

                    </form>
                </section>
              

            </div>
        </section>
        <section>
            <div class="left">
                <section id="card1" class="card">
                   <img src="IMG/left.jpeg" alt="Card image cap">
                  </section>
                  
            </div>
        </section>

    </div>
    
   </main> `;

    showDialog(loginFormContent);
}


// Function to show the forgot password form
function showForgotPasswordForm() {
    const forgotPasswordFormContent = `
    <div class="container">
        <section>
            <div class="left2">
                <section id="card1" class="card">
                    <img src="IMG/left.jpeg" alt="Card image cap">
                </section>
            </div>
        </section>
        <section>
            <div class="right2">
                <div class="title">Forgot Password</div>
                <form action="./../backend/forgotpassword.php" method="post" class="form" id="forgotPasswordForm">
                    <label>
                        <input required="" placeholder="" type="email" name="email" id="forgotEmail" class="input">
                        <span>Email</span>
                    </label>
                    <button class="Social" type="submit">Send OTP</button>
                </form>
                <p class="signin">Don't have an account? <a onclick="showSignForm()">Sign up now</a></p>
                <button class="custom-social-button" onclick="closeDialog()">Cancel</button>
            </div>
        </section>
    </div>
    `;

    showDialog(forgotPasswordFormContent);
}

// Function to simulate sending OTP
function sendOTP() {
    const email = document.getElementById('forgotEmail').value;
    alert(`An OTP has been sent to ${email}. Please check your email.`);
    showOTPForm();
}

// Function to show OTP verification form
function showOTPForm() {
    const otpFormContent = `  <div class="container"><section>
    <div class="left2">
        <section id="card1" class="card">
            <img src="IMG/left.jpeg" alt="Card image cap">
        </section>
    </div>
</section> <section>
<div class="right2"><form class="form">
 
    <span class="title">Enter OTP</span>
    <p class="message">We have sent a verification code to your mobile number</p>
    <div class="inputContainer">
     <input required="required" maxlength="1" type="text" class="otp-input" id="input1">
     <input required="required" maxlength="1" type="text" class="otp-input" id="input2">
     <input required="required" maxlength="1" type="text" class="otp-input" id="input3">
     <input required="required" maxlength="1" type="text" class="otp-input" id="input4"> 
     
    </div>
     <button class="submit" onclick="verifyOTP()" type="submit">Verify</button>
       
       <p class="resendNote">Didn't receive the code? <button class="resendBtn">Resend Code</button></p>
       <p class="signin">Don't have an account? <a onclick="showSignForm()" >Sign up now</a></p>
       <input class="Social" type="submit" value="Cancel" onclick="closeDialog()">
       
  </form>
  </div>
  </div>`;

    showDialog(otpFormContent);
}

// Function to check OTP verification
function verifyOTP() {
    const otp = document.getElementById("input1").value;
    if (otp.trim() !== '') {
        showChangePasswordForm();
    } else {
        alert('Invalid OTP. Please try again.');
    }
}

// Function to show change password form
function showChangePasswordForm() {
    const changePasswordFormContent = `  
    <main>
    <div class="container"><section>
    <div class="left2">
        <section id="card1" class="card">
            <img src="IMG/left.jpeg" alt="Card image cap">
        </section>
    </div>
</section> <section>
<div class="right2"><form class="form">
 
    <span class="title">Change Password</span>
    <p class="message">We have sent a verification code to your mobile number</p>
    <label>
    <input required="" placeholder=""  id="newPassword" type="password" class="input">
    <span>New Password</span>
</label>
<label>
    <input required="" placeholder="" id="confirmNewPassword" type="password" class="input">
    <span>Confirm New password</span>
</label>
     <button class="submit" onclick="changePassword()" type="submit">Change Password</button>
       <input class="Social" type="submit" value="Cancel" onclick="closeDialog()">
       
  </form>
  </div>
  </div>
  </main>
  `;

    showDialog(changePasswordFormContent);
}


// Function to handle changing password (simulated)
function changePassword() {
    const newPassword = document.getElementById('newPassword').value;
    const confirmNewPassword = document.getElementById('confirmNewPassword').value;

    if (newPassword !== confirmNewPassword) {
        alert('Passwords do not match. Please try again.');
        return;
    }

    // Your change password logic here (simulate success for demo)
    alert('Password changed successfully!');
    closeDialog(); // Close dialog on successful password change
}
function v(){
    const body = document.body;
    const darkModeToggle = document.getElementById('chk');

    if (darkModeToggle.checked) {
        body.classList.toggle('normal-mode');

    } else {
        body.classList.toggle('reverse-mode');

    } 
}

