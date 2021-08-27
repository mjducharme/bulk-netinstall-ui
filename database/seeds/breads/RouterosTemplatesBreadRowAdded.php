<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataType;

class RouterosTemplatesBreadRowAdded extends Seeder
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

            $dataType = DataType::where('name', 'routeros_templates')->first();

            \DB::table('data_rows')->insert(array (
                0 => 
                array (
                    'data_type_id' => $dataType->id,
                    'field' => 'id',
                    'type' => 'text',
                    'display_name' => 'Id',
                    'required' => 1,
                    'browse' => 0,
                    'read' => 0,
                    'edit' => 0,
                    'add' => 0,
                    'delete' => 0,
                    'details' => '{}',
                    'order' => 1,
                ),
                1 => 
                array (
                    'data_type_id' => $dataType->id,
                    'field' => 'description',
                    'type' => 'text',
                    'display_name' => 'Description',
                    'required' => 1,
                    'browse' => 1,
                    'read' => 1,
                    'edit' => 1,
                    'add' => 1,
                    'delete' => 1,
                    'details' => '{}',
                    'order' => 2,
                ),
                2 => 
                array (
                    'data_type_id' => $dataType->id,
                    'field' => 'routeros_main_package_id',
                    'type' => 'text',
                    'display_name' => 'Routeros Main Package Id',
                    'required' => 1,
                    'browse' => 1,
                    'read' => 1,
                    'edit' => 1,
                    'add' => 1,
                    'delete' => 1,
                    'details' => '{}',
                    'order' => 3,
                ),
                3 => 
                array (
                    'data_type_id' => $dataType->id,
                    'field' => 'routeros_branding_package_id',
                    'type' => 'text',
                    'display_name' => 'Routeros Branding Package Id',
                    'required' => 0,
                    'browse' => 1,
                    'read' => 1,
                    'edit' => 1,
                    'add' => 1,
                    'delete' => 1,
                    'details' => '{}',
                    'order' => 4,
                ),
                4 => 
                array (
                    'data_type_id' => $dataType->id,
                    'field' => 'routeros_default_configuration_id',
                    'type' => 'text',
                    'display_name' => 'Routeros Default Configuration Id',
                    'required' => 0,
                    'browse' => 1,
                    'read' => 1,
                    'edit' => 1,
                    'add' => 1,
                    'delete' => 1,
                    'details' => '{}',
                    'order' => 5,
                ),
                5 => 
                array (
                    'data_type_id' => $dataType->id,
                    'field' => 'created_at',
                    'type' => 'timestamp',
                    'display_name' => 'Created At',
                    'required' => 0,
                    'browse' => 1,
                    'read' => 1,
                    'edit' => 1,
                    'add' => 0,
                    'delete' => 1,
                    'details' => '{}',
                    'order' => 6,
                ),
                6 => 
                array (
                    'data_type_id' => $dataType->id,
                    'field' => 'updated_at',
                    'type' => 'timestamp',
                    'display_name' => 'Updated At',
                    'required' => 0,
                    'browse' => 0,
                    'read' => 0,
                    'edit' => 0,
                    'add' => 0,
                    'delete' => 0,
                    'details' => '{}',
                    'order' => 7,
                ),
                7 => 
                array (
                    'data_type_id' => $dataType->id,
                    'field' => 'deleted_at',
                    'type' => 'timestamp',
                    'display_name' => 'Deleted At',
                    'required' => 0,
                    'browse' => 0,
                    'read' => 0,
                    'edit' => 0,
                    'add' => 0,
                    'delete' => 0,
                    'details' => '{}',
                    'order' => 8,
                ),
                8 => 
                array (
                    'data_type_id' => $dataType->id,
                    'field' => 'routeros_template_belongsto_routeros_main_package_relationship',
                    'type' => 'relationship',
                'display_name' => 'Main Package (required)',
                    'required' => 1,
                    'browse' => 1,
                    'read' => 1,
                    'edit' => 1,
                    'add' => 1,
                    'delete' => 1,
                    'details' => '{"model":"App\\\\RouterosMainPackage","table":"routeros_main_packages","type":"belongsTo","column":"routeros_main_package_id","key":"id","label":"filename","pivot_table":"data_rows","pivot":"0","taggable":"0"}',
                    'order' => 9,
                ),
                9 => 
                array (
                    'data_type_id' => $dataType->id,
                    'field' => 'routeros_template_belongsto_routeros_branding_package_relationship',
                    'type' => 'relationship',
                'display_name' => 'Branding Package (optional)',
                    'required' => 0,
                    'browse' => 1,
                    'read' => 1,
                    'edit' => 1,
                    'add' => 1,
                    'delete' => 1,
                    'details' => '{"model":"App\\\\RouterosBrandingPackage","table":"routeros_branding_packages","type":"belongsTo","column":"routeros_branding_package_id","key":"id","label":"description","pivot_table":"data_rows","pivot":"0","taggable":"0"}',
                    'order' => 10,
                ),
                10 => 
                array (
                    'data_type_id' => $dataType->id,
                    'field' => 'routeros_template_belongsto_routeros_default_configuration_relationship',
                    'type' => 'relationship',
                'display_name' => 'Default Config (optional)',
                    'required' => 0,
                    'browse' => 1,
                    'read' => 1,
                    'edit' => 1,
                    'add' => 1,
                    'delete' => 1,
                    'details' => '{"model":"App\\\\RouterosDefaultConfiguration","table":"routeros_default_configurations","type":"belongsTo","column":"routeros_default_configuration_id","key":"id","label":"description","pivot_table":"data_rows","pivot":"0","taggable":"0"}',
                    'order' => 11,
                ),
                11 => 
                array (
                    'data_type_id' => $dataType->id,
                    'field' => 'routeros_template_belongstomany_routeros_addon_package_relationship',
                    'type' => 'relationship',
                'display_name' => 'Add-on Package(s) (optional)',
                    'required' => 0,
                    'browse' => 1,
                    'read' => 1,
                    'edit' => 1,
                    'add' => 1,
                    'delete' => 1,
                    'details' => '{"foreign_pivot_key":"routeros_template_id","related_pivot_key":"routeros_addon_package_id","parent_key":"id","model":"App\\\\RouterosAddonPackage","table":"routeros_addon_packages","type":"belongsToMany","column":"id","key":"id","label":"filename","pivot_table":"routeros_template_addon_package","pivot":"1","taggable":"0"}',
                    'order' => 12,
                ),
            ));
        } catch(Exception $e) {
            throw new Exception('exception occur ' . $e);

            \DB::rollBack();
        }

        \DB::commit();
    }
}

