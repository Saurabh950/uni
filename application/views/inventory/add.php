<?php $widget = (is_superadmin_loggedin() ? 3 : 4); ?>
<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<header class="panel-heading">
				<h4 class="panel-title"><i class="fas fa-graduation-cap"></i> Add Inventory</h4>
			</header>
			<?php echo form_open_multipart($this->uri->uri_string()); ?>

			<div class="panel-body">


				<?php $academic_year = get_session_id(); ?>

				<div class="form-group mt-md">
					<label class="col-md-3 control-label">Name <span class="required">*</span></label>
					<div class="col-md-6">
						<input type="text" class="form-control" name="branch_name" value="<?= set_value('branch_name') ?>" />
						<span class="error"><?= form_error('branch_name') ?></span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><?= translate('price') ?> <span class="required">*</span></label>
					<div class="col-md-6">
						<input type="text" class="form-control" name="price" value="<?= set_value('email') ?>" />
						<span class="error"><?= form_error('email') ?></span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label">Stock <span class="required">*</span></label>
					<div class="col-md-6">
						<input type="text" class="form-control" name="mobileno" value="<?= set_value('mobileno') ?>">
						<span class="error"><?= form_error('mobileno') ?></span>
					</div>
				</div>
				
			</div>
			<footer class="panel-footer">
				<div class="row">
					<div class="col-md-o mb-smffset-10 col-md-2">
						<button type="button" name="save" value="1" class="btn btn btn-default btn-block">
							<i class="fas fa-plus-circle"></i> <?= translate('save') ?>
						</button>
					</div>
				</div>
			</footer>
			<?php echo form_close(); ?>
		</section>
	</div>
</div>