<!DOCTYPE html>
<html>
<head>
<title>Reset Password</title>
</head>
<body>
<h1>Reset your password</h1>
<p>
To reset your password, please enter your new password below.
</p>
<form action="{{ route('password.reset') }}" method="POST">
@csrf
<input type="password" name="password" placeholder="New Password">
<input type="password" name="password_confirmation" placeholder="Confirm Password">
<input type="hidden" name="token" value="{{ $token }}">
<button type="submit">Reset Password</button>
</form>
</body>
</html>