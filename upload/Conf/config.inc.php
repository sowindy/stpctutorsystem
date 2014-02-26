<?php
    return array(
        'DB_TYPE'=>'mysql',
        'DB_HOST'=>'localhost',
        'DB_NAME'=>'QuoraCms',
        'DB_USER'=>'root',
        'DB_PWD'=>'',
        'DB_PORT'=>3306,
        'DB_PREFIX'=>'qcs_',
        'APP_DEBUG'=>false,
        'DATA_CACHE_TIME'=>'3600',
        'TMPL_L_DELIM'=> '@#',
        'TMPL_R_DELIM'=> '#@',
        'LOG_RECORD' =>false,
        'URL_PATHINFO_DEPR' => '-',
        'URL_PATHINFO_MODEL' => 2,
        'URL_CASE_INSENSITIVE' => true,
        'PAGE_ROLLPAGE'=>8, 
        'PAGE_LISTROWS'=>20, 
        'TMPL_PARSE_STRING'=>array
                (
                 '__PUBLIC__' => '/QuoraCms/upload/Public',
                 '__SITE__' => '/QuoraCms/upload',
                 '__BOOTJS__' => '/QuoraCms/upload/Public/assets/js',
                 '__BOOTIMG__' => '/QuoraCms/upload/Public/assets/img',
                 '__BOOTCSS__' => '/QuoraCms/upload/Public/assets/css',
                ),
        'MAX_STU_NUM'=>6,
    );
    ?>