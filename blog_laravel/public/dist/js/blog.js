$(document).ready(function() {
	// Back to top
  $('button#back-to-top').on('click', function() {
   	$('html, body').animate({ 
   		scrollTop: 0 
   	}, 900, function() {
   		$('button#back-to-top').blur();
   	});
  });

  // Ajax Sign in
  $('#signinForm').on('submit', function(e) {
    e.preventDefault(); 

		var url = $('#signinAction').val();
    var formData = {
      'email': $('#signinEmail').val(),
      'password': $('#signinPassword').val(),
      '_token': $('#signinToken').val()
    }
    var html = '';

    $.ajax({
      method: 'POST',
      url: url,
      data: formData,
      dataType: 'json',
      success: function(res) {
        if (res.status == 'success') {
        	html = '<div class="alert alert-success"><i class="fa fa-check"></i> Login successfully!</div>';
        	$('#signinMessage').html(html);
        	setTimeout(function() {
					  location.reload();
					}, 1500);
        } else {
        	html = '<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> Email or password is invalid</div>';
        	$('#signinMessage').html(html);
        }
      },
      error: function(res) {
				$('#signinMessage').html(loopErrors(res));
      }
    });
  });

  // Ajax Sign up
  $('#signupForm').on('submit', function(e) {
    e.preventDefault(); 

		var url = $('#signupAction').val();
    var formData = {
    	'name': $('#signupName').val(),
      'email': $('#signupEmail').val(),
      'password': $('#signupPassword').val(),
      'password2': $('#signupPassword2').val(),
      '_token': $('#signupToken').val()
    }
    var html = '';

    $.ajax({
      method: 'POST',
      url: url,
      data: formData,
      dataType: 'json',
      success: function(res) {
      	if (res.status == 'success') {
	      	html = '<div class="alert alert-success"><i class="fa fa-check"></i> Register successfully!</div>';
	      	$('#signupMessage').html(html);
	      	setTimeout(function() {
						$('#signupModal').modal('hide');
						$('#signinModal').modal('show');
					}, 1500);
      	}
      },
      error: function(res) {
    		$('#signupMessage').html(loopErrors(res));
      }
    });
  });

  // Ajax Comment
  $('#commentForm').on('submit', function(e) {
    e.preventDefault(); 

    var url = $('#commentAction').val();
    var formData = {
      'content': $('#commentContent').val(),
      '_token': $('#commentToken').val()
    }
    var html = '';

    $.ajax({
      method: 'POST',
      url: url,
      data: formData,
      dataType: 'json',
      success: function(res) {
        if (res.status == 'success') {
          $('#commentContent').val('');
          location.reload();
          html = '<div class="alert alert-success"><i class="fa fa-check"></i> Your comment has been sent!</div>';
          $('#commentMessage').html(html);
        }
      },
      error: function(res) {
        $('#commentMessage').html(loopErrors(res));
      }
    });
  });

  function loopErrors(res) {
    var obj = JSON.parse(res.responseText);
    html = '<div class="alert alert-danger">';
    html += '<ul>';
    for (var key1 in obj) {
      for (var key2 in obj[key1]) {
        html += '<li>';
        html += obj[key1][key2];
        html += '</li>';
      }
    }
    html += '</ul>';
    html += '</div>';
    return html;
  }

});