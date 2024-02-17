<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MentorConnect extends CI_Controller {
   
   public function index()
   {
       $this->load->view('pages/mentor-connect');
   }
   function __construct() {
        parent::__construct();
		$this->output->delete_cache();
    }
    
    public function connectMeetingStepOne()
    {
        extract($_GET);      
        
        $data = array('startupid'=>$sid,
                      'mentorid'=>$mid,
                      'industry'=>$industry);

        $_SESSION['step_one'] = $data;

        $this->load->view('pages/mentor-step2');
    }


    public function connectMeeting()
    {
        extract($_POST);

        $m = explode("/",$meeting_date);  //m d y



        $meeting_date = $m[2]."-".$m[0]."-".$m[1];
        
        $data = array('meeting_date'=>$meeting_date,
                      'meeting_start'=>$meeting_start,
                      'meeting_end'=>$meeting_end,
                      'meeting_purpose'=>$meeting_purpose,
                      'startupid'=>$startupid,
                      'mentorid'=>$mentorid);

       $check = $this->db->get_where('mentor_connect',array('startupid'=>$startupid,'meeting_date'=>$meeting_date,'meeting_start'=>$meeting_start));              
      
       if($check->num_rows()==0)
       {

       $rs = $this->db->insert('mentor_connect',$data);
       if($rs)
       {
        $this->session->set_flashdata("success","Meeting Request Sent Successfull");
        redirect(base_url().'MentorConnect');
        
       }
        }
        else {
            $this->session->set_flashdata("failed","This meeting already schedule");
            redirect(base_url().'MentorConnect');
        }
    }
    public function MentorRequested()
    {
        $this->load->view('pages/new-mentor-request-list');
    }
    public function NewRequest()
    {
        extract($_POST);
        $s = $this->db->get_where('startup',array('email'=>$_SESSION['username']))->row();

        $data = array('category'=>$category,'problem'=>$problem,'startup_id'=>$s->id);
        
        $rs = $this->db->insert('new_mentor_request',$data);
        if($rs)
        {
         $this->session->set_flashdata("success","New Mentor Request Sent Successfull");
         redirect(base_url().'MentorConnect');
         
        }
         
         else {
             $this->session->set_flashdata("failed","New Mentor Request Not Submitted");
             redirect(base_url().'MentorConnect');
         }
    }

    public function getMeetingList()
    {
        $s = $this->db->get_where('startup',array('email'=>$_SESSION['username']))->row();
        $meeting['meeting'] = $this->db->get_where('mentor_connect',array('startupid'=>$s->id))->result();       
        
        $this->load->view('pages/meeting-list',$meeting);
    }
    public function getMentor()
    {

        $category = $_POST['category'];

        if($category=='legal_expert')
        {
            $where = array('is_legal_expert'=>1);
        }
        if($category=='finance_expert')
        {
            $where = array('is_finance_expert'=>1);
        }
        if($category=='account_expert')
        {
            $where = array('is_account_expert'=>1);
        }
        if($category=='marketing_expert')
        {
            $where = array('is_market_expert'=>1);
        }
        if($category=='it_expert')
        {
            $where = array('is_it_expert'=>1);
        }
        if($category=='digital_marketing_expert')
        {
            $where = array('is_digital_marketing_expert'=>1);
        }
        if($category=='business_strategy_expert')
        {
            $where = array('is_business_strategy_expert'=>1);
        }        
         if($category=='startup_expert')
        {
            $where = array('is_startup_expert'=>1);
        }
           if($category=='softskill_expert')
        {
            $where = array('is_softskill_expert'=>1);
        }
       


        $mentor = $this->db->get_where('mentor',$where)->result();

        $startup = $this->db->get_where('startup',array('email'=>$_SESSION['username']))->row();


        foreach($mentor as $m)
        {
            
            if($m->delstatus==1 && $m->action=='accepted')
            {
        ?>
<div class='col-md-4 text-center'>
    <div class='card'>
        <div class='card-header text-center'>
            <img src='<?php
                if($m->user_pic_url==null)
                {
                  echo "https://t3.ftcdn.net/jpg/03/46/83/96/360_F_346839683_6nAPzbhpSkIpb8pmAwufkC7c5eD7wYws.jpg";
                }
                else 
                {
                    echo base_url('../uploads/mentor/').$m->user_pic_url;
                }
               
               ?>' width='100px' height='100px' class='rounded-circle' />
        </div>
        <div class='card-body text-center'>
            <h4><?=$m->name;?></h4>
            <p><a href=""><i class="fa fa-linkedin"></i></a></p>
        </div>
        <div class='card-footer'>
            <a href="<?=base_url();?>MentorConnect/connectMeetingStepOne?sid=<?=$startup->id;?>&&mid=<?=$m->id;?>&&industry=<?=$category;?>"
                class="btn btn-primary">Select
                Mentor</a>
        </div>
    </div>
</div>
<?php
}
        }
        ?>


<?php
        

}
}

?>