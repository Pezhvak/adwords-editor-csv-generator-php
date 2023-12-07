<?php

namespace Pezhvak\AdwordsEditorCsvGenerator\Entries;

use Pezhvak\AdwordsEditorCsvGenerator\AdwordsEditorCsvGenerator;
use Pezhvak\AdwordsEditorCsvGenerator\Enums\AdAction;
use Pezhvak\AdwordsEditorCsvGenerator\Enums\AdKeywordMatchType;
use Pezhvak\AdwordsEditorCsvGenerator\Enums\AdStatus;

class AdKeyword extends EntryBase
{
    private AdwordsEditorCsvGenerator $_adCsvGenerator;
    public ?AdAction $action = null;
    public AdStatus $status;
    public ?string $keyword = null;
    public ?string $campaignName = null;
    public ?string $adGroupName = null;
    public ?AdKeywordMatchType $matchType = null;
    public ?float $maxCpc = null;
    public ?float $maxCpm = null;
    public ?float $maxCpv = null;
    public ?string $finalUrl = null;
    public ?string $finalMobileUrl = null;

    private $_data = [];

    public function __construct(AdwordsEditorCsvGenerator $adCsvGenerator)
    {
        $this->status = AdStatus::ENABLED;
        $this->_adCsvGenerator = $adCsvGenerator;
        $this->matchType = AdKeywordMatchType::ExactMatch;
    }

    public function setStatus(AdStatus $status): AdKeyword
    {
        $this->status = $status;
        return $this;
    }

    public function setKeyword(string $keyword): AdKeyword
    {
        $this->keyword = $keyword;
        return $this;
    }

    public function setCampaignName(string $campaignName): AdKeyword
    {
        $this->campaignName = $campaignName;
        return $this;
    }

    public function setAdGroupName(string $adGroupName): AdKeyword
    {
        $this->adGroupName = $adGroupName;
        return $this;
    }

    public function setAction(AdAction $action): AdKeyword
    {
        $this->action = $action;
        return $this;
    }

    public function setMatchType(AdKeywordMatchType $matchType): AdKeyword
    {
        $this->matchType = $matchType;
        return $this;
    }

    public function setMaxCpc(float $maxCpc): AdKeyword
    {
        $this->maxCpc = $maxCpc;
        return $this;
    }

    public function setMaxCpm(float $maxCpm): AdKeyword
    {
        $this->maxCpm = $maxCpm;
        return $this;
    }

    public function setMaxCpv(float $maxCpv): AdKeyword
    {
        $this->maxCpv = $maxCpv;
        return $this;
    }

    public function setFinalUrl(string $finalUrl): AdKeyword
    {
        $this->finalUrl = $finalUrl;
        return $this;
    }

    public function setFinalMobileUrl(string $finalMobileUrl): AdKeyword
    {
        $this->finalMobileUrl = $finalMobileUrl;
        return $this;
    }

    /**
     * @return array<string,mixed>
     */
    public function toArray(): array
    {
        if($this->keyword === null) {
            throw new \Exception('Keyword is required');
        }

        if($this->campaignName === null) {
            throw new \Exception('Campaign name is required');
        }

        if($this->adGroupName === null) {
            throw new \Exception('AdGroup name is required');
        }

        $this->_data = [
            'action' => $this->action->value ?? '',
            'status' => $this->status->value,
            'ad-group' => $this->adGroupName,
            'campaign' => $this->campaignName,
            'keyword' => $this->keyword,
            'match-type' => $this->matchType?->value ?? '',
            'max-cpc' => $this->maxCpc,
            'max-cpm' => $this->maxCpm,
            'max-cpv' => $this->maxCpv,
            'final-url' => $this->finalUrl,
            'final-mobile-url' => $this->finalMobileUrl,
        ];

        return $this->_data;
    }
}
