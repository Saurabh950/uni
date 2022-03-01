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

class Student extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helpers('download');
        $this->load->helpers('custom_fields');
        $this->load->model('student_model');
        $this->load->model('email_model');
        $this->load->model('sms_model');
    }

    public function index()
    {
        redirect(base_url('student/view'));
    }

    /* student form validation rules */
    protected function student_validation()
    {
        $getBranch = $this->getBranchDetails();
        // if (is_superadmin_loggedin()) {
        //     $this->form_validation->set_rules('branch_id', translate('branch'), 'trim|required');
        // }
        // $this->form_validation->set_rules('year_id', translate('academic_year'), 'trim|required');
        // $this->form_validation->set_rules('register_no', translate('register_no'), 'trim|required');
        // $this->form_validation->set_rules('admission_date', translate('admission_date'), 'trim|required');
        // $this->form_validation->set_rules('class_id', translate('class'), 'trim|required');
        // $this->form_validation->set_rules('section_id', translate('section'), 'trim|required');
        // $this->form_validation->set_rules('category_id', translate('category'), 'trim|required');
        // $this->form_validation->set_rules('first_name', translate('first_name'), 'trim|required');
        // $this->form_validation->set_rules('last_name', translate('last_name'), 'trim|required');
        // $this->form_validation->set_rules('mobileno', translate('mobile_no'), 'trim|required');
        // $this->form_validation->set_rules('email', translate('email'), 'trim|valid_email');
        // $this->form_validation->set_rules('roll', translate('roll_number'), 'trim|numeric|callback_unique_roll');
        // $this->form_validation->set_rules('register_no', translate('register_no'), 'trim|required|callback_unique_registerid');
        // $this->form_validation->set_rules('user_photo', 'profile_picture',array(array('handle_upload', array($this->application_model, 'profilePicUpload'))));
        // if ($getBranch['stu_generate'] == 0 || isset($_POST['student_id'])) {
        //     $this->form_validation->set_rules('username', translate('username'), 'trim|required|callback_unique_username');
        //     if (!isset($_POST['student_id'])) {
        //         $this->form_validation->set_rules('password', translate('password'), 'trim|required|min_length[4]');
        //         $this->form_validation->set_rules('retype_password', translate('retype_password'), 'trim|required|matches[password]');
        //     }
        // }
        
        // // custom fields validation rules
        // $class_slug = $this->router->fetch_class();
        // $customFields = getCustomFields($class_slug);
        // foreach ($customFields as $fields_key => $fields_value) {
        //     if ($fields_value['required']) {
        //         $fieldsID   = $fields_value['id'];
        //         $fieldLabel = $fields_value['field_label'];
        //         $this->form_validation->set_rules("custom_fields[student][" . $fieldsID . "]", $fieldLabel, 'trim|required');
        //     }
        // }

        // pre($_POST);
        $this->form_validation->set_rules('full_name', translate('full_name'), 'trim|required');
        $this->form_validation->set_rules('full_hindi_name', translate('full_hindi_name'), 'trim|required');
        $this->form_validation->set_rules('father_name', translate('father_name'), 'trim|required');
        $this->form_validation->set_rules('father_hindi_name', translate('father_ hindi_name'), 'trim|required');
        $this->form_validation->set_rules('mother_name', translate('mother_name'), 'trim|required');
        $this->form_validation->set_rules('mother_hindi_name', translate('mother_hindi_name'), 'trim|required');
        $this->form_validation->set_rules('email', translate('email'), 'trim|required|valid_email');
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
        
        $this->form_validation->set_rules('mobile_no', translate('mobile_no'), 'trim|required');
       
        // $this->form_validation->set_rules('profile_pic', translate('profile_pic'), 'required');
        // $this->form_validation->set_rules('profile_sign', translate('profile_sign'), 'required');

        //second page form
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

        //thrid form

       // $this->form_validation->set_rules('university_name', translate('university_name'), 'trim|required');
        $this->form_validation->set_rules('college_name', translate('college_name'), 'trim|required');
        // $this->form_validation->set_rules('discipline_name', translate('discipline_name'), 'trim|required');
        // $this->form_validation->set_rules('streams', translate('streams'), 'trim|required');
        // $this->form_validation->set_rules('subject_name', translate('subject_name'), 'trim|required');

    }

    /* student admission information are prepared and stored in the database here */
    public function add()
    {
        // check access permission
        if (!get_permission('student', 'is_add')) {
            access_denied();
        }
        $getBranch = $this->getBranchDetails();
        $branchID = $this->application_model->get_branch_id();
        if (isset($_POST['save'])) {
                // if (!$this->data['cms_setting']['online_admission']) {
                //     redirect(site_url('home'));
                // }
               
           
          
            $captcha = $this->data['cms_setting']['captcha_status'];
            if ($captcha == 'enable') {
                $this->load->library('recaptcha');
                $this->data['recaptcha'] = array(
                    'widget' => $this->recaptcha->getWidget(),
                    'script' => $this->recaptcha->getScriptTag(),
                );
            }
            $this->student_validation();
            // pre(validation_errors());

            if ($captcha == 'enable') {
                // $this->form_validation->set_rules('g-recaptcha-response', 'Captcha', 'trim|required');
            }
            // custom fields validation rules
            $customFields = getCustomFields('online_admission', $branchID);
            // foreach ($customFields as $fields_key => $fields_value) {
            //     if ($fields_value['required']) {
            //         $fieldsID = $fields_value['id'];
            //         $fieldLabel = $fields_value['field_label'];
            //         // $this->form_validation->set_rules("custom_fields[online_admission][" . $fieldsID . "]", $fieldLabel, 'trim|required');
            //     }
            // }
            // if (!isset($_POST['guardian_chk'])) {
            //     $this->form_validation->set_rules('grd_name', translate('name'), 'trim|required');
            //     $this->form_validation->set_rules('grd_relation', translate('relation'), 'trim|required');
            //     $this->form_validation->set_rules('grd_occupation', translate('occupation'), 'trim|required');
            //     $this->form_validation->set_rules('grd_mobileno', translate('mobile_no'), 'trim|required');
            //     $this->form_validation->set_rules('grd_email', translate('email'), 'trim|valid_email');
            //     if ($getBranch['grd_generate'] == 0) {
            //         $this->form_validation->set_rules('grd_username', translate('username'), 'trim|required|callback_get_valid_guardian_username');
            //         $this->form_validation->set_rules('grd_password', translate('password'), 'trim|required');
            //         $this->form_validation->set_rules('grd_retype_password', translate('retype_password'), 'trim|required|matches[grd_password]');
            //     }
            // } else {
            //     $this->form_validation->set_rules('parent_id', translate('guardian'), 'required');
            // }
            // echo validation_errors();
            // pre('no');
            if ($this->form_validation->run() == true) {
                // pre($getBranch);
                // $post = $this->input->post();
                // //save all student information in the database file
                // $studentData = $this->student_model->save($post, $getBranch);
                // $studentID = $studentData['student_id'];
                // //save student enroll information in the database file
                // $arrayEnroll = array(
                //     'student_id' => $studentID,
                //     'class_id' => $post['class_id'],
                //     'section_id' => $post['section_id'],
                //     'roll' => $post['roll'],
                //     'session_id' => $post['year_id'],
                //     'branch_id' => $branchID,
                // );
                // $this->db->insert('enroll', $arrayEnroll);

                // // handle custom fields data
                // $class_slug = $this->router->fetch_class();
                // $customField = $this->input->post("custom_fields[$class_slug]");
                // if (!empty($customField)) {
                //     saveCustomFields($customField, $studentID);
                // }

                // // send student admission email
                // $this->email_model->studentAdmission($studentData);
                // // send account activate sms
                // $this->sms_model->send_sms($arrayEnroll, 1);

                $arrayData = array(
                    'full_name' => $this->input->post('full_name'),
                    'full_hindi_name' => $this->input->post('full_hindi_name'),
                    'email' => $this->input->post('email'),
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

                    'mobile_no' => $this->input->post('mobile_no'),
                    
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
                    'apply_date' => date("Y-m-d H:i:s"),

                    // 'university_name' => $this->input->post('university_name'),
                    'college_name' => $this->input->post('college_name'),
                    'discipline_name' => $this->input->post('discipline_name'),
                    'streams' => $this->input->post('streams'),
                    'subject_name' => $this->input->post('subject_name'),
                   
                );

                $result = $this->db->insert('online_admission', $arrayData);
                // pre($result);


                // $post = $this->input->post();
                //save all student information in the database file
             
                // $student_info = array(
                //     'register_no' =>  random_string('alnum', 16),
                //     'admission_date' => date('y-m-d'),
                //     'first_name'=> $nameParts[0],
                //     'last_name'=> !empty($nameParts[1]) ? $nameParts[1] : " ",
                //     'gender' =>$arrayData['gender'],
                //     'birthday' => $arrayData['birthday'],
                //     'religion' => $arrayData['religion'],
                //     'caste' => '',
                //     'blood_group' => $arrayData['blood_group'],
                //     'mother_tongue' => 'english',
                //     'current_address' => $arrayData['address'],
                //     'permanent_address' => $arrayData['permanent_address'],
                //     'city' =>  $arrayData['city'],
                //     'state' => $arrayData['state'],
                //     'mobileno' => $arrayData['mobile_no'],
                //     'category_id' => 1,
                //     'email' => $arrayData['email'],
                //     'parent_id' => 1,
                //     'route_id' => 1,
                //     'vehicle_id' => 1,
                //     'hostel_id' => 1,
                //     'room_id' => 1,
                //     'previous_details' => "",
                    

                // );
                $arrayData['qualification'] = '';
                $arrayData['grd_username'] = $this->input->post('grd_username');
                $arrayData['grd_password'] = $this->input->post('grd_password');
                $studentData = $this->student_model->save($arrayData, $getBranch);
                //$this->session->set_userdata($arrayData);

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

                // $url = base_url("home/acaadmission/");

                // $success = "";
                // $this->session->set_flashdata('success', $success);

                set_alert('success', translate('Thank you for submitting the online registration form. Please you can print this copy.'));
                redirect(base_url('student/add'));
            } else {
                $error = $this->form_validation->error_array();
                $array = array('status' => 'fail', 'error' => $error);
            }
        }
        $this->data['arrayBranch'] = $this->app_lib->getSelectList('branch');
        // $this->data['getBranch'] = $getBranch;
        $this->data['branch_id'] = $branchID;
        $this->data['sub_page'] = 'student/add';
        $this->data['main_menu'] = 'admission';
        $this->data['register_id'] = $this->student_model->regSerNumber();
        $this->data['title'] = translate('create_admission');
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

       /* csv file to import student information  and stored in the database here */
    public function csv_import()
    {
        // check access permission
        if (!get_permission('multiple_import', 'is_add')) {
            access_denied();
        }

        $branchID = $this->application_model->get_branch_id();
        if (isset($_POST['save'])) {
            $err_msg = "";
            $i = 0;
            $this->load->library('csvimport');
            // form validation rules
            if (is_superadmin_loggedin() == true) {
                $this->form_validation->set_rules('branch_id', 'Branch', 'trim|required');
            }
            $this->form_validation->set_rules('class_id', 'Class', 'trim|required');
            $this->form_validation->set_rules('section_id', 'Section', 'trim|required');
            if (isset($_FILES["userfile"]) && empty($_FILES['userfile']['name'])) {
                $this->form_validation->set_rules('userfile', 'CSV File', 'required');
            }
            if ($this->form_validation->run() == true) {
                $classID = $this->input->post('class_id');
                $sectionID = $this->input->post('section_id');
                $csv_array = $this->csvimport->get_array($_FILES["userfile"]["tmp_name"]);
                if ($csv_array) {
                    $columnHeaders = array('FirstName','LastName','BloodGroup','Gender','Birthday','MotherTongue','Religion','Caste','Phone','City','State','PresentAddress','PermanentAddress','CategoryID','Roll','RegisterNo','AdmissionDate','StudentEmail','StudentUsername','StudentPassword','GuardianName','GuardianRelation','FatherName','MotherName','GuardianOccupation','GuardianMobileNo','GuardianAddress','GuardianEmail','GuardianUsername','GuardianPassword');
                    $csvData = array();
                    foreach ($csv_array as $row) {
                        if ($i == 0) {
                            $csvData = array_keys($row);
                        }
                        $csv_chk = array_diff($columnHeaders, $csvData);
                        if (count($csv_chk) <= 0) {
                            $r = $this->csvCheckExistsData($row['StudentUsername'], $row['Roll'], $row['RegisterNo'], $classID, $branchID);
                            if ($r['status'] == false) {
                                $err_msg .= $row['FirstName'] . ' ' . $row['LastName'] . " - Imported Failed : " . $r['message'] . "<br>";
                            } else {
                                $this->student_model->csvImport($row, $classID, $sectionID, $branchID);
                                $i++;
                            }
                        } else {
                            set_alert('error', translate('invalid_csv_file'));
                            redirect(base_url("student/csv_import"));
                        }
                    }
                    if ($err_msg != null) {
                        $this->session->set_flashdata('csvimport', $err_msg);
                    }
                    if ($i > 0) {
                        set_alert('success', $i . ' Students Have Been Successfully Added');
                    }
                    redirect(base_url("student/csv_import"));
                } else {
                    set_alert('error', translate('invalid_csv_file'));
                    redirect(base_url("student/csv_import"));
                }
            }
        }
        $this->data['title'] = translate('multiple_import');
        $this->data['branch_id'] = $branchID;
        $this->data['sub_page'] = 'student/multi_add';
        $this->data['main_menu'] = 'admission';
        $this->data['headerelements'] = array(
            'css' => array(
                'vendor/dropify/css/dropify.min.css',
            ),
            'js' => array(
                'vendor/dropify/js/dropify.min.js',
            ),
        );
        $this->load->view('layout/index', $this->data);
    }

    /* showing disable authentication student list */
    public function disable_authentication()
    {
        // check access permission
        if (!get_permission('student_disable_authentication', 'is_view')) {
            access_denied();
        }

        $branchID = $this->application_model->get_branch_id();
        if (isset($_POST['search'])) {
            $classID = $this->input->post('class_id');
            $sectionID = $this->input->post('section_id');
            $this->data['students'] = $this->application_model->getStudentListByClassSection($classID, $sectionID, $branchID, true);
        }

        if (isset($_POST['auth'])) {
            if (!get_permission('student_disable_authentication', 'is_add')) {
                access_denied();
            }
            $stafflist = $this->input->post('views_bulk_operations');
            if (isset($stafflist)) {
                foreach ($stafflist as $id) {
                    $this->db->where(array('role' => 7, 'user_id' => $id));
                    $this->db->update('login_credential', array('active' => 1));
                }
                set_alert('success', translate('information_has_been_updated_successfully'));
            } else {
                set_alert('error', 'Please select at least one item');
            }
            redirect(base_url('student/disable_authentication'));
        }
        $this->data['branch_id'] = $branchID;
        $this->data['title'] = translate('deactivate_account');
        $this->data['sub_page'] = 'student/disable_authentication';
        $this->data['main_menu'] = 'student';
        $this->load->view('layout/index', $this->data);
    }

    // add new student category
    public function category()
    {
        if (isset($_POST['category'])) {
            if (!get_permission('student_category', 'is_add')) {
                access_denied();
            }
            if (is_superadmin_loggedin()) {
                $this->form_validation->set_rules('branch_id', translate('branch'), 'required');
            }
            $this->form_validation->set_rules('category_name', translate('category_name'), 'trim|required|callback_unique_category');
            if ($this->form_validation->run() !== false) {
                $arrayData = array(
                    'name' => $this->input->post('category_name'),
                    'branch_id' => $this->application_model->get_branch_id(),
                );
                $this->db->insert('student_category', $arrayData);
                set_alert('success', translate('information_has_been_saved_successfully'));
                redirect(base_url('student/category'));
            }
        }
        $this->data['title'] = translate('student') . " " . translate('details');
        $this->data['sub_page'] = 'student/category';
        $this->data['main_menu'] = 'admission';
        $this->load->view('layout/index', $this->data);
    }

    // update existing student category
    public function category_edit()
    {
        if (!get_permission('student_category', 'is_edit')) {
            ajax_access_denied();
        }
        if (is_superadmin_loggedin()) {
            $this->form_validation->set_rules('branch_id', translate('branch'), 'required');
        }
        $this->form_validation->set_rules('category_name', translate('category_name'), 'trim|required|callback_unique_category');
        if ($this->form_validation->run() !== false) {
            $category_id = $this->input->post('category_id');
            $arrayData = array(
                'name' => $this->input->post('category_name'),
                'branch_id' => $this->application_model->get_branch_id(),
            );
            $this->db->where('id', $category_id);
            $this->db->update('student_category', $arrayData);
            set_alert('success', translate('information_has_been_updated_successfully'));
            $array  = array('status' => 'success');
        } else {
            $error = $this->form_validation->error_array();
            $array = array('status' => 'fail','error' => $error);
        }
        echo json_encode($array);
    }

    // delete student category from database
    public function category_delete($id)
    {
        if (get_permission('student_category', 'is_delete')) {
            if (!is_superadmin_loggedin()) {
                $this->db->where('branch_id', get_loggedin_branch_id());
            }
            $this->db->where('id', $id);
            $this->db->delete('student_category');
        }
    }

    // student category details send by ajax
    public function categoryDetails()
    {
        if (get_permission('student_category', 'is_edit')) {
            $id = $this->input->post('id');
            $this->db->where('id', $id);
            if (!is_superadmin_loggedin()) {
                $this->db->where('branch_id', get_loggedin_branch_id());
            }
            $query = $this->db->get('student_category');
            $result = $query->row_array();
            echo json_encode($result);
        }
    }

    /* validate here, if the check student category name */
    public function unique_category($name)
    {
        $branchID = $this->application_model->get_branch_id();
        $category_id = $this->input->post('category_id');
        if (!empty($category_id)) {
            $this->db->where_not_in('id', $category_id);
        }
        $this->db->where(array('name' => $name, 'branch_id' => $branchID));
        $uniform_row = $this->db->get('student_category')->num_rows();
        if ($uniform_row == 0) {
            return true;
        } else {
            $this->form_validation->set_message("unique_category", translate('already_taken'));
            return false;
        }
    }

    /* showing student list by class and section */
    public function view()
    {
        // check access permission
        if (!get_permission('student', 'is_view')) {
            access_denied();
        }

        $branchID = $this->application_model->get_branch_id();
        if (isset($_POST['search'])) {
            $classID = $this->input->post('class_id');
            $sectionID = $this->input->post('section_id');
            $this->data['students'] = $this->application_model->getStudentListByClassSection($classID, $sectionID, $branchID, false, true);
            // pre($this->data['students']);
        }
        $this->data['branch_id'] = $branchID;
        $this->data['title'] = translate('student_list');
        $this->data['main_menu'] = 'student';
        $this->data['sub_page'] = 'student/view';
        $this->data['headerelements'] = array(
            'js' => array(
                'js/student.js'
            ),
        );
        $this->load->view('layout/index', $this->data);
    }

    /* profile preview and information are updating here */
    public function profile($id = '')
    {
        // check access permission
        if (!get_permission('student', 'is_edit')) {
            access_denied();
        }
        $this->load->model('fees_model');
        $this->load->model('exam_model');
        $getStudent = $this->student_model->getSingleStudent($id);
        if (isset($_POST['update'])) {
            $this->session->set_flashdata('profile_tab', 1);
            $this->data['branch_id'] = $this->application_model->get_branch_id();
            $this->student_validation();
            $this->form_validation->set_rules('parent_id', translate('guardian'), 'required');
            if ($this->form_validation->run() == true) {
                $post = $this->input->post();
                //save all student information in the database file
                $studentID = $this->student_model->save($post);
                //save student enroll information in the database file
                $arrayEnroll = array(
                    'class_id' => $this->input->post('class_id'),
                    'section_id' => $this->input->post('section_id'),
                    'roll' => $this->input->post('roll'),
                    'session_id' => $this->input->post('year_id'),
                    'branch_id' => $this->data['branch_id'],
                );
                $this->db->where('student_id', $id);
                $this->db->update('enroll', $arrayEnroll);

                // handle custom fields data
                $class_slug = $this->router->fetch_class();
                $customField = $this->input->post("custom_fields[$class_slug]");
                if (!empty($customField)) {
                    saveCustomFields($customField, $id);
                }
                set_alert('success', translate('information_has_been_updated_successfully'));
                redirect(base_url('student/profile/' . $id));
            }
        }
        $this->data['student'] = $getStudent;
        $this->data['title'] = translate('student_profile');
        $this->data['sub_page'] = 'student/profile';
        $this->data['main_menu'] = 'student';
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

    /* student information delete here */
    public function delete_data($eid = '', $sid = '')
    {
        if (get_permission('student', 'is_delete')) {
            $branchID = get_type_name_by_id('enroll', $eid, 'branch_id');
            // Check student restrictions
            if (!is_superadmin_loggedin()) {
                $this->db->where('branch_id', get_loggedin_branch_id());
            }
            $this->db->where('id', $eid);
            $this->db->delete('enroll');
            if ($this->db->affected_rows() > 0) {
                $this->db->where('id', $sid);
                $this->db->delete('student');
                $this->db->where(array('user_id' => $sid, 'role' => 7));
                $this->db->delete('login_credential');
                $get_field = $this->db->where(array('form_to' => 'student', 'branch_id' => $branchID))->get('custom_field')->result_array();
                $field_id = array_column($get_field, 'id');
                $this->db->where('relid', $sid);
                $this->db->where_in('field_id', $field_id);
                $this->db->delete('custom_fields_values');
            }
        }
    }

    // student document details are create here / ajax
    public function document_create()
    {
        if (!get_permission('student', 'is_edit')) {
            ajax_access_denied();
        }
        $this->form_validation->set_rules('document_title', translate('document_title'), 'trim|required');
        $this->form_validation->set_rules('document_category', translate('document_category'), 'trim|required');
        if (isset($_FILES['document_file']['name']) && empty($_FILES['document_file']['name'])) {
            $this->form_validation->set_rules('document_file', translate('document_file'), 'required');
        }
        if ($this->form_validation->run() !== false) {
            $insert_doc = array(
                'student_id' => $this->input->post('patient_id'),
                'title' => $this->input->post('document_title'),
                'type' => $this->input->post('document_category'),
                'remarks' => $this->input->post('remarks'),
            );

            // uploading file using codeigniter upload library
            $config['upload_path'] = './uploads/attachments/documents/';
            $config['allowed_types'] = 'gif|jpg|png|pdf|docx|csv|txt';
            $config['max_size'] = '2048';
            $config['encrypt_name'] = true;
            $this->upload->initialize($config);
            if ($this->upload->do_upload("document_file")) {
                $insert_doc['file_name'] = $this->upload->data('orig_name');
                $insert_doc['enc_name'] = $this->upload->data('file_name');
                $this->db->insert('student_documents', $insert_doc);
                set_alert('success', translate('information_has_been_saved_successfully'));
            } else {
                set_alert('error', strip_tags($this->upload->display_errors()));
            }
            $this->session->set_flashdata('documents_details', 1);
            echo json_encode(array('status' => 'success'));
        } else {
            $error = $this->form_validation->error_array();
            echo json_encode(array('status' => 'fail', 'error' => $error));
        }
        
    }

    // student document details are update here / ajax
    public function document_update()
    {
        if (!get_permission('student', 'is_edit')) {
            ajax_access_denied();
        }
        // validate inputs
        $this->form_validation->set_rules('document_title', translate('document_title'), 'trim|required');
        $this->form_validation->set_rules('document_category', translate('document_category'), 'trim|required');
        if ($this->form_validation->run() !== false) {
            $document_id = $this->input->post('document_id');
            $insert_doc = array(
                'title' => $this->input->post('document_title'),
                'type' => $this->input->post('document_category'),
                'remarks' => $this->input->post('remarks'),
            );
            if (isset($_FILES["document_file"]) && !empty($_FILES['document_file']['name'])) {
                $config['upload_path'] = './uploads/attachments/documents/';
                $config['allowed_types'] = 'gif|jpg|png|pdf|docx|csv|txt';
                $config['max_size'] = '2048';
                $config['encrypt_name'] = true;
                $this->upload->initialize($config);
                if ($this->upload->do_upload("document_file")) {
                    $exist_file_name = $this->input->post('exist_file_name');
                    $exist_file_path = FCPATH . 'uploads/attachments/documents/' . $exist_file_name;
                    if (file_exists($exist_file_path)) {
                        unlink($exist_file_path);
                    }
                    $insert_doc['file_name'] = $this->upload->data('orig_name');
                    $insert_doc['enc_name'] = $this->upload->data('file_name');
                    set_alert('success', translate('information_has_been_updated_successfully'));
                } else {
                    set_alert('error', strip_tags($this->upload->display_errors()));
                }
            }
            $this->db->where('id', $document_id);
            $this->db->update('student_documents', $insert_doc);
            echo json_encode(array('status' => 'success'));
            $this->session->set_flashdata('documents_details', 1);
        } else {
            $error = $this->form_validation->error_array();
            echo json_encode(array('status' => 'fail', 'error' => $error));
        }
        
    }

    // student document details are delete here
    public function document_delete($id)
    {
        if (get_permission('student', 'is_edit')) {
            $enc_name = $this->db->select('enc_name')->where('id', $id)->get('student_documents')->row()->enc_name;
            $file_name = FCPATH . 'uploads/attachments/documents/' . $enc_name;
            if (file_exists($file_name)) {
                unlink($file_name);
            }
            $this->db->where('id', $id);
            $this->db->delete('student_documents');
            $this->session->set_flashdata('documents_details', 1);
        }
    }

    public function document_details()
    {
        $id = $this->input->post('id');
        $this->db->where('id', $id);
        $query = $this->db->get('student_documents');
        $result = $query->row_array();
        echo json_encode($result);
    }

    // file downloader
    public function documents_download()
    {
        $encrypt_name = $this->input->get('file');
        $file_name = $this->db->select('file_name')->where('enc_name', $encrypt_name)->get('student_documents')->row()->file_name;
        $this->load->helper('download');
        force_download($file_name, file_get_contents('./uploads/attachments/documents/' . $encrypt_name));
    }

    /* sample csv downloader */
    public function csv_Sampledownloader()
    {
        $this->load->helper('download');
        $data = file_get_contents('uploads/multi_student_sample.csv');
        force_download("multi_student_sample.csv", $data);
    }

    /* validate here, if the check multi admission  email and roll */
    public function csvCheckExistsData($student_username = '', $roll = '', $registerno = '', $class_id = '', $branchID = '')
    {
        $array = array();
        if ($roll !== '') {
            $rollQuery = $this->db->get_where('enroll', array(
                'roll' => $roll,
                'class_id' => $class_id,
                'branch_id' => $branchID,
            ));
            if ($rollQuery->num_rows() > 0) {
                $array['status'] = false;
                $array['message'] = "Roll Already Exists.";
                return $array;
            }
        }
        if ($student_username !== '') {
            $this->db->where('username', $student_username);
            $query = $this->db->get_where('login_credential');
            if ($query->num_rows() > 0) {
                $array['status'] = false;
                $array['message'] = "Student Username Already Exists.";
                return $array;
            }
        }
        if ($registerno !== '') {
            $this->db->where('register_no', $registerno);
            $query = $this->db->get_where('student');
            if ($query->num_rows() > 0) {
                $array['status'] = false;
                $array['message'] = "Student Register No Already Exists.";
                return $array;
            }
        } else {
            $array['status'] = false;
            $array['message'] = "Register No Is Required.";
            return $array; 
        }

        $array['status'] = true;
        return $array;
    }

    // unique valid username verification is done here
    public function unique_username($username)
    {
        if ($this->input->post('student_id')) {
            $student_id = $this->input->post('student_id');
            $login_id = $this->app_lib->get_credential_id($student_id, 'student');
            $this->db->where_not_in('id', $login_id);
        }
        $this->db->where('username', $username);
        $query = $this->db->get('login_credential');
        if ($query->num_rows() > 0) {
            $this->form_validation->set_message("unique_username", translate('already_taken'));
            return false;
        } else {
            return true;
        }
    }

    /* unique valid guardian email address verification is done here */
    public function get_valid_guardian_username($username)
    {
        $this->db->where('username', $username);
        $query = $this->db->get('login_credential');
        if ($query->num_rows() > 0) {
            $this->form_validation->set_message("get_valid_guardian_username", translate('username_has_already_been_used'));
            return false;
        } else {
            return true;
        }
    }

    /* unique valid student roll verification is done here */
    public function unique_roll($roll)
    {
        if (empty($roll)) {
            return true;
        }
        $branchID = $this->application_model->get_branch_id();
        $classID = $this->input->post('class_id');
        if ($this->uri->segment(3)) {
            $this->db->where_not_in('student_id', $this->uri->segment(3));
        }
        $this->db->where(array('roll' => $roll, 'class_id' => $classID, 'branch_id' => $branchID));
        $q = $this->db->get('enroll')->num_rows();
        if ($q == 0) {
            return true;
        } else {
            $this->form_validation->set_message("unique_roll", translate('already_taken'));
            return false;
        }
    }

    /* unique valid register ID verification is done here */
    public function unique_registerid($register)
    {
        $branchID = $this->application_model->get_branch_id();
        if ($this->uri->segment(3)) {
            $this->db->where_not_in('id', $this->uri->segment(3));
        }
        $this->db->where('register_no', $register);
        $query = $this->db->get('student')->num_rows();
        if ($query == 0) {
            return true;
        } else {
            $this->form_validation->set_message("unique_registerid", translate('already_taken'));
            return false;
        }
    }

    public function search()
    {
        // check access permission
        if (!get_permission('student', 'is_view')) {
            access_denied();
        }

        $search_text = $this->input->post('search_text');
        $this->data['query'] = $this->student_model->getSearchStudentList(trim($search_text));
        $this->data['title'] = translate('searching_results');
        $this->data['sub_page'] = 'student/search';
        $this->data['main_menu'] = '';
        $this->load->view('layout/index', $this->data);
    }

    /* student password change here */
    public function change_password()
    {
        if (get_permission('student', 'is_edit')) {
            if (!isset($_POST['authentication'])) {
                $this->form_validation->set_rules('password', translate('password'), 'trim|required|min_length[4]');
            } else {
                $this->form_validation->set_rules('password', translate('password'), 'trim');
            }
            if ($this->form_validation->run() !== false) {
                $studentID = $this->input->post('student_id');
                $password = $this->input->post('password');
                if (!isset($_POST['authentication'])) {
                    $this->db->where('role', 7);
                    $this->db->where('user_id', $studentID);
                    $this->db->update('login_credential', array('password' => $this->app_lib->pass_hashed($password)));
                }else{
                    $this->db->where('role', 7);
                    $this->db->where('user_id', $studentID);
                    $this->db->update('login_credential', array('active' => 0));
                }
                set_alert('success', translate('information_has_been_updated_successfully'));
                $array  = array('status' => 'success');
            } else {
                $error = $this->form_validation->error_array();
                $array = array('status' => 'fail', 'error' => $error);
            }
            echo json_encode($array);
        } 
    }

    /* student transfer user interface and information stored in the database here */
    public function transfer()
    {
        // check access permission
        if (!get_permission('student_promotion', 'is_view')) {
            access_denied();
        }

        $branchID = $this->application_model->get_branch_id();
        if ($this->input->post()) {
            $this->data['class_id'] = $this->input->post('class_id');
            $this->data['section_id'] = $this->input->post('section_id');
            $this->data['students'] = $this->application_model->getStudentListByClassSection($this->data['class_id'], $this->data['section_id'], $branchID, false, true);
        }
        $this->data['branch_id'] = $branchID;
        $this->data['title'] = translate('student_promotion');
        $this->data['sub_page'] = 'student/transfer';
        $this->data['main_menu'] = 'transfer';
        $this->load->view('layout/index', $this->data);
    }

    public function transfersave()
    {
        // check access permission
        if (!get_permission('student_promotion', 'is_add')) {
            ajax_access_denied();
        }

        if ($_POST) {
            $this->form_validation->set_rules('promote_session_id', translate('promote_to_session'), 'required');
            $this->form_validation->set_rules('promote_class_id', translate('promote_to_class'), 'required');
            $this->form_validation->set_rules('promote_section_id', translate('promote_section_id'), 'required');
            $items = $this->input->post('promote');
            foreach ($items as $key => $value) {
                if (isset($value['enroll_id'])) {
                    $this->form_validation->set_rules('promote[' . $key . '][roll]', translate('roll'), 'required|callback_unique_prom_roll');
                }
            }
            if ($this->form_validation->run() !== false) {
                $promote_session_id = $this->input->post('promote_session_id');
                $promote_class_id = $this->input->post('promote_class_id');
                $promote_section_id = $this->input->post('promote_section_id');
                $branchID = $this->application_model->get_branch_id();
                $promote = $this->input->post('promote');
                foreach ($promote as $key => $value) {
                    if (isset($value['enroll_id'])) {
                        $roll = $value['roll'];
                        $enroll_id = $value['enroll_id'];
                        $this->db->where('student_id', $value['student_id']);
                        $this->db->where('session_id', $promote_session_id);
                        $query = $this->db->get('enroll');
                        $arrayData = array(
                            'student_id' => $value['student_id'],
                            'class_id' => $promote_class_id,
                            'roll' => $roll,
                            'section_id' => $promote_section_id,
                            'session_id' => $promote_session_id,
                            'branch_id' => $branchID,
                        );

                        if ($query->num_rows() > 0) {
                            $this->db->where('id', $enroll_id);
                            $this->db->update('enroll', $arrayData);
                        } else {
                            $this->db->insert('enroll', $arrayData);
                        }
                    }
                }
                set_alert('success', translate('information_has_been_updated_successfully'));
                $url = base_url('student/transfer');
                $array = array('status' => 'success', 'url' => $url, 'error' => '');
            } else {
                $error = $this->form_validation->error_array();
                $array = array('status' => 'fail', 'url' => '', 'error' => $error);
            }
            echo json_encode($array);
        }
    }

    public function unique_prom_roll($roll)
    {
        if ($roll) {
            $promote_session_id = $this->input->post('promote_session_id');
            $promote_class_id = $this->input->post('promote_class_id');
            $branchID = $this->application_model->get_branch_id();
            $unique_roll = $this->db->select('id')->where(array(
                'roll' => $roll,
                'class_id' => $promote_class_id,
                'session_id' => $promote_session_id,
                'branch_id' => $branchID,
            ))->get('enroll')->num_rows();
            if ($unique_roll == 0) {
                return true;
            } else {
                $this->form_validation->set_message('unique_prom_roll', "The %s is already exists.");
                return false;
            }
        }
    }

    // student quick details
    public function quickDetails()
    {
        $id = $this->input->post('student_id');
        $this->db->select('student.*,enroll.student_id,enroll.roll,student_category.name as cname');
        $this->db->from('enroll');
        $this->db->join('student', 'student.id = enroll.student_id', 'inner');
        $this->db->join('student_category', 'student_category.id = student.category_id', 'left');
        $this->db->where('enroll.id', $id);
        $row = $this->db->get()->row();
        $data['photo'] = get_image_url('student', $row->photo);
        $data['full_name'] = $row->first_name . " " . $row->last_name;
        $data['student_category'] = $row->cname;
        $data['register_no'] = $row->register_no;
        $data['roll'] = $row->roll;
        $data['admission_date'] = empty($row->admission_date) ? "N/A" : _d($row->admission_date);
        $data['birthday'] = empty($row->birthday) ? "N/A" : _d($row->birthday);
        $data['blood_group'] = empty($row->blood_group) ? "N/A" : $row->blood_group;
        $data['religion'] = empty($row->religion) ? "N/A" : $row->religion;
        $data['email'] = $row->email;
        $data['mobileno'] = empty($row->mobileno) ? "N/A" : $row->mobileno;
        $data['state'] = empty($row->state) ? "N/A" : $row->state;
        $data['address'] = empty($row->current_address) ? "N/A" : $row->current_address;
        echo json_encode($data);
    }

    public function bulk_delete()
    {
        $status = 'success';
        $message = translate('information_deleted');
        if (get_permission('student', 'is_delete')) {
            $arrayID = $this->input->post('array_id');
            $this->db->where_in('student_id', $arrayID);
            $this->db->delete('enroll');
            $this->db->where_in('id', $arrayID);
            $this->db->delete('student');
            $this->db->where_in('user_id', $arrayID);
            $this->db->where('role', 7);
            $this->db->delete('login_credential');
        } else {
            $message = translate('access_denied');
            $status = 'error';
        }
        echo json_encode(array('status' => $status, 'message' => $message));
    }
}
