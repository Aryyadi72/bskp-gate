<!DOCTYPE html>
<html>

<head>
    <title>Login Aktif Terdeteksi</title>
</head>

<body>
    <h1>Login Aktif Ditemukan</h1>
    <p>Halo,</p>
    <p>Berikut adalah detail login aktif Anda:</p>
    <ul>
        <li><strong>NIK:</strong> {{ $nik }}</li>
        <li><strong>Email:</strong> {{ $email }}</li>
        <li><strong>Waktu Sekarang:</strong> {{ $currentTime }}</li>
        <li><strong>IP Address:</strong> {{ $ipAddress }}</li>
    </ul>
    <p>Terima kasih.</p>
</body>

</html>
