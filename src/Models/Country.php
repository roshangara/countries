<?php

namespace Roshangara\Countries;

use Illuminate\Database\Eloquent\Model;
use Roshangara\Translatable\Translatable;

class Country extends Model
{
    use Translatable;

    protected $table = 'countries';

    public $translatable = [
        'name',
        'capital',
        'region',
        'sub_region',
        'demonym',
    ];

    public $casts = [
        'name'            => 'array',
        'tags'            => 'array',
        'domain_prefixes' => 'array',
        'calling_codes'   => 'array',
        'capital'         => 'array',
        'alt_spellings'   => 'array',
        'region'          => 'array',
        'sub_region'      => 'array',
        'demonym'         => 'array',
        'timezones'       => 'array',
        'borders'         => 'array',
        'currencies'      => 'array',
        'languages'       => 'array',
        'translations'    => 'array',
        'regional_blocs'  => 'array',
    ];

    public $fillable = [
        'name',
        'tags',
        'domain_prefixes',
        'alpha_two_code',
        'alpha_three_code',
        'calling_codes',
        'alt_spellings',
        'population',
        'lat',
        'long',
        'area',
        'gini',
        'timezones',
        'borders',
        'native_name',
        'numeric_code',
        'currencies',
        'languages',
        'translations',
        'flag',
        'regional_blocs',
        'cioc',
    ];

    /**
     * Get tags
     *
     * @return string
     */
    public function getTags()
    {
        return implode(',', array_values(array_unique(array_filter(array_merge(
            array_values($this->getTranslations('name')),
            array_values($this->getTranslations('capital') ?? []),
            [$this->tags],
            [$this->alpha_two_code],
            [$this->alpha_three_Code],
            $this->calling_codes ?? [],
            $this->alt_spellings ?? [],
            [$this->native_name],
            array_values($this->translations ?? [])
        )))));
    }
}