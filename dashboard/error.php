<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Error Page</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #161616;
    }
    .error-container {
      text-align: center;
      margin-top: 100px;
    }
    .error-code {
      font-size: 120px;
      color: #dc3545;
    }
    .error-message {
      font-size: 24px;
      color: 333;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="error-container">
      <div class="error-code text-white">404❌</div>
      <div class="error-message text-danger">Oops! Page not found.</div>
      <p class="mt-4 text-white">The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.</p>
      <a href="#" class="btn btn-danger mt-3">Go back to homepage</a>
    </div>
  </div>
</body>
</html>