<?php /* Smarty version Smarty-3.1.13, created on 2014-03-26 09:13:28
         compiled from "/var/www/admit_app/admissions/protected/tpl/physician/add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5866452495332ee98422127-89659478%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '886ad44342c6d383f17401ce40d9774ea4ad7ab4' => 
    array (
      0 => '/var/www/admit_app/admissions/protected/tpl/physician/add.tpl',
      1 => 1395702646,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5866452495332ee98422127-89659478',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'states' => 0,
    'state' => 0,
    'abbr' => 0,
    'physicianType' => 0,
    'SITE_URL' => 0,
    'isMicro' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5332ee984d4e84_78281751',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5332ee984d4e84_78281751')) {function content_5332ee984d4e84_78281751($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_capitalize')) include '/var/www/admit_app/cms2/protected/lib/contrib/Smarty-3.1.13/libs/plugins/modifier.capitalize.php';
?><?php $_smarty_tpl->smarty->_tag_stack[] = array('jQueryReady', array()); $_block_repeat=true; echo smarty_jQueryReady(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

<?php $_smarty_tpl->tpl_vars['states'] = new Smarty_variable(getUSAStates(), null, 0);?>
var states = [
<?php  $_smarty_tpl->tpl_vars['state'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['state']->_loop = false;
 $_smarty_tpl->tpl_vars['abbr'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['states']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['state']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['state']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['state']->key => $_smarty_tpl->tpl_vars['state']->value){
$_smarty_tpl->tpl_vars['state']->_loop = true;
 $_smarty_tpl->tpl_vars['abbr']->value = $_smarty_tpl->tpl_vars['state']->key;
 $_smarty_tpl->tpl_vars['state']->iteration++;
 $_smarty_tpl->tpl_vars['state']->last = $_smarty_tpl->tpl_vars['state']->iteration === $_smarty_tpl->tpl_vars['state']->total;
?>
<?php if ($_smarty_tpl->tpl_vars['state']->value!=''){?>
	{
		value: "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['abbr']->value, ENT_QUOTES, 'UTF-8');?>
",
		label: "(<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['abbr']->value, ENT_QUOTES, 'UTF-8');?>
) <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['state']->value, ENT_QUOTES, 'UTF-8');?>
"
	}
	<?php if ($_smarty_tpl->tpl_vars['state']->last!=true){?>,<?php }?>
<?php }?>
<?php } ?>
];

$("#search-states").autocomplete(
	{
		minLength: 0,
		source: states,
		focus: function( event, ui ) {
			$( "#search-states" ).val( ui.item.label );
			return false;
		},
		select: function( event, ui ) {
			$( "#search-states" ).val( ui.item.label );
			$( "#state_id" ).val( ui.item.value );
			return false;
		}
	}).data( "autocomplete" )._renderItem = function( ul, item ) {
		return $( "<li></li>" )
		.data( "item.autocomplete", item )
		.append( "<a>" + item.label + "</a>" )
		.appendTo( ul );
	};
	
$(".phone").mask("(999)-999-9999");
$(".fax").mask("(999)-999-9999");

<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_jQueryReady(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>


<div class="lightbox">
	<h1>Add a new <?php echo htmlspecialchars((($tmp = @smarty_modifier_capitalize($_smarty_tpl->tpl_vars['physicianType']->value))===null||$tmp==='' ? 'Physician' : $tmp), ENT_QUOTES, 'UTF-8');?>
</h1>
	<form name="physician" method="post" action="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SITE_URL']->value, ENT_QUOTES, 'UTF-8');?>
" id="add-physician">
		<input type="hidden" name="page" value="physician" />
		<?php if ($_smarty_tpl->tpl_vars['isMicro']->value){?>
			<input type="hidden" name="action" value="addShadowboxPhysician" />
		<?php }else{ ?>
			<input type="hidden" name="action" value="addPhysician" />
		<?php }?>
		<table id="edit-data" cellspacing="5" cellpadding="5">
			<tr>
				<td><strong>First Name</strong></td>
				<td colspan="2"><strong>Last Name</strong></td>
			</tr>
			
			<tr>
				<td><input type="text" name="first_name" /></td>
				<td colspan="2"><input type="text" name="last_name" size="50" /></td>
			</tr>
			<tr>
				<td colspan="3"><strong>Address</strong></td>
			</tr> 
			<tr>
				<td colspan="3"><input type="text" name="address" size="80" /></td>
			</tr>
			<tr>
				<td><strong>City</strong></td>
				<td><strong>State</strong></td>
				<td><strong>Zip</strong></td>
			</tr>
			<tr>
				<td><input type="text" name="city" size="20" /></td>
				<td><input type="text" id="search-states" size="16" /></td>
				<input type="hidden" name="state_id" id="state_id" />
				<td><input type="text" name="zip" size="8" /></td>
			</tr>
			<tr>
				<td><strong>Phone</strong></td>
				<td><strong>Fax</strong></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td><input type="text" name="phone" class="phone" /></td>
				<td><input type="text" name="fax" class="fax" /></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td colspan="3"><input type="submit" value="Save" class="right" /></td>
			</tr>

		</table>
	</form>
</div><?php }} ?>