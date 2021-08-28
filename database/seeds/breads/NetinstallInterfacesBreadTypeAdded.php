<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Models\MenuItem;

class NetinstallInterfacesBreadTypeAdded extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     *
     * @throws Exception
     */
    public function run()
    {
        try {
            \DB::beginTransaction();

            $dataType = DataType::where('name', 'netinstall_interfaces')->first();

            if (is_bread_translatable($dataType)) {
                $dataType->deleteAttributeTranslations($dataType->getTranslatableAttributes());
            }

            if ($dataType) {
                DataType::where('name', 'netinstall_interfaces')->delete();
            }

            \DB::table('data_types')->insert(array (
                'id' => 13,
                'name' => 'netinstall_interfaces',
                'slug' => 'netinstall-interfaces',
                'display_name_singular' => 'NetInstall Interface',
                'display_name_plural' => 'NetInstall Interfaces',
                'icon' => 'voyager-tag',
                'model_name' => 'App\\Models\\NetinstallInterface',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":"order","order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
                'created_at' => '2021-08-26 18:03:35',
                'updated_at' => '2021-08-28 01:05:20',
            ));

            
            

            Voyager::model('Permission')->generateFor('netinstall_interfaces');

            $menu = Menu::where('name', config('voyager.bread.default_menu'))->firstOrFail();

            $menuItem = MenuItem::firstOrNew([
                'menu_id' => $menu->id,
                'title' => 'NetInstall Interfaces',
                'url' => '',
                'route' => 'voyager.netinstall-interfaces.index',
            ]);

            $order = Voyager::model('MenuItem')->highestOrderMenuItem();

            if (!$menuItem->exists) {
                $menuItem->fill([
                    'target' => '_self',
                    'icon_class' => 'voyager-tag',
                    'color' => null,
                    'parent_id' => null,
                    'order' => $order,
                ])->save();
            }
        } catch(Exception $e) {
           throw new Exception('Exception occur ' . $e);

           \DB::rollBack();
        }

        \DB::commit();
    }
}
