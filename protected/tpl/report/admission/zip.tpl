{setTitle title="Zip Code | Admission Report"}
{include file="patient/export_icons.tpl"}

<h1 class="text-center">Admission Report by Zip Code<br /><span class="text-16">for {$facility->name}</span></h1>
{include file="report/index.tpl"}

<div class="sort-left">
	<strong>Filter by:</strong>
	<select id="filterby">
		<option value="">Select an option...</option>
		{foreach $filterByOpts as $k => $v}
			<option value="{$k}"{if $filterby == $k} selected{/if}>{$v}</option>
		{/foreach}
	</select>
</div>

<div class="sort-right" id="normal-view"><a>Return to Normal View</a></div>

	
<table id="summary-table" cellpadding="5" cell-spacing="0">
	<tr>
		<th>Number of Admissions</th>
		<th>Zip Code</th>
		<th>% of <br />Total Admissions</th>
	</tr>
	{foreach $filterData as $d}
		<tr bgcolor="{cycle values="#d0e2f0,#ffffff"}">
			<td style="text-align: left;">{$d->count}</td>
			<td>{$d->zip}</td>
			<td>{round($d->count/$countTotalAdmits, 2)*100}%</td>
		</tr>
	{/foreach}
	<tr>
		<td><strong>TOTAL ADMISSIONS</strong></td>
		<td>&nbsp;</td>
		<td><strong>{$countTotalAdmits}</strong></td>

	</tr>
</table>
