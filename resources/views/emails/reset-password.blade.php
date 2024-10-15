<!DOCTYPE html>
<html>

<head>
    <title>Reset Password</title>
</head>

<body>
    <h1>Halo {{ $name }},</h1>
    <p>Anda menerima email ini karena kami menerima permintaan reset password untuk akun Anda.</p>
    <p><a href="{{ $resetUrl }}">Klik di sini untuk mereset password Anda</a></p>
    <p>Tautan reset password ini akan berlaku selama {{ $count }} menit.</p>
    <p>Jika Anda tidak melakukan permintaan ini, tidak perlu melakukan tindakan lebih lanjut.</p>
    <br>
    <p>Terima kasih,<br>{{ config('app.name') }}</p>
</body>

</html>
