<?php

namespace Leifur\Utils;

class Constants
{
    //region PRIORITIES LIST
    const PRIORITY_QUICK  = 'quick';
    const PRIORITY_MEDIUM = 'medium';
    const PRIORITY_LONG   = 'long';
    public static $priorities = [
        self::PRIORITY_QUICK,
        self::PRIORITY_MEDIUM,
        self::PRIORITY_LONG,
    ];
    //endregion
    //region STAGES
    const MANAGER_STAGE   = 1;
    const CRAWL_STAGE     = 2;
    const PARSE_STAGE     = 3;
    const HANDLE_STAGE    = 4;
    const REPORT_STAGE    = 5;
    const COMPLETED_STAGE = 6;
    //endregion
}