<?php
if (isset($_POST["upload"])) {
  $namaFile = $_FILES['berkas_file']['name'];
  $namaSementara = $_FILES['berkas_file']['tmp_name'];
  $size_file = $_FILES['berkas_file']['size'];
  //tempat penyimpanan
  $tmpUploade = "upload/";

  //file size
  if ($size_file > 1000000) {
    $size_file_error = true;
  } else {
    $ter_upload = move_uploaded_file($namaSementara, $tmpUploade.$namaFile);

    if ($ter_upload) {
      $success = true;
    } else {
      $error = true;
    }
  }

}
?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <title>upload</title>
  <!-- CSS bootstrap only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

</head>
<body>
  <nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Upload And download</a>
    </div>
  </nav>
  <br>
  <br>
  <div class="container-sm">
    <form action="" method="post" enctype="multipart/form-data">
      <?php if (isset($success)): ?>
      <div class="alert alert-success" role="alert">
        Upload successfull <a href="<?=$tmpUploade.$namaFile; ?>" download="<?= $namaFile; ?>" class="alert-link">download</a>
      </div>
      <?php endif; ?>
      <?php if (isset($error)): ?>
      <div class="alert alert-warning" role="alert">
        Upload gagal
      </div>
      <?php endif; ?>
      <?php if (isset($size_file_error)): ?>
      <div class="alert alert-warning" role="alert">
        ukuran file terlalu besar max 10mb
      </div>
      <?php endif; ?>
      <div class="mb-3">
        <input type="file" class="form-control" name="berkas_file">
      </div>
      <div class="d-grid gap-2">
        <input type="submit" class="btn btn-primary" name="upload" value="upload" class="" />
      </div>
    </form>

  </div>
</body>
</html>