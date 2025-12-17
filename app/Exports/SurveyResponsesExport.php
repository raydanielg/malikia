<?php

namespace App\Exports;

use App\Models\SurveyResponse;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class SurveyResponsesExport implements FromCollection, WithHeadings, WithMapping, WithStyles
{
    public function collection()
    {
        return SurveyResponse::latest()->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Tarehe',
            'Umri',
            'Kiasi cha Damu',
            'Brand Inayotumika',
            'Sababu za Kuchagua',
            'Mambo Muhimu',
            'Aina ya Taulo',
            'Mabawa',
            'Harufu',
            'Sababu ya Harufu',
            'Muwasho',
            'Vitu Visivyopendeza',
            'Kuacha Brand',
            'Maelezo ya Kuacha',
            'Bei',
            'Kulipa Zaidi',
            'Taulo Nzuri',
            'Taulo Bora',
            'Tatizo Lisilotatibiwa',
            'Jaribu Brand Mpya',
            'Maoni Mengine',
            'IP Address',
        ];
    }

    public function map($survey): array
    {
        return [
            $survey->id,
            $survey->created_at->format('Y-m-d H:i'),
            $survey->age_group_label,
            $survey->flow_level_label,
            $survey->current_brand,
            is_array($survey->reasons) ? implode(', ', $survey->reasons) : '',
            is_array($survey->important_features) ? implode(', ', $survey->important_features) : '',
            $survey->pad_type ?? '',
            $survey->wings_preference ?? '',
            $survey->scented_preference ?? '',
            $survey->scented_reason ?? '',
            $survey->irritation_frequency ?? '',
            is_array($survey->dislikes) ? implode(', ', $survey->dislikes) : '',
            $survey->stopped_brand ?? '',
            $survey->stopped_brand_explain ?? '',
            $survey->price_range_label,
            $survey->pay_more ?? '',
            $survey->good_pad_definition ?? '',
            $survey->ideal_pad ?? '',
            $survey->unresolved_problem ?? '',
            $survey->try_new_brand,
            $survey->other_comments ?? '',
            $survey->ip_address ?? '',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true, 'size' => 12]],
        ];
    }
}
