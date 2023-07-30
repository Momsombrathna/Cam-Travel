<!DOCTYPE html>
<html>
<head>
<title>Reset Password</title>
</head>
<body>
<h1>Reset your password</h1>
<p>
To reset your password, click on the following link:
<a href="{{ url('password/reset/'.$token) }}">Reset Password</a>
</p>
<p>
If you did not request a password reset, please ignore this email.
</p>
</body>
</html>
