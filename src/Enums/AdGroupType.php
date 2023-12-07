<?php

namespace Pezhvak\AdwordsEditorCsvGenerator\Enums;

enum AdGroupType: string
{
    case Standard = 'Standard';
    case Dynamic = 'Dynamic';
    case Display = 'Display';
    case DisplayEngagement = 'Display Engagement';
    case ShoppingProduct = 'Shopping - Product';
    case ShoppingShowcase = 'Shopping - Showcase';
    case ShoppingSmart = 'Shopping - Smart';
    case InStream = 'In-Stream';
    case InFeedVideo = 'In-Feed Video';
    case Bumper = 'Bumper';
    case NonSkippable = 'Non-Skippable';
    case Hotel = 'Hotel';
    case HotelsPropertyPromotion = 'Hotels - Property Promotion';
    case EfficientReach = 'Efficient Reach';
    case VideoAction = 'Video Action';
}
