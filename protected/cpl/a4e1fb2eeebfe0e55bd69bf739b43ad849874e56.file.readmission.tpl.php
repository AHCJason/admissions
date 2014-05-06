<?php /* Smarty version Smarty-3.1.13, created on 2014-04-23 12:16:12
         compiled from "/var/www/admit_app/admissions/protected/tpl/report/readmission.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18155576555358036c8fb7c9-11125695%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a4e1fb2eeebfe0e55bd69bf739b43ad849874e56' => 
    array (
      0 => '/var/www/admit_app/admissions/protected/tpl/report/readmission.tpl',
      1 => 1395702646,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18155576555358036c8fb7c9-11125695',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'facility' => 0,
    'readmitType' => 0,
    'orderByOpts' => 0,
    'k' => 0,
    'orderby' => 0,
    'v' => 0,
    'readmit' => 0,
    'r' => 0,
    'hospital' => 0,
    'physician' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5358036c9c17a6_77463129',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5358036c9c17a6_77463129')) {function content_5358036c9c17a6_77463129($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/var/www/admit_app/cms2/protected/lib/contrib/Smarty-3.1.13/libs/plugins/function.cycle.php';
if (!is_callable('smarty_modifier_date_format')) include '/var/www/admit_app/cms2/protected/lib/contrib/Smarty-3.1.13/libs/plugins/modifier.date_format.php';
if (!is_callable('smarty_modifier_capitalize')) include '/var/www/admit_app/cms2/protected/lib/contrib/Smarty-3.1.13/libs/plugins/modifier.capitalize.php';
?><?php echo smarty_set_title(array('title'=>"AHC Reports"),$_smarty_tpl);?>

<?php echo $_smarty_tpl->getSubTemplate ("patient/export_icons.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<h1 class="text-center">Re-Admission Report<br /><span class="text-16">for <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['facility']->value->name, ENT_QUOTES, 'UTF-8');?>
</span></h1>

<?php echo $_smarty_tpl->getSubTemplate ("report/index.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="left">
	<strong>Re-Admission Type:</strong>
	<select id="readmit-type">
		<option value="">Select Type...</option>
		<option value="Former Patient" <?php if ($_smarty_tpl->tpl_vars['readmitType']->value=="Former Patient"){?> selected<?php }?>>Former Patient</option>
		<option value="From Hospital" <?php if ($_smarty_tpl->tpl_vars['readmitType']->value=="From Hospital"){?> selected<?php }?>>From Hospital</option>
	</select>
</div>
<div class="right" style="margin-bottom: 35px;">
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

<br />
<div class="clear">
	<strong><?php echo htmlspecialchars(count($_smarty_tpl->tpl_vars['readmit']->value), ENT_QUOTES, 'UTF-8');?>
 total re-admissions</strong><br />
</div>
<br />
<table id="report-table" cellpadding="5" cellspacing="0">
	<tr>
		<th>Patient Name</th>
		<th>Re-Admit Date</th>
		<th>Type of Re-Admission</th>
		<th>Hospital</th>
		<th>Attending Physician</th>
	</tr>
	<?php  $_smarty_tpl->tpl_vars['r'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['readmit']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['r']->key => $_smarty_tpl->tpl_vars['r']->value){
$_smarty_tpl->tpl_vars['r']->_loop = true;
?>
	<tr bgcolor="<?php echo smarty_function_cycle(array('values'=>"#d0e2f0,#ffffff"),$_smarty_tpl);?>
">
		<td style="text-align: left;"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['r']->value->getPatient()->fullName(), ENT_QUOTES, 'UTF-8');?>
</td>
		<td><?php echo htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['r']->value->datetime_admit,"%m/%d/%Y"), ENT_QUOTES, 'UTF-8');?>
</td>
		<td><?php echo htmlspecialchars(smarty_modifier_capitalize($_smarty_tpl->tpl_vars['r']->value->readmit_type), ENT_QUOTES, 'UTF-8');?>
</td>
		<?php $_smarty_tpl->tpl_vars['hospital'] = new Smarty_variable(CMS_Hospital::generate(), null, 0);?>
		<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['hospital']->value->load($_smarty_tpl->tpl_vars['r']->value->hospital_id), ENT_QUOTES, 'UTF-8');?>

		<td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['hospital']->value->name, ENT_QUOTES, 'UTF-8');?>
</td>
		<?php $_smarty_tpl->tpl_vars['physician'] = new Smarty_variable(CMS_Physician::generate(), null, 0);?>
		<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['physician']->value->load($_smarty_tpl->tpl_vars['r']->value->getPatient()->physician_id), ENT_QUOTES, 'UTF-8');?>

		<td>Dr. <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['physician']->value->last_name, ENT_QUOTES, 'UTF-8');?>
</td>
		<td></td>
	</tr>	
	<?php } ?>
</table><?php }} ?>