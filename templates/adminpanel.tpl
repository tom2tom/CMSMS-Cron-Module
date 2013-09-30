<h3>{$title_section}</h3>
{if $periods|count > 0}
<table cellspacing="0" class="pagetable">
	<thead>
		<tr>
			<th width="150">{$period}</th>
			<th>{$last_execution}</th>
			<th class="pageicon"></th>
		</tr>
	</thead>
	<tbody>
{foreach from=$periods item=entry}
    <tr class="{$entry->rowclass}" onmouseover="this.className='{$entry->rowclass}hover';" onmouseout="this.className='{$entry->rowclass}';">
      <td>{$entry->name}</td>
      <td>{$entry->last}</td>
      <td>{*$entry->details_link*}</td>
    </tr>
{/foreach}
	</tbody>
</table>
{/if}