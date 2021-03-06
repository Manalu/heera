<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!check_login()) {
            redirect('home/login');
        }
    }

    public function index() {

        $data = array();
        $data['page_title'] = 'Dashboard';
        $data['tabActive'] = 'dashboard';
        $data['error'] = '';

        $loginId = $this->session->userdata('login_id');
        $user_info= $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $data['lenderFundingDeatails'] =  $this->global_model->lendersOutstanding($loginId);


        if($user_info['profession'] == 1){

            //// Funded get table

            $landerfundloop  = $this->global_model->get('project_fund_history', array('fundedBy' => $loginId ));
            if(!empty($landerfundloop)) {
                foreach ($landerfundloop as $landerfund) {
                    /// get id from loop
                    $projectid = $landerfund->projectID;
                    $landerfund->fundedAmount;
                    $landerfund->fundedBy = $this->global_model->get('project', array('projectID' => $projectid));

                }
            }


            $data['getanderproject'] = $this->global_model->get('project_fund_history', array('fundedBy' => $loginId));
        }else {

        }


        $this->load->view('header', $data);
        $this->load->view('profile/dashboard', $data);
        $this->load->view('footer');
    }

}

?>
