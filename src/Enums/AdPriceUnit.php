<?php

namespace Pezhvak\AdwordsEditorCsvGenerator\Enums;

enum AdPriceUnit: string
{
    case PerHour = 'Per hour';
    case PerDay = 'Per day';
    case PerWeek = 'Per week';
    case PerMonth = 'Per month';
    case PerYear = 'Per year';
    case PerNight = 'Per night';
}
