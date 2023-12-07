<?php

namespace Pezhvak\AdwordsEditorCsvGenerator\Entries;

use Pezhvak\AdwordsEditorCsvGenerator\AdwordsEditorCsvGenerator;
use Pezhvak\AdwordsEditorCsvGenerator\Enums\AdAction;
use Pezhvak\AdwordsEditorCsvGenerator\Enums\AdGroupType;
use Pezhvak\AdwordsEditorCsvGenerator\Enums\AdStatus;
use Pezhvak\AdwordsEditorCsvGenerator\Enums\AdRotation;

class AdGroup extends EntryBase
{
    private AdwordsEditorCsvGenerator $_adCsvGenerator;
    public ?AdStatus $status = null;
    public ?string $name = null;
    public ?string $campaignName = null;
    public ?AdAction $action = null;
    public ?AdGroupType $type = null;
    public ?AdRotation $adRotation = null;
    public ?float $maxCpc = null;
    public ?float $maxCpm = null;
    public ?float $maxCpv = null;
    public ?float $targetCpa = null;
    public ?float $targetCpv = null;
    public ?float $targetRoas = null;

    private $_data = [];

    public function __construct(AdwordsEditorCsvGenerator $adCsvGenerator)
    {
        $this->status = AdStatus::ENABLED;
        $this->type = AdGroupType::Standard;
        $this->_adCsvGenerator = $adCsvGenerator;
    }

    public function setStatus(AdStatus $status): AdGroup
    {
        $this->status = $status;
        return $this;
    }

    public function setName(string $name): AdGroup
    {
        $this->name = $name;
        return $this;
    }

    public function setCampaignName(string $name): AdGroup
    {
        $this->campaignName = $name;
        return $this;
    }

    public function setAction(AdAction $action): AdGroup
    {
        $this->action = $action;
        return $this;
    }

    public function setType(AdGroupType $type): AdGroup
    {
        $this->type = $type;
        return $this;
    }

    public function setAdRotation(AdRotation $adRotation): AdGroup
    {
        $this->adRotation = $adRotation;
        return $this;
    }

    public function setMaxCpc(float $maxCpc): AdGroup
    {
        $this->maxCpc = $maxCpc;
        return $this;
    }

    public function setMaxCpm(float $maxCpm): AdGroup
    {
        $this->maxCpm = $maxCpm;
        return $this;
    }

    public function setMaxCpv(float $maxCpv): AdGroup
    {
        $this->maxCpv = $maxCpv;
        return $this;
    }

    public function setTargetCpa(float $targetCpa): AdGroup
    {
        $this->targetCpa = $targetCpa;
        return $this;
    }


    public function setTargetCpv(float $targetCpv): AdGroup
    {
        $this->targetCpv = $targetCpv;
        return $this;
    }

    public function setTargetRoas(float $targetRoas): AdGroup
    {
        $this->targetRoas = $targetRoas;
        return $this;
    }

    public function createKeyword(): AdKeyword
    {
        $keyword = new AdKeyword($this->_adCsvGenerator);
        $keyword->setCampaignName($this->campaignName);
        $keyword->setAdGroupName($this->name);
        $this->_adCsvGenerator->addEntry($keyword);
        return $keyword;
    }

    public function createResponsiveSearchAd(): AdResponsiveSearch
    {
        $responsive = new AdResponsiveSearch($this->_adCsvGenerator);
        $responsive->setCampaignName($this->campaignName);
        $responsive->setAdGroupName($this->name);
        $this->_adCsvGenerator->addEntry($responsive);
        return $responsive;
    }

    public function createSitelink(): AdSitelink
    {
        $sitelink = new AdSitelink($this->_adCsvGenerator);
        $sitelink->setCampaignName($this->campaignName);
        $sitelink->setAdGroupName($this->name);
        $this->_adCsvGenerator->addEntry($sitelink);
        return $sitelink;
    }

    public function createCallout(): AdCallout
    {
        $callout = new AdCallout($this->_adCsvGenerator);
        $callout->setCampaignName($this->campaignName);
        $callout->setAdGroupName($this->name);
        $this->_adCsvGenerator->addEntry($callout);
        return $callout;
    }

    public function createPromotion(): AdPromotions
    {
        $promotion = new AdPromotions($this->_adCsvGenerator);
        $promotion->setCampaignName($this->campaignName);
        $promotion->setAdGroupName($this->name);
        $this->_adCsvGenerator->addEntry($promotion);
        return $promotion;
    }

    public function createPriceAssets(): AdPriceAssets
    {
        $priceAssets = new AdPriceAssets($this->_adCsvGenerator);
        $priceAssets->setCampaignName($this->campaignName);
        $priceAssets->setAdGroupName($this->name);
        $this->_adCsvGenerator->addEntry($priceAssets);
        return $priceAssets;
    }

    public function createStructuredSnippets(): AdStructuredSnippets
    {
        $structuredSnippets = new AdStructuredSnippets($this->_adCsvGenerator);
        $structuredSnippets->setCampaignName($this->campaignName);
        $structuredSnippets->setAdGroupName($this->name);
        $this->_adCsvGenerator->addEntry($structuredSnippets);
        return $structuredSnippets;
    }

    /**
     * @return array<string,mixed>
     */
    public function toArray(): array
    {
        if($this->name === null) {
            throw new \Exception('AdGroup name is required');
        }

        if($this->campaignName === null) {
            throw new \Exception('Campaign name is required');
        }

        $this->_data = [
            'action' => $this->action->value ?? '',
            'ad-group-type' => $this->type->value,
            'status' => $this->status->value,
            'ad-group' => $this->name,
            'ad-rotation' => $this->adRotation?->value ?? '',
            'campaign' => $this->campaignName,
            'max-cpc' => $this->maxCpc ?? '',
            'max-cpv' => $this->maxCpv ?? '',
            'max-cpm' => $this->maxCpm ?? '',
            'target-cpa' => $this->targetCpa ?? '',
            'target-cpv' => $this->targetCpv ?? '',
            'target-roas' => $this->targetRoas ?? '',
        ];

        return $this->_data;
    }
}
