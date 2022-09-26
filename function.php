<?php 


// $conn = mysqli_connect("sql112.epizy.com", "epiz_25404588", "nYwXA3OCNHtGRow", "epiz_25404588_aplikasi_scm_kopi");
$conn = mysqli_connect("localhost", "root", "", "aplikasi_scm_kopi");




    function register($data) {

    	global $conn;

    	$username 		= strtolower(stripcslashes($data['username']));
		$password 		= mysqli_real_escape_string($conn, $data['password']);
		$password2 		= mysqli_real_escape_string($conn, $data['password2']);
		$nama_lengkap 	= htmlspecialchars($data['nama_lengkap']);

		$result = mysqli_query($conn, "select username from login where username='$username' ");
		if(mysqli_fetch_assoc($result)) {
			echo "	<script>
						alert ('Username yang anda masukkan sudah ada');
						window.location.href='register.php';
					</script>
				";

				return false;
		}

		if($password !== $password2) {
			echo "	<script>
						alert ('Konfirmasi Password Harus Sama');
						window.location.href='register.php';
					</script>
				";

				return false;
		}


		// enkripsi password

		$password = password_hash($password, PASSWORD_DEFAULT);

		$sql = mysqli_query($conn, "insert into login (id, username, password, nama_lengkap) values (null, '$username', '$password', '$nama_lengkap') ");

		return $conn;



    }