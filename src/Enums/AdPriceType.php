<?php

namespace Pezhvak\AdwordsEditorCsvGenerator\Enums;

enum AdPriceType: string
{
    case Brands = 'Brands';
    case Events = 'Events';
    case Locations = 'Locations';
    case Neighborhoods = 'Neighborhoods';
    case ProductCategories = 'Product categories';
    case ProductTiers = 'Product tiers';
    case ServiceCategories = 'Service categories';
    case ServiceTiers = 'Service tiers';
    case Services = 'Services';

    public static function toLocalized(AdLanguage $language): array
    {
        if($language == AdLanguage::Dutch) {
            return [
                self::Brands->value => 'Merken',
                self::Events->value => 'Evenementen',
                self::Locations->value => 'Locaties',
                self::Neighborhoods->value => 'Buurten',
                self::ProductCategories->value => 'Productcategorieën',
                self::ProductTiers->value => 'Productiveaus',
                self::ServiceCategories->value => 'Servicecategorieën',
                self::ServiceTiers->value => 'Serviceniveaus',
                self::Services->value => 'Services',
            ];
        }
        if($language == AdLanguage::French) {
            return [
                self::Brands->value => 'Marques',
                self::Events->value => 'Événements',
                self::Locations->value => 'Lieux',
                self::Neighborhoods->value => 'Quartiers',
                self::ProductCategories->value => 'Catégories de produits',
                self::ProductTiers->value => 'Niveaux de produits',
                self::ServiceCategories->value => 'Catégories de services',
                self::ServiceTiers->value => 'Niveaux de service',
                self::Services->value => 'Services',
            ];
        }
        if($language == AdLanguage::German) {
            return [
                self::Brands->value => 'Marken',
                self::Events->value => 'Veranstaltungen',
                self::Locations->value => 'Standorte',
                self::Neighborhoods->value => 'Stadtteile',
                self::ProductCategories->value => 'Produktkategorien',
                self::ProductTiers->value => 'Produktvarianten',
                self::ServiceCategories->value => 'Dienstleistungskategorien',
                self::ServiceTiers->value => 'Dienstleistungsvarianten',
                self::Services->value => 'Dienstleistungen',
            ];
        }
        if($language == AdLanguage::Italian) {
            return [
                self::Brands->value => 'Brand',
                self::Events->value => 'Eventi',
                self::Locations->value => 'Località',
                self::Neighborhoods->value => 'Quartieri',
                self::ProductCategories->value => 'Categorie di prodotti',
                self::ProductTiers->value => 'Livelli di prodotto',
                self::ServiceCategories->value => 'Categorie di servizi',
                self::ServiceTiers->value => 'Livelli di servizio',
                self::Services->value => 'Servizi',
            ];
        }
        if($language == AdLanguage::Japanese) {
            return [
                self::Brands->value => 'ブランド',
                self::Events->value => 'イベント',
                self::Locations->value => '地域',
                self::Neighborhoods->value => '周辺地域',
                self::ProductCategories->value => '商品カテゴリ',
                self::ProductTiers->value => '商品のバリエーション',
                self::ServiceCategories->value => 'サービスカテゴリ',
                self::ServiceTiers->value => 'サービスのグレード',
                self::Services->value => 'サービス',
            ];
        }
        if($language == AdLanguage::Polish) {
            return [
                self::Brands->value => 'Marki',
                self::Events->value => 'Wydarzenia',
                self::Locations->value => 'Lokalizacje',
                self::Neighborhoods->value => 'Okolice',
                self::ProductCategories->value => 'Kategorie produktów',
                self::ProductTiers->value => 'Warianty produktów',
                self::ServiceCategories->value => 'Kategorie usług',
                self::ServiceTiers->value => 'Warianty usług',
                self::Services->value => 'Usługi',
            ];
        }
        if($language == AdLanguage::Portuguese) {
            return [
                self::Brands->value => 'Marcas',
                self::Events->value => 'Eventos',
                self::Locations->value => 'Locais',
                self::Neighborhoods->value => 'Vizinhanças',
                self::ProductCategories->value => 'Categorias de produtos',
                self::ProductTiers->value => 'Níveis de produto',
                self::ServiceCategories->value => 'Categorias de serviços',
                self::ServiceTiers->value => 'Níveis de serviço',
                self::Services->value => 'Serviços',
            ];
        }
        if($language == AdLanguage::Russian) {
            return [
                self::Brands->value => 'Бренды',
                self::Events->value => 'События',
                self::Locations->value => 'Mеста',
                self::Neighborhoods->value => 'Pайоны',
                self::ProductCategories->value => 'Категории товаров',
                self::ProductTiers->value => 'Варианты товаров',
                self::ServiceCategories->value => 'Категории услуг',
                self::ServiceTiers->value => 'Варианты услуг',
                self::Services->value => 'Услуги',
            ];
        }
        if($language == AdLanguage::Spanish) {
            return [
                self::Brands->value => 'Marcas',
                self::Events->value => 'Eventos',
                self::Locations->value => 'Ubicaciones geográficas',
                self::Neighborhoods->value => 'Barrios',
                self::ProductCategories->value => 'Categorías de producto',
                self::ProductTiers->value => 'Games de producto',
                self::ServiceCategories->value => 'Categorías de servicio',
                self::ServiceTiers->value => 'Gamas de servicio',
                self::Services->value => 'Servicios',
            ];
        }
        if($language == AdLanguage::Swedish) {
            return [
                self::Brands->value => 'Varumärken',
                self::Events->value => 'Händelser',
                self::Locations->value => 'Platser',
                self::Neighborhoods->value => 'Grannskap',
                self::ProductCategories->value => 'Produktkategorier',
                self::ProductTiers->value => 'Produktnivåer',
                self::ServiceCategories->value => 'Tjänstekategorier',
                self::ServiceTiers->value => 'Tjänstenivåer',
                self::Services->value => 'Tjänster',
            ];
        }
        return [
            self::Brands->value => self::Brands->value,
            self::Events->value => self::Events->value,
            self::Locations->value => self::Locations->value,
            self::Neighborhoods->value => self::Neighborhoods->value,
            self::ProductCategories->value => self::ProductCategories->value,
            self::ProductTiers->value => self::ProductTiers->value,
            self::ServiceCategories->value => self::ServiceCategories->value,
            self::ServiceTiers->value => self::ServiceTiers->value,
            self::Services->value => self::Services->value,
        ];
    }
}
