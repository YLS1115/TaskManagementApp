<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Simple Task Management System</title>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <style>
    /* Center the title */
    .login-title {
      text-align: center;
      font-size: 24px;
      font-weight: bold;
      margin-top: 20px;
    }


    /* Profile Picture */
    .profile-picture img {
      width: 100px;
      height: 100px;
      border-radius: 50%; /* Circular image */
      object-fit: cover;
      display: block;
      margin: 20px auto; /* Centers the image */
    }


    /* Align Forgot Password link to the right */
    .forgot-password {
      text-align: right;
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <!-- partial:index.partial.html -->
  <div class="screen-1">
    <!-- Welcome Title -->
    <h2 class="login-title">Login Page</h2>
   
    <!-- Profile Picture -->
    <div class="profile-picture">
      <img src="{{asset('images/profile image.jpg')}}" alt="Profile Picture" />
    </div>


    <!-- Email Section -->
    <br>
    <div class="email">
      <label for="email">Email Address</label>
      <div class="sec-2">
        <ion-icon name="mail-outline"></ion-icon>
        <input type="email" name="email" placeholder="Username@gmail.com"/>
      </div>
    </div>


    <!-- Password Section -->
    <div class="password">
    <label for="password">Password</label>
    <div class="sec-2">
      <ion-icon name="lock-closed-outline"></ion-icon>
      <input class="pas" type="password" name="password" id="password" placeholder="············"/>
      <ion-icon class="show-hide" name="eye-outline" onclick="togglePasswordVisibility()"></ion-icon>
    </div>
    </div>


    <!-- Forgot Password Link -->
    <div class="forgot-password">
      <a href="#">Forgot Password?</a>
    </div>


    <!-- Login Button -->
    <button class="login">Login</button>


    <!-- Footer with Links -->
    <div class="footer">
      <span>Don't have an account? <a href="{{ url('register') }}">Register</a></span>
    </div>
  </div>
  <!-- partial -->
  <script>
  function togglePasswordVisibility() {
    const passwordInput = document.getElementById('password');
    if (passwordInput.type === 'password') {
      passwordInput.type = 'text';
    } else {
      passwordInput.type = 'password';
    }
  }
</script>
</body>
</html>