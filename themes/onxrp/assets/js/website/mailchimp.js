//Fotter Newsletter Button Js
jQuery(document).ready(function($){
jQuery( "#ajax-mail-chimp-form" ).on( "submit", function( event ) {
    event.preventDefault();
    var email = $('#ajax-mail-chimp-form').find('input[name="email"]').val();

    if (email === "") {
      $('#mailchimp-result').fadeIn().html('<span class="form-validation error">Please Enter a Email Address </span>');
      return false;
    }
    if( !validateEmail(email)){
      $('#mailchimp-result').fadeIn().html('<span class="form-validation error">Please Enter a Valid Email Address </span>');
      return false;
    }
    $('#ajax-mail-chimp-form').find('button[name="subscribe"]').prop('disabled', true);
    var type = "newsletter";
    jQuery.ajax({
         data: {action: 'mail_chimp_submit', email:email},
         type: 'post',
         url: the_ajax_script.ajaxurl,
         success: function(data) {
            $('#mailchimp-result').fadeIn().html(data);
            $('#ajax-mail-chimp-form').find('input[name="email"]').val('');
            $('#ajax-mail-chimp-form').find('button[name="subscribe"]').prop('disabled', false);
				 setTimeout(function() {
				   	$('#mailchimp-result').fadeOut("slow");
				}, 6000 );

        }
    });
  });
});

// Js to open model on button click brand guide
function brand_model_open(event, id) {
  event.preventDefault();
  jQuery(`#brand-modal-${id}`).show();
  jQuery('body').css('overflow', 'hidden');
}

// Js to close model on button click brand guide
function brand_model_close(event, id) {
  event.preventDefault();
  jQuery(`#brand-modal-${id}`).hide();
  jQuery('body').css('overflow', 'visible');
}

// Brand Guide Submit Function
function brand_submit_function(event, id){
  event.preventDefault();
  var identifier = `#brand-form-${id}`
  var resultdiv = `#brand-result-${id}`
  var email = jQuery(identifier).find('input[name="email"]').val();
  var linkid = jQuery(identifier).find('input[name="link_id"]').val();

  if (email === "") {
    jQuery(resultdiv).fadeIn().html('<span class="form-validation error">Please Enter a Email Address </span>');
    return false;
  }
  if( !validateEmail(email)){
    jQuery(resultdiv).fadeIn().html('<span class="form-validation error">Please Enter a Valid Email Address </span>');
    return false;
  }
  if (linkid === "") {
    jQuery(resultdiv).fadeIn().html('<span class="form-validation error">Please Set List Id</span>');
    return false;
  }

  jQuery(identifier).find('button[name="submit"]').prop('disabled', true);
  jQuery(resultdiv).fadeOut().html('');
  var type= "brandguide";
    jQuery.ajax({
         data: {action: 'mail_chimp_submit', email:email, type:type,linkid:linkid},
         type: 'post',
         url: the_ajax_script.ajaxurl,
         success: function(data) {
          jQuery(identifier).find('input[name="email"]').val('');
          jQuery(identifier).find('button[name="submit"]').prop('disabled', false);
          jQuery(`#brand-download-${id}`)[0].click();
          jQuery(`#brand-modal-${id}`).hide();
          jQuery('body').css('overflow', 'visible');
        }
    });
}

function validateEmail($email) {
  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  return emailReg.test( $email );
}

//Js for tooltip
jQuery(function() {
var tooltip = document.getElementById("tooltip");
  window.onmousemove = function(e){
    var x = e.clientX;
    var y = e.clientY;
    tooltip.style.top = (y+10)+"px";
    tooltip.style.left = (x+10)+"px";
}
});