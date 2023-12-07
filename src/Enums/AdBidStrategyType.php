<?php

namespace Pezhvak\AdwordsEditorCsvGenerator\Enums;

enum AdBidStrategyType: string
{
    case ECPC = 'CPC (enhanced)';
    case MANUAL_CPC = 'Manual CPC';
    case VIEWABLE_CPM = 'Viewable CPM';
    case CPM = 'CPM';
    case CPA_TARGET = 'CPA (target)';
    case MAXIMIZE_CLICKS = 'Maximize Clicks';
    case TARGET_ROAS = 'Target ROAS';
    case TARGET_CPA = 'Target CPA';
    case MAXIMIZE_CONVERSIONS = 'Maximize Conversions';
    case MAXIMIZE_CONVERSION_VALUE = 'Maximize Conversion Value';
    case MANUAL_CPV = 'Manual CPV';
    case CPV = 'CPV';
    case TARGET_CPM = 'Target CPM';
    case CPC_PERCENTAGE = 'CPC%';
    case TARGET_IMPRESSION_SHARE = 'Target Impression Share';
    case COMMISSION = 'Commission';
    case TARGET_POSITION = 'Target Position';
    case TARGET_CPV = 'Target CPV';
}
