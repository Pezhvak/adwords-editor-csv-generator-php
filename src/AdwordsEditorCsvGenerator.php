<?php

namespace Pezhvak\AdwordsEditorCsvGenerator;

use Pezhvak\AdwordsEditorCsvGenerator\Entries\AdBusinessLogo;
use Pezhvak\AdwordsEditorCsvGenerator\Entries\AdCampaign;
use Pezhvak\AdwordsEditorCsvGenerator\Entries\AdImage;
use Pezhvak\AdwordsEditorCsvGenerator\Entries\AdImageExtension;

class AdwordsEditorCsvGenerator
{
    protected $_columns = [
        'Action',
        'Campaign',
        'Labels',
        'Budget',
        'Budget type',
        'Standard conversion goals',
        'Campaign Type',
        'Networks',
        'Location and language targeting',
        'Languages',
        'Bid Strategy Type',
        'Bid Strategy Name',
        'Ad location',
        'Target impression share',
        'Maximum CPC bid limit',
        'Image',
        'Start Date',
        'End Date',
        'Ad Schedule',
        'Ad rotation',
        'Targeting method',
        'Exclusion method',
        'Audience targeting',
        'Flexible Reach',
        'Text asset automation',
        'Final URL expansion',
        'Ad Group',
        'Max CPC',
        'Max CPM',
        'Target CPA',
        'Max CPV',
        'Target CPV',
        'Percent CPC',
        'Target CPM',
        'Target ROAS',
        'Desktop Bid Modifier',
        'Mobile Bid Modifier',
        'Tablet Bid Modifier',
        'TV Screen Bid Modifier',
        'Display Network Custom Bid Type',
        'Optimized targeting',
        'Ad Group Type',
        'Audience name',
        'Tracking template',
        'Final URL suffix',
        'Custom parameters',
        'ID',
        'Location',
        'Reach',
        'Location groups',
        'Location groups legacy',
        'Feed',
        'Radius',
        'Unit',
        'Bid Modifier',
        'Keyword',
        'Match Type',
        'Criterion Type',
        'First page bid',
        'Top of page bid',
        'First position bid',
        'Landing page experience',
        'Expected CTR',
        'Ad relevance',
        'Final URL',
        'Final mobile URL',
        'Promotion target',
        'Language',
        'Discount modifier',
        'Percent discount',
        'Currency',
        'Monetary discount',
        'Promotion code',
        'Orders over amount',
        'Promotion start',
        'Promotion end',
        'Occasion',
        'Upgraded extension',
        'Source',
        'Link source',
        'Business name',
        'Business logo',
        'Ad type',
        'Price Qualifier',
        'Type',
        'Headline 1',
        'Headline 1 position',
        'Headline 2',
        'Headline 2 position',
        'Headline 3',
        'Headline 3 position',
        'Headline 4',
        'Headline 4 position',
        'Headline 5',
        'Headline 5 position',
        'Headline 6',
        'Headline 6 position',
        'Headline 7',
        'Headline 7 position',
        'Headline 8',
        'Headline 8 position',
        'Headline 9',
        'Headline 9 position',
        'Headline 10',
        'Headline 10 position',
        'Headline 11',
        'Headline 11 position',
        'Headline 12',
        'Headline 12 position',
        'Headline 13',
        'Headline 13 position',
        'Headline 14',
        'Headline 14 position',
        'Headline 15',
        'Headline 15 position',
        'Description 1',
        'Description 1 position',
        'Description 2',
        'Description 2 position',
        'Description 3',
        'Description 3 position',
        'Description 4',
        'Description 4 position',
        'Description 5',
        'Description 6',
        'Description 7',
        'Description 8',
        'Price 1',
        'Price 2',
        'Price 3',
        'Price 4',
        'Price 5',
        'Price 6',
        'Price 7',
        'Price 8',
        'Unit 1',
        'Unit 2',
        'Unit 3',
        'Unit 4',
        'Unit 5',
        'Unit 6',
        'Unit 7',
        'Unit 8',
        'Final URL 1',
        'Final URL 2',
        'Final URL 3',
        'Final URL 4',
        'Final URL 5',
        'Final URL 6',
        'Final URL 7',
        'Final URL 8',
        'Final mobile URL 1',
        'Final mobile URL 2',
        'Final mobile URL 3',
        'Final mobile URL 4',
        'Final mobile URL 5',
        'Final mobile URL 6',
        'Final mobile URL 7',
        'Final mobile URL 8',
        'Path 1',
        'Path 2',
        'IP address',
        'Link Text',
        'Description Line 1',
        'Description Line 2',
        'Header',
        'Header 1',
        'Header 2',
        'Header 3',
        'Header 4',
        'Header 5',
        'Header 6',
        'Header 7',
        'Header 8',
        'Snippet Values',
        'Callout text',
        'Campaign Status',
        'Ad Group Status',
        'Status',
        'Ad strength',
        'Comment',
    ];

    private string $_fileName;
    private $_filePointer;
    private $_settings;
    private array $_entries = [];

    public function __construct(string $file_name, object $settings = null)
    {
        $this->_settings = array_merge([
            'delimiter' => "\t",
            'enclosure' => "\"",
        ], $settings ?? []);

        $this->_fileName = $file_name;
        $this->_openFile();
    }

    public function __destruct()
    {
        $this->_closeFile();
    }

    private function _openFile(): void
    {
        try {
            $this->_filePointer = fopen(dirname($this->_fileName).'/data.csv', "w");
        } catch (\Exception $e) {
            throw new \Exception('File cannot be opened: ' . $e->getMessage());
        }

        $this->_writeHeader();
    }

    private function _closeFile(): void
    {
        if(is_resource($this->_filePointer)) {
            fclose($this->_filePointer);
        }
    }

    private function _writeHeader(): void
    {
        fputcsv($this->_filePointer, $this->_columns, $this->_settings['delimiter'], $this->_settings['enclosure'], eol: "\r\n");
    }

    public function addEntry(object $entry): AdwordsEditorCsvGenerator
    {
        $this->_entries[] = $entry;
        return $this;
    }

    public function addEntries(array $entries): AdwordsEditorCsvGenerator
    {
        foreach ($entries as $entry) {
            $this->addEntry($entry);
        }
        return $this;
    }

    public function createCampaign(): AdCampaign
    {
        $campaign = new AdCampaign($this);
        $this->addEntry($campaign);
        return $campaign;
    }

    public function save(): void
    {
        foreach ($this->_entries as $entry) {
            $this->_writeRow($entry->toArray());
        }
        $this->_copyImages();
        // compress as zip file
        $zip = new \ZipArchive();
        $zip->open($this->_fileName, \ZipArchive::CREATE);
        $zip->addFile(dirname($this->_fileName).'/data.csv', 'data.csv');
        $images = glob(dirname($this->_fileName).'/images/*');
        foreach ($images as $image) {
            $zip->addFile($image, 'images/'.basename($image));
        }
        $zip->close();
        // remove temp files
        unlink(dirname($this->_fileName).'/data.csv');
        foreach ($images as $image) {
            unlink($image);
        }
        // remove images folder
        rmdir(dirname($this->_fileName).'/images');
    }

    private function _copyImages(): void
    {
        $images = [];
        foreach ($this->_entries as $entry) {
            if($entry instanceof AdImageExtension || $entry instanceof AdImage || $entry instanceof AdBusinessLogo) {
                $images[] = $entry->image;
            }
        }
        $images = array_unique($images);
        @mkdir(dirname($this->_fileName) . '/images');
        foreach ($images as $image) {
            copy($image, dirname($this->_fileName) . '/images/' . basename($image));
        }
    }

    private function _writeRow(array $data): void
    {
        $blank_row = [];
        foreach ($this->_columns as $value) {
            $blank_row[strtolower(str_replace(' ', '-', $value))] = '';
        }
        $row = array_merge($blank_row, $data);
        // ensure row is UTF-8 encoded
        // $row = array_map("utf8_decode", $row);
        fputcsv($this->_filePointer, $row, $this->_settings['delimiter'], $this->_settings['enclosure'], eol: "\r\n");
    }

    /**
     * Write Ad group
     *
     * @param array $data
     */
    public function writeAdGroup(array $data = [
        'campaign' => 'Campaign',
        'ad-group' => 'Ad Group',
        'max-cpc' => '1',
        'max-cpt' => '1',
        'ad-group-status' => 'Active'
    ]): void
    {

        $this->_writeRow($data);
    }

    /**
     * Write keyword
     *
     * @param array $data
     */
    public function writeKeyword(array $data = [
        'campaign' => 'Campaign',
        'ad-group' => 'Ad Group',
        'keyword' => 'Keyword',
        'criterion-type' => 'Phrase',
        'status' => 'Active',
    ])
    {

        $this->_writeRow($data);
    }

    /**
     * Write ad
     *
     * @param array $data
     */
    public function writeAd(array $data = [
        'campaign' => 'Campaign',
        'ad-group' => 'Ad Group',
        'description-line-1' => 'Description line 1',
        'description-line-2' => 'Description line 2',
        'headline-1' => 'Headline 1',
        'headline-2' => 'Headline 2',
        'headline-3' => 'Headline 3',
        'final-url' => 'https://www.final.com/',
        'status' => 'Active',
    ]): void
    {

        $this->_writeRow($data);
    }

    /**
     * Write age
     *
     * @param array $data
     */
    public function writeAge(array $data = [
        'campaign' => 'Campaign',
        'ad-group' => 'Ad Group',
        'age' => 'Unknown',
        'status' => 'Active',
    ])
    {

        $this->_writeRow($data);
    }

    /**
     * Write age
     *
     * @param array $data
     */
    public function writeGender(array $data = [
        'campaign' => 'Campaign',
        'ad-group' => 'Ad Group',
        'gender' => 'Unknown',
        'status' => 'Active',
    ]): void
    {

        $this->_writeRow($data);
    }

    /**
     * Write all age groups
     *
     * @param array $data
     */
    public function writeAllAges(array $data = [
        'campaign' => 'Campaign',
        'ad-group' => 'Ad Group',
        'status' => 'Active',
    ]): void
    {
        foreach ($this->_ageGroups as $ageGroup) {
            $data['age'] = $ageGroup;
            $this->_writeRow($data);
        }
    }

    /**
     * Write all genders
     *
     * @param array $data
     */
    public function writeAllGenders(array $data = [
        'campaign' => 'Campaign',
        'ad-group' => 'Ad Group',
        'status' => 'Active',
    ]): void
    {
        foreach ($this->_genders as $gender) {
            $data['gender'] = $gender;
            $this->_writeRow($data);
        }
    }
}
