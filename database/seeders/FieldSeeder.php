<?php

namespace Database\Seeders;

use App\Models\Device;
use App\Models\Field;
use Illuminate\Database\Seeder;

class FieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {

        $fields = [
            [
                'name'          => 'Estado del equipo (físico)',
                'slug'          => 'defects',
                'data_type'     => 'checkbox',
                'options'       => ['Rayones', 'Golpes', 'Roturas', 'Gomas', 'Tapas', 'Teclas', 'Desgaste', 'Pantalla', 'Conexiones', 'Manchas', 'Calcomanias', 'Pintura', 'Pegamento'],
                'placeholder'   => null,
                'view_order'    => 1,
                'devices'       => ['other','laptop','inkjet','laser','aio','desktop','tablet','plotter']
            ],
            [
                'name'          => 'Observaciones',
                'slug'          => 'observations',
                'data_type'     => 'textarea',
                'options'       => null,
                'placeholder'   => 'Mencione donde se encuentran los defectos y/o detalles',
                'view_order'    => 2,
                'devices'       => ['other','laptop','inkjet','laser','aio','desktop','tablet','plotter']
            ],
            [
                'name'          => 'Accesorios',
                'slug'          => 'accessories',
                'data_type'     => 'checkbox',
                'options'       => null, // obtener desde db
                'placeholder'   => null,
                'view_order'    => 3,
                'devices'       => ['other','laptop','inkjet','laser','aio','desktop','tablet','plotter']
            ],
            [
                'name'          => 'Otros accesorios',
                'slug'          => 'more_accessories',
                'data_type'     => 'text',
                'options'       => null,
                'placeholder'   => 'Especifique',
                'view_order'    => 4,
                'devices'       => ['other','laptop','inkjet','laser','aio','desktop','tablet','plotter']
            ],
            [
                'name'          => 'Tipo de uso',
                'slug'          => 'usage',
                'data_type'     => 'select',
                'options'       => null, // obtener desde db
                'placeholder'   => null,
                'view_order'    => 5,
                'devices'       => ['laptop','inkjet','laser','aio','desktop']
            ],
            [
                'name'          => 'Impresiones mensuales',
                'slug'          => 'monthly_prints',
                'data_type'     => 'number',
                'options'       => null,
                'placeholder'   => 'Número de impresiones mensuales',
                'view_order'    => 6,
                'devices'       => ['inkjet','laser','plotter']
            ],
            [
                'name'          => 'Contraseña',
                'slug'          => 'printer_password',
                'data_type'     => 'datalist',
                'options'       => null,
                'placeholder'   => '•••••••••••••',
                'view_order'    => 7,
                'devices'       => ['other','inkjet','laser','plotter']
            ],
            [
                'name'          => 'Preautorizó mantenimiento',
                'slug'          => 'printer_maintenance_preapproved',
                'data_type'     => 'checkbox',
                'options'       => null,
                'placeholder'   => null,
                'view_order'    => 8,
                'devices'       => ['inkjet','laser','plotter']
            ],
            [
                'name'          => 'Gama',
                'slug'          => 'range',
                'data_type'     => 'select',
                'options'       => null, // obtener desde db
                'placeholder'   => null,
                'view_order'    => 9,
                'devices'       => ['inkjet','laser']
            ],
            [
                'name'          => 'Niveles de tinta',
                'slug'          => 'ink_levels',
                'data_type'     => 'datalist',
                'options'       => ['Ok', 'No', 'No sabe'],
                'placeholder'   => 'Ok, No, No sabe, etc...',
                'view_order'    => 10,
                'devices'       => ['inkjet','plotter']
            ],
            [
                'name'          => 'Última impresión con todos los colores',
                'slug'          => 'last_full_color_print',
                'data_type'     => 'text',
                'options'       => null,
                'placeholder'   => 'Fecha de última impresión',
                'view_order'    => 11,
                'devices'       => ['inkjet','plotter']
            ],
            [
                'name'          => 'Estado (funcionamiento)',
                'slug'          => 'printer_condition',
                'data_type'     => 'select',
                'options'       => null, // obtener desde db
                'placeholder'   => null,
                'view_order'    => 12,
                'devices'       => ['inkjet', 'laser','plotter']
            ],
            [
                'name'          => 'Niveles de tóner',
                'slug'          => 'toner_levels',
                'data_type'     => 'datalist',
                'options'       => ['Ok', 'No', 'No sabe'],
                'placeholder'   => 'Ok, No, No sabe, etc...',
                'view_order'    => 10, // mismo número que el campo anterior de tinta
                'devices'       => ['laser']
            ],
            [
                'name'          => 'Touch',
                'slug'          => 'touch',
                'data_type'     => 'select',
                'options'       => ['Sí', 'No', 'No sabe'],
                'placeholder'   => null,
                'view_order'    => 6, // mismo número que "Impresiones mensuales"
                'devices'       => ['other','laptop','aio']
            ],
            [
                'name'          => 'Tiene contraseña',
                'slug'          => 'computer_has_password',
                'data_type'     => 'radio',
                'options'       => ['No tiene', 'No recuerdan', 'Sí tiene'],
                'placeholder'   => null,
                'view_order'    => 7, // mismo número que el campo de contraseña impresoras
                'devices'       => ['other','laptop','aio','desktop','tablet']
            ],
            [
                'name'          => 'Contraseña',
                'slug'          => 'computer_password',
                'data_type'     => 'text',
                'options'       => null,
                'placeholder'   => '•••••••••••••',
                'view_order'    => 7, // mismo número que el campo de contraseña impresoras
                'devices'       => ['other','laptop','aio','desktop','tablet']
            ],
            [
                'name'              => 'Estado (funcionamiento)',
                'slug'              => 'computer_condition',
                'data_type'         => 'select',
                'options'           => null, // obtener desde db
                'placeholder'       => null,
                'view_order'        => 8, // mismo número que el mantenimiento de impresoras
                'devices' => ['other','laptop','aio','desktop','tablet']
            ],
            [
                'name'              => 'Batería',
                'slug'              => 'battery_condition',
                'data_type'         => 'select',
                'options'           => null, // obtener desde db
                'placeholder'       => null,
                'view_order'        => 9, // mismo número que el campo Gama
                'devices' => ['other','laptop','tablet']
            ],
            [
                'name'              => 'Archivos por respaldar',
                'slug'              => 'files_to_backup',
                'data_type'         => 'checkbox',
                'options'           => null,
                'placeholder'       => null,
                'view_order'        => 10, // mismo número que tinta y tóner
                'devices' => ['other','laptop','aio','desktop','tablet']
            ],
            [
                'name'              => 'Urgente',
                'slug'              => 'urgent',
                'data_type'         => 'checkbox',
                'options'           => null,
                'placeholder'       => null,
                'view_order'        => 12,
                'devices' => ['other','laptop','inkjet','laser','aio','desktop','tablet','plotter']
            ],
            [
                'name'              => 'Descripción de la falla',
                'slug'              => 'failure_description',
                'data_type'         => 'textarea',
                'options'           => null,
                'placeholder'       => 'Descripción detallada de la falla',
                'view_order'        => 13,
                'devices' => ['other','laptop','inkjet','laser','aio','desktop','tablet','plotter']
            ],
            [
                'name'              => 'Ha sido intervenido',
                'slug'              => 'has_been_intervened',
                'data_type'         => 'radio',
                'options'           => ['No intervenido', 'Intervenido por esta falla', 'Intervenido por otra falla'],
                'placeholder'       => null,
                'view_order'        => 14,
                'devices' => ['other','laptop','inkjet','laser','aio','desktop','tablet','plotter']
            ],
            [
                'name'              => 'Descripción de intervenido',
                'slug'              => 'intervention_description',
                'data_type'         => 'textarea',
                'options'           => null,
                'placeholder'       => 'Especifique que se le hizo al equipo',
                'view_order'        => 15,
                'devices' => ['other','laptop','inkjet','laser','aio','desktop','tablet','plotter']
            ],
            [
                'name'              => 'Equipo se recibe en condiciones críticas de carcasa',
                'slug'              => 'critical_chassis_condition',
                'data_type'         => 'checkbox',
                'options'           => null,
                'placeholder'       => null,
                'view_order'        => 16,
                'devices' => ['other','laptop']
            ],
            [
                'name'              => 'Preautorizó servicio(s)',
                'slug'              => 'computer_service_preapproved',
                'data_type'         => 'checkbox',
                'options'           => null,
                'placeholder'       => null,
                'view_order'        => 17,
                'devices' => ['other','laptop','aio','desktop']
            ],
            [
                'name'              => 'Sospechosos',
                'slug'              => 'suspected_components',
                'data_type'         => 'checkbox',
                'options'           => ['CORTOS','BIOS','REBOLEO','MTTO','SO','HDD','SSD','PANTALLA','TECLADO','WIFI','PILA','CARCASA','BISAGRAS','CARGADOR','CHIPSET','WEBCAM','JACKS'],
                'placeholder'       => null,
                'view_order'        => 18,
                'devices' => ['other','laptop','aio','desktop','tablet']
            ],
            [
                'name'              => 'Otros sospechosos',
                'slug'              => 'other_suspected_components',
                'data_type'         => 'textarea',
                'options'           => null,
                'placeholder'       => null,
                'view_order'        => 19,
                'devices' => ['other','laptop','aio','desktop','tablet']
            ],
        ];



        foreach ($fields as $data) {
            $field = Field::create([
                'name'          => $data['name'],
                'slug'          => $data['slug'],
                'data_type'     => $data['data_type'],
                'view_order'    => $data['view_order'],
                'options'       => !empty($data['options']) ? json_encode($data['options']) : null,
                'placeholder'   => $data['placeholder'],
                'view_order'    => $data['view_order'],
            ]);

            // Buscar los IDs de los tipos relacionados usando el campo 'tipo'
            $deviceIds = Device::whereIn('slug', $data['devices'])->pluck('id');

            // Sincronizar los tipos con la marca
            $field->devices()->sync($deviceIds);
        }
    }
}
