<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyResponse extends Model
{
    use HasFactory;

    protected $fillable = [
        // Sehemu ya 1: Kuhusu wewe
        'age_group',
        'flow_level',
        
        // Sehemu ya 2: Unachotumia sasa
        'current_brand',
        'reasons',
        
        // Sehemu ya 3: Taulo nzuri ni ipi?
        'important_features',
        'pad_type',
        'wings_preference',
        'scented_preference',
        'scented_reason',
        'irritation_frequency',
        
        // Sehemu ya 4: Mambo ya kuepuka
        'dislikes',
        'stopped_brand',
        'stopped_brand_explain',
        
        // Sehemu ya 5: Bei & thamani
        'price_range',
        'pay_more',
        'good_pad_definition',
        
        // Sehemu ya 6: Maoni ya kweli
        'ideal_pad',
        'unresolved_problem',
        'try_new_brand',
        'other_comments',
        
        // Metadata
        'ip_address',
        'user_agent',
    ];

    protected $casts = [
        'reasons' => 'array',
        'important_features' => 'array',
        'dislikes' => 'array',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get age group label
     */
    public function getAgeGroupLabelAttribute(): string
    {
        $labels = [
            'below_18' => 'Chini ya miaka 18',
            '18_24' => '18–24',
            '25_34' => '25–34',
            '35_44' => '35–44',
            '45_plus' => '45+',
        ];
        
        return $labels[$this->age_group] ?? $this->age_group;
    }

    /**
     * Get flow level label
     */
    public function getFlowLevelLabelAttribute(): string
    {
        $labels = [
            'light' => 'Kidogo',
            'medium' => 'Cha kati',
            'heavy' => 'Kingi',
            'very_heavy' => 'Kingi sana',
        ];
        
        return $labels[$this->flow_level] ?? $this->flow_level;
    }

    /**
     * Get price range label
     */
    public function getPriceRangeLabelAttribute(): string
    {
        $labels = [
            'under_2000' => 'Chini ya 2,000',
            '2000_4000' => '2,000–4,000',
            '4000_6000' => '4,000–6,000',
            'over_6000' => 'Zaidi ya 6,000',
        ];
        
        return $labels[$this->price_range] ?? $this->price_range;
    }

    /**
     * Scope for filtering by age group
     */
    public function scopeByAgeGroup($query, string $ageGroup)
    {
        return $query->where('age_group', $ageGroup);
    }

    /**
     * Scope for filtering by flow level
     */
    public function scopeByFlowLevel($query, string $flowLevel)
    {
        return $query->where('flow_level', $flowLevel);
    }

    /**
     * Scope for recent responses
     */
    public function scopeRecent($query, int $days = 30)
    {
        return $query->where('created_at', '>=', now()->subDays($days));
    }
}
