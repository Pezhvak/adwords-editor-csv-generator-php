<?php

namespace Pezhvak\AdwordsEditorCsvGenerator\Entries;

use Carbon\Carbon;
use Pezhvak\AdwordsEditorCsvGenerator\AdwordsEditorCsvGenerator;
use Pezhvak\AdwordsEditorCsvGenerator\Enums\AdAction;
use Pezhvak\AdwordsEditorCsvGenerator\Enums\AdGroupType;
use Pezhvak\AdwordsEditorCsvGenerator\Enums\AdLevel;
use Pezhvak\AdwordsEditorCsvGenerator\Enums\AdStatus;

class AdSitelink extends EntryBase
{
    private AdwordsEditorCsvGenerator $_adCsvGenerator;
    public ?AdAction $action = null;
    public ?AdStatus $status = null;
    public ?AdLevel $level = null;
    public ?string $campaignName = null;
    public ?string $adGroupName = null;
    public ?string $linkText = null;
    public ?string $description_1 = null;
    public ?string $description_2 = null;
    public ?string $finalUrl = null;
    public ?string $finalMobileUrl = null;
    public ?Carbon $startDate = null;
    public ?Carbon $endDate = null;

    private $_data = [];

    public function __construct(AdwordsEditorCsvGenerator $adCsvGenerator)
    {
        $this->status = AdStatus::ENABLED;
        $this->type = AdGroupType::Standard;
        $this->_adCsvGenerator = $adCsvGenerator;
    }

    public function setAction(AdAction $action): AdSitelink
    {
        $this->action = $action;
        return $this;
    }

    public function setStatus(AdStatus $status): adSitelink
    {
        $this->status = $status;
        return $this;
    }

    public function setLevel(AdLevel $level): AdSitelink
    {
        $this->level = $level;
        return $this;
    }

    public function setCampaignName(string $name): AdSitelink
    {
        $this->campaignName = $name;
        return $this;
    }

    public function setAdGroupName(string $name): AdSitelink
    {
        $this->adGroupName = $name;
        return $this;
    }

    public function setLinkText(string $text): AdSitelink
    {
        $this->linkText = $text;
        return $this;
    }

    public function setDescription1(string $description): AdSitelink
    {
        $this->description_1 = $description;
        return $this;
    }

    public function setDescription2(string $description): AdSitelink
    {
        $this->description_2 = $description;
        return $this;
    }

    public function setFinalUrl(string $url): AdSitelink
    {
        $this->finalUrl = $url;
        return $this;
    }

    public function setFinalMobileUrl(string $url): AdSitelink
    {
        $this->finalMobileUrl = $url;
        return $this;
    }

    public function setStartDate(Carbon $date): AdSitelink
    {
        $this->startDate = $date;
        return $this;
    }

    public function setEndDate(Carbon $date): AdSitelink
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

        if($this->adGroupName === null) {
            throw new \Exception('Ad group name is required');
        }

        if($this->linkText === null) {
            throw new \Exception('Link text is required');
        }

        if($this->finalUrl === null) {
            throw new \Exception('Final URL is required');
        }

        $this->_data = [
            'action' => $this->action->value ?? '',
            'status' => $this->status->value ?? '',
            'campaign' => $this->campaignName,
            'ad-group' => $this->adGroupName,
            'link-text' => $this->linkText,
            'description-1' => $this->description_1 ?? '',
            'description-2' => $this->description_2 ?? '',
            'final-url' => $this->finalUrl,
            'final-mobile-url' => $this->finalMobileUrl ?? '',
            'start-date' => $this->startDate ? $this->startDate->format('Y-m-d') : null,
            'end-date' => $this->endDate ? $this->endDate->format('Y-m-d') : null,
        ];

        return $this->_data;
    }
}
