<table class="pagetable" style="margin-left:5%;width:auto;table-layout:auto;">
 <thead><tr>
  <th><strong>{$title_name}</strong></th>
  <th><strong>{$title_sent}</strong></th>
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
{if !empty($startform) && $periods|count > 0}<br /><br />
{$startform}
<p class="pageinput">{$runcron} {$forcecron}</p>
{$endform}{/if}
