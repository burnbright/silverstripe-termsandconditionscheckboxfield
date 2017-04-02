<?php

/**
 * Terms and conditions checkbox field that must be checked to be valid.
 */
class TermsAndConditionsCheckboxField extends CheckboxField
{

	protected $termsPage = null;

	public function __construct($name = "AgreeToTermsAndConditions", $title = null)
	{
		$this->name = $name;
		$title = $title ? $title : $this->getTitleContent();
		parent::__construct($name, $title);
	}

	public function setTermsPage(SiteTree $page) {
		$this->termsPage = $page;
		$this->title = $this->getTitleContent(); // set new title
		return $this;
	}

	public function getTitleContent()
	{
		if (!$this->termsPage) {
			return _t($this->class.'.Content', 'I agree to the terms and conditions');
		}
		return _t(
			$this->class.'.PageLinkContent',
			'I agree to the terms and conditions stated on the <a href="{TermsPageLink}" target="new" title="Read the shop terms and conditions for this site">{TermsPageTitle}</a> page.',
			'',
			array(
				'TermsPageLink' => $this->termsPage->Link(),
				'TermsPageTitle' => $this->termsPage->Title
			)
		);
	}

	public function validate($validator)
	{
		if ($this->value) {
			return true;
		}
		$validator->validationError(
			$this->name,
			_t($this->class.".MustAgreeToTerms", "You must agree to the terms and conditions"),
			"required"
		);
		return false;
	}

}