<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, user-scalable=no" name="viewport">
    <meta name="author" content="">
    <meta name="description" content="">

    <title>Aplikasi Manajemen Kos</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <header align="center">
        <h1>Manajemen Kos</h1>
    </header>
    <main>
        <p align="center">
            <?php
            if (isset($_POST['login'])) {
                include dirname(__FILE__) . "/classes/inisialisasi.php";
                $login = new \classes\Otentikasi();
                $login->cekLogin($_POST['akun'], $_POST['sandi']);
            }
            ?>
        </p>
        <form action="" method="post">
            <table border="0" width="100%" align="center">
                <tbody>
                    <tr>
                        <td width="40%" align="right">Akun</td>
                        <td width="55%">
                            <input type="text" placeholder="Masukan akun" size="10" name="akun" required>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">Sandi</td>
                        <td>
                            <input type="password" placeholder="Masukan Password" size="20" name="sandi" required>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        
                        <td>
                            <input type="submit" value="Login" name="login">
       
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>

    </main>
</body>

</html>