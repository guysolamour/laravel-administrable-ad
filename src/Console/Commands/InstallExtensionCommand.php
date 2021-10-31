<?php

namespace Guysolamour\Administrable\Extensions\Ad\Console\Commands;

use Guysolamour\Administrable\Extensions\Ad\ServiceProvider;
use Guysolamour\Administrable\Console\Extension\BaseExtension;

class InstallExtensionCommand extends BaseExtension
{

    public function run()
    {
        if ($this->checkifExtensionHasBeenInstalled()) {
            $this->triggerError("The [{$this->name}] extension has already been added, remove all generated files and run this command again!");
        }

        $this->loadMigrations();
        $this->loadSeeders();
        $this->loadAssets();
        $this->loadViews();
        $this->runMigrateArtisanCommand();

        $this->displayMessage("{$this->getUcfirstName()} extension added successfully.");
    }

    protected function enableRegisteringFrontUrlInHeader(): bool
    {
        return false;
    }


    protected function getExtensionsStubsBasePath(string $path = '')
    {
        return dirname(ServiceProvider::packagePath(), 2) . DIRECTORY_SEPARATOR . $path;
    }

}
