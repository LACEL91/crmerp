<?php

namespace Database\Seeders;

use App\Models\Stage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stages = [
            [
                'code'        => 'TO_RECEIVE',
                'name'        => 'Por recibir en DD',
                'slug'        => 'por_recibir',
                'description' => 'Equipo aún no recibido físicamente en Digital Doctor',
                'color'       => 'rose',      // aún no está aquí — atención
            ],
            [
                'code'        => 'TO_PICKUP',
                'name'        => 'Por recoger de DD',
                'slug'        => 'por_recoger',
                'description' => 'Equipo pendiente de recolección o traslado hacia laboratorio',
                'color'       => 'amber',     // en movimiento — neutro-cálido
            ],
            [
                'code'        => 'DIAGNOSIS',
                'name'        => 'En DX',
                'slug'        => 'en_dx',
                'description' => 'Equipo en proceso de revisión y diagnóstico técnico',
                'color'       => 'sky',       // investigando — frío/técnico
            ],
            [
                'code'        => 'DX_INTERNAL',
                'name'        => 'DX facilitado a DD',
                'slug'        => 'dx_dd',
                'description' => 'Diagnóstico revisado y validado internamente por Digital Doctor',
                'color'       => 'violet',    // validación interna
            ],
            [
                'code'        => 'DX_CLIENT',
                'name'        => 'DX facilitado a cliente',
                'slug'        => 'dx_cliente',
                'description' => 'Diagnóstico comunicado o enviado al cliente',
                'color'       => 'cyan',      // comunicación externa
            ],
            [
                'code'        => 'REPAIR_AUTHORIZED',
                'name'        => 'Reparación autorizada',
                'slug'        => 'reparacion_autorizada',
                'description' => 'El cliente autorizó continuar con la reparación del equipo',
                'color'       => 'emerald',   // autorizado — semántica positiva/verde
            ],
            [
                'code'        => 'REPAIR_REJECTED',
                'name'        => 'Reparación rechazada',
                'slug'        => 'reparacion_rechazada',
                'description' => 'El cliente rechazó la reparación propuesta',
                'color'       => 'red',       // rechazado — semántica negativa clara
            ],
            [
                'code'        => 'READY_FOR_DELIVERY',
                'name'        => 'Listo para entregar',
                'slug'        => 'listo_para_entregar',
                'description' => 'Equipo preparado para ser entregado al cliente',
                'color'       => 'lime',      // listo — verde-acción, distinto del emerald
            ],
            [
                'code'        => 'CLOSED',
                'name'        => 'Folio cerrado',
                'slug'        => 'cerrado',
                'description' => 'Proceso finalizado y orden de servicio cerrada',
                'color'       => 'slate',     // neutral — ya no requiere acción
            ],
        ];

        foreach ($stages as $data) {
            Stage::updateOrCreate(
                ['code' => $data['code']],
                $data
            );
        }
    }
}
