<?php

namespace Pezhvak\AdwordsEditorCsvGenerator\Entries;

use Carbon\Carbon;
use Pezhvak\AdwordsEditorCsvGenerator\AdwordsEditorCsvGenerator;
use Pezhvak\AdwordsEditorCsvGenerator\Enums\AdAction;
use Pezhvak\AdwordsEditorCsvGenerator\Enums\AdCurrency;
use Pezhvak\AdwordsEditorCsvGenerator\Enums\AdLanguage;
use Pezhvak\AdwordsEditorCsvGenerator\Enums\AdOccasion;
use Pezhvak\AdwordsEditorCsvGenerator\Enums\AdStatus;

class AdPromotions extends EntryBase
{
    private AdwordsEditorCsvGenerator $_adCsvGenerator;
    public ?AdAction $action = null;
    public AdStatus $status;
    public ?string $campaignName = null;
    public ?string $adGroupName = null;
    public ?AdLanguage $language = null;
    public ?string $name = null;
    public ?string $discountModifier = null;
    public ?float $percentDiscount = null;
    public ?float $monetaryDiscount = null;
    public ?float $ordersOverAmount = null;
    public ?string $promotionCode = null;
    public ?AdCurrency $currency = null;
    public ?AdOccasion $occasion = null;
    public ?string $finalUrl = null;
    public ?string $finalMobileUrl = null;
    public ?Carbon $promotionStart = null;
    public ?Carbon $promotionEnd = null;
    public ?Carbon $startDate = null;
    public ?Carbon $endDate = null;

    private $_data = [];

    public function __construct(AdwordsEditorCsvGenerator $adCsvGenerator)
    {
        $this->status = AdStatus::ENABLED;
        $this->_adCsvGenerator = $adCsvGenerator;
    }

    public function setAction(AdAction $action): AdPromotions
    {
        $this->action = $action;
        return $this;
    }

    public function setStatus(AdStatus $status): AdPromotions
    {
        $this->status = $status;
        return $this;
    }

    public function setCampaignName(string $campaignName): AdPromotions
    {
        $this->campaignName = $campaignName;
        return $this;
    }

    public function setAdGroupName(string $adGroupName): AdPromotions
    {
        $this->adGroupName = $adGroupName;
        return $this;
    }

    public function setLanguage(AdLanguage $language): AdPromotions
    {
        $this->language = $language;
        return $this;
    }

    public function setName(string $name): AdPromotions
    {
        $this->name = $name;
        return $this;
    }

    public function setDiscountModifier(string $discountModifier): AdPromotions
    {
        $this->discountModifier = $discountModifier;
        return $this;
    }

    public function setPercentDiscount(float $percentDiscount, bool $isUpTo = false): AdPromotions
    {
        $this->percentDiscount = $percentDiscount;
        if($isUpTo) {
            $this->discountModifier = 'Up to';
        }
        return $this;
    }

    public function setCurrency(AdCurrency $currency): AdPromotions
    {
        $this->currency = $currency;
        return $this;
    }

    public function setMonetaryDiscount(float $monetaryDiscount, bool $isUpTo = false): AdPromotions
    {
        $this->monetaryDiscount = $monetaryDiscount;
        if($isUpTo) {
            $this->discountModifier = 'Up to';
        }
        return $this;
    }

    public function setOrdersOverAmount(float $ordersOverAmount): AdPromotions
    {
        $this->ordersOverAmount = $ordersOverAmount;
        return $this;
    }

    public function setPromotionCode(string $promotionCode): AdPromotions
    {
        $this->promotionCode = $promotionCode;
        return $this;
    }

    public function setOccasion(AdOccasion $occasion): AdPromotions
    {
        $this->occasion = $occasion;
        return $this;
    }

    public function setPromotionStart(Carbon $promotionStart): AdPromotions
    {
        $this->promotionStart = $promotionStart;
        return $this;
    }

    public function setPromotionEnd(Carbon $promotionEnd): AdPromotions
    {
        $this->promotionEnd = $promotionEnd;
        return $this;
    }

    public function setStartDate(Carbon $startDate): AdPromotions
    {
        $this->startDate = $startDate;
        return $this;
    }

    public function setEndDate(Carbon $endDate): AdPromotions
    {
        $this->endDate = $endDate;
        return $this;
    }

    public function setFinalUrl(string $finalUrl): AdPromotions
    {
        $this->finalUrl = $finalUrl;
        return $this;
    }

    public function setFinalMobileUrl(string $finalMobileUrl): AdPromotions
    {
        $this->finalMobileUrl = $finalMobileUrl;
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

        if($this->language === null) {
            throw new \Exception('Language is required');
        }

        if($this->finalUrl == null) {
            throw new \Exception('Final URL is required');
        }

        if($this->percentDiscount !== null && $this->monetaryDiscount !== null) {
            throw new \Exception('Either percent or monetary discount is required');
        }

        if($this->percentDiscount === null && $this->monetaryDiscount === null) {
            throw new \Exception('Either percent or monetary discount is required');
        }

        if($this->monetaryDiscount !== null && $this->currency === null) {
            throw new \Exception('Currency is required when monetary discount is set');
        }

        if($this->monetaryDiscount !== null && $this->ordersOverAmount === null) {
            throw new \Exception('Orders over amount is applicable when monetary discount is set');
        }

        if($this->promotionCode !== null && $this->ordersOverAmount !== null) {
            throw new \Exception('Promotion code and orders over amount should not be set together');
        }

        $this->_data = [
            'action' => $this->action->value ?? '',
            'status' => $this->status->value ?? '',
            'ad-group' => $this->adGroupName ?? '',
            'campaign' => $this->campaignName,
            'language' => $this->language->value,
            'promotion-target' => $this->name,
            'discount-modifier' => $this->discountModifier,
            'percent-discount' => $this->percentDiscount,
            'currency' => $this->currency?->value ?? '',
            'monetary-discount' => $this->monetaryDiscount,
            'orders-over-amount' => $this->ordersOverAmount,
            'promotion-code' => $this->promotionCode,
            'occasion' => $this->occasion?->value,
            'final-url' => $this->finalUrl,
            'final-mobile-url' => $this->finalMobileUrl,
            'promotion-start' => $this->promotionStart?->format('Y-m-d') ?? '',
            'promotion-end' => $this->promotionEnd?->format('Y-m-d') ?? '',
            'start-date' => $this->startDate?->format('Y-m-d') ?? '',
            'end-date' => $this->endDate?->format('Y-m-d') ?? '',
        ];

        return $this->_data;
    }
}
