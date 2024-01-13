<?php 
  require 'DatabaseConn/DatabaseConn.php';

  $rows = query("SELECT * FROM regular");

// tombol cari
  function cariData($keyword){

 $query= "SELECT * FROM regular WHERE

    nim LIKE '%$keyword%' OR
    nama LIKE '%$keyword' OR
    tgllahir LIKE '%$keyword' OR
    alamat LIKE '%$keyword' OR
    jurusan LIKE '%$keyword' OR
    fakultas LIKE '%$keyword' OR
    jk LIKE '%$keyword'OR
    email LIKE '%$keyword'

 ";

 return query($query);
}

//mengecek ketika tombol cari sudah ditekan 
if (isset($_GET["cari"])) {
  $rows = cariDATA($_GET["keyword"]);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>TABEL MAHASISWA</title>
</head>

<body>
    <div class="container p-4">
        <div class="card my-3">
            <div class="card-header">
                <h1 class="card-title">TABEL MAHASISWA</h1>
                <a href="adddata/"><button type="button" class="btn btn-success">TAMBAH DATA MAHASISWA</button></a>
            </div>
            <div class="card-body">
                <form action="" method="GET">
                    <div class="row  g-2 ">
                        <input type="text" class="form-control" placeholder="Search.." autocomplete="off" size="35px"
                            name="keyword" id="keyword">
                        <button class="btn btn-primary p-8" name="cari">Cari</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">NIM</th>
                    <th scope="col">Email</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Jurusan</th>
                    <th scope="col">Fakultas</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($rows as $mhs):?>
                <tr>
                    <td scope="row"><?= $i; ?></td>

                    <td><?= $mhs["nim"]; ?></td>
                    <td><?= $mhs["email"]; ?></td>
                    <td><?= $mhs["nama"]; ?></td>
                    <td><?= $mhs["tgllahir"]; ?></td>
                    <td><?= $mhs["jurusan"]; ?></td>
                    <td><?= $mhs["fakultas"]; ?></td>
                    <td><?= $mhs["jk"]; ?></td>
                    <td><?= $mhs["alamat"]; ?></td>
                    <td><a href="editdata/?nim=<?=$mhs["nim"]  ?>"><button type="button"
                                class="btn btn-primary">Edit</button></a> <a href="delete/?nim=<?=$mhs["nim"]  ?>"
                            onclick="return confirm('yakin ingin menhapus data ini?')"><button type="button"
                                class="btn btn-danger">Delete</button></a></td>
                </tr>
                <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
</body>

</html>