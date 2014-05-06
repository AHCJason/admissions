<?php /* Smarty version Smarty-3.1.13, created on 2014-03-26 11:17:58
         compiled from "/var/www/admit_app/admissions/protected/tpl/pharmacy/manage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:214048513553330bc685fed3-73858459%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'df87843e0d3dfb1b5aef242fd91fc08f34312f5a' => 
    array (
      0 => '/var/www/admit_app/admissions/protected/tpl/pharmacy/manage.tpl',
      1 => 1395702646,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '214048513553330bc685fed3-73858459',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SITE_URL' => 0,
    'pharmacies' => 0,
    'pharmacy' => 0,
    'getter' => 0,
    'sliceLinks' => 0,
    'chunk' => 0,
    'slice' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_53330bc6a63722_00899433',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53330bc6a63722_00899433')) {function content_53330bc6a63722_00899433($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/var/www/admit_app/cms2/protected/lib/contrib/Smarty-3.1.13/libs/plugins/function.cycle.php';
?><?php $_smarty_tpl->smarty->_tag_stack[] = array('jQueryReady', array()); $_block_repeat=true; echo smarty_jQueryReady(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>


$("#pharmacy-search").autocomplete({
	minLength: 4,
	source: function(req, add) {
		$.getJSON(SITE_URL, { page: 'pharmacy', action: 'searchPharmacies', term: req.term}, function (json) {
			var suggestions = [];
			$.each (json, function(i, val) {
				var obj = new Object;
				obj.value = val.id;
				obj.label = val.name + " (" + val.address + ' ' + val.city + ', ' + val.state + ")";
				obj.pubid = val.pubid;
				suggestions.push(obj);
			});
			add(suggestions);
		});
	}
	,select: function (e, ui) {
		e.preventDefault();
		$("#pharmacy").val(ui.item.value);
		e.target.value = ui.item.label;		
		window.location = SITE_URL + '/?page=pharmacy&action=edit&pharmacy=' + ui.item.pubid;
	
	}
});


<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_jQueryReady(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>


<h1 class="text-center">Manage Pharmacies</h1>

<div class="left">
	<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SITE_URL']->value, ENT_QUOTES, 'UTF-8');?>
/?page=pharmacy&action=add" class="button">New Pharmacy</a>
</div>
<div class="right">
	Search: <input type="text" name="pharmacy_search" id="pharmacy-search" size="30" />
</div>

<br />
<br />
<br />
<br />

<table cellpadding="5" cellspacing="0">
	<tr>
		<th>Pharmacy</th>
		<th>Location</th>
		<th>Phone</th>
		<th>Fax</th>
	</tr>
	<?php  $_smarty_tpl->tpl_vars['pharmacy'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['pharmacy']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pharmacies']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['pharmacy']->key => $_smarty_tpl->tpl_vars['pharmacy']->value){
$_smarty_tpl->tpl_vars['pharmacy']->_loop = true;
?>
		<tr bgcolor="<?php echo smarty_function_cycle(array('values'=>"#d0e2f0,#ffffff"),$_smarty_tpl);?>
">
			<td><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SITE_URL']->value, ENT_QUOTES, 'UTF-8');?>
/?page=pharmacy&amp;action=edit&amp;pharmacy=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pharmacy']->value->pubid, ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pharmacy']->value->name, ENT_QUOTES, 'UTF-8');?>
</a></td>
			<td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pharmacy']->value->address, ENT_QUOTES, 'UTF-8');?>
<br />
				<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pharmacy']->value->city, ENT_QUOTES, 'UTF-8');?>
, <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pharmacy']->value->state, ENT_QUOTES, 'UTF-8');?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pharmacy']->value->zip, ENT_QUOTES, 'UTF-8');?>
</td>
			<td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pharmacy']->value->phone, ENT_QUOTES, 'UTF-8');?>
</td>
			<td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pharmacy']->value->fax, ENT_QUOTES, 'UTF-8');?>
</td>
		</tr>
	<?php } ?>
</table>


<?php $_smarty_tpl->tpl_vars['sliceLinks'] = new Smarty_variable($_smarty_tpl->tpl_vars['getter']->value->paginationGetSliceLinks(2,2), null, 0);?>
<?php if (count($_smarty_tpl->tpl_vars['sliceLinks']->value)>1){?>

	<div id="pagination">
 		<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['getter']->value->paginationSetMaxLinks(30), ENT_QUOTES, 'UTF-8');?>

 		<div class="pagination-link">
		<!-- Shows the page numbers -->
			<?php  $_smarty_tpl->tpl_vars['chunk'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['chunk']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['sliceLinks']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['chunk']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['chunk']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['chunk']->key => $_smarty_tpl->tpl_vars['chunk']->value){
$_smarty_tpl->tpl_vars['chunk']->_loop = true;
 $_smarty_tpl->tpl_vars['chunk']->iteration++;
 $_smarty_tpl->tpl_vars['chunk']->last = $_smarty_tpl->tpl_vars['chunk']->iteration === $_smarty_tpl->tpl_vars['chunk']->total;
?>
				<?php  $_smarty_tpl->tpl_vars['slice'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['slice']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['chunk']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['slice']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['slice']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['slice']->key => $_smarty_tpl->tpl_vars['slice']->value){
$_smarty_tpl->tpl_vars['slice']->_loop = true;
 $_smarty_tpl->tpl_vars['slice']->iteration++;
 $_smarty_tpl->tpl_vars['slice']->last = $_smarty_tpl->tpl_vars['slice']->iteration === $_smarty_tpl->tpl_vars['slice']->total;
?>
					<?php if ($_smarty_tpl->tpl_vars['slice']->value==$_smarty_tpl->tpl_vars['getter']->value->paginationGetSlice()){?>
						<td class="current">
							<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slice']->value, ENT_QUOTES, 'UTF-8');?>
&nbsp;&nbsp;|&nbsp;
						</td>
					<?php }else{ ?>
						<td>
							<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['getter']->value->paginationGetURL($_smarty_tpl->tpl_vars['slice']->value), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slice']->value, ENT_QUOTES, 'UTF-8');?>
</a>&nbsp;&nbsp;|&nbsp;
						</td>
					<?php }?>
					<?php if ($_smarty_tpl->tpl_vars['slice']->last==true&&$_smarty_tpl->tpl_vars['chunk']->last!=true){?><td class="ellipsis"> ...</td><?php }?>
				<?php } ?>
			<?php } ?>
		</div>

		<div class="pagination-link">
			 <!-- Shows the next and previous links -->
			 <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['getter']->value->paginationGetURL($_smarty_tpl->tpl_vars['getter']->value->paginationPrevSlice()), ENT_QUOTES, 'UTF-8');?>
" class="floatleft pagination-link" rel="previous">Previous</a>
			 &nbsp;&nbsp;
			 <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['getter']->value->paginationGetURL($_smarty_tpl->tpl_vars['getter']->value->paginationNextSlice()), ENT_QUOTES, 'UTF-8');?>
" rel="next">Next</a>
		</div>

		<div class="pagination-link">		
		 <!-- prints X of Y, where X is current page and Y is number of pages -->
		 Page <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['getter']->value->paginationGetSlice(), ENT_QUOTES, 'UTF-8');?>
 of <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['getter']->value->paginationNumSlices(), ENT_QUOTES, 'UTF-8');?>

		 </div>

	</div>
<?php }?><?php }} ?>