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
                            <h5 class="mb-3">Applying Discipline Information Section</h5>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Select University </label>
                                <?php
                                echo form_dropdown("university_name", array('' => 'Select University Name', '1' => 'DR SHYAMA PRASAD MUKHERJEE UNIVERSITY, RANCHI'), set_value('section_id'), "class='form-control university_name' data-plugin-selectTwo id='section_id' ");
                                ?>
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Select College </label>
                                <?php
                                echo form_dropdown("college_name", $arrayBranch, set_value('section_id'), "class='form-control onChangeSelect-college_name' onchange=get_discipline_from_college('url') data-plugin-selectTwo id='section_id' ");
                                ?>
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Select Discipline </label>
                                <?php
                                echo form_dropdown("discipline_name", array('' => 'Select'), set_value('section_id'), "class='form-control onChangeSelect-discipline_name' onchange=get_stream_from_dis('url') data-plugin-selectTwo id='section_id' ");
                                ?>
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Select Stream </label>
                                <?php
                                echo form_dropdown("streams", array('' => 'Select'), set_value('section_id'), "class='form-control onChangeSelect-streams' onchange=get_subject_from_stream('url') data-plugin-selectTwo id='section_id' ");
                                ?>
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Subject Name </label>
                                <?php
                                echo form_dropdown("subject_name", array('' => 'Select'), set_value('section_id'), "class='form-control onChangeSelect-subject_name' data-plugin-selectTwo id='section_id' ");
                                ?>
                                <span class="error"></span>
                            </div>
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

<script>

</script>