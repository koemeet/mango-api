# Symfony CMF Media Bundle

[![Build Status](https://secure.travis-ci.org/symfony-cmf/MediaBundle.png)](http://travis-ci.org/symfony-cmf/MediaBundle)
[![Latest Stable Version](https://poser.pugx.org/symfony-cmf/media-bundle/version.png)](https://packagist.org/packages/symfony-cmf/media-bundle)
[![Total Downloads](https://poser.pugx.org/symfony-cmf/media-bundle/d/total.png)](https://packagist.org/packages/symfony-cmf/media-bundle)

This bundle is part of the [Symfony Content Management Framework (CMF)](http://cmf.symfony.com/)
and licensed under the [MIT License](LICENSE).

The MediaBundle provides a way to store and edit any media and provides a
generic base of common interfaces and models that allow the user to build media
management solutions for a CMS. Media can be images, binary documents (like pdf
files), embedded movies, uploaded movies, MP3s, etc. The implementation of this
bundle is **very** minimalistic and is focused on images and download files.
If you need more functionality (like cdn, thumbnail generation, providers for
different media types and more) take a look at
[SonataMediaBundle](https://github.com/sonata-project/SonataMediaBundle). The
MediaBundle provides integration with SonataMediaBundle.


## Requirements

* Symfony 2.2.x
* See also the `require` section of [composer.json](composer.json)

## Documentation

For the install guide and reference, see:

* [MediaBundle documentation](http://symfony.com/doc/master/cmf/bundles/media/index.html)

See also:

* [All Symfony CMF documentation](http://symfony.com/doc/master/cmf/index.html) - complete Symfony CMF reference
* [Symfony CMF Website](http://cmf.symfony.com/) - introduction, live demo, support and community links


## Contributing

Pull requests are welcome. Please see our
[CONTRIBUTING](https://github.com/symfony-cmf/symfony-cmf/blob/master/CONTRIBUTING.md)
guide.

Unit and/or functional tests exist for this bundle. See the
[Testing documentation](http://symfony.com/doc/master/cmf/components/testing.html)
for a guide to running the tests.

Thanks to
[everyone who has contributed](https://github.com/symfony-cmf/MediaBundle/contributors) already.
