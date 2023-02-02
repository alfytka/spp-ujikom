<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
  
    <title>Login Page</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
  
    <!-- Favicons -->
      <!-- <link href="assets/img/favicon.png" rel="icon">
      <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->
  
    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
  
    <!-- Vendor CSS Files -->
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="/vendor/simple-datatables/style.css" rel="stylesheet">
  
    <!-- Template Main CSS File -->
    <link href="/css/loginstyle.css" rel="stylesheet">

  </head>
<body>
  
  <div class="login-container">
    <img class="image-container" src="assets/img/login.svg" alt="">
    <div class="login-info-container">

      <h3 class="fw-semibold my-5 py-2">Login Petugas</h3>
      
      <form class="inputs-container" action="#">
        <div style="margin-bottom: 1.3rem">
          <label for="username" class="d-block input-label text-start">Username</label>
          <div class="d-flex w-100 div-input">
            <input class="input-field border-0" type="text" name="username" id="username" placeholder="Masukkan username"
              autocomplete="off"/>
          </div>
        </div>
        <div>
          <label for="password" class="d-block input-label text-start">Password</label>
          <div class="d-flex w-100 div-input">
            <input class="input-field border-0" type="password" name="password" id="password"
              placeholder="Masukkan password"/>
            <div onclick="togglePassword()">
              <svg style="margin-left: 0.75rem; cursor: pointer" width="20" height="14" viewBox="0 0 20 14"
                fill="none" xmlns="http://www.w3.org/2000/svg">
                <path id="icon-toggle" fill-rule="evenodd" clip-rule="evenodd"
                  d="M0 7C0.555556 4.66667 3.33333 0 10 0C16.6667 0 19.4444 4.66667 20 7C19.4444 9.52778 16.6667 14 10 14C3.31853 14 0.555556 9.13889 0 7ZM10 5C8.89543 5 8 5.89543 8 7C8 8.10457 8.89543 9 10 9C11.1046 9 12 8.10457 12 7C12 6.90536 11.9934 6.81226 11.9807 6.72113C12.2792 6.89828 12.6277 7 13 7C13.3608 7 13.6993 6.90447 13.9915 6.73732C13.9971 6.82415 14 6.91174 14 7C14 9.20914 12.2091 11 10 11C7.79086 11 6 9.20914 6 7C6 4.79086 7.79086 3 10 3C10.6389 3 11.2428 3.14979 11.7786 3.41618C11.305 3.78193 11 4.35535 11 5C11 5.09464 11.0066 5.18773 11.0193 5.27887C10.7208 5.10171 10.3723 5 10 5Z"
                  fill="#7F8487" />
              </svg>
            </div>
          </div>
        </div>
        <!-- <div class="d-flex justify-content-end" style="margin-top: 0.75rem">
          <a href="#" class="forgot-password fst-italic">Lupa password?</a>
        </div> -->
        <button class="btn btn-fill text-white d-block w-100" type="submit">
          Masuk <i class="bi bi-arrow-right ms-1"></i>
        </button>
      </form>
    </div>
      
  </div>

  <!-- Vendor JS Files -->
  <script>
    function togglePassword() {
      var x = document.getElementById("password");
      if (x.type === "password") {
        x.type = "text";
        document
          .getElementById("icon-toggle")
          .setAttribute("fill", "#C084FC");
      } else {
        x.type = "password";
        document
          .getElementById("icon-toggle")
          .setAttribute("fill", "#7F8487");
      }
    }
  </script>
  <script src="/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/vendor/quill/quill.min.js"></script>
  <script src="/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="/vendor/tinymce/tinymce.min.js"></script>
  <script src="/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="/js/main.js"></script>
</body>
</html>