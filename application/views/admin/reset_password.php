<div class="content">
<?php echo validation_errors(); ?>
					<!-- Password recovery -->
					<form method="post" id="reset_password_form">
						<div class="panel panel-body login-form">
							<div class="text-center">
								<div class="icon-object border-warning text-warning"><i class="icon-spinner11"></i></div>
								<h5 class="content-group">Password recovery <small class="display-block">Please Reset Password!!</small></h5>
							</div>

							<div class="form-group has-feedback">
								<input type="password" class="form-control" placeholder="New Password" name="new_password" id="new_password" >
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
							</div>

							<div class="form-group has-feedback">
								<input type="password" class="form-control" placeholder="Confirm Password" name="confirm_password" id="confirm_password" >
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
							</div>

							<button type="submit" class="btn bg-blue btn-block">Reset password <i class="icon-arrow-right14 position-right"></i></button>
						</div>
					</form>

					<!-- /password recovery -->
					<script type="text/javascript">
                $("#reset_password_form").validate({
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
                    success: function(label) {
                        label.addClass("validation-valid-label").text("Successfully")
                    },
                    rules: {
                        new_password: {
                            required: true,
                            minlength: 5
                        },
                        confirm_password:{
                            required: true,
                            minlength: 5,
                            equalTo : "#new_password"
                        }
                    },
                    messages: {
                        new_password: {
                            required: 'Please provide your new password!',
                            minlength: 'Please provide minium 5 character!'
                        },
                        confirm_password:{
                            required: 'Please provide your new password!',
                            minlength: 'Please provide minium 5 character!',
                            equalTo: 'Your password doesn\'t match'
                        }
                    }
                });
</script>