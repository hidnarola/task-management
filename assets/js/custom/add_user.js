$(document).ready(function () {
// Initialize
 var validator = $(".form-validate-jquery").validate({
		ignore: 'input[type=hidden], .select2-search__field', // ignore hidden fields
		errorClass: 'validation-error-label',
		successClass: 'validation-valid-label',
		highlight: function(element, errorClass) {
			$(element).removeClass(errorClass);
		},
		unhighlight: function(element, errorClass) {
			$(element).removeClass(errorClass);
		},

		// Different components require proper error label placement
		errorPlacement: function(error, element) {

			// Styled checkboxes, radios, bootstrap switch
			if (element.parents('div').hasClass("checker") || element.parents('div').hasClass("choice") || element.parent().hasClass('bootstrap-switch-container') ) {
				if(element.parents('label').hasClass('checkbox-inline') || element.parents('label').hasClass('radio-inline')) {
					error.appendTo( element.parent().parent().parent().parent() );
				}
				else {
					error.appendTo( element.parent().parent().parent().parent().parent() );
				}
			}

			// Unstyled checkboxes, radios
			else if (element.parents('div').hasClass('checkbox') || element.parents('div').hasClass('radio')) {
				error.appendTo( element.parent().parent().parent() );
			}

			// Input with icons and Select2
			else if (element.parents('div').hasClass('has-feedback') || element.hasClass('select2-hidden-accessible')) {
				error.appendTo( element.parent() );
			}

			// Inline checkboxes, radios
			else if (element.parents('label').hasClass('checkbox-inline') || element.parents('label').hasClass('radio-inline')) {
				error.appendTo( element.parent().parent() );
			}

			// Input group, styled file input
			else if (element.parent().hasClass('uploader') || element.parents().hasClass('input-group')) {
				error.appendTo( element.parent().parent() );
			}

			else {
				error.insertAfter(element);
			}		
		},
		validClass: "validation-valid-label",
		rules: {
			username: {
				required: true
			},
			first_name: {
				required: true
			},
			last_name: {
				required: true
			},
			email: {
				required: true,
				email: true
			},
			phone: {
				required: true
			}
		},
		messages: {
			username: {
				required: 'Please provide your User Name',
			},
			first_name: {
				required: 'Please provide your First Name',
			},
			last_name: {
				required: 'Please provide your Last Name',
			},
			email: {
				required: 'Please provide your email address!',
				email: 'Please provide valid email address!'
			},
			phone: {
				required: 'Please provide your phone no.'
			}
		}
	});


    // Reset form
    $('#reset').on('click', function() {
        validator.resetForm();
    });

});