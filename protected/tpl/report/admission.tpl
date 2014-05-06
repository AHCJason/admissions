{setTitle title="AHC Reports"}
{include file="patient/patient_search.tpl"}
{include file="patient/export_icons.tpl"}

<h1 class="text-center">Admission Report<br /><span class="text-16">for {$facility->name}</span></h1>
{include file="report/index.tpl"}
	
<!--
<div class="sort-right">
	<strong>Order by:</strong>
	<select id="orderby">
		{foreach $orderByOpts as $k => $v}
			<option value="{$k}"{if $orderby == $k} selected{/if}>{$v}</option>
		{/foreach}
	</select>
</div>
-->

<div class="sort-left">
	<strong>Filter by:</strong>
	<select id="filterby">
		<option value="">Select an option...</option>
		{foreach $filterByOpts as $k => $v}
			<option value="{$k}"{if $filterby == $k} selected{/if}>{$v}</option>
		{/foreach}
	</select>
</div>


{if $summary == 1}
	<div class="sort-right" id="normal-view"><a>Return to Normal View</a></div>
	
		
	<table id="summary-table" cellpadding="5" cell-spacing="0">
			<tr>
				<th>{if $filterby == "ortho"}Surgeon/Specialist {elseif $filterby == "case_manager"}Case Manager {else}{$filterby|capitalize} {/if} Name</th>
				<th>Number of <br />Admissions</th>
				<th>% of <br />Total Admissions</th>
			</tr>
			{foreach $summaryReport as $r}
				<tr bgcolor="{cycle values="#d0e2f0,#ffffff"}">
					<td style="text-align: left;"><a href="{$SITE_URL}/?page=report&action=admission&facility={$facility->pubid}&type={$type}&start_date={$dateStart|date_format: "%m/%d/%Y"}&end_date={$dateEnd|date_format: "%m/%d/%Y"}&orderby={$orderby}&filterby={$filterby}&viewby={$r['id']}">{$r['name']}</a></td>
					<td>{$r['numberOfAdmits']}</td>
					<td>{$r['percentageOfAdmits']}%</td>
				</tr>
			{/foreach}
			<tr>
				<td><strong>TOTAL ADMISSIONS</strong></td>
				<td><strong>{$countTotalAdmits}</strong></td>
				<td></td>

			</tr>
		</table>
{else}
	
{if $filterby == ''}
	<div class="sort-left-phrase">There were <strong>{count($admits)}</strong> total admissions for the selected time period.</div>
{else}
	<div id="view-by">
		<strong>View by:</strong>
		<select id="viewby">
			<option value="">Select...</option>	
			{if $filterby == 'hospital'}	
				{foreach $filterData as $d}
					<option value="{$d->id}"{if $viewby == $d->id} selected{/if}>{$d->name}</option>
				{/foreach}
			{else}
				{foreach $filterData as $d}
					<option value="{$d->id}"{if $viewby == $d->id} selected{/if}>{$d->last_name}, {$d->first_name}</option>
				{/foreach}
			{/if}
		</select>
	</div>
		
	{if ($summary != 1)}
		<div id="view-totals"> &nbsp;or <a href="/?page=report&action={$type}&facility={$facility->pubid}&start_date={$dateStart|date_format:'%Y-%m-%d'}&end_date={$dateEnd|date_format:'%Y-%m-%d'}&orderby={$orderby}&filterby={$filterby}&summary=1" class="">View summary of all {if $filterby == 'ortho'}surgeons{else}{$filterby|replace:'_':' '}s{/if}</a></div>{/if}
	{/if}

	{if $viewby != ''}
		<div class="sort-left-phrase">{if $filterby == 'hospital'}Sent {else}Attended {/if}a total of {$totalAdmitsByView} (<strong>{$admitPercentage}%</strong>) of the <strong>{$countTotalAdmits}</strong> total admits during the selected time period.</div>
	{/if}

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
						
			{foreach $admits as $a}
			<tr class="text-left" bgcolor="{cycle values="#d0e2f0,#ffffff"}">
				<td>{$a->number}</td>
				<td>{$a->last_name}, {$a->first_name}</td>
				<td>{$a->datetime_admit|date_format:"%m/%d/%Y"}</td>
				<td>{$a->hospital_name}</td>
				<td>{if $a->physician_last != ''}{$a->physician_last}, {$a->physician_first} M.D.{else}</td>{/if}</td>
				<td>{if $a->surgeon_last != ''}{$a->surgeon_last}, {$a->surgeon_first} M.D.{else}</td>{/if}</td>
	
				<td>{if $a->cm_last != ''}{$a->cm_last}, {$a->cm_first}{else}</td>{/if}</td>
			</tr>
					
			{/foreach}
		</table>
{/if}
