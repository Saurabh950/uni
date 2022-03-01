<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admission_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_admission_detail($email="")
    {
        $this->db->select('online_admission.*, branch.name as branch_name');
        $this->db->from('online_admission');
        $this->db->join('branch', 'branch.id = online_admission.branch_id');
        $this->db->where('online_admission.email',$email);
        $result = $this->db->get()->result_array()[0];
        // pre($result);
        return $result;
    }

    public function get_student_id_by_email($id="")
    {
        $this->db->select('*');
        $this->db->from('student');
        $this->db->where('id',$id);
        $result = $this->db->get()->result_array()[0];
        return $result;
    }
}
