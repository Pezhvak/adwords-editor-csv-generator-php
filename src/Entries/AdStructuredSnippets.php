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
use Pezhvak\AdwordsEditorCsvGenerator\Enums\AdStructuredSnippetsHeader;
use Pezhvak\AdwordsEditorCsvGenerator\Enums\AdType;

class AdStructuredSnippets extends EntryBase
{
    private AdwordsEditorCsvGenerator $_adCsvGenerator;
    public ?AdAction $action = null;
    public AdStatus $status;
    public ?string $campaignName = null;
    public ?string $adGroupName = null;
    public ?AdLanguage $language = null;
    public ?AdStructuredSnippetsHeader $header = null;
    public ?array $values = null;

    private $_data = [];

    public function __construct(AdwordsEditorCsvGenerator $adCsvGenerator)
    {
        $this->status = AdStatus::ENABLED;
        $this->_adCsvGenerator = $adCsvGenerator;
    }

    public function setAction(AdAction $action): AdStructuredSnippets
    {
        $this->action = $action;
        return $this;
    }

    public function setStatus(AdStatus $status): AdStructuredSnippets
    {
        $this->status = $status;
        return $this;
    }

    public function setCampaignName(string $campaignName): AdStructuredSnippets
    {
        $this->campaignName = $campaignName;
        return $this;
    }

    public function setAdGroupName(string $adGroupName): AdStructuredSnippets
    {
        $this->adGroupName = $adGroupName;
        return $this;
    }

    public function setLanguage(AdLanguage $language): AdStructuredSnippets
    {
        $this->language = $language;
        return $this;
    }

    public function setHeader(AdStructuredSnippetsHeader $header): AdStructuredSnippets
    {
        $this->header = $header;
        return $this;
    }

    public function setValues(array $values): AdStructuredSnippets
    {
        $this->values = $values;
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

        if($this->header === null) {
            throw new \Exception('Header is required');
        }

        $this->_data = [
            'action' => $this->action->value ?? '',
            'status' => $this->status->value,
            'ad-group' => $this->adGroupName ?? '',
            'campaign' => $this->campaignName ?? '',
            'language' => $this->language->value,
            'header' => $this->header->value,
            'snippet-values' => implode("\n", $this->values) ?? '',
        ];

        return $this->_data;
    }
}
