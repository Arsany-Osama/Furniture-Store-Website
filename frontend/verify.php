<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../frontend/CSS/style_sign.css">
    <title>OTP</title>
    <style>
      /* Modal Styles */
      .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0,0,0);
        background-color: rgba(0,0,0,0.4);
        padding-top: 60px;
      }
      .modal-content {
        background-color: #fefefe;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        max-width: 300px;
        border-radius: 8px;
        text-align: center;
      }
      .close-btn {
        background-color: #007bff;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
      }
      .close-btn:hover {
        background-color: #0056b3;
      }
    </style>
  </head>
  <body>
    <div id="errorModal" class="modal">
      <div class="modal-content">
        <br>
        <p>Wrong Code</p>
        <br><br>
        <button class="close-btn" onclick="closeModal()">OK</button>
      </div>
    </div>
    <script>
      // Function to display the modal
      function showModal() {
        document.getElementById('errorModal').style.display = 'block';
      }
      
      // Function to close the modal
      function closeModal() {
        document.getElementById('errorModal').style.display = 'none';
      }
      
      // Check for the error parameter in the URL
      if (new URLSearchParams(window.location.search).get('error') == 1) {
        showModal();
      }
      
      // Function to move focus to the next input field
      function moveFocus(currentInput, nextInputId) {
        const maxLength = currentInput.getAttribute("maxlength");
        const currentLength = currentInput.value.length;
        
        if (currentLength >= maxLength) {
          const nextInput = document.getElementById(nextInputId);
          if (nextInput) {
            nextInput.focus();
          }
        }
      }
    </script>
    <div class="container">
      <section>
        <div class="left2">
          <section id="card1" class="card">
            <img src="./../frontend/IMG/left.jpeg" alt="Card image cap">
          </section>
        </div>
      </section>
      <section>
        <div class="right2">
          <form action="./../backend/verification.php" method="POST" class="form">
            <span class="title">Enter OTP</span>
            <p class="message">We have sent a verification code to <b><?php session_start(); echo $_SESSION['email']?></b></p>
            <div class="inputContainer">
              <input name="digit1" required="required" maxlength="1" type="text" class="otp-input" id="input1" oninput="moveFocus(this, 'input2')">
              <input name="digit2" required="required" maxlength="1" type="text" class="otp-input" id="input2" oninput="moveFocus(this, 'input3')">
              <input name="digit3" required="required" maxlength="1" type="text" class="otp-input" id="input3" oninput="moveFocus(this, 'input4')">
              <input name="digit4" required="required" maxlength="1" type="text" class="otp-input" id="input4" oninput="moveFocus(this, 'input5')">
              <input name="digit5" required="required" maxlength="1" type="text" class="otp-input" id="input5">
            </div>
            <input class="submit" type="submit" name="Verify">
          </form>
          <p class="resendNote">Didn't receive the code? <button class="resendBtn">Resend Code</button></p>
        </div>
      </section>
    </div>
  </body>
</html>