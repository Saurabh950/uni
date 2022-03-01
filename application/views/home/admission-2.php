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
                    <?php echo form_open($this->uri->uri_string(), array('class' => 'form-horizontal frm-submit-data')); ?>
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="mb-3">Academic Information Section</h5>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Last Passed Examination <span class="required">*</span></label>
                                <?php
                                echo form_dropdown("last_passed", array('' => 'Select Last Passed Examination', '1' => 'XII/Intermediate/10+2 System/Equivalent', '2' => 'Vocational (Polytechnic)'), set_value('last_passed'), "class='form-control' data-plugin-selectTwo id='section_id' ");
                                ?>
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Stream Name <span class="required">*</span></label>
                                <?php
                                echo form_dropdown("stream_name", array('' => 'Select Stream Name', 'ARTS' => 'ARTS', 'COMMERCE' => 'COMMERCE', 'SCIENCE' => 'SCIENCE'), set_value('section_id'), "class='form-control' data-plugin-selectTwo id='section_id' ");
                                ?>
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Course Medium <span class="required">*</span></label>
                                <?php
                                echo form_dropdown("course_medium", array('' => 'Select Medium', 'English' => 'English', 'Hindi' => 'Hindi', 'Bengali' => 'Bengali', 'Urdu' => 'Urdu', 'ODIA' => 'ODIA'), set_value('section_id'), "class='form-control' data-plugin-selectTwo id='section_id' ");
                                ?>
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Passing Year <span class="required">*</span></label>
                                <?php
                                $year = array('' => 'Select Passing Year');
                                for ($i = 1900; $i < date('Y'); $i++) {
                                    $year[$i] = $i;
                                }
                                echo form_dropdown("pass_year", $year, set_value('section_id'), "class='form-control' data-plugin-selectTwo id='section_id' ");
                                ?>
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Course Type <span class="required">*</span></label>
                                <?php
                                echo form_dropdown("course_type", array('' => 'Select Course Type', 'Regular' => 'Regular', 'Ex-Regular' => 'Ex-Regular', 'Private' => 'Private', 'Distance' => 'Correspondence/Distance', 'Compartmental-Supplementary' => 'Compartmental/Supplementary'), set_value('section_id'), "class='form-control' data-plugin-selectTwo id='section_id' ");
                                ?>
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Division <span class="required">*</span></label>
                                <?php
                                echo form_dropdown("division", array('' => 'Select Division', 'Distinction' => 'Distinction (75% - 100%)', 'Hindi' => 'First (60% - 74%)', 'Bengali' => 'Second (45% - 59%)', 'Third' => 'Third (below 45%)'), set_value('section_id'), "class='form-control' data-plugin-selectTwo id='section_id' ");
                                ?>
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Percentage Of Marks Secured <span class="required">*</span></label>
                                <input type="text" class="form-control" name="percentage_mark" value="" />
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Name of University/Board <span class="required">*</span></label>
                                <?php
                                echo form_dropdown("university_name", array('' => 'Select University/Board', '1' => 'Aligarh Muslim University, Aligarh.', '2' => 'All India Council for Open Education', '3' => 'Andhra Pradesh Board of Intermediate Education,  Hyderabad'), set_value('section_id'), "class='form-control' data-plugin-selectTwo id='section_id' ");
                                ?>
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>College/School Name <span class="required">*</span></label>
                                <input type="text" class="form-control" name="school_name" value="" />
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">College/School State Name <span class="required">*</span></label>
                                <?php
                                echo form_dropdown("state_name", array(
                                    ''=>'Select State',
                                    '1'=>'Andaman & Nicobar Islands',
                                    '2'=>'Andhra Pradesh',
                                    '3'=>'Arunachal Pradesh',
                                    '4'=>'Assam',
                                    '5'=>'Bihar',
                                    '6'=>'Chandigarh',
                                    '7'=>'Chhatisgarh',
                                    '8'=>'Dadra & Nagar Haveli',
                                    '9'=>'Daman & Diu',
                                    '10'=>'Delhi',
                                    '11'=>'Goa',
                                    '12'=>'Gujarat',
                                    '13'=>'Haryana',
                                    '14'=>'Himachal Pradesh',
                                    '15'=>'Jammu and Kashmir',
                                    '16'=>'Jharkhand',
                                    '17'=>'Karnataka',
                                    '18'=>'Kerala',
                                    '19'=>'Lakshadweep',
                                    '20'=>'Madhya Pradesh',
                                    '21'=>'Maharashtra',
                                    '22'=>'Manipur',
                                    '23'=>'Meghalaya',
                                    '24'=>'Mizoram',
                                    '25'=>'Nagaland',
                                    '26'=>'Odisha',
                                    '27'=>'OTHER',
                                    '28'=>'Puducherry',
                                    '29'=>'Punjab',
                                    '30'=>'Rajasthan',
                                    '31'=>'Sikkim',
                                    '32'=>'Tamil Nadu',
                                    '33'=>'Telangana',
                                    '34'=>'Tripura',
                                    '35'=>'Uttarakhand',
                                    '36'=>'Uttar Pradesh',
                                    '37'=>'West Bengal'), set_value('section_id'), "class='form-control' data-plugin-selectTwo id='section_id' ");
                                ?>
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">College/School District Name <span class="required">*</span></label>
                                <?php
                                echo form_dropdown("dist_name", array('' => 'Select State', '1' => 'Andaman & Nicobar Islands', '2' => 'Andhra Pradesh', '3' => 'Arunachal Pradesh'), set_value('section_id'), "class='form-control' data-plugin-selectTwo id='section_id' ");
                                ?>
                                <span class="error"></span>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Session <span class="required">*</span></label>
                                <?php
                                echo form_dropdown("session", array('' => 'Select Session', '1' => '2020-2021'), set_value('section_id'), "class='form-control' data-plugin-selectTwo id='section_id' ");
                                ?>
                                <span class="error"></span>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="mb-3">Subject Wise Marks Entry Section</h5>
                        </div>
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Select Subject Studied <span class="required">*</span></th>
                                        <th>Percentage Of Marks Secured <span class="required">*</span></th>
                                        <th><input type="button" class="add add-more-subject-wise-marks" value="Add More"></th>
                                    </tr>
                                </thead>
                                <tbody class="subject-wise-marks-block">
                                    <tr>
                                        <td>1. <span class="required">*</span></td>
                                        <td class="subject-wise-marks" value>
                                            <?php
                                            echo form_dropdown("subjects_ids[1]", array('' => 'Select Subject', '1' => 'Science', '2' => 'Maths', '3' => 'Computer'), set_value('subjects_ids'), "class='form-control select2-op' data-plugin-selectTwo");
                                            ?>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="subjects_percentage_marks[1]" value="" />
                                            <span class="error"></span>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>2. <span class="required">*</span></td>
                                        <td>
                                            <?php
                                            echo form_dropdown("subjects_ids[2]", array('' => 'Select Subject', '1' => 'Science', '2' => 'Maths', '3' => 'Computer'), set_value('subjects_ids'), "class='form-control' data-plugin-selectTwo");
                                            ?>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="subjects_percentage_marks[2]" value="" />
                                            <span class="error"></span>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>3. <span class="required">*</span></td>
                                        <td>
                                            <?php
                                            echo form_dropdown("subjects_ids[3]", array('' => 'Select Subject', '1' => 'Science', '2' => 'Maths', '3' => 'Computer'), set_value('subjects_ids'), "class='form-control' data-plugin-selectTwo");
                                            ?>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="subjects_percentage_marks[3]" value="" />
                                            <span class="error"></span>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>4. <span class="required">*</span></td>
                                        <td>
                                            <?php
                                            echo form_dropdown("subjects_ids[4]", array('' => 'Select Subject', '1' => 'Science', '2' => 'Maths', '3' => 'Computer'), set_value('subjects_ids'), "class='form-control' data-plugin-selectTwo");
                                            ?>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="subjects_percentage_marks[4]" value="" />
                                            <span class="error"></span>
                                        </td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <hr>

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