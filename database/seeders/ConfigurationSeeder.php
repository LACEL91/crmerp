<?php

namespace Database\Seeders;

use App\Models\Configuration;
use App\Models\User;
use Illuminate\Database\Seeder;

class ConfigurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $defaultTechnicianComputers = User::where('email', 'roberto@tl.com')->value('id');
        $defaultTechnicianPrinters = User::where('email', 'esteban@imp.com')->value('id');
        $defaultTechnicianMobiles = User::where('email', 'roberto@hub.com')->value('id');
        $defaultTechnicianOthers = User::where('email', 'roberto@tl.com')->value('id');

        $rows = [
            // Precios
            ['key' => 'dx_price',                       'value' => '450',    'type' => 'decimal', 'label' => 'Precio de diagnóstico',             'group' => 'pricing'],
            ['key' => 'urgent_price',                   'value' => '250',    'type' => 'decimal', 'label' => 'Precio servicio urgente',            'group' => 'pricing'],
            ['key' => 'receipt_reprint_charge',         'value' => '100',    'type' => 'decimal', 'label' => 'Cargo reimpresión de recibo',        'group' => 'pricing'],
            ['key' => 'storage_daily_charge',           'value' => '10',     'type' => 'integer', 'label' => 'Cargo diario por almacenaje',        'group' => 'pricing'],
            ['key' => 'storage_days_start',             'value' => '21',     'type' => 'integer', 'label' => 'Días para iniciar cargo almacenaje', 'group' => 'pricing'],
            ['key' => 'storage_days_abandoned',         'value' => '46',     'type' => 'integer', 'label' => 'Días para marcar equipo abandonado', 'group' => 'pricing'],
            ['key' => 'coupon_discount_1',              'value' => '100',    'type' => 'decimal', 'label' => 'Descuento cupón #1',                 'group' => 'pricing'],
            ['key' => 'coupon_discount_2',              'value' => '250',    'type' => 'decimal', 'label' => 'Descuento cupón #2',                 'group' => 'pricing'],
            
            // Mantenimiento tinta
            ['key' => 'ink_maintenance_economy',       'value' => '790',    'type' => 'decimal', 'label' => 'Económica',   'group' => 'pricing'],
            ['key' => 'ink_maintenance_domestic',      'value' => '990',    'type' => 'decimal', 'label' => 'Doméstico',   'group' => 'pricing'],
            ['key' => 'ink_maintenance_business',      'value' => '1390',   'type' => 'decimal', 'label' => 'Empresarial', 'group' => 'pricing'],
            
            // Mantenimiento láser
            ['key' => 'laser_maintenance_domestic',    'value' => '990',    'type' => 'decimal', 'label' => 'Doméstico',             'group' => 'pricing'],
            ['key' => 'laser_maintenance_business',    'value' => '1390',   'type' => 'decimal', 'label' => 'Empresarial',           'group' => 'pricing'],
            ['key' => 'laser_maintenance_industrial',  'value' => '1890',   'type' => 'decimal', 'label' => 'Robotina / Industrial', 'group' => 'pricing'],
            
            // Técnicos por defecto (se llenan después de tener usuarios)
            ['key' => 'default_technician_computers',  'value' => $defaultTechnicianComputers,       'type' => 'integer', 'label' => 'Técnico por defecto — Computadoras', 'group' => 'technicians'],
            ['key' => 'default_technician_printers',   'value' => $defaultTechnicianPrinters,       'type' => 'integer', 'label' => 'Técnico por defecto — Impresoras',   'group' => 'technicians'],
            ['key' => 'default_technician_mobiles',    'value' => $defaultTechnicianMobiles,       'type' => 'integer', 'label' => 'Técnico por defecto — Móviles',       'group' => 'technicians'],
            ['key' => 'default_technician_others',     'value' => $defaultTechnicianOthers,       'type' => 'integer', 'label' => 'Técnico por defecto — Otros',         'group' => 'technicians'],
            
            // Fiscal
            ['key' => 'fiscal_company_name',           'value' => 'Digital Depot S. de R.L. de C.V.', 'type' => 'string', 'label' => 'Razón social',     'group' => 'fiscal'],
            ['key' => 'fiscal_rfc',                    'value' => '',       'type' => 'string',  'label' => 'RFC',                                'group' => 'fiscal'],
            ['key' => 'fiscal_regimen',                'value' => '',       'type' => 'string',  'label' => 'Régimen fiscal',                     'group' => 'fiscal'],
            ['key' => 'fiscal_address',                'value' => '',       'type' => 'string',  'label' => 'Domicilio fiscal',                   'group' => 'fiscal'],
            ['key' => 'fiscal_phone',                  'value' => '',       'type' => 'string',  'label' => 'Teléfono fiscal',                    'group' => 'fiscal'],
            ['key' => 'fiscal_email',                  'value' => '',       'type' => 'string',  'label' => 'Correo de contacto',                 'group' => 'fiscal'],
            ['key' => 'fiscal_iva_rate',               'value' => '16',     'type' => 'decimal', 'label' => 'Tasa de IVA (%)',                    'group' => 'fiscal'],

            // Documento impreso
            ['key' => 'service_disclaimer_inspection',          'value' => 'Se hizo revisión general del equipo al recibirlo.',                 'type' => 'string', 'label' => 'Aviso: revisión inicial',             'group' => 'documents'],
            ['key' => 'service_disclaimer_diagnosis_variation', 'value' => 'Recibí explicación y estoy enterado que por el tipo de falla y manipulaciones por otro laboratorio, puede existir un margen de impresición en el diagnóstico inicial elaborado por digital depot s de rl de cv',   'type' => 'string', 'label' => 'Aviso: margen en diagnóstico',        'group' => 'documents'],
            ['key' => 'service_disclaimer_high_risk',           'value' => 'Recibí explicación y estoy enterado que estoy entregando a mi computadora en condiciones muy críticas y rompiéndose y autorizo a digital depot de s de rl de cv la manipulación del equipo haciéndome responsable por el riesgo que conlleve',       'type' => 'string', 'label' => 'Aviso: equipo en estado crítico',     'group' => 'documents'],
            
            // Sistema
            ['key' => 'folio_increment',               'value' => '3',      'type' => 'integer', 'label' => 'Incremento de folio público',        'group' => 'system'],
            ['key' => 'last_public_folio',             'value' => '10000',  'type' => 'integer', 'label' => 'Último folio público (solo lectura)','group' => 'system'],
            ['key' => 'last_internal_folio',           'value' => '0',      'type' => 'integer', 'label' => 'Último folio interno (solo lectura)','group' => 'system'],
        ];
 
        foreach ($rows as &$row) {
            $row['description']  = null;
        }
 
        Configuration::insert($rows);
    }
}
