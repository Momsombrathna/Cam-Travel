<form action="{{ route('forgot-password.send-reset-email') }}" method="POST">
    @csrf

    <input type="email" name="email" placeholder="Email">

    <button type="submit">Send Reset Email</button>
</form>
