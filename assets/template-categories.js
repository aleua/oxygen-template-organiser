jQuery(document).ready(function($){
	
	var addNewTemplateButton = $('.wp-heading-inline + a.page-title-action'),
        endOfWPHeader = $('.wp-header-end'),
	    cloneAddNewTemplateButton = addNewTemplateButton.clone();

	   cloneAddNewTemplateButton.text('Edit Categories').attr('href', 'edit-tags.php?taxonomy=lit_oxygen_template_category&post_type=ct_template');

	   cloneAddNewTemplateButton.insertBefore(endOfWPHeader);

});
