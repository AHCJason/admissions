{setTitle title="ADC Report"}
{include file="patient/export_icons.tpl"}

<h1 class="text-center">Average Daily Census Report<br /><span class="text-16">for {$facility->name}</h1>
{include file="report/index.tpl"}

<table id="report-table" cellpadding="5" cellspacing="0">
	<tr class="report-total">
		<th>{$view|ucfirst}</th>
		<th># of Admissions</th>
		<th># of Discharges</th>
		<th>Average Daily Census</th>
	</tr>
	{foreach $adc_info as $adc}
	<tr>
		<td>{$adc->time_period}</td>
		<td>{$adc->admissions_count}</td>
		<td>{$adc->discharge_count}</td>
		<td>&nbsp;</td>
	</tr>
	{/foreach}
</table>
