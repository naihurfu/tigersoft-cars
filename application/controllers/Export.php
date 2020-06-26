<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Export extends CI_Controller {
  // construct
    public function __construct() {
        parent::__construct();
    // load model
        $this->load->model('Export_model', 'export');
    }    
   // export xlsx|xls file
    public function index() {
        $data['page'] = 'export-excel';
        $data['title'] = 'Export Excel data | TechArise';
        $data['employeeInfo'] = $this->export->employeeList();
    // load view file for output
        $this->load->view('export/index', $data);
    }
  // create xlsx
    public function createXLS() {
    // create file name
        $fileName = 'data-'.time().'.xlsx';  
    // load excel library
        $this->load->library('excel');
        $empInfo = $this->export->employeeList();
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'ชื่อคอมพิวเตอร์');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'รหัสสติ้กเกอร์');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'พนักงานที่ดูแล');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'ยี่ห้อ');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'ประเภท');
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'SN/License');
        $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Product ID');
        $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Windows');
        $objPHPExcel->getActiveSheet()->SetCellValue('I1', 'CPU');
        $objPHPExcel->getActiveSheet()->SetCellValue('J1', 'GPU');
        $objPHPExcel->getActiveSheet()->SetCellValue('K1', 'RAM');
        $objPHPExcel->getActiveSheet()->SetCellValue('L1', 'SSD');
        $objPHPExcel->getActiveSheet()->SetCellValue('M1', 'HDD');
        $objPHPExcel->getActiveSheet()->SetCellValue('N1', 'Mouse');
        $objPHPExcel->getActiveSheet()->SetCellValue('O1', 'Keyboard');
        $objPHPExcel->getActiveSheet()->SetCellValue('P1', 'Monitor');
        $objPHPExcel->getActiveSheet()->SetCellValue('Q1', 'เบอร์โต๊ะ');
        $objPHPExcel->getActiveSheet()->SetCellValue('R1', 'หมายเหตุ');
        // set Row
        $rowCount = 2;
        foreach ($empInfo as $element) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $element->comName);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $element->codePc);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $element->empId);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $element->brand);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $element->category);
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $element->serialLicense);
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $element->producId);
            $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $element->windows);
            $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $element->cpu);
            $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $element->gpu);
            $objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, $element->ram);
            $objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount, $element->ssd);
            $objPHPExcel->getActiveSheet()->SetCellValue('M' . $rowCount, $element->hdd);
            $objPHPExcel->getActiveSheet()->SetCellValue('N' . $rowCount, $element->mouse);
            $objPHPExcel->getActiveSheet()->SetCellValue('O' . $rowCount, $element->keyboard);
            $objPHPExcel->getActiveSheet()->SetCellValue('P' . $rowCount, $element->monitor);
            $objPHPExcel->getActiveSheet()->SetCellValue('Q' . $rowCount, $element->callnumber);
            $objPHPExcel->getActiveSheet()->SetCellValue('R' . $rowCount, $element->remark);
            $rowCount++;
        }
        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save(ROOT_UPLOAD_IMPORT_PATH.$fileName);
    // download file
        header("Content-Type: application/vnd.ms-excel");
        redirect(HTTP_UPLOAD_IMPORT_PATH.$fileName);        
    }
    
}
?>