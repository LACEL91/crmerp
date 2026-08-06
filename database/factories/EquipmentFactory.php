<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Equipment;
use App\Models\Subdevice;
use Illuminate\Database\Eloquent\Factories\Factory;

class EquipmentFactory extends Factory
{
    protected $model = Equipment::class;

    protected $brandDeviceMap = [
        'other'   => ['other', 'laptop', 'inkjet', 'laser', 'aio', 'desktop', 'tablet', 'plotter'],
        'hp'      => ['other', 'laptop', 'inkjet', 'laser', 'aio', 'desktop', 'plotter'],
        'asus'    => ['other', 'laptop', 'aio', 'desktop', 'tablet'],
        'dell'    => ['other', 'laptop', 'aio', 'desktop'],
        'lenovo'  => ['other', 'laptop', 'aio', 'desktop', 'tablet'],
        'msi'     => ['other', 'laptop', 'aio', 'desktop'],
        'acer'    => ['other', 'laptop', 'aio', 'desktop', 'tablet'],
        'apple'   => ['other', 'laptop', 'aio', 'desktop', 'tablet'],
        'toshiba' => ['other', 'laptop', 'aio', 'desktop'],
        'razer'   => ['other', 'laptop', 'aio', 'desktop'],
        'huawei'  => ['other', 'laptop', 'aio', 'desktop', 'tablet'],
        'ghia'    => ['other', 'laptop', 'aio', 'desktop', 'tablet'],
        'epson'   => ['other', 'inkjet', 'laser', 'plotter'],
        'samsung' => ['other', 'laptop', 'inkjet', 'laser', 'aio', 'desktop', 'tablet', 'plotter'],
        'gateway' => ['other', 'laptop', 'aio', 'desktop'],
        'compaq'  => ['other', 'laptop', 'aio', 'desktop', 'tablet'],
        'sony'    => ['other', 'laptop', 'aio', 'desktop'],
        'lanix'   => ['other', 'laptop', 'aio', 'desktop', 'tablet'],
        'brother' => ['other', 'inkjet', 'laser', 'plotter'],
        'canon'   => ['other', 'inkjet', 'laser', 'plotter'],
        'xerox'   => ['other', 'inkjet', 'laser', 'plotter'],
        'kyocera' => ['other', 'inkjet', 'laser', 'plotter'],
        'lexmark' => ['other', 'inkjet', 'laser', 'plotter'],
    ];

    protected $brandFamilies = [
        'hp'      => ['Pavilion', 'ProBook', 'Spectre', 'OMEN', 'EliteBook', 'Envy', 'ZBook'],
        'asus'    => ['ROG', 'TUF', 'Zenbook', 'VivoBook', 'ProArt'],
        'dell'    => ['Inspiron', 'Vostro', 'XPS', 'Alienware', 'Latitude', 'Precision'],
        'lenovo'  => ['IdeaPad', 'Yoga', 'Legion', 'ThinkPad', 'ThinkBook'],
        'msi'     => ['Stealth', 'Creator', 'Modern', 'Prestige', 'Raider', 'GF63', 'GS66'],
        'acer'    => ['Nitro', 'Predator', 'Aspire', 'Extensa', 'Swift', 'Spin'],
        'apple'   => ['MacBook Pro', 'MacBook Air', 'iMac', 'Mac Mini', 'iPad Pro', 'iPad Air'],
        'toshiba' => ['Satellite', 'Tecra', 'Qosmio', 'Portégé'],
        'razer'   => ['Blade 15', 'Blade 14', 'Blade Pro'],
        'huawei'  => ['MateBook D 15', 'MateBook X Pro', 'MateBook 14', 'MatePad'],
        'ghia'    => ['Libero', 'Shift'],
        'samsung' => ['Galaxy Book', 'Notebook'],
        'gateway' => ['NV Series', 'Creator Series', 'Ultra Slim'],
        'compaq'  => ['CQ Series', 'Presario'],
        'sony'    => ['VAIO', 'PCG Series'],
        'lanix'   => ['Neuron A', 'Neuron V', 'Neuron X', 'Neuron Pro'],
    ];

    /**
     * Marcas que NO tienen campo serial en la tabla (usan metadata o simplemente no tienen)
     */
    protected $brandsWithoutSerial = ['dell', 'toshiba'];

    public function definition(): array
    {
        $brand = Brand::inRandomOrder()->first()
            ?? Brand::factory()->create();

        $brandSlug = $brand->slug;

        $compatibleDeviceSlugs = isset($this->brandDeviceMap[$brandSlug])
            ? $this->brandDeviceMap[$brandSlug]
            : ['other'];

        $subdevice = Subdevice::whereHas('device', function ($q) use ($compatibleDeviceSlugs) {
            $q->whereIn('slug', $compatibleDeviceSlugs);
        })->inRandomOrder()->first();

        if (!$subdevice) {
            $subdevice = Subdevice::inRandomOrder()->firstOrFail();
        }

        $family = $this->generateFamily($brandSlug);
        $model  = $this->generateModel($brandSlug);
        $serial = $this->generateSerial($brandSlug);
        $color  = $this->faker->randomElement([
            'Negro', 'Plata', 'Gris', 'Blanco', 'Azul', 'Rojo', 'Dorado', 'Rosa',
        ]);

        $extraMetadata = $this->generateExtraMetadata($brandSlug);

        $fullName = $this->buildFullName(
            $brand->name,
            $family,
            $model,
            $serial,
            $color,
            $extraMetadata
        );

        return [
            'subdevice_id'   => $subdevice->id,
            'brand_id'       => $brand->id,
            'family'         => $family,
            'model'          => $model,
            'serial'         => $serial,
            'color'          => $color,
            'full_name'      => $fullName,
            'metadata' => !empty($extraMetadata) ? $extraMetadata : null,
        ];
    }

    // ─────────────────────────────────────────────
    // Helpers
    // ─────────────────────────────────────────────

    protected function generateFamily(string $brandSlug): ?string
    {
        if (!isset($this->brandFamilies[$brandSlug])) {
            return null;
        }

        return $this->faker->randomElement($this->brandFamilies[$brandSlug]);
    }

    protected function generateModel(string $brandSlug): ?string
    {
        $patterns = [
            'hp'      => $this->faker->bothify('??###-??###??'),
            'asus'    => $this->faker->bothify('??###??-??###?'),
            'dell'    => $this->faker->bothify('##-####'),
            'lenovo'  => $this->faker->bothify('?###-##???'),
            'msi'     => $this->faker->bothify('??## ##?'),
            'acer'    => $this->faker->bothify('??###-##-####'),
            'apple'   => 'A' . $this->faker->numerify('####'),
            'toshiba' => $this->faker->bothify('?###?-?####'),
            'razer'   => 'RZ09-' . $this->faker->numerify('#####') . $this->faker->bothify('?##-???#'),
            'huawei'  => $this->faker->bothify('????-???#?'),
            'ghia'    => $this->faker->bothify('PCGHIA-####'),
            'samsung' => 'NP' . $this->faker->bothify('###??-??#??'),
            'gateway' => $this->faker->bothify('??##??-??###?'),
            'compaq'  => $this->faker->bothify('CQ##-###??'),
            'sony'    => $this->faker->bothify('PCG-##?##?'),
            'lanix'   => $this->faker->bothify('NXG-####'),
        ];

        return isset($patterns[$brandSlug])
            ? $patterns[$brandSlug]
            : $this->faker->bothify('??##-###');
    }

    protected function generateSerial(string $brandSlug): ?string
    {
        // Estas marcas no tienen serial en el campo directo
        if (in_array($brandSlug, $this->brandsWithoutSerial, true)) {
            return null;
        }

        $serials = [
            'hp'      => strtoupper($this->faker->bothify('?CG#####??')),
            'asus'    => strtoupper($this->faker->bothify('??#?CX######???')),
            'lenovo'  => strtoupper($this->faker->bothify('??#?##??')),
            'msi'     => strtoupper($this->faker->bothify('??#####-###??-??#???##???##')),
            'acer'    => strtoupper($this->faker->bothify('??####??##?####')),
            'apple'   => strtoupper($this->faker->bothify('C##??##???##')),
            'razer'   => strtoupper($this->faker->bothify('??####?######')),
            'huawei'  => strtoupper($this->faker->bothify('??##??##???##')),
            'ghia'    => strtoupper($this->faker->bothify('GH-####-????')),
            'samsung' => strtoupper($this->faker->bothify('??##???###??')),
            'gateway' => strtoupper($this->faker->bothify('??TN###-#??##???#####')),
            'compaq'  => strtoupper($this->faker->bothify('CQ-#######')),
            'sony'    => strtoupper($this->faker->bothify('??#??##?###')),
            'lanix'   => strtoupper($this->faker->bothify('LX-########')),
        ];

        return isset($serials[$brandSlug])
            ? $serials[$brandSlug]
            : null;
    }

    protected function generateExtraMetadata(string $brandSlug): array
    {
        $meta = [];

        switch ($brandSlug) {
            case 'hp':
                $meta['part_num'] = strtoupper($this->faker->bothify('###????#???'));
                break;

            case 'asus':
                $meta['date'] = $this->faker->numberBetween(1, 12)
                    . '/' . $this->faker->numberBetween(2010, 2023);
                break;

            case 'dell':
                $meta['st']  = strtoupper($this->faker->bothify('#?#??##'));
                $meta['esc'] = $this->faker->numerify('###########');
                break;

            case 'lenovo':
                $meta['mtm'] = strtoupper($this->faker->bothify('##??###???'));
                break;

            case 'msi':
                $meta['part_num'] = strtoupper($this->faker->bothify('??## ###-###??'));
                break;

            case 'acer':
                $meta['date'] = $this->faker->numberBetween(1, 12)
                    . '/' . $this->faker->numberBetween(2010, 2023);
                break;

            case 'apple':
                $meta['emc']  = (string) $this->faker->numberBetween(2000, 3999);
                $meta['date'] = (string) $this->faker->numberBetween(2015, 2023);
                break;

            case 'toshiba':
                $meta['part_num'] = strtoupper($this->faker->bothify('??####??-##???#'));
                $meta['serial']   = strtoupper($this->faker->numerify('##########'));
                break;

            case 'huawei':
                $meta['part_num'] = strtoupper($this->faker->numerify('########'));
                break;
        }

        return $meta;
    }

    protected function buildFullName(
        string $brandName,
        ?string $family,
        ?string $model,
        ?string $serial,
        string $color,
        array $extraMetadata
    ): string {
        $parts = array_filter([
            $brandName,
            $family,
            $model,
            $serial,
            $color,
            !empty($extraMetadata) ? implode(' ', array_values($extraMetadata)) : null,
        ]);

        return implode(' ', $parts);
    }
}