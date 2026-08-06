<?php

namespace Database\Factories;

use App\Models\ContactChannel;
use App\Models\Customer;
use App\Models\InvoiceOption;
use App\Models\LeadSource;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    protected $model = Customer::class;

    /**
     * Nombres y apellidos mexicanos para mayor realismo
     */
    protected $firstNames = [
        'Carlos', 'Juan', 'Miguel', 'José', 'Luis', 'Pedro', 'Andrés', 'Roberto',
        'Fernando', 'Ricardo', 'Alejandro', 'Eduardo', 'Jorge', 'Mario', 'Sergio',
        'María', 'Ana', 'Laura', 'Sofía', 'Gabriela', 'Fernanda', 'Claudia',
        'Patricia', 'Valentina', 'Karla', 'Verónica', 'Daniela', 'Mónica', 'Diana',
    ];

    protected $lastNames = [
        'García', 'Martínez', 'López', 'González', 'Hernández', 'Pérez', 'Sánchez',
        'Ramírez', 'Torres', 'Flores', 'Rivera', 'Gómez', 'Díaz', 'Reyes', 'Cruz',
        'Morales', 'Ortiz', 'Gutiérrez', 'Chávez', 'Ramos', 'Mendoza', 'Castillo',
        'Jiménez', 'Vargas', 'Ruiz', 'Medina', 'Aguilar', 'Moreno', 'Muñoz',
    ];

    protected $companies = [
        'Ferretería El Clavo', 'Papelería Díaz', 'Taller Mecánico Rápido',
        'Consultorio Dental Sonrisa', 'Estética Bella', 'Abarrotes La Esquina',
        'Impresos y Copias Plus', 'Despacho Contable Fiscal', 'Farmacia del Pueblo',
        'Gimnasio FitLife', 'Escuela Primaria Benito Juárez', 'Notaría 42',
        'Constructora MX', 'Transportes del Norte', 'Restaurante El Fogón',
        'Boutique Moda Actual', 'Agencia de Viajes Horizonte', 'Clínica Bienestar',
        'Distribuidora de Refacciones', 'Librería Cultural Moderna',
        null, null, null, // algunos clientes no tienen empresa
    ];

    public function definition(): array
    {
        $firstName  = $this->faker->randomElement($this->firstNames);
        $lastName1  = $this->faker->randomElement($this->lastNames);
        $lastName2  = $this->faker->randomElement($this->lastNames);
        $name       = "{$firstName} {$lastName1} {$lastName2}";

        $phone          = $this->generateMexicanPhone();
        $phoneWhatsapp  = $this->faker->boolean(75); // 75% tiene WA en tel1

        $hasEmail = $this->faker->boolean(65);
        $email    = $hasEmail
            ? $this->faker->unique()->safeEmail()
            : null;

        $company = $this->faker->randomElement($this->companies);

        // Relaciones desde BD (ya deben existir por seeders)
        $invoiceOption  = InvoiceOption::inRandomOrder()->first();
        $leadSource     = LeadSource::inRandomOrder()->first();
        $contactChannel = ContactChannel::inRandomOrder()->first();

        // Datos fiscales: solo si la opción de factura es "Sí, rigurosa"
        $needsInvoice = $invoiceOption && $invoiceOption->invoice;
        $businessName = $needsInvoice ? $this->generateBusinessName($company, $name) : null;
        $taxId        = $needsInvoice ? $this->generateRFC($firstName, $lastName1, $lastName2) : null;

        // Contactos autorizados: algunos clientes los tienen
        $authorizedContacts = $this->faker->boolean(35)
            ? $this->generateAuthorizedContacts()
            : null;

        return [
            'name'                => $name,
            'phone'              => $phone,
            'phone_whatsapp'     => $phoneWhatsapp,
            'email'               => $email,
            'company'             => $company,
            'invoice_option_id'   => $invoiceOption ? $invoiceOption->id : 1,
            'lead_source_id'      => $leadSource ? $leadSource->id : 1,
            'contact_channel_id'  => $contactChannel ? $contactChannel->id : 1,
            'photo_path'          => null,
        ];
    }

    // ─────────────────────────────────────────────
    // Helpers
    // ─────────────────────────────────────────────

    /**
     * Genera un número telefónico mexicano realista (10 dígitos)
     * Ladas comunes: 33 (GDL), 55 (CDMX), 81 (MTY), 222 (Puebla), etc.
     */
    protected function generateMexicanPhone(): string
    {
        $ladas = ['33', '55', '81', '222', '442', '477', '664', '998', '999', '614'];
        $lada  = $this->faker->randomElement($ladas);

        // Completar hasta 10 dígitos
        $remaining = 10 - strlen($lada);
        $number    = $this->faker->numerify(str_repeat('#', $remaining));

        return $lada . $number;
    }

    /**
     * Genera un RFC mexicano con formato válido (persona física)
     * Formato: 4 letras + 6 dígitos fecha + 3 homoclave
     */
    protected function generateRFC(string $firstName, string $lastName1, string $lastName2): string
    {
        // Primeras letras de apellidos y nombre
        $l1   = strtoupper(substr($this->removeAccents($lastName1), 0, 2));
        $l2   = strtoupper(substr($this->removeAccents($lastName2), 0, 1));
        $name = strtoupper(substr($this->removeAccents($firstName), 0, 1));

        $year  = $this->faker->numberBetween(60, 99);
        $month = str_pad($this->faker->numberBetween(1, 12), 2, '0', STR_PAD_LEFT);
        $day   = str_pad($this->faker->numberBetween(1, 28), 2, '0', STR_PAD_LEFT);

        $homoclave = strtoupper($this->faker->bothify('??#'));

        return "{$l1}{$l2}{$name}{$year}{$month}{$day}{$homoclave}";
    }

    /**
     * Genera una razón social basada en empresa o nombre del cliente
     */
    protected function generateBusinessName(?string $company, string $name): string
    {
        if ($company) {
            $suffixes = ['S.A. de C.V.', 'S. de R.L.', 'S.C.', 'S.A.'];
            return $company . ' ' . $this->faker->randomElement($suffixes);
        }

        // Persona física con actividad empresarial
        return $name;
    }

    /**
     * Genera una lista de contactos autorizados (1 o 2 nombres)
     */
    protected function generateAuthorizedContacts(): string
    {
        $count    = $this->faker->numberBetween(1, 2);
        $contacts = [];

        for ($i = 0; $i < $count; $i++) {
            $contacts[] = $this->faker->randomElement($this->firstNames)
                . ' '
                . $this->faker->randomElement($this->lastNames);
        }

        return implode(', ', $contacts);
    }

    /**
     * Elimina acentos para el RFC
     */
    protected function removeAccents(string $string): string
    {
        $search  = ['á','é','í','ó','ú','ü','ñ','Á','É','Í','Ó','Ú','Ü','Ñ'];
        $replace = ['a','e','i','o','u','u','n','A','E','I','O','U','U','N'];

        return str_replace($search, $replace, $string);
    }
}