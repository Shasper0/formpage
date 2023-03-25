<?php
// Cheack if User Coming from A Request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  // Assign Variables

  // $user = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
  // $mail = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  // $cell = filter_var($_POST['cellphone'], FILTER_SANITIZE_NUMBER_INT);
  // $meg  = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

  $user = $_POST['username'];
  $mail = $_POST['email'];
  $cell = $_POST['cellphone'];
  $meg  = $_POST['message'];



  // Create Array of Errors
  $formErrors = array();
  if (strlen($user) <= 3) {
    $formErrors[] = "username must be larger Than <strong> 3 </strong> characters";
  }
  if (strlen($meg) <= 10) {
    $formErrors[] = "Message Can\'t be less Than <strong> 10 </strong> Characters";
  }

  //IF no Errors Send The Email [mail(TO  , Subject , Message , Parameter)]
  $headers = 'Form' . $mail . '/r/n';
  $myEmail = 'ab235689235689@gmail.com';
  $subject = 'Contact Form';
if(empty($formErrors)){
  mail($myEmail ,$subject , $meg , $headers );
}


}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Form Page</title>
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="fonts/css/fontawesome.css">
  <link rel="stylesheet" href="fonts/css/brands.css">
  <link rel="stylesheet" href="fonts/css/solid.css">
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/style.css" />

</head>

<body>

  <!-- Start Form -->
  <div class="container">
    <h1 class="text-center">Contact Me</h1>
    <form class="contact-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
      <?php if (!empty($formErrors)) { ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>




          <?php foreach ($formErrors as $error) {
            echo $error . "<br/>";
          }
          ?>
        </div>
      <?php
      }

      ?>

      <div class='form-group'>
        <input class="username form-control" type="text" name="username" placeholder="Type Your Username" value="<?php if (isset($user)) {
                                                                                                                    echo $user;
                                                                                                                  } ?>" />
        <i class="fa fa-user fa-fw"></i>
        <span class='astersx'>*</span>
        <div class="alert alert-danger custom-alert">username must be larger Than <strong> 3 </strong> characters</div>
      </div>
      <div class="form-group">
        <input class="form-control email" type="email" name="email" placeholder="Please Type a Vaild Email " value="<?php if (isset($mail)) {
                                                                                                                echo $mail;
                                                                                                              } ?>" />
        <i class="fa fa-envelope"></i>
        <span class='astersx'>*</span>
        <div class="alert alert-danger custom-alert">Email Can't Be <strong> Empty</strong> </div>
      </div>
      <input class="form-control cellphone" type="text" name="cellphone" placeholder="Type Your Cell Phone" value="<?php if (isset($cell)) {
                                                                                                            echo $cell;
                                                                                                          } ?>" />
      <i class="fa fa-phone fa-fw"></i>
      <textarea class="form-control message" placeholder="Your Message!" name="message"><?php if (isset($meg)) {
                                                                                  echo $meg;
                                                                                } ?></textarea>
      <div class="alert alert-danger custom-alert">Message Can\'t be less Than <strong> 10 </strong> Characters</div>
      <input class="btn btn-success" type="submit" value="Send Message">
      <i class="fa fa-paper-plane send-icon"></i>
    </form>
  </div>
  <!-- End Form -->

  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/jquery-3.6.4.min.js"></script>
  <script src="js/index.js"></script>
</body>

</html>