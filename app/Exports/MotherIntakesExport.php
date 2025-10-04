<?php

namespace App\Exports;

use App\Models\MotherIntake;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class MotherIntakesExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize
{
    public function query()
    {
        return MotherIntake::query()->orderByDesc('id');
    }

    public function headings(): array
    {
        return [
            'ID', 'Full Name', 'Phone',
            'Journey Stage', 'Pregnancy Weeks', 'Baby Weeks Old', 'Hospital Planned', 'Agree Comms', 'Disclaimer Ack',
            'Email', 'Age', 'Pregnancy Stage', 'Due Date', 'Location',
            'Previous Pregnancies', 'Concerns', 'Interests', 'Status', 'Reviewed By', 'Reviewed At',
            'Completed At', 'Notes', 'Priority', 'User ID', 'Created At', 'Updated At',
        ];
    }

    public function map($r): array
    {
        return [
            $r->id,
            $r->full_name,
            $r->phone,
            $r->journey_stage,
            $r->pregnancy_weeks,
            $r->baby_weeks_old,
            $r->hospital_planned,
            $r->agree_comms ? 'Yes' : 'No',
            $r->disclaimer_ack ? 'Yes' : 'No',
            $r->email,
            $r->age,
            $r->pregnancy_stage,
            optional($r->due_date)->toString() ?? $r->due_date,
            $r->location,
            $r->previous_pregnancies,
            $r->concerns,
            $r->interests,
            $r->status,
            $r->reviewed_by,
            optional($r->reviewed_at)->toDateTimeString(),
            optional($r->completed_at)->toDateTimeString(),
            $r->notes,
            $r->priority,
            $r->user_id,
            optional($r->created_at)->toDateTimeString(),
            optional($r->updated_at)->toDateTimeString(),
        ];
    }
}
