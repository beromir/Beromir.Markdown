# Markdown renderer for Neos CMS

## Features

- Convert Markdown to HTML.
- Markdown editor with syntax highlighting.
- Support for [GitHub-Flavored Markdown](https://commonmark.thephpleague.com/2.3/extensions/github-flavored-markdown/).
- External links support.
- Uses the [PHP CommonMark parser](https://commonmark.thephpleague.com).

## Installation

Run the following command in your site package:

```
composer require --no-update beromir/neos-markdown
```

Then run `composer update` in your project root.

## Configuration

You can enable or disable
the [GitHub-Flavored Markdown](https://commonmark.thephpleague.com/2.3/extensions/github-flavored-markdown/) and the
[External links](https://commonmark.thephpleague.com/2.3/extensions/external-links/) extensions globally:

```yaml
Beromir:
    Markdown:
        extensions:
            # GitHub-Flavored Markdown
            gfm: true
            externalLinks: true
```
