<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="../frontend/CSS/style_sign.css">
</head>
<body>
<main>
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
                <form class="form" action="./../backend/updatepassword.php" method="POST">

                    <span class="title">Change Password</span>
                    <p class="message">We have sent a verification code to your mobile number</p>
                    <label>
                        <input required="" placeholder="" id="newPassword" name="newPassword" type="password" class="input">
                        <span>New Password</span>
                    </label>
                    <label>
                        <input required="" placeholder="" id="confirmNewPassword" type="password" class="input">
                        <span>Confirm New password</span>
                    </label>
                    <button class="submit" onclick="changePassword()" type="button">Change Password</button>

                </form>
            </div>
        </div>
    </main>
    <script>
        function changePassword() {
            const newPassword = document.getElementById('newPassword').value;
            const confirmNewPassword = document.getElementById('confirmNewPassword').value;

            if (newPassword !== confirmNewPassword) {
                alert('Passwords do not match. Please try again.');
                return;
            }

            // Submit the form programmatically
            document.querySelector('.form').submit();
        }
    </script>
</body>
</html>