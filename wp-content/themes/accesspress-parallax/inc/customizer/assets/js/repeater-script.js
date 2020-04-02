jQuery(document).ready(function ($) {

    "use strict";
    
    $('#accesspress-home-sections-nav').on('click', function(e){
        e.preventDefault();
        wp.customize.section( 'accesspress_parallax_plx_settings' ).focus();
    });
    
    $('#accesspress_parallax_section [data-name="layout"]').each(function(){
        if( $(this).val() == 'service_template' || $(this).val() == 'team_template' || $(this).val() == 'portfolio_template' || $(this).val() == 'testimonial_template' || $(this).val() == 'blog_template'){
            $(this).closest('.accesspress-parallax-repeater-fields').find('[data-name="category"]').closest('.accesspress-parallax-fields').addClass('enable-field');
        }
    });
    
    $('#accesspress_parallax_section').on('change', '[data-name="layout"]', function(){
        if( $(this).val() == 'default_template' || $(this).val() == 'action_template' || $(this).val() == 'googlemap_template' || $(this).val() == 'blank_template'){
            $(this).closest('.accesspress-parallax-repeater-fields').find('[data-name="category"]').closest('.accesspress-parallax-fields').removeClass('enable-field');
        }else{
            $(this).closest('.accesspress-parallax-repeater-fields').find('[data-name="category"]').closest('.accesspress-parallax-fields').addClass('enable-field');
        }
    });
    
    $('#accesspress_parallax_section .attachment-media-view .placeholder').each(function(){
        if($(this).hasClass('hidden')){
            $(this).closest('.accesspress-parallax-repeater-fields').find('.background-params').addClass('enable-field');
        }
    });

    function accesspress_parallax_refresh_repeater_values() {
        $(".accesspress-parallax-repeater-field-control-wrap").each(function () {

            var values = [];
            var $this = $(this);

            $this.find(".accesspress-parallax-repeater-field-control").each(function () {
                var valueToPush = {};

                $(this).find('[data-name]').each(function () {
                    var dataName = $(this).attr('data-name');
                    var dataValue = $(this).val();
                    valueToPush[dataName] = dataValue;
                });

                values.push(valueToPush);
            });

            $this.next('.accesspress-parallax-repeater-collector').val(JSON.stringify(values)).trigger('change');
        });
    }

    $('.accesspress-parallax-color-picker').each(function () {
        $(this).wpColorPicker({
            change: function (event, ui) {
                setTimeout(function () {
                    accesspress_parallax_refresh_repeater_values();
                }, 100);
            }
        });
    });

    /**
     * Script for Customizer icons
     */
    $(document).on('click', '.ap-customize-icons li', function () {
        $(this).parents('.ap-customize-icons').find('li').removeClass();
        $(this).addClass('selected');
        var iconVal = $(this).parents('.icons-list-wrapper').find('li.selected').children('i').attr('class');
        var inpiconVal = iconVal.split(' ');
        $(this).parents('.ap-customize-icons').find('.ap-icon-value').val(inpiconVal[1]);
        $(this).parents('.ap-customize-icons').find('.selected-icon-preview').html('<i class="' + iconVal + '"></i>');
        $('.ap-icon-value').trigger('change');
    });

    $(document).on('click', '.removeimage', function () {
        $(this).parent().html("");
        $("#accesspress_parallax_bread_bg_image").val('');
    });

    $("body").on("click", '.accesspress-parallax-add-control-field', function () {

        var $this = $(this).parent();
        if (typeof $this != 'undefined') {

            var field = $this.find(".accesspress-parallax-repeater-field-control:first").clone();

            if (typeof field != 'undefined') {

                field.find("input[type='text'][data-name]").each(function () {
                    var defaultValue = $(this).attr('data-default');
                    $(this).val(defaultValue);
                });

                field.find("textarea[data-name]").each(function () {
                    var defaultValue = $(this).attr('data-default');
                    $(this).val(defaultValue);
                });

                field.find("select[data-name]").each(function () {
                    var defaultValue = $(this).attr('data-default');
                    $(this).val(defaultValue);
                });

                field.find(".radio-labels input[type='radio']").each(function () {
                    var defaultValue = $(this).closest('.radio-labels').next('input[data-name]').attr('data-default');
                    $(this).closest('.radio-labels').next('input[data-name]').val(defaultValue);

                    if ($(this).val() == defaultValue) {
                        $(this).prop('checked', true);
                    } else {
                        $(this).prop('checked', false);
                    }
                });

                field.find(".selector-labels label").each(function () {
                    var defaultValue = $(this).closest('.selector-labels').next('input[data-name]').attr('data-default');
                    var dataVal = $(this).attr('data-val');
                    $(this).closest('.selector-labels').next('input[data-name]').val(defaultValue);

                    if (defaultValue == dataVal) {
                        $(this).addClass('selector-selected');
                    } else {
                        $(this).removeClass('selector-selected');
                    }
                });

                field.find('.range-input').each(function () {
                    var $dis = $(this);
                    $dis.removeClass('ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all').empty();
                    var defaultValue = parseFloat($dis.attr('data-defaultvalue'));
                    $dis.siblings(".range-input-selector").val(defaultValue);
                    $dis.slider({
                        range: "min",
                        value: parseFloat($dis.attr('data-defaultvalue')),
                        min: parseFloat($dis.attr('data-min')),
                        max: parseFloat($dis.attr('data-max')),
                        step: parseFloat($dis.attr('data-step')),
                        slide: function (event, ui) {
                            $dis.siblings(".range-input-selector").val(ui.value);
                            accesspress_parallax_refresh_repeater_values();
                        }
                    });
                });

                field.find('.onoffswitch').each(function () {
                    var defaultValue = $(this).next('input[data-name]').attr('data-default');
                    $(this).next('input[data-name]').val(defaultValue);
                    if (defaultValue == 'on') {
                        $(this).addClass('switch-on');
                    } else {
                        $(this).removeClass('switch-on');
                    }
                });

                field.find('.accesspress-parallax-color-picker').each(function () {
                    var $element = $(this);
                    $(this).closest('.wp-picker-container').after($element);
                    $element.prev('.wp-picker-container').remove();
                    $element.wpColorPicker({
                        change: function (event, ui) {
                            setTimeout(function () {
                                accesspress_parallax_refresh_repeater_values();
                            }, 100);
                        }
                    });
                });

                field.find(".attachment-media-view").each(function () {
                    var defaultValue = $(this).find('input[data-name]').attr('data-default');
                    $(this).find('input[data-name]').val(defaultValue);
                    if (defaultValue) {
                        $(this).find(".thumbnail-image").html('<img src="' + defaultValue + '"/>').prev('.placeholder').addClass('hidden');
                    } else {
                        $(this).find(".thumbnail-image").html('').prev('.placeholder').removeClass('hidden');
                    }
                });

                field.find(".accesspress-parallax-icon-list").each(function () {
                    var defaultValue = $(this).next('input[data-name]').attr('data-default');
                    $(this).next('input[data-name]').val(defaultValue);
                    $(this).prev('.accesspress-parallax-selected-icon').children('i').attr('class', '').addClass(defaultValue);

                    $(this).find('li').each(function () {
                        var icon_class = $(this).find('i').attr('class');
                        if (defaultValue == icon_class) {
                            $(this).addClass('icon-active');
                        } else {
                            $(this).removeClass('icon-active');
                        }
                    });
                });

                field.find(".accesspress-parallax-multi-category-list").each(function () {
                    var defaultValue = $(this).next('input[data-name]').attr('data-default');
                    $(this).next('input[data-name]').val(defaultValue);

                    $(this).find('input[type="checkbox"]').each(function () {
                        if ($(this).val() == defaultValue) {
                            $(this).prop('checked', true);
                        } else {
                            $(this).prop('checked', false);
                        }
                    });
                });

                field.find('.accesspress-parallax-fields').removeClass('enable-field');

                $this.find('.accesspress-parallax-repeater-field-control-wrap').append(field);

                field.addClass('expanded').find('.accesspress-parallax-repeater-fields').show();
                $('.accordion-section-content').animate({scrollTop: $this.height()}, 1000);
                accesspress_parallax_refresh_repeater_values();
            }

        }
        return false;
    });

    $('body').on('click', '.accesspress-parallax-icon-list li', function () {
        var icon_class = $(this).find('i').attr('class');
        $(this).addClass('icon-active').siblings().removeClass('icon-active');
        $(this).parent('.accesspress-parallax-icon-list').prev('.accesspress-parallax-selected-icon').children('i').attr('class', '').addClass(icon_class);
        $(this).parent('.accesspress-parallax-icon-list').next('input').val(icon_class).trigger('change');
        accesspress_parallax_refresh_repeater_values();
    });

    //MultiCheck box Control JS
    $('body').on('change', '.accesspress-parallax-type-multicategory input[type="checkbox"]', function () {
        var checkbox_values = $(this).parents('.accesspress-parallax-type-multicategory').find('input[type="checkbox"]:checked').map(function () {
            return $(this).val();
        }).get().join(',');
        $(this).parents('.accesspress-parallax-type-multicategory').find('input[type="hidden"]').val(checkbox_values).trigger('change');
        accesspress_parallax_refresh_repeater_values();
    });

    $('body').on('click', '.accesspress-parallax-selected-icon', function () {
        $(this).next().slideToggle();
    });

    $("#customize-theme-controls").on("click", ".accesspress-parallax-repeater-field-remove", function () {
        if (typeof $(this).parent() != 'undefined') {
            $(this).closest('.accesspress-parallax-repeater-field-control').slideUp('normal', function () {
                $(this).remove();
                accesspress_parallax_refresh_repeater_values();
            });

        }
        return false;
    });

    $('#customize-theme-controls').on('click', '.accesspress-parallax-repeater-field-close', function () {
        $(this).closest('.accesspress-parallax-repeater-fields').slideUp();
        ;
        $(this).closest('.accesspress-parallax-repeater-field-control').toggleClass('expanded');
    });

    $('#customize-theme-controls').on('click', '.accesspress-parallax-repeater-field-title', function () {
        $(this).next().slideToggle();
        $(this).closest('.accesspress-parallax-repeater-field-control').toggleClass('expanded');
    });

    /*Drag and drop to change order*/

    $(".accesspress-parallax-repeater-field-control-wrap").sortable({
        orientation: "vertical",
        update: function (event, ui) {
            accesspress_parallax_refresh_repeater_values();
        }
    });

    $("#customize-theme-controls").on('keyup change', '[data-name]', function () {
        accesspress_parallax_refresh_repeater_values();
        return false;
    });

    $("#customize-theme-controls").on('change', 'input[type="checkbox"][data-name]', function () {
        if ($(this).is(":checked")) {
            $(this).val('yes');
        } else {
            $(this).val('no');
        }
        accesspress_parallax_refresh_repeater_values();
        return false;
    });
    // ADD IMAGE LINK
    $('body').on('click', '.accesspress-parallax-upload-button', function (event) {
        event.preventDefault();
        var imgContainer = $(this).closest('.accesspress-parallax-fields-wrap').find('.thumbnail-image'),
                placeholder = $(this).closest('.accesspress-parallax-fields-wrap').find('.placeholder'),
                backgroundParams = $(this).closest('.accesspress-parallax-repeater-fields').find('.background-params'),
                imgIdInput = $(this).siblings('.upload-id');

        var frame;
        // Create a new media frame
        frame = wp.media({
            title: 'Select or Upload Image',
            button: {
                text: 'Use Image'
            },
            multiple: false  // Set to true to allow multiple files to be selected
        });

        // When an image is selected in the media frame...
        frame.on('select', function () {

            // Get media attachment details from the frame state
            var attachment = frame.state().get('selection').first().toJSON();

            // Send the attachment URL to our custom image input field.
            imgContainer.html('<img src="' + attachment.url + '" style="max-width:100%;"/>');
            placeholder.addClass('hidden');
            backgroundParams.addClass('enable-field');
            // Send the attachment id to our hidden input
            imgIdInput.val(attachment.url).trigger('change');

        });

        // Finally, open the modal on click
        frame.open();
    });

    // DELETE IMAGE LINK
    $('.customize-control-repeater').on('click', '.accesspress-parallax-delete-button', function (event) {

        event.preventDefault();
        var imgContainer = $(this).closest('.accesspress-parallax-fields-wrap').find('.thumbnail-image'),
                placeholder = $(this).closest('.accesspress-parallax-fields-wrap').find('.placeholder'),
                backgroundParams = $(this).closest('.accesspress-parallax-repeater-fields').find('.background-params'),
                imgIdInput = $(this).siblings('.upload-id');

        // Clear out the preview image
        imgContainer.find('img').remove();
        placeholder.removeClass('hidden');
        backgroundParams.removeClass('enable-field');
        // Delete the image id from the hidden input
        imgIdInput.val('').trigger('change');

    });

});