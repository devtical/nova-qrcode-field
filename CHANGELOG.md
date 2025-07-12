# Changelog

All notable changes to `laravel-helpers` will be documented in this file.

## V2.0.6 - 2025-07-12

### What's Changed

* Support Laravel 12 by @Kristories in https://github.com/devtical/nova-qrcode-field/pull/28

**Full Changelog**: https://github.com/devtical/nova-qrcode-field/compare/v2.0.5...v2.0.6

## v2.0.5 - 2025-01-30

### What's Changed

* Support hideWhen by @Kristories in https://github.com/devtical/nova-qrcode-field/pull/26

**Full Changelog**: https://github.com/devtical/nova-qrcode-field/compare/v2.0.4...v2.0.5

## v2.0.4 - 2025-01-30

### What's Changed

* Fix #24 by @Kristories in https://github.com/devtical/nova-qrcode-field/pull/25

**Full Changelog**: https://github.com/devtical/nova-qrcode-field/compare/v2.0.3...v2.0.4

## v2.0.3 - 2024-11-11

### [v2.0.3]

#### Added

- **Dynamic Margin Adjustment**: QR code margin now adjusts automatically based on the QR code size. If the size is greater than `250`, it applies the value specified in `->margin()`, and defaults to `1` for sizes `250` or smaller.

#### Changed

- **Dependency Update**: Migrated QR code generation from `vue-qr` to `Awesome-qr.js`, enabling enhanced customization options for QR codes, including support for background images, logo images, and dynamic styling options.

#### Documentation

- Updated README with examples showcasing dynamic margin settings, logo and background configuration, and usage instructions for `Awesome-qr.js`.
- Added notes on customizing margin based on size and details of the migration to `Awesome-qr.js`.

#### Credits

- Special thanks to the developers of [vue-qr](https://github.com/Binaryify/vue-qr) for their previous library support.
- Kudos to [Awesome-qr.js](https://github.com/SumiMakito/Awesome-qr.js) for providing improved customization features.


---

**Upgrade Note**: For existing users, please replace any `vue-qr` references with the new settings and ensure you update your `composer.json` file with `devtical/nova-qrcode-field` v2.0.3 to apply these enhancements.

## v2.0.2 - 2023-11-25

**Full Changelog**: https://github.com/devtical/nova-qrcode-field/compare/v2.0.1...v2.0.2

## v2.0.1 - 2023-02-27

### What's Changed

- feat: pass padding to vue-qr by @mark-nicepants in https://github.com/devtical/nova-qrcode-field/pull/20

### New Contributors

- @mark-nicepants made their first contribution in https://github.com/devtical/nova-qrcode-field/pull/20

**Full Changelog**: https://github.com/devtical/nova-qrcode-field/compare/v2.0.0...v2.0.1

## Version 2.0.0

**Full Changelog**: https://github.com/devtical/nova-qrcode-field/compare/v1.0.0...v2.0.0

## Version 1.0.0

### What's Changed

- Support Laravel Nova 4.0 by @metrixinfo in https://github.com/wearedevtical/nova-qrcode-field/pull/12

**Full Changelog**: https://github.com/wearedevtical/nova-qrcode-field/compare/v0.0.4...v1.0.0

## Version 0.0.4

### What's Changed

- Make method signature compatible with Laravel Nova v4. by @metrixinfo in https://github.com/wearedevtical/nova-qrcode-field/pull/10

### New Contributors

- @metrixinfo made their first contribution in https://github.com/wearedevtical/nova-qrcode-field/pull/10

**Full Changelog**: https://github.com/wearedevtical/nova-qrcode-field/compare/v0.0.3...v0.0.4

## Version 0.0.3

### What's Changed

- Refactored to use value from the underlaying resource(as should do a field in nova) by @yuriy-martini in https://github.com/Kristories/nova-qrcode-field/pull/7

### New Contributors

- @yuriy-martini made their first contribution in https://github.com/Kristories/nova-qrcode-field/pull/7

**Full Changelog**: https://github.com/Kristories/nova-qrcode-field/compare/v0.0.2...v0.0.3

## Version 0.0.2

### What's Changed

- Update Qrcode.php by @bsormagec in https://github.com/Kristories/nova-qrcode-field/pull/4
- Add size options for detail and index views by @DanielLavoie90 in https://github.com/Kristories/nova-qrcode-field/pull/6

### New Contributors

- @bsormagec made their first contribution in https://github.com/Kristories/nova-qrcode-field/pull/4
- @DanielLavoie90 made their first contribution in https://github.com/Kristories/nova-qrcode-field/pull/6

**Full Changelog**: https://github.com/Kristories/nova-qrcode-field/compare/v0.0.1...v0.0.2

## Version 0.0.1

- Initial release
