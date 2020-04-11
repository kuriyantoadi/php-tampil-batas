<!DOCTYPE html>
<html lang="en">
<head>
  <title>Pagination</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.css">
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>
<body>

  <?php
  include 'koneksidb.php';
  ?>

  <div class="col-sm-6" style="padding-top: 20px; padding-bottom: 20px;">
    <h3>Pagination Sederhana dengan PHP, MySQL dan Bootstrap</h3>
    <hr>


      <table class="table table-stripped table-hover">
      <tr>
        <th>No</th>
        <th>Id</th>
        <th>Nama</th>
        <th>Fakultas</th>
      </tr>

      <?php
      $halperpage = 5;

      $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;

      $mulai = ($page>1) ? ($page * $halperpage) - $halperpage : 0;

      $result = mysql_query("SELECT * FROM mhs");

      $total = mysql_num_rows($result);

      $pages = ceil($total/$halperpage);

      $query = mysql_query("SELECT * FROM mhs LIMIT $mulai, $halperpage")or die(mysql_error);

      $no = $mulai+1;


      while ($data = mysql_fetch_assoc($query))
      {
      ?>
        <tr>
          <td><?php echo $no++; ?></td>
          <td><?php echo $data['id']; ?></td>
          <td><?php echo $data['nama']; ?></td>
          <td><?php echo $data['fakultas']; ?></td>
        </tr>
      <?php
      }
      ?>

      </table>

      <div>
        <?php for ($i=1; $i<=$pages ; $i++){ ?>
        <a class="btn btn-info btn-md" href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
        <?php } ?>
      </div>
  </div>
</body>
</html>
