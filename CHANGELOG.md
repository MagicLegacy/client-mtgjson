# Changelog
All notable changes to this project will be documented in this file.

The format based on [Keep a Changelog](http://keepachangelog.com/en/1.0.0/)
and this project adheres to [Semantic Versioning](http://semver.org/spec/v2.0.0.html).

```
## [tag] - YYYY-MM-DD
[tag]: https://github.com/MagicLegacy/mtgjson-client/compare/1.2.0...master
### Changed
 - Change 1
### Added
 - Added 1
### Removed
 - Remove 1
```

## [2.0.0] - 2023-09
[1.2.0]: https://github.com/MagicLegacy/mtgjson-client/compare/1.1.2...1.2.0
### Added
- Support PHP 8.2 & PHP 8.3
### Removed
- Remove Safe dependency
- Drop support of PHP 7.4 & PHP 8.0
### Changed
- BC: Now use eureka/component-serialize instead of embedded serializer
- Increase phpstan php min version
- Update Makefile

----

## [1.2.0] - 2022-11-14
[1.2.0]: https://github.com/MagicLegacy/mtgjson-client/compare/1.1.2...1.2.0
### Added
 - PHPStan + Config
### Removed
 - PHP Compatibility
### Changed
 - Add property type hint
 - Fix some possible error from phpstan report analyze
 - Improve & add some phpdoc


## [1.1.2] 2021-11-12
[1.1.2]: https://github.com/MagicLegacy/mtgjson-client/compare/1.1.1...1.1.2
### Changed
 - Namespace for tests classes
 - Fix notice for Atomic Card parser with convertedManaCost property

## [1.1.1] 2021-03-02
[1.1.1]: https://github.com/MagicLegacy/mtgjson-client/compare/1.1.0...1.1.1
### Changed
 - Fix Atomic Card entity & Formatter (add missing keywords & remove uuid)
 - Some code style / PSR fix
 - Add typehint on some files

## [1.1.0] - 2021-03-02
[1.1.0]: https://github.com/MagicLegacy/mtgjson-client/compare/1.0.0...1.1.0
### Changed
 - Fix Atomic Card entity & Formatter (add missing keywords & remove uuid)
 - Some code style / PSR fix
 - Add typehint on some files


## [1.0.0] - 2021-03-02
[1.0.0]: https://github.com/MagicLegacy/mtgjson-client/compare/0.3.0...1.0.0
### Changed
 - now require php 7.4
 - Update composer.json
 - Fix tests

----

## [0.3.0] - 2020-10-30
[0.3.0]: https://github.com/MagicLegacy/mtgjson-client/compare/0.2.0...0.3.0
### Changed
 - Upgrade dependency curl & require php 7.4

## [0.2.0] - 2020-09-04 - Release v0.2.0
[0.2.0]: https://github.com/MagicLegacy/mtgjson-client/compare/0.1.0...0.2.0
### Changed
 - Regroup all client in one (MtgJsonClient)
 - Update tests
 - Update examples
 - Update code

## 0.1.0 - 2020-09-04 - Release v0.1.0
### Added
 - Client for Set
 - Formatter
 - Simple Serializer to easily cache the data
 - Entity SetBasic
 - Exceptions
 - Example
 - README
 - bin & make file
