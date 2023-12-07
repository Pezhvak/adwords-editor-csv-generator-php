<?php

namespace Pezhvak\AdwordsEditorCsvGenerator\Enums;

enum AdKeywordMatchType: string
{
    case ExactMatch = 'Exact';
    case PhraseMatch = 'Phrase';
    case BroadMatch = 'Broad';
}
