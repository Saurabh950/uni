<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @package : Ramom school management system
 * @version : 4.0
 * @developed by : RamomCoder
 * @support : ramomcoder@yahoo.com
 * @author url : http://codecanyon.net/user/RamomCoder
 * @filename : Student.php
 * @copyright : Reserved RamomCoder Team
 */

class Agent extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helpers('download');
        $this->load->helpers('custom_fields');
        $this->load->model('student_model');
        $this->load->model('email_model');
        $this->load->model('sms_model');
        $this->load->helper('string');
    }

    public function index()
    {
        redirect(base_url('agent/view'));
    }

    public function add()
    {
        // check access permission
        if (!get_permission('agent', 'is_add')) {
            access_denied();
        }
        if (isset($_POST['save'])) {
            $this->form_validation->set_rules('agent_name', translate('name'), 'trim|required');
            $this->form_validation->set_rules('email', translate('email'), 'trim|required');
            $this->form_validation->set_rules('mobile_no', translate('mobile no'), 'trim|required');
            $this->form_validation->set_rules('city', translate('city'), 'trim|required');
            $this->form_validation->set_rules('state', translate('state'), 'trim|required');
            $this->form_validation->set_rules('address', translate('address'), 'trim|required');
            $this->form_validation->set_rules('status', translate('status'), 'trim|required');

            if ($this->form_validation->run() == true) {

                $password = random_string('alnum', 4);
                $password = '1234';

                $arrayAgent = array(
                    'agent_name' => $this->input->post('agent_name'),
                    'agent_code' => '',
                    'email' => $this->input->post('email'),
                    'password' => $this->app_lib->pass_hashed($password),
                    'mobile_no' => $this->input->post('mobile_no'),
                    'city' => $this->input->post('city'),
                    'state' => $this->input->post('state'),
                    'address' => $this->input->post('address'),
                    'status' => $this->input->post('status'),
                );

                $result = $this->db->insert('agents', $arrayAgent);
                $insert_id = $this->db->insert_id();

                // // handle custom fields data
                // $class_slug = $this->router->fetch_class();
                // $customField = $this->input->post("custom_fields[$class_slug]");
                // if (!empty($customField)) {
                //     saveCustomFields($customField, $studentID);
                // }

                if ($result) {
                    $name = explode(" ", $this->input->post('agent_name'));

                    $agent_data = array(
                        'agent_code' => strtolower($name[0]) . (7 * $insert_id),
                    );
                    $this->db->where('id', $insert_id)->update('agents', $agent_data);

                    $inser_data2 = array(
                        'username' => $agent_data["agent_code"],
                        'password' => $arrayAgent['password'],
                        'role' => 9,
                        'active' => 1,
                        'user_id' => $insert_id
                    );
                    $this->db->insert('login_credential', $inser_data2);
                    set_alert('success', translate('information_has_been_saved_successfully'));
                    redirect(base_url('agent/add'));
                } else {
                    set_alert('error', translate('Error occured in adding data'));
                    redirect(base_url('agent/add'));
                }

            }
        }
        // $this->data['getBranch'] = $getBranch;
        // $this->data['branch_id'] = $branchID;
        $this->data['sub_page'] = 'agent/add';
        $this->data['main_menu'] = 'agent';
        // $this->data['register_id'] = $this->student_model->regSerNumber();
        $this->data['title'] = 'Create Agent';
        $this->data['headerelements'] = array(
            'css' => array(
                'vendor/dropify/css/dropify.min.css',
            ),
            'js' => array(
                'js/student.js',
                'vendor/dropify/js/dropify.min.js',
            ),
        );
        $this->load->view('layout/index', $this->data);
    }

    public function edit($id = '')
    {
        // check access permission
        if (!get_permission('agent', 'is_edit')) {
            access_denied();
        }
        if (isset($_POST['update'])) {
            $this->form_validation->set_rules('agent_name', translate('name'), 'trim|required');
            $this->form_validation->set_rules('email', translate('email'), 'trim|required');
            $this->form_validation->set_rules('mobile_no', translate('mobile no'), 'trim|required');
            $this->form_validation->set_rules('city', translate('city'), 'trim|required');
            $this->form_validation->set_rules('state', translate('state'), 'trim|required');
            $this->form_validation->set_rules('address', translate('address'), 'trim|required');
            $this->form_validation->set_rules('status', translate('status'), 'trim|required');

            if ($this->form_validation->run() == true) {

                $arrayAgent = array(
                    'agent_name' => $this->input->post('agent_name'),
                    'email' => $this->input->post('email'),
                    'mobile_no' => $this->input->post('mobile_no'),
                    'city' => $this->input->post('city'),
                    'state' => $this->input->post('state'),
                    'address' => $this->input->post('address'),
                    'status' => $this->input->post('status'),
                );

                $result = $this->db->where('id', $id)->update('agents', $arrayAgent);
                // // handle custom fields data
                // $class_slug = $this->router->fetch_class();
                // $customField = $this->input->post("custom_fields[$class_slug]");
                // if (!empty($customField)) {
                //     saveCustomFields($customField, $studentID);
                // }

                if ($result) {
                    set_alert('success', translate('information_has_been_saved_successfully'));
                    redirect(base_url('agent/edit/'.$id));
                } else {
                    set_alert('error', translate('Error occured in adding data'));
                    redirect(base_url('agent/edit/'.$id));
                }

            }
        }

        $agentData = $this->data['agents'] = $this->db->select('*')->where('id', $id)->get('agents')->row();

        // $this->data['getBranch'] = $getBranch;
        // $this->data['branch_id'] = $branchID;
        $this->data['sub_page'] = 'agent/edit';
        $this->data['main_menu'] = 'agent';
        $this->data['title'] = 'Update Agent';
        $this->data['agent_data'] = $agentData;
        $this->data['headerelements'] = array(
            'css' => array(
                'vendor/dropify/css/dropify.min.css',
            ),
            'js' => array(
                'js/student.js',
                'vendor/dropify/js/dropify.min.js',
            ),
        );
        $this->load->view('layout/index', $this->data);
    }

    /* showing agent list by class and section */
    public function view()
    {
        // check access permission
        if (!get_permission('agent', 'is_view')) {
            access_denied();
        }

        $branchID = $this->application_model->get_branch_id();
        if (isset($_POST['search'])) {
            $classID = $this->input->post('class_id');
            $sectionID = $this->input->post('section_id');
            $this->data['students'] = $this->application_model->getStudentListByClassSection($classID, $sectionID, $branchID, false, true);
        }

        $this->data['agents'] = $this->db->select('*')->get('agents')->result();

        // $this->data['branch_id'] = $branchID;
        $this->data['title'] = 'Agent List';
        $this->data['main_menu'] = 'agent';
        $this->data['sub_page'] = 'agent/view';
        $this->data['headerelements'] = array(
            'js' => array(
                'js/student.js',
            ),
        );
        $this->load->view('layout/index', $this->data);
    }

    /* profile preview and information are updating here */

}
