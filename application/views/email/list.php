<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><? $title ?></title>
</head>

<body>
    <?= form_open('EmailTrial/SendMail') ?>
    <table>
        <tr>
            <td>Email</td>
            <td>:</td>
            <td><input type="email" name="email" placeholder="Email Anda..."></td>
        </tr>
        <tr>
            <td>Subject</td>
            <td>:</td>
            <td><input type="text" name="subject" placeholder="Subject Email..."></td>
        </tr>
        <tr>
            <td>Pesan</td>
            <td>:</td>
            <td><textarea type="email" name="pesan" cols="30" rows="10" placeholder="Pesan Anda..."></textarea></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="submit_email" value="Kirim email"></td>
        </tr>
    </table>
    <?= form_close() ?>
</body>

</html>