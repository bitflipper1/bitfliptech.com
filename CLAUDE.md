# CLAUDE.md - AI Assistant Guide for bitfliptech.com

**Last Updated:** 2025-11-16
**WordPress Version:** 4.2.2
**Primary Theme:** TA Pluton v1.2.0
**Repository Status:** Legacy WordPress installation requiring modernization

---

## Table of Contents

1. [Project Overview](#project-overview)
2. [Repository Structure](#repository-structure)
3. [Technology Stack](#technology-stack)
4. [Development Workflows](#development-workflows)
5. [Security Considerations](#security-considerations)
6. [Key File Locations](#key-file-locations)
7. [Coding Conventions](#coding-conventions)
8. [Database Information](#database-information)
9. [Third-Party Integrations](#third-party-integrations)
10. [AI Assistant Guidelines](#ai-assistant-guidelines)
11. [Common Tasks](#common-tasks)

---

## Project Overview

This repository contains a WordPress 4.2.2 installation for bitfliptech.com. The site uses a custom one-page parallax theme (TA Pluton) built on Bootstrap 3.3.4. The installation appears to be from 2015 and is configured for a subdirectory installation at `/adsparkpromos.com/`.

### Purpose
- Business/portfolio website with one-page design
- Parallax scrolling effects
- Portfolio showcase with filterable gallery
- Contact form and newsletter integration
- Client testimonials and service offerings

### Repository History
```
349e70e Delete wp-config.php (most recent)
2c17423 Update .gitignore
18d481a gitignore
874006d Bitflip site
```

---

## Repository Structure

```
/home/user/bitfliptech.com/
├── wp-admin/           # WordPress admin interface (5.5M)
├── wp-includes/        # WordPress core functionality (11M)
├── wp-content/         # Custom content and extensions
│   ├── plugins/
│   │   ├── akismet/                    # Spam protection
│   │   ├── wordpress-importer/         # Content import tool
│   │   └── hello.php                   # Demo plugin
│   ├── themes/
│   │   ├── ta-pluton/                  # PRIMARY CUSTOM THEME (7.7M)
│   │   ├── twentyfifteen/              # Default theme
│   │   ├── twentyfourteen/             # Default theme
│   │   └── twentythirteen/             # Default theme
│   └── uploads/                        # Media files (9.8M)
│       ├── 2012/
│       ├── 2013/
│       └── 2015/
├── .htaccess           # Apache configuration
├── .gitignore          # Git exclusions
├── index.php           # WordPress entry point
├── wp-config-sample.php # Configuration template
└── readme.html         # WordPress documentation
```

### TA Pluton Theme Structure (141 PHP files)

```
wp-content/themes/ta-pluton/
├── css/
│   ├── bootstrap.min.css           # Bootstrap 3.3.4
│   ├── animate.css                 # CSS animations
│   ├── jquery.bxslider.css         # Slider styles
│   ├── pluton.css                  # Main theme styles
│   └── pluton-ie7.css              # IE7 fallback
├── fonts/
│   └── pluton/                     # Custom icon font (eot, svg, ttf, woff)
├── images/                         # Theme images, logo, icons
├── js/
│   ├── jquery.bxslider.min.js      # Client slider v4.2.3
│   ├── cSlider.js                  # Header slider
│   ├── jquery.mixitup.min.js       # Portfolio filtering v2.1.7
│   ├── jquery.nav.js               # One-page navigation v3.0.0
│   ├── modernizr-2.5.3.min.js      # Feature detection
│   └── jquery.placeholder.min.js   # Placeholder polyfill v2.1.1
├── inc/                            # 37 PHP files including:
│   ├── Mailchimp/                  # Full Mailchimp API integration
│   ├── post-types/                 # Custom post type framework
│   ├── custom-metaboxes/           # CMB framework with Grunt
│   ├── contact-us.php              # Ajax contact form handler
│   ├── newsletter.php              # Mailchimp subscription handler
│   ├── redux-config.php            # Theme options (989 lines)
│   └── custom-css.php              # Dynamic CSS generation
├── redux/                          # Redux Framework for theme options
├── languages/                      # Translation files (.po, .mo)
├── style.css                       # Theme stylesheet & metadata
├── functions.php                   # Theme functions
├── header.php                      # Header template
├── footer.php                      # Footer template
└── [additional template files]
```

---

## Technology Stack

### Backend
- **WordPress:** 4.2.2 (Released 2015) ⚠️ OUTDATED - Security vulnerabilities
- **PHP:** Requires 5.2.4+, Recommended 5.4+ (circa 2015 standards)
- **MySQL:** Requires 5.0+, Recommended 5.5+

### Frontend Framework
- **Bootstrap:** 3.3.4 (Twitter Bootstrap)
- **jQuery:** Version included with WordPress 4.2.2
- **Font Awesome:** 4.3.0
- **Animate.css:** CSS animation library

### JavaScript Libraries
- **bxSlider:** 4.2.3 - Client testimonials slider
- **cSlider:** Custom header slider
- **MixItUp:** 2.1.7 - Portfolio filtering
- **jQuery.nav:** 3.0.0 - One-page navigation
- **Modernizr:** 2.5.3 - Feature detection
- **Placeholder polyfill:** 2.1.1 - IE support

### Theme Framework
- **Redux Framework:** Advanced theme options panel
- **CMB (Custom Metaboxes and Fields):** v1.1.3
- **Underscores (_s):** Base theme starter

### Build Tools
- **Grunt:** Task runner (in custom-metaboxes only)
  - JSHint for code quality
  - Uglify for JS minification
  - CSSMin for CSS minification
  - PHPUnit for testing
  - Watch for automatic builds
  - Git hooks for pre-commit validation

### External Services
- **Mailchimp API:** Newsletter subscriptions
- **Google Maps API:** Location maps
- **Google Fonts:** Roboto font family

---

## Development Workflows

### Custom Post Types

The theme implements a custom Portfolio post type:

**Location:** `wp-content/themes/ta-pluton/inc/post-types/`

**Portfolio CPT Details:**
- **Slug:** `portfolio`
- **Taxonomy:** `portfolio_tags`
- **Supports:** title, editor, thumbnail, excerpt, custom-fields, comments
- **Icon:** dashicons-portfolio
- **Custom Fields:**
  - Client Name
  - Client URL

### Theme Options System

The theme uses Redux Framework for centralized settings:

**Location:** `wp-content/themes/ta-pluton/inc/redux-config.php` (989 lines)

**Access in Code:**
```php
$option_value = ta_option('option_key');
```

**Configuration Sections:**
- General Settings
- Social Media Integration (Facebook, Twitter, LinkedIn, Pinterest, Dribbble, YouTube, Google+)
- Typography
- Colors
- Layout Options
- Header/Footer Settings

### Dynamic CSS Generation

**Location:** `wp-content/themes/ta-pluton/inc/custom-css.php`

Custom CSS is generated dynamically based on theme options and injected into the page header.

### Contact Form Handler

**Location:** `wp-content/themes/ta-pluton/inc/contact-us.php`

**Features:**
- Ajax submission
- XSS prevention with regex filtering
- Email validation using FILTER_VALIDATE_EMAIL
- Custom sanitization functions

**Security Note:** No visible CSRF token validation

### Newsletter Integration

**Location:** `wp-content/themes/ta-pluton/inc/newsletter.php`

**Full Mailchimp API Integration:**
- Classes: Campaigns, Lists, Reports, Users, Templates, etc.
- API key and list ID configurable via theme options
- Subscription form with email validation

### Grunt Build System (CMB only)

**Location:** `wp-content/themes/ta-pluton/inc/custom-metaboxes/`

**Available Tasks:**
```bash
grunt watch      # Watch for changes and auto-build
grunt default    # JSHint + Uglify + CSSMin
grunt test       # Run PHPUnit tests
```

**Note:** Grunt is only configured for the Custom Metaboxes framework, not the entire theme.

---

## Security Considerations

### CRITICAL ISSUES ⚠️

1. **Outdated WordPress Version**
   - Running WordPress 4.2.2 (2015)
   - Multiple known security vulnerabilities
   - **Action Required:** Upgrade to latest WordPress version

2. **Database Credentials Exposure**
   - `wp-config-sample.php` contains real database credentials
   - DB_NAME: 'sparky'
   - DB_USER: 'asaspark'
   - DB_PASSWORD: 'sparkit77'
   - **Action Required:** Remove from repository, use environment variables

3. **Default Authentication Keys**
   - wp-config-sample.php has placeholder salt keys
   - **Action Required:** Generate unique keys from https://api.wordpress.org/secret-key/1.1/salt/

### MEDIUM SEVERITY ISSUES ⚠️

4. **Contact Form Security**
   - Custom sanitization in contact-us.php
   - No visible CSRF token validation
   - **Recommendation:** Add nonce verification

5. **Direct File Access**
   - contact-us.php and newsletter.php load WordPress directly
   - Uses `$_SERVER['DOCUMENT_ROOT']` which may not be reliable
   - **Recommendation:** Use WordPress constants (ABSPATH)

6. **Plugin Security**
   - All plugins appear to be from 2015 or earlier
   - **Action Required:** Update all plugins to latest versions

### GOOD SECURITY PRACTICES ✓

7. **.gitignore Configuration**
   - Properly excludes wp-config.php, uploads, cache, backups
   - Excludes sensitive files like wp-cache-config.php

8. **Input Validation**
   - Email validation using FILTER_VALIDATE_EMAIL
   - XSS prevention in contact form

9. **Plugin Protection**
   - Akismet has .htaccess for directory protection

### Recommendations

**Immediate Actions:**
1. Remove database credentials from wp-config-sample.php
2. Upgrade WordPress from 4.2.2 to latest version
3. Generate unique authentication keys/salts
4. Update all plugins to latest versions
5. Review and update PHP/MySQL versions

**Security Enhancements:**
1. Add CSRF protection to AJAX forms (WordPress nonces)
2. Implement rate limiting for contact/newsletter forms
3. Add security headers in .htaccess
4. Implement Content Security Policy
5. Consider moving wp-config.php outside webroot

---

## Key File Locations

### Configuration Files
- `.htaccess` - Apache configuration (RewriteBase: /adsparkpromos.com/)
- `.gitignore` - Git exclusions (properly configured)
- `wp-config-sample.php` - Database and WordPress configuration template
- `wp-config.php` - **DELETED** (excluded from git)

### Theme Files
- `wp-content/themes/ta-pluton/style.css` - Theme metadata
- `wp-content/themes/ta-pluton/functions.php` - Theme functions
- `wp-content/themes/ta-pluton/inc/redux-config.php` - Theme options (989 lines)

### Custom Functionality
- `wp-content/themes/ta-pluton/inc/contact-us.php` - Contact form handler
- `wp-content/themes/ta-pluton/inc/newsletter.php` - Newsletter subscriptions
- `wp-content/themes/ta-pluton/inc/custom-css.php` - Dynamic CSS generation
- `wp-content/themes/ta-pluton/inc/post-types/` - Custom post type definitions

### API Integrations
- `wp-content/themes/ta-pluton/inc/Mailchimp/` - Mailchimp PHP API wrapper

### Build Configuration
- `wp-content/themes/ta-pluton/inc/custom-metaboxes/Gruntfile.js` - Grunt tasks
- `wp-content/themes/ta-pluton/inc/custom-metaboxes/package.json` - Node dependencies

---

## Coding Conventions

### PHP Conventions

**WordPress Coding Standards:**
The theme follows WordPress PHP coding standards with some variations.

**Function Naming:**
- Theme functions prefixed with `ta_` or `tapluton_`
- Example: `ta_option()`, `tapluton_setup()`

**Helper Functions:**
```php
// Get theme option value
ta_option('option_key');

// Get custom metabox value
get_post_meta($post_id, 'meta_key', true);
```

**Template Tags:**
Standard WordPress template tags are used throughout.

### CSS Architecture

**Structure:**
1. Bootstrap 3.3.4 base
2. Animate.css for animations
3. Plugin-specific CSS (bxSlider, etc.)
4. Custom theme CSS (pluton.css)
5. IE7 fallback (pluton-ie7.css)
6. Dynamic CSS injected in header

**CSS Organization in pluton.css:**
```
1.0 Typography
2.0 Elements
3.0 Layout
4.0 Widgets
5.0 Header
6.0 Homepage (sections)
7.0 Content
8.0 Footer
9.0 Responsive
```

### JavaScript Architecture

**Loading Strategy:**
- jQuery loaded via WordPress (wp_enqueue_script)
- Plugins loaded individually
- Custom scripts in separate files
- Modernizr loaded in header for feature detection

**Module Pattern:**
Each plugin is isolated in its own file for maintainability.

**Common Patterns:**
```javascript
// One-page navigation
$('#navigation').onePageNav({
    currentClass: 'active',
    scrollSpeed: 750
});

// Portfolio filtering
$('.portfolio-items').mixitup();

// Slider initialization
$('.bxslider').bxSlider();
```

### File Organization

**Template Hierarchy:**
Standard WordPress template hierarchy is followed:
- `index.php` - Main template
- `header.php` - Header
- `footer.php` - Footer
- `single.php` - Single post
- `page.php` - Single page
- `archive.php` - Archives
- Custom templates as needed

**Include Files:**
All custom functionality is modularized in `/inc/` directory.

---

## Database Information

### Configuration (from wp-config-sample.php)

**Database Settings:**
```php
DB_NAME: 'sparky'
DB_USER: 'asaspark'
DB_PASSWORD: 'sparkit77'  // ⚠️ Exposed in repository
DB_HOST: 'localhost'
DB_CHARSET: 'utf8'
DB_COLLATE: ''
```

**Table Prefix:**
```php
$table_prefix = 'wp_';
```

### Custom Post Types Tables

When Portfolio CPT is activated, these custom tables/records are created:
- Standard `wp_posts` table with post_type = 'portfolio'
- `wp_term_taxonomy` entries for 'portfolio_tags' taxonomy

### No Migration Files

**Note:** No .sql files or database migration scripts are present in the repository.

**For database setup:**
1. Create database manually or use WordPress installer
2. Run WordPress installation at `/wp-admin/install.php`
3. Import content using WordPress Importer plugin if needed

---

## Third-Party Integrations

### Mailchimp API Integration

**Location:** `wp-content/themes/ta-pluton/inc/Mailchimp/`

**Full API Wrapper Included:**
- Mailchimp.php - Main class
- Campaigns.php - Campaign management
- Lists.php - List management
- Reports.php - Analytics
- Users.php - User management
- Templates.php - Template management
- And more...

**Configuration:**
Set Mailchimp API key and List ID in Theme Options panel.

**Usage in Newsletter Form:**
```php
// Handled automatically by inc/newsletter.php
// Subscribes email to configured Mailchimp list
```

### Google Services

**Google Maps:**
- Maps API integration for contact section
- API key configurable in theme options
- Location/coordinates set in theme settings

**Google Fonts:**
- Roboto font family loaded from Google Fonts CDN

### External Resources

**Bootstrap CDN:**
- Local files used (not CDN)

**Font Awesome:**
- Version 4.3.0 included locally

**HTML5 Support:**
- HTML5 Shiv for IE8- support
- Respond.js for IE8 media query support

---

## AI Assistant Guidelines

### When Working with This Codebase

#### DO:

1. **Prioritize Security**
   - Never commit wp-config.php
   - Use WordPress nonces for forms
   - Validate and sanitize all user input
   - Escape all output

2. **Follow WordPress Standards**
   - Use WordPress coding standards
   - Prefix all custom functions with `ta_` or `tapluton_`
   - Use WordPress core functions instead of raw PHP where possible
   - Follow WordPress template hierarchy

3. **Maintain Compatibility**
   - Test changes with the existing Bootstrap 3.3.4 framework
   - Ensure jQuery compatibility
   - Consider IE7+ browser support (legacy requirement)

4. **Use Existing Systems**
   - Use Redux Framework for theme options (not custom options)
   - Use CMB framework for custom metaboxes
   - Use existing helper functions like `ta_option()`

5. **Document Changes**
   - Add inline comments for complex logic
   - Update this CLAUDE.md when making structural changes
   - Document any new custom post types or taxonomies

#### DON'T:

1. **Don't Modify Core WordPress Files**
   - Never edit files in wp-admin/ or wp-includes/
   - All customizations go in wp-content/themes/ta-pluton/

2. **Don't Break Existing Functionality**
   - The site is a one-page design - maintain this structure
   - Don't remove existing Redux Framework options
   - Preserve the parallax scrolling functionality

3. **Don't Introduce Security Vulnerabilities**
   - Never trust user input
   - Don't expose database credentials
   - Don't create SQL injection vulnerabilities

4. **Don't Ignore Legacy Compatibility**
   - This is a 2015-era codebase
   - Modern PHP features may not be available
   - Bootstrap 4/5 patterns won't work with Bootstrap 3

5. **Don't Create Unnecessary Files**
   - Edit existing files when possible
   - Don't create duplicate functionality
   - Don't add new plugins without discussing first

### Common Mistakes to Avoid

1. **Using Modern WordPress Functions**
   - WordPress 4.2.2 doesn't have all modern WP functions
   - Check WordPress Codex for version compatibility

2. **Assuming Modern PHP**
   - PHP 5.2.4 is minimum - avoid PHP 7+ features

3. **Breaking Bootstrap 3 Grid**
   - Uses .col-xs-*, .col-sm-*, .col-md-*, .col-lg-*
   - Not .col-*, .col-sm-* like Bootstrap 4/5

4. **Ignoring One-Page Structure**
   - Navigation uses anchor links (#section-id)
   - All content on homepage by default
   - Don't create multi-page navigation without discussion

### Testing Checklist

Before considering any task complete:

- [ ] Check for PHP syntax errors
- [ ] Verify WordPress nonces are used for forms
- [ ] Validate all user input is sanitized
- [ ] Ensure all output is escaped
- [ ] Test responsive design (mobile, tablet, desktop)
- [ ] Verify parallax effects still work
- [ ] Check portfolio filtering functionality
- [ ] Test contact form submission
- [ ] Verify newsletter subscription works
- [ ] Check for JavaScript console errors
- [ ] Validate HTML/CSS
- [ ] Test on multiple browsers if possible

---

## Common Tasks

### Adding a New Section to Homepage

1. Create section template in theme root or inc/
2. Add section hook in functions.php
3. Add section settings in inc/redux-config.php
4. Add section styles in css/pluton.css
5. Add section JavaScript if needed in js/
6. Update navigation to include new section

### Modifying Theme Options

1. Edit `wp-content/themes/ta-pluton/inc/redux-config.php`
2. Find the relevant section array
3. Add/modify field configuration
4. Clear WordPress cache if caching is enabled
5. Access via `ta_option('your_field_id')`

### Creating Custom Metabox

1. Create new file in `inc/custom-metaboxes/`
2. Define metabox using CMB framework syntax
3. Include file in functions.php
4. Access via `get_post_meta($post_id, 'field_id', true)`

### Modifying Portfolio

**Add Custom Fields:**
Edit `wp-content/themes/ta-pluton/inc/custom-metaboxes/` files

**Change Taxonomy:**
Edit `wp-content/themes/ta-pluton/inc/post-types/` files

**Modify Display:**
Edit portfolio section template (likely in theme root)

### Updating Styles

**For global changes:**
Edit `wp-content/themes/ta-pluton/css/pluton.css`

**For dynamic/option-based changes:**
Edit `wp-content/themes/ta-pluton/inc/custom-css.php`

**For responsive changes:**
Look for media queries in pluton.css

### Working with Contact Form

**File:** `wp-content/themes/ta-pluton/inc/contact-us.php`

**Modify validation:**
Update regex patterns and filter functions

**Change email template:**
Edit the email body construction in the file

**Add fields:**
1. Add HTML in template
2. Add sanitization in contact-us.php
3. Add to email body construction

### Newsletter Subscription Changes

**File:** `wp-content/themes/ta-pluton/inc/newsletter.php`

**Change Mailchimp settings:**
Update via Redux theme options panel

**Modify subscription logic:**
Edit newsletter.php file

**Add custom fields:**
Update Mailchimp API calls to include merge fields

---

## Git Workflow

### Current Branch
`claude/claude-md-mi1gjxjmv8hpzt5i-01WuHLkBTRV24Mg3NEk1vqDM`

### Protected Files (.gitignore)

```
*.log
.htaccess
sitemap.xml
sitemap.xml.gz
wp-config.php
wp-content/advanced-cache.php
wp-content/backup-db/
wp-content/backups/
wp-content/blogs.dir/
wp-content/cache/
wp-content/upgrade/
wp-content/uploads/
wp-content/wp-cache-config.php
```

### Commit Guidelines

**Format:**
```
Brief description of change

- Detailed point 1
- Detailed point 2
- Detailed point 3
```

**Examples:**
```
Add newsletter signup validation

- Implemented server-side email validation
- Added CSRF protection with WordPress nonces
- Improved error messaging for user feedback
```

### Push Requirements

Always push to branch starting with 'claude/' and ending with session ID:
```bash
git push -u origin claude/claude-md-mi1gjxjmv8hpzt5i-01WuHLkBTRV24Mg3NEk1vqDM
```

---

## WordPress Installation Notes

### From readme.html

**Version:** 4.2.2

**System Requirements:**
- PHP 5.2.4+ (Recommended: PHP 5.4+)
- MySQL 5.0+ (Recommended: MySQL 5.5+)
- Apache with mod_rewrite recommended

**Installation Method:**
Famous 5-minute install via wp-admin/install.php

**Update Method:**
Automatic updater available for WordPress 2.7+

---

## Theme Information

### From style.css

**Theme Details:**
- Name: TA Pluton
- URI: http://themeart.co/free-theme/ta-pluton/
- Author: ThemeArt
- Author URI: http://themeart.co/
- Version: 1.2.0
- License: GNU General Public License v2 or later
- Text Domain: ta-pluton

**Based On:**
- Underscores (_s) by Automattic
- Eric Meyer's CSS Reset
- Normalize.css by Nicolas Gallagher and Jonathan Neal
- Blueprint CSS

**Tags:**
one-column, two-columns, right-sidebar, responsive-layout, custom-background, custom-header, custom-menu, editor-style, featured-images, full-width-template, rtl-language-support, sticky-post, translation-ready

---

## Modernization Roadmap

### Critical Updates Needed

1. **WordPress Core**
   - Upgrade from 4.2.2 to latest version
   - Test theme compatibility after upgrade
   - Update all plugins

2. **Security Hardening**
   - Remove database credentials from repository
   - Generate new authentication keys
   - Implement environment-based configuration
   - Add CSRF protection to all forms
   - Implement rate limiting

3. **PHP/MySQL Updates**
   - Update PHP to 7.4+ or 8.x
   - Update MySQL to 5.7+ or 8.x
   - Test compatibility

### Nice-to-Have Improvements

1. **Build Tools**
   - Replace Grunt with modern build tool (Webpack, Vite)
   - Implement full-theme build process
   - Add asset optimization

2. **Dependency Management**
   - Add composer.json for PHP dependencies
   - Update package.json for theme-wide usage
   - Consider npm instead of bower

3. **Modern Development**
   - Consider upgrading Bootstrap 3 → Bootstrap 5
   - Update jQuery usage to vanilla JS where possible
   - Implement modern CSS (Grid, Flexbox improvements)

4. **DevOps**
   - Add deployment automation
   - Implement database migration strategy
   - Add unit/integration tests
   - Set up CI/CD pipeline

---

## Support and Resources

### WordPress Resources
- Codex: https://codex.wordpress.org/
- Support Forums: https://wordpress.org/support/
- Developer Documentation: https://developer.wordpress.org/

### Theme Framework Resources
- Redux Framework: https://redux.io/
- Bootstrap 3 Documentation: https://getbootstrap.com/docs/3.3/
- Underscores: https://underscores.me/

### Plugin Documentation
- Mailchimp API: https://mailchimp.com/developer/
- CMB Framework: https://github.com/WebDevStudios/Custom-Metaboxes-and-Fields-for-WordPress

---

## Questions or Issues?

When encountering issues or needing clarification:

1. Check this CLAUDE.md file first
2. Review WordPress Codex for WordPress-specific questions
3. Check theme files in wp-content/themes/ta-pluton/
4. Review Redux Framework documentation for theme options
5. Consult with repository maintainer for architectural decisions

---

**Document Version:** 1.0.0
**Created:** 2025-11-16
**AI Assistant:** Claude (Anthropic)
