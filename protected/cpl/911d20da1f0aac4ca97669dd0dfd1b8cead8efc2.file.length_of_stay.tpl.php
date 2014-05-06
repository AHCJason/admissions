<?php /* Smarty version Smarty-3.1.13, created on 2014-03-26 11:09:24
         compiled from "/var/www/admit_app/admissions/protected/tpl/report/length_of_stay.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1967158417533309c4ed2665-04079191%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '911d20da1f0aac4ca97669dd0dfd1b8cead8efc2' => 
    array (
      0 => '/var/www/admit_app/admissions/protected/tpl/report/length_of_stay.tpl',
      1 => 1395702646,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1967158417533309c4ed2665-04079191',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'isMicro' => 0,
    'SITE_URL' => 0,
    'facilityPubId' => 0,
    'view' => 0,
    'year' => 0,
    'facility' => 0,
    'filterByOpts' => 0,
    'k' => 0,
    'filterby' => 0,
    'v' => 0,
    'lengthOfStay' => 0,
    'key' => 0,
    'report' => 0,
    'stay' => 0,
    's' => 0,
    'yearInfo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_533309c5082257_04122803',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_533309c5082257_04122803')) {function content_533309c5082257_04122803($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/admit_app/cms2/protected/lib/contrib/Smarty-3.1.13/libs/plugins/modifier.date_format.php';
?><?php echo smarty_set_title(array('title'=>"Length of Stay Report"),$_smarty_tpl);?>

<?php echo $_smarty_tpl->getSubTemplate ("patient/export_icons.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php if (!$_smarty_tpl->tpl_vars['isMicro']->value){?>
<!-- <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SITE_URL']->value, ENT_QUOTES, 'UTF-8');?>
/?page=report&amp;action=length_of_stay&amp;facility=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['facilityPubId']->value, ENT_QUOTES, 'UTF-8');?>
&amp;view=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['view']->value, ENT_QUOTES, 'UTF-8');?>
&amp;year=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['year']->value, ENT_QUOTES, 'UTF-8');?>
&isMicro=1" class="button">Print</a> -->
<h1 class="text-center">Length of Stay Report<br /><span class="text-16">for <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['facility']->value->name, ENT_QUOTES, 'UTF-8');?>
</span></h1>
<?php echo $_smarty_tpl->getSubTemplate ("report/index.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php $_smarty_tpl->smarty->_tag_stack[] = array('jQueryReady', array()); $_block_repeat=true; echo smarty_jQueryReady(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

	$("#filterby").change(function() {
		window.location = SITE_URL + "/?page=report&action=length_of_stay&facility=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['facilityPubId']->value, ENT_QUOTES, 'UTF-8');?>
&view=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['view']->value, ENT_QUOTES, 'UTF-8');?>
&year=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['year']->value, ENT_QUOTES, 'UTF-8');?>
&filterby=" + $("#filterby option:selected").val();
	});
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_jQueryReady(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<br />
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
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['isMicro']->value){?>
	<h1 class="text-center text-18">Length of Stay Report for <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['facility']->value->name, ENT_QUOTES, 'UTF-8');?>
</h1>
	<table id="report-table" style="margin: 0 auto;">
<?php }else{ ?>
	<table id="report-table" cellpadding="5" cellspacing="5">
<?php }?>
	<?php  $_smarty_tpl->tpl_vars['stay'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['stay']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['lengthOfStay']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['stay']->key => $_smarty_tpl->tpl_vars['stay']->value){
$_smarty_tpl->tpl_vars['stay']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['stay']->key;
?>
		<?php $_smarty_tpl->tpl_vars['total'] = new Smarty_variable(array(), null, 0);?>
		<tr bgcolor="#d1d1d1">
			<th colspan="3" >
			<?php if ($_smarty_tpl->tpl_vars['view']->value=="year"){?>
				<?php echo htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['key']->value,"%Y"), ENT_QUOTES, 'UTF-8');?>

			<?php }elseif($_smarty_tpl->tpl_vars['view']->value=="quarter"){?>
				<?php $_smarty_tpl->tpl_vars['report'] = new Smarty_variable(PageControllerReport::getQuarter($_smarty_tpl->tpl_vars['key']->value), null, 0);?>
				<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['report']->value, ENT_QUOTES, 'UTF-8');?>

			<?php }else{ ?><?php echo htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['key']->value,"%B %Y"), ENT_QUOTES, 'UTF-8');?>
<?php }?></th>
		</tr>
		<tr class="bold">
				<td>&nbsp;</td>
				<td>Total Discharges</td>
				<td>Average Length of Stay</td>
		</tr>
		<?php  $_smarty_tpl->tpl_vars['s'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['s']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['stay']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['s']->key => $_smarty_tpl->tpl_vars['s']->value){
$_smarty_tpl->tpl_vars['s']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['s']->key;
?>
			<tr>
				<?php if ($_smarty_tpl->tpl_vars['k']->value!="totalDischarges"&&$_smarty_tpl->tpl_vars['k']->value!="avgLoS"){?>
				<td align="left"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SITE_URL']->value, ENT_QUOTES, 'UTF-8');?>
/?page=report&amp;action=los_details&amp;facility=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['facility']->value->pubid, ENT_QUOTES, 'UTF-8');?>
&amp;date_start=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['s']->value["minDate"], ENT_QUOTES, 'UTF-8');?>
&amp;date_end=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['s']->value["maxDate"], ENT_QUOTES, 'UTF-8');?>
&amp;discharge_to=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['k']->value, ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['k']->value, ENT_QUOTES, 'UTF-8');?>
</a></td>
				<?php }?>
				<td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['s']->value["totalDischarges"], ENT_QUOTES, 'UTF-8');?>
</td>
				<td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['s']->value["lengthOfStay"], ENT_QUOTES, 'UTF-8');?>
</td>
				<?php $_smarty_tpl->createLocalArrayVariable('total', null, 0);
$_smarty_tpl->tpl_vars['total']->value[] = $_smarty_tpl->tpl_vars['s']->value["totalDischarges"];?>
				<?php $_smarty_tpl->createLocalArrayVariable('totalLoS', null, 0);
$_smarty_tpl->tpl_vars['totalLoS']->value[] = $_smarty_tpl->tpl_vars['s']->value["lengthOfStay"];?>
			</tr>
		<?php } ?>

		<tr style="border-top: 1px solid #000;" class="bold">
			<td align="right">Total</td>
			<td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['stay']->value["totalDischarges"], ENT_QUOTES, 'UTF-8');?>
</td>
			<td><?php echo htmlspecialchars(sprintf("%.2f",$_smarty_tpl->tpl_vars['stay']->value["avgLoS"]), ENT_QUOTES, 'UTF-8');?>
</td>
		</tr>
		<?php if (!$_smarty_tpl->tpl_vars['isMicro']->value){?>
		<tr>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
		</tr>
		<?php }?>
	<?php } ?>
	<tr class="report-total">
		<td>Year Totals</td>
		<td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['yearInfo']->value["totalDischarges"], ENT_QUOTES, 'UTF-8');?>
</td>
		<td><?php echo htmlspecialchars(sprintf("%.2f",$_smarty_tpl->tpl_vars['yearInfo']->value["totalAvgLoS"]), ENT_QUOTES, 'UTF-8');?>
</td>
	</tr>
</table><?php }} ?>