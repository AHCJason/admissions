<?php /* Smarty version Smarty-3.1.13, created on 2014-04-25 14:27:03
         compiled from "/home/aptitude/dev/app/protected/tpl/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1364835610535ac517530a83-07131743%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '801dc9e16689f29f97730a9f6bacf7d4d3b91a0f' => 
    array (
      0 => '/home/aptitude/dev/app/protected/tpl/login.tpl',
      1 => 1398274873,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1364835610535ac517530a83-07131743',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SITE_URL' => 0,
    'path' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_535ac51753a9a2_15468741',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_535ac51753a9a2_15468741')) {function content_535ac51753a9a2_15468741($_smarty_tpl) {?><?php echo smarty_set_title(array('title'=>"Census Dashboard"),$_smarty_tpl);?>


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