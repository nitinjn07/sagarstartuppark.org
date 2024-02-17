<?php 

error_reporting(0);
ini_set('display_errors', false);
ini_set('display_startup_errors', false);

ini_set('memory_limit', '512M');
if (PHP_SAPI == 'cli')
	die('This example should only be run from a Web Browser');

require_once APPPATH.'libraries/Excel.php';

class Export_file extends CI_Controller{

	public function index(){

		$objPHPExcel = new PHPExcel();

		$objPHPExcel->setActiveSheetIndex(0)
		    ->setCellValue('A1','Name')
		    ->setCellValue('B1','Email')
		    ->setCellValue('C1','Contact')
		    ->setCellValue('D1','City')
		    ->setCellValue('E1','State')
		    ->setCellValue('F1','Zipcode')
		    ->setCellValue('G1','Verticals Sectors')
		    ->setCellValue('H1','Service Summary')
		    ->setCellValue('I1','Created');

		$startup = $this->db->order_by('id','desc')->get_where('startup', array('delstatus'=>1))->result();;

		$count = 1;

		foreach($startup as $s){

        $count++;

        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A'.$count, $s->startup_name)  
                    ->setCellValue('B'.$count, $s->email)
                    ->setCellValue('C'.$count, $s->mobile)                   
                    ->setCellValue('D'.$count, $s->city)
                    ->setCellValue('E'.$count, $s->state)   
                    ->setCellValue('F'.$count, $s->zipcode)   
                    ->setCellValue('G'.$count, $s->verticals_sectors)
                    ->setCellValue('H'.$count, $s->product_service_summary)
                    ->setCellValue('I'.$count, date('d-m-Y', strtotime($s->created_date)));

		}


		$file_name =  "startup-list-".date('d-m-Y').'.xls';

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename='.$file_name);
		header('Cache-Control: max-age=0');
		
		header('Cache-Control: max-age=1');

		header ('Cache-Control: cache, must-revalidate');
		header ('Pragma: public');

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		
		ob_end_clean();
		
		$objWriter->save('php://output');
		
		exit;
	}
	
	

	public function mentor(){
	    
		 $this->db3 = $this->load->database('front', TRUE);

		$objPHPExcel = new PHPExcel();

		$objPHPExcel->setActiveSheetIndex(0)
		    ->setCellValue('A1','Name')
		    ->setCellValue('B1','Email')
		    ->setCellValue('C1','Contact')
		    ->setCellValue('D1','No Of Mentoring Year')
		    ->setCellValue('E1','Linkedin')
		    ->setCellValue('F1','City')
		    ->setCellValue('G1','State')
		    ->setCellValue('H1','Country')
		    ->setCellValue('I1','Expert')
		    ->setCellValue('J1','Created');

		$mentor = $this->db3->order_by('id','desc')->get_where('mentor', array('delstatus'=>1))->result();

		$count = 1;

		foreach($mentor as $m){
		    
		 $exp = (($m->is_legal_expert) ? 'Legal Expert | ' : ' ').(($m->is_finance_expert) ? 'Finance Expert | ' : '').(($m->is_account_expert) ? 'Account Expert | ' : '').(($m->is_marketing_expert) ? 'Marketing Expert | ' : '').(($m->is_it_expert) ? 'IT Expert | ' : '').(($m->is_digital_marketing_expert) ? 'Digital Marketing Expert | ' : '').(($m->is_business_strategy_expert) ? 'Business Strategy Expert | ' : '').(($m->is_women_expert) ? 'Women Expert | ' : '').(($m->is_startup_expert) ? 'Startup Expert | ' : '');

        $count++;

        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A'.$count, $m->name)  
                    ->setCellValue('B'.$count, $m->email)
                    ->setCellValue('C'.$count, $m->mobile)    
                    ->setCellValue('D'.$count, $m->no_of_mentor_year)   
                    ->setCellValue('E'.$count, $m->linkedin_url)                  
                    ->setCellValue('F'.$count, $m->city)
                    ->setCellValue('G'.$count, $m->state)   
                    ->setCellValue('H'.$count, $m->country)  
                    ->setCellValue('I'.$count, $exp)  
                    ->setCellValue('J'.$count, date('d-m-Y', strtotime($m->created_date)));

		}


		$file_name =  "mentor-list-".date('d-m-Y').'.xls';

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename='.$file_name);
		header('Cache-Control: max-age=0');
		
		header('Cache-Control: max-age=1');

		header ('Cache-Control: cache, must-revalidate');
		header ('Pragma: public');

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		
		ob_end_clean();
		
		$objWriter->save('php://output');
		
		exit;
	}
	
	public function hackthon_list(){

		$objPHPExcel = new PHPExcel();

		$objPHPExcel->setActiveSheetIndex(0)
		    ->setCellValue('A1','Startup Name')
		    ->setCellValue('B1','Founder Name')
		    ->setCellValue('C1','Email ')
		    ->setCellValue('D1','Contact')
		    ->setCellValue('E1','City ')
		    ->setCellValue('F1','Idea');

		$startup = $this->db->order_by('id','desc')->get('hackfest')->result();;

		$count = 1;

		foreach($startup as $s){

        $count++;

        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A'.$count, $s->startupname)  
                    ->setCellValue('B'.$count, $s->foundername)
                    ->setCellValue('C'.$count, $s->emailid)                   
                    ->setCellValue('D'.$count, $s->mobileno)
                    ->setCellValue('E'.$count, $s->cityname)   
                    ->setCellValue('F'.$count, $s->idea);

		}


		$file_name =  "hackfest-list-".date('d-m-Y').'.xls';

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename='.$file_name);
		header('Cache-Control: max-age=0');
		
		header('Cache-Control: max-age=1');

		header ('Cache-Control: cache, must-revalidate');
		header ('Pragma: public');

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		
		ob_end_clean();
		
		$objWriter->save('php://output');
		
		exit;
	}

}