<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @package : Ramom school management system
 * @version : 4.0
 * @developed by : RamomCoder
 * @support : ramomcoder@yahoo.com
 * @author url : http://codecanyon.net/user/RamomCoder
 * @filename : Dashboard.php
 * @copyright : Reserved RamomCoder Team
 */

class Admission extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admission_model');
    }

    public function index()
    {
        $user_id = $this->session->userdata('loggedin_userid');
        $student_data = $this->Admission_model->get_student_id_by_email($user_id);
        $this->data['admission_details'] = $this->Admission_model->get_admission_detail($student_data['email']);
        $this->data['title'] = translate('admission');
        $this->data['sub_page'] = 'admission/show';
        $this->data['main_menu'] = 'Admission';
        $this->load->view('layout/index', $this->data);
    }
}