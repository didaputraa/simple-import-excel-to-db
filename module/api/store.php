<?php
function read($data)
{
	return htmlspecialchars($data, ENT_QUOTES);
}

if (isset($_FILES['file'])) {
	
	date_default_timezone_set('Asia/jakarta');
	
	$tmp  = $_FILES['file']['tmp_name'];
	$name = $_FILES['file']['name'];
	
	if (move_uploaded_file($tmp, 'tmp/'.$name) && substr(strtolower($name),-4) == 'xlsx') {
		
		include 'config.php';
		require '../../vendor/autoload.php';

		$input  = './tmp/'.$name;
		$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
		$reader->setReadDataOnly(true);
		$xls	= $reader->load($input);
		$data	= [];
		$index  = 0;

		foreach ($xls->getSheet(0)->toArray() as $number => $row) {
			
			if ($number != 0) {
				
				$data[] = '("'.read($row[0]).'","'.read($row[1]).'","'.read($row[2]).'")';
				
				$index++;
			}
		}

		$val = implode(',', $data);

		$con->query("INSERT INTO produk (nama,category_id,stok) VALUES {$val}")or die($con->error);
		
		@unlink('./tmp/'.$name);
		
	} else {
		
		http_response_code(500);
	}
}