<?php

namespace Pezhvak\AdwordsEditorCsvGenerator\Enums;

enum AdLocation: string
{
    case RemoveValue = 'remove_value';
    case AnywhereOnResultsPage = 'Anywhere on results page';
    case TopOfResultsPage = 'Top of results page';
    case AbsoluteTopOfResultsPage = 'Absolute top of results page';
}
