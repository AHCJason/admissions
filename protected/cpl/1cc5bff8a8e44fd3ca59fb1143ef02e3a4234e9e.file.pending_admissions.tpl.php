<?php /* Smarty version Smarty-3.1.13, created on 2014-03-26 10:21:53
         compiled from "/var/www/admit_app/admissions/protected/tpl/coord/pending_admissions.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10631559115332fea1b18829-93316406%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1cc5bff8a8e44fd3ca59fb1143ef02e3a4234e9e' => 
    array (
      0 => '/var/www/admit_app/admissions/protected/tpl/coord/pending_admissions.tpl',
      1 => 1395702646,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10631559115332fea1b18829-93316406',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'selectedStatus' => 0,
    'facility' => 0,
    'status' => 0,
    'ENGINE_URL' => 0,
    'facilities' => 0,
    'f' => 0,
    'k' => 0,
    's' => 0,
    'countAdmits' => 0,
    'pendingAdmits' => 0,
    'pa' => 0,
    'admitFrom' => 0,
    'hospital' => 0,
    'onsiteVisit' => 0,
    'SITE_URL' => 0,
    'onsite' => 0,
    'o' => 0,
    'PUBLIC_URL' => 0,
    'user' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5332fea1cba8a5_78772829',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5332fea1cba8a5_78772829')) {function content_5332fea1cba8a5_78772829($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/var/www/admit_app/cms2/protected/lib/contrib/Smarty-3.1.13/libs/plugins/function.cycle.php';
if (!is_callable('smarty_modifier_date_format')) include '/var/www/admit_app/cms2/protected/lib/contrib/Smarty-3.1.13/libs/plugins/modifier.date_format.php';
?><?php echo smarty_set_title(array('title'=>"Pending Admissions"),$_smarty_tpl);?>


<?php $_smarty_tpl->smarty->_tag_stack[] = array('jQueryReady', array()); $_block_repeat=true; echo smarty_jQueryReady(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

$("#facility").change(function(e) {
	window.location.href = SITE_URL + '/?page=coord&action=pending_admissions&facility=' + $("option:selected", this).val() + '&status=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['selectedStatus']->value, ENT_QUOTES, 'UTF-8');?>
';
});

$(".pending-facility").change(function(e) {
	$.getJSON(SITE_URL , { page: 'coord', action: 'setScheduleFacility', schedule: $(this).attr("rel"), facility: $("option:selected", this).val() }, function(json) {
		if (json.status == true) {
			jAlert("The patient has been successfully moved", "Success!", function(r) {
				window.parent.location.href = SITE_URL + '/?page=coord&action=pending_admissions&facility=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['facility']->value->pubid, ENT_QUOTES, 'UTF-8');?>
';
			});
		} else {
			var msg = '';
			$.each(json.errors, function(i, v) {
				msg = msg + v + '\n';
			});
			jAlert(msg, "Error");
		}
	}, "json");
		//
});

$("#status").change(function(e) {
	window.location.href = SITE_URL + '/?page=coord&action=pending_admissions&facility=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['facility']->value->pubid, ENT_QUOTES, 'UTF-8');?>
&status=' + $("option:selected", this).val();
});

$("#view-time").change(function(e) {
	window.location.href = SITE_URL + '/?page=coord&action=pending_admissions&facility=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['facility']->value->pubid, ENT_QUOTES, 'UTF-8');?>
&status=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['status']->value, ENT_QUOTES, 'UTF-8');?>
&timeframe=' + $("option:selected", this).val();
});

$(".schedule-datetime").datetimepicker({
	showOn: "button",
	buttonImage: "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ENGINE_URL']->value, ENT_QUOTES, 'UTF-8');?>
/images/icons/calendar.png",
	buttonImageOnly: true,
	ampm: true,
	hour: 12,
	minute: 45,
	onClose: function(dateText, inst) {
		location.href = SITE_URL + '/?page=coord&action=setScheduleDatetimeAdmit&id=' + inst.input.attr("rel") + '&datetime=' + dateText + '&path=<?php echo htmlspecialchars(urlencode(currentURL()), ENT_QUOTES, 'UTF-8');?>
';
	}
	
});



<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_jQueryReady(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>



<?php $_smarty_tpl->tpl_vars['status'] = new Smarty_variable(array('Under Consideration'=>"Under Consideration",'Approved'=>"Approved",'Cancelled'=>"Cancelled"), null, 0);?>
<?php if (($_smarty_tpl->tpl_vars['selectedStatus']->value=='Under Consideration'||$_smarty_tpl->tpl_vars['selectedStatus']->value=='')){?>
	<h1 class="text-center">Pending Admissions <?php if ($_smarty_tpl->tpl_vars['facility']->value!=''){?><br /><span class="text-16">for <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['facility']->value->name, ENT_QUOTES, 'UTF-8');?>
</span><?php }?></h1>
<?php }elseif($_smarty_tpl->tpl_vars['selectedStatus']->value=='Approved'){?>
	<h1 class="text-center">Approved Admissions <?php if ($_smarty_tpl->tpl_vars['facility']->value!=''){?><br /><span class="text-16">for <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['facility']->value->name, ENT_QUOTES, 'UTF-8');?>
</span><?php }?></h1>
<?php }elseif($_smarty_tpl->tpl_vars['selectedStatus']->value=='Cancelled'){?>
	<h1 class="text-center">Cancelled Inquiries <?php if ($_smarty_tpl->tpl_vars['facility']->value!=''){?><br /><span class="text-16">for <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['facility']->value->name, ENT_QUOTES, 'UTF-8');?>
</span><?php }?></h1>
<?php }?>



<select id="facility">
	<option value="">Please Select a facility&nbsp;&nbsp;</option>
	<?php  $_smarty_tpl->tpl_vars['f'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['f']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['facilities']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['f']->key => $_smarty_tpl->tpl_vars['f']->value){
$_smarty_tpl->tpl_vars['f']->_loop = true;
?>
		<option value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['f']->value->pubid, ENT_QUOTES, 'UTF-8');?>
"<?php if ($_smarty_tpl->tpl_vars['f']->value->id==$_smarty_tpl->tpl_vars['facility']->value->id){?> selected<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['f']->value->name, ENT_QUOTES, 'UTF-8');?>
</option>
	<?php } ?>
</select>
<?php if ($_smarty_tpl->tpl_vars['facility']->value!=''){?>
	<div class="sort-right">
		<select id="status">
			<option value="">Filter by Patient Status:</option>
			<?php  $_smarty_tpl->tpl_vars['s'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['s']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['status']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['s']->key => $_smarty_tpl->tpl_vars['s']->value){
$_smarty_tpl->tpl_vars['s']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['s']->key;
?>
				<option value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['k']->value, ENT_QUOTES, 'UTF-8');?>
"<?php if ($_smarty_tpl->tpl_vars['selectedStatus']->value==$_smarty_tpl->tpl_vars['k']->value){?> selected<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['s']->value, ENT_QUOTES, 'UTF-8');?>
</option>
			<?php } ?>
		</select>
	</div>
<?php }?>
<br />
<br />
<?php if ($_smarty_tpl->tpl_vars['selectedStatus']->value=='Under Consideration'){?>
	<p class="text-14 text-center">There are <strong><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['countAdmits']->value, ENT_QUOTES, 'UTF-8');?>
</strong> currently <strong>pending admissions</strong></p>
<?php }elseif($_smarty_tpl->tpl_vars['selectedStatus']->value=='Approved'){?>
	<p class="text-14 text-center">There were <strong><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['countAdmits']->value, ENT_QUOTES, 'UTF-8');?>
</strong> admissions within the last 30 days</p>
<?php }elseif($_smarty_tpl->tpl_vars['selectedStatus']->value=='Cancelled'){?>
	<p class="text-14 text-center">There were <strong><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['countAdmits']->value, ENT_QUOTES, 'UTF-8');?>
</strong> cancelled inquiries within the last 30 days</p>
<?php }?>

<div id="pending-admissions">
	<?php if ($_smarty_tpl->tpl_vars['facility']->value==''){?>
		<p class="text-center text-14">Select a facility from the drop-down above to view the pending admissions for that location.</p>
	<?php }else{ ?>
		<table id="under-consideration-table" cellpadding="0" cellspacing="0">
			<tr>
				<th style="text-align: center;">Name</th>
				<th style="text-align: center;">Date to Admit</th>
				<th style="text-align: center;">Facility</th>
				<th style="text-align: center;">Admit From</th>
				<th style="text-align: center;">On-Site Assessment</th>
				<th style="text-align: center;">Assessment By</th>
				<th></th>
				<th></th>
			</tr>
		
			<?php  $_smarty_tpl->tpl_vars['pa'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['pa']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pendingAdmits']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['pa']->key => $_smarty_tpl->tpl_vars['pa']->value){
$_smarty_tpl->tpl_vars['pa']->_loop = true;
?>
				<?php $_smarty_tpl->tpl_vars['admitFrom'] = new Smarty_variable(CMS_Hospital::generate(), null, 0);?>
				<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['admitFrom']->value->load($_smarty_tpl->tpl_vars['pa']->value->admit_from), ENT_QUOTES, 'UTF-8');?>

				<?php $_smarty_tpl->tpl_vars['hospital'] = new Smarty_variable(CMS_Hospital::generate(), null, 0);?>
				<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['hospital']->value->load($_smarty_tpl->tpl_vars['pa']->value->hospital_id), ENT_QUOTES, 'UTF-8');?>

				<?php $_smarty_tpl->tpl_vars['onsiteVisit'] = new Smarty_variable(CMS_Onsite_Visit::generate(), null, 0);?>
				<?php $_smarty_tpl->tpl_vars['onsite'] = new Smarty_variable($_smarty_tpl->tpl_vars['onsiteVisit']->value->fetchVisitInfo($_smarty_tpl->tpl_vars['pa']->value->id), null, 0);?>
				<?php $_smarty_tpl->tpl_vars['msg'] = new Smarty_variable(array(), null, 0);?>
				<tr bgcolor="<?php if (!$_smarty_tpl->tpl_vars['pa']->value->referral){?><?php echo smarty_function_cycle(array('values'=>"#d1d1d1,#f1f1f1"),$_smarty_tpl);?>
<?php }else{ ?><?php echo smarty_function_cycle(array('values'=>"#d0e2f0,#ffffff"),$_smarty_tpl);?>
<?php }?>">
					<td id="patient-name-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pa']->value->pubid, ENT_QUOTES, 'UTF-8');?>
"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SITE_URL']->value, ENT_QUOTES, 'UTF-8');?>
/?page=patient&amp;action=inquiry&amp;schedule=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pa']->value->pubid, ENT_QUOTES, 'UTF-8');?>
&amp;mode=edit"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pa']->value->getPatient()->fullName(), ENT_QUOTES, 'UTF-8');?>
</a></td>
					<td><?php echo htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['pa']->value->datetime_admit,"%m/%d/%Y %I:%M %P"), ENT_QUOTES, 'UTF-8');?>
 <?php if ($_smarty_tpl->tpl_vars['selectedStatus']->value=='Under Consideration'){?><input type="hidden" class="schedule-datetime" rel="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pa']->value->pubid, ENT_QUOTES, 'UTF-8');?>
" value="<?php echo htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['pa']->value->datetime_admit,"%m/%d/%Y %I:%M %P"), ENT_QUOTES, 'UTF-8');?>
" /><?php }?></td>
					<td>
					<select class="pending-facility" rel="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pa']->value->pubid, ENT_QUOTES, 'UTF-8');?>
">
					<?php  $_smarty_tpl->tpl_vars['f'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['f']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['facilities']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['f']->key => $_smarty_tpl->tpl_vars['f']->value){
$_smarty_tpl->tpl_vars['f']->_loop = true;
?>
						<option value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['f']->value->pubid, ENT_QUOTES, 'UTF-8');?>
"<?php if ($_smarty_tpl->tpl_vars['f']->value->id==$_smarty_tpl->tpl_vars['pa']->value->facility){?> selected<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['f']->value->getTitle(), ENT_QUOTES, 'UTF-8');?>
</option>
					<?php } ?>
					
					</td>
					<td><?php if ($_smarty_tpl->tpl_vars['pa']->value->hospital_id!=''){?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['hospital']->value->name, ENT_QUOTES, 'UTF-8');?>
<?php }else{ ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['admitFrom']->value->name, ENT_QUOTES, 'UTF-8');?>
<?php }?></td>
					<td style="text-align: center;">
						<?php  $_smarty_tpl->tpl_vars['o'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['o']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['onsite']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['o']->key => $_smarty_tpl->tpl_vars['o']->value){
$_smarty_tpl->tpl_vars['o']->_loop = true;
?>
							<?php if ($_smarty_tpl->tpl_vars['o']->value->id!=''){?><img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['PUBLIC_URL']->value, ENT_QUOTES, 'UTF-8');?>
/images/icons/check.png" style="height: 18px;" /><?php }?>
						<?php } ?>
					</td>
					<td>
						<?php  $_smarty_tpl->tpl_vars['o'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['o']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['onsite']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['o']->key => $_smarty_tpl->tpl_vars['o']->value){
$_smarty_tpl->tpl_vars['o']->_loop = true;
?>
							<?php $_smarty_tpl->tpl_vars['user'] = new Smarty_variable(CMS_Site_User::generate(), null, 0);?>
							<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value->load($_smarty_tpl->tpl_vars['o']->value->site_user_visited), ENT_QUOTES, 'UTF-8');?>

							<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value->fullName(), ENT_QUOTES, 'UTF-8');?>

						<?php } ?>
					</td>
					<td><?php echo scheduleMenu(array('schedule'=>$_smarty_tpl->tpl_vars['pa']->value),$_smarty_tpl);?>
</td>
				</tr>
			<?php } ?>
		
		</table>
	<?php }?>
</div><?php }} ?>