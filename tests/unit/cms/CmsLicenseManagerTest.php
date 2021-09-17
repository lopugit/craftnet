<?php

namespace craftnettests\unit\cms;

use Codeception\Test\Unit;
use craftnet\Module;

class CmsLicenseManagerTest extends Unit
{
    /**
     * @dataProvider normalizeDomainDataProvider
     * @param $domain
     * @param $expected
     * @param bool $allowCustom
     */
    public function testNormalizeDomain($domain, $expected, bool $allowCustom = false)
    {
        $actual = Module::getInstance()->getCmsLicenseManager()->normalizeDomain($domain, $allowCustom);
        self::assertSame($expected, $actual);
    }

    /**
     * @return array
     */
    public function normalizeDomainDataProvider(): array
    {
        return [
            ['localhost', null],
            ['127.0.0.1', null],
            ['22.2.55.15', null],
            ['1', null],
            ['foobar', null],
            ['foobar.test', null],
            ['foobar.test', 'foobar.test', true],
            ['foobar.com:123', null],
            ['127.0.0.1:123', null],
            ['foobar:123', null],
            ['acc.site.com', null],
            ['acceptance.site.com', null],
            ['craftdemo.site.com', null],
            ['dev.site.com', null],
            ['integration.site.com', null],
            ['loc.site.com', null],
            ['local.site.com', null],
            ['preprod.site.com', null],
            ['qa.site.com', null],
            ['sandbox.site.com', null],
            ['stage.site.com', null],
            ['staging.site.com', null],
            ['systest.site.com', null],
            ['test.site.com', null],
            ['testing.site.com', null],
            ['uat.site.com', null],
            ['clientdev.site.com', 'site.com'],
            ['client-dev.site.com', null],
            ['site.foobar', null],
            ['xn--bcher-kva.com', 'bücher.com'],
            ['site.co.uk', 'site.co.uk'],
            ['site.clientdev.co.uk', 'clientdev.co.uk'],
            ['client-dev.co.uk', 'client-dev.co.uk'],
            ['dev-client.site.co.uk', null],
            ['dev.client.co.uk', null],
            ['craftcms.com', null],
            ['craftdemos.io', null],
            ['ngrok.io', null],
            ['herokuapp.com', null],
            ['site.herokuapp.com', null],
            ['dev.site.kr.com', null],
            ['site.kr.com', 'site.kr.com'],
        ];
    }
}
