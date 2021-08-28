<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Traits\Seedable;

class VoyagerDeploymentOrchestratorSeeder extends Seeder
{
    use Seedable;

    protected $seedersPath = 'database/breads/seeds/';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->seed(NetinstallInterfacesBreadTypeAdded::class);
        $this->seed(NetinstallInterfacesBreadRowAdded::class);
        $this->seed(RouterosArchitecturesBreadTypeAdded::class);
        $this->seed(RouterosArchitecturesBreadRowAdded::class);
        $this->seed(RouterosBrandingPackagesBreadTypeAdded::class);
        $this->seed(RouterosBrandingPackagesBreadRowAdded::class);
        $this->seed(RouterosDefaultConfigurationsBreadTypeAdded::class);
        $this->seed(RouterosDefaultConfigurationsBreadRowAdded::class);
        $this->seed(RouterosMainPackagesBreadTypeAdded::class);
        $this->seed(RouterosMainPackagesBreadRowAdded::class);
        $this->seed(RouterosTemplatesBreadTypeAdded::class);
        $this->seed(RouterosTemplatesBreadRowAdded::class);
        $this->seed(RouterosVersionsBreadTypeAdded::class);
        $this->seed(RouterosVersionsBreadRowAdded::class);
        $this->seed(RouterosAddonPackagesBreadTypeAdded::class);
        $this->seed(RouterosAddonPackagesBreadRowAdded::class);
    }
}
