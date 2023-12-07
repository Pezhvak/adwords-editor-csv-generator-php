<?php

namespace Pezhvak\AdwordsEditorCsvGenerator\Enums;

enum AdCampaignType: string
{
    case SEARCH = 'Search';
    case DISPLAY = 'Display';
    case SHOPPING = 'Shopping';
    case VIDEO = 'Video';
    case APP = 'App';
    case SMART = 'Smart';
    case HOTEL = 'Hotel';
    case DISCOVERY = 'Discovery';
    case PERFORMANCE_MAX = 'Performance Max';
}
