<?php /* Smarty version Smarty-3.1.13, created on 2014-03-26 10:26:25
         compiled from "/var/www/admit_app/admissions/protected/tpl/hospital/add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4482552675332ffb162c4b0-46687349%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2edcfa3c662fe4b348be6738a8c3b4bc378e9499' => 
    array (
      0 => '/var/www/admit_app/admissions/protected/tpl/hospital/add.tpl',
      1 => 1395702646,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4482552675332ffb162c4b0-46687349',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'states' => 0,
    'state' => 0,
    'abbr' => 0,
    'SITE_URL' => 0,
    'isMicro' => 0,
    'locationTypes' => 0,
    'type' => 0,
    'inputType' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5332ffb16c62e0_66449264',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5332ffb16c62e0_66449264')) {function content_5332ffb16c62e0_66449264($_smarty_tpl) {?><?php $_smarty_tpl->smarty->_tag_stack[] = array('jQueryReady', array()); $_block_repeat=true; echo smarty_jQueryReady(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

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
			$( "#state" ).val( ui.item.value );
			return false;
		},
		select: function( event, ui ) {
			$( "#search-states" ).val( ui.item.label );
			$( "#state" ).val( ui.item.value );
			return false;
		}
	}).data( "autocomplete" )._renderItem = function( ul, item ) {
		return $( "<li></li>" )
		.data( "item.autocomplete", item )
		.append( "<a>" + item.label + "</a>" )
		.appendTo( ul );
		console.log($("#search-states").val());
	};
	
	
	
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_jQueryReady(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<div class="lightbox">
	<h1>Add a new Location</h1>
	<form name="location" method="post" action="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SITE_URL']->value, ENT_QUOTES, 'UTF-8');?>
" id="add-location">
		<input type="hidden" name="page" value="hospital" />
		<input type="hidden" name="action" value="addLocation" />
		<input type="hidden" name="_path" value="<?php echo htmlspecialchars(urlencode(currentURL()), ENT_QUOTES, 'UTF-8');?>
" />
		<?php if ($_smarty_tpl->tpl_vars['isMicro']->value){?>
			<input type="hidden" name="isMicro" value="1" />
		<?php }?>
		<table id="info-data" cellpadding="5" cellspacing="5">
			<tr>
				<td colspan="2"><strong>Location Name:</strong></td>
				<td><strong>Location Type:</strong></td>
			</tr>
			<tr>
				<td colspan="2"><input type="text" name="name" size="50" /></td>
				<td>
					<select name="type">
						<option value="">Select type...</option>
						<?php  $_smarty_tpl->tpl_vars['type'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['type']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['locationTypes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['type']->key => $_smarty_tpl->tpl_vars['type']->value){
$_smarty_tpl->tpl_vars['type']->_loop = true;
?>
							<option value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['type']->value, ENT_QUOTES, 'UTF-8');?>
" <?php if ($_smarty_tpl->tpl_vars['type']->value==$_smarty_tpl->tpl_vars['inputType']->value){?> selected<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['type']->value, ENT_QUOTES, 'UTF-8');?>
</option>
						<?php } ?>
					</select>
				</td>
			</tr>
			<tr>
				<td><strong>Address</strong></td>
			</tr>
			<tr>
				<td colspan="3"><input type="text" name="address" size="50" /></td>
			</tr>
			<tr>
				<td><strong>City</strong></td>
				<td><strong>State</strong></td>
				<td><strong>Zip</strong></td>
			</tr>
			<tr>
				<td><input type="text" name="city" size="20" /></td>
				<td><input type="text" id="search-states" size="8" /></td>
				<input type="hidden" name="state" id="state" />
				<td><input type="text" name="zip" size="8" /></td>
			</tr>
			<tr>
				<td><strong>Phone</strong></td>
				<td><strong>Fax</strong></td>
			</tr>
			<tr>
				<td><input type="text" name="phone" /></td>
				<td><input type="text" name="fax" /></td>
			</tr>
			<tr>
				<td colspan="3"><input type="submit" value="Save" class="right" /></td>
			</tr>
		</table>
	</form>
</div><?php }} ?>