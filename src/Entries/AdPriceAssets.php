<?php

namespace Pezhvak\AdwordsEditorCsvGenerator\Entries;

use Pezhvak\AdwordsEditorCsvGenerator\AdwordsEditorCsvGenerator;
use Pezhvak\AdwordsEditorCsvGenerator\Enums\AdAction;
use Pezhvak\AdwordsEditorCsvGenerator\Enums\AdCurrency;
use Pezhvak\AdwordsEditorCsvGenerator\Enums\AdLanguage;
use Pezhvak\AdwordsEditorCsvGenerator\Enums\AdPriceQualifier;
use Pezhvak\AdwordsEditorCsvGenerator\Enums\AdPriceType;
use Pezhvak\AdwordsEditorCsvGenerator\Enums\AdPriceUnit;
use Pezhvak\AdwordsEditorCsvGenerator\Enums\AdStatus;
use Pezhvak\AdwordsEditorCsvGenerator\Enums\AdType;

class AdPriceAssets extends EntryBase
{
    private AdwordsEditorCsvGenerator $_adCsvGenerator;
    public ?AdAction $action = null;
    public AdStatus $status;
    public ?string $campaignName = null;
    public ?string $adGroupName = null;
    public ?AdLanguage $language = null;
    public ?AdCurrency $currency = null;
    public ?AdPriceType $type = null;
    public ?AdPriceQualifier $priceQualifier = null;
    public ?string $header_1 = null;
    public ?string $header_2 = null;
    public ?string $header_3 = null;
    public ?string $header_4 = null;
    public ?string $header_5 = null;
    public ?string $header_6 = null;
    public ?string $header_7 = null;
    public ?string $header_8 = null;
    public ?string $description_1 = null;
    public ?string $description_2 = null;
    public ?string $description_3 = null;
    public ?string $description_4 = null;
    public ?string $description_5 = null;
    public ?string $description_6 = null;
    public ?string $description_7 = null;
    public ?string $description_8 = null;
    public ?string $price_1 = null;
    public ?string $price_2 = null;
    public ?string $price_3 = null;
    public ?string $price_4 = null;
    public ?string $price_5 = null;
    public ?string $price_6 = null;
    public ?string $price_7 = null;
    public ?string $price_8 = null;
    public ?AdPriceUnit $price_unit_1 = null;
    public ?AdPriceUnit $price_unit_2 = null;
    public ?AdPriceUnit $price_unit_3 = null;
    public ?AdPriceUnit $price_unit_4 = null;
    public ?AdPriceUnit $price_unit_5 = null;
    public ?AdPriceUnit $price_unit_6 = null;
    public ?AdPriceUnit $price_unit_7 = null;
    public ?AdPriceUnit $price_unit_8 = null;
    public ?string $final_url_1 = null;
    public ?string $final_url_2 = null;
    public ?string $final_url_3 = null;
    public ?string $final_url_4 = null;
    public ?string $final_url_5 = null;
    public ?string $final_url_6 = null;
    public ?string $final_url_7 = null;
    public ?string $final_url_8 = null;
    public ?string $final_mobile_url_1 = null;
    public ?string $final_mobile_url_2 = null;
    public ?string $final_mobile_url_3 = null;
    public ?string $final_mobile_url_4 = null;
    public ?string $final_mobile_url_5 = null;
    public ?string $final_mobile_url_6 = null;
    public ?string $final_mobile_url_7 = null;
    public ?string $final_mobile_url_8 = null;

    private $_data = [];

    public function __construct(AdwordsEditorCsvGenerator $adCsvGenerator)
    {
        $this->status = AdStatus::ENABLED;
        $this->_adCsvGenerator = $adCsvGenerator;
    }

    public function setAction(AdAction $action): AdPriceAssets
    {
        $this->action = $action;
        return $this;
    }

    public function setStatus(AdStatus $status): AdPriceAssets
    {
        $this->status = $status;
        return $this;
    }

    public function setCampaignName(string $campaignName): AdPriceAssets
    {
        $this->campaignName = $campaignName;
        return $this;
    }

    public function setAdGroupName(string $adGroupName): AdPriceAssets
    {
        $this->adGroupName = $adGroupName;
        return $this;
    }

    public function setLanguage(AdLanguage $language): AdPriceAssets
    {
        $this->language = $language;
        return $this;
    }

    public function setCurrency(AdCurrency $currency): AdPriceAssets
    {
        $this->currency = $currency;
        return $this;
    }

    public function setType(AdPriceType $type): AdPriceAssets
    {
        $this->type = $type;
        return $this;
    }

    public function setPriceQualifier(AdPriceQualifier $priceQualifier): AdPriceAssets
    {
        $this->priceQualifier = $priceQualifier;
        return $this;
    }

    public function setHeader1(string $header_1): AdPriceAssets
    {
        $this->header_1 = $header_1;
        return $this;
    }

    public function setHeader2(string $header_2): AdPriceAssets
    {
        $this->header_2 = $header_2;
        return $this;
    }

    public function setHeader3(string $header_3): AdPriceAssets
    {
        $this->header_3 = $header_3;
        return $this;
    }

    public function setHeader4(string $header_4): AdPriceAssets
    {
        $this->header_4 = $header_4;
        return $this;
    }

    public function setHeader5(string $header_5): AdPriceAssets
    {
        $this->header_5 = $header_5;
        return $this;
    }

    public function setHeader6(string $header_6): AdPriceAssets
    {
        $this->header_6 = $header_6;
        return $this;
    }

    public function setHeader7(string $header_7): AdPriceAssets
    {
        $this->header_7 = $header_7;
        return $this;
    }

    public function setHeader8(string $header_8): AdPriceAssets
    {
        $this->header_8 = $header_8;
        return $this;
    }

    public function setHeader(string $header, int $number): AdPriceAssets
    {
        $this->{'header_' . $number} = $header;
        return $this;
    }

    public function setHeaders(array $headers): AdPriceAssets
    {
        if (count($headers) > 8) {
            throw new \Exception('Maximum of 8 headers are allowed');
        }
        foreach ($headers as $key => $header) {
            $this->{'header_' . ($key + 1)} = $header;
        }
        return $this;
    }

    public function setDescription1(string $description_1): AdPriceAssets
    {
        $this->description_1 = $description_1;
        return $this;
    }

    public function setDescription2(string $description_2): AdPriceAssets
    {
        $this->description_2 = $description_2;
        return $this;
    }

    public function setDescription3(string $description_3): AdPriceAssets
    {
        $this->description_3 = $description_3;
        return $this;
    }

    public function setDescription4(string $description_4): AdPriceAssets
    {
        $this->description_4 = $description_4;
        return $this;
    }

    public function setDescription5(string $description_5): AdPriceAssets
    {
        $this->description_5 = $description_5;
        return $this;
    }

    public function setDescription6(string $description_6): AdPriceAssets
    {
        $this->description_6 = $description_6;
        return $this;
    }

    public function setDescription7(string $description_7): AdPriceAssets
    {
        $this->description_7 = $description_7;
        return $this;
    }

    public function setDescription8(string $description_8): AdPriceAssets
    {
        $this->description_8 = $description_8;
        return $this;
    }

    public function setDescription(string $description, int $number): AdPriceAssets
    {
        $this->{'description_' . $number} = $description;
        return $this;
    }

    public function setDescriptions(array $descriptions): AdPriceAssets
    {
        if (count($descriptions) > 8) {
            throw new \Exception('Maximum of 8 descriptions are allowed');
        }
        foreach ($descriptions as $key => $description) {
            $this->{'description_' . ($key + 1)} = $description;
        }
        return $this;
    }

    public function setPrice1(string $price_1): AdPriceAssets
    {
        $this->price_1 = $price_1;
        return $this;
    }

    public function setPrice2(string $price_2): AdPriceAssets
    {
        $this->price_2 = $price_2;
        return $this;
    }

    public function setPrice3(string $price_3): AdPriceAssets
    {
        $this->price_3 = $price_3;
        return $this;
    }

    public function setPrice4(string $price_4): AdPriceAssets
    {
        $this->price_4 = $price_4;
        return $this;
    }

    public function setPrice5(string $price_5): AdPriceAssets
    {
        $this->price_5 = $price_5;
        return $this;
    }

    public function setPrice6(string $price_6): AdPriceAssets
    {
        $this->price_6 = $price_6;
        return $this;
    }

    public function setPrice7(string $price_7): AdPriceAssets
    {
        $this->price_7 = $price_7;
        return $this;
    }

    public function setPrice8(string $price_8): AdPriceAssets
    {
        $this->price_8 = $price_8;
        return $this;
    }

    public function setPrice(string $price, int $number): AdPriceAssets
    {
        $this->{'price_' . $number} = $price;
        return $this;
    }

    public function setPrices(array $prices): AdPriceAssets
    {
        if (count($prices) > 8) {
            throw new \Exception('Maximum of 8 prices are allowed');
        }
        foreach ($prices as $key => $price) {
            $this->{'price_' . ($key + 1)} = $price;
        }
        return $this;
    }

    public function setPriceUnit1(AdPriceUnit $price_unit_1): AdPriceAssets
    {
        $this->price_unit_1 = $price_unit_1;
        return $this;
    }

    public function setPriceUnit2(AdPriceUnit $price_unit_2): AdPriceAssets
    {
        $this->price_unit_2 = $price_unit_2;
        return $this;
    }

    public function setPriceUnit3(AdPriceUnit $price_unit_3): AdPriceAssets
    {
        $this->price_unit_3 = $price_unit_3;
        return $this;
    }

    public function setPriceUnit4(AdPriceUnit $price_unit_4): AdPriceAssets
    {
        $this->price_unit_4 = $price_unit_4;
        return $this;
    }

    public function setPriceUnit5(AdPriceUnit $price_unit_5): AdPriceAssets
    {
        $this->price_unit_5 = $price_unit_5;
        return $this;
    }

    public function setPriceUnit6(AdPriceUnit $price_unit_6): AdPriceAssets
    {
        $this->price_unit_6 = $price_unit_6;
        return $this;
    }

    public function setPriceUnit7(AdPriceUnit $price_unit_7): AdPriceAssets
    {
        $this->price_unit_7 = $price_unit_7;
        return $this;
    }

    public function setPriceUnit8(AdPriceUnit $price_unit_8): AdPriceAssets
    {
        $this->price_unit_8 = $price_unit_8;
        return $this;
    }

    public function setPriceUnit(AdPriceUnit $price_unit, int $number): AdPriceAssets
    {
        $this->{'price_unit_' . $number} = $price_unit;
        return $this;
    }

    public function setPriceUnits(array $price_units): AdPriceAssets
    {
        if (count($price_units) > 8) {
            throw new \Exception('Maximum of 8 price units are allowed');
        }
        foreach ($price_units as $key => $price_unit) {
            $this->{'price_unit_' . ($key + 1)} = $price_unit;
        }
        return $this;
    }

    public function setFinalUrl1(string $final_url_1): AdPriceAssets
    {
        $this->final_url_1 = $final_url_1;
        return $this;
    }

    public function setFinalUrl2(string $final_url_2): AdPriceAssets
    {
        $this->final_url_2 = $final_url_2;
        return $this;
    }

    public function setFinalUrl3(string $final_url_3): AdPriceAssets
    {
        $this->final_url_3 = $final_url_3;
        return $this;
    }

    public function setFinalUrl4(string $final_url_4): AdPriceAssets
    {
        $this->final_url_4 = $final_url_4;
        return $this;
    }

    public function setFinalUrl5(string $final_url_5): AdPriceAssets
    {
        $this->final_url_5 = $final_url_5;
        return $this;
    }

    public function setFinalUrl6(string $final_url_6): AdPriceAssets
    {
        $this->final_url_6 = $final_url_6;
        return $this;
    }

    public function setFinalUrl7(string $final_url_7): AdPriceAssets
    {
        $this->final_url_7 = $final_url_7;
        return $this;
    }

    public function setFinalUrl8(string $final_url_8): AdPriceAssets
    {
        $this->final_url_8 = $final_url_8;
        return $this;
    }

    public function setFinalUrl(string $final_url, int $number): AdPriceAssets
    {
        $this->{'final_url_' . $number} = $final_url;
        return $this;
    }

    public function setFinalUrls(array $final_urls): AdPriceAssets
    {
        if (count($final_urls) > 8) {
            throw new \Exception('Maximum of 8 final urls are allowed');
        }
        foreach ($final_urls as $key => $final_url) {
            $this->{'final_url_' . ($key + 1)} = $final_url;
        }
        return $this;
    }

    public function setFinalMobileUrl1(string $final_mobile_url_1): AdPriceAssets
    {
        $this->final_mobile_url_1 = $final_mobile_url_1;
        return $this;
    }

    public function setFinalMobileUrl2(string $final_mobile_url_2): AdPriceAssets
    {
        $this->final_mobile_url_2 = $final_mobile_url_2;
        return $this;
    }

    public function setFinalMobileUrl3(string $final_mobile_url_3): AdPriceAssets
    {
        $this->final_mobile_url_3 = $final_mobile_url_3;
        return $this;
    }

    public function setFinalMobileUrl4(string $final_mobile_url_4): AdPriceAssets
    {
        $this->final_mobile_url_4 = $final_mobile_url_4;
        return $this;
    }

    public function setFinalMobileUrl5(string $final_mobile_url_5): AdPriceAssets
    {
        $this->final_mobile_url_5 = $final_mobile_url_5;
        return $this;
    }

    public function setFinalMobileUrl6(string $final_mobile_url_6): AdPriceAssets
    {
        $this->final_mobile_url_6 = $final_mobile_url_6;
        return $this;
    }

    public function setFinalMobileUrl7(string $final_mobile_url_7): AdPriceAssets
    {
        $this->final_mobile_url_7 = $final_mobile_url_7;
        return $this;
    }

    public function setFinalMobileUrl8(string $final_mobile_url_8): AdPriceAssets
    {
        $this->final_mobile_url_8 = $final_mobile_url_8;
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

        if($this->language === null) {
            throw new \Exception('Language is required');
        }

        if($this->currency === null) {
            throw new \Exception('Currency is required');
        }

        if($this->type === null) {
            throw new \Exception('Type is required');
        }

        if($this->header_1 === null || $this->header_2 === null || $this->header_3 === null) {
            throw new \Exception('At least 3 headers are required');
        }

        if($this->description_1 === null || $this->description_2 === null || $this->description_3 === null) {
            throw new \Exception('At least 3 descriptions are required');
        }

        if($this->price_1 === null || $this->price_2 === null || $this->price_3 === null) {
            throw new \Exception('At least 3 prices are required');
        }

        if($this->final_url_1 === null || $this->final_url_2 === null || $this->final_url_3 === null) {
            throw new \Exception('At least 3 final urls are required');
        }

        // fixing type and price qualifier
        $localized_type = AdPriceType::toLocalized($this->language)[AdPriceType::Brands->value] ?? $this->type->value;
        $localized_price_qualifier = AdPriceQualifier::toLocalized($this->language)[AdPriceQualifier::From->value] ?? $this->priceQualifier->value;


        $this->_data = [
            'action' => $this->action->value ?? '',
            'status' => $this->status->value,
            'ad-group' => $this->adGroupName ?? '',
            'campaign' => $this->campaignName ?? '',
            'language' => $this->language->value,
            'currency' => $this->currency->value,
            'type' => $localized_type,
            'price-qualifier' => $localized_price_qualifier ?? '',
            'header-1' => $this->header_1 ?? '',
            'header-2' => $this->header_2 ?? '',
            'header-3' => $this->header_3 ?? '',
            'header-4' => $this->header_4 ?? '',
            'header-5' => $this->header_5 ?? '',
            'header-6' => $this->header_6 ?? '',
            'header-7' => $this->header_7 ?? '',
            'header-8' => $this->header_8 ?? '',
            'description-1' => $this->description_1 ?? '',
            'description-2' => $this->description_2 ?? '',
            'description-3' => $this->description_3 ?? '',
            'description-4' => $this->description_4 ?? '',
            'description-5' => $this->description_5 ?? '',
            'description-6' => $this->description_6 ?? '',
            'description-7' => $this->description_7 ?? '',
            'description-8' => $this->description_8 ?? '',
            'price-1' => $this->price_1 ?? '',
            'price-2' => $this->price_2 ?? '',
            'price-3' => $this->price_3 ?? '',
            'price-4' => $this->price_4 ?? '',
            'price-5' => $this->price_5 ?? '',
            'price-6' => $this->price_6 ?? '',
            'price-7' => $this->price_7 ?? '',
            'price-8' => $this->price_8 ?? '',
            'unit-1' => $this->price_unit_1->value ?? '',
            'unit-2' => $this->price_unit_2->value ?? '',
            'unit-3' => $this->price_unit_3->value ?? '',
            'unit-4' => $this->price_unit_4->value ?? '',
            'unit-5' => $this->price_unit_5->value ?? '',
            'unit-6' => $this->price_unit_6->value ?? '',
            'unit-7' => $this->price_unit_7->value ?? '',
            'unit-8' => $this->price_unit_8->value ?? '',
            'final-url-1' => $this->final_url_1 ?? '',
            'final-url-2' => $this->final_url_2 ?? '',
            'final-url-3' => $this->final_url_3 ?? '',
            'final-url-4' => $this->final_url_4 ?? '',
            'final-url-5' => $this->final_url_5 ?? '',
            'final-url-6' => $this->final_url_6 ?? '',
            'final-url-7' => $this->final_url_7 ?? '',
            'final-url-8' => $this->final_url_8 ?? '',
            'final-mobile-url-1' => $this->final_mobile_url_1 ?? '',
            'final-mobile-url-2' => $this->final_mobile_url_2 ?? '',
            'final-mobile-url-3' => $this->final_mobile_url_3 ?? '',
            'final-mobile-url-4' => $this->final_mobile_url_4 ?? '',
            'final-mobile-url-5' => $this->final_mobile_url_5 ?? '',
            'final-mobile-url-6' => $this->final_mobile_url_6 ?? '',
            'final-mobile-url-7' => $this->final_mobile_url_7 ?? '',
            'final-mobile-url-8' => $this->final_mobile_url_8 ?? '',
        ];

        return $this->_data;
    }
}
