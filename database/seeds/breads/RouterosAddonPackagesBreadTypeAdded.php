<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Models\MenuItem;

class RouterosAddonPackagesBreadTypeAdded extends Seeder
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

            $dataType = DataType::where('name', 'routeros_addon_packages')->first();

            if (is_bread_translatable($dataType)) {
                $dataType->deleteAttributeTranslations($dataType->getTranslatableAttributes());
            }

            if ($dataType) {
                DataType::where('name', 'routeros_addon_packages')->delete();
            }

            \DB::table('data_types')->insert(array (
                'id' => 9,
                'name' => 'routeros_addon_packages',
                'slug' => 'routeros-addon-packages',
                'display_name_singular' => 'RouterOS Add-on Package',
                'display_name_plural' => 'RouterOS Add-on Packages',
                'icon' => 'voyager-puzzle',
                'model_name' => 'App\\Models\\RouterosAddonPackage',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
                'created_at' => '2021-08-23 21:35:29',
                'updated_at' => '2021-08-28 01:06:21',
            ));

            
            

            Voyager::model('Permission')->generateFor('routeros_addon_packages');

            $menu = Menu::where('name', config('voyager.bread.default_menu'))->firstOrFail();

            $menuItem = MenuItem::firstOrNew([
                'menu_id' => $menu->id,
                'title' => 'RouterOS Add-on Packages',
                'url' => '',
                'route' => 'voyager.routeros-addon-packages.index',
            ]);

            $order = Voyager::model('MenuItem')->highestOrderMenuItem();

            if (!$menuItem->exists) {
                $menuItem->fill([
                    'target' => '_self',
                    'icon_class' => 'voyager-puzzle',
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
