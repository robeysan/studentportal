<br><br><br>
<div class='row'>
	<div class='span8'>
		<h2>Setup ECs</h2>
		<form id='clear_users'>
			<fieldset>
				<table class="table table-condensed table-bordered table-hover">
					<tr>
						<th>Portal</th>
						<th>Name</th>
						<th>Type</th>
						<th>Email</th>
						<th>&nbsp</th>
					</tr>
					<tbody>
					<?php
						foreach ($ecs as $ec) {

							?>
							<form>
								<tr>
									<td><?php echo $ec['portal']; ?></td>
									<td><?php echo "{$ec['first_name']} {$ec['last_name']}"; ?></td>
									<td><?php echo $ec['type']; ?></td>
									<td>
										<input type='text' id='<?php echo "{$ec['portal']}{$ec['uid']}";?>' value='<?php echo $ec['email']; ?>'>
										<span id='<?php echo "{$ec['portal']}{$ec['uid']}";?>' class="help-block alert" style='display:none'>Updated</span>
									</td>
									<td><button type="button" class="save_ecs btn-mini" onClick="update_ec_email(<?php echo "'{$ec['portal']}','{$ec['uid']}'";?>)">update</button></td>
								</tr>
							</form>
							<?php
						}
					?>
					</tbody>
				</table>
			</fieldset>
		</form>

	</div>
	<div class='span4'>
		<h2>Clear User's Data</h2>
		<form id='clear_users'>
			<fieldset>
				<label>Clear User Profiles In this Portal</label>
				<label class="checkbox">
					<select id='clear_portal'>
						<option>Select Portal</option>
						<?php foreach ($portal_names as $portal_name) { ?>
							<option value = "<?php echo $portal_name; ?>" ><?php echo strtoupper($portal_name); ?></option>
						<?php } ?>
					</select>
					<span class="help-block">Clears user profiles, applications, resets ECs and clears login data</span>
				</label>
				<button id='clear_users_submit' type="button" class="btn">Clear User Profiles</button>
				<label><span id='clear_users_msg' style='display:none'>Users Cleared</span></label>
			</fieldset>
		</form>
	</div>
</div>

<div class='row'>
	<div class='span8'>
		<table class="table table-condensed table-bordered table-hover">
			<tr>
				<th>db.table</th>
				<th># of rows in this environment that are not in production</th>
				<th># of rows in production that are not in this environment</th>
				<th>In sync yes/no</th>
			<tr>
			<tbody>
				<tr>
					<td>aurora grail.client_programs</td>
					<td><?php echo count($aurora_compare_grail_cp['dev_diff']); ?></td>
					<td><?php echo count($aurora_compare_grail_cp['prod_diff']); ?></td>
					<td><?php echo ((count($aurora_compare_grail_cp['dev_diff']) + count($aurora_compare_grail_cp['prod_diff'])==0)?'Yes':'NO'); ?></td>
				</tr>
				<tr>
					<td>CSP grail.client_programs</td>
					<td><?php echo count($csp_compare_grail_cp['dev_diff']); ?></td>
					<td><?php echo count($csp_compare_grail_cp['prod_diff']); ?></td>
					<td><?php echo ((count($csp_compare_grail_cp['dev_diff']) + count($csp_compare_grail_cp['prod_diff'])==0)?'Yes':'NO'); ?></td>
				</tr>
				<tr>
					<td>UOF grail.client_programs</td>
					<td><?php echo count($uof_compare_grail_cp['dev_diff']); ?></td>
					<td><?php echo count($uof_compare_grail_cp['prod_diff']); ?></td>
					<td><?php echo ((count($uof_compare_grail_cp['dev_diff']) + count($uof_compare_grail_cp['prod_diff'])==0)?'Yes':'NO'); ?></td>
				</tr>
				<tr>
					<td>grail.client_programs_services</td>
					<td><?php echo count($compare_cps['dev_diff']); ?></td>
					<td><?php echo count($compare_cps['prod_diff']); ?></td>
					<td><?php echo ((count($compare_cps['dev_diff']) + count($compare_cps['prod_diff'])==0)?'Yes':'NO'); ?></td>
				</tr>
				<tr>
					<td>grail.client_programs_to_applications</td>
					<td><?php echo count($compare_cpa['dev_diff']); ?></td>
					<td><?php echo count($compare_cpa['prod_diff']); ?></td>
					<td><?php echo ((count($compare_cpa['dev_diff']) + count($compare_cpa['prod_diff'])==0)?'Yes':'NO'); ?></td>
				</tr>
				<tr>
					<td>CSP elp.elp_items</td>
					<td><?php echo count($csp_compare_elp_items['dev_diff']); ?></td>
					<td><?php echo count($csp_compare_elp_items['prod_diff']); ?></td>
					<td><?php echo ((count($csp_compare_elp_items['dev_diff']) + count($csp_compare_elp_items['prod_diff'])==0)?'Yes':'NO'); ?></td>
				</tr>
				<tr>
					<td>aurora elp.elp_items</td>
					<td><?php echo count($aurora_compare_elp_items['dev_diff']); ?></td>
					<td><?php echo count($aurora_compare_elp_items['prod_diff']); ?></td>
					<td><?php echo ((count($aurora_compare_elp_items['dev_diff']) + count($aurora_compare_elp_items['prod_diff'])==0)?'Yes':'NO'); ?></td>
				</tr>
				<tr>
					<td>UOF elp.elp_items</td>
					<td><?php echo count($uof_compare_elp_items['dev_diff']); ?></td>
					<td><?php echo count($uof_compare_elp_items['prod_diff']); ?></td>
					<td><?php echo ((count($uof_compare_elp_items['dev_diff']) + count($uof_compare_elp_items['prod_diff'])==0)?'Yes':'NO'); ?></td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class='span4'>
		<h2>Portal Address Status</h2>
		<form id='clear_users'>
			<fieldset>
				<label>Portal Address Configuration</label>
					<?php
						if (($csp_portal_address)=='csp.'.ENVIRONMENT.'.learninghouse.com') {
							echo "<div class='alert alert-success'>CSP portal address is setup correctly. $csp_portal_address<br></div>";
						}else{
							?>
								<div id='csp_portal_address_msg' class='alert alert-error'>
									<span id='csp_portal_address_err'>CSP portal address is incorrect. <?php echo $csp_portal_address; ?></span>
									<span id='csp_portal_address_msg' style='display:none'>Portal address updated. Refresh to see status.</span>
									<button type="button" class="csp_update_portal btn-mini" onClick="update_portal('csp')">fix it!</button>
								</div>
							<?php
						}
						if (($aurora_portal_address)=='aurora.'.ENVIRONMENT.'.learninghouse.com') {
							echo "<div class='alert alert-success'>aurora portal address is setup correctly. $aurora_portal_address<br></div>";
						}else{
							?>
								<div id='aurora_portal_address_msg' class='alert alert-error'>
									<span id='aurora_portal_address_err'>aurora portal address is incorrect. <?php echo $aurora_portal_address; ?></span>
									<span id='aurora_portal_address_msg' style='display:none'>Portal address updated. Refresh to see status.</span>
									<button type="button" class="aurora_update_portal btn-mini" onClick="update_portal('aurora')">fix it!</button>
								</div>
							<?php
							
						}
						if (($uof_portal_address)=='uof.'.ENVIRONMENT.'.learninghouse.com') {
							echo "<div class='alert alert-success'>UOF portal address is setup correctly. $uof_portal_address<br></div>";
						}else{
							?>
								<div id='uof_portal_address_msg' class='alert alert-error'>
									<span id='uof_portal_address_err'>UOF portal address is incorrect. <?php echo $uof_portal_address; ?></span>
									<span id='uof_portal_address_msg' style='display:none'>Portal address updated. Refresh to see status.</span>
									<button type="button" class="uof_update_portal btn-mini" onClick="update_portal('uof')">fix it!</button>
								</div>
							<?php
							
						}
					?>
			</fieldset>
		</form>
	</div>
</div>

<div class='row'>
	<div class='span8'>
	</div>
	<div class='span4'>
		<h2>Clear Messages</h2>
		<form>
			<fieldset>Clears messages from the selected portal.</fieldset>
			<select id='cls_msg_portal'>
				<option>Select Portal</option>
				<?php foreach ($portal_names as $portal_name) { ?>
					<option value = "<?php echo $portal_name; ?>" ><?php echo strtoupper($portal_name); ?></option>
				<?php } ?>
			</select>
			<button id='cls_msg_submit' type="button" class="btn">Clear Messages</button>
			<label><span id='cls_msg_msg' style='display:none'>Messages Cleared</span></label>
		</form>
	</div>
</div>

<script type="text/javascript">
	function update_portal(portal)
	{
		var postdata = 'portal='+portal;
		$.ajax({
			type: "POST",
			url: "setup/update_portal_address",
			data:postdata,
			success: function(data) {
				console.log(data);
				if (data==true) {
					$('span#'+portal+'_portal_address_msg').show('fast');
					$('span#'+portal+'_portal_address_err').hide('fast');
					$('button.'+portal+'_update_portal').hide('fast');
					$('div#'+portal+'_portal_address_msg').removeClass('alert-error');
					$('div#'+portal+'_portal_address_msg').addClass('alert-info');
				};
			}
		});
		return false;
	}

	function update_ec_email(portal,ec_uid)
	{
		var postdata = 'email='+$('input#'+portal+ec_uid).val()+'&portal='+portal+'&uid='+ec_uid;
		$.ajax({
			type: "POST",
			url: "setup/update_ec_email",
			data:postdata,
			success: function(data) {
				if (data==true) {
					$('span#'+portal+ec_uid).show('fast');
					$('span#'+portal+ec_uid).hide('slow');
				};
			}
		});
		return false;
	}

	$(document).ready(function() {
		$('#cls_msg_submit').click(function(){
			portal = 'portal='+$('#cls_msg_portal').val();
			$.ajax({
				type: "POST",
				url: "setup/clear_msg",
				data:portal,
				success: function(data) {
					if (data=='true') {
						$('#cls_msg_msg').show('fast');
					};
				}
			});
			return false;
		});

		$('#clear_users_submit').click(function(){
			portal = 'portal='+$('#clear_portal').val();
			$.ajax({
				type: "POST",
				url: "setup/clear_users",
				data:portal,
				success: function(data) {
					if (data=='true') {
						$('#clear_users_msg').show('fast');
					};
				}
			});
			return false;
		});
	});
	 
</script>