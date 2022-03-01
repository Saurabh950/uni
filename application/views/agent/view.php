<?php $widget = (is_superadmin_loggedin() ? 4 : 6); ?>
<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<header class="panel-heading">
				<h4 class="panel-title"> Check Agent Details</h4>
			</header>
			<div class="panel-body">
				<div class="mb-md">
					<table class="table table-bordered table-hover table-condensed mb-none table-export">
						<thead>
							<tr>
								<th width="50"><?= translate('sl') ?></th>
								<th><?= translate('Agent Name') ?></th>
								<th><?= translate('email') ?></th>
								<th><?= translate('agent_code') ?></th>
								<th><?= translate('mobile_no') ?></th>
								<th><?= translate('city') ?></th>
								<th><?= translate('state') ?></th>
								<th><?= translate('address') ?></th>
								<th class="no-sort"><?= translate('action') ?></th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach ($agents as $agent) {
							?>
								<tr>
									<td widtd="50"><?= translate('sl') ?></td>
									<td><?= $agent->agent_name; ?></td>
									<td><?= $agent->email; ?></td>
									<td><?= $agent->agent_code; ?></td>
									<td><?= $agent->mobile_no; ?></td>
									<td><?= $agent->city; ?></td>
									<td><?= $agent->state; ?></td>
									<td><?= $agent->address; ?></td>
									<td class="min-w-lg">

										<?php if (get_permission('student', 'is_edit')) : ?>
											<!-- update link -->
											<a href="<?php echo base_url('agent/edit/' . $agent->id); ?>" class="btn btn-default btn-circle icon" data-toggle="tooltip" data-original-title="<?= translate('details') ?>">
												<i class="far fa-arrow-alt-circle-right"></i>
											</a>
										<?php 
										endif; ?>
									</td>
								</tr>
							<?php
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
			<footer class="panel-footer">
				<div class="row">
					<div class="col-md-offset-10 col-md-2">
						<!-- <button type="submit" name="search" value="1" class="btn btn-default btn-block"> <i class="fas fa-filter"></i> <?= translate('filter') ?></button> -->
					</div>
				</div>
			</footer>
		</section>

	</div>
</div>