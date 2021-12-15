<?php

// Only run scheduled jobs on production
if (!defined('CRAFT_ENVIRONMENT') || CRAFT_ENVIRONMENT !== 'prod') {
    return;
}

/** @var $schedule omnilight\scheduling\Schedule */

$schedule->command('craftnet/licenses/send-reminders')
    ->daily()
    ->withoutOverlapping();

$schedule->command('craftnet/licenses/process-expired-licenses')
    ->daily()
    ->withoutOverlapping();

//$schedule->command('craftnet/payouts/send')
//    ->daily()
//    ->withoutOverlapping();

$schedule->command('craftnet/payouts/update')
    ->everyTenMinutes()
    ->withoutOverlapping()
    ->sendOutputTo('/var/app/current/cron/payouts-update.log');

$schedule->command('craftnet/payouts/test')
    ->everyMinute()
    ->withoutOverlapping();

$schedule->command('craftnet/payouts/update')
    ->everyMinute()
    ->withoutOverlapping()
    ->sendOutputTo('/var/app/current/cron/payouts-update.log');

$schedule->command('craftnet/packages/update-deps --queue')
    ->daily()
    ->withoutOverlapping();

$schedule->command('craftnet/plugins/update-install-counts')
    ->daily()
    ->withoutOverlapping();