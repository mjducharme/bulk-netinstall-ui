<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Models\MenuItem;

class RouterosDefaultConfigurationsBreadTypeAdded extends Seeder
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

            $dataType = DataType::where('name', 'routeros_default_configurations')->first();

            if (is_bread_translatable($dataType)) {
                $dataType->deleteAttributeTranslations($dataType->getTranslatableAttributes());
            }

            if ($dataType) {
                DataType::where('name', 'routeros_default_configurations')->delete();
            }

            \DB::table('data_types')->insert(array (
                'id' => 11,
                'name' => 'routeros_default_configurations',
                'slug' => 'routeros-default-configurations',
                'display_name_singular' => 'RouterOS Default Configuration',
                'display_name_plural' => 'RouterOS Default Configurations',
                'icon' => 'voyager-edit',
                'model_name' => 'App\\RouterosDefaultConfiguration',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
                'created_at' => '2021-08-23 22:11:26',
                'updated_at' => '2021-08-27 00:01:57',
            ));

            
            

            Voyager::model('Permission')->generateFor('routeros_default_configurations');

            $menu = Menu::where('name', config('voyager.bread.default_menu'))->firstOrFail();

            $menuItem = MenuItem::firstOrNew([
                'menu_id' => $menu->id,
                'title' => 'RouterOS Default Configurations',
                'url' => '',
                'route' => 'voyager.routeros-default-configurations.index',
            ]);

            $order = Voyager::model('MenuItem')->highestOrderMenuItem();

            if (!$menuItem->exists) {
                $menuItem->fill([
                    'target' => '_self',
                    'icon_class' => 'voyager-edit',
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
