<?php

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;

class DotfilesInstall extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'dotfiles:install';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Installs all the dotfiles';

    protected $availableConfigurationFiles = [
        'kitty',
        'nano',
        'zsh'
    ];

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $menu = $this->menu('Dotfiles installer')
            ->addOption('everything', 'Install everything')
            ->setWidth($this->menu()->getTerminal()->getWidth());

        foreach ($this->availableConfigurationFiles as $availableConfigurationFile) {
            $menu->addOption($availableConfigurationFile, "Install configuration files for $availableConfigurationFile");
        }

        $result = $menu->open();
    }

    /**
     * Define the command's schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    public function schedule(Schedule $schedule): void
    {
        // $schedule->command(static::class)->everyMinute();
    }
}
