{jQueryReady}
var why = "";
{if $feedback->wasWarning()}
{foreach from=$feedback->getVals("warning") item="msg"}
	why += "- {$msg}\n"; {* #nofilter *}
{/foreach}
{/if}
{if $feedback->wasError()}
{foreach from=$feedback->getVals("error") item="msg"}
	why += "- {$msg}\n"; {* #nofilter *}
{/foreach}
{/if}
{if $feedback->wasConf()}
{foreach from=$feedback->getVals("conf") item="msg"}
	why += "- {$msg}\n"; {* #nofilter *}
{/foreach}
{/if}
if (why != "") {
	jAlert(why, "Attention Required");
}
{/jQueryReady}
{$feedback->clear()}