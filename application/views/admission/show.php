<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<header class="panel-heading">
				<h4 class="panel-title"><i class="fas fa-graduation-cap"></i> <?= translate('student_admission') ?></h4>
			</header>
			<div class="tabs-custom">
				<ul class="nav nav-tabs">
					<li class="active">
						<a href="#academic" data-toggle="tab">Personan Information</a>
					</li>
					<li>
						<a href="#admission" data-toggle="tab"> Academic Information</a>
					</li>
					<li>
						<a href="#admission2" data-toggle="tab"> Applying for Discipline</a>
					</li>
				</ul>
			</div>
			<div class="tab-content">
				<div id="academic" class="tab-pane active">
					<div class="panel-body">
						<!-- academic details-->
						<div class="headers-line">
							<i class="fas fa-school"></i> <?= translate('academic_details') ?>
						</div>

						<?php $academic_year = get_session_id(); ?>
						<div class="row">
							<div class="col-md-3 mb-sm">
								<div class="form-group">
									<label class="control-label">Full Name of Student </label>
									<input type="text" class="form-control" value="<?= set_value('full_name', $admission_details['full_name']) ?>" readonly />
								</div>
							</div>

							<div class="col-md-3 mb-sm">
								<div class="form-group">
									<label class="control-label">छात्र का पूरा नाम ( हिंदी में ) *</label>
									<input type="text" class="form-control" value="<?= set_value('full_hindi_name', $admission_details['full_hindi_name']) ?>" readonly />
								</div>
							</div>

							<div class="col-md-3 mb-sm">
								<div class="form-group">
									<label class="control-label">Father's Name</label>
									<input type="text" class="form-control" value="<?= set_value('father_name', $admission_details['father_name']) ?>" readonly />

								</div>
							</div>
							<div class="col-md-3 mb-sm">
								<div class="form-group">
									<label class="control-label">पिता का नाम ( हिंदी में )</label>
									<input type="text" class="form-control" value="<?= set_value('father_hindi_name', $admission_details['full_hindi_name']) ?>" readonly />
								</div>
							</div>
						</div>
						<div class="row mb-md">
							<div class="col-md-3 mb-sm">
								<div class="form-group">
									<label class="control-label">Mother's Name </label>
									<input type="text" class="form-control" value="<?= set_value('father_hindi_name', $admission_details['full_hindi_name']) ?>" readonly />
								</div>
							</div>
							<div class="col-md-3 mb-sm">
								<div class="form-group">
									<label class="control-label">माता का नाम ( हिंदी में ) *</label>
									<input type="text" class="form-control" value="<?= set_value('mother_name', $admission_details['mother_name']) ?>" readonly />
								</div>
							</div>
							<div class="col-md-3 mb-sm">
								<div class="form-group">
									<label class="control-label">Date of Birth on Certificate </label>
									<input type="text" class="form-control" value="<?= set_value('birthday', $admission_details['birthday']) ?>" readonly />
								</div>
							</div>
							<div class="col-md-3 mb-sm">
								<div class="form-group">
									<label class="control-label">Gender</label>
									<input type="text" class="form-control" value="<?= set_value('admission_date', $admission_details['gender']) ?>" readonly />
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3 mb-sm">
								<div class="form-group">
									<label class="control-label">Blood Group </label>
									<input type="text" class="form-control" value="<?= set_value('blood_group', $admission_details['blood_group'], $register_id) ?>" readonly />
								</div>
							</div>

							<div class="col-md-3 mb-sm">
								<div class="form-group">
									<label class="control-label">Marital Status</label>
									<input type="text" class="form-control" value="<?= set_value('marital_status', $admission_details['marital_status'], $register_id) ?>" readonly />
								</div>
							</div>

							<div class="col-md-3 mb-sm">
								<div class="form-group">
									<label class="control-label">Religion</label>
									<input type="text" class="form-control" value="<?= set_value('religion', $admission_details['religion']) ?>" readonly />

								</div>
							</div>
							<div class="col-md-3 mb-sm">
								<div class="form-group">
									<label class="control-label">ID</label>
									<input type="text" class="form-control" value="<?= set_value('id_type', $admission_details['id_type']) ?>" readonly />
								</div>
							</div>
						</div>
						<div class="row mb-md">
							<div class="col-md-3 mb-sm">
								<div class="form-group">
									<label class="control-label">Other ID Card Type</label>
									<input type="text" class="form-control" value="<?= set_value('other_id', $admission_details['other_id']) ?>" readonly />
								</div>
							</div>
							<div class="col-md-3 mb-sm">
								<div class="form-group">
									<label class="control-label">ID Card Number from Selected IDCard Type</label>
									<input type="text" class="form-control" value="<?= set_value('id_card_number', $admission_details['id_card_number']) ?>" readonly />
								</div>
							</div>
							<div class="col-md-3 mb-sm">
								<div class="form-group">
									<label class="control-label">Identification Mark</label>
									<input type="text" class="form-control" value="<?= set_value('id_mark', $admission_details['id_mark']) ?>" readonly />
								</div>
							</div>
							<div class="col-md-3 mb-sm">
								<div class="form-group">
									<label class="control-label">Nationality</label>
									<input type="text" class="form-control" value="<?= set_value('nationality', $admission_details['nationality']) ?>" readonly />
								</div>
							</div>
							<div class="col-md-3 mb-sm">
								<div class="form-group">
									<label class="control-label">Are You NRI ?</label>
									<input type="text" class="form-control" value="<?= set_value('nri_status', $admission_details['nri_status']) ?>" readonly />
								</div>
							</div>
						</div>
						<!--Reservation details -->
						<div class="headers-line mt-md">
							<i class="fas fa-user-check"></i> Reservation Details Section
						</div>

						<div class="row">
							<div class="col-md-3 mb-sm">
								<div class="form-group">
									<label class="control-label">Do You have Domicile of Jharkhan</label>
									<input type="text" class="form-control" value="<?= set_value('state_native', $admission_details['state_native']) ?>" readonly />
								</div>
							</div>

							<div class="col-md-3 mb-sm">
								<div class="form-group">
									<label class="control-label">Caste Category</label>
									<input type="text" class="form-control" value="<?= set_value('caste_category', $admission_details['caste_category']) ?>" readonly />
								</div>
							</div>

							<div class="col-md-3 mb-sm">
								<div class="form-group">
									<label class="control-label">Economically Weaker Section</label>
									<input type="text" class="form-control" value="<?= set_value('ews', $admission_details['ews']) ?>" readonly />

								</div>
							</div>
							<div class="col-md-3 mb-sm">
								<div class="form-group">
									<label class="control-label">Is Under BPL Category</label>
									<input type="text" class="form-control" value="<?= set_value('bpl', $admission_details['bpl']) ?>" readonly />
								</div>
							</div>
						</div>
						<div class="row mb-md">
							<div class="col-md-3 mb-sm">
								<div class="form-group">
									<label class="control-label">Differently Abled Category</label>
									<input type="text" class="form-control" value="<?= set_value('diff_abled', $admission_details['diff_abled']) ?>" readonly />
								</div>
							</div>
							<div class="col-md-3 mb-sm">
								<div class="form-group">
									<label class="control-label">Is Kashmir Migrants</label>
									<input type="text" class="form-control" value="<?= set_value('kashmir_migrants', $admission_details['kashmir_migrants']) ?>" readonly />
								</div>
							</div>
						</div>

						<!-- Weightage  details -->
						<div class="headers-line mt-md">
							<i class="fas fa-user-check"></i> Weightage Details Section
						</div>

						<div class="row">
							<div class="col-md-3 mb-sm">
								<div class="form-group">
									<label class="control-label">Are you NCC Cadet ?</label>
									<input type="text" class="form-control" value="<?= set_value('ncc', $admission_details['ncc']) ?>" readonly />
								</div>
							</div>

							<div class="col-md-3 mb-sm">
								<div class="form-group">
									<label class="control-label">Are you N.S.S. Volunteer ?</label>
									<input type="text" class="form-control" value="<?= set_value('nss_volunteer', $admission_details['nss_volunteer']) ?>" readonly />
								</div>
							</div>

							<div class="col-md-3 mb-sm">
								<div class="form-group">
									<label class="control-label">Extra Curricular Activity</label>
									<input type="text" class="form-control" value="<?= set_value('extra_curricular', $admission_details['extra_curricular']) ?>" readonly />
								</div>
							</div>
							<div class="col-md-3 mb-sm">
								<div class="form-group">
									<label class="control-label">Are you dependent of Ex-Serviceman ?</label>
									<input type="text" class="form-control" value="<?= set_value('exservice_dependent', $admission_details['exservice_dependent']) ?>" readonly />
								</div>
							</div>
						</div>
						<div class="row mb-md">
							<div class="col-md-3 mb-sm">
								<div class="form-group">
									<label class="control-label">Range & Rover</label>
									<input type="text" class="form-control" value="<?= set_value('range_rover', $admission_details['range_rover']) ?>" readonly />
								</div>
							</div>
							<div class="col-md-3 mb-sm">
								<div class="form-group">
									<label class="control-label">Are You Ward of the Teaching / Non-Teaching Staff of University/College ?</label>
									<input type="text" class="form-control" value="<?= set_value('institute_relative', $admission_details['institute_relative']) ?>" readonly />
								</div>
							</div>
						</div>

						<!-- Permanent Address  details -->
						<div class="headers-line mt-md">
							<i class="fas fa-user-check"></i> Permanent Address Section
						</div>

						<div id="guardian_form" <?php if (set_value('guardian_chk') == true) echo 'style="display: none;"'; ?>>

							<div class="row">
								<div class="col-md-12 mb-sm">
									<div class="form-group">
										<label class="control-label">House No. Street/Village, Post Office, Police Station Name *</label>
										<textarea name="grd_address" rows="2" class="form-control" aria-required="true" readonly><?= set_value('address', $admission_details['address']) ?></textarea>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3 mb-sm">
									<div class="form-group">
										<label class="control-label">City Name</label>
										<input class="form-control" name="grd_city" value="<?= set_value('city', $admission_details['city']) ?>" type="text" readonly>
									</div>
								</div>
								<div class="col-md-3 mb-sm">
									<div class="form-group">
										<label class="control-label">State Name</label>
										<input class="form-control" name="grd_state" value="<?= set_value('state', $admission_details['state']) ?>" type="text" readonly>
									</div>
								</div>
								<div class="col-md-3 mb-sm">
									<div class="form-group">
										<label class="control-label">District Name</label>
										<input class="form-control" name="grd_state" value="<?= set_value('pincode', $admission_details['pincode']) ?>" type="text" readonly>
									</div>
								</div>
								<div class="col-md-3 mb-sm">
									<div class="form-group">
										<label class="control-label">Pin Code</label>
										<input class="form-control" name="grd_state" value="<?= set_value('institute_relative', $admission_details['institute_relative']) ?>" type="text" readonly>
									</div>
								</div>
							</div>
						</div>
						<!-- Present Address  details -->
						<div class="headers-line mt-md">
							<i class="fas fa-user-check"></i> Present Address Section
						</div>

						<div id="guardian_form" <?php if (set_value('guardian_chk') == true) echo 'style="display: none;"'; ?>>
							<div class="mb-sm checkbox-replace">
								<label class="i-checks">
									<input type="checkbox" name="guardian_chk" id="chkGuardian" value="true" <?php if (set_value('institute_relative', $admission_details['institute_relative']) == true) echo 'checked'; ?>><i></i>
									Same as Permanent Address
								</label>
							</div>
							<div class="row">
								<div class="col-md-12 mb-sm">
									<div class="form-group">
										<label class="control-label">House No. Street/Village, Post Office, Police Station Name *</label>
										<textarea name="grd_address" rows="2" class="form-control" aria-required="true" readonly><?= set_value('present_address', $admission_details['present_address']) ?></textarea>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3 mb-sm">
									<div class="form-group">
										<label class="control-label">City Name</label>
										<input class="form-control" name="grd_city" value="<?= set_value('present_city', $admission_details['present_city']) ?>" type="text" readonly>
									</div>
								</div>
								<div class="col-md-3 mb-sm">
									<div class="form-group">
										<label class="control-label">State Name</label>
										<input class="form-control" name="grd_state" value="<?= set_value('present_state', $admission_details['present_state']) ?>" type="text" readonly>
									</div>
								</div>
								<div class="col-md-3 mb-sm">
									<div class="form-group">
										<label class="control-label">District Name</label>
										<input class="form-control" name="grd_state" value="<?= set_value('present_district', $admission_details['present_district']) ?>" type="text" readonly>
									</div>
								</div>
								<div class="col-md-3 mb-sm">
									<div class="form-group">
										<label class="control-label">Pin Code</label>
										<input class="form-control" name="grd_state" value="<?= set_value('present_pincode', $admission_details['present_pincode']) ?>" type="text" readonly>
									</div>
								</div>
							</div>
						</div>

						<!-- Upload Documents details -->
						<div class="headers-line mt-md">
							<i class="fas fa-user-check"></i> Upload Documents Section
						</div>
					</div>
				</div>

				<div id="admission" class="tab-pane">
					<div class="panel-body">
						<!-- academic details-->
						<div class="headers-line">
							<i class="fas fa-school"></i> Academic Information Section
						</div>

						<?php $academic_year = get_session_id(); ?>
						<div class="row">
							<div class="col-md-3 mb-sm">
								<div class="form-group">
									<label class="control-label">Last Passed Examination </label>
									<input type="text" class="form-control" value="<?= set_value('last_passed', $admission_details['last_passed']) ?>" readonly />
								</div>
							</div>

							<div class="col-md-3 mb-sm">
								<div class="form-group">
									<label class="control-label">Stream Name</label>
									<input type="text" class="form-control" value="<?= set_value('stream_name', $admission_details['stream_name']) ?>" readonly />
								</div>
							</div>

							<div class="col-md-3 mb-sm">
								<div class="form-group">
									<label class="control-label">Course Medium</label>
									<input type="text" class="form-control" value="<?= set_value('course_medium', $admission_details['course_medium']) ?>" readonly />
								</div>
							</div>

							<div class="col-md-3 mb-sm">
								<div class="form-group">
									<label class="control-label">Passing Year</label>
									<input type="text" class="form-control" value="<?= set_value('pass_year', $admission_details['pass_year']) ?>" readonly />
								</div>
							</div>

							<div class="col-md-3 mb-sm">
								<div class="form-group">
									<label class="control-label">Course Type</label>
									<input type="text" class="form-control" value="<?= set_value('course_type', $admission_details['course_type']) ?>" readonly />
								</div>
							</div>

							<div class="col-md-3 mb-sm">
								<div class="form-group">
									<label class="control-label">Division</label>
									<input type="text" class="form-control" value="<?= set_value('division', $admission_details['division']) ?>" readonly />
								</div>
							</div>

							<div class="col-md-3 mb-sm">
								<div class="form-group">
									<label class="control-label">Percentage Of Marks Secured</label>
									<input type="text" class="form-control" value="<?= set_value('percentage_mark', $admission_details['percentage_mark']) ?>" readonly />
								</div>
							</div>

							<div class="col-md-3 mb-sm">
								<div class="form-group">
									<label class="control-label">Name of University/Board</label>
									<input type="text" class="form-control" value="<?= set_value('university_name', $admission_details['university_name']) ?>" readonly />
								</div>
							</div>

							<div class="col-md-3 mb-sm">
								<div class="form-group">
									<label class="control-label">College/School Name</label>
									<input type="text" class="form-control" value="<?= set_value('school_name', $admission_details['school_name']) ?>" readonly />
								</div>
							</div>

							<div class="col-md-3 mb-sm">
								<div class="form-group">
									<label class="control-label">College/School State Name</label>
									<input type="text" class="form-control" value="<?= set_value('state_name', $admission_details['state_name']) ?>" readonly />
								</div>
							</div>

							<div class="col-md-3 mb-sm">
								<div class="form-group">
									<label class="control-label">College/School District Name</label>
									<input type="text" class="form-control" value="<?= set_value('dist_name', $admission_details['dist_name']) ?>" readonly />
								</div>
							</div>
						</div>

						<div class="headers-line mt-md">
							<i class="fas fa-user-check"></i> Subject Wise Marks Entry Section
						</div>
						<?php $subjects = json_decode($admission_details['subjects_ids'], true); foreach ($subjects as $key => $subject) { ?>
							
							<div class="row">
								<div class="col-md-3 mb-sm">
									<div class="form-group">
										<label class="control-label">Select Subject Studied </label>
										<input type="text" class="form-control" value="<?= set_value('subjects_ids', $subject) ?>" readonly />
									</div>
								</div>
								
								<div class="col-md-3 mb-sm">
									<div class="form-group">
										<label class="control-label">Percentage Of Marks Secured</label>
										<input type="text" class="form-control" value="<?= set_value('subjects_percentage_marks', json_decode($admission_details['subjects_percentage_marks'], true)[$key]) ?>" readonly />
									</div>
								</div>
							</div>
						<?php } ?>

					</div>
				</div>

				<div id="admission2" class="tab-pane">
					<div class="panel-body">
						<!-- academic details-->
						<div class="headers-line">
							<i class="fas fa-school"></i> Discipline Information Section
						</div>

						<?php $academic_year = get_session_id(); ?>
						<div class="row">
							<div class="col-md-3 mb-sm">
								<div class="form-group">
									<label class="control-label">Select University </label>
									<input type="text" class="form-control" value="<?= set_value('university_name', $admission_details['university_name']) ?>" readonly />
								</div>
							</div>

							<div class="col-md-3 mb-sm">
								<div class="form-group">
									<label class="control-label">Select College</label>
									<input type="text" class="form-control" value="<?= set_value('branch_name', $admission_details['branch_name']) ?>" readonly />
								</div>
							</div>

							<div class="col-md-3 mb-sm">
								<div class="form-group">
									<label class="control-label">Select Discipline</label>
									<input type="text" class="form-control" value="<?= set_value('discipline_name', $admission_details['discipline_name']) ?>" readonly />
								</div>
							</div>

							<div class="col-md-3 mb-sm">
								<div class="form-group">
									<label class="control-label">Select Stream</label>
									<input type="text" class="form-control" value="<?= set_value('streams', $admission_details['streams']) ?>" readonly />
								</div>
							</div>

							<div class="col-md-3 mb-sm">
								<div class="form-group">
									<label class="control-label">Subject Name</label>
									<input type="text" class="form-control" value="<?= set_value('subject_name', $admission_details['subject_name']) ?>" readonly />
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>