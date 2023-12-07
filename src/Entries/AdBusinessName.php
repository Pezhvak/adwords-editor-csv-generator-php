<?php

namespace Pezhvak\AdwordsEditorCsvGenerator\Entries;

use Carbon\Carbon;
use Pezhvak\AdwordsEditorCsvGenerator\AdwordsEditorCsvGenerator;
use Pezhvak\AdwordsEditorCsvGenerator\Enums\AdStatus;

class AdBusinessName extends EntryBase
{
    private AdwordsEditorCsvGenerator $_adCsvGenerator;
    public ?AdStatus $status = null;
    public ?string $campaignName = null;
    public ?string $businessName = null;

    private $_data = [];

    public function __construct(AdwordsEditorCsvGenerator $adCsvGenerator)
    {
        $this->_adCsvGenerator = $adCsvGenerator;
        $this->status = AdStatus::ENABLED;
    }

    public function setStatus(AdStatus $status): AdBusinessName
    {
        $this->status = $status;
        return $this;
    }

    public function setCampaignName(string $name): AdBusinessName
    {
        $this->campaignName = $name;
        return $this;
    }

    public function setBusinessName(string $name): AdBusinessName
    {
        $this->businessName = $name;
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

        if($this->businessName === null) {
            throw new \Exception('Business name is required');
        }

        $this->_data = [
            'status' => $this->status->value ?? '',
            'campaign' => $this->campaignName,
            'business-name' => $this->businessName,
        ];

        return $this->_data;
    }
}
