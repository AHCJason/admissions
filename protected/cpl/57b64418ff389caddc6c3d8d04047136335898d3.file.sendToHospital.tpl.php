<?php /* Smarty version Smarty-3.1.13, created on 2014-03-26 10:34:37
         compiled from "/var/www/admit_app/admissions/protected/tpl/facility/sendToHospital.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9158301875333019d7e0e16-60447110%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '57b64418ff389caddc6c3d8d04047136335898d3' => 
    array (
      0 => '/var/www/admit_app/admissions/protected/tpl/facility/sendToHospital.tpl',
      1 => 1395702646,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9158301875333019d7e0e16-60447110',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'schedule' => 0,
    'atHospitalRecord' => 0,
    'codes' => 0,
    'hospital' => 0,
    'dischargedBy' => 0,
    'SITE_URL' => 0,
    'path' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5333019d958be4_14337904',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5333019d958be4_14337904')) {function content_5333019d958be4_14337904($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/admit_app/cms2/protected/lib/contrib/Smarty-3.1.13/libs/plugins/modifier.date_format.php';
?><?php $_smarty_tpl->tpl_vars['atHospitalRecord'] = new Smarty_variable($_smarty_tpl->tpl_vars['schedule']->value->atHospitalRecord(), null, 0);?>
<?php $_smarty_tpl->tpl_vars['codes'] = new Smarty_variable(CMS_Icd9_Codes::generate(), null, 0);?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['codes']->value->load($_smarty_tpl->tpl_vars['atHospitalRecord']->value->icd9_id), ENT_QUOTES, 'UTF-8');?>

<?php echo smarty_set_title(array('title'=>"Hospital Stay for ".((string)$_smarty_tpl->tpl_vars['schedule']->value->getPatient()->fullName())),$_smarty_tpl);?>

<?php $_smarty_tpl->tpl_vars['hospital'] = new Smarty_variable(CMS_Hospital::generate(), null, 0);?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['hospital']->value->load($_smarty_tpl->tpl_vars['atHospitalRecord']->value->hospital), ENT_QUOTES, 'UTF-8');?>

<?php $_smarty_tpl->tpl_vars['dischargedBy'] = new Smarty_variable(CMS_Site_User::generate(), null, 0);?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['dischargedBy']->value->load($_smarty_tpl->tpl_vars['atHospitalRecord']->value->discharge_nurse), ENT_QUOTES, 'UTF-8');?>

<?php $_smarty_tpl->smarty->_tag_stack[] = array('jQueryReady', array()); $_block_repeat=true; echo smarty_jQueryReady(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

$("#hospital-search").autocomplete({
	minLength: 4,
	source: function(req, add) {
		$.getJSON(SITE_URL, { page: 'hospital', action: 'searchHospital', term: req.term}, function (json) {
			var suggestions = [];
			$.each (json, function(i, val) {
				var obj = new Object;
				obj.value = val.id;
				obj.label = val.name + " (" + val.state + ")";
				obj.phone = val.phone;
				suggestions.push(obj);
			});
			add(suggestions);
		});
	}
	,select: function (e, ui) {
		e.preventDefault();
		$("#hospital").val(ui.item.value);
		$("#hospital-phone").html(ui.item.phone);
		e.target.value = ui.item.label;		
	}
});

$("#code-search").autocomplete({
	minLength: 3,
	source: function(req, add) {
		$.getJSON(SITE_URL, { page: 'coord', action: 'searchCodes', term: req.term}, function (json) {
			var suggestions = [];
			$.each (json, function(i, val) {
				var obj = new Object;
				obj.value = val.id;
				obj.label = val.short_desc + " (" + val.code + ")";
				suggestions.push(obj);
			});
			add(suggestions);
		});
	}
	,select: function (e, ui) {
		e.preventDefault();
		$("#icd9").val(ui.item.value);
		e.target.value = ui.item.label;		
	}
});


$("input[name=bedhold_offered]").click(function(e) {
	if ($(this).attr("checked") == "checked") {
		$("#bedhold-input-details").slideDown();
	} else {
		$("#bedhold-input-details").slideUp();
	}
});


if ($('input[name="datetime_discharge"]').val() == '') {
	$(".affirm-details").hide();
} else {
	$(".affirm-details").show();
}

$("input[name=affirm]").click(function(e) {
	// hide all
	if ($(this).attr("checked") == "checked" && $(this).val() == "admitted") {
		$(".affirm-details").slideDown();
	} else {
		$(".affirm-details").slideUp();
	}	
});

$(".schedule-datetime").datetimepicker({
	buttonImageOnly: true,
	timeFormat: "hh:mm tt",
	stepMinute: 15,
	hour: 11
	
});


$(".bedhold-datetime").datetimepicker({
	buttonImageOnly: true,
	timeFormat: "hh:mm tt",
	stepMinute: 15,
	hour: 13
	
});




$(".phone").mask("(999) 999-9999");
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_jQueryReady(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>


<?php if ($_smarty_tpl->tpl_vars['atHospitalRecord']->value==false){?>
<h1 class="text-center">Initiate Hospital Visit<br /><span class="text-14">for</span> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['schedule']->value->getPatient()->fullName(), ENT_QUOTES, 'UTF-8');?>
</h1>
<?php }else{ ?>
<h1 class="text-center">Manage Hospital Visit<br /><span class="text-14">for</span> <span class="text-18"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['schedule']->value->getPatient()->fullName(), ENT_QUOTES, 'UTF-8');?>
</span></h1>
<?php }?>
<form method="post" action="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SITE_URL']->value, ENT_QUOTES, 'UTF-8');?>
">
	<input type="hidden" name="page" value="facility" />
	<input type="hidden" name="action" value="submitSendtoHospital" />
	<input type="hidden" name="schedule" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['schedule']->value->pubid, ENT_QUOTES, 'UTF-8');?>
" />	
	<input type="hidden" name="_path" value="<?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['path']->value)===null||$tmp==='' ? urlencode(currentURL()) : $tmp), ENT_QUOTES, 'UTF-8');?>
" />
	<?php if ($_smarty_tpl->tpl_vars['atHospitalRecord']->value!=false){?>
	<input type="hidden" name="id" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['atHospitalRecord']->value->pubid, ENT_QUOTES, 'UTF-8');?>
" />
	<?php }?>
	<table id="form-table" cellpadding="5" cellspacing="0">
		<tr>
			<th colspan="2">Hospital Visit Info</th>
		</tr>
		<tr>
			<td valign="top"><strong>Hospital</strong></td>
			<td valign="top"><strong>Hospital Phone Number</strong></td>
		</tr>
		<tr>
			<td valign="top">
				<input type="text" id="hospital-search" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['hospital']->value->name, ENT_QUOTES, 'UTF-8');?>
" size="60" />
				<input type="hidden" name="hospital" id="hospital" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['hospital']->value->id, ENT_QUOTES, 'UTF-8');?>
" />
			</td>
			<td id="hospital-phone"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['hospital']->value->phone, ENT_QUOTES, 'UTF-8');?>
</td>
		</tr>
		<tr>
			<td></td>
		</tr>
		<tr>
			<td valign="top"><strong>Reason Sent to Hospital</strong></td>
			<td><strong>Type of Hospital Visit</strong></td>
		</tr>
		<tr>
			<td width="250px">
				<textarea name="comment" rows="5" cols="65"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['atHospitalRecord']->value->comment, ENT_QUOTES, 'UTF-8');?>
</textarea>
			</td>
			<td valign="top">
 				<input type="radio" name="visit_type" value="0"<?php if ($_smarty_tpl->tpl_vars['atHospitalRecord']->value->scheduled_visit==0){?> checked<?php }?> />Unscheduled<br />
				<input type="radio" name="visit_type" value="1"<?php if ($_smarty_tpl->tpl_vars['atHospitalRecord']->value->scheduled_visit==1){?> checked<?php }?> />Scheduled<br />				
			</td>
		</tr>
		<tr>
			<td valign="top"><strong>Date &amp; Time Sent</strong></td>
			<td><strong>Discharged By:</strong></td>
		</tr>
		<tr>
			<td valign="top">
				<input type="text" name="datetime_sent" class="schedule-datetime"<?php if ($_smarty_tpl->tpl_vars['atHospitalRecord']->value->datetime_sent!=''){?> value="<?php echo htmlspecialchars(smarty_modifier_date_format(strtotime($_smarty_tpl->tpl_vars['atHospitalRecord']->value->datetime_sent),"%m/%d/%Y %I:%M %P"), ENT_QUOTES, 'UTF-8');?>
"<?php }else{ ?> value="<?php echo htmlspecialchars(smarty_modifier_date_format(time(),"%m/%d/%Y %I:%M %P"), ENT_QUOTES, 'UTF-8');?>
"<?php }?> />
			</td>
			<td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['dischargedBy']->value->first, ENT_QUOTES, 'UTF-8');?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['dischargedBy']->value->last, ENT_QUOTES, 'UTF-8');?>
</td>
		</tr>		
		<tr>
			<td>&nbsp;</td>
		</tr>
		<?php if ($_smarty_tpl->tpl_vars['atHospitalRecord']->value==''){?>
			<tr>
				<td valign="top"><input type="checkbox" name="direct_admit" value="1" /> <strong>Direct Admit Patient to hospital</strong><br /></td>
			</tr>
		<?php }else{ ?>
			<tr>
				<th colspan="2">Patient Status</th>
			</tr>
			<tr>
				<td colspan="2"><input type="radio" name="affirm" value="admitted" <?php if ($_smarty_tpl->tpl_vars['atHospitalRecord']->value->was_admitted==1){?> checked<?php }?> /> Patient was admitted to the hospital.
					<div class="affirm-details" id="admitted-details" style="display: none; margin-left: 20px;">
						<strong>Discharge as of:</strong> &nbsp;<input type="text" name="datetime_discharge" class="schedule-datetime" value="<?php echo htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['schedule']->value->datetime_discharge,"%m/%d/%Y %I:%M %P"), ENT_QUOTES, 'UTF-8');?>
" />
					</div>
				</td>
			</tr>
			<tr>
				<td colspan="2"><input type="radio" name="affirm" value="under-observation" /> Patient is still under observation.</td>
			</tr>
			<tr>
				<td colspan="2"><input type="radio" name="affirm" value="not-admitted" /> Patient was not admitted to the hospital and has returned to the facility.</td>
			</tr>
		<?php }?>
		<tr>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td colspan="2" align="right"><input type="checkbox" name="bedhold_offered" value="1"<?php if ($_smarty_tpl->tpl_vars['atHospitalRecord']->value->bedhold_offered==1){?> checked<?php }?> /> <strong>Patient accepted a bed hold.</strong></td>
		</tr>
		<tr>
			<td valign="top" align="right" colspan="2">
				
				<div id="bedhold-input-details" <?php if ($_smarty_tpl->tpl_vars['atHospitalRecord']->value->bedhold_offered!=1){?> style="display: none;"<?php }?>>
					<strong>Hold bed until:</strong> <input type="text" name="datetime_bedhold_end" class="bedhold-datetime"<?php if ($_smarty_tpl->tpl_vars['schedule']->value->datetime_discharge_bedhold_end){?>value="<?php echo htmlspecialchars(smarty_modifier_date_format(strtotime($_smarty_tpl->tpl_vars['schedule']->value->datetime_discharge_bedhold_end),"%m/%d/%Y %I:%M %P"), ENT_QUOTES, 'UTF-8');?>
"<?php }elseif($_smarty_tpl->tpl_vars['atHospitalRecord']->value->datetime_bedhold_end!=''){?> value="<?php echo htmlspecialchars(smarty_modifier_date_format(strtotime($_smarty_tpl->tpl_vars['atHospitalRecord']->value->datetime_bedhold_end),"%m/%d/%Y %I:%M %P"), ENT_QUOTES, 'UTF-8');?>
"<?php }?> />
				</div>
			</td>
		</tr>
		<tr>
			<td colspan="2" align="right">
				<input type="submit" value="Save" />
			</td>
		</tr>
	</div>
	</table>
</form><?php }} ?>