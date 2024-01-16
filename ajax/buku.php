<?php
sleep(1);
require '../functions.php';
$keyword = $_GET["keyword"];

$query = " SELECT * FROM buku WHERE judul LIKE '%$keyword%' OR 
pengarang LIKE '%$keyword%' OR
penerbit LIKE '%$keyword%' OR
tahun LIKE '%$keyword%'
";
$buku = query($query);

?>
<table class="content-table" cellpadding="10" border="1" cellspacing="0">
  <tr>
    <th>No</th>
    <th>cover</th>
    <th>Action</th>
    <th>Judul Buku</th>
    <th>Pengarang</th>
    <th>Penerbit</th>
    <th>Tahun</th>
    <th>Dimensi</th>
    <th>Subjek</th>
    <th>Catatan</th>
    <th>No ISBN</th>
    <th>Exemplar</th>

  </tr>

  <?php if (empty($buku)) : ?>
    <tr>
      <td colspan="12">
        <p>
          Data tidak ditemukan..!
        </p>
      </td>
    </tr>
  <?php endif; ?>
  <?php $i = 1; ?>
  <?php foreach ($buku as $row) : ?>
    <tr>
      <td>
        <?php echo $i; ?>
      </td>
      <td>
        <img src="asset/gambar/<?= $row["cover"]; ?>" style="width:100px; height:100px">
      </td>
      <td>
        <button><a href="edit.php?id=<?= $row["id"]; ?>">Edit</a></button>
        <button><a href="delete.php?id= <?= $row["id"]; ?>">Delete</a></button>
      </td>
      <td><?= $row["judul"] ?></td>
      <td><?= $row["pengarang"] ?></td>
      <td><?= $row["penerbit"] ?></td>
      <td><?= $row["tahun"] ?></td>
      <td><?= $row["dimensi"] ?></td>
      <td><?= $row["subjek"] ?></td>
      <td><?= $row["catatan"] ?></td>
      <td><?= $row["isbn"] ?></td>
      <td><?= $row["exemplar"] ?></td>

    </tr>
    <?php $i++; ?>
  <?php endforeach; ?>

</table>