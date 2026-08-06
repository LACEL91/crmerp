<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Device;
use App\Models\DeviceCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            [
                'name' => 'Otra',
                'slug' => 'other',
                'alias' => null,
                'logo' => 'brands/default/logo.png',
                'label_images' => ['brands/default/label.png'],
                'labels' => null,
                'device_slugs' => ['other', 'laptop', 'inkjet', 'laser', 'aio', 'desktop', 'tablet', 'plotter'],
            ],
            [
                'name' => 'HP',
                'slug' => 'hp',
                'alias' => null,
                'logo' => 'brands/hp/logo.png',
                'label_images' => ['brands/hp/label.png'],
                'labels' => [
                    [
                        'slug' => 'family',
                        'name' => 'Familia',
                        'example' => 'Pavilion, ProBook, Spectre, X360, OMEN, Gaming, etc...',
                        'brand_only' => false
                    ],
                    [
                        'slug' => 'model',
                        'name' => 'Modelo',
                        'example' => '14-r018LA',
                        'brand_only' => false
                    ],
                    [
                        'slug' => 'part_num',
                        'name' => 'Número de parte',
                        'example' => '3PX44LA#ABM',
                        'brand_only' => true
                    ],
                    [
                        'slug' => 'serial',
                        'name' => 'Número de serie',
                        'example' => '5CG22256J0',
                        'brand_only' => false
                    ]
                ],
                'device_slugs' => ['other', 'laptop', 'inkjet', 'laser', 'aio', 'desktop', 'plotter'],
            ],
            [
                'name' => 'Asus',
                'slug' => 'asus',
                'alias' => null,
                'logo' => 'brands/asus/logo.png',
                'label_images' => ['brands/asus/label.png'],
                'labels' => [
                    [
                        'slug' => 'family',
                        'name' => 'Familia',
                        'example' => 'ROG, TUF, Zenbook',
                        'brand_only' => false
                    ],
                    [
                        'slug' => 'model',
                        'name' => 'Modelo',
                        'example' => 'GL503VD-FY276T',
                        'brand_only' => false
                    ],
                    [
                        'slug' => 'serial',
                        'name' => 'Número de serie',
                        'example' => 'K9N0CX098579388',
                        'brand_only' => false
                    ],
                    [
                        'slug' => 'date',
                        'name' => 'Fecha de fabricación',
                        'example' => '01/2010',
                        'brand_only' => true
                    ]
                ],
                'device_slugs' => ['other', 'laptop', 'aio', 'desktop', 'tablet'],
            ],
            [
                'name' => 'Dell',
                'slug' => 'dell',
                'alias' => null,
                'logo' => 'brands/dell/logo.png',
                'label_images' => ['brands/dell/label.png'],
                'labels' => [
                    [
                        'slug' => 'family',
                        'name' => 'Familia',
                        'example' => 'Inspiron 15, Vostro, Gaming, Studio, XPG, Alienware 17 R3, etc...',
                        'brand_only' => false
                    ],
                    [
                        'slug' => 'model',
                        'name' => 'Modelo',
                        'example' => '15-5447',
                        'brand_only' => false
                    ],
                    [
                        'slug' => 'st',
                        'name' => 'Service Tag',
                        'example' => '88h3g72',
                        'brand_only' => true
                    ],
                    [
                        'slug' => 'esc',
                        'name' => 'Express Service Code',
                        'example' => '38951654546',
                        'brand_only' => true
                    ]
                ],
                'device_slugs' => ['other', 'laptop', 'aio', 'desktop'],
            ],
            [
                'name' => 'Lenovo',
                'slug' => 'lenovo',
                'alias' => null,
                'logo' => 'brands/lenovo/logo.png',
                'label_images' => ['brands/lenovo/label.png'],
                'labels' => [
                    [
                        'slug' => 'family',
                        'name' => 'Familia',
                        'example' => 'IdeaPad, Yoga, Legion, Thinkpad, etc...',
                        'brand_only' => false
                    ],
                    [
                        'slug' => 'model',
                        'name' => 'Modelo',
                        'example' => 'Y520-15IKBN',
                        'brand_only' => false
                    ],
                    [
                        'slug' => 'serial',
                        'name' => 'Número de serie',
                        'example' => 'MP1D66RX',
                        'brand_only' => false
                    ],
                    [
                        'slug' => 'mtm',
                        'name' => 'MTM',
                        'example' => '80ML005NIX',
                        'brand_only' => true
                    ]
                ],
                'device_slugs' => ['other', 'laptop', 'aio', 'desktop', 'tablet'],
            ],
            [
                'name' => 'MSI',
                'slug' => 'msi',
                'alias' => null,
                'logo' => 'brands/msi/logo.png',
                'label_images' => ['brands/msi/label.png'],
                'labels' => [
                    [
                        'slug' => 'family',
                        'name' => 'Familia',
                        'example' => 'Stealth, Creator, Crosshair, Modern, Prestige, Raider, etc',
                        'brand_only' => false
                    ],
                    [
                        'slug' => 'model',
                        'name' => 'Modelo',
                        'example' => 'GL-62, GS66, GF63, Modern 15, Prestige 14',
                        'brand_only' => false
                    ],
                    [
                        'slug' => 'part_num',
                        'name' => 'Número de parte',
                        'example' => 'GL62 7RD-259MX',
                        'brand_only' => true
                    ],
                    [
                        'slug' => 'serial',
                        'name' => 'Número de serie',
                        'example' => 'GL62 7RD-259MX-BB7875H8GXXDX10MA',
                        'brand_only' => false
                    ]
                ],
                'device_slugs' => ['other', 'laptop', 'aio', 'desktop'],
            ],
            [
                'name' => 'Acer',
                'slug' => 'acer',
                'alias' => null,
                'logo' => 'brands/acer/logo.png',
                'label_images' => ['brands/acer/label.png'],
                'labels' => [
                    [
                        'slug' => 'family',
                        'name' => 'Familia',
                        'example' => 'Nitro, Predator, Aspire, Aspire S, Extensa, etc...',
                        'brand_only' => false
                    ],
                    [
                        'slug' => 'model',
                        'name' => 'Modelo',
                        'example' => 'AN515-53-7366',
                        'brand_only' => false
                    ],
                    [
                        'slug' => 'date',
                        'name' => 'Fecha de fabricación',
                        'example' => '01/2010',
                        'brand_only' => true
                    ],
                    [
                        'slug' => 'serial',
                        'name' => 'Número de serie',
                        'example' => 'NXHS6AL00X132008673400',
                        'brand_only' => false
                    ],
                ],
                'device_slugs' => ['other', 'laptop', 'aio', 'desktop', 'tablet'],
            ],
            [
                'name' => 'Apple',
                'slug' => 'apple',
                'alias' => null,
                'logo' => 'brands/apple/logo.png',
                'label_images' => ['brands/apple/label.png'],
                'labels' => [
                    [
                        'slug' => 'family',
                        'name' => 'Familia',
                        'example' => 'MacBook Pro, MacBook Air, iMac, etc.',
                        'brand_only' => false
                    ],
                    [
                        'slug' => 'model',
                        'name' => 'Modelo',
                        'example' => 'A1502',
                        'brand_only' => false
                    ],
                    [
                        'slug' => 'emc',
                        'name' => 'EMC',
                        'example' => '2346',
                        'brand_only' => true
                    ],
                    [
                        'slug' => 'date',
                        'name' => 'Año',
                        'example' => '2018',
                        'brand_only' => true
                    ],
                    [
                        'slug' => 'serial',
                        'name' => 'Número de serie',
                        'example' => 'C02NPXV3G3QH',
                        'brand_only' => false
                    ],
                ],
                'device_slugs' => ['other', 'laptop', 'aio', 'desktop', 'tablet'],
            ],
            [
                'name' => 'Toshiba',
                'slug' => 'toshiba',
                'alias' => null,
                'logo' => 'brands/toshiba/logo.png',
                'label_images' => ['brands/toshiba/label.png'],
                'labels' => [
                    [
                        'slug' => 'family',
                        'name' => 'Familia',
                        'example' => 'Satellite, Tecra, Qosmio, etc...',
                        'brand_only' => false
                    ],
                    [
                        'slug' => 'model',
                        'name' => 'Modelo',
                        'example' => 'L855D-S5117',
                        'brand_only' => false
                    ],
                    [
                        'slug' => 'part_num',
                        'name' => 'Número de parte',
                        'example' => 'PSKMAM-02HTM1',
                        'brand_only' => true
                    ],
                    [
                        'slug' => 'serial',
                        'name' => 'Número de serie',
                        'example' => '82014233PU',
                        'brand_only' => true
                    ]
                ],
                'device_slugs' => ['other', 'laptop', 'aio', 'desktop'],
            ],
            [
                'name' => 'Razer',
                'slug' => 'razer',
                'alias' => null,
                'logo' => 'brands/razer/logo.png',
                'label_images' => ['brands/razer/label.png'],
                'labels' => [
                    [
                        'slug' => 'family',
                        'name' => 'Familia',
                        'example' => 'Blade 15, etc...',
                        'brand_only' => false
                    ],
                    [
                        'slug' => 'model',
                        'name' => 'Modelo',
                        'example' => 'RZ09-01962E12-MSU1',
                        'brand_only' => false
                    ],
                    [
                        'slug' => 'serial',
                        'name' => 'Número de serie',
                        'example' => 'BY1735A34800675',
                        'brand_only' => false
                    ]
                ],
                'device_slugs' => ['other', 'laptop', 'aio', 'desktop'],
            ],
            [
                'name' => 'Huawei',
                'slug' => 'huawei',
                'alias' => null,
                'logo' => 'brands/huawei/logo.png',
                'label_images' => ['brands/huawei/label.png'],
                'labels' => [
                    [
                        'slug' => 'family',
                        'name' => 'Familia',
                        'example' => 'MateBook D 15, MateBook X Pro, etc.',
                        'brand_only' => false
                    ],
                    [
                        'slug' => 'model',
                        'name' => 'Modelo',
                        'example' => 'BOHK-WAX9X',
                        'brand_only' => false
                    ],
                    [
                        'slug' => 'part_num',
                        'name' => 'Número de parte',
                        'example' => '53012JET',
                        'brand_only' => false
                    ],
                    [
                        'slug' => 'serial',
                        'name' => 'Número de serie',
                        'example' => null,
                        'brand_only' => false
                    ]
                ],
                'device_slugs' => ['other', 'laptop', 'aio', 'desktop', 'tablet'],
            ],
            [
                'name' => 'Ghia',
                'slug' => 'ghia',
                'alias' => null,
                'logo' => 'brands/ghia/logo.png',
                'label_images' => ['brands/ghia/label.png'],
                'labels' => [
                    [
                        'slug' => 'family',
                        'name' => 'Familia',
                        'example' => 'Libero, Shift, etc.',
                        'brand_only' => false
                    ],
                    [
                        'slug' => 'model',
                        'name' => 'Modelo',
                        'example' => 'PCGHIA-2062, LH514CP',
                        'brand_only' => false
                    ],
                    [
                        'slug' => 'serial',
                        'name' => 'Número de serie',
                        'example' => null,
                        'brand_only' => false
                    ]
                ],
                'device_slugs' => ['other', 'laptop', 'aio', 'desktop', 'tablet'],
            ],
            [
                'name' => 'Epson',
                'slug' => 'epson',
                'alias' => null,
                'logo' => 'brands/epson/logo.png',
                'label_images' => ['brands/epson/label.png'],
                'labels' => null,
                'device_slugs' => ['other', 'inkjet', 'laser', 'plotter'],
            ],
            [
                'name' => 'Samsung',
                'slug' => 'samsung',
                'alias' => null,
                'logo' => 'brands/samsung/logo.png',
                'label_images' => ['brands/samsung/label.png'],
                'labels' => [
                    [
                        'slug' => 'family',
                        'name' => 'Familia',
                        'example' => 'Galaxy Book, Notebook, etc.',
                        'brand_only' => false
                    ],
                    [
                        'slug' => 'model',
                        'name' => 'Modelo',
                        'example' => 'NP370r4e-a05mx',
                        'brand_only' => false
                    ],
                    [
                        'slug' => 'serial',
                        'name' => 'Número de serie',
                        'example' => null,
                        'brand_only' => false
                    ]
                ],
                'device_slugs' => ['other', 'laptop', 'inkjet', 'laser', 'aio', 'desktop', 'tablet', 'plotter'],
            ],
            [
                'name' => 'Gateway',
                'slug' => 'gateway',
                'alias' => null,
                'logo' => 'brands/gateway/logo.png',
                'label_images' => ['brands/gateway/label.png'],
                'labels' => [
                    [
                        'slug' => 'family',
                        'name' => 'Familia',
                        'example' => 'NV Series, Creator Series, etc.',
                        'brand_only' => false
                    ],
                    [
                        'slug' => 'model',
                        'name' => 'Modelo',
                        'example' => 'NV57H37m ó ZK4850-MT30P',
                        'brand_only' => false
                    ],
                    [
                        'slug' => 'serial',
                        'name' => 'Número de serie',
                        'example' => 'GWTN141-4BK20KBM00923',
                        'brand_only' => false
                    ]
                ],
                'device_slugs' => ['other', 'laptop', 'aio', 'desktop'],
            ],
            [
                'name' => 'Compaq',
                'slug' => 'compaq',
                'alias' => null,
                'logo' => 'brands/compaq/logo.png',
                'label_images' => ['brands/compaq/label.png'],
                'labels' => [
                    [
                        'slug' => 'model',
                        'name' => 'Modelo',
                        'example' => 'CQ43-305LA',
                        'brand_only' => false
                    ],
                    [
                        'slug' => 'serial',
                        'name' => 'Número de serie',
                        'example' => null,
                        'brand_only' => false
                    ]
                ],
                'device_slugs' => ['other', 'laptop', 'aio', 'desktop', 'tablet'],
            ],
            [
                'name' => 'Sony',
                'slug' => 'sony',
                'alias' => null,
                'logo' => 'brands/sony/logo.png',
                'label_images' => ['brands/sony/label.png'],
                'labels' => [
                    [
                        'slug' => 'family',
                        'name' => 'Familia',
                        'example' => 'VAIO, PCG Series, etc.',
                        'brand_only' => false
                    ],
                    [
                        'slug' => 'model',
                        'name' => 'Modelo',
                        'example' => 'PCG-61A11U ó SF144B1EU',
                        'brand_only' => false
                    ],
                    [
                        'slug' => 'serial',
                        'name' => 'Número de serie',
                        'example' => null,
                        'brand_only' => false
                    ]
                ],
                'device_slugs' => ['other', 'laptop', 'aio', 'desktop'],
            ],
            [
                'name' => 'Lanix',
                'slug' => 'lanix',
                'alias' => null,
                'logo' => 'brands/lanix/logo.png',
                'label_images' => ['brands/lanix/label.png'],
                'labels' => [
                    [
                        'slug' => 'family',
                        'name' => 'Familia',
                        'example' => 'Neuron',
                        'brand_only' => false
                    ],
                    [
                        'slug' => 'model',
                        'name' => 'Modelo',
                        'example' => 'A, V, X, Pro, G6, etc.',
                        'brand_only' => false
                    ],
                    [
                        'slug' => 'serial',
                        'name' => 'Número de serie',
                        'example' => null,
                        'brand_only' => false
                    ]
                ],
                'device_slugs' => ['other', 'laptop', 'aio', 'desktop', 'tablet'],
            ],
            [
                'name' => 'Brother',
                'slug' => 'brother',
                'alias' => null,
                'logo' => 'brands/brother/logo.png',
                'label_images' => ['brands/brother/label.png'],
                'labels' => null,
                'device_slugs' => ['other', 'inkjet', 'laser', 'plotter'],
            ],
            [
                'name' => 'Canon',
                'slug' => 'canon',
                'alias' => null,
                'logo' => 'brands/canon/logo.png',
                'label_images' => ['brands/canon/label.png'],
                'labels' => null,
                'device_slugs' => ['other', 'inkjet', 'laser', 'plotter'],
            ],
            [
                'name' => 'Xerox',
                'slug' => 'xerox',
                'alias' => null,
                'logo' => 'brands/xerox/logo.png',
                'label_images' => ['brands/xerox/label.png'],
                'labels' => null,
                'device_slugs' => ['other', 'inkjet', 'laser', 'plotter'],
            ],
            [
                'name' => 'Kyocera',
                'slug' => 'kyocera',
                'alias' => null,
                'logo' => 'brands/kyocera/logo.png',
                'label_images' => ['brands/kyocera/label.png'],
                'labels' => null,
                'device_slugs' => ['other', 'inkjet', 'laser', 'plotter'],
            ],
            [
                'name' => 'Lexmark',
                'slug' => 'lexmark',
                'alias' => null,
                'logo' => 'brands/lexmark/logo.png',
                'label_images' => ['brands/lexmark/label.png'],
                'labels' => null,
                'device_slugs' => ['other', 'inkjet', 'laser', 'plotter'],
            ],
        ];

        foreach ($brands as $data) {
            $marca = Brand::create([
                'slug' => $data['slug'],
                'name' => $data['name'],
                'logo' => $data['logo'],
                'label_images' => $data['label_images'],
                'labels' => $data['labels'],
            ]);

            // // Buscar los IDs de los device_slugs relacionados usando el campo 'tipo'
            $deviceIds = Device::whereIn('slug', $data['device_slugs'])->pluck('id');

            // // Sincronizar los device_slugs con la marca
            $marca->devices()->sync($deviceIds);
        }
    }
}
