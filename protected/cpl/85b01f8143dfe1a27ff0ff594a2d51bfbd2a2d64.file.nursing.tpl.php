<?php /* Smarty version Smarty-3.1.13, created on 2014-04-03 11:24:34
         compiled from "/var/www/admit_app/admissions/protected/tpl/patient/nursing.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2039037489533d995294d038-33864343%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '85b01f8143dfe1a27ff0ff594a2d51bfbd2a2d64' => 
    array (
      0 => '/var/www/admit_app/admissions/protected/tpl/patient/nursing.tpl',
      1 => 1395702646,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2039037489533d995294d038-33864343',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'auth' => 0,
    'mode' => 0,
    'SITE_URL' => 0,
    'patient' => 0,
    'nursing' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_533d9952d730d7_54764947',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_533d9952d730d7_54764947')) {function content_533d9952d730d7_54764947($_smarty_tpl) {?><?php echo smarty_set_title(array('title'=>"Nursing Report"),$_smarty_tpl);?>

<?php $_smarty_tpl->smarty->_tag_stack[] = array('jQueryReady', array()); $_block_repeat=true; echo smarty_jQueryReady(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

<?php if ($_smarty_tpl->tpl_vars['auth']->value->getRecord()->canEditNursing()==false||$_smarty_tpl->tpl_vars['mode']->value!="edit"){?>

$("#nursing-form input, #nursing-form select, #nursing-form textarea").attr("disabled", true).css("background", "none").css("border", "none");

<?php }?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_jQueryReady(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>


<style type="text/css">
.form-header-row td {
	padding-top: 20px;
}
</style>
<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SITE_URL']->value, ENT_QUOTES, 'UTF-8');?>
/?page=patient&action=printNursing&patient=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['patient']->value->pubid, ENT_QUOTES, 'UTF-8');?>
&mode=edit" target="_blank" class="right"><img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SITE_URL']->value, ENT_QUOTES, 'UTF-8');?>
/images/print.png" /></a>
<br />
<br />
<h1 class="text-center">Pre-Admission Nursing Report<br /><span class="text-18">for <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['patient']->value->fullName(), ENT_QUOTES, 'UTF-8');?>
</span></h1> 

<br />
<br />
<form name="admissions" method="post" action="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SITE_URL']->value, ENT_QUOTES, 'UTF-8');?>
" id="nursing-form"> 
	<input type="hidden" name="page" value="patient" />
	<input type="hidden" name="action" value="submitNursing" />
	<input type="hidden" name="patient_admit" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['patient']->value->pubid, ENT_QUOTES, 'UTF-8');?>
" />
	<?php if ($_smarty_tpl->tpl_vars['nursing']->value!=''){?>
		<?php $_smarty_tpl->tpl_vars['data'] = new Smarty_variable(get_object_vars($_smarty_tpl->tpl_vars['nursing']->value->getRecord()), null, 0);?>
	<?php }?>
	<table width="100%" cellpadding="0" border="0"> 
	<tbody>
	<tr class="form-header-row">
		<td><strong><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['patient']->value->fullName(), ENT_QUOTES, 'UTF-8');?>
</strong></td>
		<td><strong>Room #</strong><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['patient']->value->room_number, ENT_QUOTES, 'UTF-8');?>
</td>
		<td><strong>Referring Nurse:</strong> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['patient']->value->referral_nurse_name, ENT_QUOTES, 'UTF-8');?>
</td>
		<td><strong>Nurse Phone:</strong> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['patient']->value->nursing_report_phone, ENT_QUOTES, 'UTF-8');?>
</td>
	</tr>
	<tr class="form-header-row">
		<td><strong>Height</strong></td>
		<td><strong>Weight</strong></td>
		<td colspan="2" rowspan="2"></td>
	</tr>
	<tr>
		<td><input type="text" size="10" name="height" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['height'], ENT_QUOTES, 'UTF-8');?>
" /></td>
		<td><input type="text" size="10" name="weight" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['weight'], ENT_QUOTES, 'UTF-8');?>
" /></td>
	</tr>
	<tr class="form-header-row">
		<td><strong>Transportation</strong></td>
		<td><strong>Provider</strong></td>
		<td><strong>Pick-Up Time</strong></td>
	</tr>
	<tr>
		<td>
			<td><?php if ($_smarty_tpl->tpl_vars['patient']->value->trans=='wheelchair'){?> Wheelchair<?php }?> <?php if ($_smarty_tpl->tpl_vars['patient']->value->trans=='stretcher'){?> Stretcher<?php }?><?php if ($_smarty_tpl->tpl_vars['patient']->value->o2==1){?>&nbsp;&nbsp;<strong>Oxygen:</strong> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['patient']->value->o2_liters, ENT_QUOTES, 'UTF-8');?>
 liters<?php }?></td>
			<td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['patient']->value->trans_provider, ENT_QUOTES, 'UTF-8');?>
</td>
			<td><?php if ($_smarty_tpl->tpl_vars['patient']->value->datetime_pickup!=''){?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['patient']->value->datetime_pickup, ENT_QUOTES, 'UTF-8');?>
<?php }?></td>
		</td>
	</tr>
	<tr class="form-header-row">
		<td colspan="4"><strong>Diagnosis</strong></td>
	</tr>
	<tr>
		<td valign="top" colspan="4">
			<textarea name="diagnosis" rows="8" style="width: 100%;"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['diagnosis'], ENT_QUOTES, 'UTF-8');?>
</textarea>
		</td>
	</tr>
	<tr class="form-header-row">
		<td colspan="4"><strong>Orientation</strong></td>
	</tr>
	<tr>
		<td valign="top">
			<input type="checkbox" name="orientation_alert" value="1"<?php if ($_smarty_tpl->tpl_vars['data']->value['orientation_alert']==1){?> checked<?php }?> /> Alert (Person, place, time)
			<br />
			<input type="checkbox" name="orientation_confused" value="1"<?php if ($_smarty_tpl->tpl_vars['data']->value['orientation_confused']==1){?> checked<?php }?> /> Confused
			<br />
			<input type="checkbox" name="orientation_disoriented" value="1"<?php if ($_smarty_tpl->tpl_vars['data']->value['orientation_disoriented']==1){?> checked<?php }?> /> Disoriented
			<br />
			<input type="checkbox" name="orientation_forgetful" value="1"<?php if ($_smarty_tpl->tpl_vars['data']->value['orientation_forgetful']==1){?> checked<?php }?> /> Forgetful
			<br />
		</td>
		<td valign="top">
			<input type="checkbox" name="orientation_fall_hx" value="1"<?php if ($_smarty_tpl->tpl_vars['data']->value['orientation_fall_hx']==1){?> checked<?php }?> /> Fall Hx: <input type="text" name="orientation_fall_hx_detail" size="15" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['orientation_fall_hx_detail'], ENT_QUOTES, 'UTF-8');?>
" />
		</td>
		<td colspan="2"></td>
		</tr>
	<tr class="form-header-row">
		<td><strong>Diet</strong></td>
		<td></td>
		<td><strong>Bowel</strong></td>
		<td><strong>Bladder</strong></td>	
	</tr>
	
	<tr>
		<td valign="top">
			Type: <input type="text" name="diet_type" size="15" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['diet_type'], ENT_QUOTES, 'UTF-8');?>
" />
			<br />
			<input type="checkbox" name="diet_swallowing_difficulty" value="1"<?php if ($_smarty_tpl->tpl_vars['data']->value['diet_swallowing_difficulty']==1){?> checked<?php }?> /> Swallowing Difficulty
			<br />
			<input type="checkbox" name="diet_feeding_tube" value="1"<?php if ($_smarty_tpl->tpl_vars['data']->value['diet_feeding_tube']==1){?> checked<?php }?> /> Feeding tube
		</td>
		
		<td valign="top">
			<strong>Appetite:</strong> <input type="text" name="diet_appetite" size="15" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['diet_appetite'], ENT_QUOTES, 'UTF-8');?>
" />
			<br />
			<input type="checkbox" name="diet_feeds_self" value="1"<?php if ($_smarty_tpl->tpl_vars['data']->value['diet_feeds_self']==1){?> checked<?php }?> /> Feeds self
			<br />
			<input type="checkbox" name="diet_must_be_fed" value="1"<?php if ($_smarty_tpl->tpl_vars['data']->value['diet_must_be_fed']==1){?> checked<?php }?> /> Must be fed
			
		</td>
		
		<td valign="top">
			<input type="checkbox" name="bowel_continent" value="1"<?php if ($_smarty_tpl->tpl_vars['data']->value['bowel_continent']==1){?> checked<?php }?> /> Continent
			<br />
			<input type="checkbox" name="bowel_incontinent" value="1"<?php if ($_smarty_tpl->tpl_vars['data']->value['bowel_incontinent']==1){?> checked<?php }?> /> Incontinent
			<br />
			<input type="checkbox" name="bowel_colostomy" value="1"<?php if ($_smarty_tpl->tpl_vars['data']->value['bowel_colostomy']==1){?> checked<?php }?> /> Colostomy
			<br />
			Last BM <input type="text" class="date-picker" name="bowel_last_bm" size="11" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['bowel_last_bm'], ENT_QUOTES, 'UTF-8');?>
" />
		</td>
		
		<td valign="top">
			<input type="checkbox" name="bladder_continent" value="1"<?php if ($_smarty_tpl->tpl_vars['data']->value['bladder_continent']==1){?> checked<?php }?> /> Continent
			<br />
			<input type="checkbox" name="bladder_incontinent" value="1"<?php if ($_smarty_tpl->tpl_vars['data']->value['bladder_incontinent']==1){?> checked<?php }?> /> Incontinent
			<br />
			<input type="checkbox" name="bladder_catheter" value="1"<?php if ($_smarty_tpl->tpl_vars['data']->value['bladder_catheter']==1){?> checked<?php }?> /> Catheter
		</td>
	</tr>	
	
	<tr class="form-header-row">
		<td><strong>ADL: Bathing</strong></td>
		<td><strong>ADL: Dressing</strong></td>
		<td><strong>ADL: Vision</strong></td>
		<td><strong>ADL: Hearing</strong></td>	
	</tr>
	
	<tr>
		<td valign="top">
			<input type="checkbox" name="bathing_total" value="1"<?php if ($_smarty_tpl->tpl_vars['data']->value['bathing_total']==1){?> checked<?php }?> /> Total
			<br />
			<input type="checkbox" name="bathing_moderate_assist" value="1"<?php if ($_smarty_tpl->tpl_vars['data']->value['bathing_moderate_assist']==1){?> checked<?php }?> /> Moderate Assist
			<br />
			<input type="checkbox" name="bathing_minimal_assist" value="1"<?php if ($_smarty_tpl->tpl_vars['data']->value['bathing_minimal_assist']==1){?> checked<?php }?> /> Minimal Assist
		</td>
		<td valign="top">
			<input type="checkbox" name="dressing_total" value="1"<?php if ($_smarty_tpl->tpl_vars['data']->value['dressing_total']==1){?> checked<?php }?> /> Total
			<br />
			<input type="checkbox" name="dressing_moderate_assist" value="1"<?php if ($_smarty_tpl->tpl_vars['data']->value['dressing_moderate_assist']==1){?> checked<?php }?> /> Moderate Assist
			<br />
			<input type="checkbox" name="dressing_minimal_assist" value="1"<?php if ($_smarty_tpl->tpl_vars['data']->value['dressing_minimal_assist']==1){?> checked<?php }?> /> Minimal Assist
		</td>
		<td valign="top">
			<input type="checkbox" name="vision_wnl" value="1"<?php if ($_smarty_tpl->tpl_vars['data']->value['vision_wnl']==1){?> checked<?php }?> /> WNL
			<br />
			<input type="checkbox" name="vision_blind" value="1"<?php if ($_smarty_tpl->tpl_vars['data']->value['vision_blind']==1){?> checked<?php }?> /> Blind
			<br />
			<input type="checkbox" name="vision_glasses" value="1"<?php if ($_smarty_tpl->tpl_vars['data']->value['vision_glasses']==1){?> checked<?php }?> /> Glasses
		</td>
		<td valign="top">
			<input type="checkbox" name="hearing_wnl" value="1"<?php if ($_smarty_tpl->tpl_vars['data']->value['hearing_wnl']==1){?> checked<?php }?> /> WNL
			<br />
			<input type="checkbox" name="hearing_deaf" value="1"<?php if ($_smarty_tpl->tpl_vars['data']->value['hearing_deaf']==1){?> checked<?php }?> /> Deaf
			<br />
			<input type="checkbox" name="hearing_hearingaids" value="1"<?php if ($_smarty_tpl->tpl_vars['data']->value['hearing_hearingaids']==1){?> checked<?php }?> /> Hearing Aids
		</td>
		
	</tr>
	
	<tr class="form-header-row">
		<td><strong>Skilled Nursing Services Needed</strong></td>
		<td><strong>S/S Infection</strong></td>
		<td><strong>Equipment</strong></td>
		<td><strong>Wheelchair</strong></td>	
	</tr>
	<tr>
		<td valign="top">
			<input type="checkbox" name="services_pt" value="1"<?php if ($_smarty_tpl->tpl_vars['data']->value['services_pt']==1){?> checked<?php }?> /> Physical Therapy
			<br />
			<input type="checkbox" name="services_ot" value="1"<?php if ($_smarty_tpl->tpl_vars['data']->value['services_ot']==1){?> checked<?php }?> /> Occupational Therapy
			<br />
			<input type="checkbox" name="services_st" value="1"<?php if ($_smarty_tpl->tpl_vars['data']->value['services_st']==1){?> checked<?php }?> /> Speech Therapy
			<br />
			<input type="checkbox" name="services_nivt" value="1"<?php if ($_smarty_tpl->tpl_vars['data']->value['services_nivt']==1){?> checked<?php }?> /> Nursing / IV Therapy
		</td>
		
		<td valign="top">
			<input type="radio" name="ssinfection_yesno" value="1"<?php if ($_smarty_tpl->tpl_vars['data']->value['ssinfection_yesno']==1){?> checked<?php }?> /> Yes
			<input type="radio" name="ssinfection_yesno" value="0"<?php if ($_smarty_tpl->tpl_vars['data']->value['ssinfection_yesno']==0){?> checked<?php }?> /> No
			<br />
			<input type="checkbox" name="ssinfection_cough" value="1"<?php if ($_smarty_tpl->tpl_vars['data']->value['ssinfection_cough']==1){?> checked<?php }?> /> Cough
			<br />
			<input type="checkbox" name="ssinfection_temp" value="1"<?php if ($_smarty_tpl->tpl_vars['data']->value['ssinfection_temp']==1){?> checked<?php }?> /> Temp
			<input type="text" size="4" name="ssinfection_temp_detail" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['ssinfection_temp_detail'], ENT_QUOTES, 'UTF-8');?>
" />
			<br />
			<input type="checkbox" name="ssinfection_mrsa" value="1"<?php if ($_smarty_tpl->tpl_vars['data']->value['ssinfection_mrsa']==1){?> checked<?php }?> /> MRSA
			<br />
			<input type="checkbox" name="ssinfection_vre" value="1"<?php if ($_smarty_tpl->tpl_vars['data']->value['ssinfection_vre']==1){?> checked<?php }?> /> VRE
			<br />
			<input type="checkbox" name="ssinfection_cdiff" value="1"<?php if ($_smarty_tpl->tpl_vars['data']->value['ssinfection_cdiff']==1){?> checked<?php }?> /> C-Diff
			<br />
		</td>
		<td valign="top">
			<input type="checkbox" name="equipment_cane" value="1"<?php if ($_smarty_tpl->tpl_vars['data']->value['equipment_cane']==1){?> checked<?php }?> /> Cane
			<br />
			<input type="checkbox" name="equipment_walker" value="1"<?php if ($_smarty_tpl->tpl_vars['data']->value['equipment_walker']==1){?> checked<?php }?> /> Walker
			<br />
			<input type="checkbox" name="equipment_other" value="1"<?php if ($_smarty_tpl->tpl_vars['data']->value['equipment_other']==1){?> checked<?php }?> /> Other
			<input type="text" name="equipment_other_detail" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['eqiupment_other_detail'], ENT_QUOTES, 'UTF-8');?>
" size="10" />
		
		</td>
		<td valign="top">
			<input type="checkbox" name="wheelchair_standard" value="1"<?php if ($_smarty_tpl->tpl_vars['data']->value['wheelchair_standard']==1){?> checked<?php }?> /> Standard
			<br />
			<input type="checkbox" name="wheelchair_bariatric" value="1"<?php if ($_smarty_tpl->tpl_vars['data']->value['wheelchair_bariatric']==1){?> checked<?php }?> /> Bariatric
			<br />
			<input type="checkbox" name="wheelchair_reclining" value="1"<?php if ($_smarty_tpl->tpl_vars['data']->value['wheelchair_reclining']==1){?> checked<?php }?> /> Reclining
		
		</td>
		
	</tr>
	
	<tr class="form-header-row">
		<td><strong>Vital Signs</strong></td>
		<td><strong>Transfers</strong></td>
		<td><strong>Weight Bearing Status</strong></td>
		<td></td>	
	</tr>
	<tr>
		<td valign="top">
			Temp <input type="text" name="vital_temp" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['vital_temp'], ENT_QUOTES, 'UTF-8');?>
" size="8" />
			<br />
			HR <input type="text" name="vital_hr" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['vital_hr'], ENT_QUOTES, 'UTF-8');?>
" size="8" />
			<br />
			B/P <input type="text" name="vital_bp" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['vital_bp'], ENT_QUOTES, 'UTF-8');?>
" size="8" />
			<br />
			Lungs <input type="text" name="vital_lungs" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['vital_lungs'], ENT_QUOTES, 'UTF-8');?>
" size="8" />
			<br />
			O<sub>2</sub> Sat <input type="text" name="vital_o2sat" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['vital_o2sat'], ENT_QUOTES, 'UTF-8');?>
" size="8" />
		
		</td>
		
		<td valign="top">
			<input type="checkbox" name="transfers_independent" value="1"<?php if ($_smarty_tpl->tpl_vars['data']->value['transfers_independent']==1){?> checked<?php }?> /> Independent
			<br />
			<input type="checkbox" name="transfers_assisted1" value="1"<?php if ($_smarty_tpl->tpl_vars['data']->value['transfers_assisted1']==1){?> checked<?php }?> /> Assisted x1
			<br />
			<input type="checkbox" name="transfers_assisted2" value="1"<?php if ($_smarty_tpl->tpl_vars['data']->value['transfers_assisted2']==1){?> checked<?php }?> /> Assisted x2
			<br />
			<input type="checkbox" name="transfers_slideboard" value="1"<?php if ($_smarty_tpl->tpl_vars['data']->value['transfers_slideboard']==1){?> checked<?php }?> /> Slide Board
			<br />
			<input type="checkbox" name="transfers_hoyer" value="1"<?php if ($_smarty_tpl->tpl_vars['data']->value['transfers_hoyer']==1){?> checked<?php }?> /> Hoyer
		
		</td>
		
		<td valign="top">
			<input type="checkbox" name="weightbearing_wbat" value="1"<?php if ($_smarty_tpl->tpl_vars['data']->value['weightbearing_wbat']==1){?> checked<?php }?> /> WBAT
			<br />
			<input type="checkbox" name="weightbearing_30lbwb" value="1"<?php if ($_smarty_tpl->tpl_vars['data']->value['weightbearing_30lbwb']==1){?> checked<?php }?> /> 30lb WB
			<br />
			<input type="checkbox" name="weightbearing_ttwb" value="1"<?php if ($_smarty_tpl->tpl_vars['data']->value['weightbearing_ttwb']==1){?> checked<?php }?> /> TTWB
			<br />
			<input type="checkbox" name="weightbearing_nwb" value="1"<?php if ($_smarty_tpl->tpl_vars['data']->value['weightbearing_nwb']==1){?> checked<?php }?> /> NWB
			<br />
			<input type="checkbox" name="weightbearing_cpm" value="1"<?php if ($_smarty_tpl->tpl_vars['data']->value['weightbearing_cpm']==1){?> checked<?php }?> /> CPM
		
		</td>
		
		<td valign="top">
			<input type="checkbox" name="weightbearing_teds" value="1"<?php if ($_smarty_tpl->tpl_vars['data']->value['weightbearing_teds']==1){?> checked<?php }?> /> TEDS
			<br />
			<input type="checkbox" name="weightbearing_pwb" value="1"<?php if ($_smarty_tpl->tpl_vars['data']->value['weightbearing_pwb']==1){?> checked<?php }?> /> PWB
			<input type="text" name="weightbearing_pwb_detail" size="10" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['weightbearing_pwb_detail'], ENT_QUOTES, 'UTF-8');?>
" />
			<br />
			<input type="checkbox" name="weightbearing_other" value="1"<?php if ($_smarty_tpl->tpl_vars['data']->value['weightbearing_other']==1){?> checked<?php }?> /> Other
			<input type="text" name="weightbearing_other_detail" size="10" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['weightbearing_other_detail'], ENT_QUOTES, 'UTF-8');?>
" />
		
		</td>
	</tr>
	
	<tr class="form-header-row">
		<td colspan="4"><strong>Pressure Ulcers / Wounds</strong></td>
	</tr>
	<tr>
		<td colspan="2" valign="top">
			<table>
				<tr>
					<td rowspan="3" valign="top">Location</td>
					<td rowspan="3"><textarea name="ulcers_wounds_location" cols="45" rows="8"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['ulcers_wounds_location'], ENT_QUOTES, 'UTF-8');?>
</textarea></td>
				</tr>
			</table>
		</td>
		<td colspan="2" valign="top">
			<table>
				<tr>
					<td>Stage</td>
					<td><input type="text" size="30" name="ulcers_wounds_stage" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['ulcers_wounds_stage'], ENT_QUOTES, 'UTF-8');?>
" /></td>
				</tr>
				<tr>
					<td>Size</td>
					<td><input type="text" size="30" name="ulcers_wounds_size" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['ulcers_wounds_size'], ENT_QUOTES, 'UTF-8');?>
" /></td>
				</tr>
				<tr>
					<td>Treatment</td>
					<td><input type="text" size="30" name="ulcers_wounds_treatment" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['ulcers_wounds_treatment'], ENT_QUOTES, 'UTF-8');?>
" /></td>
				</tr>
			</table>
		</td>
	</tr>

	<tr class="form-header-row">
		<td colspan="4"><strong>Additional Info / Notes</strong></td>
	</tr>
	<tr>
		<td colspan="2" valign="top">
			<table>
				<tr>
					<td valign="top">Accuchecks</td>
					<td><input type="text" size="30" name="accuchecks" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['accuchecks'], ENT_QUOTES, 'UTF-8');?>
" /></td>
				</tr>
				<tr>
					<td valign="top">INR</td>
					<td><input type="text" size="30" name="inr" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['inr'], ENT_QUOTES, 'UTF-8');?>
" /></td>
				</tr>
				<tr>
					<td valign="top">Allergy</td>
					<td><input type="text" size="30" name="allergy" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['allergy'], ENT_QUOTES, 'UTF-8');?>
" /></td>
				</tr>
				<tr class="form-header-row">
					<td><strong>Oxygen</strong></td>
				</tr>
				<tr>
					<td colspan="2">
						Liters/Min <input type="text" size="8" name="o2_litersmin" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['o2_litersmin'], ENT_QUOTES, 'UTF-8');?>
" />
						&nbsp;&nbsp;
						Mask <input type="text" name="o2_mask" size="8" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['o2_mask'], ENT_QUOTES, 'UTF-8');?>
" />
						&nbsp;&nbsp;
						NC <input type="text" name="o2_nc" size="8" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['o2_nc'], ENT_QUOTES, 'UTF-8');?>
" />
					</td>
				</tr>
			</table>
		</td>
		<td colspan="2" valign="top">
			<table>
				<tr>
					<td>IV</td>
					<td><input type="text" size="30" name="iv" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['iv'], ENT_QUOTES, 'UTF-8');?>
" /></td>
				</tr>
				<tr>
					<td>Pharmacokinetics</td>
					<td><input type="text" size="30" name="pharmacokinetics" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['pharmacokinetics'], ENT_QUOTES, 'UTF-8');?>
" /></td>
				</tr>
				<tr>
					<td colspan="2">
						Heplock
						<input type="text" size="10" name="heplock" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['heplock'], ENT_QUOTES, 'UTF-8');?>
" />
						Peripheral
						<input type="text" size="10" name="peripheral" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['peripheral'], ENT_QUOTES, 'UTF-8');?>
" />
						Groshong
						<input type="text" size="10" name="groshong" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['groshong'], ENT_QUOTES, 'UTF-8');?>
" />
					</td>
				</tr>
				<tr>
					<td colspan="2">
						Porta Cath
						<input type="text" size="10" name="portacath" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['portacath'], ENT_QUOTES, 'UTF-8');?>
" />
						PICC Line
						<input type="text" size="10" name="picc_line" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['picc_line'], ENT_QUOTES, 'UTF-8');?>
" />
						Hickman
						<input type="text" size="10" name=hickman value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['hickman'], ENT_QUOTES, 'UTF-8');?>
" />
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr class="form-header-row">
		<td colspan="4"><strong>Additional Notes</strong></td>
	</tr>
	<tr>
		<td colspan="4">
			<textarea name="additional_notes" rows="5" style="width: 100%"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['additional_notes'], ENT_QUOTES, 'UTF-8');?>
</textarea>
		</td>
	</tr>
	<tr>
		<td colspan="4" align="right"><input type="submit" value="Save" /></td>
	</tr>	
		
	</tbody>
	</table>
</form><?php }} ?>