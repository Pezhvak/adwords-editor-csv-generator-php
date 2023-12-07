<?php

namespace Pezhvak\AdwordsEditorCsvGenerator\Enums;

enum AdRotation: string
{
    case Optimize = 'Optimize';
    case DoNotOptimize = 'Do not optimize';
    case RemoveValue = 'remove_value';
}
