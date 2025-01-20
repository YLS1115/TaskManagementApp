<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register - Simple Task Management System</title>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
  <!-- Register Page -->
  <div class="screen-1">
    <h2 class="login-title">Register Account</h2>


    <!-- Username Section -->
    <div class="email">
      <label for="username">Username</label>
      <div class="sec-2">
        <ion-icon name="person-outline"></ion-icon>
        <input type="text" name="username" placeholder="Enter Username"/>
      </div>
    </div>

    <br>
    <!-- Email Section -->
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


    <!-- Confirm Password Section -->
    <div class="password">
    <label for="confirm-password">Confirm Password</label>
    <div class="sec-2">
        <ion-icon name="lock-closed-outline"></ion-icon>
        <input type="password" name="confirm-password" id="confirm-password" placeholder="············"/>
    <ion-icon class="show-hide" name="eye-outline" onclick="togglePasswordVisibility('confirm-password')"></ion-icon>
    </div>
    </div>

    <!-- Register Button -->
    <button class="register">Register</button>


    <!-- Login Link -->
    <div class="footer">
    <span>Already have an account? <a href="{{ url('welcome') }}">Login</a></span>
    </div>
  </div>

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