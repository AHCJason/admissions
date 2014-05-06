<?php /* Smarty version Smarty-3.1.13, created on 2014-03-26 11:58:51
         compiled from "/var/www/admit_app/admissions/protected/tpl/siteUser/add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6352668915333155bb8c868-90830019%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '82d8ddf6c1b34f1340922d2183375208be7558ae' => 
    array (
      0 => '/var/www/admit_app/admissions/protected/tpl/siteUser/add.tpl',
      1 => 1395702646,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6352668915333155bb8c868-90830019',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SITE_URL' => 0,
    'user' => 0,
    'facilities' => 0,
    'f' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5333155bc333b3_11089555',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5333155bc333b3_11089555')) {function content_5333155bc333b3_11089555($_smarty_tpl) {?><?php $_smarty_tpl->smarty->_tag_stack[] = array('jQueryReady', array()); $_block_repeat=true; echo smarty_jQueryReady(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

	$('.phone').mask('(999) 999-9999');
	
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_jQueryReady(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<h1 class="text-center">Add a New User</h1>

<form action="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SITE_URL']->value, ENT_QUOTES, 'UTF-8');?>
" method="post">
	<input type="hidden" name="page" value="siteUser" />
	<input type="hidden" name="action" value="submitAddUser" />
	
	<table id="edit-data" cellpadding="5" cellspacing="5">
		<tr>
			<td>First Name:</td>
			<td><input type="text" name="first" size="30" /></td>
		</tr>
		<tr>
			<td>Last Name:</td>
			<td><input type="text" name="last" size="50" /></td>
		</tr>
		<tr>
			<td>Username (Email Address):</td>
			<td><input type="text" name="email" size="30" /></td>
		</tr>
		<tr>
			<td>New Password:</td>
			<td><input type="password" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value->password, ENT_QUOTES, 'UTF-8');?>
" name="password1" /></td>
		</tr>
		<tr>
			<td>Verify Password:</td>
			<td><input type="password" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value->password, ENT_QUOTES, 'UTF-8');?>
" name="password2" /></td>
		</tr>
		<tr>
			<td>Phone:</td>
			<td><input type="text" name="phone" size="10" class="phone" /></td>
		</tr>
		<tr>	
			<td>Facility:</td>
			<td>
				<select name="facility">
					<option value="">Select a facility...</option>
					<?php  $_smarty_tpl->tpl_vars['f'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['f']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['facilities']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['f']->key => $_smarty_tpl->tpl_vars['f']->value){
$_smarty_tpl->tpl_vars['f']->_loop = true;
?>
						<option value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['f']->value->pubid, ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['f']->value->name, ENT_QUOTES, 'UTF-8');?>
</option>
					<?php } ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input id="is-coordinator" type="checkbox" name="is_coordinator" value="1"> Is an Admissions Coordinator</td>
		</tr>
		<tr>
			<td colspan="2" align="right"><input type="submit" value="Add User" /></td>
		</tr>


	</table>
	
</form><?php }} ?>