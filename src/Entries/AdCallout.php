<?php

namespace Pezhvak\AdwordsEditorCsvGenerator\Entries;

use Carbon\Carbon;
use Pezhvak\AdwordsEditorCsvGenerator\AdwordsEditorCsvGenerator;
use Pezhvak\AdwordsEditorCsvGenerator\Enums\AdStatus;

class AdCallout extends EntryBase
{
    private AdwordsEditorCsvGenerator $_adCsvGenerator;
    public ?AdStatus $status = null;
    public ?string $campaignName = null;
    public ?string $adGroupName = null;
    public ?string $calloutText = null;
    public ?Carbon $startDate = null;
    public ?Carbon $endDate = null;

    private $_data = [];

    public function __construct(AdwordsEditorCsvGenerator $adCsvGenerator)
    {
        $this->_adCsvGenerator = $adCsvGenerator;
        $this->status = AdStatus::ENABLED;
    }

    public function setStatus(AdStatus $status): AdCallout
    {
        $this->status = $status;
        return $this;
    }

    public function setCampaignName(string $name): AdCallout
    {
        $this->campaignName = $name;
        return $this;
    }

    public function setAdGroupName(string $name): AdCallout
    {
        $this->adGroupName = $name;
        return $this;
    }

    public function setCalloutText(string $text): AdCallout
    {
        if(mb_strlen($text) > 25) {
            throw new \Exception('Callout text must be less than 25 characters');
        }
        $this->calloutText = $text;
        return $this;
    }

    public function setStartDate(Carbon $date): AdCallout
    {
        $this->startDate = $date;
        return $this;
    }

    public function setEndDate(Carbon $date): AdCallout
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

        if($this->calloutText === null) {
            throw new \Exception('Callout text is required');
        }

        $this->_data = [
            'status' => $this->status->value ?? '',
            'campaign' => $this->campaignName,
            'ad-group' => $this->adGroupName,
            'callout-text' => $this->calloutText,
            'start-date' => $this->startDate ? $this->startDate->format('Y-m-d') : null,
            'end-date' => $this->endDate ? $this->endDate->format('Y-m-d') : null,
        ];

        return $this->_data;
    }
}
