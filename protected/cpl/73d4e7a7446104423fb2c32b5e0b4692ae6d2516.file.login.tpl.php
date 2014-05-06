<?php /* Smarty version Smarty-3.1.13, created on 2014-04-23 11:41:15
         compiled from "/var/www/admit_app/admissions/protected/tpl/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14705675415332e3b11e92d2-86135651%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '73d4e7a7446104423fb2c32b5e0b4692ae6d2516' => 
    array (
      0 => '/var/www/admit_app/admissions/protected/tpl/login.tpl',
      1 => 1398274873,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14705675415332e3b11e92d2-86135651',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5332e3b1234d63_02788051',
  'variables' => 
  array (
    'SITE_URL' => 0,
    'path' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5332e3b1234d63_02788051')) {function content_5332e3b1234d63_02788051($_smarty_tpl) {?><?php echo smarty_set_title(array('title'=>"Census Dashboard"),$_smarty_tpl);?>


<div id="login-box">
	<h2>Login</h2>
	<br /><br />

	<form method="post" action="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SITE_URL']->value, ENT_QUOTES, 'UTF-8');?>
">
		<input type="hidden" name="page" value="login" />
		<input type="hidden" name="action" value="login" />
		<input type="hidden" name="path" value="<?php echo htmlspecialchars(urlencode($_smarty_tpl->tpl_vars['path']->value), ENT_QUOTES, 'UTF-8');?>
" />
		<?php echo smarty_form_history_on(array('name'=>"login"),$_smarty_tpl);?>

		<table>
			<tr>
				<td>Username:</td>
				<td><input type="text" name="email" value="" id="login_username" /></td>
			</tr>
			
			<tr>
				<td>Password:</td>
				<td><input type="password" name="password" /></td>
			</tr>
			<tr>
				<td colspan="2" align="right"><input type="submit" value="Login" style="margin-top: 10px;" /></td>
			</tr>

		</table>
	</form>
</div><?php }} ?>