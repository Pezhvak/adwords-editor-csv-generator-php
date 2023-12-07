<?php

namespace Pezhvak\AdwordsEditorCsvGenerator\Entries;

class EntryBase
{
    protected function enumArrayToStringArray(array $enumArray): array
    {
        $result = [];
        foreach($enumArray as $enum) {
            $result[] = is_string($enum) ? $enum : $enum->value;
        }
        return $result;
    }
}
