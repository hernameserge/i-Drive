<!DOCTYPE html>
<html>
<head>
  <title>Simple reCAPTCHA Example</title>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
  <h1>Simple reCAPTCHA Example</h1>
  <form action="submit.php" method="post">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br><br>
    <div class="g-recaptcha" data-sitekey="6Lcn5r0mAAAAAKhSOdOcFwQm_PBJiUnCPQnRRePY"></div><br><br>
    <button type="submit">Submit</button>
  </form>
</body>
</html>
