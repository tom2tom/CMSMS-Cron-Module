<?php
    if (!cmsms()) exit;

    /* -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

       Code for Cron "default" action

       -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

       Typically, this will display something from a template
       or do some other task.

    */

    $periods = $this->getPeriods();

    $this->Audit(0, $this->Lang('friendlyname'), $this->Lang('cron_launched'));

    echo '<p>Execute cron.</p>';

    foreach ($periods as $period => $time) {
        $last = $this->GetPreference('Last' . $period);
        if ($last <= strtotime($time)) {
            $this->SetPreference('Last' . $period, time());
            $this->SendEvent('Cron' . $period, array());
            $this->Audit(0, $this->Lang('friendlyname'), $this->Lang('cron_executed', $period));
            echo '<br />Made ' . $period;
        }
    }

    echo '<p>Cron executed</p>';


?>