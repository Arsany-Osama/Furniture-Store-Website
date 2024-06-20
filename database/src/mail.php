<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  require( __DIR__ . "/phpMailer/src/Exception.php");
  require( __DIR__ . "/phpMailer/src/PHPMailer.php");
  require( __DIR__ . "/phpMailer/src/SMTP.php");
  /**
   * Tommorow I Will Find A Way To Encrypt The Application Account Password (Not md5 Because This Function Is Not Secure)
   */

  class mail{
    private const EMAIL = "triblema068@gmail.com";
    private const PASSWORD = "#@$2Ah_Ar_Ma$@#";
    private const APP_PS = "fnkdzjbbsshnmzob";
    private PHPMailer $mail;

    public function __construct(){
      $this->mail = new PHPMailer(true);
    }

    public static function getRandNum(){
      return rand(11111,99999);
    }


    public function sendCodeOnMail(string $receiver_email, string $subject, string $body) : string{
        // ssl stands for secure socket layer (SSL is used to encrypt the email message being sent between the sender and the Gmail server)
        $this->mail->SMTPSecure = "ssl"; 
        
        // default SMTP server for Gmail.
        $this->mail->Host='smtp.gmail.com';  
        
        // server port number
        $this->mail->Port='465';   
        
        // application account (sender)
        $this->mail->Username   = mail::EMAIL; 
        
        // application account password 
        $this->mail->Password   = mail::APP_PS; 
        
        // sender to mailserver using smtp protocol
        $this->mail->Mailer = "smtp"; 
        
        // Enable SMTP features
        $this->mail->IsSMTP(); 
        
        // Enable SMTP authentication               
        $this->mail->SMTPAuth   = true;  
        
        // Set the character encoding
        $this->mail->CharSet = 'utf-8';  
        
        // Disable debug output
        $this->mail->SMTPDebug  = 0; 
        
        // sender gmail 
        $this->mail->setFrom(mail::EMAIL); 
        
        // receiver email
        $this->mail->addAddress($receiver_email); 
        
        // Set the email body format to HTML
        $this->mail->isHTML(true); 
        
        // subject of the message 
        $this->mail->Subject = $subject; 
        
        // body of the message 
        $this->mail->Body = $body;
        
        // send the mail message 
        $this->mail->send(); 
        return true;
    }
  }
?>