<html>
<head>
  <title>EVENTER</title>
</head>
<body>
  <h1>Tambah Data Event</h1>
  <form method="post" action="proses_simpan.php" enctype="multipart/form-data">
  <table cellpadding="8">
  <tr>
    <td>id</td>
    <td><input type="text" name="id"></td>
  </tr>
  <tr>
    <td>Foto</td>
    <td><input type="file" name="gambar"></td>
  </tr>
  </table>
  
  <hr>
  <input type="submit" value="Simpan">
  <a href="index.php"><input type="button" value="Batal"></a>
  </form>
</body>
</html>