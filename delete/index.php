<?php 
	require '../DatabaseConn/DatabaseConn.php';

	// tangkap nim di url
	$nim = $_GET["nim"];

	// function hapus berdasarkan nim
	function hapusData($nim)
	{
		global $conn;
		mysqli_query($conn,"DELETE FROM regular WHERE nim = $nim");
		return mysqli_affected_rows($conn);
	}

	// cek apakah data berhasil di hapus atau belum
	if (hapusData($nim)) {
		echo "
	<script>
      alert ('data berhasil dihapus');
      document.location.href ='../';
    </script>

		";
	} else {
	echo "
	<script>
      alert ('data berhasil dihapus');
      document.location.href ='../';
    </script>
	";
		
	}


?>