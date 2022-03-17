<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table>
        <tr>
            <td>
                <form action="<?= base_url('Welcome/save') ?>" method="POST" enctype="multipart/form-data">
                    <input type="text" name="nama_produk">
                    <input type="text" name="nama_pasar">
                    <input type="text" name="tgl_create">
                    <button type="submit">simpan</button>
                </form>
            </td>
        </tr>
    </table>
</body>

</html>