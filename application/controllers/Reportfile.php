<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Reportfile extends BaseController {
    
    function __construct(){
        parent::__construct();
        $this->load->model('checknamestudent_model');
    }

    function export($status = null){

        // echo()
        // if(!empty($status)){
            $status = $status;
            $this->load->library('excel');
            $obj = new PHPExcel();
            $obj->getDefaultStyle()->getFont()->setName('Angsana New');
            $obj->getDefaultStyle()->getFont()->setSize(14);

            $result = $this->checknamestudent_model->posthistorydata($status);

            $obj->setActiveSheetIndex(0)->getColumnDimension('A')->setWidth(10); 
            $obj->setActiveSheetIndex(0)->getColumnDimension('B')->setWidth(30); 
            $obj->setActiveSheetIndex(0)->getColumnDimension('C')->setWidth(10); 
            $obj->setActiveSheetIndex(0)->getColumnDimension('D')->setWidth(10); 
            $obj->setActiveSheetIndex(0)->getColumnDimension('E')->setWidth(10); 
            $obj->setActiveSheetIndex(0)->getColumnDimension('F')->setWidth(10); 
    
            $obj->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'ลำดับ')->setCellValue('B1', 'รายการค่าใช้จ่าย')
                    ->setCellValue('C1', 'รหัสนักศึกษา')->setCellValue('D1', 'ไซต์เสื้อ')
                    ->setCellValue('E1', 'จำนวนเงิน')->setCellValue('F1', 'สถานะการจ่ายเงิน');

            $col = 2;
            foreach ($result as $i => $v) {
                $obj->setActiveSheetIndex(0)
                        ->setCellValue('A'.$col, $i+1)->setCellValue('B'.$col, $v->finance_name)
                        ->setCellValue('C'.$col, $v->student_id)->setCellValue('D'.$col, $v->shirt_size)
                        ->setCellValue('E'.$col, $v->money)->setCellValue('F'.$col, $v->status);
                $col++;
            }

            
            $obj->setActiveSheetIndex(0);

            header("last-modefied: ".gmdate("D, d M Y H:i:s"));
            header("Cache-Control: no-store, no-cache, must-revalidate");
            header("Cache-Control: post-check=0, pre-check=0", false);
            header("Pragma: no-cache");
            header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
            header('Content-Disposition: attachment;filename="finance_'.'.xlsx"');
            //เปลี่ยนชื่อด้วย
            $objWriter = PHPExcel_IOFactory::createWriter($obj, 'Excel2007');
            $objWriter->save('php://output');

            $this->response([
                'status' => true,
                'response' => $result
            ],REST_Controller::HTTP_OK);
    // }
    }

    
}