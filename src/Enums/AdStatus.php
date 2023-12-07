<?php

namespace Pezhvak\AdwordsEditorCsvGenerator\Enums;

enum AdStatus: string
{
    case ENABLED = 'enabled';
    case PAUSED = 'paused';
    case REMOVED = 'removed';
}
