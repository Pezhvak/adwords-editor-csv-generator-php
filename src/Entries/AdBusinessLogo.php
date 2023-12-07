<?php

namespace Pezhvak\AdwordsEditorCsvGenerator\Entries;

use Carbon\Carbon;
use Pezhvak\AdwordsEditorCsvGenerator\AdwordsEditorCsvGenerator;
use Pezhvak\AdwordsEditorCsvGenerator\Enums\AdStatus;

class AdBusinessLogo extends EntryBase
{
    private AdwordsEditorCsvGenerator $_adCsvGenerator;
    public ?string $campaignName = null;
    public ?AdStatus $status = null;
    public ?string $image = null;

    private $_data = [];

    public function __construct(AdwordsEditorCsvGenerator $adCsvGenerator)
    {
        $this->_adCsvGenerator = $adCsvGenerator;
    }

    public function setStatus(AdStatus $status): AdBusinessLogo
    {
        $this->status = $status;
        return $this;
    }

    public function setCampaignName(string $name): AdBusinessLogo
    {
        $this->campaignName = $name;
        $this->status = AdStatus::ENABLED;
        return $this;
    }

    public function setImage(string $path): AdBusinessLogo
    {
        $this->image = $path;
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

        if($this->image === null) {
            throw new \Exception('Image is required');
        }

        $this->_data = [
            'status' => $this->status->value ?? '',
            'campaign' => $this->campaignName,
            'business-logo' => 'images/'.basename($this->image),
        ];

        return $this->_data;
    }
}
