<?php

namespace Pezhvak\AdwordsEditorCsvGenerator\Entries;

use Pezhvak\AdwordsEditorCsvGenerator\AdwordsEditorCsvGenerator;

class AdCampaignLocation extends EntryBase
{
    private AdwordsEditorCsvGenerator $_adCsvGenerator;
    public ?string $campaignName = null;
    public ?string $location = null;
    public ?int $locationId = null;
    public ?int $bidAdjustment = null;
    private $_data = [];

    /**
    * Prototype of blank row
    * @param AdCampaignType[] $campaignTypes array of campaign types
    */
    public function __construct(AdwordsEditorCsvGenerator $adCsvGenerator)
    {
        $this->_adCsvGenerator = $adCsvGenerator;
    }

    public function setCampaignName(string $campaignName): AdCampaignLocation
    {
        $this->campaignName = $campaignName;
        return $this;
    }

    public function setLocation(string $location, float $bidAdjustment = null): AdCampaignLocation
    {
        $this->location = $location;
        $this->bidAdjustment = $bidAdjustment;
        return $this;
    }

    public function setLocationId(int $locationId): AdCampaignLocation
    {
        $this->locationId = $locationId;
        return $this;
    }

    public function setBidAdjustment(int $bidAdjustment): AdCampaignLocation
    {
        $this->bidAdjustment = $bidAdjustment;
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

        if($this->location === null) {
            throw new \Exception('Location is required');
        }

        $this->_data = [
            'campaign' => $this->campaignName,
            'location' => $this->location,
            'id' => $this->locationId ?? '',
            'bid-modifier' => $this->bidAdjustment ?? '',
        ];

        return $this->_data;
    }
}
