<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    /** @use HasFactory<\Database\Factories\DeviceFactory> */
    use HasFactory;

    protected $table    = "equipments";
    protected $fillable = [
        'subdevice_id',
        'brand_id',
        'family',
        'model',
        'serial',
        'color',
        'full_name',
        'metadata',
    ];

    protected $casts = [
        'metadata' => 'array',
    ];

    public static function rules() {
        return [

            // Campos principales
            'equipment.subdevice_id' => 'required|exists:subdevices,id',
            'equipment.brand_id'     => 'required|exists:brands,id',

            'equipment.family' => 'nullable|string|min:3|required_without_all:equipment.model,equipment.serial,equipment.metadata.part_num,equipment.metadata.mtm,equipment.metadata.st,equipment.metadata.emc,equipment.metadata.esc',
            'equipment.model'  => 'nullable|string|min:3|required_without_all:equipment.family,equipment.serial,equipment.metadata.part_num,equipment.metadata.mtm,equipment.metadata.st,equipment.metadata.emc,equipment.metadata.esc',
            'equipment.serial' => 'nullable|string|min:3|required_without_all:equipment.family,equipment.model,equipment.metadata.part_num,equipment.metadata.mtm,equipment.metadata.st,equipment.metadata.emc,equipment.metadata.esc',

            'equipment.color'     => 'required|string',
            'equipment.full_name' => 'nullable|string',

            // Extra metadata array
            'equipment.metadata' => 'nullable|array',

            // -----------------------------
            // Campos metadata
            // -----------------------------

            // campos de marca
            'equipment.metadata.part_num' => 'nullable|string|min:3|required_without_all:equipment.family,equipment.model,equipment.serial,equipment.metadata.mtm,equipment.metadata.st,equipment.metadata.emc,equipment.metadata.esc',
            'equipment.metadata.mtm'      => 'nullable|string|min:3|required_without_all:equipment.family,equipment.model,equipment.serial,equipment.metadata.part_num,equipment.metadata.st,equipment.metadata.emc,equipment.metadata.esc',
            'equipment.metadata.st'       => 'nullable|string|min:3|required_without_all:equipment.family,equipment.model,equipment.serial,equipment.metadata.part_num,equipment.metadata.mtm,equipment.metadata.emc,equipment.metadata.esc',
            'equipment.metadata.emc'      => 'nullable|string|min:3|required_without_all:equipment.family,equipment.model,equipment.serial,equipment.metadata.part_num,equipment.metadata.mtm,equipment.metadata.st,equipment.metadata.esc',
            'equipment.metadata.esc'      => 'nullable|string|min:3|required_without_all:equipment.family,equipment.model,equipment.serial,equipment.metadata.part_num,equipment.metadata.mtm,equipment.metadata.st,equipment.metadata.emc',

            // campos "otros"
            'equipment.metadata.other_device' => 'required_if:equipment.subdevice_id,1|string|min:2',
            'equipment.metadata.other_brand' => 'required_if:equipment.brand_id,1|string|min:2',
        ];
    }

    public static function messages() {
        return [
            'equipment.subdevice_id.required' => 'Debe seleccionar un subdispositivo.',
            'equipment.subdevice_id.exists'   => 'El subdispositivo seleccionado no es válido.',

            'equipment.brand_id.required' => 'Debe seleccionar una marca.',
            'equipment.brand_id.exists'   => 'La marca seleccionada no es válida.',

            'equipment.color.required'   => 'Debe elegir un color de equipo.',

            // extra_metadatos "otros"
            'equipment.metadata.other_device.required_if' => 'Debe especificar el tipo de equipo',
            'equipment.metadata.other_device.min' => 'El tipo de equipo debe tener al menos 2 caracteres.',
            'equipment.metadata.other_brand.required_if' => 'Debe especificar el nombre de la marca',
            'equipment.metadata.other_brand.min' => 'La marca debe tener al menos 2 caracteres.',

            // los demás campos mostrarán un mensaje generico desde la vista
        ];
    }

    public function subdevice() {
        return $this->belongsTo(Subdevice::class);
    }

    public function brand() {
        return $this->belongsTo(Brand::class);
    }

    public function labels() {
        return $this->hasMany(EquipmentLabel::class);
    }

    public function labs() {
        return $this->belongsToMany(Lab::class);
    }

    public function workOrders() {
        return $this->hasMany(WorkOrder::class);
    }

    // Relación indirecta hacia los detalles
    public function specs()
    {
        return $this->hasManyThrough(
            Spec::class,        // Modelo final
            WorkOrder::class,   // Modelo intermedio
            'equipment_id',     // FK en work_orders → equipmnets.id
            'work_order_id',    // FK en specs → work_orders.id
            'id',               // PK en equipmnets
            'id'                // PK en work_orders
        );
    }

    public function getNameAttribute() {
        $parts = [];

        if ($this->subdevice && $this->subdevice->device->slug) {
            if(strtolower($this->subdevice->device->slug) !== 'other') {
                $parts[] = $this->subdevice->device->alias;
            }
        }

        if ($this->subdevice && $this->subdevice->slug) {
            $parts[] = strtolower($this->subdevice->slug) === 'other'
                ? ($this->metadata['other_device'] ?? '')
                : $this->subdevice->alias;
        }

        if ($this->brand && $this->brand->slug) {
            $parts[] = strtolower($this->brand->slug) === 'other'
                ? ($this->metadata['other_brand'] ?? '')
                : $this->brand->name;
        }

        if($this->family != '' && $this->family != null) $parts[] = $this->family;
        if($this->model != '' && $this->model != null) $parts[] = $this->model;
        if($this->serial != '' && $this->serial != null) $parts[] = $this->serial;

        $brandLabels = [
            'part_num',
            'st',
            'esc',
            'mtm',
            'emc',
            'date',
        ];

        foreach ($brandLabels as $label) {
            if (!empty($this->metadata[$label])) {
                $parts[] = $this->metadata[$label];
            }
        }

        if($this->color != '' && $this->color != null) $parts[] = $this->color;

        return !empty($parts) ? implode(' ', $parts) : null;
    }

    public function scopeSearch($query, $term)
    {
        $term = trim((string) $term);

        if ($term === '') {
            return $query;
        }

        $words = preg_split('/\s+/', $term);

        return $query->where(function ($query) use ($words) {

            foreach ($words as $word) {
                $query->where('full_name', 'LIKE', "%{$word}%");
            }

        });
    }
}
