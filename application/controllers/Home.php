<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @package : Ramom school management system
 * @version : 4.0
 * @developed by : RamomCoder
 * @support : ramomcoder@yahoo.com
 * @author url : http://codecanyon.net/user/RamomCoder
 * @filename : Home.php
 * @copyright : Reserved RamomCoder Team
 */

class Home extends Frontend_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helpers('custom_fields');
        $this->load->model('email_model');
        $this->load->model('testimonial_model');
        $this->load->model('student_model');
        $this->load->model('gallery_model');
        $this->load->library('mailer');
    }

    public function index()
    {
        $this->home();
    }

    public function home()
    {
        $branchID = $this->home_model->getDefaultBranch();
        $this->data['branchID'] = $branchID;
        $this->data['sliders'] = $this->home_model->getCmsHome('slider', $branchID, 1, false);
        $this->data['features'] = $this->home_model->getCmsHome('features', $branchID, 1, false);
        $this->data['wellcome'] = $this->home_model->getCmsHome('wellcome', $branchID);
        $this->data['teachers'] = $this->home_model->getCmsHome('teachers', $branchID);
        $this->data['testimonial'] = $this->home_model->getCmsHome('testimonial', $branchID);
        $this->data['services'] = $this->home_model->getCmsHome('services', $branchID);
        $this->data['cta_box'] = $this->home_model->getCmsHome('cta', $branchID);
        $this->data['statistics'] = $this->home_model->getCmsHome('statistics', $branchID);
        $this->data['page_data'] = $this->home_model->get('front_cms_home_seo', array('branch_id' => $branchID), true);
        $this->data['main_contents'] = $this->load->view('home/index', $this->data, true);
        $this->load->view('home/layout/index', $this->data);
    }

    public function about()
    {
        $branchID = $this->home_model->getDefaultBranch();
        $this->data['branchID'] = $branchID;
        $this->data['page_data'] = $this->home_model->get('front_cms_about', array('branch_id' => $branchID), true);
        $this->data['main_contents'] = $this->load->view('home/about', $this->data, true);
        $this->load->view('home/layout/index', $this->data);
    }

    public function faq()
    {
        $branchID = $this->home_model->getDefaultBranch();
        $this->data['branchID'] = $branchID;
        $this->data['page_data'] = $this->home_model->get('front_cms_faq', array('branch_id' => $branchID), true);
        $this->data['main_contents'] = $this->load->view('home/faq', $this->data, true);
        $this->load->view('home/layout/index', $this->data);
    }

    public function events()
    {
        $branchID = $this->home_model->getDefaultBranch();
        $this->data['branchID'] = $branchID;
        $this->data['page_data'] = $this->home_model->get('front_cms_events', array('branch_id' => $branchID), true);
        $this->data['main_contents'] = $this->load->view('home/events', $this->data, true);
        $this->load->view('home/layout/index', $this->data);
    }

    public function event_view($id)
    {
        $branchID = $this->home_model->getDefaultBranch();
        $this->data['branchID'] = $branchID;
        $this->data['event'] = $this->home_model->get('event', array('id' => $id, 'branch_id' => $branchID, 'status' => 1, 'show_web' => 1), true);
        $this->data['page_data'] = $this->home_model->get('front_cms_events', array('branch_id' => $branchID), true);
        $this->data['main_contents'] = $this->load->view('home/event_view', $this->data, true);
        $this->load->view('home/layout/index', $this->data);
    }

    public function teachers()
    {
        $branchID = $this->home_model->getDefaultBranch();
        $this->data['branchID'] = $branchID;
        $this->data['page_data'] = $this->home_model->get('front_cms_teachers', array('branch_id' => $branchID), true);
        $this->data['departments'] = $this->home_model->get_teacher_departments($branchID);
        $this->data['doctor_list'] = $this->home_model->get_teacher_list("", $branchID);
        $this->data['main_contents'] = $this->load->view('home/teachers', $this->data, true);
        $this->load->view('home/layout/index', $this->data);
    }

    public function admission()
    {

        if (!$this->data['cms_setting']['online_admission']) {
            redirect(site_url('home'));
        }
        $branchID = $this->home_model->getDefaultBranch();
        $captcha = $this->data['cms_setting']['captcha_status'];
        if ($captcha == 'enable') {
            $this->load->library('recaptcha');
            $this->data['recaptcha'] = array(
                'widget' => $this->recaptcha->getWidget(),
                'script' => $this->recaptcha->getScriptTag(),
            );
        }
        if ($_POST) {
            $this->form_validation->set_rules('full_name', translate('full_name'), 'trim|required');
            $this->form_validation->set_rules('full_hindi_name', translate('full_hindi_name'), 'trim|required');
            $this->form_validation->set_rules('father_name', translate('father_name'), 'trim|required');
            $this->form_validation->set_rules('father_hindi_name', translate('father_ hindi_name'), 'trim|required');
            $this->form_validation->set_rules('mother_name', translate('mother_name'), 'trim|required');
            $this->form_validation->set_rules('mother_hindi_name', translate('mother_hindi_name'), 'trim|required');
            $this->form_validation->set_rules('email', translate('email'), 'trim|required|valid_email');
            $this->form_validation->set_rules('mobile_no', translate('mobile_no'), 'trim|required');
            $this->form_validation->set_rules('gender', translate('gender'), 'trim|required');
            $this->form_validation->set_rules('blood_group', translate('blood_group'), 'trim|required');
            $this->form_validation->set_rules('birthday', translate('birthday'), 'trim|required');
            $this->form_validation->set_rules('marital_status', translate('marital_status'), 'trim|required');

            $this->form_validation->set_rules('religion', translate('religion'), 'trim|required');
            $this->form_validation->set_rules('id_type', translate('id_type'), 'trim|required');
            $this->form_validation->set_rules('other_id', translate('other_id'), 'trim|required');
            $this->form_validation->set_rules('id_card_number', translate('id_card_number'), 'trim|required');
            $this->form_validation->set_rules('id_mark', translate('id_mark'), 'trim|required');
            $this->form_validation->set_rules('nationality', translate('nationality'), 'trim|required');
            $this->form_validation->set_rules('nri_status', translate('nri_status'), 'trim|required');
            $this->form_validation->set_rules('state_native', translate('state_native'), 'trim|required');
            $this->form_validation->set_rules('caste_category', translate('caste_category'), 'trim|required');
            $this->form_validation->set_rules('ews', translate('ews'), 'trim|required');
            $this->form_validation->set_rules('bpl', translate('bpl'), 'trim|required');
            $this->form_validation->set_rules('diff_abled', translate('diff_abled'), 'trim|required');
            $this->form_validation->set_rules('kashmir_migrants', translate('kashmir_migrants'), 'trim|required');
            $this->form_validation->set_rules('ncc', translate('ncc'), 'trim|required');
            $this->form_validation->set_rules('nss_volunteer', translate('nss_volunteer'), 'trim|required');
            $this->form_validation->set_rules('extra_curricular', translate('extra_curricular'), 'trim|required');
            $this->form_validation->set_rules('exservice_dependent', translate('exservice_dependent'), 'trim|required');
            $this->form_validation->set_rules('range_rover', translate('blood_group'), 'trim|required');
            $this->form_validation->set_rules('institute_relative', translate('institute_relative'), 'trim|required');
            $this->form_validation->set_rules('address', translate('address'), 'trim|required');
            $this->form_validation->set_rules('city', translate('city'), 'trim|required');
            $this->form_validation->set_rules('state', translate('state'), 'trim|required');
            $this->form_validation->set_rules('district', translate('district'), 'trim|required');
            $this->form_validation->set_rules('pincode', translate('pincode'), 'trim|required');
            $this->form_validation->set_rules('present_address', translate('present_address'), 'trim|required');
            $this->form_validation->set_rules('present_city', translate('present_city'), 'trim|required');
            $this->form_validation->set_rules('present_state', translate('present_state'), 'trim|required');
            $this->form_validation->set_rules('present_district', translate('present_district'), 'trim|required');
            $this->form_validation->set_rules('present_pincode', translate('present_pincode'), 'trim|required');

            $this->form_validation->set_rules('profile_pic', 'profile_picture', array(array('profile_pic', array($this->application_model, 'onlineAdmissionProfilePic'))));
            $this->form_validation->set_rules('profile_sign', 'signature', array(array('profile_sign', array($this->application_model, 'onlineAdmissionProfileSign'))));

            if ($_POST['bpl'] == 'YES') {
                $this->form_validation->set_rules('bpl_number', translate('bpl_number'), 'trim|required');
            }
            if ($_POST['diff_abled'] !== 'No' && $_POST['diff_abled'] !== '') {
                $this->form_validation->set_rules('disability_percentage', translate('disability_percentage'), 'trim|required');
            }
            if ($_POST['institute_relative'] == 'YES') {
                $this->form_validation->set_rules('staff_relation', translate('staff_relation'), 'trim|required');
            }
            if ($_POST['institute_relative'] == 'YES') {
                $this->form_validation->set_rules('staff_name', translate('staff_name'), 'trim|required');
            }
            if ($_POST['institute_relative'] == 'YES') {
                $this->form_validation->set_rules('staff_post', translate('staff_post'), 'trim|required');
            }
            if ($_POST['institute_relative'] == 'YES') {
                $this->form_validation->set_rules('staff_college_name', translate('staff_college_name'), 'trim|required');
            }
            if ($_POST['ews']) {
                $this->form_validation->set_rules('ews', translate('ews'), 'trim|required');
            }

            if ($captcha == 'enable') {
                $this->form_validation->set_rules('g-recaptcha-response', 'Captcha', 'trim|required');
            }
            // custom fields validation rules
            $customFields = getCustomFields('online_admission', $branchID);
            foreach ($customFields as $fields_key => $fields_value) {
                if ($fields_value['required']) {
                    $fieldsID = $fields_value['id'];
                    $fieldLabel = $fields_value['field_label'];
                    $this->form_validation->set_rules("custom_fields[online_admission][" . $fieldsID . "]", $fieldLabel, 'trim|required');
                }
            }

            if ($this->form_validation->run() == true) {
                $arrayData = array(
                    'full_name' => $this->input->post('full_name'),
                    'full_hindi_name' => $this->input->post('full_hindi_name'),
                    'email' => $this->input->post('email'),
                    'mobile_no' => $this->input->post('mobile_no'),
                    'father_name' => $this->input->post('father_name'),
                    'father_hindi_name' => $this->input->post('father_hindi_name'),
                    'mother_name' => $this->input->post('mother_name'),
                    'mother_hindi_name' => $this->input->post('mother_hindi_name'),
                    'gender' => $this->input->post('gender'),
                    'blood_group' => $this->input->post('blood_group'),
                    'birthday' => $this->input->post('birthday'),
                    'marital_status' => $this->input->post('marital_status'),
                    'religion' => $this->input->post('religion'),
                    'id_type' => $this->input->post('id_type'),
                    'other_id' => $this->input->post('other_id'),
                    'id_card_number' => $this->input->post('id_card_number'),
                    'id_mark' => $this->input->post('id_mark'),
                    'nationality' => $this->input->post('nationality'),
                    'nri_status' => $this->input->post('nri_status'),
                    'state_native' => $this->input->post('state_native'),
                    'caste_category' => $this->input->post('caste_category'),
                    'ews' => $this->input->post('ews'),
                    'bpl' => $this->input->post('bpl'),
                    'diff_abled' => $this->input->post('diff_abled'),
                    'kashmir_migrants' => $this->input->post('kashmir_migrants'),
                    'ncc' => $this->input->post('ncc'),
                    'nss_volunteer' => $this->input->post('nss_volunteer'),
                    'extra_curricular' => $this->input->post('extra_curricular'),
                    'exservice_dependent' => $this->input->post('exservice_dependent'),
                    'range_rover' => $this->input->post('range_rover'),
                    'institute_relative' => $this->input->post('institute_relative'),
                    'address' => $this->input->post('address'),
                    'city' => $this->input->post('city'),
                    'state' => $this->input->post('state'),
                    'district' => $this->input->post('district'),
                    'pincode' => $this->input->post('pincode'),
                    'present_address' => $this->input->post('present_address'),
                    'present_city' => $this->input->post('present_city'),
                    'present_state' => $this->input->post('present_state'),
                    'present_district' => $this->input->post('present_district'),
                    'present_pincode' => $this->input->post('present_pincode'),
                    'profile_pic' => 'asad',
                    'profile_sign' => 'asad',
                    'apply_date' => date("Y-m-d H:i:s"),
                    'form_no' => 1,
                );

                if (isset($_POST['bpl_number'])) {
                    $arrayData['bpl_number'] = $this->input->post('bpl_number');
                }
                if (isset($_POST['disability_percentage'])) {
                    $arrayData['disability_percentage'] = $this->input->post('disability_percentage');
                }
                if (isset($_POST['staff_relation'])) {
                    $arrayData['staff_relation'] = $this->input->post('staff_relation');
                }
                if (isset($_POST['staff_name'])) {
                    $arrayData['staff_name'] = $this->input->post('staff_name');
                }
                if (isset($_POST['staff_post'])) {
                    $arrayData['staff_post'] = $this->input->post('staff_post');
                }
                if (isset($_POST['staff_college_name'])) {
                    $arrayData['staff_college_name'] = $this->input->post('staff_college_name');
                }
                if (isset($_POST['ews'])) {
                    $arrayData['ews'] = $this->input->post('ews');
                }

                $config['upload_path'] = './uploads/online_form/';
                $config['allowed_types'] = '*';
                $config['encrypt_name'] = true;
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('profile_pic')) {
                    $error = array('error' => $this->upload->display_errors());
                } else {
                    $data = $this->upload->data();
                    $arrayData['profile_pic'] = $data['file_name'];
                }

                if (!$this->upload->do_upload('profile_sign')) {
                    $error = array('error' => $this->upload->display_errors());
                } else {
                    $data = $this->upload->data();
                    $arrayData['profile_sign'] = $data['file_name'];
                }

                $this->session->set_userdata($arrayData);

                // $this->db->insert('online_admission', $arrayData);
                // $studentID = $this->db->insert_id();

                // // handle custom fields data
                // $class_slug = 'online_admission';
                // $customField = $this->input->post("custom_fields[$class_slug]");
                // if (!empty($customField)) {
                //     saveCustomFields($customField, $studentID);
                // }
                // check out admission payment status
                // $this->load->model('admissionpayment_model');
                // $getStudent = $this->admissionpayment_model->getStudentDetails($studentID);
                // if ($getStudent['fee_elements']['status'] == 0) {
                //     $url = base_url("home/admission_confirmation/" . $studentID);

                //    // applicant email send
                //     $arrayData['institute_name'] = get_type_name_by_id('branch', $arrayData['branch_id']);
                //     $arrayData['admission_id'] = $studentID;
                //     $arrayData['student_name'] = $arrayData['first_name'] . " " . $arrayData['last_name'];
                //     $arrayData['class_name'] = get_type_name_by_id('class', $arrayData['class_id']);
                //     $arrayData['section_name'] = get_type_name_by_id('section', $arrayData['section_id']);
                //     $arrayData['payment_url'] = "";
                //     $arrayData['admission_copy_url'] = $url;
                //     $arrayData['paid_amount'] = 0;
                //     $this->email_model->onlineAdmission($arrayData);

                $url = base_url("home/acaadmission/");

                $success = "Thank you for submitting the online registration form. Please you can print this copy.";
                $this->session->set_flashdata('success', $success);
                // } else {
                //     $url = base_url("admissionpayment/index/" . $studentID);
                // }
                $array = array('status' => 'success', 'url' => $url);
            } else {
                $error = $this->form_validation->error_array();
                $array = array('status' => 'fail', 'error' => $error);
            }
            echo json_encode($array);
            exit();
        }

        $this->data['branchID'] = $branchID;
        $this->data['page_data'] = $this->home_model->get('front_cms_admission', array('branch_id' => $branchID), true);
        $this->data['main_contents'] = $this->load->view('home/admission-1', $this->data, true);
        $this->load->view('home/layout/index', $this->data);
    }

    public function acaadmission()
    {
        if (!$this->data['cms_setting']['online_admission']) {
            redirect(site_url('home'));
        }
        $branchID = $this->home_model->getDefaultBranch();
        $captcha = $this->data['cms_setting']['captcha_status'];
        if ($captcha == 'enable') {
            $this->load->library('recaptcha');
            $this->data['recaptcha'] = array(
                'widget' => $this->recaptcha->getWidget(),
                'script' => $this->recaptcha->getScriptTag(),
            );
        }
        if ($_POST) {
            // $this->form_validation->set_rules('class_id', translate('class'), 'trim|required');
            $this->form_validation->set_rules('last_passed', translate('last_passed'), 'trim|required');
            $this->form_validation->set_rules('stream_name', translate('stream_name'), 'trim|required');
            $this->form_validation->set_rules('course_medium', translate('course_medium'), 'trim|required');
            $this->form_validation->set_rules('pass_year', translate('pass_year'), 'trim|required');
            $this->form_validation->set_rules('course_type', translate('course_type'), 'trim|required');
            $this->form_validation->set_rules('division', translate('division'), 'trim|required');
            $this->form_validation->set_rules('percentage_mark', translate('percentage_mark'), 'trim|required');
            $this->form_validation->set_rules('university_name', translate('blood_group'), 'trim|required');
            $this->form_validation->set_rules('school_name', translate('school_name'), 'trim|required');
            $this->form_validation->set_rules('state_name', translate('state_name'), 'trim|required');
            $this->form_validation->set_rules('dist_name', translate('dist_name'), 'trim|required');
            $this->form_validation->set_rules('session', translate('session'), 'trim|required');

            if ($captcha == 'enable') {
                $this->form_validation->set_rules('g-recaptcha-response', 'Captcha', 'trim|required');
            }
            // custom fields validation rules
            $customFields = getCustomFields('online_admission', $branchID);
            foreach ($customFields as $fields_key => $fields_value) {
                if ($fields_value['required']) {
                    $fieldsID = $fields_value['id'];
                    $fieldLabel = $fields_value['field_label'];
                    $this->form_validation->set_rules("custom_fields[online_admission][" . $fieldsID . "]", $fieldLabel, 'trim|required');
                }
            }

            if ($this->form_validation->run() == true) {




                $arrayData = array(
                    'last_passed' => $this->input->post('last_passed'),
                    'stream_name' => $this->input->post('stream_name'),
                    'course_medium' => $this->input->post('course_medium'),
                    'pass_year' => $this->input->post('pass_year'),
                    'course_type' => $this->input->post('course_type'),
                    'division' => $this->input->post('division'),
                    'percentage_mark' => $this->input->post('percentage_mark'),
                    'university_name' => $this->input->post('university_name'),
                    'school_name' => $this->input->post('school_name'),
                    'state_name' => $this->input->post('state_name'),
                    'dist_name' => $this->input->post('dist_name'),
                    'session' => $this->input->post('session'),
                    'subjects_ids' => json_encode(array_values($this->input->post('subjects_ids')), JSON_FORCE_OBJECT),
                    'subjects_percentage_marks' => json_encode(array_values($this->input->post('subjects_percentage_marks')), JSON_FORCE_OBJECT),
                    'apply_date' => date("Y-m-d H:i:s"),
                    'form_no' => 2,
                );

                $this->session->set_userdata($arrayData);

                // $this->db->insert('online_admission', $arrayData);
                // $studentID = $this->db->insert_id();

                // // handle custom fields data
                // $class_slug = 'online_admission';
                // $customField = $this->input->post("custom_fields[$class_slug]");
                // if (!empty($customField)) {
                //     saveCustomFields($customField, $studentID);
                // }
                // check out admission payment status
                // $this->load->model('admissionpayment_model');
                // $getStudent = $this->admissionpayment_model->getStudentDetails($studentID);
                // if ($getStudent['fee_elements']['status'] == 0) {
                //     $url = base_url("home/admission_confirmation/" . $studentID);

                //    // applicant email send
                //     $arrayData['institute_name'] = get_type_name_by_id('branch', $arrayData['branch_id']);
                //     $arrayData['admission_id'] = $studentID;
                //     $arrayData['student_name'] = $arrayData['first_name'] . " " . $arrayData['last_name'];
                //     $arrayData['class_name'] = get_type_name_by_id('class', $arrayData['class_id']);
                //     $arrayData['section_name'] = get_type_name_by_id('section', $arrayData['section_id']);
                //     $arrayData['payment_url'] = "";
                //     $arrayData['admission_copy_url'] = $url;
                //     $arrayData['paid_amount'] = 0;
                //     $this->email_model->onlineAdmission($arrayData);

                //     $success = "Thank you for submitting the online registration form. Please you can print this copy.";
                //     $this->session->set_flashdata('success', $success);
                // } else {
                //     $url = base_url("admissionpayment/index/" . $studentID);
                // }

                $url = base_url("home/disciplineadmission");
                $array = array('status' => 'success', 'url' => $url);
            } else {
                $error = $this->form_validation->error_array();
                $array = array('status' => 'fail', 'error' => $error);
            }
            echo json_encode($array);
            exit();
        }

        $this->data['branchID'] = $branchID;
        $this->data['page_data'] = $this->home_model->get('front_cms_admission', array('branch_id' => $branchID), true);
        $this->data['main_contents'] = $this->load->view('home/admission-2', $this->data, true);
        $this->load->view('home/layout/index', $this->data);
    }

    public function disciplineadmission()
    {
        if (!$this->data['cms_setting']['online_admission']) {
            redirect(site_url('home'));
        }
        $branchID = $this->home_model->getDefaultBranch();
        $captcha = $this->data['cms_setting']['captcha_status'];
        if ($captcha == 'enable') {
            $this->load->library('recaptcha');
            $this->data['recaptcha'] = array(
                'widget' => $this->recaptcha->getWidget(),
                'script' => $this->recaptcha->getScriptTag(),
            );
        }
        if ($_POST) {

            // $this->form_validation->set_rules('class_id', translate('class'), 'trim|required');
            $this->form_validation->set_rules('university_name', translate('university_name'), 'trim|required');
            $this->form_validation->set_rules('college_name', translate('college_name'), 'trim|required');
            $this->form_validation->set_rules('discipline_name', translate('discipline_name'), 'trim|required');
            $this->form_validation->set_rules('streams', translate('streams'), 'trim|required');
            $this->form_validation->set_rules('subject_name', translate('subject_name'), 'trim|required');

            if ($captcha == 'enable') {
                $this->form_validation->set_rules('g-recaptcha-response', 'Captcha', 'trim|required');
            }
            // custom fields validation rules
            $customFields = getCustomFields('online_admission', $branchID);
            foreach ($customFields as $fields_key => $fields_value) {
                if ($fields_value['required']) {
                    $fieldsID = $fields_value['id'];
                    $fieldLabel = $fields_value['field_label'];
                    $this->form_validation->set_rules("custom_fields[online_admission][" . $fieldsID . "]", $fieldLabel, 'trim|required');
                }
            }

            if ($this->form_validation->run() == true) {
                $arrayData = array(
                    'university_name' => $this->input->post('university_name'),
                    'branch_id' => $this->input->post('college_name'),
                    'discipline_name' => $this->input->post('discipline_name'),
                    'streams' => $this->input->post('streams'),
                    'subject_name' => $this->input->post('subject_name'),
                    'form_no' => 3,
                );

                $this->session->set_userdata($arrayData);

                // $this->db->insert('online_admission', $arrayData);
                // $studentID = $this->db->insert_id();

                // // handle custom fields data
                // $class_slug = 'online_admission';
                // $customField = $this->input->post("custom_fields[$class_slug]");
                // if (!empty($customField)) {
                //     saveCustomFields($customField, $studentID);
                // }
                // check out admission payment status
                // $this->load->model('admissionpayment_model');
                // $getStudent = $this->admissionpayment_model->getStudentDetails($studentID);
                // if ($getStudent['fee_elements']['status'] == 0) {
                //     $url = base_url("home/admission_confirmation/" . $studentID);

                //    // applicant email send
                //     $arrayData['institute_name'] = get_type_name_by_id('branch', $arrayData['branch_id']);
                //     $arrayData['admission_id'] = $studentID;
                //     $arrayData['student_name'] = $arrayData['first_name'] . " " . $arrayData['last_name'];
                //     $arrayData['class_name'] = get_type_name_by_id('class', $arrayData['class_id']);
                //     $arrayData['section_name'] = get_type_name_by_id('section', $arrayData['section_id']);
                //     $arrayData['payment_url'] = "";
                //     $arrayData['admission_copy_url'] = $url;
                //     $arrayData['paid_amount'] = 0;
                //     $this->email_model->onlineAdmission($arrayData);

                //     $success = "Thank you for submitting the online registration form. Please you can print this copy.";
                //     $this->session->set_flashdata('success', $success);
                // } else {
                //     $url = base_url("admissionpayment/index/" . $studentID);
                // }

                $url = base_url("home/online_ad_razorpay");
                $array = array('status' => 'success', 'url' => $url);
            } else {
                $error = $this->form_validation->error_array();
                $array = array('status' => 'fail', 'error' => $error);
            }
            echo json_encode($array);
            exit();
        }
        $this->data['arrayBranch'] = $this->app_lib->getSelectList('branch');
        $this->data['branchID'] = $branchID;
        $this->data['page_data'] = $this->home_model->get('front_cms_admission', array('branch_id' => $branchID), true);
        $this->data['main_contents'] = $this->load->view('home/admission-3', $this->data, true);
        $this->load->view('home/layout/index', $this->data);
    }

    public function online_ad_razorpay()
    {
        if ($this->session->userdata('form_no') != 3) {
            redirect(site_url('home'));
        }

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.razorpay.com/v1/orders',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
                "amount": 1500,
                "currency": "INR",
                "receipt": "rcptid_11",
                "partial_payment": true,
                "first_payment_min_amount": 500
            }',
            CURLOPT_HTTPHEADER => array(
                'content-type: application/json',
                'Authorization: Basic cnpwX3Rlc3RfM0RrZXFWbFlQZ1hGSXo6T1lXWGY2eTAyVTFDSEdteDJrc2cwU3B4',
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $token = json_decode($response, true);
        $this->data['razorpay_token'] = $token['id'];

        $this->data['main_contents'] = $this->load->view('home/admission-payment', $this->data, true);
        $this->load->view('home/layout/index', $this->data);
    }

    public function pay_with_razorpay()
    {
        $arrayData = $this->session->userdata();
        unset($arrayData['__ci_last_regenerate']);

        $result = $this->db->insert('online_admission', $arrayData);
        $inserted_id = $this->db->insert_id();

        $this->load->helper('string');
        // $password = random_string('alnum', 16);
        $password = '1234';
        $arrayData['qualification'] = '';
        $arrayData['grd_username'] = 'USERNAME' . $inserted_id;
        $arrayData['grd_password'] = $password;

        $studentData = $this->student_model->save($arrayData, array());

        if ($result) {
            ob_start()
?>
            <style type="text/css">
                @import url(https://fonts.googleapis.com/css?family=Nunito);
            </style>
            <table align="center" cellpadding="0" cellspacing="0" height="100%" width="100%">
                <tbody>
                    <tr>
                        <td style="font-family: 'Nunito', 'Helvetica Neue', 'Arial', 'sans-serif' !important; text-align: center;" align="center" bgcolor="#fff" class="" valign="top" width="100%">
                            <center class="">
                                <table cellpadding="0" cellspacing="0" class="w320" style="margin: 0 auto;" width="600">
                                    <tbody>
                                        <tr>
                                            <td style="font-family: 'Nunito', 'Helvetica Neue', 'Arial', 'sans-serif' !important; text-align: center;" align="center" class="" valign="top">
                                                <table cellpadding="0" cellspacing="0" style="margin: 0 auto;" width="100%"> </table>
                                                <table bgcolor="#fff" cellpadding="0" cellspacing="0" class="" style="margin: 0 auto; width: 100%; margin-top: 100px;">
                                                    <tbody style="margin-top: 15px;">
                                                        <tr class="">
                                                            <td style="font-family: 'Nunito', 'Helvetica Neue', 'Arial', 'sans-serif' !important; text-align: center;" class=""> <img alt="New Era Academy" class="" height="155" src="<?= base_url('uploads/app_image/logo-small.png'); ?>" width="155"> </td>
                                                        </tr>
                                                        <tr class="">
                                                            <td style="font-family: 'Nunito', 'Helvetica Neue', 'Arial', 'sans-serif' !important; text-align: center; color: #444; font-size: 36px;" class="headline">Welcome to New Era Academy!</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="font-family: 'Nunito', 'Helvetica Neue', 'Arial', 'sans-serif' !important; text-align: center;">
                                                                <center class="">
                                                                    <table cellpadding="0" cellspacing="0" class="" style="margin: 0 auto;" width="75%">
                                                                        <tbody class="">
                                                                            <tr class="">
                                                                                <td style="font-family: 'Nunito', 'Helvetica Neue', 'Arial', 'sans-serif' !important; text-align: center;" class="" style="color:#444; font-weight: 400;"><br><br> You have successfully been registered with us. <br> <br> Your application id is XXXXXXX: <br> <br><br> <br></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </center>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="font-family: 'Nunito', 'Helvetica Neue', 'Arial', 'sans-serif' !important; text-align: center;" class="">
                                                                <div class=""> <a style="background-color:#009bdb;border-radius:4px;color:#fff;display:inline-block;font-family:Helvetica, Arial, sans-serif;font-size:18px;font-weight:normal;line-height:50px;text-align:center;text-decoration:none;width:350px;-webkit-text-size-adjust:none;" href="<?= base_url(); ?>">Visit Us</a> </div> <br>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </center>
                        </td>
                    </tr>
                </tbody>
            </table>
            <?php
            $wlecome_mail = ob_get_contents();
            ob_get_clean();

            ob_start()
            ?>
            <style type="text/css">
                @import url(https://fonts.googleapis.com/css?family=Nunito);
            </style>
            <table align="center" cellpadding="0" cellspacing="0" height="100%" width="100%">
                <tbody>
                    <tr>
                        <td style="font-family: 'Nunito', 'Helvetica Neue', 'Arial', 'sans-serif' !important; text-align: center;" align="center" bgcolor="#fff" class="" valign="top" width="100%">
                            <center class="">
                                <table cellpadding="0" cellspacing="0" class="w320" style="margin: 0 auto;" width="600">
                                    <tbody>
                                        <tr>
                                            <td style="font-family: 'Nunito', 'Helvetica Neue', 'Arial', 'sans-serif' !important; text-align: center;" align="center" class="" valign="top">
                                                <table cellpadding="0" cellspacing="0" style="margin: 0 auto;" width="100%"> </table>
                                                <table bgcolor="#fff" cellpadding="0" cellspacing="0" class="" style="margin: 0 auto; width: 100%; margin-top: 100px;">
                                                    <tbody style="margin-top: 15px;">
                                                        <tr class="">
                                                            <td style="font-family: 'Nunito', 'Helvetica Neue', 'Arial', 'sans-serif' !important; text-align: center;" class=""> <img alt="New Era Academy" class="" height="155" src="<?= base_url('uploads/app_image/logo-small.png'); ?>" width="155"> </td>
                                                        </tr>
                                                        <tr class="">
                                                            <td style="font-family: 'Nunito', 'Helvetica Neue', 'Arial', 'sans-serif' !important; text-align: center; color: #444; font-size: 36px;" class="headline">Thank you For Registration with us.</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="font-family: 'Nunito', 'Helvetica Neue', 'Arial', 'sans-serif' !important; text-align: center;">
                                                                <center class="">
                                                                    <table cellpadding="0" cellspacing="0" class="" style="margin: 0 auto;" width="75%">
                                                                        <tbody class="">
                                                                            <tr class="">
                                                                                <td style="font-family: 'Nunito', 'Helvetica Neue', 'Arial', 'sans-serif' !important; text-align: center;" class="" style="color:#444; font-weight: 400;"><br>Your login credentials are provided below: <br> <strong>Username :</strong> <?= 'trp' . $inserted_id; ?> <br> <strong>Password : </strong> <?= $password; ?> <br><br> <br></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </center>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="font-family: 'Nunito', 'Helvetica Neue', 'Arial', 'sans-serif' !important; text-align: center;" class="">
                                                                <div class=""> <a style="background-color:#009bdb;border-radius:4px;color:#fff;display:inline-block;font-family:Helvetica, Arial, sans-serif;font-size:18px;font-weight:normal;line-height:50px;text-align:center;text-decoration:none;width:350px;-webkit-text-size-adjust:none;" href="<?= base_url('authentication'); ?>">Visit Account and Start Managing</a> </div> <br>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </center>
                        </td>
                    </tr>
                </tbody>
            </table>
<?php
            $acc_mail = ob_get_contents();
            ob_get_clean();
            // echo $wlecome_mail; die;
            $data = array(
                'branch_id' => '1',
                'recipient' => $this->session->userdata()['email'],
                'subject' => 'Welcome to New Era Academy',
                'message' => $wlecome_mail,
            );
            $this->mailer->send($data);
            $acc_data = array(
                'branch_id' => '1',
                'recipient' => $this->session->userdata()['email'],
                'subject' => 'Login Credentials',
                'message' => $acc_mail,
            );
            // $this->mailer->send($acc_data);
            // $data = array(
            //     'branch_id' => '1',
            //     'recipient' => $this->data['cms_setting']['receive_contact_email'],
            //     'subject' => 'Contact Form Email',
            //     'message' => 'Message here',
            // );
            // if ($this->mailer->send($data)) {
            // }
            $this->session->set_flashdata('online_form_success', 'success');

            $res = array('status' => 'success', 'url' => site_url('home/admission'));
            echo json_encode($res);
        }
    }

    // public function admission()
    // {
    //     if (!$this->data['cms_setting']['online_admission']) {
    //         redirect(site_url('home'));
    //     }
    //     $branchID = $this->home_model->getDefaultBranch();
    //     $captcha = $this->data['cms_setting']['captcha_status'];
    //     if ($captcha == 'enable') {
    //         $this->load->library('recaptcha');
    //         $this->data['recaptcha'] = array(
    //             'widget' => $this->recaptcha->getWidget(),
    //             'script' => $this->recaptcha->getScriptTag(),
    //         );
    //     }
    //     if ($_POST) {
    //         $this->form_validation->set_rules('class_id', translate('class'), 'trim|required');
    //         $this->form_validation->set_rules('first_name', translate('first_name'), 'trim|required');
    //         $this->form_validation->set_rules('last_name', translate('last_name'), 'trim|required');
    //         $this->form_validation->set_rules('email', translate('email'), 'trim|required|valid_email');
    //         $this->form_validation->set_rules('gender', translate('gender'), 'trim|required');
    //         $this->form_validation->set_rules('birthday', translate('birthday'), 'trim|required');
    //         $this->form_validation->set_rules('mobile_no', translate('mobile_no'), 'trim|required|numeric');
    //         $this->form_validation->set_rules('address', translate('address'), 'trim|required');
    //         $this->form_validation->set_rules('guardian_name', translate('guardian_name'), 'trim|required');
    //         $this->form_validation->set_rules('grd_occupation', translate('occupation'), 'trim|required');
    //         $this->form_validation->set_rules('guardian_relation', translate('guardian_relation'), 'trim|required');
    //         $this->form_validation->set_rules('grd_mobile_no', translate('guardian') . " " . translate('mobile_no'), 'trim|required|numeric');
    //         $this->form_validation->set_rules('grd_address', translate('guardian') . " " . translate('address'), 'trim|required');
    //         if ($captcha == 'enable') {
    //             $this->form_validation->set_rules('g-recaptcha-response', 'Captcha', 'trim|required');
    //         }
    //         // custom fields validation rules
    //         $customFields = getCustomFields('online_admission', $branchID);
    //         foreach ($customFields as $fields_key => $fields_value) {
    //             if ($fields_value['required']) {
    //                 $fieldsID = $fields_value['id'];
    //                 $fieldLabel = $fields_value['field_label'];
    //                 $this->form_validation->set_rules("custom_fields[online_admission][" . $fieldsID . "]", $fieldLabel, 'trim|required');
    //             }
    //         }

    //         if ($this->form_validation->run() == true) {
    //             $arrayData = array(
    //                 'first_name' => $this->input->post('first_name'),
    //                 'last_name' => $this->input->post('last_name'),
    //                 'gender' => $this->input->post('gender'),
    //                 'birthday' => date("Y-m-d", strtotime($this->input->post('birthday'))),
    //                 'mobile_no' => $this->input->post('mobile_no'),
    //                 'email' => $this->input->post('email'),
    //                 'address' => $this->input->post('address'),
    //                 'guardian_name' => $this->input->post('guardian_name'),
    //                 'guardian_relation' => $this->input->post('guardian_relation'),
    //                 'father_name' => $this->input->post('father_name'),
    //                 'mother_name' => $this->input->post('mother_name'),
    //                 'grd_occupation' => $this->input->post('grd_occupation'),
    //                 'grd_income' => $this->input->post('grd_income'),
    //                 'grd_education' => $this->input->post('grd_education'),
    //                 'grd_email' => $this->input->post('grd_email'),
    //                 'grd_mobile_no' => $this->input->post('grd_mobile_no'),
    //                 'grd_address' => $this->input->post('grd_address'),
    //                 'status' => 1,
    //                 'branch_id' => $branchID,
    //                 'class_id' => $this->input->post('class_id'),
    //                 'section_id' => $this->input->post('section_id'),
    //                 'apply_date' => date("Y-m-d H:i:s"),
    //             );
    //             $this->db->insert('online_admission', $arrayData);
    //             $studentID = $this->db->insert_id();

    //             // handle custom fields data
    //             $class_slug = 'online_admission';
    //             $customField = $this->input->post("custom_fields[$class_slug]");
    //             if (!empty($customField)) {
    //                 saveCustomFields($customField, $studentID);
    //             }
    //             // check out admission payment status
    //             $this->load->model('admissionpayment_model');
    //             $getStudent = $this->admissionpayment_model->getStudentDetails($studentID);
    //             if ($getStudent['fee_elements']['status'] == 0) {
    //                 $url = base_url("home/admission_confirmation/" . $studentID);

    //                // applicant email send
    //                 $arrayData['institute_name'] = get_type_name_by_id('branch', $arrayData['branch_id']);
    //                 $arrayData['admission_id'] = $studentID;
    //                 $arrayData['student_name'] = $arrayData['first_name'] . " " . $arrayData['last_name'];
    //                 $arrayData['class_name'] = get_type_name_by_id('class', $arrayData['class_id']);
    //                 $arrayData['section_name'] = get_type_name_by_id('section', $arrayData['section_id']);
    //                 $arrayData['payment_url'] = "";
    //                 $arrayData['admission_copy_url'] = $url;
    //                 $arrayData['paid_amount'] = 0;
    //                 $this->email_model->onlineAdmission($arrayData);

    //                 $success = "Thank you for submitting the online registration form. Please you can print this copy.";
    //                 $this->session->set_flashdata('success', $success);
    //             } else {
    //                 $url = base_url("admissionpayment/index/" . $studentID);
    //             }
    //             $array = array('status' => 'success', 'url' => $url);
    //         } else {
    //             $error = $this->form_validation->error_array();
    //             $array = array('status' => 'fail', 'error' => $error);
    //         }
    //         echo json_encode($array);
    //         exit();
    //     }

    //     $this->data['branchID'] = $branchID;
    //     $this->data['page_data'] = $this->home_model->get('front_cms_admission', array('branch_id' => $branchID), true);
    //     $this->data['main_contents'] = $this->load->view('home/admission', $this->data, true);
    //     $this->load->view('home/layout/index', $this->data);
    // }

    public function admission_confirmation($studentID = '')
    {
        $this->load->model('admissionpayment_model');
        $getStudent = $this->admissionpayment_model->getStudentDetails($studentID);
        if (empty($getStudent['id'])) {
            set_alert('error', "This application was not found.");
            redirect($_SERVER['HTTP_REFERER']);
        }
        $this->data['student'] = $getStudent;
        $this->data['page_data'] = $this->home_model->get('front_cms_admission', array('branch_id' => $this->data['student']['branch_id']), true);
        $this->data['main_contents'] = $this->load->view('home/admission_confirmation', $this->data, true);
        $this->load->view('home/layout/index', $this->data);
    }

    public function contact()
    {
        $branchID = $this->home_model->getDefaultBranch();
        $captcha = $this->data['cms_setting']['captcha_status'];
        if ($captcha == 'enable') {
            $this->load->library('recaptcha');
            $this->data['recaptcha'] = array(
                'widget' => $this->recaptcha->getWidget(),
                'script' => $this->recaptcha->getScriptTag(),
            );
        }

        if ($_POST) {
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('phoneno', 'Phone', 'trim|required');
            $this->form_validation->set_rules('subject', 'Subject', 'trim|required');
            $this->form_validation->set_rules('message', 'Message', 'trim|required');
            if ($captcha == 'enable') {
                $this->form_validation->set_rules('g-recaptcha-response', 'Captcha', 'trim|required');
            }
            if ($this->form_validation->run() !== false) {
                if ($captcha == 'enable') {
                    $captchaResponse = $this->recaptcha->verifyResponse($this->input->post('g-recaptcha-response'));
                } else {
                    $captchaResponse = array('success' => true);
                }
                if ($captchaResponse['success'] == true) {
                    $name = $this->input->post('name');
                    $email = $this->input->post('email');
                    $phoneno = $this->input->post('phoneno');
                    $subject = $this->input->post('subject');
                    $message = $this->input->post('message');
                    $msg = '<h3>Sender Information</h3>';
                    $msg .= '<br><br><b>Name: </b> ' . $name;
                    $msg .= '<br><br><b>Email: </b> ' . $email;
                    $msg .= '<br><br><b>Phone: </b> ' . $phoneno;
                    $msg .= '<br><br><b>Subject: </b> ' . $subject;
                    $msg .= '<br><br><b>Message: </b> ' . $message;
                    $data = array(
                        'branch_id' => $branchID,
                        'recipient' => $this->data['cms_setting']['receive_contact_email'],
                        'subject' => 'Contact Form Email',
                        'message' => $msg,
                    );
                    if ($this->mailer->send($data)) {
                        $this->session->set_flashdata('msg_success', 'Message Successfully Sent. We will contact you shortly.');
                    } else {
                        $this->session->set_flashdata('msg_error', $this->email->print_debugger());
                    }
                } else {
                    $error = 'Captcha is invalid';
                    $this->session->set_flashdata('error', $error);
                }
                redirect(base_url('home/contact'));
            }
        }
        $this->data['page_data'] = $this->home_model->get('front_cms_contact', array('branch_id' => $branchID), true);
        $this->data['main_contents'] = $this->load->view('home/contact', $this->data, true);
        $this->load->view('home/layout/index', $this->data);
    }

    public function admit_card()
    {
        $branchID = $this->home_model->getDefaultBranch();
        $this->data['branchID'] = $branchID;
        $this->data['page_data'] = $this->home_model->get('front_cms_admitcard', array('branch_id' => $branchID), true);
        $this->data['main_contents'] = $this->load->view('home/admit_card', $this->data, true);
        $this->load->view('home/layout/index', $this->data);
    }

    public function admitCardprintFn()
    {
        if ($_POST) {
            $this->load->model('card_manage_model');
            $this->load->model('timetable_model');
            $this->load->library('ciqrcode', array('cacheable' => false));
            $this->form_validation->set_rules('exam_id', translate('exam'), 'trim|required');
            $this->form_validation->set_rules('register_no', translate('register_no'), 'trim|required');
            if ($this->form_validation->run() == true) {
                //get all QR Code file
                $files = glob('uploads/qr_code/*');
                foreach ($files as $file) {
                    if (is_file($file)) {
                        unlink($file); //delete file
                    }
                }
                $registerNo = $this->input->post('register_no');
                $userID = $this->db->select('id')->where('register_no', $registerNo)->get('student')->row_array();
                if (empty($userID)) {
                    $array = array('status' => '0', 'error' => "Register No Not Found.");
                    echo json_encode($array);
                    exit();
                }
                $templateID = $this->input->post('templete_id');
                if (empty($templateID) || $templateID == 0) {
                    $array = array('status' => '0', 'error' => "No Default Template Set.");
                    echo json_encode($array);
                    exit();
                }
                $this->data['exam_id'] = $this->input->post('exam_id');
                $this->data['userID'] = $userID;
                $this->data['template'] = $this->card_manage_model->get('card_templete', array('id' => $templateID), true);
                $this->data['print_date'] = date('Y-m-d');
                $card_data = $this->load->view('home/admitCardprintFn', $this->data, true);
                $array = array('status' => 'success', 'card_data' => $card_data);
            } else {
                $error = $this->form_validation->error_array();
                $array = array('status' => 'fail', 'error' => $error);
            }
            echo json_encode($array);
        }
    }

    public function exam_results()
    {
        $branchID = $this->home_model->getDefaultBranch();
        $this->data['branchID'] = $branchID;
        $this->data['page_data'] = $this->home_model->get('front_cms_exam_results', array('branch_id' => $branchID), true);
        $this->data['main_contents'] = $this->load->view('home/exam_results', $this->data, true);
        $this->load->view('home/layout/index', $this->data);
    }

    public function examResultsPrintFn()
    {
        $this->load->model('exam_model');
        if ($_POST) {
            $this->form_validation->set_rules('exam_id', translate('exam'), 'trim|required');
            $this->form_validation->set_rules('register_no', translate('register_no'), 'trim|required');
            $this->form_validation->set_rules('session_id', translate('academic_year'), 'trim|required');
            if ($this->form_validation->run() == true) {
                $sessionID = $this->input->post('session_id');
                $registerNo = $this->input->post('register_no');
                $examID = $this->input->post('exam_id');
                $userID = $this->db->select('id')->where('register_no', $registerNo)->get('student')->row_array();
                if (empty($userID)) {
                    $array = array('status' => '0', 'error' => "Register No Not Found.");
                    echo json_encode($array);
                    exit();
                }
                $result = $this->exam_model->getStudentReportCard($userID['id'], $examID, $sessionID);
                if (empty($result['exam'])) {
                    $array = array('status' => '0', 'error' => "Exam Results Not Found.");
                    echo json_encode($array);
                    exit();
                }
                $this->data['result'] = $result;
                $this->data['sessionID'] = $sessionID;
                $this->data['userID'] = $userID['id'];
                $this->data['examID'] = $examID;
                $this->data['grade_scale'] = $this->input->post('grade_scale');
                $this->data['attendance'] = $this->input->post('attendance');
                $this->data['print_date'] = date('Y-m-d');
                $card_data = $this->load->view('home/reportCard', $this->data, true);
                $array = array('status' => 'success', 'card_data' => $card_data);
            } else {
                $error = $this->form_validation->error_array();
                $array = array('status' => 'fail', 'error' => $error);
            }
            echo json_encode($array);
        }
    }

    public function certificates()
    {
        $branchID = $this->home_model->getDefaultBranch();
        $this->data['branchID'] = $branchID;
        $this->data['page_data'] = $this->home_model->get('front_cms_certificates', array('branch_id' => $branchID), true);
        $this->data['main_contents'] = $this->load->view('home/certificates', $this->data, true);
        $this->load->view('home/layout/index', $this->data);
    }

    public function certificatesPrintFn()
    {
        if ($_POST) {
            $this->load->model('certificate_model');
            $this->load->library('ciqrcode', array('cacheable' => false));
            //get all QR Code file
            $files = glob('uploads/qr_code/*');
            foreach ($files as $file) {
                if (is_file($file)) {
                    unlink($file); //delete file
                }
            }

            $this->form_validation->set_rules('templete_id', translate('certificate'), 'trim|required');
            $this->form_validation->set_rules('register_no', translate('register_no'), 'trim|required');
            if ($this->form_validation->run() == true) {

                $registerNo = $this->input->post('register_no');
                $examID = $this->input->post('exam_id');
                $userID = $this->db->select('id')->where('register_no', $registerNo)->get('student')->row_array();
                if (empty($userID)) {
                    $array = array('status' => '0', 'error' => "Register No Not Found.");
                    echo json_encode($array);
                    exit();
                }

                $this->data['user_type'] = 1;
                $templateID = $this->input->post('templete_id');
                $this->data['template'] = $this->certificate_model->get('certificates_templete', array('id' => $templateID), true);
                $this->data['userID'] = $userID['id'];
                $this->data['print_date'] = date('Y-m-d');
                $card_data = $this->load->view('home/certificatesPrintFn', $this->data, true);
                $array = array('status' => 'success', 'card_data' => $card_data);
            } else {
                $error = $this->form_validation->error_array();
                $array = array('status' => 'fail', 'error' => $error);
            }
            echo json_encode($array);
        }
    }

    public function gallery()
    {
        $branchID = $this->home_model->getDefaultBranch();
        $this->data['branchID'] = $branchID;
        $this->data['page_data'] = $this->home_model->get('front_cms_gallery', array('branch_id' => $branchID), true);
        $this->data['category'] = $this->home_model->getGalleryCategory($branchID);
        $this->data['galleryList'] = $this->home_model->getGalleryList($branchID);
        $this->data['main_contents'] = $this->load->view('home/gallery', $this->data, true);
        $this->load->view('home/layout/index', $this->data);
    }

    public function gallery_view($alias = '')
    {
        $branchID = $this->home_model->getDefaultBranch();
        $this->data['branchID'] = $branchID;
        $this->data['page_data'] = $this->home_model->get('front_cms_gallery', array('branch_id' => $branchID), true);
        $this->data['gallery'] = $this->home_model->get('front_cms_gallery_content', array('branch_id' => $branchID, 'alias' => $alias), true);
        $this->data['category'] = $this->home_model->getGalleryCategory($branchID);
        $this->data['galleryList'] = $this->home_model->getGalleryList($branchID);
        $this->data['main_contents'] = $this->load->view('home/gallery_view', $this->data, true);
        $this->load->view('home/layout/index', $this->data);
    }

    public function page($url = '')
    {
        $this->db->select('front_cms_menu.title as menu_title,front_cms_menu.alias,front_cms_pages.*');
        $this->db->from('front_cms_menu');
        $this->db->join('front_cms_pages', 'front_cms_pages.menu_id = front_cms_menu.id', 'inner');
        $this->db->where('front_cms_menu.alias', $url);
        $this->db->where('front_cms_menu.publish', 1);
        $getData = $this->db->get()->row_array();
        if (empty($getData)) {
            redirect('404_override');
        }
        $this->data['page_data'] = $getData;
        $this->data['active_menu'] = 'page';
        $this->data['main_contents'] = $this->load->view('home/page', $this->data, true);
        $this->load->view('home/layout/index', $this->data);
    }

    public function getSectionByClass()
    {
        $html = "";
        $classID = $this->input->post("class_id");
        if (!empty($classID)) {
            $result = $this->db->select('sections_allocation.section_id,section.name')
                ->from('sections_allocation')
                ->join('section', 'section.id = sections_allocation.section_id', 'left')
                ->where('sections_allocation.class_id', $classID)
                ->get()->result_array();
            if (is_array($result) && count($result)) {
                $html .= '<option value="">' . translate('select') . '</option>';
                foreach ($result as $row) {
                    $html .= '<option value="' . $row['section_id'] . '">' . $row['name'] . '</option>';
                }
            } else {
                $html .= '<option value="">' . translate('no_selection_available') . '</option>';
            }
        } else {
            $html .= '<option value="">' . translate('select_class_first') . '</option>';
        }
        echo $html;
    }

    public function get_branch_url()
    {
        $branch_id = $this->input->post("branch_id");
        $url = $this->db->where('branch_id', $branch_id)->get('front_cms_setting')->row_array();
        $school = "";
        if ($this->uri->segment(4)) {
            $school = $this->uri->segment(4);
        } else {
            $school = $this->uri->segment(3);
        }
        echo json_encode(array('url_alias' => base_url("home/index/" . $url['url_alias'])));
    }
}
