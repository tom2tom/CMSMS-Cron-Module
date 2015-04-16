{if $periods|count > 0}
<table class="pagetable">
 <thead><tr>
  <th>{$title_name}</th>
  <th>{$title_sent}</th>
 </tr></thead>
 <tbody>
{foreach from=$periods item=one}
{cycle values="row1,row2" assign='rowclass'}
  <tr class="{$rowclass}" onmouseover="this.className='{$rowclass}hover';" onmouseout="this.className='{$rowclass}';">
   <td>{$one->name}</td>
   <td>{$one->last}</td>
  </tr>
{/foreach}
 </tbody>
</table>
<br /><br />
{$startform}
<p class="pageinput">{$runcron}</p>
{$endform}
{/if}
