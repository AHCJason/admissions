<?php /* Smarty version Smarty-3.1.13, created on 2014-03-26 14:43:50
         compiled from "/var/www/admit_app/admissions/protected/tpl/report/admission.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6040365315332f0a57d5986-97314658%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6477d0a769f350e28d84b60ca3398f58bef7ff9d' => 
    array (
      0 => '/var/www/admit_app/admissions/protected/tpl/report/admission.tpl',
      1 => 1395865174,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6040365315332f0a57d5986-97314658',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5332f0a59af6f0_68165756',
  'variables' => 
  array (
    'facility' => 0,
    'orderByOpts' => 0,
    'k' => 0,
    'orderby' => 0,
    'v' => 0,
    'filterByOpts' => 0,
    'filterby' => 0,
    'summary' => 0,
    'summaryReport' => 0,
    'SITE_URL' => 0,
    'type' => 0,
    'dateStart' => 0,
    'dateEnd' => 0,
    'r' => 0,
    'countTotalAdmits' => 0,
    'admits' => 0,
    'filterData' => 0,
    'd' => 0,
    'viewby' => 0,
    'totalAdmitsByView' => 0,
    'admitPercentage' => 0,
    'a' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5332f0a59af6f0_68165756')) {function content_5332f0a59af6f0_68165756($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_capitalize')) include '/var/www/admit_app/cms2/protected/lib/contrib/Smarty-3.1.13/libs/plugins/modifier.capitalize.php';
if (!is_callable('smarty_function_cycle')) include '/var/www/admit_app/cms2/protected/lib/contrib/Smarty-3.1.13/libs/plugins/function.cycle.php';
if (!is_callable('smarty_modifier_date_format')) include '/var/www/admit_app/cms2/protected/lib/contrib/Smarty-3.1.13/libs/plugins/modifier.date_format.php';
if (!is_callable('smarty_modifier_replace')) include '/var/www/admit_app/cms2/protected/lib/contrib/Smarty-3.1.13/libs/plugins/modifier.replace.php';
?><?php echo smarty_set_title(array('title'=>"AHC Reports"),$_smarty_tpl);?>

<?php echo $_smarty_tpl->getSubTemplate ("patient/patient_search.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("patient/export_icons.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<h1 class="text-center">Admission Report<br /><span class="text-16">for <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['facility']->value->name, ENT_QUOTES, 'UTF-8');?>
</span></h1>
<?php echo $_smarty_tpl->getSubTemplate ("report/index.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	
<!--
<div class="sort-right">
	<strong>Order by:</strong>
	<select id="orderby">
		<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['orderByOpts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
			<option value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['k']->value, ENT_QUOTES, 'UTF-8');?>
"<?php if ($_smarty_tpl->tpl_vars['orderby']->value==$_smarty_tpl->tpl_vars['k']->value){?> selected<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['v']->value, ENT_QUOTES, 'UTF-8');?>
</option>
		<?php } ?>
	</select>
</div>
-->

<div class="sort-left">
	<strong>Filter by:</strong>
	<select id="filterby">
		<option value="">Select an option...</option>
		<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['filterByOpts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
			<option value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['k']->value, ENT_QUOTES, 'UTF-8');?>
"<?php if ($_smarty_tpl->tpl_vars['filterby']->value==$_smarty_tpl->tpl_vars['k']->value){?> selected<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['v']->value, ENT_QUOTES, 'UTF-8');?>
</option>
		<?php } ?>
	</select>
</div>


<?php if ($_smarty_tpl->tpl_vars['summary']->value==1){?>
	<div class="sort-right" id="normal-view"><a>Return to Normal View</a></div>
	
		
	<table id="summary-table" cellpadding="5" cell-spacing="0">
			<tr>
				<th><?php if ($_smarty_tpl->tpl_vars['filterby']->value=="ortho"){?>Surgeon/Specialist <?php }elseif($_smarty_tpl->tpl_vars['filterby']->value=="case_manager"){?>Case Manager <?php }else{ ?><?php echo htmlspecialchars(smarty_modifier_capitalize($_smarty_tpl->tpl_vars['filterby']->value), ENT_QUOTES, 'UTF-8');?>
 <?php }?> Name</th>
				<th>Number of <br />Admissions</th>
				<th>% of <br />Total Admissions</th>
			</tr>
			<?php  $_smarty_tpl->tpl_vars['r'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['summaryReport']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['r']->key => $_smarty_tpl->tpl_vars['r']->value){
$_smarty_tpl->tpl_vars['r']->_loop = true;
?>
				<tr bgcolor="<?php echo smarty_function_cycle(array('values'=>"#d0e2f0,#ffffff"),$_smarty_tpl);?>
">
					<td style="text-align: left;"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SITE_URL']->value, ENT_QUOTES, 'UTF-8');?>
/?page=report&action=admission&facility=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['facility']->value->pubid, ENT_QUOTES, 'UTF-8');?>
&type=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['type']->value, ENT_QUOTES, 'UTF-8');?>
&start_date=<?php echo htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['dateStart']->value,"%m/%d/%Y"), ENT_QUOTES, 'UTF-8');?>
&end_date=<?php echo htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['dateEnd']->value,"%m/%d/%Y"), ENT_QUOTES, 'UTF-8');?>
&orderby=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['orderby']->value, ENT_QUOTES, 'UTF-8');?>
&filterby=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['filterby']->value, ENT_QUOTES, 'UTF-8');?>
&viewby=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['r']->value['id'], ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['r']->value['name'], ENT_QUOTES, 'UTF-8');?>
</a></td>
					<td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['r']->value['numberOfAdmits'], ENT_QUOTES, 'UTF-8');?>
</td>
					<td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['r']->value['percentageOfAdmits'], ENT_QUOTES, 'UTF-8');?>
%</td>
				</tr>
			<?php } ?>
			<tr>
				<td><strong>TOTAL ADMISSIONS</strong></td>
				<td><strong><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['countTotalAdmits']->value, ENT_QUOTES, 'UTF-8');?>
</strong></td>
				<td></td>

			</tr>
		</table>
<?php }else{ ?>
	
<?php if ($_smarty_tpl->tpl_vars['filterby']->value==''){?>
	<div class="sort-left-phrase">There were <strong><?php echo htmlspecialchars(count($_smarty_tpl->tpl_vars['admits']->value), ENT_QUOTES, 'UTF-8');?>
</strong> total admissions for the selected time period.</div>
<?php }else{ ?>
	<div id="view-by">
		<strong>View by:</strong>
		<select id="viewby">
			<option value="">Select...</option>	
			<?php if ($_smarty_tpl->tpl_vars['filterby']->value=='hospital'){?>	
				<?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['d']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['filterData']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
$_smarty_tpl->tpl_vars['d']->_loop = true;
?>
					<option value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['d']->value->id, ENT_QUOTES, 'UTF-8');?>
"<?php if ($_smarty_tpl->tpl_vars['viewby']->value==$_smarty_tpl->tpl_vars['d']->value->id){?> selected<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['d']->value->name, ENT_QUOTES, 'UTF-8');?>
</option>
				<?php } ?>
			<?php }else{ ?>
				<?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['d']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['filterData']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
$_smarty_tpl->tpl_vars['d']->_loop = true;
?>
					<option value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['d']->value->id, ENT_QUOTES, 'UTF-8');?>
"<?php if ($_smarty_tpl->tpl_vars['viewby']->value==$_smarty_tpl->tpl_vars['d']->value->id){?> selected<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['d']->value->last_name, ENT_QUOTES, 'UTF-8');?>
, <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['d']->value->first_name, ENT_QUOTES, 'UTF-8');?>
</option>
				<?php } ?>
			<?php }?>
		</select>
	</div>
		
	<?php if (($_smarty_tpl->tpl_vars['summary']->value!=1)){?>
		<div id="view-totals"> &nbsp;or <a href="/?page=report&action=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['type']->value, ENT_QUOTES, 'UTF-8');?>
&facility=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['facility']->value->pubid, ENT_QUOTES, 'UTF-8');?>
&start_date=<?php echo htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['dateStart']->value,'%Y-%m-%d'), ENT_QUOTES, 'UTF-8');?>
&end_date=<?php echo htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['dateEnd']->value,'%Y-%m-%d'), ENT_QUOTES, 'UTF-8');?>
&orderby=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['orderby']->value, ENT_QUOTES, 'UTF-8');?>
&filterby=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['filterby']->value, ENT_QUOTES, 'UTF-8');?>
&summary=1" class="">View summary of all <?php if ($_smarty_tpl->tpl_vars['filterby']->value=='ortho'){?>surgeons<?php }else{ ?><?php echo htmlspecialchars(smarty_modifier_replace($_smarty_tpl->tpl_vars['filterby']->value,'_',' '), ENT_QUOTES, 'UTF-8');?>
s<?php }?></a></div><?php }?>
	<?php }?>

	<?php if ($_smarty_tpl->tpl_vars['viewby']->value!=''){?>
		<div class="sort-left-phrase"><?php if ($_smarty_tpl->tpl_vars['filterby']->value=='hospital'){?>Sent <?php }else{ ?>Attended <?php }?>a total of <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['totalAdmitsByView']->value, ENT_QUOTES, 'UTF-8');?>
 (<strong><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['admitPercentage']->value, ENT_QUOTES, 'UTF-8');?>
%</strong>) of the <strong><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['countTotalAdmits']->value, ENT_QUOTES, 'UTF-8');?>
</strong> total admits during the selected time period.</div>
	<?php }?>

<br />
<br />



		<table id="report-table" cellpadding="5" cellspacing="0">
			<tr>
				<th>Room #</th>
				<th>Patient Name</th>
				<th>Admit Date</th>
				<th width="150px">Hospital</th>
				<th>Attending Physician</th>
				<th>Specialist/Surgeon</th>
				<th>Case Manager</th>
			</tr>	
						
			<?php  $_smarty_tpl->tpl_vars['a'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['a']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['admits']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['a']->key => $_smarty_tpl->tpl_vars['a']->value){
$_smarty_tpl->tpl_vars['a']->_loop = true;
?>
			<tr class="text-left" bgcolor="<?php echo smarty_function_cycle(array('values'=>"#d0e2f0,#ffffff"),$_smarty_tpl);?>
">
				<td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['a']->value->number, ENT_QUOTES, 'UTF-8');?>
</td>
				<td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['a']->value->last_name, ENT_QUOTES, 'UTF-8');?>
, <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['a']->value->first_name, ENT_QUOTES, 'UTF-8');?>
</td>
				<td><?php echo htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['a']->value->datetime_admit,"%m/%d/%Y"), ENT_QUOTES, 'UTF-8');?>
</td>
				<td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['a']->value->hospital_name, ENT_QUOTES, 'UTF-8');?>
</td>
				<td><?php if ($_smarty_tpl->tpl_vars['a']->value->physician_last!=''){?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['a']->value->physician_last, ENT_QUOTES, 'UTF-8');?>
, <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['a']->value->physician_first, ENT_QUOTES, 'UTF-8');?>
 M.D.<?php }else{ ?></td><?php }?></td>
				<td><?php if ($_smarty_tpl->tpl_vars['a']->value->surgeon_last!=''){?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['a']->value->surgeon_last, ENT_QUOTES, 'UTF-8');?>
, <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['a']->value->surgeon_first, ENT_QUOTES, 'UTF-8');?>
 M.D.<?php }else{ ?></td><?php }?></td>
	
				<td><?php if ($_smarty_tpl->tpl_vars['a']->value->cm_last!=''){?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['a']->value->cm_last, ENT_QUOTES, 'UTF-8');?>
, <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['a']->value->cm_first, ENT_QUOTES, 'UTF-8');?>
<?php }else{ ?></td><?php }?></td>
			</tr>
					
			<?php } ?>
		</table>
<?php }?><?php }} ?>