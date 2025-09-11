<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['name' => 'Asha M.', 'content' => 'Nilipata mwongozo wa kila wiki unaoendana na hatua yangu. Ilinipa amani ya moyo na kujiamini.'],
            ['name' => 'Neema K.', 'content' => 'Jamii imenisaidia sana. Maswali yangu hupata majibu ya haraka na yenye huruma.'],
            ['name' => 'Zainabu S.', 'content' => 'Ushauri wa kunyonyesha ulinisaidia kuanza vizuri. Safari yangu imekuwa nyepesi zaidi.'],
            ['name' => 'Rehema T.', 'content' => 'Makala na video zimekuwa msaada mkubwa kuelewa mabadiliko ya mwili wangu.'],
            ['name' => 'Flora N.', 'content' => 'Nimepata utulivu na mpango wa kujifungua baada ya kuunganishwa na mtaalamu.'],
            ['name' => 'Saumu L.', 'content' => 'Ratiba ya wiki imenisaidia kupanga lishe na mazoezi kwa usalama.'],
            ['name' => 'Maria P.', 'content' => 'Nimependa ufuatiliaji wa hatua; najua nini cha kutarajia kila mwezi.'],
            ['name' => 'Agnes J.', 'content' => 'Nilipata majibu ya wasiwasi wangu wa usingizi wa mtoto kwa haraka.'],
            ['name' => 'Halima D.', 'content' => 'Rasilimali baada ya kujifungua zilinisaidia kurejea nguvu na kujiamini.'],
            ['name' => 'Sophia K.', 'content' => 'Nimefurahia upendo wa jamii—huisi hauko peke yako kwenye safari hii.'],
        ];

        foreach ($data as $row) {
            Testimonial::create($row);
        }
    }
}
