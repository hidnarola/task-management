<!-- Page content -->
<div class="page-content">

    <!-- Main content -->
    <div class="content-wrapper">

        <!-- Content area -->
        <div class="content">

            <!-- Simple login form -->
            <form method="post" id="login-form">
                <div class="panel panel-body login-form">
                    <div class="text-center">
                        <div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
                        <h5 class="content-group">Login to your account <small class="display-block">Enter your credentials below</small></h5>
                    </div>
                    <?php if ($this->session->flashdata('success_msg')) { ?>
					<div class="alert alert-success alert-styled-left alert-arrow-left alert-bordered">
						<button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
						<?php echo $this->session->flashdata('success_msg'); ?>
					</div>
					<?php } ?>
                    <?php if ($this->session->flashdata('error_msg')) { ?>
					<div class="alert alert-danger alert-styled-left">
						<button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
						<?php echo $this->session->flashdata('error_msg'); ?>
					</div>
					<?php } ?>
                    <div class="form-group has-feedback has-feedback-left">
                        <input type="text" class="form-control" placeholder="Email" name="email" id="email">
                        <div class="form-control-feedback">
                            <i class="icon-envelop3 text-muted"></i>
                        </div>
                    </div>

                    <div class="form-group has-feedback has-feedback-left">
                        <input type="password" class="form-control" placeholder="Password" name="password" id="password">
                        <div class="form-control-feedback">
                            <i class="icon-lock2 text-muted"></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Sign in <i class="icon-circle-right2 position-right"></i></button>
                    </div>

                    <div class="text-center">
                        <a href="/admin/forgot-password">Forgot password?</a>
                    </div>
                </div>
            </form>
            <!-- /simple login form -->
            
            <script type="text/javascript">
                $("#login-form").validate({
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
                        email: {
                            required: true,
                            email: true
                        },
                        password: {
                            required: true
                        }
                    },
                    messages: {
                        email: {
                            required: 'Please provide your email address!',
                            email: 'Please provide valid email address!'
                        },
                        password: {
                            required: 'Please provide your password!'
                        }
                    }
                });



                </script>