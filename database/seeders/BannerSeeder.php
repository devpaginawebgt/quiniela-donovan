<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $banners = [
            [
                'name'      => 'app-proximos-partidos-compleben',
                'url'       => '/images/banners/BANNER_1080x660px_COMPLEBEN_FEB_2026.jpg',
                'module_id' => 1,
            ],
            [
                'name'      => 'app-proximos-partidos-donotos',
                'url'       => '/images/banners/BANNER_1080x660px_DONOTOS_FEB_2026.jpg',
                'module_id' => 1,
            ],
            [
                'name'      => 'app-proximos-partidos-florabasil',
                'url'       => '/images/banners/BANNER_1080x660px_FLORABASIL_FEB_2026.jpg',
                'module_id' => 1,
            ],
            [
                'name'      => 'app-proximos-partidos-glifoglu',
                'url'       => '/images/banners/BANNER_1080x660px_GLIFOGLU_FEB_2026.jpg',
                'module_id' => 1,
            ],
            [
                'name'      => 'app-proximos-partidos-principal-feb',
                'url'       => '/images/banners/BANNER_1080x660px_PRINCIPAL_FEB_2026.jpg',
                'module_id' => 1,
            ],
            [
                'name'      => 'app-proximos-partidos-tetravit-feb',
                'url'       => '/images/banners/BANNER_1080x660px_TETRAVIT_FEB_2026.jpg',
                'module_id' => 1,
            ],
            [
                'name'      => 'app-proximos-partidos-viridon-hpb-feb',
                'url'       => '/images/banners/BANNER_1080x660px_VIRIDON_HPB_FEB_2026.jpg',
                'module_id' => 1,
            ],
            [
                'name'      => 'app-mis-pronosticos-florabasil-gif',
                'url'       => '/images/banners/BANNER_ANIMADO_1080x480px_FLORABASIL_FEB_2026-ezgif.com-video-to-gif-converter.gif',
                'module_id' => 2,
            ],
            [
                'name'      => 'app-calendario-florabasil-gif',
                'url'       => '/images/banners/BANNER_ANIMADO_1080x480px_FLORABASIL_FEB_2026-ezgif.com-video-to-gif-converter.gif',
                'module_id' => 3,
            ],
            [
                'name'      => 'app-selecciones-florabasil-gif',
                'url'       => '/images/banners/BANNER_ANIMADO_1080x480px_FLORABASIL_FEB_2026-ezgif.com-video-to-gif-converter.gif',
                'module_id' => 4,
            ],
            [
                'name'      => 'app-grupos-florabasil-gif',
                'url'       => '/images/banners/BANNER_ANIMADO_1080x480px_FLORABASIL_FEB_2026-ezgif.com-video-to-gif-converter.gif',
                'module_id' => 5,
            ],
            [
                'name'      => 'app-sedes-florabasil-gif',
                'url'       => '/images/banners/BANNER_ANIMADO_1080x480px_FLORABASIL_FEB_2026-ezgif.com-video-to-gif-converter.gif',
                'module_id' => 6,
            ],
        ];

        foreach($banners as $banner) {
            Banner::create($banner);
        }
    }
}
