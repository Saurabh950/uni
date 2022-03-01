<!-- Main Banner Starts -->
<div class="main-banner" style="background: url(<?php echo base_url('uploads/frontend/banners/' . $page_data['banner_image']); ?>) center top;">
    <div class="container px-md-0">
        <h2><span><?php echo $page_data['page_title']; ?></span></h2>
    </div>
</div>
<!-- Main Banner Ends -->
<!-- Breadcrumb Starts -->
<div class="breadcrumb">
    <div class="container px-md-0">
        <ul class="list-unstyled list-inline">
            <li class="list-inline-item"><a href="<?php echo base_url('home') ?>">Home</a></li>
            <li class="list-inline-item active"><?php echo $page_data['page_title']; ?></li>
        </ul>
    </div>
</div>
<!-- Breadcrumb Ends -->
<!-- Main Container Starts -->
<div class="container px-md-0 main-container">
    <h3 class="main-heading2 mt-0"><?php echo $page_data['title']; ?></h3>
    <?php echo $page_data['description']; ?>
    <div class="box2 form-box">
        <div class="tabs-panel tabs-product">
            <div class="nav nav-tabs">
                <a class="nav-item nav-link active" data-toggle="tab" href="#new-patient" role="tab" aria-controls="tab-details" aria-selected="true">New Admission</a>
            </div>
            <div class="tab-content clearfix">
                <div class="tab-pane fade show active" id="new-patient" role="tabpanel" aria-labelledby="tab-new-patient">
                    <?php echo form_open_multipart($this->uri->uri_string(), array('class' => 'form-horizontal frm-submit-data')); ?>
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="mb-3">Personal Information Section</h5>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Full Name of Student <span class="required">*</span></label>
                                <input type="text" class="form-control" name="full_name" value="" />
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>छात्र का पूरा नाम ( हिंदी में ) <span class="required">*</span></label>
                                <input type="text" class="form-control" name="full_hindi_name" value="" />
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Email <span class="required">*</span></label>
                                <input type="text" class="form-control" name="email" value="" />
                                <span class="error"></span>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Mobile <span class="required">*</span></label>
                                <input type="text" class="form-control" name="mobile_no" value="" />
                                <span class="error"></span>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Father's Name <span class="required">*</span></label>
                                <input type="text" class="form-control" name="father_name" value="" />
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>पिता का नाम ( हिंदी में ) <span class="required">*</span></label>
                                <input type="text" class="form-control" name="father_hindi_name" value="" />
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Mother's Name <span class="required">*</span></label>
                                <input type="text" class="form-control" name="mother_name" value="" />
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>माता का नाम ( हिंदी में ) <span class="required">*</span></label>
                                <input type="text" class="form-control" name="mother_hindi_name" value="" />
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Date of Birth on Certificate <span class="required">*</span></label>
                                <input type="text" class="form-control" data-plugin-datepicker name="birthday" readonly value="<?php echo set_value('birthday'); ?>" id="birthday" autocomplete="off" />
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Gender <span class="required">*</span></label>
                                <?php
                                echo form_dropdown("gender", array('' => 'Gender', 'male' => 'Male', 'female' => 'Female', 'transgender' => 'Transgender'), set_value('gender'), "class='form-control' data-plugin-selectTwo id='gender' ");
                                ?>
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Blood Group <span class="required">*</span></label>
                                <?php
                                echo form_dropdown("blood_group", array('' => 'Select Blood Group', 'A+' => 'A+', 'A-' => 'A-', 'B+' => 'B+', 'B-' => 'B-', 'AB+' => 'AB+', 'AB-' => 'AB-', 'O+' => 'O+', 'O-' => 'O-'), set_value('blood_group'), "class='form-control' data-plugin-selectTwo id='blood_group' ");
                                ?>
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Marital Status <span class="required">*</span></label>
                                <?php
                                echo form_dropdown("marital_status", array('' => 'Select Marital Status', 'Un-Married' => 'Un-Married', 'Married' => 'Married', 'Divorcee' => 'Divorcee', 'Widow' => 'Widow', 'Separated' => 'Separated'), set_value('merital_status'), "class='form-control' data-plugin-selectTwo id='marital_status' ");
                                ?>
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Religion <span class="required">*</span></label>
                                <?php
                                echo form_dropdown("religion", array('' => 'Select Religion', 'Hinduism' => 'Hinduism', 'Islam' => 'Islam', 'Christianity' => 'Christianity', 'Sikhism' => 'Sikhism', 'Buddhism' => 'Buddhism', 'Jainism' => 'Jainism', 'Zoroastrianism' => 'Zoroastrianism', 'Others' => 'Others'), set_value('religion'), "class='form-control' data-plugin-selectTwo id='religion' ");
                                ?>
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">ID <span class="required">*</span></label>
                                <?php
                                echo form_dropdown("id_type", array('' => 'Select ID Card Proof Name', 'VOTER ID' => 'VOTER ID', 'PAN CARD' => 'PAN CARD', 'DRIVING LICENSE' => 'DRIVING LICENSE', 'BANK ACCOUNT PASSBOOK' => 'BANK ACCOUNT PASSBOOK', 'COLLEGE ID' => 'COLLEGE ID', 'OTHERS' => 'OTHERS'), set_value('id_type'), "class='form-control' data-plugin-selectTwo id='id_type' ");
                                ?>
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Other ID Card Type <span class="required">*</span></label>
                                <input type="text" class="form-control" name="other_id" value="" />
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>ID Card Number from Selected IDCard Type <span class="required">*</span></label>
                                <input type="text" class="form-control" name="id_card_number" value="" />
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Identification Mark <span class="required">*</span></label>
                                <input type="text" class="form-control" name="id_mark" value="" />
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Nationality <span class="required">*</span></label>
                                <input type="text" class="form-control" name="nationality" value="" />
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Are You NRI ? <span class="required">*</span></label>
                                <?php
                                echo form_dropdown("nri_status", array('' => 'Select NRI Status', 'NO' => 'NO', 'YES' => 'YES'), set_value('nri_status'), "class='form-control' data-plugin-selectTwo id='nri_status' ");
                                ?>
                                <span class="error"></span>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="mb-3">Reservation Details Section</h5>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Do You have Domicile of Jharkhand <span class="required">*</span></label>
                                <?php
                                echo form_dropdown("state_native", array('' => 'Select Status', 'NO' => 'NO', 'YES' => 'YES'), set_value('state_native'), "class='form-control' data-plugin-selectTwo id='state_native' ");
                                ?>
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Caste Category <span class="required">*</span></label>
                                <?php
                                echo form_dropdown("caste_category", array('' => 'Select Caste Category', 'GEN' => 'GEN', 'ST' => 'ST', 'SC' => 'SC', 'BCI' => 'BCI', 'BCII' => 'BCII'), set_value('caste_category'), "class='form-control' data-plugin-selectTwo id='caste_category' ");
                                ?>
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Economically Weaker Section <span class="required">*</span></label>
                                <?php
                                echo form_dropdown("ews", array('' => 'Select Status', 'NO' => 'NO', 'YES' => 'YES'), set_value('ews'), "class='form-control' data-plugin-selectTwo id='ews' ");
                                ?>
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Is Under BPL Category <span class="required">*</span></label>
                                <?php
                                echo form_dropdown("bpl", array('' => 'Select Status', 'NO' => 'NO', 'YES' => 'YES'), set_value('bpl'), "class='form-control' data-plugin-selectTwo id='bpl' ");
                                ?>
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="col-md-4" style="display:none">
                            <div class="form-group">
                                <label class="control-label">BPL Number <span class="required">*</span></label>
                                <input type="text" class="form-control" name="bpl_number" value="" />
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Differently Abled Category <span class="required">*</span></label>
                                <?php
                                echo form_dropdown("diff_abled", array('' => 'Select Differently Abled Status ', 'No' => 'No', 'VISUAL HANDICAPPED' => 'VISUAL HANDICAPPED', 'ORTHO HANDICAPPED' => 'ORTHO HANDICAPPED', 'OTHER HANDICAPPED' => 'OTHER HANDICAPPED'), set_value('ph'), "class='form-control' data-plugin-selectTwo id='ph' ");
                                ?>
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="col-md-4" style="display:none">
                            <div class="form-group">
                                <label class="control-label">Disability Percentage <span class="required">*</span></label>
                                <input type="text" class="form-control" name="disability_percentage" value="" max="100" />
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label"> Is Kashmir Migrants <span class="required">*</span></label>
                                <?php
                                echo form_dropdown("kashmir_migrants", array('' => 'Select Status', 'NO' => 'NO', 'YES' => 'YES'), set_value('kashmir_migrants'), "class='form-control' data-plugin-selectTwo id='kashmir_migrants' ");
                                ?>
                                <span class="error"></span>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="mb-3">Weightage Details Section</h5>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Are you NCC Cadet ? <span class="required">*</span></label>
                                <?php
                                echo form_dropdown("ncc", array('' => 'Select NCC Cadet Category', 'NO' => 'NO', 'NCC B CERTIFICATE' => 'NCC B CERTIFICATE', 'NCC Camp CERTIFICATE' => 'NCC Camp CERTIFICATE', 'NCC C CERTIFICATE' => 'NCC C CERTIFICATE', 'NCC N-Camp CERTIFICATE' => 'NCC N-Camp CERTIFICATE', 'NCC S-Camp CERTIFICATE' => 'NCC S-Camp CERTIFICATE'), set_value('ncc'), "class='form-control' data-plugin-selectTwo id='ncc' ");
                                ?>
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Are you N.S.S. Volunteer ? <span class="required">*</span></label>
                                <?php
                                echo form_dropdown("nss_volunteer", array('' => 'Select N.S.S. Volunteer Activity ', 'NO' => 'NO', 'N.S.S. SPECIAL CAMP CERTIFICATE (UNIT LEVEL)' => 'N.S.S. SPECIAL CAMP CERTIFICATE (UNIT LEVEL)', 'NSS ZONAL LEVEL' => 'NSS ZONAL LEVEL', 'PRD CAMP N.S.S. NATIONAL LEVEL CAMP' => 'PRD CAMP N.S.S. NATIONAL LEVEL CAMP', 'R.D. PARADE/ NATIONAL AWARD' => 'R.D. PARADE/ NATIONAL AWARD'), set_value('nss_volunteer'), "class='form-control' data-plugin-selectTwo id='nss_volunteer' ");
                                ?>
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Extra Curricular Activity <span class="required">*</span></label>
                                <?php
                                echo form_dropdown("extra_curricular", array('' => 'Select Extra Curricular Activity ', 'NO' => 'NO', 'Sports Asian Level Representation' => 'Sports Asian Level Representation', 'Sports inter-College/School Level Representation' => 'Sports inter-College/School Level Representation', 'Sports inter-University/State Level Representation' => 'Sports inter-University/State Level Representation', 'Sports National Level Representation' => 'Sports National Level Representation', 'Sports Olympic or Equivalent Level Representation' => 'Sports Olympic or Equivalent Level Representation', 'Sports State Level Representation' => 'Sports State Level Representation'), set_value('extra_curricular'), "class='form-control' data-plugin-selectTwo id='extra_curricular' ");
                                ?>
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Are you dependent of Ex-Serviceman ?<span class="required">*</span></label>
                                <?php
                                echo form_dropdown("exservice_dependent", array('' => 'Select Dependent of Ex-Serviceman', 'NO' => 'NO', 'YES' => 'YES'), set_value('exservice_dependent'), "class='form-control' data-plugin-selectTwo id='exservice_dependent' ");
                                ?>
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Range & Rover <span class="required">*</span></label>
                                <?php
                                echo form_dropdown("range_rover", array('' => 'Select Range & Rover ', 'NO' => 'NO', 'President Recognition' => 'President Recognition', 'Rajya Puraskar' => 'Rajya Puraskar'), set_value('range_rover'), "class='form-control' data-plugin-selectTwo id='range_rover' ");
                                ?>
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label"> Are You Ward of the Teaching / Non-Teaching Staff of University/College ? <span class="required">*</span></label>
                                <?php
                                echo form_dropdown("institute_relative", array('' => 'Select Ward of the Teaching/Non-Teaching ', 'NO' => 'NO', 'YES' => 'YES'), set_value('institute_relative'), "class='form-control' data-plugin-selectTwo id='institute_relative' ");
                                ?>
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="col-md-4" style="display:none">
                            <div class="form-group">
                                <label class="control-label"> Relation with staff <span class="required">*</span></label>
                                <?php
                                echo form_dropdown("staff_relation", array('' => 'Select relation with the Teaching/Non-Teaching staff', 'OWN SON' => 'OWN SON', 'OWN DAUGHTER (UN-MARRIED)' => 'OWN DAUGHTER (UN-MARRIED)', 'DEPENDENT BROTHER' => 'DEPENDENT BROTHER', 'DEPENDENT SISTER' => 'DEPENDENT SISTER', 'DEPENDENT WIFE' => 'DEPENDENT WIFE'), set_value('staff_relation'), "class='form-control' data-plugin-selectTwo id='staff_relation' ");
                                ?>
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="col-md-4" style="display:none">
                            <div class="form-group">
                                <label class="control-label">Teaching/non-teaching Staff Name * <span class="required">*</span></label>
                                <input type="text" class="form-control" name="staff_name" value="" />
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="col-md-4" style="display:none">
                            <div class="form-group">
                                <label class="control-label">Teaching/non-teaching Staff Post * <span class="required">*</span></label>
                                <input type="text" class="form-control" name="staff_post" value="" />
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="col-md-4" style="display:none">
                            <div class="form-group">
                                <label class="control-label">Teaching/non-teaching Staff college name * <span class="required">*</span></label>
                                <input type="text" class="form-control" name="staff_college_name" value="" />
                                <span class="error"></span>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="mb-3">Permanent Address Section</h5>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">House No. Street/Village, Post Office, Police Station Name <span class="required">*</span></label>
                                <textarea class="form-control" id="address" name="address" rows="2" placeholder="Enter Address"><?php echo set_value('address'); ?></textarea>
                                <span class="error"><?= form_error('class_id') ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">City Name <span class="required">*</span></label>
                                <input type="text" class="form-control" name="city" value="<?php echo set_value('city'); ?>" autocomplete="off" />
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">State Name <span class="required">*</span></label>
                                <?php
                                echo form_dropdown("state", array(
                                    '' => 'Select State',
                                    '1' => 'Andaman & Nicobar Islands',
                                    '2' => 'Andhra Pradesh',
                                    '3' => 'Arunachal Pradesh',
                                    '4' => 'Assam',
                                    '5' => 'Bihar',
                                    '6' => 'Chandigarh',
                                    '7' => 'Chhatisgarh',
                                    '8' => 'Dadra & Nagar Haveli',
                                    '9' => 'Daman & Diu',
                                    '10' => 'Delhi',
                                    '11' => 'Goa',
                                    '12' => 'Gujarat',
                                    '13' => 'Haryana',
                                    '14' => 'Himachal Pradesh',
                                    '15' => 'Jammu and Kashmir',
                                    '16' => 'Jharkhand',
                                    '17' => 'Karnataka',
                                    '18' => 'Kerala',
                                    '19' => 'Lakshadweep',
                                    '20' => 'Madhya Pradesh',
                                    '21' => 'Maharashtra',
                                    '22' => 'Manipur',
                                    '23' => 'Meghalaya',
                                    '24' => 'Mizoram',
                                    '25' => 'Nagaland',
                                    '26' => 'Odisha',
                                    '27' => 'OTHER',
                                    '28' => 'Puducherry',
                                    '29' => 'Punjab',
                                    '30' => 'Rajasthan',
                                    '31' => 'Sikkim',
                                    '32' => 'Tamil Nadu',
                                    '33' => 'Telangana',
                                    '34' => 'Tripura',
                                    '35' => 'Uttarakhand',
                                    '36' => 'Uttar Pradesh',
                                    '37' => 'West Bengal'
                                ), set_value('state'), "class='form-control' data-plugin-selectTwo id='state' ");
                                ?>
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">District Name <span class="required">*</span></label>
                                <?php
                                echo form_dropdown("district", array('' => 'Select District', 'male' => 'Male', 'female' => 'Female', 'transgender' => 'Transgender'), set_value('district'), "class='form-control' data-plugin-selectTwo id='district' ");
                                ?>
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Pin Code <span class="required">*</span></label>
                                <input type="text" class="form-control" name="pincode" value="<?php echo set_value('pincode'); ?>" autocomplete="off" />
                                <span class="error"></span>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="mb-3">Present Address Section</h5>
                        </div>
                        <div class="col-md-12">
                            <input type="checkbox" id="sameasperm" name="sameasperm">
                            <label for="sameasperm">Same as Permanent Address</label>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">House No. Street/Village, Post Office, Police Station Name <span class="required">*</span></label>
                                <textarea class="form-control" id="present_address" name="present_address" rows="2" placeholder="Enter present address"><?php echo set_value('permanent_address'); ?></textarea>
                                <span class="error"><?= form_error('class_id') ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">City Name <span class="required">*</span></label>
                                <input type="text" class="form-control" name="present_city" value="<?php echo set_value('guardian_name'); ?>" autocomplete="off" />
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">State Name <span class="required">*</span></label>
                                <?php
                                echo form_dropdown("present_state", array(
                                    '' => 'Select State',
                                    '1' => 'Andaman & Nicobar Islands',
                                    '2' => 'Andhra Pradesh',
                                    '3' => 'Arunachal Pradesh',
                                    '4' => 'Assam',
                                    '5' => 'Bihar',
                                    '6' => 'Chandigarh',
                                    '7' => 'Chhatisgarh',
                                    '8' => 'Dadra & Nagar Haveli',
                                    '9' => 'Daman & Diu',
                                    '10' => 'Delhi',
                                    '11' => 'Goa',
                                    '12' => 'Gujarat',
                                    '13' => 'Haryana',
                                    '14' => 'Himachal Pradesh',
                                    '15' => 'Jammu and Kashmir',
                                    '16' => 'Jharkhand',
                                    '17' => 'Karnataka',
                                    '18' => 'Kerala',
                                    '19' => 'Lakshadweep',
                                    '20' => 'Madhya Pradesh',
                                    '21' => 'Maharashtra',
                                    '22' => 'Manipur',
                                    '23' => 'Meghalaya',
                                    '24' => 'Mizoram',
                                    '25' => 'Nagaland',
                                    '26' => 'Odisha',
                                    '27' => 'OTHER',
                                    '28' => 'Puducherry',
                                    '29' => 'Punjab',
                                    '30' => 'Rajasthan',
                                    '31' => 'Sikkim',
                                    '32' => 'Tamil Nadu',
                                    '33' => 'Telangana',
                                    '34' => 'Tripura',
                                    '35' => 'Uttarakhand',
                                    '36' => 'Uttar Pradesh',
                                    '37' => 'West Bengal'
                                ), set_value('present_state'), "class='form-control' data-plugin-selectTwo id='present_state' ");
                                ?>
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">District Name <span class="required">*</span></label>
                                <?php
                                echo form_dropdown("present_district", array('' => 'Select District', 'male' => 'Male', 'female' => 'Female', 'transgender' => 'Transgender'), set_value('present_district'), "class='form-control' data-plugin-selectTwo id='present_district' ");
                                ?>
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Pin Code <span class="required">*</span></label>
                                <input type="text" class="form-control" name="present_pincode" value="<?php echo set_value('present_pincode'); ?>" autocomplete="off" />
                                <span class="error"></span>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Agent ID <span></span></label>
                                <input type="text" class="form-control" name="agent_id" value="<?php echo set_value('agent_id'); ?>" autocomplete="off" />
                                <span class="error"></span>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="mb-3">Upload Documents Section <small class="text-danger">(Only JPEG, PNG Format | File size must be 10kb to 100kb)</small></h5>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="profile_pic">Profile Picture <span class="required">*</span></label>
                                <input type="file" name="profile_pic" class="form-control" value="<?php echo set_value('profile_pic'); ?>" autocomplete="off" />
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="profile_sign">Signature <span class="required">*</span></label>
                                <input type="file" name="profile_sign" class="form-control" value="<?php echo set_value('profile_sign'); ?>" autocomplete="off" />
                                <span class="error"></span>
                            </div>
                        </div>
                    </div>

                    <!--custom fields details-->
                    <div class="row" id="customFields">
                        <?php echo render_custom_Fields('online_admission', $branchID); ?>
                    </div>
                    <?php if ($cms_setting['captcha_status'] == 'enable') : ?>
                        <div class="form-group">
                            <?php echo $recaptcha['widget'];
                            echo $recaptcha['script']; ?>
                            <span class="error"></span>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($page_data['terms_conditions_title'])) { ?>
                        <div class="accordion mb-md" id="accordion-faqs">
                            <div class="card">
                                <div class="card-header" id="faq1">
                                    <h5 class="card-title">
                                        <a data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                            <?php echo $page_data['terms_conditions_title']; ?>
                                        </a>
                                    </h5>
                                </div>
                                <div id="collapseOne" class="collapse" aria-labelledby="faq1" data-parent="#accordion-faqs">
                                    <div class="card-body">
                                        <?php echo $page_data['terms_conditions_description'] ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <button type="submit" class="btn btn-1" data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing"><i class="fas fa-plus-circle"></i> <?= translate('submit') ?></button>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
    <?php
    if ($this->session->flashdata('online_form_success')) {
    ?>
        swal("Success", "Your form is submitted.", "success");
    <?php
    }
    ?>
    $(document).ready(function() {
        // alert('hello');
        $(":checkbox[name=sameasperm]").click(function() {
            if ($(this).is(':checked') == true) {
                // alert("hello");
                $("#present_address").val($('#address').val()).prop('readonly', true);
                $("input[name=present_city]").val($('input[name=city]').val()).prop('readonly', true);
                $("#present_state").val($('#state').val()).change().prop('readonly', true);
                $("#present_district").val($('#district').val()).change().prop('readonly', true);
                $("input[name=present_pincode]").val($('input[name=pincode]').val()).change().prop('readonly', true);
                // $("#present_state").each(function(index,value){
                //     if($('#state').val()==$(this).value)
                //     {
                //         $(this).value($())
                //     }
                // });
            }
        });

        $("select[name=caste_category]").change(function() {
            if ($(this).val() != '' && $(this).val() != 'GEN') {
                // $("select[name=ews]").val("NO").change();
                $("select[name=ews]").closest('div.col-md-4').hide();
            } else if ($(this).val() != '' && $(this).val() == 'GEN') {
                $("select[name=ews]").closest('div.col-md-4').show();
            } else {
                $("select[name=ews]").val('').change();
                alert("Choose Category first");
                return false;
            }
        });

        $("select[name=bpl]").change(function() {
            if ($(this).val() == "YES") {
                $("input[name=bpl_number]").prop("required", true).closest('div.col-md-4').show();
            } else if ($(this).val() == "NO" || $(this).val() == '') {
                $("input[name=bpl_number]").val('').prop("required", false).closest('div.col-md-4').hide();
            }
        });

        $("select[name=diff_abled]").change(function() {
            if ($(this).val() != '' && $(this).val() != 'No') {
                $("input[name=disability_percentage]").closest('div.col-md-4').show();
            } else {
                $("input[name=disability_percentage]").val('').closest('div.col-md-4').hide();
            }
        });
        $("select[name=institute_relative]").change(function() {
            if ($(this).val() == 'YES') {
                $("select[name=staff_relation]").prop('required', true).closest('div.col-md-4').show();
                $("input[name=staff_name]").prop('required', true).closest('div.col-md-4').show();
                $("input[name=staff_post]").prop('required', true).closest('div.col-md-4').show();
                $("input[name=staff_college_name]").prop('required', true).closest('div.col-md-4').show();
            } else {
                $("select[name=staff_relation]").val('').change().prop('required', false).closest('div.col-md-4').hide();
                $("input[name=staff_name]").val('').prop('required', false).closest('div.col-md-4').hide();
                $("input[name=staff_post]").val('').prop('required', false).closest('div.col-md-4').hide();
                $("input[name=staff_college_name]").val('').prop('required', false).closest('div.col-md-4').hide();
            }
        });
    });
</script>