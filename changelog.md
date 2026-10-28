# Change Log

## Unreleased
### Changed
- Updated to the `develop` branch of `backdrop-dev/framework`, and use the framework's Customize component.
- Replaced Laravel Mix with Vite (`vite.config.js`), matching Inheritance. Assets are built to `public/assets` with a `manifest.json`.
- The export script now includes the `config` folder.

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