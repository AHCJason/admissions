<?php /* Smarty version Smarty-3.1.13, created on 2014-03-26 09:22:13
         compiled from "/var/www/admit_app/admissions/protected/tpl/patient/patient_search.tpl" */ ?>
<?php /*%%SmartyHeaderCode:595161475332f0a59b7b26-57572577%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '377041492b653a88729f1bfaea8dc541333d84ea' => 
    array (
      0 => '/var/www/admit_app/admissions/protected/tpl/patient/patient_search.tpl',
      1 => 1395702646,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '595161475332f0a59b7b26-57572577',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5332f0a59f8b48_48120763',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5332f0a59f8b48_48120763')) {function content_5332f0a59f8b48_48120763($_smarty_tpl) {?><?php $_smarty_tpl->smarty->_tag_stack[] = array('jQueryReady', array()); $_block_repeat=true; echo smarty_jQueryReady(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

	$("#submit-button").click(function(e) {
		e.preventDefault();
		window.location = SITE_URL + "/?page=patient&action=search_results&patient_name=" + $("#patient-search").val();
	});
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_jQueryReady(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>



<form name="patient-search" accept="post">
	<div id="report-search-box">
		<input type="text" name="search_patient" id="patient-search" placeholder="Enter the patients' name" size="30" /> <input type="submit" value="Search" id="submit-button" />
	</div>
</form><?php }} ?>