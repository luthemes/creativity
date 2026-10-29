# Change Log

## 0.3.0 - 10.28.2026
### Breaking
- Renamed the image size hooks copied from Generosity: `generosity/image/size/register` is now `creativity/image/size/register`, and `generosity/image/size/{name}/label` is now `creativity/image/size/{name}/label`. Child themes using the old names need to update.
- Requires WordPress 5.9 or later (ClassicPress 2.0 or later).

### Fixed
- The customizer fataled ("Cannot access offset of type string on string") and opened with no panels or controls, because the Global Layout control passed its choices in the format the old customize package used.
- Social menu links were empty, with no icon or text, and every page logged a warning per link: the theme looked for icons in `public/svg/` after they had moved to `public/svg/social-icons/`. Icons are now found by the link's site or title, the title is kept for screen readers, and links without an icon keep their title.
- The menu toggles' screen reader text was empty.
- Custom Footer Text showed in the customizer while the "powered by" credit was on; controls that don't apply are now hidden when the customizer opens. The Global Layout picker is styled like Prismatic's.
- Every page printed the charset and viewport meta tags twice.
- Emoji images were unstyled while emoji were enabled, because the framework removes the core emoji styles.
- The settings page and customizer showed a PHP 8.2 "Creation of dynamic property" deprecation.
- The settings page heading, Customize button link and tab classes were empty, and opening it with an unknown view (`?view=...`) fataled.

### Security
- Updated the build tools: Vite 7.3.7, Rollup 4.66.0 (CVE-2026-27606 was fixed in 4.59) and Immutable 5.1.9 (CVE-2026-29063 was fixed in 5.1.5), with `overrides` keeping Rollup and Immutable at patched versions. `npm audit` finds no vulnerabilities.
- `package-lock.json` is committed, and the release workflow installs exactly what it pins with `npm ci` and stops if `npm audit` finds a high or critical vulnerability. Releases used to run `npm install` without a lock file, so each one built with whatever versions were current.

### Changed
- `backdrop-dev/framework`, `backdrop-dev/fonts` and `backdrop-dev/mix` are pinned to the commits this release was tested with.
- Added a translation template, `public/lang/creativity.pot`, and translator comments for the strings with placeholders.
- The child theme instructions in `readme.md` use `Template: creativity`.

## 0.2.9 - 10.28.2026
### Changed
- Updated to the `develop` branch of `backdrop-dev/framework`, and use the framework's Customize component.
- Replaced Laravel Mix with Vite (`vite.config.js`), matching Inheritance. Assets are built to `public/assets` with a `manifest.json`.
- The export script now includes the `config` folder.
- Requires PHP 7.4, to match the framework, and declares `Domain Path: /public/lang` in `style.css`.
- The release workflow no longer needs the `PRIVATE_KEY` or `TOKEN` secrets; it uses GitHub's built-in token and checks that the release tag matches the `style.css` version.

### Removed
- `backdrop-dev/customize`, `webpack.mix.js` and `webpack.mix.export.js`.
- Composer dev dependencies (`wptrt/wpthemereview` is abandoned and blocked `composer install`).

### Fixed
- The Global Layout setting now applies to posts, pages, portfolio items and the 404 page, not only the blog; the Left Sidebar template always uses a left sidebar.
- The home page portfolio section uses the `creativity-medium` image size instead of a size from another theme.
- Added the missing entry templates (`public/views/entry/`), so posts, pages and portfolio items show their content again.
- Restored the core post classes (`post`, `page`, `portfolio`) the styles rely on.
- Restored the `site-title`, `site-description` and core menu item classes the styles and navigation script rely on.
- Show an admin notice instead of a fatal error when the Backdrop framework isn't installed.
- The coding standards workflow, which failed on every run, now pins `10up/wpcs-action@v1.7.0` like Inheritance.

## 0.2.8 - 11.14.2024
### Ehancement
- Fixed Pagination and minor stuff

## 0.2.7 - 08.29.2024

### Ehancements
- Reorganized files and use new features

### Added
- Add some files for upcoming features

## 0.0.2 - 0.2.6 - 07.10.2024

### Enhancements
- A lot of stuff that I don't remember

### Added
- Add screenshot

## 0.0.1 - 05.25.2024
- Theme launch, Everything's new!