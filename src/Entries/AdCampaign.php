<?php

namespace Pezhvak\AdwordsEditorCsvGenerator\Entries;

use Carbon\Carbon;
use Pezhvak\AdwordsEditorCsvGenerator\AdwordsEditorCsvGenerator;
use Pezhvak\AdwordsEditorCsvGenerator\Enums\AdBidStrategyType;
use Pezhvak\AdwordsEditorCsvGenerator\Enums\AdBudgetType;
use Pezhvak\AdwordsEditorCsvGenerator\Enums\AdStatus;
use Pezhvak\AdwordsEditorCsvGenerator\Enums\AdCampaignType;
use Pezhvak\AdwordsEditorCsvGenerator\Enums\AdLocation;

class AdCampaign extends EntryBase
{
    public AdStatus $status;
    public ?string $name = null;
    public ?float $budget = null;
    public ?AdBudgetType $budgetType = null;
    public ?array $campaignTypes = null;
    public ?Carbon $startDate = null;
    public ?Carbon $endDate = null;
    public ?AdBidStrategyType $bidStrategyType = null;
    public ?string $bidStrategyName = null;
    public ?float $targetImpressionShare = null;
    public ?float $maximumCpcBidLimit = null;
    public ?float $desktopBidAdjustment = null;
    public ?float $mobileBidAdjustment = null;
    public ?float $tabletBidAdjustment = null;
    public ?float $tvScreenBidAdjustment = null;
    public ?array $languages = null;
    public ?AdLocation $adLocation;
    public ?array $networks = null;
    private AdwordsEditorCsvGenerator $_adCsvGenerator;

    private $_data = [];

    /**
    * Prototype of blank row
    * @param AdCampaignType[] $campaignTypes array of campaign types
    */
    public function __construct(AdwordsEditorCsvGenerator $adCsvGenerator)
    {
        $this->status = AdStatus::ENABLED;
        $this->budgetType = AdBudgetType::DAILY;
        $this->_adCsvGenerator = $adCsvGenerator;
    }

    public function setNetworks(array $networks): AdCampaign
    {
        $this->networks = $networks;
        return $this;
    }

    public function setStatus(AdStatus $status): AdCampaign
    {
        $this->status = $status;
        return $this;
    }

    public function setName(string $name): AdCampaign
    {
        $this->name = $name;
        return $this;
    }

    public function setBudget(float $budget): AdCampaign
    {
        $this->budget = $budget;
        return $this;
    }

    public function setBudgetType(AdBudgetType $budgetType): AdCampaign
    {
        $this->budgetType = $budgetType;
        return $this;
    }

    /**
     * @param AdLanguage[] $languages
     **/
    public function setLanguages(array $languages): AdCampaign
    {
        $this->languages = $languages;
        return $this;
    }

    /**
     * @param AdCampaignType[] $campaignTypes
     **/
    public function setCampaignTypes(array $campaignTypes): AdCampaign
    {
        $this->campaignTypes = $campaignTypes;
        return $this;
    }

    public function setBidStrategyType(AdBidStrategyType $bidStrategyType): AdCampaign
    {
        $this->bidStrategyType = $bidStrategyType;
        return $this;
    }

    public function setBidStrategyName(string $bidStrategyName): AdCampaign
    {
        $this->bidStrategyName = $bidStrategyName;
        return $this;
    }

    public function setTargetImpressionShare(float $targetImpressionShare): AdCampaign
    {
        if($targetImpressionShare < 0 || $targetImpressionShare > 100) {
            throw new \Exception('Target impression share must be between 0 and 100');
        }
        $this->targetImpressionShare = $targetImpressionShare;
        return $this;
    }

    public function setMaximumCpcBidLimit(float $maximumCpcBidLimit): AdCampaign
    {
        $this->maximumCpcBidLimit = $maximumCpcBidLimit;
        return $this;
    }

    public function setDesktopBidAdjustment(float $desktopBidAdjustment): AdCampaign
    {
        $this->desktopBidAdjustment = $desktopBidAdjustment;
        return $this;
    }

    public function setMobileBidAdjustment(float $mobileBidAdjustment): AdCampaign
    {
        $this->mobileBidAdjustment = $mobileBidAdjustment;
        return $this;
    }

    public function setTabletBidAdjustment(float $tabletBidAdjustment): AdCampaign
    {
        $this->tabletBidAdjustment = $tabletBidAdjustment;
        return $this;
    }

    public function setTvScreenBidAdjustment(float $tvScreenBidAdjustment): AdCampaign
    {
        $this->tvScreenBidAdjustment = $tvScreenBidAdjustment;
        return $this;
    }

    public function setAdLocation(AdLocation $adLocation): AdCampaign
    {
        $this->adLocation = $adLocation;
        return $this;
    }

    public function setStartDate(Carbon $startDate): AdCampaign
    {
        $this->startDate = $startDate;
        return $this;
    }

    public function setEndDate(Carbon $endDate): AdCampaign
    {
        $this->endDate = $endDate;
        return $this;
    }

    public function createAdGroup(): AdGroup
    {
        $adGroup = new AdGroup($this->_adCsvGenerator);
        $adGroup->setCampaignName($this->name);
        $this->_adCsvGenerator->addEntry($adGroup);
        return $adGroup;
    }

    public function createLocation(): AdCampaignLocation
    {
        $adLocation = new AdCampaignLocation($this->_adCsvGenerator);
        $adLocation->setCampaignName($this->name);
        $this->_adCsvGenerator->addEntry($adLocation);
        return $adLocation;
    }

    public function createImageExtension(): AdImageExtension
    {
        $imageExtension = new AdImageExtension($this->_adCsvGenerator);
        $imageExtension->setCampaignName($this->name);
        $this->_adCsvGenerator->addEntry($imageExtension);
        return $imageExtension;
    }

    public function createImage(): AdImage
    {
        $image = new AdImage($this->_adCsvGenerator);
        $image->setCampaignName($this->name);
        $this->_adCsvGenerator->addEntry($image);
        return $image;
    }

    public function createBusinessName(): AdBusinessName
    {
        $businessName = new AdBusinessName($this->_adCsvGenerator);
        $businessName->setCampaignName($this->name);
        $this->_adCsvGenerator->addEntry($businessName);
        return $businessName;
    }

    public function createBusinessLogo(): AdBusinessLogo
    {
        $businessLogo = new AdBusinessLogo($this->_adCsvGenerator);
        $businessLogo->setCampaignName($this->name);
        $this->_adCsvGenerator->addEntry($businessLogo);
        return $businessLogo;
    }

    public function createPromotion(): AdPromotions
    {
        $promotion = new AdPromotions($this->_adCsvGenerator);
        $promotion->setCampaignName($this->name);
        $this->_adCsvGenerator->addEntry($promotion);
        return $promotion;
    }

    public function createPriceAssets(): AdPriceAssets
    {
        $priceAssets = new AdPriceAssets($this->_adCsvGenerator);
        $priceAssets->setCampaignName($this->name);
        $this->_adCsvGenerator->addEntry($priceAssets);
        return $priceAssets;
    }

    public function createCallout(): AdCallout
    {
        $callout = new AdCallout($this->_adCsvGenerator);
        $callout->setCampaignName($this->name);
        $this->_adCsvGenerator->addEntry($callout);
        return $callout;
    }

    public function createStructuredSnippets(): AdStructuredSnippets
    {
        $structuredSnippets = new AdStructuredSnippets($this->_adCsvGenerator);
        $structuredSnippets->setCampaignName($this->name);
        $this->_adCsvGenerator->addEntry($structuredSnippets);
        return $structuredSnippets;
    }

    public function createSitelink(): AdSitelink
    {
        $sitelink = new AdSitelink($this->_adCsvGenerator);
        $sitelink->setCampaignName($this->name);
        $this->_adCsvGenerator->addEntry($sitelink);
        return $sitelink;
    }

    /**
     * @return array<string,mixed>
     */
    public function toArray(): array
    {
        if($this->name === null) {
            throw new \Exception('Campaign name is required');
        }
        if($this->budget === null) {
            throw new \Exception('Campaign budget is required');
        }
        if($this->campaignTypes === null || count($this->campaignTypes) === 0) {
            throw new \Exception('Campaign types are required');
        }
        if($this->bidStrategyType === null) {
            throw new \Exception('Bid strategy type is required');
        }
        if($this->bidStrategyType === AdBidStrategyType::TARGET_IMPRESSION_SHARE && $this->targetImpressionShare === null) {
            throw new \Exception('Target impression share is required');
        }
        if($this->bidStrategyType === AdBidStrategyType::TARGET_IMPRESSION_SHARE && $this->maximumCpcBidLimit === null) {
            throw new \Exception('Maximum CPC bid limit is required');
        }
        $this->_data = [
            'campaign-status' => $this->status->value,
            'campaign' => $this->name,
            'campaign-type' => implode(';', $this->enumArrayToStringArray($this->campaignTypes)),
            'budget' => $this->budget,
            'budget-type' => $this->budgetType->value,
            'bid-strategy-name' => $this->bidStrategyName ?? '',
            'bid-strategy-type' => $this->bidStrategyType?->value ?? '',
            'maximum-cpc-bid-limit' => $this->maximumCpcBidLimit ?? '',
            'target-impression-share' => $this->targetImpressionShare.'%' ?? '',
            'languages' => implode(';', $this->enumArrayToStringArray($this->languages ?? [])),
            'desktop-bid-modifier' => $this->desktopBidAdjustment ?? '',
            'mobile-bid-modifier' => $this->mobileBidAdjustment ?? '',
            'tablet-bid-modifier' => $this->tabletBidAdjustment ?? '',
            'tv-screen-bid-modifier' => $this->tvScreenBidAdjustment ?? '',
            'ad-location' => $this->adLocation?->value ?? '',
            'start-date' => $this->startDate?->format('Y-m-d') ?? '',
            'end-date' => $this->endDate?->format('Y-m-d') ?? '',
            'networks' => implode(';', $this->enumArrayToStringArray($this->networks ?? [])),
        ];

        return $this->_data;
    }
}
