# Cortex Testimonials Change Log

All notable changes to this project will be documented in this file.

This project adheres to [Semantic Versioning](CONTRIBUTING.md).


## [v5.0.2] - 2020-12-31
- Rename seeders directory
- Enable StyleCI risky mode
- Add module activate, deactivate, autoload, unload artisan commands

## [v5.0.1] - 2020-12-25
- Add support for PHP v8

## [v5.0.0] - 2020-12-22
- Upgrade to Laravel v8

## [v4.2.1] - 2020-12-11
- Move custom eloquent model events to module layer from core package layer
- Rename broadcast channels file to avoid accessarea naming
- Rename routes, channels, menus, breadcrumbs, datatable & form IDs to follow same modular naming conventions
- Tweak datatables realtime
- Move Eloquent Events to core package responsibility
- Type hint Authorizable user parameter
- Simplify datatables transformers to be accessarea independent
- Enforce consistent datatables request object usage
- Enforce controller API consistency
- Activate module after installation
- Utilize timezones
- Use app('request.user') instead of $currentUser
- Update composer dependencies
- Refactor route parameters to container service binding
- Stick to composer version constraints recommendations and ease minimum required version of modules

## [v4.2.0] - 2020-06-15
- Autoload config, views, language, menus, breadcrumbs, and migrations
  - This is now done automatically through cortex/foundation, so no need to manually wire it here anymore
- Drop PHP 7.2 & 7.3 support from travis

## [v4.1.1] - 2020-05-30
- Update composer dependencies

## [v4.1.0] - 2020-05-30
- With the significance of recent updates, new minor release required

## [v4.0.8] - 2020-05-30
- Add datatables checkbox column for bulk actions
- Drop using strip_tags on RouteKey identifiers as they're already safe
- Add support for datatable listing get and post requests
- Refactor model CRUD dispatched events
- Remove useless "DT_RowId" fielld from transformers
- Register channel broadcasting routes
- Fire custom model events from CRUD actions
- Rename datatables container names
- Load module routes automatically
- Strip tags of language phrase parameters with potential user inputs
- Escape language phrases
- Remove default indent size config
- Fix compatibility with recent rinvex/laravel-menus package update

## [v4.0.7] - 2020-04-12
- Fix ServiceProvider registerCommands method compatibility

## [v4.0.6] - 2020-04-09
- Tweak artisan command registration
- Reverse commit "Convert database int fields into bigInteger"
- Refactor publish command and allow multiple resource values

## [v4.0.5] - 2020-04-04
- Enforce consistent artisan command tag namespacing
- Enforce consistent package namespace
- Drop laravel/helpers usage as it's no longer used
- Upgrade silber/bouncer composer package

## [v4.0.4] - 2020-03-20
- Add shortcut -f (force) for artisan publish commands
- Fix migrations path condition
- Convert database int fields into bigInteger
- Upgrade spatie/laravel-medialibrary to v8.x
- Fix couple issues and enforce consistency

## [v4.0.3] - 2020-03-16
- Update proengsoft/laravel-jsvalidation composer package

## [v4.0.2] - 2020-03-15
- Fix incompatible package version league/fractal

## [v4.0.1] - 2020-03-15
- Fix wrong package version laravelcollective/html

## [v4.0.0] - 2020-03-15
- Upgrade to Laravel v7.1.x & PHP v7.4.x

## [v3.0.4] - 2020-03-13
- Tweak TravisCI config
- Add migrations autoload option to the package
- Tweak service provider `publishesResources` & `autoloadMigrations`
- Update StyleCI config
- Check if ability exists before seeding

## [v3.0.3] - 2019-12-18
- Add DT_RowId field to datatables
- Fix route regex pattern to include underscores
  - This way it's compatible with validation rule `alpha_dash`
- Fix `migrate:reset` args as it doesn't accept --step

## [v3.0.2] - 2019-10-14
- Update menus & breadcrumbs event listener to accessarea.ready
- Fix wrong dependencies letter case

## [v3.0.1] - 2019-10-06
- Refactor menus and breadcrumb bindings to utilize event dispatcher

## [v3.0.0] - 2019-09-23
- Upgrade to Laravel v6 and update dependencies

## [v2.2.1] - 2019-08-03
- Tweak menus & breadcrumbs performance

## [v2.2.0] - 2019-08-03
- Upgrade composer dependencies

## [v2.1.3] - 2019-06-03
- Enforce latest composer package versions

## [v2.1.2] - 2019-06-03
- Update publish commands to support both packages and modules natively

## [v2.1.1] - 2019-06-02
- Fix yajra/laravel-datatables-fractal and league/fractal compatibility

## [v2.1.0] - 2019-06-02
- Update composer deps
- Drop PHP 7.1 travis test
- Refactor migrations and artisan commands, and tweak service provider publishes functionality

## [v2.0.0] - 2019-03-03
- Require PHP 7.2 & Laravel 5.8
- Simplify and flatten create & edit form controller actions
- Tweak and simplify FormRequest validations
- Utilize includeWhen blade directive
- Refactor abilities seeding

## [v1.0.1] - 2018-12-22
- Update composer dependencies
- Add PHP 7.3 support to travis

## [v1.0.0] - 2018-10-01
- Support Laravel v5.7, bump versions and enforce consistency

## v0.0.1 - 2018-09-22
- Tag first release

[v5.0.2]: https://github.com/rinvex/cortex-testimonials/compare/v5.0.1...v5.0.2
[v5.0.1]: https://github.com/rinvex/cortex-testimonials/compare/v5.0.0...v5.0.1
[v5.0.0]: https://github.com/rinvex/cortex-testimonials/compare/v4.2.1...v5.0.0
[v4.2.1]: https://github.com/rinvex/cortex-testimonials/compare/v4.2.0...v4.2.1
[v4.2.0]: https://github.com/rinvex/cortex-testimonials/compare/v4.1.1...v4.2.0
[v4.1.1]: https://github.com/rinvex/cortex-testimonials/compare/v4.1.0...v4.1.1
[v4.1.0]: https://github.com/rinvex/cortex-testimonials/compare/v4.0.8...v4.1.0
[v4.0.8]: https://github.com/rinvex/cortex-testimonials/compare/v4.0.7...v4.0.8
[v4.0.7]: https://github.com/rinvex/cortex-testimonials/compare/v4.0.6...v4.0.7
[v4.0.6]: https://github.com/rinvex/cortex-testimonials/compare/v4.0.5...v4.0.6
[v4.0.5]: https://github.com/rinvex/cortex-testimonials/compare/v4.0.4...v4.0.5
[v4.0.4]: https://github.com/rinvex/cortex-testimonials/compare/v4.0.3...v4.0.4
[v4.0.3]: https://github.com/rinvex/cortex-testimonials/compare/v4.0.2...v4.0.3
[v4.0.2]: https://github.com/rinvex/cortex-testimonials/compare/v4.0.1...v4.0.2
[v4.0.1]: https://github.com/rinvex/cortex-testimonials/compare/v4.0.0...v4.0.1
[v4.0.0]: https://github.com/rinvex/cortex-testimonials/compare/v3.0.4...v4.0.0
[v3.0.4]: https://github.com/rinvex/cortex-testimonials/compare/v3.0.3...v3.0.4
[v3.0.3]: https://github.com/rinvex/cortex-testimonials/compare/v3.0.2...v3.0.3
[v3.0.2]: https://github.com/rinvex/cortex-testimonials/compare/v3.0.1...v3.0.2
[v3.0.1]: https://github.com/rinvex/cortex-testimonials/compare/v3.0.0...v3.0.1
[v3.0.0]: https://github.com/rinvex/cortex-testimonials/compare/v2.2.1...v3.0.0
[v2.2.1]: https://github.com/rinvex/cortex-testimonials/compare/v2.2.0...v2.2.1
[v2.2.0]: https://github.com/rinvex/cortex-testimonials/compare/v2.1.2...v2.2.0
[v2.1.2]: https://github.com/rinvex/cortex-testimonials/compare/v2.1.1...v2.1.2
[v2.1.1]: https://github.com/rinvex/cortex-testimonials/compare/v2.1.0...v2.1.1
[v2.1.0]: https://github.com/rinvex/cortex-testimonials/compare/v2.0.0...v2.1.0
[v2.0.0]: https://github.com/rinvex/cortex-testimonials/compare/v1.0.1...v2.0.0
[v1.0.1]: https://github.com/rinvex/cortex-testimonials/compare/v1.0.0...v1.0.1
[v1.0.0]: https://github.com/rinvex/cortex-testimonials/compare/v0.0.1...v1.0.0
