
<!doctype html>
<html lang="id">
<div align="center">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1, user-scalable=no" name="viewport">
        <meta name="author" content="">
        <meta name="description" content="">

        <title>Aplikasi Manajemen Kos</title>
        <link rel="stylesheet" href="login1.css">
    </head>

    <body>

        <div class="container">
            <header class="text-center my-4">
                <h1>Manajemen Kos</h1>
            </header>
            <main>
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <?php
                          session_start();
                        if (isset($_POST['ganti'])) {
                            $akun = $_SESSION['akun'];
                            $s1 = $_POST['sandi_lama'];
                            $sb1 = $_POST['sandi_baru_1'];
                            $sb2 = $_POST['sandi_baru_2'];
                            if ($sb1 !== $sb2) {
                                echo '<div class="alert alert-danger">Sandi baru tidak sama!</div>';
                            } else {
                                include "classes/Dml.php";
                                include "classes/otentikasi.php";
                                $ganti = new \classes\otentikasi();
                                $ganti->gantisandi($akun, $s1, $sb1);
                            }
                        }
                        ?>
                        <form action="" method="post">
                            <table>
                                <tr>
                                    <td><label for="sandi_baru_1">Sandi Baru</label></td>
                                    <td><input type="password" id="sandi_baru_1" name="sandi_baru_1" placeholder="Sandi baru" required></td>
                                </tr>
                                <tr>
                                    <td><label for="sandi_baru_2">Konfirmasi Sandi</label></td>
                                    <td><input type="password" id="sandi_baru_2" name="sandi_baru_2" placeholder="Konfirmasi sandi baru" required></td>
                                </tr>
                                <tr>
                                    <td><label for="sandi_lama">Sandi Lama</label></td>
                                    <td><input type="password" id="sandi_lama" name="sandi_lama" placeholder="Sandi lama" required></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><button type="submit" name="ganti">Ganti Sandi</button></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </main>
           

        </div>
    </body>

</html>