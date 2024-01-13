<?php 
require '../DatabaseConn/DatabaseConn.php';

// ambil id di url
$nim = $_GET["nim"];

$mhs = query("SELECT * FROM regular WHERE nim = $nim")[0];

function editData($post){
  global $conn;
  // ambil data tiap form
  $nimLama = $_GET["nim"];
  $nim = htmlspecialchars($post["nim"]);
  $nama = htmlspecialchars($post["nama"]);
  $tgllahir = htmlspecialchars($post["tgllahir"]);
  $alamat = htmlspecialchars($post["alamat"]);
  $jk = htmlspecialchars($post["jk"]);
  $fakultas = htmlspecialchars($post["fakultas"]);
  $jurusan = htmlspecialchars($post["jurusan"]);
  $email = htmlspecialchars($post["email"]);

  // kirim data ke database
  $query = "UPDATE regular SET 
            nim = '$nim', 
            nama = '$nama', 
            tgllahir = '$tgllahir', 
            alamat = '$alamat', 
            jk = '$jk', 
            fakultas = '$fakultas', 
            jurusan = '$jurusan', 
            email = '$email'

            WHERE nim = $nimLama
        ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

  if (isset($_POST["submit"])) {
    if (editData($_POST) > 0 ) {
      echo"
    <script>
      alert ('data berhasil diubah');
      document.location.href ='../';
    </script>
      ";
    } else {
      echo "
    <script>
      alert ('data berhasil diubah');
      document.location.href ='../';
    </script>
      ";
    
    }
  
  }


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Edit Data</title>
</head>

<body>
    <div class="container row d-flex justify-content-center">
        <div class="col-md-6">
            <div class="card mb-4 p-3 border-left-dark shadow h-100 py-2 ">
                <div class="card-header my-2">
                    <h3 class="m-0 font-weight-bold text-dark text-center">UPDATE DATA MAHASISWA</h3>
                </div>
                <div class="mt-2 ">
                    <form class="row" autocomplete="off" method="post">
                        <div class=" my-2 col-12">
                            <label for="NIM">NIM</label>
                            <input type="text" id="NIM" name="nim" value="<?= $mhs ["nim"] ?>" class="form-control"
                                placeholder="Nomor Induk Mahasiswa" required>
                        </div>
                        <div class=" my-2 col-12">
                            <label for="nama">Nama</label>
                            <input type="text" id="nama" class="form-control" name="nama" value="<?= $mhs ["nama"] ?>"
                                placeholder="Masukkan Nama" required>

                        </div>
                        <div class=" my-2 col-12">
                            <label for="email">Email</label>
                            <input type="email" id="email" class="form-control" name="email"
                                value="<?= $mhs ["email"] ?> " placeholder="Masukkan Email" required>
                        </div>
                        <div class=" my-2 col-md-6">
                            <label for="tglLahir">Tanggal Lahir</label>
                            <input type="date" id="tglLahir" class="form-control" name="tgllahir"
                                placeholder="Masukkan Tanggal Lahir" value="<?= $mhs ["tgllahir"] ?>" min="1998-01-01"
                                max="2006-12-31" required>
                        </div>
                        <div class=" my-2 col-md-6">
                            <label for="jk">Jenis Kelamin</label>
                            <select id="jk" class="form-control" name="jk">
                                <option value="<?= $mhs ["jk"] ?>"><?= $mhs ["jk"] ?></option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class=" my-2 col-md-6">
                            <label for="fakultas">Fakultas</label>
                            <select id="fakultas" class="form-control" name="fakultas">
                                <option value="<?= $mhs ["fakultas"] ?>"><?= $mhs ["fakultas"] ?></option>
                                <option value="Teknologi Informasi">Teknologi Informasi</option>
                                <option value="Ilmu Sosial dan Ilmu Politik">Ilmu Sosial dan Ilmu Politik</option>
                                <option value="Psikologi">Psikologi</option>
                                <option value="Teknik">Teknik</option>
                                <option value="Ekonomi & Bisnis">Ekonomi & Bisnis</option>
                            </select>
                        </div>
                        <div class=" my-2 col-md-6">
                            <label for="jurusan">Jurusan</label>
                            <select id="jurusan" class="form-control" name="jurusan">
                                <option value="<?= $mhs ["jurusan"] ?>"><?= $mhs ["jurusan"] ?></option>
                                <option value="Sistem Informasi">Sistem Informasi</option>
                                <option value="Ilmu Komunikasi">Ilmu Komunikasi</option>
                                <option value="Administrasi Publik">Administrasi Publik</option>
                                <option value="Psikologi">Psikologi</option>
                                <option value="Teknik Elektro">Teknik Elektro</option>
                                <option value="Teknik Mesin">Teknik Mesin</option>
                                <option value="Manajemen Akutansi">Manajemen Akutansi</option>
                            </select>
                        </div>
                        <div class=" my-2 col-12">
                            <label for="alamat">Alamat</label>
                            <input type="text" id="alamat" value="<?= $mhs ["alamat"] ?>" class="form-control"
                                name="alamat" placeholder="Masukkan Alamat" required>
                        </div>
                        <div class=" my-2 col-12 ">
                            <button type="submit" name="submit" class="btn btn-primary col-md-12">Edit Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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