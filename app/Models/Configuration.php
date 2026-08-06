<?php

namespace App\Models;

use App\Services\ConfigurationService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    use HasFactory;

    protected $table = "configurations";
    public $timestamps = false;
    protected $fillable = [
        'key',
        'value',
        'type',
        'label',
        'description',
        'group',
    ];

    public function getCastValueAttribute() {
        if ($this->value === null || $this->value === '') {
            return null;
        }

        switch ($this->type) {
            case 'integer':
                return (int) $this->value;

            case 'decimal':
                return (float) $this->value;

            case 'boolean':
                return filter_var($this->value, FILTER_VALIDATE_BOOLEAN);

            case 'json':
                return json_decode($this->value, true);

            default:
                return $this->value;
        }
    }

    // ─────────────────────────────────────────────
    // Helpers estáticos (delegan al servicio)
    //
    // Se conservan para conveniencia en contextos donde
    // no quieres importar el servicio explícitamente.
    // ─────────────────────────────────────────────
 
    /**
     * Obtiene un valor del sistema con caché.
     * Equivalente a sys_config($key, $default).
     *
     * @param  string $key
     * @param  mixed  $default
     * @return mixed
     */
    public static function get(string $key, mixed $default = null): mixed
    {
        return app(ConfigurationService::class)->get($key, $default);
    }
 
    /**
     * Actualiza un valor e invalida el caché.
     * Equivalente a app(ConfigurationService::class)->set($key, $value).
     *
     * @param  string $key
     * @param  mixed  $value
     */
    public static function set(string $key, mixed $value): void
    {
        app(ConfigurationService::class)->set($key, $value);
    }
 
    // ─────────────────────────────────────────────
    // Scopes
    // ─────────────────────────────────────────────
 
    public function scopeGroup($query, string $group)
    {
        return $query->where('group', $group);
    }
 
    public function scopeSensitive($query)
    {
        return $query->where('is_sensitive', true);
    }
}
