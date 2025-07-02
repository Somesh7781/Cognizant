<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Secure Login</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(to right, #0f2027, #203a43, #2c5364);
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .login-box {
      background-color: rgba(255, 255, 255, 0.05);
      padding: 40px;
      border-radius: 15px;
      backdrop-filter: blur(10px);
      width: 100%;
      max-width: 400px;
      box-shadow: 0 0 25px rgba(0,0,0,0.4);
      color: white;
    }

    .login-box h2 {
      text-align: center;
      margin-bottom: 25px;
      font-size: 28px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      font-size: 14px;
      margin-bottom: 5px;
    }

    .form-group input {
      width: 100%;
      padding: 12px 15px;
      border: none;
      border-radius: 8px;
      background-color: #1a1a1a;
      color: #fff;
      font-size: 14px;
    }

    .form-group input::placeholder {
      color: #888;
    }

    .btn {
      width: 100%;
      padding: 12px;
      background-color: #28a745;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      font-weight: bold;
      color: white;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .btn:hover {
      background-color: #218838;
    }

    .error {
      color: #ff4d4d;
      font-size: 14px;
      margin-top: 10px;
      display: none;
      text-align: center;
    }

    @media (max-width: 500px) {
      .login-box {
        margin: 0 20px;
        padding: 30px;
      }
    }
  </style>
</head>
<body>
  <div class="login-box">
    <h2>🔐 Cognizant Secure Login</h2>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" id="email" placeholder="Enter your email">
    </div>

    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" id="password" placeholder="Enter your password">
    </div>

    <button class="btn" onclick="login()">Login</button>
    <div id="error" class="error">Invalid email or password.</div>
  </div>

  <script>
    // Encoded credentials (simple base64 for hiding in source view — still NOT secure for production)
    const encodedCredentials = btoa(JSON.stringify({
      email: "admin@example.com",
      password: "admin123"
    }));

    function login() {
      const enteredEmail = document.getElementById("email").value.trim();
      const enteredPassword = document.getElementById("password").value.trim();
      const errorBox = document.getElementById("error");

      // Decode stored credentials
      const decoded = JSON.parse(atob(encodedCredentials));

      if (enteredEmail === decoded.email && enteredPassword === decoded.password) {
        errorBox.style.display = "none";
        alert("✅ Login Successful!");
        window.location.href = "dashboard.html"; // redirect
      } else {
        errorBox.style.display = "block";
      }
    }
  </script>
</body>
</html>
