<?php
session_start();
$ADMIN_EMAIL = "akunjualbeli660@gmail.com";
$ADMIN_PASS  = "qwer1234";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['email'] === $ADMIN_EMAIL && $_POST['password'] === $ADMIN_PASS) {
        $_SESSION['admin'] = true;
        header("Location: dashboard.php");
        exit;
    } else {
        $err = "Email atau password salah.";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
</head>
<body>

<h2>Login Admin</h2>

<?php if (!empty($err)): ?>
    <p style="color:red;"><?= $err ?></p>
<?php endif; ?>

<table border="0" cellpadding="5">
<form method="post">

    <tr>
        <td>Email</td>
        <td>:</td>
        <td><input type="email" name="email" required></td>
    </tr>

    <tr>
        <td>Password</td>
        <td>:</td>
        <td><input type="password" name="password" required></td>
    </tr>

    <tr>
        <td></td>
        <td></td>
        <td><button type="submit">Login</button></td>
    </tr>

</form>
</table>

</body>
</html>
