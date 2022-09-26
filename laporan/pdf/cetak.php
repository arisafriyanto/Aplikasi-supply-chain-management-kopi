<?php 

	include "fpdf.php";
	// $conn = mysqli_connect("sql112.epizy.com", "epiz_25404588", "nYwXA3OCNHtGRow", "epiz_25404588_aplikasi_scm_kopi");
	$conn = mysqli_connect("localhost", "root", "", "aplikasi_scm_kopi");


	$pdf = new FPDF();
	$pdf->AddPage();

	$pdf->SetFont('Arial', 'B', 16);
	$pdf->Cell(0,5, 'Tambiru Cafe', '0', '1', 'C', false);
	$pdf->SetFont('Arial', 'i', 8);
	$pdf->Cell(0,2, 'Copyright @ aplikasiscmkopi', '0', '1', 'C',false);
	$pdf->Ln(3);
	$pdf->Cell(190,0.6, '', '0', '1', 'C', true);
	$pdf->Ln(5);

	$pdf->SetFont('Arial', 'B', 9);
	$pdf->Cell(50,5, 'Laporan Data Bahan', '0', '1', 'L', false);
	$pdf->Ln(3);

	$pdf->SetFont('Arial', 'B', 7);
	@$pdf->Cell(15,6, 'No', 1,0,'C');
	@$pdf->Cell(30,6, 'Nama Supplier', 1,0,'C');
	@$pdf->Cell(33,6, ' Nama Produk', 1,0,'C');
	@$pdf->Cell(28,6, ' Harga Beli ', 1,0,'C');
	@$pdf->Cell(28,6, ' Tanggal Pesan', 1,0,'C');
	@$pdf->Cell(28,6, 'Jumlah', 1,0,'C');
	@$pdf->Cell(28,6, 'Total ', 1,0,'C');
	$pdf->Ln(2);
	$no = 1;
		$sql = mysqli_query($conn, "select * from pemesanan_bahan");
		while ($data = mysqli_fetch_array($sql)) {
			@$tanggall = (date("d F Y",  strtotime($data['tanggal_pesan'])));
			@$total = ($data['harga_beli'] * $data['jumlah'] ) ;

			$pdf->Ln(4);
			$pdf->SetFont('Arial', '', 7);
			@$pdf->Cell(15,4,$no++,1,0, 'C');
			@$pdf->Cell(30,4,$data['nama_supplier'],1,0, 'C');
			@$pdf->Cell(33,4,$data['nama_produk'] . "/" . $data['satuan'] ,1,0, 'C');
			@$pdf->Cell(28,4,number_format($data['harga_beli']),1,0, 'C');
			@$pdf->Cell(28,4,$tanggall,1,0, 'C');
			@$pdf->Cell(28,4,$data['jumlah'] . " Pcs" ,1,0, 'C');
			@$pdf->Cell(28,4,number_format($total),1,0, 'C');
		}

		$pdf->Ln(10);
        $pdf->Cell(140);
		$pdf->SetFont('Times', '', 11);
		$pdf->Cell(0,5,'Disetujui Oleh');


		$pdf->Ln(18);
        $pdf->Cell(138);
		$pdf->SetFont('Times', '', 10);
		$pdf->Cell(0,5,'(..............................)');


		$pdf->Ln(5);
        $pdf->Cell(136);
		$pdf->SetFont('Times', 'B', 10);
		$pdf->Cell(0,5,'Owner Tambiru Cafe');

$pdf->Output();

	
?>