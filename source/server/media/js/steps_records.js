jQuery('[name="job_info_currency"]').change(function() {
    if (jQuery(this).val() == '') {
        jQuery('[name="job_info_salary_from"]').attr('disabled', true).val('');
        jQuery('[name="job_info_salary_to"]').attr('disabled', true).val('');
    } else {
        jQuery('[name="job_info_salary_from"]').attr('disabled', false);
        jQuery('[name="job_info_salary_to"]').attr('disabled', false);
    }
});
jQuery('[name="job_experience_year"]').change(function() {
    if (jQuery(this).val() == '1') {
        jQuery('[name="experience_year"]').attr('disabled', true).val('');
    } else {
        jQuery('[name="experience_year"]').attr('disabled', false);
    }
});
jQuery('#add-more-foreign-language').click(function(e) {
    e.preventDefault();
    jQuery('#list-foreign-language').append(
        jQuery('#list-foreign-language .display-flex').first().clone().append('<span class="remove-icon">-</span>').addClass(' clone')
    );

    jQuery('#list-foreign-language').on('click', '.clone span', function() {
        jQuery(this).parent().remove();
    });
});
jQuery('#job-skill-area').on('change', '.skill-level',function(e) {
    jQuery(this).next().text(jQuery(this).val() + '/5');
});
jQuery('#job-skill-area').on('change', '.skill-level',function(e) {
    jQuery(this).next().text(jQuery(this).val() + '/5');
});
var modal = document.getElementById('crop-avatar-modal');
var modalPreview = document.getElementById('preview-cv-modal');
jQuery('.close-modal-btn').click(function() {
    modal.style.display = "none";
    jQuery('body').removeClass('overflow-hidden');
});