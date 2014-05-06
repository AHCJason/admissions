<?php /* Smarty version Smarty-3.1.13, created on 2014-04-23 12:16:23
         compiled from "/var/www/admit_app/admissions/protected/tpl/report/returned_to_hospital.tpl" */ ?>
<?php /*%%SmartyHeaderCode:769146169535803779a4e23-02673344%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6e8b7ca2d1f0777661c91aa8b543b731c97baf85' => 
    array (
      0 => '/var/www/admit_app/admissions/protected/tpl/report/returned_to_hospital.tpl',
      1 => 1395702646,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '769146169535803779a4e23-02673344',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'facility' => 0,
    'readmitRate' => 0,
    'orderByOpts' => 0,
    'k' => 0,
    'orderby' => 0,
    'v' => 0,
    'returnedReport' => 0,
    'r' => 0,
    'hospital' => 0,
    'physician' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_53580377a584b1_32741372',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53580377a584b1_32741372')) {function content_53580377a584b1_32741372($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/var/www/admit_app/cms2/protected/lib/contrib/Smarty-3.1.13/libs/plugins/function.cycle.php';
if (!is_callable('smarty_modifier_date_format')) include '/var/www/admit_app/cms2/protected/lib/contrib/Smarty-3.1.13/libs/plugins/modifier.date_format.php';
?><?php echo smarty_set_title(array('title'=>"AHC Reports: Returned to Hospital"),$_smarty_tpl);?>

<?php echo $_smarty_tpl->getSubTemplate ("patient/export_icons.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("patient/patient_search.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<h1 class="text-center">Returned To Hospital Report<br /><span class="text-16">for <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['facility']->value->name, ENT_QUOTES, 'UTF-8');?>
</span></h1>
<?php echo $_smarty_tpl->getSubTemplate ("report/index.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>




<div id="report-info">
	<div class="left-info background-blue">
		Re-Admit to Hospital Rate:<strong><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['readmitRate']->value, ENT_QUOTES, 'UTF-8');?>
%</strong>.
	</div>
	
	<div class="right-info">
		<strong>Order by:</strong>
		<select id="orderby">
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
</div>
<table id="report-table" cellpadding="5" cellspacing="0">
	<tr>
		<th>Patient Name</th>
		<th>Hospital</th>
		<th>Sent</th>
		<th>Comment</th>
		<th>Attending Physician</th>
		<th>Re-Admit to AHC</th>
	</tr>
	<?php  $_smarty_tpl->tpl_vars['r'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['returnedReport']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['r']->key => $_smarty_tpl->tpl_vars['r']->value){
$_smarty_tpl->tpl_vars['r']->_loop = true;
?>
	<?php $_smarty_tpl->tpl_vars['hospital'] = new Smarty_variable(CMS_Hospital::generate(), null, 0);?>
	<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['hospital']->value->load($_smarty_tpl->tpl_vars['r']->value->hospital), ENT_QUOTES, 'UTF-8');?>

	<tr bgcolor="<?php echo smarty_function_cycle(array('values'=>"#d0e2f0,#ffffff"),$_smarty_tpl);?>
">
		<td class="text-left"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['r']->value->getPatient()->fullName(), ENT_QUOTES, 'UTF-8');?>
</td>
		<td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['hospital']->value->name, ENT_QUOTES, 'UTF-8');?>
</td>
		<td><?php echo htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['r']->value->datetime_sent,"%m/%d/%Y"), ENT_QUOTES, 'UTF-8');?>
</td>
		<td style="text-align:left"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['r']->value->comment, ENT_QUOTES, 'UTF-8');?>
</td>
		<?php if ($_smarty_tpl->tpl_vars['r']->value->getPatient()->physician_id!=''){?>
		<?php $_smarty_tpl->tpl_vars['physician'] = new Smarty_variable(CMS_Physician::generate(), null, 0);?>
		<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['physician']->value->load($_smarty_tpl->tpl_vars['r']->value->getPatient()->physician_id), ENT_QUOTES, 'UTF-8');?>

		<td>Dr. <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['physician']->value->last_name, ENT_QUOTES, 'UTF-8');?>
</td>
		<?php }elseif(($_smarty_tpl->tpl_vars['r']->value->getPatient()->physician_name!='')){?>
		<td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['r']->value->getPatient()->physican_name, ENT_QUOTES, 'UTF-8');?>
</td>
		<?php }else{ ?>
		<td></td>
		<?php }?>
		<td><?php echo htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['r']->value->datetime_returned,"%m/%d/%Y"), ENT_QUOTES, 'UTF-8');?>
</td>
	</tr>	
	<?php } ?>
</table><?php }} ?>