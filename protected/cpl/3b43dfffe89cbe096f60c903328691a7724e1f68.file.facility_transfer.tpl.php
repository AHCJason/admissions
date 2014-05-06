<?php /* Smarty version Smarty-3.1.13, created on 2014-03-26 11:09:18
         compiled from "/var/www/admit_app/admissions/protected/tpl/report/facility_transfer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:516420959533309bee9c927-90029571%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3b43dfffe89cbe096f60c903328691a7724e1f68' => 
    array (
      0 => '/var/www/admit_app/admissions/protected/tpl/report/facility_transfer.tpl',
      1 => 1395702646,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '516420959533309bee9c927-90029571',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'facility' => 0,
    'transfers' => 0,
    't' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_533309bef2b762_52375581',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_533309bef2b762_52375581')) {function content_533309bef2b762_52375581($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/var/www/admit_app/cms2/protected/lib/contrib/Smarty-3.1.13/libs/plugins/function.cycle.php';
if (!is_callable('smarty_modifier_date_format')) include '/var/www/admit_app/cms2/protected/lib/contrib/Smarty-3.1.13/libs/plugins/modifier.date_format.php';
?><?php echo smarty_set_title(array('title'=>"AHC Reports"),$_smarty_tpl);?>

<?php echo $_smarty_tpl->getSubTemplate ("patient/export_icons.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<h1 class="text-center">Facility Transfer Report<br /><span class="text-16">for <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['facility']->value->name, ENT_QUOTES, 'UTF-8');?>
</span></h1>
<?php echo $_smarty_tpl->getSubTemplate ("report/index.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	
<table id="report-table" cellpadding="5" cellspacing="0">
	<tr>
		<th>Patient Name</th>
		<th>Admit Date</th>
		<th>Transfer Facility</th>
	</tr>	
	
	<?php  $_smarty_tpl->tpl_vars['t'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['t']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['transfers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['t']->key => $_smarty_tpl->tpl_vars['t']->value){
$_smarty_tpl->tpl_vars['t']->_loop = true;
?>
		<tr bgcolor="<?php echo smarty_function_cycle(array('values'=>"#d0e2f0,#ffffff"),$_smarty_tpl);?>
">
			<td align="left"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['t']->value->last_name, ENT_QUOTES, 'UTF-8');?>
, <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['t']->value->first_name, ENT_QUOTES, 'UTF-8');?>
</td>
			<td><?php echo htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['t']->value->datetime_admit,"m/d/Y"), ENT_QUOTES, 'UTF-8');?>
</td>
			<td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['t']->value->transfer_from, ENT_QUOTES, 'UTF-8');?>
</td>
		</tr>
	<?php } ?>
</table><?php }} ?>