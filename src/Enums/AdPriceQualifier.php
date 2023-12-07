<?php

namespace Pezhvak\AdwordsEditorCsvGenerator\Enums;

enum AdPriceQualifier: string
{
    case From = 'From';
    case UpTo = 'Up to';
    case Average = 'Average';

    public static function toLocalized(AdLanguage $language): array
    {
        if($language == AdLanguage::Dutch) {
            return [
                self::From->value => 'Vanaf',
                self::UpTo->value => 'Tot',
                self::Average->value => 'Gemiddeld',
            ];
        }
        if($language == AdLanguage::French) {
            return [
                self::From->value => 'Dès',
                self::UpTo->value => 'Max',
                self::Average->value => 'Prix moyen',
            ];
        }
        if($language == AdLanguage::German) {
            return [
                self::From->value => 'Ab',
                self::UpTo->value => 'Bis',
                self::Average->value => 'Durchschnitt',
            ];
        }
        if($language == AdLanguage::Italian) {
            return [
                self::From->value => 'Da',
                self::UpTo->value => 'Fino a',
                self::Average->value => 'In media',
            ];
        }
        if($language == AdLanguage::Japanese) {
            return [
                self::From->value => '最低',
                self::UpTo->value => '最高',
                self::Average->value => '平均',
            ];
        }
        if($language == AdLanguage::Polish) {
            return [
                self::From->value => 'Od',
                self::UpTo->value => 'Do',
                self::Average->value => 'Średnio',
            ];
        }
        if($language == AdLanguage::Portuguese) {
            return [
                self::From->value => 'A partir de',
                self::UpTo->value => 'Até',
                self::Average->value => 'Em média',
            ];
        }
        if($language == AdLanguage::Russian) {
            return [
                self::From->value => 'От',
                self::UpTo->value => 'До',
                self::Average->value => 'B среднем',
            ];
        }
        if($language == AdLanguage::Spanish) {
            return [
                self::From->value => 'Desde',
                self::UpTo->value => 'Hasta',
                self::Average->value => 'Media',
            ];
        }
        if($language == AdLanguage::Swedish) {
            return [
                self::From->value => 'Från',
                self::UpTo->value => 'till',
                self::Average->value => 'I genomsnitt',
            ];
        }
        return [
            self::From->value => self::From->value,
            self::UpTo->value => self::UpTo->value,
            self::Average->value => self::Average->value,
        ];
    }
}
