<?php

namespace Database\Seeders;

use App\Models\Stage;
use App\Models\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $states = [
        //     [
        //         'stage_code'    => 'TO_RECEIVE',
        //         'name'          => 'Equipo por recibir en DD',
        //         'slug'          => 'por_recibir',
        //         'description'   => '',
        //         // 'color'         => 'yellow',
        //     ],
        //     [
        //         'stage_code'    => 'TO_PICKUP',
        //         'name'          => 'Equipo por recoger de DD',
        //         'slug'          => 'por_recoger',
        //         'description'   => '',
        //         // 'color'         => 'yellow',
        //     ],
        //     [
        //         'stage_code'    => 'DIAGNOSIS',
        //         'name'          => 'Equipo por revisar',
        //         'slug'          => 'por_diagnosticar',
        //         'description'   => '',
        //         // 'color'         => 'yellow',
        //     ],
        //     [
        //         'stage_code'    => 'DIAGNOSIS',
        //         'name'          => 'Equipo en proceso de DX',
        //         'slug'          => 'dx_en_proceso',
        //         'description'   => '',
        //         // 'color'         => 'blue',
        //     ],
        //     [
        //         'stage_code'    => 'DIAGNOSIS',
        //         'name'          => 'En diagnóstico por DD',
        //         'slug'          => 'diagnostico_dd',
        //         'description'   => 'El equipo se asignó a un técnico interno',
        //         // 'color'         => 'blue',
        //     ],
        //     [
        //         'stage_code'    => 'DX_INTERNAL',
        //         'name'          => 'Aterrizando diagnóstico',
        //         'slug'          => 'aterrizando_dx',
        //         'description'   => '',
        //         // 'color'         => 'yellow',
        //     ],
        //     [
        //         'stage_code'    => 'DX_INTERNAL',
        //         'name'          => 'Cotizando refacciones',
        //         'slug'          => 'cotizando_refas',
        //         'description'   => '',
        //         // 'color'         => 'yellow',
        //     ],
        //     [
        //         'stage_code'    => 'DX_INTERNAL',
        //         'name'          => 'Diagnóstico redactado',
        //         'slug'          => 'dx_redactado',
        //         'description'   => 'Contacar al cliente',
        //         // 'color'         => 'green',
        //     ],
        //     [
        //         'stage_code'    => 'DX_CLIENT',
        //         'name'          => 'Esperando autorización',
        //         'slug'          => 'esperando_autorizacion',
        //         'description'   => '',
        //         // 'color'         => 'yellow',
        //     ],
        //     [
        //         'stage_code'    => 'REPAIR_AUTHORIZED',
        //         'name'          => 'Refacciones en proceso',
        //         'slug'          => 'reparacion_pendiente',
        //         'description'   => '',
        //         // 'color'         => 'yellow',
        //     ],
        //     [
        //         'stage_code'    => 'REPAIR_AUTHORIZED',
        //         'name'          => 'En reparación',
        //         'slug'          => 'en_reparacion',
        //         'description'   => '',
        //         // 'color'         => 'blue',
        //     ],
        //     [
        //         'stage_code'    => 'REPAIR_AUTHORIZED',
        //         'name'          => 'Esperando autorización adicional',
        //         'slug'          => 'esperando_reautorizacion',
        //         'description'   => 'Se espera autorización despues de la reparación',
        //         // 'color'         => 'yellow',
        //     ],
        //     [
        //         'stage_code'    => 'REPAIR_AUTHORIZED',
        //         'name'          => 'Reparación lista',
        //         'slug'          => 'reparacion_finalizada',
        //         'description'   => 'Se debe especificar si la reparación fue exitosa o no',
        //         // 'color'         => 'green',
        //     ],
        //     [
        //         'stage_code'    => 'REPAIR_AUTHORIZED',
        //         'name'          => 'Esperando equipo',
        //         'slug'          => 'esperando_equipo_listo',
        //         'description'   => '',
        //         // 'color'         => 'yellow',
        //     ],
        //     [
        //         'stage_code'    => 'REPAIR_REJECTED',
        //         'name'          => 'Esperando equipo',
        //         'slug'          => 'esperando_equipo_rechazado',
        //         'description'   => '',
        //         // 'color'         => 'yellow',
        //     ],
        //     [
        //         'stage_code'    => 'READY_FOR_DELIVERY',
        //         'name'          => 'Revisión del equipo',
        //         'slug'          => 'inpeccion_equipo',
        //         'description'   => 'Hacer pruebas antes de entregar',
        //         // 'color'         => 'blue',
        //     ],
        //     [
        //         'stage_code'    => 'READY_FOR_DELIVERY',
        //         'name'          => 'Avisar a cliente',
        //         'slug'          => 'avisar_cliente',
        //         'description'   => '',
        //         // 'color'         => 'green',
        //     ],
        //     [
        //         'stage_code'    => 'READY_FOR_DELIVERY',
        //         'name'          => 'Cliente avisado',
        //         'slug'          => 'cliente_avisado',
        //         'description'   => 'Corre el tiempo para que el cliente pase a recoger',
        //         // 'color'         => 'yellow',
        //     ],
        //     [
        //         'stage_code'    => 'READY_FOR_DELIVERY',
        //         'name'          => 'Cliente programado',
        //         'slug'          => 'cliente_programado',
        //         'description'   => 'El tiempo de recolección corre despues de la fecha programada',
        //         // 'color'         => 'purple',
        //     ],
        //     [
        //         'stage_code'    => 'READY_FOR_DELIVERY',
        //         'name'          => 'Enviar equipo por paquetería',
        //         'slug'          => 'enviar_paqueteria',
        //         'description'   => '',
        //         // 'color'         => 'orange',
        //     ],
        //     [
        //         'stage_code'    => 'READY_FOR_DELIVERY',
        //         'name'          => 'Equipo enviado por paquetería',
        //         'slug'          => 'equipo_enviado',
        //         'description'   => '',
        //         // 'color'         => 'blue',
        //     ],
        //     [
        //         'stage_code'    => 'CLOSED',
        //         'name'          => 'Equipo entregado a cliente',
        //         'slug'          => 'equipo_entregado',
        //         'description'   => 'Calificar al cliente y programar o no una comunicación posterior',
        //         // 'color'         => 'green',
        //     ],
        //     [
        //         'stage_code'    => 'CLOSED',
        //         'name'          => 'Equipo donado',
        //         'slug'          => 'equipo_donado',
        //         'description'   => '',
        //         // 'color'         => 'lime',
        //     ],
        //     [
        //         'stage_code'    => 'CLOSED',
        //         'name'          => 'Equipo abandonado',
        //         'slug'          => 'equipo_abandonado',
        //         'description'   => '',
        //         // 'color'         => 'lime',
        //     ],
        //     [
        //         'stage_code'    => 'CLOSED',
        //         'name'          => 'Equipo entregado por paquetería',
        //         'slug'          => 'entregado_paqueteria',
        //         'description'   => 'Calificar al cliente y programar o no una comunicación posterior',
        //         // 'color'         => 'green',
        //     ],
        // ];

        // optimizado
        // $states = [
        //     ['stage_code'=>'TO_RECEIVE','code'=>'EQUIPMENT_PENDING_RECEIPT','name'=>'Equipo por recibir','slug'=>'por_recibir','description'=>'El equipo está registrado pero aún no ha sido recibido físicamente.'],

        //     ['stage_code'=>'TO_PICKUP','code'=>'EQUIPMENT_PENDING_PICKUP','name'=>'Equipo por recoger','slug'=>'por_recoger','description'=>'El equipo debe recogerse desde otra ubicación para ingresarlo al sistema.'],

        //     ['stage_code'=>'DIAGNOSIS','code'=>'DIAGNOSIS_PENDING','name'=>'Equipo pendiente de diagnóstico','slug'=>'por_diagnosticar','description'=>'El equipo está en espera de ser revisado por un técnico.'],
        //     ['stage_code'=>'DIAGNOSIS','code'=>'DIAGNOSIS_IN_PROGRESS','name'=>'Diagnóstico en proceso','slug'=>'dx_en_proceso','description'=>'Un técnico se encuentra analizando el equipo para determinar la falla.'],
        //     ['stage_code'=>'DIAGNOSIS','code'=>'DIAGNOSIS_COMPLETED','name'=>'Diagnóstico completado','slug'=>'dx_completado','description'=>'El diagnóstico fue finalizado y está listo para comunicarse al cliente.'],

        //     ['stage_code'=>'DX_CLIENT','code'=>'WAITING_CLIENT_AUTHORIZATION','name'=>'Esperando autorización del cliente','slug'=>'esperando_autorizacion','description'=>'Se envió el diagnóstico al cliente y se espera aprobación para reparar.'],

        //     ['stage_code'=>'REPAIR_AUTHORIZED','code'=>'WAITING_PARTS','name'=>'Esperando refacciones','slug'=>'esperando_refacciones','description'=>'Se están cotizando o esperando las piezas necesarias para la reparación.'],
        //     ['stage_code'=>'REPAIR_AUTHORIZED','code'=>'REPAIR_IN_PROGRESS','name'=>'Reparación en proceso','slug'=>'en_reparacion','description'=>'El equipo está siendo reparado por el técnico asignado.'],
        //     ['stage_code'=>'REPAIR_AUTHORIZED','code'=>'WAITING_ADDITIONAL_AUTHORIZATION','name'=>'Esperando autorización adicional','slug'=>'esperando_reautorizacion','description'=>'Se detectó un ajuste adicional durante la reparación y requiere aprobación del cliente.'],
        //     ['stage_code'=>'REPAIR_AUTHORIZED','code'=>'REPAIR_COMPLETED','name'=>'Reparación completada','slug'=>'reparacion_finalizada','description'=>'La reparación ha terminado y el equipo está listo para revisión final.'],

        //     ['stage_code'=>'READY_FOR_DELIVERY','code'=>'QUALITY_CHECK','name'=>'Revisión final del equipo','slug'=>'revision_final','description'=>'Se realizan pruebas y verificación antes de entregar el equipo.'],
        //     ['stage_code'=>'READY_FOR_DELIVERY','code'=>'CLIENT_NOTIFICATION_PENDING','name'=>'Avisar al cliente','slug'=>'avisar_cliente','description'=>'El equipo está listo y se debe notificar al cliente.'],
        //     ['stage_code'=>'READY_FOR_DELIVERY','code'=>'CLIENT_NOTIFIED','name'=>'Cliente notificado','slug'=>'cliente_avisado','description'=>'El cliente ya fue informado y puede pasar a recoger el equipo.'],
        //     ['stage_code'=>'READY_FOR_DELIVERY','code'=>'SHIPMENT_IN_PROGRESS','name'=>'Envío por paquetería','slug'=>'envio_paqueteria','description'=>'El equipo se encuentra en proceso de envío mediante paquetería.'],

        //     ['stage_code'=>'CLOSED','code'=>'EQUIPMENT_DELIVERED','name'=>'Equipo entregado','slug'=>'equipo_entregado','description'=>'El equipo fue entregado al cliente y el servicio ha finalizado.'],
        //     ['stage_code'=>'CLOSED','code'=>'EQUIPMENT_DELIVERED_BY_COURIER','name'=>'Entregado por paquetería','slug'=>'entregado_paqueteria','description'=>'El equipo fue entregado al cliente mediante servicio de paquetería.'],
        //     ['stage_code'=>'CLOSED','code'=>'EQUIPMENT_ABANDONED','name'=>'Equipo abandonado','slug'=>'equipo_abandonado','description'=>'El cliente no recogió el equipo dentro del plazo establecido.'],
        // ];

        $states = [
            [
                'stage_code' => 'TO_RECEIVE',
                'code' => 'EQUIPMENT_PENDING_RECEIPT',
                'name' => 'Equipo por recibir en DD',
                'slug' => 'por_recibir',
                'description' => 'El equipo está registrado en el sistema pero aún no ha sido recibido físicamente en DD.',
            ],
            [
                'stage_code' => 'TO_PICKUP',
                'code' => 'EQUIPMENT_PENDING_PICKUP',
                'name' => 'Equipo por recoger de DD',
                'slug' => 'por_recoger',
                'description' => 'El equipo está listo para ser recogido desde otra ubicación o proveedor para ingresarlo al proceso.',
            ],
            [
                'stage_code' => 'DIAGNOSIS',
                'code' => 'EQUIPMENT_PENDING_DIAGNOSIS',
                'name' => 'Equipo por revisar',
                'slug' => 'por_diagnosticar',
                'description' => 'El equipo fue recibido y está en espera de que un técnico inicie su revisión o diagnóstico.',
            ],
            [
                'stage_code' => 'DIAGNOSIS',
                'code' => 'DIAGNOSIS_IN_PROGRESS',
                'name' => 'Equipo en proceso de DX',
                'slug' => 'dx_en_proceso',
                'description' => 'Un técnico se encuentra revisando el equipo para identificar fallas o posibles soluciones.',
            ],
            [
                'stage_code' => 'DIAGNOSIS',
                'code' => 'DIAGNOSIS_ASSIGNED_INTERNAL',
                'name' => 'En diagnóstico por DD',
                'slug' => 'diagnostico_dd',
                'description' => 'El equipo se asignó a un técnico interno',
            ],
            [
                'stage_code' => 'DX_INTERNAL',
                'code' => 'DIAGNOSIS_REFINEMENT',
                'name' => 'Aterrizando diagnóstico',
                'slug' => 'aterrizando_dx',
                'description' => 'El técnico está definiendo con mayor precisión el diagnóstico final del equipo.',
            ],
            [
                'stage_code' => 'DX_INTERNAL',
                'code' => 'QUOTING_PARTS',
                'name' => 'Cotizando refacciones',
                'slug' => 'cotizando_refas',
                'description' => 'Se están investigando o cotizando las refacciones necesarias para la reparación.',
            ],
            [
                'stage_code' => 'DX_INTERNAL',
                'code' => 'DIAGNOSIS_DOCUMENTED',
                'name' => 'Diagnóstico redactado',
                'slug' => 'dx_redactado',
                'description' => 'Contacar al cliente',
            ],
            [
                'stage_code' => 'DX_CLIENT',
                'code' => 'WAITING_CLIENT_AUTHORIZATION',
                'name' => 'Esperando autorización',
                'slug' => 'esperando_autorizacion',
                'description' => 'Se envió el diagnóstico al cliente y se espera su aprobación para proceder con la reparación.',
            ],
            [
                'stage_code' => 'REPAIR_AUTHORIZED',
                'code' => 'PARTS_IN_PROGRESS',
                'name' => 'Refacciones en proceso',
                'slug' => 'reparacion_pendiente',
                'description' => 'Se están adquiriendo o preparando las refacciones necesarias para la reparación.',
            ],
            [
                'stage_code' => 'REPAIR_AUTHORIZED',
                'code' => 'REPAIR_IN_PROGRESS',
                'name' => 'En reparación',
                'slug' => 'en_reparacion',
                'description' => 'El equipo está siendo reparado por el técnico asignado.',
            ],
            [
                'stage_code' => 'REPAIR_AUTHORIZED',
                'code' => 'WAITING_ADDITIONAL_AUTHORIZATION',
                'name' => 'Esperando autorización adicional',
                'slug' => 'esperando_reautorizacion',
                'description' => 'Se espera autorización despues de la reparación',
            ],
            [
                'stage_code' => 'REPAIR_AUTHORIZED',
                'code' => 'REPAIR_COMPLETED',
                'name' => 'Reparación lista',
                'slug' => 'reparacion_finalizada',
                'description' => 'Se debe especificar si la reparación fue exitosa o no',
            ],
            [
                'stage_code' => 'REPAIR_AUTHORIZED',
                'code' => 'WAITING_DEVICE_AFTER_REPAIR',
                'name' => 'Esperando equipo',
                'slug' => 'esperando_equipo_listo',
                'description' => 'Se espera recibir o confirmar el equipo para continuar con el flujo posterior a la reparación.',
            ],
            [
                'stage_code' => 'REPAIR_REJECTED',
                'code' => 'WAITING_DEVICE_REPAIR_REJECTED',
                'name' => 'Esperando equipo',
                'slug' => 'esperando_equipo_rechazado',
                'description' => 'El cliente rechazó la reparación y se espera el equipo para cierre o devolución.',
            ],
            [
                'stage_code' => 'READY_FOR_DELIVERY',
                'code' => 'EQUIPMENT_INSPECTION',
                'name' => 'Revisión del equipo',
                'slug' => 'inpeccion_equipo',
                'description' => 'Hacer pruebas antes de entregar',
            ],
            [
                'stage_code' => 'READY_FOR_DELIVERY',
                'code' => 'NOTIFY_CLIENT',
                'name' => 'Avisar a cliente',
                'slug' => 'avisar_cliente',
                'description' => 'Se debe contactar al cliente para informarle que su equipo está listo.',
            ],
            [
                'stage_code' => 'READY_FOR_DELIVERY',
                'code' => 'CLIENT_NOTIFIED',
                'name' => 'Cliente avisado',
                'slug' => 'cliente_avisado',
                'description' => 'Corre el tiempo para que el cliente pase a recoger',
            ],
            [
                'stage_code' => 'READY_FOR_DELIVERY',
                'code' => 'CLIENT_SCHEDULED_PICKUP',
                'name' => 'Cliente programado',
                'slug' => 'cliente_programado',
                'description' => 'El tiempo de recolección corre despues de la fecha programada',
            ],
            [
                'stage_code' => 'READY_FOR_DELIVERY',
                'code' => 'SHIP_VIA_COURIER',
                'name' => 'Enviar equipo por paquetería',
                'slug' => 'enviar_paqueteria',
                'description' => 'El equipo se preparará para ser enviado al cliente mediante paquetería.',
            ],
            [
                'stage_code' => 'READY_FOR_DELIVERY',
                'code' => 'EQUIPMENT_SHIPPED',
                'name' => 'Equipo enviado por paquetería',
                'slug' => 'equipo_enviado',
                'description' => 'El equipo ya fue enviado y está en tránsito hacia el cliente.',
            ],
            [
                'stage_code' => 'CLOSED',
                'code' => 'EQUIPMENT_DELIVERED',
                'name' => 'Equipo entregado a cliente',
                'slug' => 'equipo_entregado',
                'description' => 'Calificar al cliente y programar o no una comunicación posterior',
            ],
            [
                'stage_code' => 'CLOSED',
                'code' => 'EQUIPMENT_DONATED',
                'name' => 'Equipo donado',
                'slug' => 'equipo_donado',
                'description' => 'El equipo fue donado o dispuesto como donación al finalizar el proceso.',
            ],
            [
                'stage_code' => 'CLOSED',
                'code' => 'EQUIPMENT_ABANDONED',
                'name' => 'Equipo abandonado',
                'slug' => 'equipo_abandonado',
                'description' => 'El cliente no recogió el equipo dentro del tiempo establecido y se marcó como abandonado.',
            ],
            [
                'stage_code' => 'CLOSED',
                'code' => 'EQUIPMENT_DELIVERED_BY_COURIER',
                'name' => 'Equipo entregado por paquetería',
                'slug' => 'entregado_paqueteria',
                'description' => 'Calificar al cliente y programar o no una comunicación posterior',
            ],
        ];


        foreach($states as $data) {
            $stage = Stage::where('code', $data['stage_code'])->first();

            if($stage) {
                State::create([
                    'stage_id'      => $stage->id,
                    'code'          => $data['code'],
                    'name'          => $data['name'],
                    'slug'          => $data['slug'],
                    'description'   => $data['description'],
                ]);
            } else {
                logger()->warning("No se encontró slug: ", $data);
            }
        }
    }
}
