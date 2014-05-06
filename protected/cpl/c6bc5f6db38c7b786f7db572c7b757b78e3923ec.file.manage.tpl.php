<?php /* Smarty version Smarty-3.1.13, created on 2014-03-26 09:14:10
         compiled from "/var/www/admit_app/admissions/protected/tpl/physician/manage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11308915945332eec264d639-17561771%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c6bc5f6db38c7b786f7db572c7b757b78e3923ec' => 
    array (
      0 => '/var/www/admit_app/admissions/protected/tpl/physician/manage.tpl',
      1 => 1395702646,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11308915945332eec264d639-17561771',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SITE_URL' => 0,
    'physicians' => 0,
    'p' => 0,
    'getter' => 0,
    'sliceLinks' => 0,
    'chunk' => 0,
    'slice' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5332eec27349c9_24599483',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5332eec27349c9_24599483')) {function content_5332eec27349c9_24599483($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/var/www/admit_app/cms2/protected/lib/contrib/Smarty-3.1.13/libs/plugins/function.cycle.php';
?><?php $_smarty_tpl->smarty->_tag_stack[] = array('jQueryReady', array()); $_block_repeat=true; echo smarty_jQueryReady(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>


$("#physician-search").autocomplete({
	minLength: 3,
	source: function(req, add) {
		$.getJSON(SITE_URL, { page: 'physician', action: 'searchPhysicians', term: req.term}, function (json) {
			var suggestions = [];
			$.each (json, function(i, val) {
				var obj = new Object;
				obj.value = val.id;
				obj.label = val.last_name + ", " + val.first_name + " M.D. " + "(" + val.state + ")";
				obj.pubid = val.pubid;
				suggestions.push(obj);
			});
			add(suggestions);
		});
	}
	,select: function (e, ui) {
		e.preventDefault();
		$("#physician").val(ui.item.value);
		e.target.value = ui.item.label;		
		window.location = SITE_URL + '/?page=physician&action=edit&physician=' + ui.item.pubid;
	}
	
});


<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_jQueryReady(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>


<h1 class="text-center">Manage Physicians &amp; Surgeons</h1>

<div class="left">
	<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SITE_URL']->value, ENT_QUOTES, 'UTF-8');?>
/?page=physician&action=add" class="button">New Physician/Surgeon</a>
</div>
<div class="right">
	Search: <input type="text" name="physician_search" id="physician-search" size="30" />
</div>

<br />
<br />
<br />
<br />

<table cellpadding="5" cellspacing="0">
	<tr>
		<th>Physician Name</th>
		<th>Address</th>
		<th>Phone</th>
	</tr>
	<?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['physicians']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value){
$_smarty_tpl->tpl_vars['p']->_loop = true;
?>
		<tr bgcolor="<?php echo smarty_function_cycle(array('values'=>"#d0e2f0,#ffffff"),$_smarty_tpl);?>
">
			<td><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SITE_URL']->value, ENT_QUOTES, 'UTF-8');?>
/?page=physician&amp;action=edit&amp;physician=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['p']->value->pubid, ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['p']->value->last_name, ENT_QUOTES, 'UTF-8');?>
, <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['p']->value->first_name, ENT_QUOTES, 'UTF-8');?>
</a></td>
			<td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['p']->value->address, ENT_QUOTES, 'UTF-8');?>
<br />
				<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['p']->value->city, ENT_QUOTES, 'UTF-8');?>
, <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['p']->value->state, ENT_QUOTES, 'UTF-8');?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['p']->value->zip, ENT_QUOTES, 'UTF-8');?>
</td>
			<td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['p']->value->phone, ENT_QUOTES, 'UTF-8');?>
</td>
		</tr>
	<?php } ?>
</table>



 <div id="pagination">
 	<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['getter']->value->paginationSetMaxLinks(30), ENT_QUOTES, 'UTF-8');?>

 	<div class="pagination-link">
		<!-- Shows the page numbers -->
		<?php $_smarty_tpl->tpl_vars['sliceLinks'] = new Smarty_variable($_smarty_tpl->tpl_vars['getter']->value->paginationGetSliceLinks(2,2), null, 0);?>
		<?php if (count($_smarty_tpl->tpl_vars['sliceLinks']->value)>0){?>
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
		<?php }?>
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
 </div><?php }} ?>