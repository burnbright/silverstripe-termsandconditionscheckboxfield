# Terms And Conditions Checkbox Field

A checkbox field (with optional page link) that must be checked for form validation to succeed.

## Usage

```php
// when building a Form's fields
$fields->push(
	TermsAndConditionsCheckboxField::create()
		->setTermsPage(SiteTree::get_by_link("terms-and-conditions"));
);
```

## Customise message

Either set the field's Title, or update lang file:

```yaml
en:
  TermsAndConditionsCheckboxField:
    PageLinkContent: "I agree to the <a href=\"{TermsPageLink}\" target=\"new\" title=\"Read the terms and conditions for this site\">{TermsPageTitle}</a>."
```
