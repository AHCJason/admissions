<?php /* Smarty version Smarty-3.1.13, created on 2014-04-23 12:16:29
         compiled from "/var/www/admit_app/admissions/protected/tpl/report/discharge_calls.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14169483985358037d75ac65-43560420%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bed67f335806ab18ef53d974f9ba6d3083af06cf' => 
    array (
      0 => '/var/www/admit_app/admissions/protected/tpl/report/discharge_calls.tpl',
      1 => 1395702646,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14169483985358037d75ac65-43560420',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'facility' => 0,
    'data' => 0,
    'd' => 0,
    'dl' => 0,
    'hh' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5358037d7f1d89_24098002',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5358037d7f1d89_24098002')) {function content_5358037d7f1d89_24098002($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/var/www/admit_app/cms2/protected/lib/contrib/Smarty-3.1.13/libs/plugins/function.cycle.php';
if (!is_callable('smarty_modifier_date_format')) include '/var/www/admit_app/cms2/protected/lib/contrib/Smarty-3.1.13/libs/plugins/modifier.date_format.php';
?><?php echo smarty_set_title(array('title'=>"AHC Reports: 30 Day Discharge Phone Calls"),$_smarty_tpl);?>

<?php echo $_smarty_tpl->getSubTemplate ("patient/export_icons.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<h1 class="text-center">30 Days Discharge Phone Calls<br /><span class="text-14">for</span><br /><span class="text-20"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['facility']->value->name, ENT_QUOTES, 'UTF-8');?>
</span></h1>
<?php echo $_smarty_tpl->getSubTemplate ("report/index.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>




<table id="report-table" cellpadding="5" cellspacing="0">
	<tr>
		<th>Room</th>
		<th>Patient Name</th>
		<th width="90px">Phone #</th>
		<th>Discharge Date</th>
		<th width="180px">Diagnosis</th>
		<th>Admitted From</th>
		<th>Discharge Disposition</th>
		<th>Service Disposition</th>
	</tr>
<?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['d']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
$_smarty_tpl->tpl_vars['d']->_loop = true;
?>
	<?php $_smarty_tpl->tpl_vars['dl'] = new Smarty_variable(CMS_Hospital::generate(), null, 0);?>
	<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['dl']->value->load($_smarty_tpl->tpl_vars['d']->value->discharge_location_id), ENT_QUOTES, 'UTF-8');?>

	<tr bgcolor="<?php echo smarty_function_cycle(array('values'=>"#d0e2f0,#ffffff"),$_smarty_tpl);?>
">
		<td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['d']->value->number, ENT_QUOTES, 'UTF-8');?>
</td>
		<td class="text-left"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['d']->value->last_name, ENT_QUOTES, 'UTF-8');?>
, <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['d']->value->first_name, ENT_QUOTES, 'UTF-8');?>
</td>
		<td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['d']->value->phone, ENT_QUOTES, 'UTF-8');?>
</td>
		<td><?php echo htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['d']->value->datetime_discharge,"%x"), ENT_QUOTES, 'UTF-8');?>
</td>
		<td class="text-left"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['d']->value->other_diagnosis, ENT_QUOTES, 'UTF-8');?>
</td>
		<td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['d']->value->name, ENT_QUOTES, 'UTF-8');?>
</td>
		<td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['d']->value->discharge_disposition, ENT_QUOTES, 'UTF-8');?>
</td>
		<?php if ($_smarty_tpl->tpl_vars['d']->value->service_disposition=="Other Home Health"){?>
			<?php $_smarty_tpl->tpl_vars['hh'] = new Smarty_variable(CMS_Hospital::generate(), null, 0);?>
			<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['hh']->value->load($_smarty_tpl->tpl_vars['d']->value->home_health_id), ENT_QUOTES, 'UTF-8');?>

			<td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['hh']->value->name, ENT_QUOTES, 'UTF-8');?>
</td>
		<?php }else{ ?>
			<td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['d']->value->service_disposition, ENT_QUOTES, 'UTF-8');?>
</td>
		<?php }?>
		
	</tr>
<?php } ?>
</table><?php }} ?>