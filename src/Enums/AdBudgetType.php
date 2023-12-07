<?php

namespace Pezhvak\AdwordsEditorCsvGenerator\Enums;

enum AdBudgetType: string
{
    case DAILY = 'Daily';
    case CAMPAIGN_TOTAL = 'Campaign Total';
    case MONTHLY = 'Monthly';
}
