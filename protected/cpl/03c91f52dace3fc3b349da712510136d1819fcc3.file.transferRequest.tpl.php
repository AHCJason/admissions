<?php /* Smarty version Smarty-3.1.13, created on 2014-04-23 12:05:37
         compiled from "/var/www/admit_app/admissions/protected/tpl/patient/transferRequest.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1649537637535800f13a24b3-82308385%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '03c91f52dace3fc3b349da712510136d1819fcc3' => 
    array (
      0 => '/var/www/admit_app/admissions/protected/tpl/patient/transferRequest.tpl',
      1 => 1395702646,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1649537637535800f13a24b3-82308385',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'schedule' => 0,
    'patient' => 0,
    'SITE_URL' => 0,
    'facility' => 0,
    'facilities' => 0,
    'f' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_535800f140f432_54504098',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_535800f140f432_54504098')) {function content_535800f140f432_54504098($_smarty_tpl) {?><h1 class="text-center"><?php if ($_smarty_tpl->tpl_vars['schedule']->value->transfer_request){?>Edit the<?php }else{ ?>Enter a new<?php }?> Pending Transfer Request</h1>
<h2 class="text-center">for <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['patient']->value->first_name, ENT_QUOTES, 'UTF-8');?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['patient']->value->last_name, ENT_QUOTES, 'UTF-8');?>
</h2>

<form action="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SITE_URL']->value, ENT_QUOTES, 'UTF-8');?>
" method="post">
	<input type="hidden" name="page" value="patient" />
	<input type="hidden" name="action" value="submitTransferRequest" />
	<input type="hidden" name="schedule" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['schedule']->value->pubid, ENT_QUOTES, 'UTF-8');?>
" />
		
	<table id="info-form">
		<tr>
			
			<td><strong>Admission Facility:</strong></td>
			<?php $_smarty_tpl->tpl_vars['facility'] = new Smarty_variable(CMS_Facility::generate(), null, 0);?>
			<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['facility']->value->load($_smarty_tpl->tpl_vars['schedule']->value->facility), ENT_QUOTES, 'UTF-8');?>

			<input type="hidden" name="transfer_from_facility" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['facility']->value->pubid, ENT_QUOTES, 'UTF-8');?>
" />
			<td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['facility']->value->name, ENT_QUOTES, 'UTF-8');?>
</td>
		</tr>
		<tr>
			<td><strong>Requested Facility:</strong></td>
			<td>
				<select name="transfer_to_facility">
					<option value="">Select facility...</option>
					<?php  $_smarty_tpl->tpl_vars['f'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['f']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['facilities']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['f']->key => $_smarty_tpl->tpl_vars['f']->value){
$_smarty_tpl->tpl_vars['f']->_loop = true;
?>
					<option value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['f']->value->pubid, ENT_QUOTES, 'UTF-8');?>
" <?php if ($_smarty_tpl->tpl_vars['schedule']->value->transfer_to==$_smarty_tpl->tpl_vars['f']->value->id){?> selected<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['f']->value->name, ENT_QUOTES, 'UTF-8');?>
</option>
					<?php } ?>
				</select>
			</td>
		</tr>
		<tr>
			<td colspan="2"><strong>Comments:</strong></td>
		</tr>
		<tr>
			<td colspan="2"><textarea name="transfer_comment" rows="5" cols="87" placeholder=""><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['schedule']->value->transfer_comment, ENT_QUOTES, 'UTF-8');?>
</textarea></td>
		</tr>
		<tr>
			<td colspan="2" align="right"><input type="submit" value="Save" /></td>
		</tr>
	</table>
</form><?php }} ?>