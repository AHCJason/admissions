<?php /* Smarty version Smarty-3.1.13, created on 2014-03-26 09:22:13
         compiled from "/var/www/admit_app/admissions/protected/tpl/patient/export_icons.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4328223965332f0a59fac02-63293968%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9dcc250f51dd6301e8f43f5ba63f4f15a241eac5' => 
    array (
      0 => '/var/www/admit_app/admissions/protected/tpl/patient/export_icons.tpl',
      1 => 1395702646,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4328223965332f0a59fac02-63293968',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'urlString' => 0,
    'SITE_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5332f0a5a1ae28_06902204',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5332f0a5a1ae28_06902204')) {function content_5332f0a5a1ae28_06902204($_smarty_tpl) {?><div id="export-icons">

	<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urlString']->value, ENT_QUOTES, 'UTF-8');?>
&export=excel">
		<img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SITE_URL']->value, ENT_QUOTES, 'UTF-8');?>
/images/icons/file_xls.png" />
	</a>
	
<!--
	<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urlString']->value, ENT_QUOTES, 'UTF-8');?>
&export=pdf" target="_blank">
		<img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SITE_URL']->value, ENT_QUOTES, 'UTF-8');?>
/images/icons/file_pdf.png" />
	</a>
-->
	
</div><?php }} ?>