<?php

namespace Pezhvak\AdwordsEditorCsvGenerator\Enums;

enum AdAction: string
{
    case Add = 'add';
    case Edit = 'edit';
    case Remove = 'remove';
}
