<?php $widget = (is_superadmin_loggedin() ? 3 : 4); ?>
<div class="row">
	<div class="col-md-12">
		<section class="panel">

			<?php $widget = (is_superadmin_loggedin() ? 3 : 4); ?>
			<div class="row">
				<div class="col-md-12">
					<section class="panel">
						<header class="panel-heading">
							<h4 class="panel-title"><i class="fas fa-graduation-cap"></i> <?= translate('student_admission') ?></h4>
						</header>
						<?php echo form_open_multipart($this->uri->uri_string()); ?>
						<div class="tabs-custom">
							<ul class="nav nav-tabs">
								<li class="<?= (empty($validation_error) ? 'active' : '') ?>">
									<a href="#list" data-toggle="tab"><i class="fas fa-edit"></i> Personal Information</a>
								</li>
								<li class="<?= (!empty($validation_error) ? 'active' : '') ?>">
									<a href="#create" data-toggle="tab"><i class="far fa-edit"></i> Academic Information</a>
								</li>
								<li class="<?= (!empty($validation_error) ? 'active' : '') ?>">
									<a href="#discipline" data-toggle="tab"><i class="far fa-edit"></i> Discipline Information</a>
								</li>
							</ul>
						</div>
						<div class="tab-content">
							<div id="list" class="tab-pane <?= (empty($validation_error) ? 'active' : '') ?>">
								<div class="panel-body">

									<!-- academic details-->
									<div class="headers-line">
										<i class="fas fa-school"></i> Personal Information Section
									</div>
									<?php $academic_year = get_session_id(); ?>

									<div class="row">
										<div class="col-md-4 mb-sm">
											<div class="form-group">
												<label class="control-label">Full Name of Student <span class="required">*</span></label>
												<input type="text" class="form-control" name="full_name" value="<?= set_value('full_name', $full_name) ?>" />
												<span class="error"><?= form_error('full_name') ?></span>
											</div>
										</div>
										<div class="col-md-4 mb-sm">
											<div class="form-group">
												<label class="control-label">छात्र का पूरा नाम ( हिंदी में ) <span class="required">*</span></label>
												<input type="text" class="form-control" name="full_hindi_name" value="<?= set_value('full_hindi_name', $register_id) ?>" />
												<span class="error"><?= form_error('full_hindi_name') ?></span>
											</div>
										</div>
										<div class="col-md-4 mb-sm">
											<div class="form-group">
												<label class="control-label">Email <span class="required">*</span></label>
												<input type="text" class="form-control" name="email" value="<?= set_value('email', $register_id) ?>" />
												<span class="error"><?= form_error('email') ?></span>
											</div>
										</div>
										<div class="col-md-4 mb-sm">
											<div class="form-group">
												<label class="control-label">Mobile Number <span class="required">*</span></label>
												<input type="text" class="form-control" name="mobile_no" value="<?= set_value('mobile_no', $register_id) ?>" />
												<span class="error"><?= form_error('mobile_no') ?></span>
											</div>
										</div>
										<div class="col-md-4 mb-sm">
											<div class="form-group">
												<label class="control-label">Father's Name <span class="required">*</span></label>
												<input type="text" class="form-control" name="father_name" value="<?= set_value('father_name', $register_id) ?>" />
												<span class="error"><?= form_error('father_name') ?></span>
											</div>
										</div>
										<div class="col-md-4 mb-sm">
											<div class="form-group">
												<label class="control-label">पिता का नाम ( हिंदी में ) <span class="required">*</span></label>
												<input type="text" class="form-control" name="father_hindi_name" value="<?= set_value('father_hindi_name', $register_id) ?>" />
												<span class="error"><?= form_error('father_hindi_name') ?></span>
											</div>
										</div>
										<div class="col-md-4 mb-sm">
											<div class="form-group">
												<label class="control-label">Mother's Name <span class="required">*</span></label>
												<input type="text" class="form-control" name="mother_name" value="<?= set_value('mother_name', $register_id) ?>" />
												<span class="error"><?= form_error('mother_name') ?></span>
											</div>
										</div>
										<div class="col-md-4 mb-sm">
											<div class="form-group">
												<label class="control-label">माता का नाम ( हिंदी में ) <span class="required">*</span></label>
												<input type="text" class="form-control" name="mother_hindi_name" value="<?= set_value('mother_hindi_name', $register_id) ?>" />
												<span class="error"><?= form_error('mother_hindi_name') ?></span>
											</div>
										</div>
										<div class="col-md-4 mb-sm">
											<div class="form-group">
												<label class="control-label">Date of Birth on Certificate <span class="required">*</span></label>
												<input type="text" class="form-control" data-plugin-datepicker name="birthday" readonly value="<?php echo set_value('birthday'); ?>" id="birthday" autocomplete="off" />
												<span class="error"><?= form_error('birthday') ?></span>
											</div>
										</div>
										<div class="col-md-4 mb-sm">
											<div class="form-group">
												<label class="control-label">Gender <span class="required">*</span></label>
												<?php
												echo form_dropdown("gender", array('' => 'Gender', 'male' => 'Male', 'female' => 'Female', 'transgender' => 'Transgender'), set_value('gender'), "class='form-control' data-plugin-selectTwo id='gender' ");
												?>
												<span class="error"><?= form_error('gender') ?></span>
											</div>
										</div>
										<div class="col-md-4 mb-sm">
											<div class="form-group">
												<label class="control-label">Blood Group <span class="required">*</span></label>
												<?php
												echo form_dropdown("blood_group", array('' => 'Select Blood Group', 'A+' => 'A+', 'A-' => 'A-', 'B+' => 'B+', 'B-' => 'B-', 'AB+' => 'AB+', 'AB-' => 'AB-', 'O+' => 'O+', 'O-' => 'O-'), set_value('blood_group'), "class='form-control' data-plugin-selectTwo id='blood_group' ");
												?>
												<span class="error"><?= form_error('blood_group') ?></span>
											</div>
										</div>
										<div class="col-md-4 mb-sm">
											<div class="form-group">
												<label class="control-label">Marital Status <span class="required">*</span></label>
												<?php
												echo form_dropdown("marital_status", array('' => 'Select Marital Status', 'Un-Married' => 'Un-Married', 'Married' => 'Married', 'Divorcee' => 'Divorcee', 'Widow' => 'Widow', 'Separated' => 'Separated'), set_value('merital_status'), "class='form-control' data-plugin-selectTwo id='marital_status' ");
												?>
												<span class="error"><?= form_error('marital_status') ?></span>
											</div>
										</div>
										<div class="col-md-4 mb-sm">
											<div class="form-group">
												<label class="control-label">Religion <span class="required">*</span></label>
												<?php
												echo form_dropdown("religion", array('' => 'Select Religion', 'Hinduism' => 'Hinduism', 'Islam' => 'Islam', 'Christianity' => 'Christianity', 'Sikhism' => 'Sikhism', 'Buddhism' => 'Buddhism', 'Jainism' => 'Jainism', 'Zoroastrianism' => 'Zoroastrianism', 'Others' => 'Others'), set_value('religion'), "class='form-control' data-plugin-selectTwo id='religion' ");
												?>
												<span class="error"><?= form_error('religion') ?></span>
											</div>
										</div>
										<div class="col-md-4 mb-sm">
											<div class="form-group">
												<label class="control-label">ID <span class="required">*</span></label>
												<?php
												echo form_dropdown("id_type", array('' => 'Select ID Card Proof Name', 'VOTER ID' => 'VOTER ID', 'PAN CARD' => 'PAN CARD', 'DRIVING LICENSE' => 'DRIVING LICENSE', 'BANK ACCOUNT PASSBOOK' => 'BANK ACCOUNT PASSBOOK', 'COLLEGE ID' => 'COLLEGE ID', 'OTHERS' => 'OTHERS'), set_value('id_type'), "class='form-control' data-plugin-selectTwo id='id_type' ");
												?>
												<span class="error"><?= form_error('id_type') ?></span>
											</div>
										</div>
										<div class="col-md-4 mb-sm">
											<div class="form-group">
												<label class="control-label">Other ID Card Type <span class="required">*</span></label>
												<input type="text" class="form-control" name="other_id" value="<?= set_value('  ', $other_id) ?>" />
												<span class="error"><?= form_error('other_id') ?></span>
											</div>
										</div>
										<div class="col-md-4 mb-sm">
											<div class="form-group">
												<label class="control-label">ID Card Number from Selected IDCard Type <span class="required">*</span></label>
												<input type="text" class="form-control" name="id_card_number" value="<?= set_value('id_card_number', $register_id) ?>" />
												<span class="error"><?= form_error('id_card_number') ?></span>
											</div>
										</div>
										<div class="col-md-4 mb-sm">
											<div class="form-group">
												<label class="control-label">Identification Mark <span class="required">*</span></label>
												<input type="text" class="form-control" name="id_mark" value="<?= set_value('id_mark', $register_id) ?>" />
												<span class="error"><?= form_error('id_mark') ?></span>
											</div>
										</div>
										<div class="col-md-4 mb-sm">
											<div class="form-group">
												<label class="control-label">Nationality <span class="required">*</span></label>
												<input type="text" class="form-control" name="nationality" value="<?= set_value('nationality', $register_id) ?>" />
												<span class="error"><?= form_error('nationality') ?></span>
											</div>
										</div>
										<div class="col-md-4 mb-sm">
											<div class="form-group">
												<label class="control-label">Are You NRI ? <span class="required">*</span></label>
												<?php
												echo form_dropdown("nri_status", array('' => 'Select NRI Status', 'NO' => 'NO', 'YES' => 'YES'), set_value('nri_status'), "class='form-control' data-plugin-selectTwo id='nri_status' ");
												?>
												<span class="error"><?= form_error('nri_status') ?></span>
											</div>
										</div>
									</div>
									<div class="" id="grdLogin">
										<div class="headers-line mt-md">
											<i class="fas fa-user-lock"></i> <?= translate('login_details') ?>
										</div>
										<div class="row mb-lg">
											<div class="col-md-6 mb-sm">
												<div class="form-group">
													<label class="control-label"><?= translate('usename') ?> <span class="required">*</span></label>
													<div class="input-group">
														<span class="input-group-addon"><i class="far fa-user"></i></span>
														<input type="text" class="form-control" name="grd_username" id="grd_username" value="<?= set_value('grd_username') ?>" />
													</div>
													<span class="error"><?= form_error('grd_username') ?></span>
												</div>
											</div>
											<div class="col-md-3 mb-sm">
												<div class="form-group">
													<label class="control-label"><?= translate('password') ?> <span class="required">*</span></label>
													<div class="input-group">
														<span class="input-group-addon"><i class="fas fa-unlock-alt"></i></span>
														<input type="password" class="form-control" name="grd_password" value="<?= set_value('grd_password') ?>" />
													</div>
													<span class="error"><?= form_error('grd_password') ?></span>
												</div>
											</div>
											<div class="col-md-3 mb-sm">
												<div class="form-group">
													<label class="control-label"><?= translate('retype_password') ?> <span class="required">*</span></label>
													<div class="input-group">
														<span class="input-group-addon"><i class="fas fa-unlock-alt"></i></span>
														<input type="password" class="form-control" name="grd_retype_password" value="<?= set_value('grd_retype_password') ?>" />
													</div>
													<span class="error"><?= form_error('grd_retype_password') ?></span>
												</div>
											</div>
										</div>
									</div>
									<div class="headers-line">
										<i class="fas fa-school"></i> Reservation Details Section
									</div>

									<div class="row">
										<div class="col-md-4 mb-sm">
											<div class="form-group">
												<label class="control-label">Do You have Domicile of Jharkhand <span class="required">*</span></label>
												<?php
												echo form_dropdown("state_native", array('' => 'Select Status', 'NO' => 'NO', 'YES' => 'YES'), set_value('state_native'), "class='form-control' data-plugin-selectTwo id='state_native' ");
												?>
												<span class="error"><?= form_error('state_native') ?></span>
											</div>
										</div>
										<div class="col-md-4 mb-sm">
											<div class="form-group">
												<label class="control-label">Caste Category <span class="required">*</span></label>
												<?php
												echo form_dropdown("caste_category", array('' => 'Select Caste Category', 'GEN' => 'GEN', 'ST' => 'ST', 'SC' => 'SC', 'BCI' => 'BCI', 'BCII' => 'BCII'), set_value('caste_category'), "class='form-control' data-plugin-selectTwo id='caste_category' ");
												?>
												<span class="error"><?= form_error('caste_category') ?></span>
											</div>
										</div>
										<div class="col-md-4 mb-sm">
											<div class="form-group">
												<label class="control-label">Economically Weaker Section <span class="required">*</span></label>
												<?php
												echo form_dropdown("ews", array('' => 'Select Status', 'NO' => 'NO', 'YES' => 'YES'), set_value('ews'), "class='form-control' data-plugin-selectTwo id='ews' ");
												?>
												<span class="error"><?= form_error('ews') ?></span>
											</div>
										</div>
										<div class="col-md-4 mb-sm">
											<div class="form-group">
												<label class="control-label">Is Under BPL Category <span class="required">*</span></label>
												<?php
												echo form_dropdown("bpl", array('' => 'Select Status', 'NO' => 'NO', 'YES' => 'YES'), set_value('bpl'), "class='form-control' data-plugin-selectTwo id='bpl' ");
												?>
												<span class="error"><?= form_error('bpl') ?></span>
											</div>
										</div>
										<div class="col-md-4 mb-sm" style="display:none">
											<div class="form-group">
												<label class="control-label">BPL Number <span class="required">*</span></label>
												<input type="text" class="form-control" name="bpl_number" value="<?= set_value('bpl_number', $register_id) ?>" />
												<span class="error"><?= form_error('bpl_number') ?></span>
											</div>
										</div>
										<div class="col-md-4 mb-sm">
											<div class="form-group">
												<label class="control-label">Differently Abled Category <span class="required">*</span></label>
												<?php
												echo form_dropdown("diff_abled", array('' => 'Select Differently Abled Status ', 'No' => 'No', 'VISUAL HANDICAPPED' => 'VISUAL HANDICAPPED', 'ORTHO HANDICAPPED' => 'ORTHO HANDICAPPED', 'OTHER HANDICAPPED' => 'OTHER HANDICAPPED'), set_value('diff_abled'), "class='form-control' data-plugin-selectTwo id='ph' ");
												?>
												<span class="error"><?= form_error('diff_abled') ?></span>
											</div>
										</div>
										<div class="col-md-4 mb-sm" style="display:none">
											<div class="form-group">
												<label class="control-label">Disability Percentage <span class="required">*</span></label>
												<input type="text" class="form-control" name="disability_percentage" value="<?= set_value('disability_percentage', $register_id) ?>" max="100" />
												<span class="error"><?= form_error('disability_percentage') ?></span>
											</div>
										</div>
										<div class="col-md-4 mb-sm">
											<div class="form-group">
												<label class="control-label"> Is Kashmir Migrants <span class="required">*</span></label>
												<?php
												echo form_dropdown("kashmir_migrants", array('' => 'Select Status', 'NO' => 'NO', 'YES' => 'YES'), set_value('kashmir_migrants'), "class='form-control' data-plugin-selectTwo id='kashmir_migrants' ");
												?>
												<span class="error"><?= form_error('kashmir_migrants') ?></span>
											</div>
										</div>
									</div>

									<div class="headers-line">
										<i class="fas fa-info"></i> Weightage Details Section
									</div>
									<div class="row">
										<div class="col-md-4 mb-sm">
											<div class="form-group">
												<label class="control-label">Are you NCC Cadet ? <span class="required">*</span></label>
												<?php
												echo form_dropdown("ncc", array('' => 'Select NCC Cadet Category', 'NO' => 'NO', 'NCC B CERTIFICATE' => 'NCC B CERTIFICATE', 'NCC Camp CERTIFICATE' => 'NCC Camp CERTIFICATE', 'NCC C CERTIFICATE' => 'NCC C CERTIFICATE', 'NCC N-Camp CERTIFICATE' => 'NCC N-Camp CERTIFICATE', 'NCC S-Camp CERTIFICATE' => 'NCC S-Camp CERTIFICATE'), set_value('ncc'), "class='form-control' data-plugin-selectTwo id='ncc' ");
												?>
												<span class="error"><?= form_error('ncc') ?></span>
											</div>
										</div>
										<div class="col-md-4 mb-sm">
											<div class="form-group">
												<label class="control-label">Are you N.S.S. Volunteer ? <span class="required">*</span></label>
												<?php
												echo form_dropdown("nss_volunteer", array('' => 'Select N.S.S. Volunteer Activity ', 'NO' => 'NO', 'N.S.S. SPECIAL CAMP CERTIFICATE (UNIT LEVEL)' => 'N.S.S. SPECIAL CAMP CERTIFICATE (UNIT LEVEL)', 'NSS ZONAL LEVEL' => 'NSS ZONAL LEVEL', 'PRD CAMP N.S.S. NATIONAL LEVEL CAMP' => 'PRD CAMP N.S.S. NATIONAL LEVEL CAMP', 'R.D. PARADE/ NATIONAL AWARD' => 'R.D. PARADE/ NATIONAL AWARD'), set_value('nss_volunteer'), "class='form-control' data-plugin-selectTwo id='nss_volunteer' ");
												?>
												<span class="error"><?= form_error('nss_volunteer') ?></span>
											</div>
										</div>
										<div class="col-md-4 mb-sm">
											<div class="form-group">
												<label class="control-label">Extra Curricular Activity <span class="required">*</span></label>
												<?php
												echo form_dropdown("extra_curricular", array('' => 'Select Extra Curricular Activity ', 'NO' => 'NO', 'Sports Asian Level Representation' => 'Sports Asian Level Representation', 'Sports inter-College/School Level Representation' => 'Sports inter-College/School Level Representation', 'Sports inter-University/State Level Representation' => 'Sports inter-University/State Level Representation', 'Sports National Level Representation' => 'Sports National Level Representation', 'Sports Olympic or Equivalent Level Representation' => 'Sports Olympic or Equivalent Level Representation', 'Sports State Level Representation' => 'Sports State Level Representation'), set_value('extra_curricular'), "class='form-control' data-plugin-selectTwo id='extra_curricular' ");
												?>
												<span class="error"><?= form_error('extra_curricular') ?></span>
											</div>
										</div>
										<div class="col-md-4 mb-sm">
											<div class="form-group">
												<label class="control-label">Are you dependent of Ex-Serviceman ?<span class="required">*</span></label>
												<?php
												echo form_dropdown("exservice_dependent", array('' => 'Select Dependent of Ex-Serviceman', 'NO' => 'NO', 'YES' => 'YES'), set_value('exservice_dependent'), "class='form-control' data-plugin-selectTwo id='exservice_dependent' ");
												?>
												<span class="error"><?= form_error('exservice_dependent') ?></span>
											</div>
										</div>
										<div class="col-md-4 mb-sm">
											<div class="form-group">
												<label class="control-label">Range & Rover <span class="required">*</span></label>
												<?php
												echo form_dropdown("range_rover", array('' => 'Select Range & Rover ', 'NO' => 'NO', 'President Recognition' => 'President Recognition', 'Rajya Puraskar' => 'Rajya Puraskar'), set_value('range_rover'), "class='form-control' data-plugin-selectTwo id='range_rover' ");
												?>
												<span class="error"><?= form_error('range_rover') ?></span>
											</div>
										</div>
										<div class="col-md-4 mb-sm">
											<div class="form-group">
												<label class="control-label"> Are You Ward of the Teaching / Non-Teaching Staff of University/College ? <span class="required">*</span></label>
												<?php
												echo form_dropdown("institute_relative", array('' => 'Select Ward of the Teaching/Non-Teaching ', 'NO' => 'NO', 'YES' => 'YES'), set_value('institute_relative'), "class='form-control' data-plugin-selectTwo id='institute_relative' ");
												?>
												<span class="error"><?= form_error('institute_relative') ?></span>
											</div>
										</div>
										<div class="col-md-4 mb-sm" style="display:none">
											<div class="form-group">
												<label class="control-label"> Relation with staff <span class="required">*</span></label>
												<?php
												echo form_dropdown("staff_relation", array('' => 'Select relation with the Teaching/Non-Teaching staff', 'OWN SON' => 'OWN SON', 'OWN DAUGHTER (UN-MARRIED)' => 'OWN DAUGHTER (UN-MARRIED)', 'DEPENDENT BROTHER' => 'DEPENDENT BROTHER', 'DEPENDENT SISTER' => 'DEPENDENT SISTER', 'DEPENDENT WIFE' => 'DEPENDENT WIFE'), set_value('staff_relation'), "class='form-control' data-plugin-selectTwo id='staff_relation' ");
												?>
												<span class="error"><?= form_error('staff_relation') ?></span>
											</div>
										</div>
										<div class="col-md-4 mb-sm" style="display:none">
											<div class="form-group">
												<label class="control-label">Teaching/non-teaching Staff Name * <span class="required">*</span></label>
												<input type="text" class="form-control" name="staff_name" value="<?= set_value('staff_name', $register_id) ?>" />
												<span class="error"><?= form_error('staff_name') ?></span>
											</div>
										</div>
										<div class="col-md-4 mb-sm" style="display:none">
											<div class="form-group">
												<label class="control-label">Teaching/non-teaching Staff Post * <span class="required">*</span></label>
												<input type="text" class="form-control" name="staff_post" value="<?= set_value('staff_post', $register_id) ?>" />
												<span class="error"><?= form_error('staff_post') ?></span>
											</div>
										</div>
										<div class="col-md-4 mb-sm" style="display:none">
											<div class="form-group">
												<label class="control-label">Teaching/non-teaching Staff college name * <span class="required">*</span></label>
												<input type="text" class="form-control" name="staff_college_name" value="<?= set_value('staff_college_name', $register_id) ?>" />
												<span class="error"><?= form_error('staff_college_name') ?></span>
											</div>
										</div>
									</div>

									<div class="headers-line">
										<i class="fas fa-map-marker-alt"></i> Permanent Address Section
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label class="control-label">House No. Street/Village, Post Office, Police Station Name <span class="required">*</span></label>
												<textarea class="form-control" id="address" name="address" rows="2" placeholder="Enter Address"><?php echo set_value('address'); ?></textarea>
												<span class="error"><?= form_error('address') ?><?= form_error('class_id') ?></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4 mb-sm">
											<div class="form-group">
												<label class="control-label">City Name <span class="required">*</span></label>
												<input type="text" class="form-control" name="city" value="<?php echo set_value('city'); ?>" autocomplete="off" />
												<span class="error"><?= form_error('city') ?></span>
											</div>
										</div>
										<div class="col-md-4 mb-sm">
											<div class="form-group">
												<label class="control-label">State Name <span class="required">*</span></label>
												<?php
												echo form_dropdown("state", array('' => 'Select State', 'Andaman & Nicobar Islands' => 'Andaman & Nicobar Islands', 'Andhra Pradesh' => 'Andhra Pradesh', 'Arunachal Pradesh' => 'Arunachal Pradesh'), set_value('state'), "class='form-control' data-plugin-selectTwo id='state' ");
												?>
												<span class="error"><?= form_error('state') ?></span>
											</div>
										</div>
										<div class="col-md-4 mb-sm">
											<div class="form-group">
												<label class="control-label">District Name <span class="required">*</span></label>
												<?php
												echo form_dropdown("district", array('' => 'Select State', 'Andaman & Nicobar Islands' => 'Andaman & Nicobar Islands', 'Andhra Pradesh' => 'Andhra Pradesh', 'Arunachal Pradesh' => 'Arunachal Pradesh'), set_value('district'), "class='form-control' data-plugin-selectTwo id='district' ");
												?>
												<span class="error"><?= form_error('district') ?></span>
											</div>
										</div>
										<div class="col-md-4 mb-sm">
											<div class="form-group">
												<label class="control-label">Pin Code <span class="required">*</span></label>
												<input type="text" class="form-control" name="pincode" value="<?php echo set_value('pincode'); ?>" autocomplete="off" />
												<span class="error"><?= form_error('pincode') ?></span>
											</div>
										</div>
									</div>

									<div class="headers-line">
										<i class="fas fa-map-marker-alt"></i> Present Address Section
									</div>
									<div class="row">
										<div class="col-md-12">
											<input type="checkbox" id="sameasperm" name="sameasperm">
											<label for="sameasperm">Same as Permanent Address</label>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<label class="control-label">House No. Street/Village, Post Office, Police Station Name <span class="required">*</span></label>
												<textarea class="form-control" id="present_address" name="present_address" rows="2" placeholder="Enter present address"><?php echo set_value('present_address'); ?></textarea>
												<span class="error"><?= form_error('present_address') ?><?= form_error('class_id') ?></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4 mb-sm">
											<div class="form-group">
												<label class="control-label">City Name <span class="required">*</span></label>
												<input type="text" class="form-control" name="present_city" value="<?php echo set_value('present_city'); ?>" autocomplete="off" />
												<span class="error"><?= form_error('present_city') ?></span>
											</div>
										</div>
										<div class="col-md-4 mb-sm">
											<div class="form-group">
												<label class="control-label">State Name <span class="required">*</span></label>
												<?php
												echo form_dropdown("present_state", array('' => 'Select State', 'Andaman & Nicobar Islands' => 'Andaman & Nicobar Islands', 'Andhra Pradesh' => 'Andhra Pradesh', 'Arunachal Pradesh' => 'Arunachal Pradesh'), set_value('present_state'), "class='form-control' data-plugin-selectTwo id='present_state' ");
												?>
												<span class="error"><?= form_error('present_state') ?></span>
											</div>
										</div>
										<div class="col-md-4 mb-sm">
											<div class="form-group">
												<label class="control-label">District Name <span class="required">*</span></label>
												<?php
												echo form_dropdown("present_district", array('' => 'Select District', 'male' => 'Male', 'female' => 'Female', 'transgender' => 'Transgender'), set_value('present_district'), "class='form-control' data-plugin-selectTwo id='present_district' ");
												?>
												<span class="error"><?= form_error('present_district') ?></span>
											</div>
										</div>
										<div class="col-md-4 mb-sm">
											<div class="form-group">
												<label class="control-label">Pin Code <span class="required">*</span></label>
												<input type="text" class="form-control" name="present_pincode" value="<?php echo set_value('present_pincode'); ?>" autocomplete="off" />
												<span class="error"><?= form_error('present_pincode') ?></span>
											</div>
										</div>
									</div>

									<div class="headers-line">
										<i class="fas fa-school"></i> Upload Documents Section
									</div>
									<div class="row">
										<div class="col-md-12">
											<h5 class="mb-3"><small class="text-danger">(Only JPEG, PNG Format | File size must be 10kb to 100kb)</small></h5>
										</div>
										<div class="col-md-6 mb-sm">
											<div class="form-group">
												<label for="profile_pic">Profile Picture <span class="required">*</span></label>
												<input type="file" name="profile_pic" class="form-control" value="<?php echo set_value('profile_pic'); ?>" autocomplete="off" />
												<span class="error"><?= form_error('profile_pic') ?></span>
											</div>
										</div>
										<div class="col-md-6 mb-sm">
											<div class="form-group">
												<label for="profile_sign">Signature <span class="required">*</span></label>
												<input type="file" name="profile_sign" class="form-control" value="<?php echo set_value('profile_sign'); ?>" autocomplete="off" />
												<span class="error"><?= form_error('profile_sign') ?></span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div id="create" class="tab-pane <?= (empty($validation_error) ? 'active' : '') ?>">
								<div class="headers-line">
									<i class="fas fa-school"></i> Academic Information Section
								</div>
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label">Last Passed Examination <span class="required">*</span></label>
											<?php
											echo form_dropdown("last_passed", array('' => 'Select Last Passed Examination', '1' => 'XII/Intermediate/10+2 System/Equivalent', '2' => 'Vocational (Polytechnic)'), set_value('last_passed'), "class='form-control' data-plugin-selectTwo id='section_id' ");
											?>
											<span class="error"><?= form_error('last_passed') ?></span>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label">Stream Name <span class="required">*</span></label>
											<?php
											echo form_dropdown("stream_name", array('' => 'Select Stream Name', 'ARTS' => 'ARTS', 'COMMERCE' => 'COMMERCE', 'SCIENCE' => 'SCIENCE'), set_value('stream_name'), "class='form-control' data-plugin-selectTwo id='stream_name' ");
											?>
											<span class="error"><?= form_error('stream_name') ?></span>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label">Course Medium <span class="required">*</span></label>
											<?php
											echo form_dropdown("course_medium", array('' => 'Select Medium', 'English' => 'English', 'Hindi' => 'Hindi', 'Bengali' => 'Bengali', 'Urdu' => 'Urdu', 'ODIA' => 'ODIA'), set_value('course_medium'), "class='form-control' data-plugin-selectTwo id='course_medium' ");
											?>
											<span class="error"><?= form_error('course_medium') ?></span>
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
											echo form_dropdown("pass_year", $year, set_value('pass_year'), "class='form-control' data-plugin-selectTwo id='pass_year' ");
											?>
											<span class="error"><?= form_error('pass_year') ?></span>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label">Course Type <span class="required">*</span></label>
											<?php
											echo form_dropdown("course_type", array('' => 'Select Course Type', 'Regular' => 'Regular', 'Ex-Regular' => 'Ex-Regular', 'Private' => 'Private', 'Distance' => 'Correspondence/Distance', 'Compartmental-Supplementary' => 'Compartmental/Supplementary'), set_value('course_type'), "class='form-control' data-plugin-selectTwo id='course_type' ");
											?>
											<span class="error"><?= form_error('course_type') ?></span>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label">Division <span class="required">*</span></label>
											<?php
											echo form_dropdown("division", array('' => 'Select Division', 'Distinction' => 'Distinction (75% - 100%)', 'Hindi' => 'First (60% - 74%)', 'Bengali' => 'Second (45% - 59%)', 'Third' => 'Third (below 45%)'), set_value('division'), "class='form-control' data-plugin-selectTwo id='division' ");
											?>
											<span class="error"><?= form_error('division') ?></span>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Percentage Of Marks Secured <span class="required">*</span></label>
											<input type="text" class="form-control" name="percentage_mark" value="<?= set_value('percentage_mark', $register_id) ?>" />
											<span class="error"><?= form_error('percentage_mark') ?></span>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label">Name of University/Board <span class="required">*</span></label>
											<?php
											echo form_dropdown("university_name", array('' => 'Select University/Board', 'Aligarh Muslim University' => 'Aligarh Muslim University, Aligarh.', 'All India Council for Open Education' => 'All India Council for Open Education', 'Andhra Pradesh Board of Intermediate Education,  Hyderabad' => 'Andhra Pradesh Board of Intermediate Education,  Hyderabad'), set_value('university_name'), "class='form-control' data-plugin-selectTwo id='university_names' ");
											?>
											<span class="error"><?= form_error('university_name') ?></span>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>College/School Name <span class="required">*</span></label>
											<input type="text" class="form-control" name="school_name" value="<?= set_value('school_name', $register_id) ?>" />
											<span class="error"><?= form_error('school_name') ?></span>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label">College/School State Name <span class="required">*</span></label>
											<?php
											echo form_dropdown("state_name", array('' => 'Select State', 'Andaman & Nicobar Islands' => 'Andaman & Nicobar Islands', 'Andhra Pradesh' => 'Andhra Pradesh', 'Arunachal Pradesh' => 'Arunachal Pradesh'), set_value('state_name'), "class='form-control' data-plugin-selectTwo id='state_name' ");
											?>
											<span class="error"><?= form_error('state_name') ?></span>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label">College/School District Name <span class="required">*</span></label>
											<?php
											echo form_dropdown("dist_name", array('' => 'Select State', 'Andaman & Nicobar Islands' => 'Andaman & Nicobar Islands', 'Andhra Pradesh' => 'Andhra Pradesh', 'Arunachal Pradesh' => 'Arunachal Pradesh'), set_value('dist_name'), "class='form-control' data-plugin-selectTwo id='dist_name' ");
											?>
											<span class="error"><?= form_error('dist_name') ?></span>
										</div>
									</div>
								</div>

								<div class="headers-line">
									<i class="fas fa-school"></i> Subject Wise Marks Entry Section
								</div>
								<div class="row">
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
														echo form_dropdown("subjects_ids[1]", array('' => 'Select State', 'Andaman & Nicobar Islands' => 'Andaman & Nicobar Islands', 'Andhra Pradesh' => 'Andhra Pradesh', 'Arunachal Pradesh' => 'Arunachal Pradesh'), set_value('subjects_ids'), "class='form-control select2-op' data-plugin-selectTwo");
														?>
													</td>
													<td>
														<input type="text" class="form-control" name="subjects_percentage_marks[1]" value="<?= set_value('register_no', $register_id) ?>" />
														<span class="error"><?= form_error('full_name') ?></span>
													</td>
													<td></td>
												</tr>
												<tr>
													<td>2. <span class="required">*</span></td>
													<td>
														<?php
														echo form_dropdown("subjects_ids[2]", array('' => 'Select State', 'Andaman & Nicobar Islands' => 'Andaman & Nicobar Islands', 'Andhra Pradesh' => 'Andhra Pradesh', 'Arunachal Pradesh' => 'Arunachal Pradesh'), set_value('subjects_ids'), "class='form-control' data-plugin-selectTwo");
														?>
													</td>
													<td>
														<input type="text" class="form-control" name="subjects_percentage_marks[2]" value="<?= set_value('register_no', $register_id) ?>" />
														<span class="error"><?= form_error('full_name') ?></span>
													</td>
													<td></td>
												</tr>
												<tr>
													<td>3. <span class="required">*</span></td>
													<td>
														<?php
														echo form_dropdown("subjects_ids[3]", array('' => 'Select State', 'Andaman & Nicobar Islands' => 'Andaman & Nicobar Islands', 'Andhra Pradesh' => 'Andhra Pradesh', 'Arunachal Pradesh' => 'Arunachal Pradesh'), set_value('subjects_ids'), "class='form-control' data-plugin-selectTwo");
														?>
													</td>
													<td>
														<input type="text" class="form-control" name="subjects_percentage_marks[3]" value="<?= set_value('register_no', $register_id) ?>" />
														<span class="error"><?= form_error('full_name') ?></span>
													</td>
													<td></td>
												</tr>
												<tr>
													<td>4. <span class="required">*</span></td>
													<td>
														<?php
														echo form_dropdown("subjects_ids[4]", array('' => 'Select State', 'Andaman & Nicobar Islands' => 'Andaman & Nicobar Islands', 'Andhra Pradesh' => 'Andhra Pradesh', 'Arunachal Pradesh' => 'Arunachal Pradesh'), set_value('subjects_ids'), "class='form-control' data-plugin-selectTwo");
														?>
													</td>
													<td>
														<input type="text" class="form-control" name="subjects_percentage_marks[4]" value="<?= set_value('register_no', $register_id) ?>" />
														<span class="error"><?= form_error('full_name') ?></span>
													</td>
													<td></td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div id="discipline" class="tab-pane <?= (empty($validation_error) ? 'active' : '') ?>">
								<div class="headers-line">
									<i class="fas fa-school"></i> Applying Discipline Information Section
								</div>
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label">Select University </label>
											<?php
											echo form_dropdown("university_name", array('' => 'Select University Name', 'DR SHYAMA PRASAD MUKHERJEE UNIVERSITY, RANCHI' => 'DR SHYAMA PRASAD MUKHERJEE UNIVERSITY, RANCHI', 'RANCHI UNIVERSITY, RANCHI' => 'RANCHI UNIVERSITY, RANCHI'), set_value('university_name'), "class='form-control university_name' data-plugin-selectTwo id='university_name' ");
											?>
											<!-- onchange="getSubcate('http://localhost/smart/project-admin-panel/get-subcate-cate')" -->
											<span class="error"><?= form_error('university_name') ?></span>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label">Select College </label>
											<?php
											echo form_dropdown("college_name", $arrayBranch, set_value('college_name'), "class='form-control onChangeSelect-college_name' onchange=get_discipline_from_college('url') data-plugin-selectTwo id='college_name' ");
											?>
											<span class="error"><?= form_error('college_name') ?></span>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label">Select Discipline </label>
											<?php
											echo form_dropdown("discipline_name", array('' => 'Select'), set_value('discipline_name'), "class='form-control onChangeSelect-discipline_name' onchange=get_stream_from_dis('url') data-plugin-selectTwo id='discipline_name' ");
											?>
											<span class="error"><?= form_error('discipline_name') ?></span>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label">Select Stream </label>
											<?php
											echo form_dropdown("streams", array('' => 'Select'), set_value('streams'), "class='form-control onChangeSelect-streams' onchange=get_subject_from_stream('url') data-plugin-selectTwo id='streams' ");
											?>
											<span class="error"><?= form_error('streams') ?></span>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label">Subject Name </label>
											<?php
											echo form_dropdown("subject_name", array('' => 'Select'), set_value('subject_name'), "class='form-control onChangeSelect-subject_name' data-plugin-selectTwo id='subject_name' ");
											?>
											<span class="error"><?= form_error('subject_name') ?></span>
										</div>
									</div>
								</div>
							</div>
						</div>

						<footer class="panel-footer">
							<div class="row">
								<div class="col-md-o mb-smffset-10 col-md-2">
									<button type="submit" name="save" value="1" class="btn btn btn-default btn-block">
										<i class="fas fa-plus-circle"></i> <?= translate('save') ?>
									</button>
								</div>
							</div>
						</footer>
						<?php echo form_close(); ?>
					</section>
				</div>
			</div>
		</section>
	</div>
</div>

<script>
	
</script>