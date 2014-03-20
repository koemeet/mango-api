<?php

namespace Hateoas\Tests\Representation;

use Hateoas\Representation\CollectionRepresentation;
use Hateoas\Representation\PaginatedRepresentation;

class PaginatedRepresentationTest extends RepresentationTestCase
{
    public function testSerialize()
    {
        $collection = new PaginatedRepresentation(
            new CollectionRepresentation(
                array(
                    'Adrien',
                    'William',
                ),
                'authors',
                'users'
            ),
            '/authors',
            array(
                'query' => 'willdurand/Hateoas',
            ),
            3,
            20,
            17
        );

        $this
            ->string($this->hateoas->serialize($collection, 'xml'))
            ->isEqualTo(
                <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<collection page="3" limit="20" pages="17">
  <users rel="authors">
    <entry><![CDATA[Adrien]]></entry>
    <entry><![CDATA[William]]></entry>
  </users>
  <link rel="self" href="/authors?query=willdurand%2FHateoas&amp;page=3&amp;limit=20"/>
  <link rel="first" href="/authors?query=willdurand%2FHateoas&amp;page=1&amp;limit=20"/>
  <link rel="last" href="/authors?query=willdurand%2FHateoas&amp;page=17&amp;limit=20"/>
  <link rel="next" href="/authors?query=willdurand%2FHateoas&amp;page=4&amp;limit=20"/>
  <link rel="previous" href="/authors?query=willdurand%2FHateoas&amp;page=2&amp;limit=20"/>
</collection>

XML
            )
            ->string($this->halHateoas->serialize($collection, 'xml'))
            ->isEqualTo(
                <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<collection page="3" limit="20" pages="17" href="/authors?query=willdurand%2FHateoas&amp;page=3&amp;limit=20">
  <resource rel="authors"><![CDATA[Adrien]]></resource>
  <resource rel="authors"><![CDATA[William]]></resource>
  <link rel="first" href="/authors?query=willdurand%2FHateoas&amp;page=1&amp;limit=20"/>
  <link rel="last" href="/authors?query=willdurand%2FHateoas&amp;page=17&amp;limit=20"/>
  <link rel="next" href="/authors?query=willdurand%2FHateoas&amp;page=4&amp;limit=20"/>
  <link rel="previous" href="/authors?query=willdurand%2FHateoas&amp;page=2&amp;limit=20"/>
</collection>

XML
            )
            ->string($this->halHateoas->serialize($collection, 'json'))
            ->isEqualTo(
                '{'
                    .'"page":3,'
                    .'"limit":20,'
                    .'"pages":17,'
                    .'"_links":{'
                        .'"self":{'
                            .'"href":"\/authors?query=willdurand%2FHateoas&page=3&limit=20"'
                        .'},'
                        .'"first":{'
                            .'"href":"\/authors?query=willdurand%2FHateoas&page=1&limit=20"'
                        .'},'
                        .'"last":{'
                            .'"href":"\/authors?query=willdurand%2FHateoas&page=17&limit=20"'
                        .'},'
                        .'"next":{'
                            .'"href":"\/authors?query=willdurand%2FHateoas&page=4&limit=20"'
                        .'},'
                        .'"previous":{'
                            .'"href":"\/authors?query=willdurand%2FHateoas&page=2&limit=20"'
                        .'}'
                    .'},'
                    .'"_embedded":{'
                        .'"authors":['
                            .'"Adrien",'
                            .'"William"'
                        .']'
                    .'}'
                .'}'
            )
        ;
    }

    public function testGenerateAbsoluteURIs()
    {
        $collection = new PaginatedRepresentation(
            new CollectionRepresentation(
                array(
                    'Adrien',
                    'William',
                ),
                'authors',
                'users'
            ),
            '/authors',
            array(
                'query' => 'willdurand/Hateoas',
            ),
            3,
            20,
            17,
            null,
            null,
            true // force absolute URIs
        );

        $this
            ->string($this->hateoas->serialize($collection, 'xml'))
            ->isEqualTo(
                <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<collection page="3" limit="20" pages="17">
  <users rel="authors">
    <entry><![CDATA[Adrien]]></entry>
    <entry><![CDATA[William]]></entry>
  </users>
  <link rel="self" href="http://example.com/authors?query=willdurand%2FHateoas&amp;page=3&amp;limit=20"/>
  <link rel="first" href="http://example.com/authors?query=willdurand%2FHateoas&amp;page=1&amp;limit=20"/>
  <link rel="last" href="http://example.com/authors?query=willdurand%2FHateoas&amp;page=17&amp;limit=20"/>
  <link rel="next" href="http://example.com/authors?query=willdurand%2FHateoas&amp;page=4&amp;limit=20"/>
  <link rel="previous" href="http://example.com/authors?query=willdurand%2FHateoas&amp;page=2&amp;limit=20"/>
</collection>

XML
            )
            ->string($this->halHateoas->serialize($collection, 'xml'))
            ->isEqualTo(
                <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<collection page="3" limit="20" pages="17" href="http://example.com/authors?query=willdurand%2FHateoas&amp;page=3&amp;limit=20">
  <resource rel="authors"><![CDATA[Adrien]]></resource>
  <resource rel="authors"><![CDATA[William]]></resource>
  <link rel="first" href="http://example.com/authors?query=willdurand%2FHateoas&amp;page=1&amp;limit=20"/>
  <link rel="last" href="http://example.com/authors?query=willdurand%2FHateoas&amp;page=17&amp;limit=20"/>
  <link rel="next" href="http://example.com/authors?query=willdurand%2FHateoas&amp;page=4&amp;limit=20"/>
  <link rel="previous" href="http://example.com/authors?query=willdurand%2FHateoas&amp;page=2&amp;limit=20"/>
</collection>

XML
            )
            ->string($this->halHateoas->serialize($collection, 'json'))
            ->isEqualTo(
                '{'
                    .'"page":3,'
                    .'"limit":20,'
                    .'"pages":17,'
                    .'"_links":{'
                        .'"self":{'
                            .'"href":"http:\/\/example.com\/authors?query=willdurand%2FHateoas&page=3&limit=20"'
                        .'},'
                        .'"first":{'
                            .'"href":"http:\/\/example.com\/authors?query=willdurand%2FHateoas&page=1&limit=20"'
                        .'},'
                        .'"last":{'
                            .'"href":"http:\/\/example.com\/authors?query=willdurand%2FHateoas&page=17&limit=20"'
                        .'},'
                        .'"next":{'
                            .'"href":"http:\/\/example.com\/authors?query=willdurand%2FHateoas&page=4&limit=20"'
                        .'},'
                        .'"previous":{'
                            .'"href":"http:\/\/example.com\/authors?query=willdurand%2FHateoas&page=2&limit=20"'
                        .'}'
                    .'},'
                    .'"_embedded":{'
                        .'"authors":['
                            .'"Adrien",'
                            .'"William"'
                        .']'
                    .'}'
                .'}'
            )
        ;
    }
}
