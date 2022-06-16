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

You can enable or disable the following extensions globally:

- [GitHub-Flavored Markdown](https://commonmark.thephpleague.com/2.3/extensions/github-flavored-markdown/)
- [External links](https://commonmark.thephpleague.com/2.3/extensions/external-links/)

```yaml
Beromir:
    Markdown:
        extensions:
            # GitHub-Flavored Markdown
            gfm: true
            externalLinks: true
```

## Usage

### Standalone NodeType

You can use the standalone Markdown NodeType on your pages to render Markdown. Per default the NodeType comes with the
options to enable or disable the extensions for it.
The Fusion component can be overwritten in your site package. For example, you can include some CSS class names in the
HTML output.

### Add the Markdown editor to custom NodeTypes

The package comes with two Mixins:

- Editor Mixin
- Options Mixin

Add the Mixins to your NodeType:

```yaml
'Vendor.Site:Content.CustomNodeType':
    superTypes:
        'Neos.Neos:Content': true
        'Beromir.Markdown:Mixin.MarkdownEditor': true
        'Beromir.Markdown:Mixin.MarkdownSettings': true
```

The Settings Mixin is optional. It allows you to enable or disable the CommonMark extensions for the NodeType. If you do
not use the Mixin, the global settings are used.

You have two options to render the Markdown in your Fusion component.

Fusion object:

```html
renderer = afx`
<div>
    <Beromir.Markdown:Markdown/>
</div>
`
```

Eel helper:

```
html = ${Beromir.Markdown.Markdown.convertMarkdown(props.markdown)}
```
