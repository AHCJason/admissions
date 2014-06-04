{setTitle title="Manage Pharmacies"}
{jQueryReady}

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


{/jQueryReady}

<h1 class="text-center">Manage Pharmacies</h1>

<div class="left">
	<a href="{$SITE_URL}/?page=pharmacy&action=add" class="button">New Pharmacy</a>
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
	{foreach $pharmacies as $pharmacy}
		<tr bgcolor="{cycle values="#d0e2f0,#ffffff"}">
			<td><a href="{$SITE_URL}/?page=pharmacy&amp;action=edit&amp;pharmacy={$pharmacy->pubid}">{$pharmacy->name}</a></td>
			<td>{$pharmacy->address}<br />
				{$pharmacy->city}, {$pharmacy->state} {$pharmacy->zip}</td>
			<td>{$pharmacy->phone}</td>
			<td>{$pharmacy->fax}</td>
		</tr>
	{/foreach}
</table>


{$sliceLinks = $getter->paginationGetSliceLinks(2, 2)}
{if count($sliceLinks) > 1}

	<div id="pagination">
 		{$getter->paginationSetMaxLinks(30)}
 		<div class="pagination-link">
		<!-- Shows the page numbers -->
			{foreach $sliceLinks as $chunk}
				{foreach $chunk as $slice}
					{if $slice == $getter->paginationGetSlice()}
						<td class="current">
							{$slice}&nbsp;&nbsp;|&nbsp;
						</td>
					{else}
						<td>
							<a href="{$getter->paginationGetURL($slice)}">{$slice}</a>&nbsp;&nbsp;|&nbsp;
						</td>
					{/if}
					{if $slice@last == true && $chunk@last != true}<td class="ellipsis"> ...</td>{/if}
				{/foreach}
			{/foreach}
		</div>

		<div class="pagination-link">
			 <!-- Shows the next and previous links -->
			 <a href="{$getter->paginationGetURL($getter->paginationPrevSlice())}" class="floatleft pagination-link" rel="previous">Previous</a>
			 &nbsp;&nbsp;
			 <a href="{$getter->paginationGetURL($getter->paginationNextSlice())}" rel="next">Next</a>
		</div>

		<div class="pagination-link">		
		 <!-- prints X of Y, where X is current page and Y is number of pages -->
		 Page {$getter->paginationGetSlice()} of {$getter->paginationNumSlices()}
		 </div>

	</div>
{/if}