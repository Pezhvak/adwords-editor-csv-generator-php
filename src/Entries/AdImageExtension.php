<?php

namespace Pezhvak\AdwordsEditorCsvGenerator\Entries;

use Carbon\Carbon;
use Pezhvak\AdwordsEditorCsvGenerator\AdwordsEditorCsvGenerator;
use Pezhvak\AdwordsEditorCsvGenerator\Enums\AdStatus;

class AdImageExtension extends EntryBase
{
    private AdwordsEditorCsvGenerator $_adCsvGenerator;
    public ?string $campaignName = null;
    public ?string $adGroupName = null;
    public ?string $image = null;
    public ?Carbon $startDate = null;
    public ?Carbon $endDate = null;

    private $_data = [];

    public function __construct(AdwordsEditorCsvGenerator $adCsvGenerator)
    {
        $this->_adCsvGenerator = $adCsvGenerator;
    }

    public function setCampaignName(string $name): AdImageExtension
    {
        $this->campaignName = $name;
        return $this;
    }

    public function setAdGroupName(string $name): AdImageExtension
    {
        $this->adGroupName = $name;
        return $this;
    }

    public function setImage(string $path): AdImageExtension
    {
        $this->image = $path;
        return $this;
    }

    public function setStartDate(Carbon $date): AdImageExtension
    {
        $this->startDate = $date;
        return $this;
    }

    public function setEndDate(Carbon $date): AdImageExtension
    {
        $this->endDate = $date;
        return $this;
    }

    /**
     * @return array<string,mixed>
     */
    public function toArray(): array
    {
        if($this->campaignName === null) {
            throw new \Exception('Campaign name is required');
        }

        $this->_data = [
            'campaign' => $this->campaignName,
            'ad-group' => $this->adGroupName,
            'image' => 'images/'.basename($this->image),
            'start-date' => $this->startDate ? $this->startDate->format('Y-m-d') : null,
            'end-date' => $this->endDate ? $this->endDate->format('Y-m-d') : null,
        ];

        return $this->_data;
    }
}
