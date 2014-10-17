<?php

//!defined("INC")&&exit('Access Denied');
class ExcelAction extends Action{
	private function tologin(){
		
	}
	
	
	//$data为二维数组
	public function to_export_excel($data){
		
		
		include_once(THINK_PATH."\..\Classes\PHPExcel.php");
		
		$objPHPExcel = new PHPExcel();
		$objPHPExcel->getProperties()->setCreator("STPC")
							 ->setLastModifiedBy($_SESSION['uid'])
							 ->setTitle("export");
		
		$j = 1;
	 	foreach($data as $value){
	 		$i = 65;
	 		foreach($value as $one){
	 			$objPHPExcel->setActiveSheetIndex(0)->setCellValue(chr($i).$j, $one);
				$i++;
	 		}
			$j++;
	 	}

		header("Content-Type:text/html; charset=utf-8");	
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="export.xlsx"');
		header('Cache-Control: max-age=0');
		header('Cache-Control: max-age=1');
		
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
	}

	public function to_inport_excel($path){
		
		include_once(THINK_PATH."\..\Classes\PHPExcel.php");
		
		$objPHPExcel = PHPExcel_IOFactory::load($path);
		
		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
		return $sheetData;
	}
}

?>