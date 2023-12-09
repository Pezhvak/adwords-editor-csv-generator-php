<?php

namespace Pezhvak\AdwordsEditorCsvGenerator\Entries;

use Carbon\Carbon;
use Pezhvak\AdwordsEditorCsvGenerator\AdwordsEditorCsvGenerator;
use Pezhvak\AdwordsEditorCsvGenerator\Enums\AdStatus;

class AdImage extends EntryBase
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

    public function setCampaignName(string $name): AdImage
    {
        $this->campaignName = $name;
        return $this;
    }

    public function setAdGroupName(string $name): AdImage
    {
        $this->adGroupName = $name;
        return $this;
    }

    public function setImage(string $path): AdImage
    {
        $this->image = $path;
        return $this;
    }

    public function setStartDate(Carbon $date): AdImage
    {
        $this->startDate = $date;
        return $this;
    }

    public function setEndDate(Carbon $date): AdImage
    {
        $this->endDate = $date;
        return $this;
    }

    /**
     * @return array<string,mixed>
     */
    public function toArray(): array
    {
        if($this->campaignName === null && $this->adGroupName === null) {
            throw new \Exception('Campaign name or ad group name is required');
        }

        $this->_data = [
            'campaign' => $this->campaignName,
            'ad-group' => $this->adGroupName,
            'link-source' => 'Advertiser',
            'upgraded-extension' => '[]',
            'image' => 'images/'.basename($this->image),
            'start-date' => $this->startDate ? $this->startDate->format('Y-m-d') : null,
            'end-date' => $this->endDate ? $this->endDate->format('Y-m-d') : null,
        ];

        return $this->_data;
    }
}
