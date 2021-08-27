<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Models\MenuItem;

class RouterosBrandingPackagesBreadTypeAdded extends Seeder
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

            $dataType = DataType::where('name', 'routeros_branding_packages')->first();

            if (is_bread_translatable($dataType)) {
                $dataType->deleteAttributeTranslations($dataType->getTranslatableAttributes());
            }

            if ($dataType) {
                DataType::where('name', 'routeros_branding_packages')->delete();
            }

            \DB::table('data_types')->insert(array (
                'id' => 10,
                'name' => 'routeros_branding_packages',
                'slug' => 'routeros-branding-packages',
                'display_name_singular' => 'RouterOS Branding Package',
                'display_name_plural' => 'RouterOS Branding Packages',
                'icon' => 'voyager-paint-bucket',
                'model_name' => 'App\\RouterosBrandingPackage',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
                'created_at' => '2021-08-23 21:50:49',
                'updated_at' => '2021-08-27 00:01:50',
            ));

            
            

            Voyager::model('Permission')->generateFor('routeros_branding_packages');

            $menu = Menu::where('name', config('voyager.bread.default_menu'))->firstOrFail();

            $menuItem = MenuItem::firstOrNew([
                'menu_id' => $menu->id,
                'title' => 'RouterOS Branding Packages',
                'url' => '',
                'route' => 'voyager.routeros-branding-packages.index',
            ]);

            $order = Voyager::model('MenuItem')->highestOrderMenuItem();

            if (!$menuItem->exists) {
                $menuItem->fill([
                    'target' => '_self',
                    'icon_class' => 'voyager-paint-bucket',
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
