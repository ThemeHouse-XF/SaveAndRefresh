/** @param {jQuery} $ jQuery Object */
!function($, window, document, _undefined)
{
	XenForo.SaveAndRefresh = {};

	/**
	 * @param jQuery form
	 */
	XenForo.SaveAndRefresh = function($form) { this.__construct($form); };
	XenForo.SaveAndRefresh.prototype =
	{
		__construct: function($form)
		{
			this.$form = $form;
			this.$saveReloadButton = $('#saveReloadButton');

			var self = this;
			this.$form.on('keydown', 'textarea', function(e)
			{
				if (e.keyCode == 83 && (e.ctrlKey || e.metaKey)) // ctrl/cmd+s
				{
					e.preventDefault();
					self.$saveReloadButton.click();
				}
			});
		},
	};

	// *********************************************************************

	XenForo.register('form', 'XenForo.SaveAndRefresh');

}
(jQuery, this, document);