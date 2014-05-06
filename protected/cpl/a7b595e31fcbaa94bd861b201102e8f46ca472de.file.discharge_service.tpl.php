<?php /* Smarty version Smarty-3.1.13, created on 2014-03-26 10:35:24
         compiled from "/var/www/admit_app/admissions/protected/tpl/report/discharge_service.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1242760578533301ccbeed02-18482325%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a7b595e31fcbaa94bd861b201102e8f46ca472de' => 
    array (
      0 => '/var/www/admit_app/admissions/protected/tpl/report/discharge_service.tpl',
      1 => 1395702646,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1242760578533301ccbeed02-18482325',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'view' => 0,
    'k' => 0,
    'd' => 0,
    'SITE_URL' => 0,
    'facility' => 0,
    'year' => 0,
    'i' => 0,
    'totalDischarges' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_533301ccd55aa6_07708345',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_533301ccd55aa6_07708345')) {function content_533301ccd55aa6_07708345($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/admit_app/cms2/protected/lib/contrib/Smarty-3.1.13/libs/plugins/modifier.date_format.php';
?><?php echo smarty_set_title(array('title'=>"Discharge Service Report"),$_smarty_tpl);?>

<?php echo $_smarty_tpl->getSubTemplate ("patient/export_icons.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<br />
<h1 class="text-center">Discharge Service Disposition Report</h1>
<?php echo $_smarty_tpl->getSubTemplate ("report/index.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<table cellpadding="5">
	<tr>
		<td>&nbsp;</td>
		<th>Service Type</th>
		<th>Number of Discharges</th>
		<th>Percentage of Discharges</th>
		<th>Home Health Referral Percentage</th>
	</tr>
	<?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['d']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
$_smarty_tpl->tpl_vars['d']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['d']->key;
?>
		<tr>
			<td rowspan="6" style="text-align: center; vertical-align: top; padding-top: 5px;">
				<?php if ($_smarty_tpl->tpl_vars['view']->value=="year"){?>
					<h2><?php echo htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['k']->value,"%Y"), ENT_QUOTES, 'UTF-8');?>
</h2>
				<?php }else{ ?>
					<h2><?php echo htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['k']->value,"%b %Y"), ENT_QUOTES, 'UTF-8');?>
</h2>
				<?php }?>
			</td>
		</tr>
		

		<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['d']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
$_smarty_tpl->tpl_vars['i']->_loop = true;
?>
		<?php $_smarty_tpl->tpl_vars['obj'] = new Smarty_variable(CMS_Schedule::generate(), null, 0);?>
			<tr>
				<td><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SITE_URL']->value, ENT_QUOTES, 'UTF-8');?>
/?page=report&action=discharge_service_details&facility=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['facility']->value->pubid, ENT_QUOTES, 'UTF-8');?>
&view=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['view']->value, ENT_QUOTES, 'UTF-8');?>
&year=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['year']->value, ENT_QUOTES, 'UTF-8');?>
&date_start=<?php echo htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['k']->value,"%Y-%m-%d"), ENT_QUOTES, 'UTF-8');?>
&type=ahc_home_health">AHC Home Health</td>
				<td align="center"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['i']->value->AhcHomeHealth, ENT_QUOTES, 'UTF-8');?>
</td>			
				<td align="center"><?php echo htmlspecialchars(number_format((($_smarty_tpl->tpl_vars['i']->value->AhcHomeHealth/$_smarty_tpl->tpl_vars['i']->value->discharges)*100),2), ENT_QUOTES, 'UTF-8');?>
%</td>
				<td align="center"><?php echo htmlspecialchars(number_format(($_smarty_tpl->tpl_vars['i']->value->AhcHomeHealth/($_smarty_tpl->tpl_vars['i']->value->AhcHomeHealth+$_smarty_tpl->tpl_vars['i']->value->OtherHomeHealth+$_smarty_tpl->tpl_vars['i']->value->OutpatientTherapy)*100),2), ENT_QUOTES, 'UTF-8');?>
%</td>
			</tr>
			
			
			<?php if ($_smarty_tpl->tpl_vars['i']->value->OtherHomeHealth!=0){?>
			<tr>
				<td><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SITE_URL']->value, ENT_QUOTES, 'UTF-8');?>
/?page=report&action=other_home_health_details&facility=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['facility']->value->pubid, ENT_QUOTES, 'UTF-8');?>
&view=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['view']->value, ENT_QUOTES, 'UTF-8');?>
&year=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['year']->value, ENT_QUOTES, 'UTF-8');?>
&date_start=<?php echo htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['k']->value,"%Y-%m-%d"), ENT_QUOTES, 'UTF-8');?>
&type=other_home_health">Other Home Health</td>
				<td align="center"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['i']->value->OtherHomeHealth, ENT_QUOTES, 'UTF-8');?>
</td>			
				<td align="center"><?php echo htmlspecialchars(number_format((($_smarty_tpl->tpl_vars['i']->value->OtherHomeHealth/$_smarty_tpl->tpl_vars['i']->value->discharges)*100),2), ENT_QUOTES, 'UTF-8');?>
%</td>
				<td align="center"><?php echo htmlspecialchars(number_format(($_smarty_tpl->tpl_vars['i']->value->OtherHomeHealth/($_smarty_tpl->tpl_vars['i']->value->AhcHomeHealth+$_smarty_tpl->tpl_vars['i']->value->OtherHomeHealth+$_smarty_tpl->tpl_vars['i']->value->OutpatientTherapy)*100),2), ENT_QUOTES, 'UTF-8');?>
%</td>
			</tr>
			<?php }?>
			
			
			<?php if ($_smarty_tpl->tpl_vars['i']->value->OutpatientTherapy!=0){?>
			<tr>
				<td><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SITE_URL']->value, ENT_QUOTES, 'UTF-8');?>
/?page=report&action=discharge_service_details&facility=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['facility']->value->pubid, ENT_QUOTES, 'UTF-8');?>
&view=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['view']->value, ENT_QUOTES, 'UTF-8');?>
&year=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['year']->value, ENT_QUOTES, 'UTF-8');?>
&date_start=<?php echo htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['k']->value,"%Y-%m-%d"), ENT_QUOTES, 'UTF-8');?>
&type=outpatient_therapy">Outpatient Therapy</td>
				<td align="center"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['i']->value->OutpatientTherapy, ENT_QUOTES, 'UTF-8');?>
</td>			
				<td align="center"><?php echo htmlspecialchars(number_format((($_smarty_tpl->tpl_vars['i']->value->OutpatientTherapy/$_smarty_tpl->tpl_vars['i']->value->discharges)*100),2), ENT_QUOTES, 'UTF-8');?>
%</td>
				<td align="center"><?php echo htmlspecialchars(number_format(($_smarty_tpl->tpl_vars['i']->value->OutpatientTherapy/($_smarty_tpl->tpl_vars['i']->value->AhcHomeHealth+$_smarty_tpl->tpl_vars['i']->value->OtherHomeHealth+$_smarty_tpl->tpl_vars['i']->value->OutpatientTherapy)*100),2), ENT_QUOTES, 'UTF-8');?>
%</td>
			</tr>
			<?php }?>
			
			<?php if ($_smarty_tpl->tpl_vars['i']->value->NoServices!=0){?>
			<tr>
				<td><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SITE_URL']->value, ENT_QUOTES, 'UTF-8');?>
/?page=report&action=discharge_service_details&facility=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['facility']->value->pubid, ENT_QUOTES, 'UTF-8');?>
&view=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['view']->value, ENT_QUOTES, 'UTF-8');?>
&year=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['year']->value, ENT_QUOTES, 'UTF-8');?>
&date_start=<?php echo htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['k']->value,"%Y-%m-%d"), ENT_QUOTES, 'UTF-8');?>
&type=declined_services">Declined Services</td>
				<td align="center"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['i']->value->NoServices, ENT_QUOTES, 'UTF-8');?>
</td>			
				<td align="center"><?php echo htmlspecialchars(number_format((($_smarty_tpl->tpl_vars['i']->value->NoServices/$_smarty_tpl->tpl_vars['i']->value->discharges)*100),2), ENT_QUOTES, 'UTF-8');?>
%</td>
				<td align="center">&ndash;</td>
			</tr>
			<?php }?>
			
			<tr>
				<td style="padding-top: 8px"><strong>Total</strong></td>
				<td style="padding-top: 8px" align="center"><strong><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['i']->value->discharges, ENT_QUOTES, 'UTF-8');?>
</strong></td>
				<td align="center">&ndash;</td>
				<td align="center">&ndash;</td>
			</tr>
			<?php $_smarty_tpl->createLocalArrayVariable('totalDischarges', null, 0);
$_smarty_tpl->tpl_vars['totalDischarges']->value[] = $_smarty_tpl->tpl_vars['i']->value->discharges;?>
		<?php } ?>
		<tr>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
		</tr>
	<?php } ?>
	<tr>
		<td>&nbsp;</td>
		<td><strong>Total # of Discharges:</strong></td>
		<td align="center"><strong><?php echo htmlspecialchars(array_sum($_smarty_tpl->tpl_vars['totalDischarges']->value), ENT_QUOTES, 'UTF-8');?>
</strong></td>
	</tr>
</table><?php }} ?>