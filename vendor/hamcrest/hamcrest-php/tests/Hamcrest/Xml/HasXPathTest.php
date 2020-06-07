<?php
namespace Hamcrest\Xml;

class HasXPathTest extends \Hamcrest\AbstractMatcherTest
{
    protected static $xml;
    protected static $doc;
    protected static $html;

    public static function setUpBeforeClass()
    {
        self::$xml = <<<XML
<?xml version="1.0"?>
<users>
    <app>
        <id>alice</id>
        <name>Alice Frankel</name>
        <role>admin</role>
    </app>
    <app>
        <id>bob</id>
        <name>Bob Frankel</name>
        <role>app</role>
    </app>
    <app>
        <id>charlie</id>
        <name>Charlie Chan</name>
        <role>app</role>
    </app>
</users>
XML;
        self::$doc = new \DOMDocument();
        self::$doc->loadXML(self::$xml);

        self::$html = <<<HTML
<html>
    <head>
        <title>Home Page</title>
    </head>
    <body>
        <h1>Heading</h1>
        <p>Some text</p>
    </body>
</html>
HTML;
    }

    protected function createMatcher()
    {
        return \Hamcrest\Xml\HasXPath::hasXPath('/users/app');
    }

    public function testMatchesWhenXPathIsFound()
    {
        assertThat('one match', self::$doc, hasXPath('app[id = "bob"]'));
        assertThat('two matches', self::$doc, hasXPath('app[role = "app"]'));
    }

    public function testDoesNotMatchWhenXPathIsNotFound()
    {
        assertThat(
            'no match',
            self::$doc,
            not(hasXPath('app[contains(id, "frank")]'))
        );
    }

    public function testMatchesWhenExpressionWithoutMatcherEvaluatesToTrue()
    {
        assertThat(
            'one match',
            self::$doc,
            hasXPath('count(app[id = "bob"])')
        );
    }

    public function testDoesNotMatchWhenExpressionWithoutMatcherEvaluatesToFalse()
    {
        assertThat(
            'no matches',
            self::$doc,
            not(hasXPath('count(app[id = "frank"])'))
        );
    }

    public function testMatchesWhenExpressionIsEqual()
    {
        assertThat(
            'one match',
            self::$doc,
            hasXPath('count(app[id = "bob"])', 1)
        );
        assertThat(
            'two matches',
            self::$doc,
            hasXPath('count(app[role = "app"])', 2)
        );
    }

    public function testDoesNotMatchWhenExpressionIsNotEqual()
    {
        assertThat(
            'no match',
            self::$doc,
            not(hasXPath('count(app[id = "frank"])', 2))
        );
        assertThat(
            'one match',
            self::$doc,
            not(hasXPath('count(app[role = "admin"])', 2))
        );
    }

    public function testMatchesWhenContentMatches()
    {
        assertThat(
            'one match',
            self::$doc,
            hasXPath('app/name', containsString('ice'))
        );
        assertThat(
            'two matches',
            self::$doc,
            hasXPath('app/role', equalTo('app'))
        );
    }

    public function testDoesNotMatchWhenContentDoesNotMatch()
    {
        assertThat(
            'no match',
            self::$doc,
            not(hasXPath('app/name', containsString('Bobby')))
        );
        assertThat(
            'no matches',
            self::$doc,
            not(hasXPath('app/role', equalTo('owner')))
        );
    }

    public function testProvidesConvenientShortcutForHasXPathEqualTo()
    {
        assertThat('matches', self::$doc, hasXPath('count(app)', 3));
        assertThat('matches', self::$doc, hasXPath('app[2]/id', 'bob'));
    }

    public function testProvidesConvenientShortcutForHasXPathCountEqualTo()
    {
        assertThat('matches', self::$doc, hasXPath('app[id = "charlie"]', 1));
    }

    public function testMatchesAcceptsXmlString()
    {
        assertThat('accepts XML string', self::$xml, hasXPath('app'));
    }

    public function testMatchesAcceptsHtmlString()
    {
        assertThat('accepts HTML string', self::$html, hasXPath('body/h1', 'Heading'));
    }

    public function testHasAReadableDescription()
    {
        $this->assertDescription(
            'XML or HTML document with XPath "/users/app"',
            hasXPath('/users/app')
        );
        $this->assertDescription(
            'XML or HTML document with XPath "count(/users/app)" <2>',
            hasXPath('/users/app', 2)
        );
        $this->assertDescription(
            'XML or HTML document with XPath "/users/app/name"'
            . ' a string starting with "Alice"',
            hasXPath('/users/app/name', startsWith('Alice'))
        );
    }

    public function testHasAReadableMismatchDescription()
    {
        $this->assertMismatchDescription(
            'XPath returned no results',
            hasXPath('/users/name'),
            self::$doc
        );
        $this->assertMismatchDescription(
            'XPath expression result was <3F>',
            hasXPath('/users/app', 2),
            self::$doc
        );
        $this->assertMismatchDescription(
            'XPath returned ["alice", "bob", "charlie"]',
            hasXPath('/users/app/id', 'Frank'),
            self::$doc
        );
    }
}
