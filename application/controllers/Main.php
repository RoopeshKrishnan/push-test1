<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	
	public function index()
	{
        $table = 'item';
        $all_item = $this->crud->fetch_all($table);
        $data['items'] = $all_item->result();

        $config['base_url'] = base_url('main/index');
        $config['total_rows'] = $this->db->count_all('customer_registration');
        $config['per_page'] = 2;
        $this->pagination->initialize($config);
        // Calculate the limit and offset values
        $limit = $config['per_page'];
        $offset = $this->uri->segment(3);
        // Retrieve the rows for the current page
        $this->db->limit($limit, $offset);
        $query = $this->db->get('customer_registration');

        $data['customers'] = $query->result();

        $data['link']= $this->pagination->create_links();

        $data['active'] = 'customer';
        // $table = 'customer_registration';
        // $all_cust = $this->crud->fetch_all($table);
        // $data['customers'] = $all_cust->result();

        $this->load->view('header',$data);
		$this->load->view('customer_registration',$data);
	}

    public function cus_reg(){

        date_default_timezone_set('Asia/Kolkata'); 
        $date = date('Y-m-d H:i:s');
        $table = 'customer_registration';

        $is_empty_query= $this->db->query('select exists(select 1 from customer_registration) AS Output')->row();

        $is_empty = $is_empty_query->Output;

        if($is_empty == 0){

            $customer_id = 'CUS0000001';

        }else{

            $last_id_query= $this->db->query('SELECT customer_id FROM customer_registration ORDER BY cust_id DESC LIMIT 1;')->row();
            $last_id = $last_id_query->customer_id;

            $customer_id = ++$last_id;
        }

        $cust_record = [
            "customer_id" => $customer_id,
            "name" => $this->input->post(('name')),
            "address" => $this->input->post(('address')),
            "age" => $this->input->post(('age')),
            "number" => $this->input->post(('number')),
            "email_id" => $this->input->post(('email')),
            "date" => $date,         
        ];


        if($this->input->post('item')){

            $table_name = 'enquiry';
            $item_query = $this->db->where('item_id',$this->input->post('item'))->get('item')->row();

            $enq_record = [
                "customer_id" => $customer_id,
                "customer_name" => $this->input->post(('name')),
                "customer_phone" => $this->input->post(('number')),
                "item_id" => $this->input->post(('item')),
                "item_code" => $item_query->code,
                "item_name" => $item_query->item_name,
                "item_tax" => $item_query->tax,
                "item_priority" => $this->input->post(('priority')),
                "assign_date" => $date,         
            ];


            // $this->main_model->insert_section($enq_record,$table_name);
            $this->crud->insert($table_name, $enq_record);
        }



        // $check_insertion= $this->main_model->insert_section($cust_record,$table);
        $check_insertion= $this->crud->insert($table, $cust_record);


        if($check_insertion){

            $this->session->set_flashdata('reg','Registered');
            redirect('main/index');
        }

    }



    public function item()
	{

        $table = 'customer_registration';
        $all_cust = $this->crud->fetch_all($table);
        $data['customers'] = $all_cust->result();
        $data['active'] = 'item';

        $this->load->view('header',$data);
		$this->load->view('item_creation',$data);
	}


    public function item_creation(){

        date_default_timezone_set('Asia/Kolkata'); 
        $date = date('Y-m-d H:i:s');
        $table = 'item';

        $is_empty_query= $this->db->query('select exists(select 1 from item) AS Output')->row();

        $is_empty = $is_empty_query->Output;

        if($is_empty == 0){

            $item_id = 'ITM0000001';

        }else{

            $last_id_query= $this->db->query('SELECT item_id FROM item ORDER BY item_auto_id DESC LIMIT 1;')->row();
            $last_id = $last_id_query->item_id;

            $item_id = ++$last_id;
        }

        $item_record = [
            "item_id" => $item_id,
            "item_name" => $this->input->post(('item_name')),
            "code" => $this->input->post(('item_code')),
            "tax" => $this->input->post(('tax')),
            "date" => $date,         
        ];

        // $check_insertion= $this->main_model->insert_section($item_record,$table);
        $check_insertion= $this->crud->insert($table, $item_record);


        if($this->input->post('customer')){

            $table_name = 'enquiry';
            $cust_query = $this->db->where('customer_id',$this->input->post('customer'))->get('customer_registration')->row();

            $enq_record = [
                "customer_id" => $this->input->post(('customer')),
                "customer_name" => $cust_query->name,
                "customer_phone" => $cust_query->number,
                "item_id" => $item_id,
                "item_code" => $this->input->post(('item_code')),
                "item_name" => $this->input->post(('item_name')),
                "item_tax" =>  $this->input->post(('tax')),
                "item_priority" => $this->input->post(('priority')),
                "assign_date" => $date,         
            ];


            // $this->main_model->insert_section($enq_record,$table_name);
            $this->crud->insert($table_name, $enq_record);

        }

        if($check_insertion){

            $this->session->set_flashdata('item_reg','Item Created');
            redirect('main/item');
        }
    }

 public function test(){

    $table = 'item';
    $all_item = $this->crud->fetch_all($table);
    $data['items'] = $all_item->result();

    $query= $this->db->select('item_id')->where('customer_id','CUS0000001')->get('enquiry');
    $data['filter'] = $query->result();
    $this->load->view('welcome_message',$data);
 }



 public function test_lib(){

    date_default_timezone_set('Asia/Kolkata'); 
    $date = date('Y-m-d H:i:s');
    $table = 'test_lib';

    $data = array(
            "name" => $this->input->post(('name')),
            "age" => $this->input->post(('age')),
            "date" => $date
    );
    $insert_id = $this->crud->insert($table, $data);    
 }


 public function rent(){

    $table = 'customer_registration';
    $all_cust = $this->crud->fetch_all($table);
    $data['customers'] = $all_cust->result();
    $data['active'] = 'rent';

    $this->load->view('header',$data);
    $this->load->view('rent',$data);

 }


 public function fetch_rent_item(){

    $cust_id = $this->input->post('drop1');

    $this->db->where('customer_id',$cust_id);
    $select = $this->db->get('enquiry');
    $select_query= $select->result();
  
     echo ' <select name="item" id="item"> 
                <option disabled selected >--select--</option>';

                foreach($select_query as $row4){

                    $po_id = $row4->item_id;
                    $postoffice = $row4->item_name;
                    echo '<option value="'.$po_id.'">'.$postoffice.'</option>';
                }
     echo '</select> '; 
 }


 public function rent_op(){

    date_default_timezone_set('Asia/Kolkata'); 
    $date = date('Y-m-d H:i:s');
    $table_name = 'rent';

    $rent_record = [
        "unit_type" => $this->input->post(('unit_type')),
        "rent_collection_amount" => $this->input->post(('rent_amount')),
        "start_date" => $this->input->post(('rent_sdate')),
        "end_date" => $this->input->post(('rent_edate')),
        "customer_id" => $this->input->post(('customer')),
        "item_id" => $this->input->post(('item')),
        "duration" => $this->input->post(('duration')),
        "assign_date" => $this->input->post(('rent_assign')),
        "next_rent_date" => $this->input->post(('next_rent')),
        "over_draft" => $this->input->post(('rent_overdraft')),
        "created_date" => $date,

    ];

   $check_insertion=  $this->crud->insert($table_name, $rent_record);

    if($check_insertion){

        $this->session->set_flashdata('rent_reg','Rent Created');
        redirect('main/rent');
    }
 }


 public function fetch_end_date(){

    $rent_sdate = $this->input->post('rent_sdate');
    $unit_type = $this->input->post('unit_type');
    $duration = $this->input->post('duration');

    if($unit_type == 'dayily'){
        $end_date = date('Y-m-d', strtotime($rent_sdate. ' + '.$duration.' day'));
    }elseif($unit_type == 'weekly'){
		$end_date = date('Y-m-d', strtotime($rent_sdate. ' + '.$duration.' week'));
    }elseif($unit_type == 'monthly'){
		$end_date = date('Y-m-d', strtotime($rent_sdate. ' + '.$duration.' month'));
    }elseif($unit_type == 'yearly'){
		$end_date = date('Y-m-d', strtotime($rent_sdate. ' + '.$duration.' year'));
    }

    // $date = date('d-m-Y',$end_date);
    // $date= date("d/m/Y", strtotime($end_date));
    // echo $date;
        echo $end_date;
 }


 public function fetch_nextrent_date(){

    $rent_assign = $this->input->post('rent_assign');
    $unit_type = $this->input->post('unit_type');
    $duration = 1;

    if($unit_type == 'dayily'){
        $next_rent_date = date('Y-m-d', strtotime($rent_assign. ' + '.$duration.' day'));
    }elseif($unit_type == 'weekly'){
		$next_rent_date = date('Y-m-d', strtotime($rent_assign. ' + '.$duration.' week'));
    }elseif($unit_type == 'monthly'){
		$next_rent_date = date('Y-m-d', strtotime($rent_assign. ' + '.$duration.' month'));
    }elseif($unit_type == 'yearly'){
		$next_rent_date = date('Y-m-d', strtotime($rent_assign. ' + '.$duration.' year'));
    }

    // $date = date('d-m-Y',$end_date);
    // $date= date("d/m/Y", strtotime($end_date));
    // echo $date;
        echo $next_rent_date;
 }



 // end of controller
}
