# AI Development Rules

## Purpose

This repository is used by AI to analyze the current WordPress implementation
and prepare implementation instructions for human developers.

## Development Flow

- Changes are made manually by humans on the staging environment.
- Changes are performed through WordPress admin or FTP/SFTP.
- GitHub is a reference mirror of the latest staging source.
- Do not propose GitHub-to-production deployment.
- Production deployment uses the existing scheduled deployment process.

## Required Analysis Before Any Proposal

Before suggesting any implementation:

1. Search the current repository first.
2. Identify all related PHP, HTML, JavaScript and CSS files.
3. Check whether an existing implementation already provides similar behavior.
4. Prefer reusing existing classes, functions, components and widgets.
5. Identify whether WordPress widgets or admin-side settings are involved.
6. Check both desktop and mobile behavior.
7. Check whether GA4/GTM tracking may be affected.
8. Do not modify unrelated functionality.
9. Ignore backup files such as *.___bak* when analyzing the current implementation.

## Required Output

For every implementation request, return:

1. Current implementation
2. Related files
3. Existing reusable implementation
4. Proposed implementation
5. Files to modify
6. WordPress admin changes, if any
7. PHP/HTML changes
8. JavaScript changes
9. CSS changes
10. Potential side effects
11. Desktop test checklist
12. Mobile test checklist
13. GA4/GTM impact and test checklist

## Important WordPress Rules

- Magazine pages use magazine-specific templates and styles where applicable.
- Do not assume CTA markup is in PHP; check widget areas first.
- Check functions.php for enqueue conditions before proposing new CSS or JS.
- Do not create duplicate JS or CSS if an existing implementation can be extended.
- If a change affects selectors, links, classes or IDs used by GTM, explicitly warn about tracking impact.

## Deployment

The AI does not deploy code.

The human developer:
1. Reviews the implementation instructions.
2. Modifies the staging site manually.
3. Tests the staging site.
4. Syncs the updated staging source back to GitHub.

Production deployment continues through the existing scheduled deployment process.
