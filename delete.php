<?php

require 'functions.php';

$id = $_GET["id"];

if (hapus($id) > 0) {
  echo "
    <script>
    document.location.href='home.php';
    </script>
    ";
} else {
  echo "
    <script>
    alert('data gagal dihapus');
    document.location.href='home.php';
    </script>
    ";
}
