<?php

namespace Pezhvak\AdwordsEditorCsvGenerator\Entries;

use Pezhvak\AdwordsEditorCsvGenerator\AdwordsEditorCsvGenerator;
use Pezhvak\AdwordsEditorCsvGenerator\Enums\AdAction;
use Pezhvak\AdwordsEditorCsvGenerator\Enums\AdKeywordMatchType;
use Pezhvak\AdwordsEditorCsvGenerator\Enums\AdStatus;
use Pezhvak\AdwordsEditorCsvGenerator\Enums\AdType;

class AdResponsiveSearch extends EntryBase
{
    private AdwordsEditorCsvGenerator $_adCsvGenerator;
    public ?AdAction $action = null;
    public AdStatus $status;
    public ?string $campaignName = null;
    public ?string $adGroupName = null;
    public ?string $finalUrl = null;
    public ?string $finalMobileUrl = null;
    public ?string $headline_1 = null;
    public ?string $headline_2 = null;
    public ?string $headline_3 = null;
    public ?string $headline_4 = null;
    public ?string $headline_5 = null;
    public ?string $headline_6 = null;
    public ?string $headline_7 = null;
    public ?string $headline_8 = null;
    public ?string $headline_9 = null;
    public ?string $headline_10 = null;
    public ?string $headline_11 = null;
    public ?string $headline_12 = null;
    public ?string $headline_13 = null;
    public ?string $headline_14 = null;
    public ?string $headline_15 = null;
    public ?int $headline_1_position = null;
    public ?int $headline_2_position = null;
    public ?int $headline_3_position = null;
    public ?int $headline_4_position = null;
    public ?int $headline_5_position = null;
    public ?int $headline_6_position = null;
    public ?int $headline_7_position = null;
    public ?int $headline_8_position = null;
    public ?int $headline_9_position = null;
    public ?int $headline_10_position = null;
    public ?int $headline_11_position = null;
    public ?int $headline_12_position = null;
    public ?int $headline_13_position = null;
    public ?int $headline_14_position = null;
    public ?int $headline_15_position = null;
    public ?string $description_1 = null;
    public ?string $description_2 = null;
    public ?string $description_3 = null;
    public ?string $description_4 = null;
    public ?int $description_1_position = null;
    public ?int $description_2_position = null;
    public ?int $description_3_position = null;
    public ?int $description_4_position = null;
    public ?string $path_1 = null;
    public ?string $path_2 = null;

    private $_data = [];

    public function __construct(AdwordsEditorCsvGenerator $adCsvGenerator)
    {
        $this->status = AdStatus::ENABLED;
        $this->_adCsvGenerator = $adCsvGenerator;
    }

    public function setAction(AdAction $action): AdResponsiveSearch
    {
        $this->action = $action;
        return $this;
    }

    public function setStatus(AdStatus $status): AdResponsiveSearch
    {
        $this->status = $status;
        return $this;
    }

    public function setCampaignName(string $campaignName): AdResponsiveSearch
    {
        $this->campaignName = $campaignName;
        return $this;
    }

    public function setAdGroupName(string $adGroupName): AdResponsiveSearch
    {
        $this->adGroupName = $adGroupName;
        return $this;
    }

    public function setHeadline1(string $headline, int $position = null): AdResponsiveSearch
    {
        $this->_validatePosition($position);
        $this->headline_1 = $headline;
        $this->headline_1_position = $position;
        return $this;
    }

    public function setHeadline2(string $headline, int $position = null): AdResponsiveSearch
    {
        $this->_validatePosition($position);
        $this->headline_2 = $headline;
        $this->headline_2_position = $position;
        return $this;
    }

    public function setHeadline3(string $headline, int $position = null): AdResponsiveSearch
    {
        $this->_validatePosition($position);
        $this->headline_3 = $headline;
        $this->headline_3_position = $position;
        return $this;
    }

    public function setHeadline4(string $headline, int $position = null): AdResponsiveSearch
    {
        $this->_validatePosition($position);
        $this->headline_4 = $headline;
        $this->headline_4_position = $position;
        return $this;
    }

    public function setHeadline5(string $headline, int $position = null): AdResponsiveSearch
    {
        $this->_validatePosition($position);
        $this->headline_5 = $headline;
        $this->headline_5_position = $position;
        return $this;
    }

    public function setHeadline6(string $headline, int $position = null): AdResponsiveSearch
    {
        $this->_validatePosition($position);
        $this->headline_6 = $headline;
        $this->headline_6_position = $position;
        return $this;
    }

    public function setHeadline7(string $headline, int $position = null): AdResponsiveSearch
    {
        $this->_validatePosition($position);
        $this->headline_7 = $headline;
        $this->headline_7_position = $position;
        return $this;
    }

    public function setHeadline8(string $headline, int $position = null): AdResponsiveSearch
    {
        $this->_validatePosition($position);
        $this->headline_8 = $headline;
        $this->headline_8_position = $position;
        return $this;
    }

    public function setHeadline9(string $headline, int $position = null): AdResponsiveSearch
    {
        $this->_validatePosition($position);
        $this->headline_9 = $headline;
        $this->headline_9_position = $position;
        return $this;
    }

    public function setHeadline10(string $headline, int $position = null): AdResponsiveSearch
    {
        $this->_validatePosition($position);
        $this->headline_10 = $headline;
        $this->headline_10_position = $position;
        return $this;
    }

    public function setHeadline11(string $headline, int $position = null): AdResponsiveSearch
    {
        $this->_validatePosition($position);
        $this->headline_11 = $headline;
        $this->headline_11_position = $position;
        return $this;
    }

    public function setHeadline12(string $headline, int $position = null): AdResponsiveSearch
    {
        $this->_validatePosition($position);
        $this->headline_12 = $headline;
        $this->headline_12_position = $position;
        return $this;
    }

    public function setHeadline13(string $headline, int $position = null): AdResponsiveSearch
    {
        $this->_validatePosition($position);
        $this->headline_13 = $headline;
        $this->headline_13_position = $position;
        return $this;
    }

    public function setHeadline14(string $headline, int $position = null): AdResponsiveSearch
    {
        $this->_validatePosition($position);
        $this->headline_14 = $headline;
        $this->headline_14_position = $position;
        return $this;
    }

    public function setHeadline15(string $headline, int $position = null): AdResponsiveSearch
    {
        $this->_validatePosition($position);
        $this->headline_15 = $headline;
        $this->headline_15_position = $position;
        return $this;
    }

    public function setHeadline(string $headline, int $number, int $position = null): AdResponsiveSearch
    {
        if(!is_null($position)) {
            $this->_validatePosition($position);
            $this->{'headline_' . $number . '_position'} = $position;
        }
        $this->{'headline_' . $number} = $headline;
        return $this;
    }

    public function setHeadlines(array $headlines): AdResponsiveSearch
    {
        if (count($headlines) > 15) {
            throw new \Exception('Maximum of 15 headlines are allowed');
        }
        foreach ($headlines as $key => $headline) {
            $this->{'headline_' . ($key + 1)} = $headline;
        }
        return $this;
    }

    public function setHeadline1Position(int $position): AdResponsiveSearch
    {
        $this->_validatePosition($position);
        $this->headline_1_position = $position;
        return $this;
    }

    public function setHeadline2Position(int $position): AdResponsiveSearch
    {
        $this->_validatePosition($position);
        $this->headline_2_position = $position;
        return $this;
    }

    public function setHeadline3Position(int $position): AdResponsiveSearch
    {
        $this->_validatePosition($position);
        $this->headline_3_position = $position;
        return $this;
    }

    public function setHeadline4Position(int $position): AdResponsiveSearch
    {
        $this->_validatePosition($position);
        $this->headline_4_position = $position;
        return $this;
    }

    public function setHeadline5Position(int $position): AdResponsiveSearch
    {
        $this->_validatePosition($position);
        $this->headline_5_position = $position;
        return $this;
    }

    public function setHeadline6Position(int $position): AdResponsiveSearch
    {
        $this->_validatePosition($position);
        $this->headline_6_position = $position;
        return $this;
    }

    public function setHeadline7Position(int $position): AdResponsiveSearch
    {
        $this->_validatePosition($position);
        $this->headline_7_position = $position;
        return $this;
    }

    public function setHeadline8Position(int $position): AdResponsiveSearch
    {
        $this->_validatePosition($position);
        $this->headline_8_position = $position;
        return $this;
    }

    public function setHeadline9Position(int $position): AdResponsiveSearch
    {
        $this->_validatePosition($position);
        $this->headline_9_position = $position;
        return $this;
    }

    public function setHeadline10Position(int $position): AdResponsiveSearch
    {
        $this->_validatePosition($position);
        $this->headline_10_position = $position;
        return $this;
    }

    public function setHeadline11Position(int $position): AdResponsiveSearch
    {
        $this->_validatePosition($position);
        $this->headline_11_position = $position;
        return $this;
    }

    public function setHeadline12Position(int $position): AdResponsiveSearch
    {
        $this->_validatePosition($position);
        $this->headline_12_position = $position;
        return $this;
    }

    public function setHeadline13Position(int $position): AdResponsiveSearch
    {
        $this->_validatePosition($position);
        $this->headline_13_position = $position;
        return $this;
    }

    public function setHeadline14Position(int $position): AdResponsiveSearch
    {
        $this->_validatePosition($position);
        $this->headline_14_position = $position;
        return $this;
    }

    public function setHeadline15Position(int $position): AdResponsiveSearch
    {
        $this->_validatePosition($position);
        $this->headline_15_position = $position;
        return $this;
    }

    public function setHeadlinePosition(int $position, int $number): AdResponsiveSearch
    {
        $this->_validatePosition($position);
        $this->{'headline_' . $number . '_position'} = $position;
        return $this;
    }

    public function setHeadlinePositions(array $positions): AdResponsiveSearch
    {
        if (count($positions) > 15) {
            throw new \Exception('Maximum of 15 headline positions are allowed');
        }
        foreach ($positions as $key => $position) {
            $this->_validatePosition($position);
            $this->{'headline_' . ($key + 1) . '_position'} = $position;
        }
        return $this;
    }

    public function setDescription1(string $description, int $position = null): AdResponsiveSearch
    {
        $this->_validatePosition($position);
        $this->description_1 = $description;
        return $this;
    }

    public function setDescription2(string $description, int $position = null): AdResponsiveSearch
    {
        $this->_validatePosition($position);
        $this->description_2 = $description;
        return $this;
    }

    public function setDescription3(string $description, int $position = null): AdResponsiveSearch
    {
        $this->_validatePosition($position);
        $this->description_3 = $description;
        return $this;
    }

    public function setDescription4(string $description, int $position = null): AdResponsiveSearch
    {
        $this->_validatePosition($position);
        $this->description_4 = $description;
        return $this;
    }

    public function setDescription(string $description, int $number, int $position = null): AdResponsiveSearch
    {
        if(!is_null($position)) {
            $this->_validatePosition($position);
            $this->{'description_' . $number . '_position'} = $position;
        }
        $this->{'description_' . $number} = $description;
        return $this;
    }

    public function setDescriptions(array $descriptions): AdResponsiveSearch
    {
        if (count($descriptions) > 4) {
            throw new \Exception('Maximum 4 descriptions are allowed');
        }
        foreach ($descriptions as $key => $description) {
            $this->{'description_' . ($key + 1)} = $description;
        }
        return $this;
    }

    public function setDescription1Position(int $position): AdResponsiveSearch
    {
        $this->_validatePosition($position);
        $this->description_1_position = $position;
        return $this;
    }

    public function setDescription2Position(int $position): AdResponsiveSearch
    {
        $this->_validatePosition($position);
        $this->description_2_position = $position;
        return $this;
    }

    public function setDescription3Position(int $position): AdResponsiveSearch
    {
        $this->_validatePosition($position);
        $this->description_3_position = $position;
        return $this;
    }

    public function setDescription4Position(int $position): AdResponsiveSearch
    {
        $this->_validatePosition($position);
        $this->description_4_position = $position;
        return $this;
    }

    public function setDescriptionPosition(int $position, int $number): AdResponsiveSearch
    {
        $this->_validatePosition($position);
        $this->{'description_' . $number . '_position'} = $position;
        return $this;
    }

    public function setDescriptionPositions(array $positions): AdResponsiveSearch
    {
        if (count($positions) > 4) {
            throw new \Exception('Maximum of 4 description positions are allowed');
        }
        foreach ($positions as $key => $position) {
            $this->_validatePosition($position);
            $this->{'description_' . ($key + 1) . '_position'} = $position;
        }
        return $this;
    }

    public function setPath1(string $path): AdResponsiveSearch
    {
        $this->path_1 = $path;
        return $this;
    }

    public function setPath2(string $path): AdResponsiveSearch
    {
        $this->path_2 = $path;
        return $this;
    }

    public function setFinalUrl(string $finalUrl): AdResponsiveSearch
    {
        $this->finalUrl = $finalUrl;
        return $this;
    }

    public function setFinalMobileUrl(string $finalMobileUrl): AdResponsiveSearch
    {
        $this->finalMobileUrl = $finalMobileUrl;
        return $this;
    }

    private function _validatePosition(?int $position): void
    {
        if ($position !== null && ($position < 1 || $position > 3)) {
            throw new \Exception('Position must be between 1 and 3');
        }
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
            throw new \Exception('AdGroup name is required');
        }

        if($this->finalUrl == null) {
            throw new \Exception('Final URL is required');
        }

        if($this->headline_1 === null || $this->headline_2 === null || $this->headline_3 === null) {
            throw new \Exception('At least 3 headlines is required');
        }

        if($this->description_1 === null || $this->description_2 === null) {
            throw new \Exception('At least 2 descriptions is required');
        }

        $this->_data = [
            'action' => $this->action->value ?? '',
            'status' => $this->status->value,
            'ad-group' => $this->adGroupName,
            'campaign' => $this->campaignName,
            'ad-type' => AdType::ResponsiveSearchAd->value,
            'headline-1' => $this->headline_1,
            'headline-2' => $this->headline_2,
            'headline-3' => $this->headline_3,
            'headline-4' => $this->headline_4,
            'headline-5' => $this->headline_5,
            'headline-6' => $this->headline_6,
            'headline-7' => $this->headline_7,
            'headline-8' => $this->headline_8,
            'headline-9' => $this->headline_9,
            'headline-10' => $this->headline_10,
            'headline-11' => $this->headline_11,
            'headline-12' => $this->headline_12,
            'headline-13' => $this->headline_13,
            'headline-14' => $this->headline_14,
            'headline-15' => $this->headline_15,
            'headline-1-position' => $this->headline_1_position,
            'headline-2-position' => $this->headline_2_position,
            'headline-3-position' => $this->headline_3_position,
            'headline-4-position' => $this->headline_4_position,
            'headline-5-position' => $this->headline_5_position,
            'headline-6-position' => $this->headline_6_position,
            'headline-7-position' => $this->headline_7_position,
            'headline-8-position' => $this->headline_8_position,
            'headline-9-position' => $this->headline_9_position,
            'headline-10-position' => $this->headline_10_position,
            'headline-11-position' => $this->headline_11_position,
            'headline-12-position' => $this->headline_12_position,
            'headline-13-position' => $this->headline_13_position,
            'headline-14-position' => $this->headline_14_position,
            'headline-15-position' => $this->headline_15_position,
            'description-1' => $this->description_1,
            'description-2' => $this->description_2,
            'description-3' => $this->description_3,
            'description-4' => $this->description_4,
            'path-1' => $this->path_1,
            'path-2' => $this->path_2,
            'final-url' => $this->finalUrl,
            'final-mobile-url' => $this->finalMobileUrl,
        ];

        return $this->_data;
    }
}
