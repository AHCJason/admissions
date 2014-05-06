<?php /* Smarty version Smarty-3.1.13, created on 2014-03-26 10:35:18
         compiled from "/var/www/admit_app/admissions/protected/tpl/report/discharge_type.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1844151212533301c6142b66-26911644%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd02ba497ceee94898693cb4713a09db2a1dcbaff' => 
    array (
      0 => '/var/www/admit_app/admissions/protected/tpl/report/discharge_type.tpl',
      1 => 1395702646,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1844151212533301c6142b66-26911644',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SITE_URL' => 0,
    'facilityPubId' => 0,
    'view' => 0,
    'year' => 0,
    'discharge_to' => 0,
    'facility' => 0,
    'filterByOpts' => 0,
    'k' => 0,
    'filterby' => 0,
    'v' => 0,
    'dischargeData' => 0,
    'key' => 0,
    'report' => 0,
    'data' => 0,
    'd' => 0,
    't' => 0,
    'detail' => 0,
    'countData' => 0,
    'count' => 0,
    'c' => 0,
    'dc_disp' => 0,
    'i' => 0,
    'totalDc' => 0,
    'dateStart' => 0,
    'orderByOpts' => 0,
    'orderby' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_533301c6335dc0_05340634',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_533301c6335dc0_05340634')) {function content_533301c6335dc0_05340634($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/admit_app/cms2/protected/lib/contrib/Smarty-3.1.13/libs/plugins/modifier.date_format.php';
if (!is_callable('smarty_function_cycle')) include '/var/www/admit_app/cms2/protected/lib/contrib/Smarty-3.1.13/libs/plugins/function.cycle.php';
?><?php echo smarty_set_title(array('title'=>"Discharge Report"),$_smarty_tpl);?>

<?php echo $_smarty_tpl->getSubTemplate ("patient/export_icons.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<!-- <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SITE_URL']->value, ENT_QUOTES, 'UTF-8');?>
/?page=report&amp;action=discharge&amp;facility=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['facilityPubId']->value, ENT_QUOTES, 'UTF-8');?>
&amp;view=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['view']->value, ENT_QUOTES, 'UTF-8');?>
&amp;year=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['year']->value, ENT_QUOTES, 'UTF-8');?>
&isMicro=1" class="button">Print</a> -->
<?php if (!$_smarty_tpl->tpl_vars['discharge_to']->value){?>
	<h1 class="text-center">Discharge Type Report<br /><span class="text-16">for <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['facility']->value->name, ENT_QUOTES, 'UTF-8');?>
</span></h1>
	<?php echo $_smarty_tpl->getSubTemplate ("report/index.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	
<!--
	<div class="sort-left">
		<strong>Filter by:</strong>
		<select id="filterby">
			<option value="">Select an option...</option>
			<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['filterByOpts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
				<option value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['k']->value, ENT_QUOTES, 'UTF-8');?>
"<?php if ($_smarty_tpl->tpl_vars['filterby']->value==$_smarty_tpl->tpl_vars['k']->value){?> selected<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['v']->value, ENT_QUOTES, 'UTF-8');?>
</option>
			<?php } ?>
		</select>
	</div>
-->




	<!-- !Main Discharge Report -->
	<?php if (!$_smarty_tpl->tpl_vars['filterby']->value){?>
		<table id="report-table" cellpadding="5" cellspacing="0">
			<?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['dischargeData']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
$_smarty_tpl->tpl_vars['data']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['data']->key;
?>
				<tr  class="report-total">
					<th colspan="2">
						<?php if ($_smarty_tpl->tpl_vars['view']->value=="year"){?>
							<?php echo htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['key']->value,"%Y"), ENT_QUOTES, 'UTF-8');?>

						<?php }elseif($_smarty_tpl->tpl_vars['view']->value=="quarter"){?>
							<?php $_smarty_tpl->tpl_vars['report'] = new Smarty_variable(PageControllerReport::getQuarter($_smarty_tpl->tpl_vars['key']->value), null, 0);?>
							<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['report']->value, ENT_QUOTES, 'UTF-8');?>

						<?php }else{ ?><?php echo htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['key']->value,"%B %Y"), ENT_QUOTES, 'UTF-8');?>
<?php }?></th>
					<th># of Discharges</th>
					<th>% of Discharges</th>
				</tr>
				<?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['d']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
$_smarty_tpl->tpl_vars['d']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['d']->key;
?>
					<tr bgcolor="<?php echo smarty_function_cycle(array('values'=>"#d0e2f0,#ffffff"),$_smarty_tpl);?>
">
						<td colspan="2" align="left" class="bold"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['k']->value, ENT_QUOTES, 'UTF-8');?>
</td>
						<td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['d']->value['dc_to_count'], ENT_QUOTES, 'UTF-8');?>
</td>
						<td><?php echo htmlspecialchars(sprintf("%.1f",(($_smarty_tpl->tpl_vars['d']->value['dc_to_count']/$_smarty_tpl->tpl_vars['d']->value['dc_count'])*100)), ENT_QUOTES, 'UTF-8');?>
%</td>
						<?php  $_smarty_tpl->tpl_vars['detail'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['detail']->_loop = false;
 $_smarty_tpl->tpl_vars['t'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['d']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['detail']->key => $_smarty_tpl->tpl_vars['detail']->value){
$_smarty_tpl->tpl_vars['detail']->_loop = true;
 $_smarty_tpl->tpl_vars['t']->value = $_smarty_tpl->tpl_vars['detail']->key;
?>
							<?php if (is_numeric($_smarty_tpl->tpl_vars['t']->value)){?>
								</tr>
								<tr class="background-grey">
									<td>&nbsp;</td>
									<td align="left"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['detail']->value['dc_disp'], ENT_QUOTES, 'UTF-8');?>
</td>
									<td align="right" style="padding-right: 50px"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['detail']->value['dc_disp_count'], ENT_QUOTES, 'UTF-8');?>
</td>
									<td align="right" style="padding-right: 50px"><?php echo htmlspecialchars(sprintf("%.1f",(($_smarty_tpl->tpl_vars['detail']->value['dc_disp_count']/$_smarty_tpl->tpl_vars['d']->value['dc_count'])*100)), ENT_QUOTES, 'UTF-8');?>
%</td>
								</tr>
								
							<?php }?>
						<?php } ?>
						
					</tr>
						
				<?php } ?>
				<tr class="bold" style="border-top: 1px solid black">
					<td>&nbsp;</td>
					<td align="right">Total</td>
					<td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['d']->value['dc_count'], ENT_QUOTES, 'UTF-8');?>
</td>
					<td></td>
				</tr>	
				<tr>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
				</tr>
			<?php } ?>
		</table>
	
	
		
	<!-- !Filtered Discharge Report -->
	<?php }else{ ?>
		<table id="report-table" cellpadding="5" cellspacing="0">
			<?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['d']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
$_smarty_tpl->tpl_vars['d']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['d']->key;
?>
				<?php if (!empty($_smarty_tpl->tpl_vars['d']->value)){?>
					<tr  class="report-total">
						<th>
							<?php if ($_smarty_tpl->tpl_vars['view']->value=="year"){?>
								<?php echo htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['k']->value,"%Y"), ENT_QUOTES, 'UTF-8');?>

							<?php }elseif($_smarty_tpl->tpl_vars['view']->value=="quarter"){?>
								<?php $_smarty_tpl->tpl_vars['report'] = new Smarty_variable(PageControllerReport::getQuarter($_smarty_tpl->tpl_vars['k']->value), null, 0);?>
								<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['report']->value, ENT_QUOTES, 'UTF-8');?>

							<?php }else{ ?><?php echo htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['k']->value,"%B %Y"), ENT_QUOTES, 'UTF-8');?>
<?php }?></th>
						<th># of Discharges</th>
						<th>% of Discharges</th>
					</tr>
					<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['d']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
$_smarty_tpl->tpl_vars['i']->_loop = true;
?>						
						<?php  $_smarty_tpl->tpl_vars['count'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['count']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['countData']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['count']->key => $_smarty_tpl->tpl_vars['count']->value){
$_smarty_tpl->tpl_vars['count']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['count']->key;
?>
							<?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['c']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['count']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value){
$_smarty_tpl->tpl_vars['c']->_loop = true;
?>
								<?php if (($_smarty_tpl->tpl_vars['key']->value==$_smarty_tpl->tpl_vars['k']->value)){?>
									<?php $_smarty_tpl->tpl_vars['totalDc'] = new Smarty_variable($_smarty_tpl->tpl_vars['c']->value->dc_count, null, 0);?>
								<?php }?>
							<?php } ?>
						<?php } ?>
						
						<tr>
							<td align="left"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SITE_URL']->value, ENT_QUOTES, 'UTF-8');?>
/?page=report&amp;action=discharge&amp;facility=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['facility']->value->pubid, ENT_QUOTES, 'UTF-8');?>
&amp;view=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['view']->value, ENT_QUOTES, 'UTF-8');?>
&amp;year=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['year']->value, ENT_QUOTES, 'UTF-8');?>
&amp;discharge_to=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['d']->value['discharge_to'], ENT_QUOTES, 'UTF-8');?>
&amp;discharge_disposition=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['dc_disp']->value, ENT_QUOTES, 'UTF-8');?>
&amp;dateStart=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['k']->value, ENT_QUOTES, 'UTF-8');?>
&amp;filterby=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['filterby']->value, ENT_QUOTES, 'UTF-8');?>
"><?php if ($_smarty_tpl->tpl_vars['i']->value->discharge_to==''){?><span class="text-red"><?php }?><?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['i']->value->discharge_to)===null||$tmp==='' ? "No Discharge Type" : $tmp), ENT_QUOTES, 'UTF-8');?>
<?php if ($_smarty_tpl->tpl_vars['i']->value->dc_to==''){?></span><?php }?></a></td>
							<td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['i']->value->dc_count, ENT_QUOTES, 'UTF-8');?>
</td>
							<td><?php echo htmlspecialchars(sprintf("%.1f",(($_smarty_tpl->tpl_vars['i']->value->dc_count/$_smarty_tpl->tpl_vars['totalDc']->value)*100)), ENT_QUOTES, 'UTF-8');?>
%</td>
						</tr>
					<?php } ?>
					<tr class="bold" style="border-top: 1px solid black">
						<td align="right">Total</td>
						<td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['totalDc']->value, ENT_QUOTES, 'UTF-8');?>
</td>
						<td></td>
					</tr>				
					<tr>
						<td>&nbsp;</td>
					</tr>
				<?php }?>
			<?php } ?>
		</table>

	<?php }?>
	
	
	
	
<!-- !Discharge To details -->
<?php }else{ ?>
	<?php $_smarty_tpl->smarty->_tag_stack[] = array('jQueryReady', array()); $_block_repeat=true; echo smarty_jQueryReady(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

		$("#orderby").change(function(e) {
			window.location.href = SITE_URL + '/?page=report&action=discharge&facility=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['facility']->value->pubid, ENT_QUOTES, 'UTF-8');?>
&view=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['view']->value, ENT_QUOTES, 'UTF-8');?>
&year=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['year']->value, ENT_QUOTES, 'UTF-8');?>
&discharge_to=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['discharge_to']->value, ENT_QUOTES, 'UTF-8');?>
&dateStart=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['dateStart']->value, ENT_QUOTES, 'UTF-8');?>
&filterby=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['filterby']->value, ENT_QUOTES, 'UTF-8');?>
&orderby=' + $("#orderby option:selected").val();
		});

	<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_jQueryReady(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

	<h1 class="text-center"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['discharge_to']->value, ENT_QUOTES, 'UTF-8');?>
<br /><span class="text-16">for <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['facility']->value->name, ENT_QUOTES, 'UTF-8');?>
</span></h1>
	<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SITE_URL']->value, ENT_QUOTES, 'UTF-8');?>
/?page=report&amp;action=discharge&amp;facility=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['facility']->value->pubid, ENT_QUOTES, 'UTF-8');?>
&amp;view=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['view']->value, ENT_QUOTES, 'UTF-8');?>
&amp;year=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['year']->value, ENT_QUOTES, 'UTF-8');?>
&amp;filterby=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['filterby']->value, ENT_QUOTES, 'UTF-8');?>
" class="button">Back</a>
	<div class="sort-right">
	<strong>Order by:</strong>
	<select id="orderby">
			<option value=""></option>
		<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['orderByOpts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
			<option value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['k']->value, ENT_QUOTES, 'UTF-8');?>
"<?php if ($_smarty_tpl->tpl_vars['orderby']->value==$_smarty_tpl->tpl_vars['k']->value){?> selected<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['v']->value, ENT_QUOTES, 'UTF-8');?>
</option>
		<?php } ?>
	</select>
</div>
	<br />
	<br />
	<br />
	<br />
	<table id="report-table" cellpadding="5" cellspacing="0">
		<tr  class="report-total">
			<th>Patient Name</th>
			<th>Discharge Disposition</th>
			<th>Service Disposition</th>
			<th><?php if ($_smarty_tpl->tpl_vars['discharge_to']->value=="Transfer to another AHC facility"){?>Facility<?php }else{ ?>Discharge Location Name<?php }?></th>
		</tr>
		<?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['d']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
$_smarty_tpl->tpl_vars['d']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['d']->key;
?>	
			<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['d']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
$_smarty_tpl->tpl_vars['i']->_loop = true;
?>
				<tr bgcolor="<?php echo smarty_function_cycle(array('values'=>"#ffffff,#d0e2f0"),$_smarty_tpl);?>
">
					<td><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SITE_URL']->value, ENT_QUOTES, 'UTF-8');?>
/?page=patient&amp;action=inquiry&amp;schedule=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['i']->value->schedule_id, ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['i']->value->last_name, ENT_QUOTES, 'UTF-8');?>
, <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['i']->value->first_name, ENT_QUOTES, 'UTF-8');?>
</a></td>
					<td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['i']->value->discharge_disposition, ENT_QUOTES, 'UTF-8');?>
</td>
					<td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['i']->value->service_disposition, ENT_QUOTES, 'UTF-8');?>
</td>
					<td><?php if ($_smarty_tpl->tpl_vars['discharge_to']->value=="Transfer to another AHC facility"){?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['i']->value->facility_name, ENT_QUOTES, 'UTF-8');?>
<?php }else{ ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['i']->value->hospital_name, ENT_QUOTES, 'UTF-8');?>
<?php }?></td>
				</tr>
			<?php } ?>
		<?php } ?>
	</table>
	
<?php }?><?php }} ?>