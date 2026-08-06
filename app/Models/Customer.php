<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /** @use HasFactory<\Database\Factories\CustomerFactory> */
    use HasFactory;
    
    protected $table = "customers";
    protected $fillable = [
        'name',
        'phone',
        'phone_whatsapp',
        'email',
        'company',
        'invoice_option_id',
        'lead_source_id',
        'contact_channel_id',
        'photo_path',
    ];
    protected $attributes = [
        'name'                => null,
        'phone'              => null,
        'phone_whatsapp'     => true,
        'email'               => null,
        'company'             => null,
        'invoice_option_id'   => null,
        'lead_source_id'      => null,
        'contact_channel_id'  => null,
        'photo_path'          => null,
    ];

    protected $casts = [
        'phone_whatsapp' => 'boolean',
    ];

    public static function rules() {
        return [
            'customer.name'                 => 'required',
            'customer.phone'               => 'required',
            'customer.email'                => 'nullable|email',
        ];
    }

    public static function messages() {
        return [
            // name
            'customer.name.required_without' => 'Debe ingresar el nombre si no hay contactos autorizados',
            'customer.name.min' => 'El nombre debe tener al menos 3 caracteres',

            // phone
            'customer.phone.required' => 'Debe ingresar al menos un teléfono',

            // email
            'customer.email.email' => 'El correo electrónico no es válido',
        ];
    }

    public function workOrders() {
        return $this->hasMany(WorkOrder::class);
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

                $query->where(function ($subQuery) use ($word) {

                    $like = "%{$word}%";

                    $subQuery->where('name', 'LIKE', $like)
                        ->orWhere('phone', 'LIKE', $like)
                        ->orWhere('email', 'LIKE', $like);
                });
            }
        });
    }

    public function getInitialsAttribute(): string
    {
        return collect(explode(' ', $this->name))
            ->map(fn ($word) => strtoupper(substr($word, 0, 1)))
            ->join('');
    }
}
