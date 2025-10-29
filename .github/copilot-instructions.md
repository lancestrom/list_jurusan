This repository is a small CodeIgniter 3 application meant to be served by a PHP web server (the workspace shows XAMPP). The instructions below are focused, actionable notes to help AI coding assistants be immediately productive in this codebase.

Key project layout and the big picture

- Front controller: `index.php` — bootstraps CodeIgniter and sets the `ENVIRONMENT` constant (development/testing/production). Errors and logging depend on this value.
- Core framework: `system/` — do not modify core files unless absolutely necessary.
- App code: `application/` with the standard CI3 structure:
  - `application/config/` — main configuration (`config.php`, `database.php`, `routes.php`, etc.). See `application/config/config.php` for base URL and session defaults.
  - `application/controllers/` — controllers. Example: `Welcome.php` (default controller) simply loads `welcome_message` view.
  - `application/models/` — models (empty by default in this repo).
  - `application/views/` — views. Example: `welcome_message.php` contains hard-coded links and Bootstrap CDN usage.

How requests flow (short contract)

- Input: HTTP request to the site (via XAMPP or another PHP server).
- Processing: `index.php` -> CodeIgniter Router -> Controller -> (Model) -> View.
- Output: HTML rendered from `application/views/*`.

Important, discoverable conventions for this repo

- No Composer autoload by default: `application/config/config.php` sets `$config['composer_autoload'] = FALSE;`. If enabling composer, set that to the vendor autoload path and ensure `composer.json` dependencies are installed.
- Subclass prefix for extended core classes is `MY_` (see `config.php`). Place application-specific core extensions as `application/core/MY_*`.
- Sessions: default driver is `files` and `sess_save_path` is `NULL` in `config.php`. If you run on a server, set `sess_save_path` to a writable directory or change the driver (database/redis) and update `database.php` accordingly.
- URLs: `config['index_page'] = ''` (friendly URLs expected). `base_url` is auto-detected in `config.php` — for reliable local dev, consider setting a fixed `base_url` (http://localhost/list_jurusan/).
- Routing: default controller is controlled in `application/config/routes.php` (the Welcome controller is the example default).

Project-specific patterns & gotchas (examples)

- The welcome view uses hard-coded external links (e.g., `http://103.103.23.240/cbt2.5/`). If you change environments, search for hard-coded URIs in `application/views/` and update to use `base_url()` or config-driven settings.
- The app uses Bootstrap via CDN inside `welcome_message.php`. Prefer using `base_url()` + asset folders if adding local assets.
- The app targets PHP >= 5.3.7 according to `composer.json`. Modernizing PHP support may require attention to older compatibility in system/ (CI3).

Developer workflows and debugging tips (what actually works here)

- Run locally: use XAMPP (this workspace path indicates XAMPP usage). Place the project under your webroot and visit the app in a browser. If the UI is blank, check `ENVIRONMENT` in `index.php` (set to `development` during debugging).
- Logs: check `application/logs/` for PHP/CI logs. `config.php` controls `log_threshold` and file permissions.
- Database: credentials and drivers live in `application/config/database.php`. There is no DB usage in the Welcome example, but be cautious when enabling DB sessions.
- Tests: `composer.json` includes phpunit in require-dev, but there is no test harness in the application folder. Do not assume tests exist; add them intentionally if required.

How to make safe edits (rules for the agent)

- Do not modify `system/` unless you have a clear plan and tests — prefer extending via `application/core/` or `application/libraries/`.
- Prefer configuration-driven changes (edit `application/config/*.php`) rather than editing `index.php` or core files for environment / path changes.
- When adding routes, update `application/config/routes.php` and keep controller names matching CI conventions (class name and file name match, controllers extend `CI_Controller`).
- When adding dependencies, update `composer.json`, run `composer install` locally, and switch `composer_autoload` to the correct vendor path.

Examples the agent can follow

- Change the default view: edit `application/controllers/Welcome.php` -> `$this->load->view('welcome_message');` and update `application/views/welcome_message.php`.
- Add a new controller: create `application/controllers/YourController.php` with `class YourController extends CI_Controller` and add routes in `application/config/routes.php`.
- Make an asset local: move Bootstrap CSS to `application/assets/css/` and update the view to `<link href="<?= base_url('application/assets/css/bootstrap.min.css') ?>" rel="stylesheet">`.

If something is unclear, ask these specific questions back to the developer

- Which PHP version and server (XAMPP) should be considered the canonical dev environment? Provide a preferred base_url value if available.
- Are there any hidden environment files (not checked in) that configure secrets, DB credentials, or CI hooks?
- Do you want Composer enabled (and modern PHP versions) or kept as-is for CI3 compatibility?

Next steps for the agent after producing changes

- Search `application/views/` for hard-coded external URLs before mass refactors.
- If adding features that need persistence, inspect `application/config/database.php` and `application/migrations/` (if available), and add tests manually.

Please review this doc and tell me if you want me to merge any specific existing internal notes or expand sections (for example, adding exact commands for your XAMPP setup or a small test scaffold).
