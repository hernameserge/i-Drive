<?php
// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Validate reCAPTCHA response
  $recaptchaResponse = $_POST['g-recaptcha-response'];
  $secretKey = '6Lcn5r0mAAAAABcUOgqnHwLRsN_N_EaSU6C5d5rk'; // Replace with your actual Secret Key

  $url = 'https://www.google.com/recaptcha/api/siteverify';
  $data = array(
    'secret' => $secretKey,
    'response' => $recaptchaResponse
  );

  $options = array(
    'http' => array(
      'header' => "Content-type: application/x-www-form-urlencoded\r\n",
      'method' => 'POST',
      'content' => http_build_query($data)
    )
  );

  $context = stream_context_create($options);
  $result = file_get_contents($url, false, $context);

  if ($result === FALSE) {
    // Error occurred while verifying reCAPTCHA
    echo 'Error occurred while verifying reCAPTCHA.';
  } else {
    $response = json_decode($result);
    if ($response->success) {
      // reCAPTCHA verification successful
      $name = $_POST['name'];
      echo 'Hello, ' . $name . '! Your form submission was successful.';
    } else {
      // reCAPTCHA verification failed
      echo 'reCAPTCHA verification failed.';
    }
  }
}
?>
