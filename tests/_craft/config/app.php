<?php

return [
    '*' => [
        'id' => 'craftnet',
        'bootstrap' => [
            'craftnet',
        ],
        'modules' => [
            'craftnet' => [
                'class' => \craftnet\Module::class,
                'components' => [
                    'cmsLicenseManager' => [
                        'class' => craftnet\cms\CmsLicenseManager::class,
                        'devDomains' => require dirname(__DIR__, 3) . '/config/dev-domains.php',
                        'publicDomainSuffixes' => require dirname(__DIR__, 3) . '/config/public-domain-suffixes.php',
                        'devSubdomainWords' => [
                            'acc',
                            'acceptance',
                            'acceptatie',
                            'craftdemo',
                            'dev',
                            'integration',
                            'loc',
                            'local',
                            'preprod',
                            'qa',
                            'sandbox',
                            'stage',
                            'staging',
                            'systest',
                            'test',
                            'testing',
                            'uat',
                        ]
                    ]
                ]
            ]
        ]
    ]
];
