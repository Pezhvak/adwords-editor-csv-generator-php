<?php

namespace Pezhvak\AdwordsEditorCsvGenerator\Enums;

enum AdAgeGroup: string
{
    case UNKNOWN = 'Unknown';
    case AGE_18_24 = '18-24';
    case AGE_25_34 = '25-34';
    case AGE_35_44 = '35-44';
    case AGE_45_54 = '45-54';
    case AGE_55_64 = '55-64';
    case AGE_65_OR_MORE = '65 or more';
}
