{jQueryReady}

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


{/jQueryReady}

<h1 class="text-center">Manage Physicians &amp; Surgeons</h1>

<div class="left">
	<a href="{$SITE_URL}/?page=physician&action=add" class="button">New Physician/Surgeon</a>
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
	{foreach $physicians as $p}
		<tr bgcolor="{cycle values="#d0e2f0,#ffffff"}">
			<td><a href="{$SITE_URL}/?page=physician&amp;action=edit&amp;physician={$p->pubid}">{$p->last_name}, {$p->first_name}</a></td>
			<td>{$p->address}<br />
				{$p->city}, {$p->state} {$p->zip}</td>
			<td>{$p->phone}</td>
		</tr>
	{/foreach}
</table>



 <div id="pagination">
 	{$getter->paginationSetMaxLinks(30)}
 	<div class="pagination-link">
		<!-- Shows the page numbers -->
		{$sliceLinks = $getter->paginationGetSliceLinks(2, 2)}
		{if count($sliceLinks) > 0}
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
		{/if}
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
