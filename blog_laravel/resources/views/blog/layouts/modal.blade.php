<!-- Signin modal -->
<div class="modal fade" id="signinModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Sign in</h4>
      </div>
      <div class="modal-body">
      	<div id="signinMessage"></div>
        <form class="form-horizontal" id="signinForm">
				  <div class="form-group">
				    <label class="col-sm-3 control-label">Email</label>
				    <div class="col-sm-8">
				      <input type="email" class="form-control" id="signinEmail">
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="col-sm-3 control-label">Password</label>
				    <div class="col-sm-8">
				      <input type="password" class="form-control" id="signinPassword">
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-3 col-sm-8">
				    	<button type="submit" class="btn btn-dark-cyan">Sign in</button>
				    </div>
				  </div>
				  <input type="hidden" id="signinToken" value="{{csrf_token()}}">
				  <input type="hidden" id="signinAction" value="{{route('blog.checkLogin')}}">
				</form>
      </div>
    </div>
  </div>
</div>

<!-- Signup modal -->
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Sign up</h4>
      </div>
      <div class="modal-body">
      	<div id="signupMessage"></div>
        <form class="form-horizontal" id="signupForm">
        	<div class="form-group">
				    <label class="col-sm-3 control-label">Name</label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="signupName">
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="col-sm-3 control-label">Email</label>
				    <div class="col-sm-8">
				      <input type="email" class="form-control" id="signupEmail">
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="col-sm-3 control-label">Password</label>
				    <div class="col-sm-8">
				      <input type="password" class="form-control" id="signupPassword">
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="col-sm-3 control-label">Confirm Password</label>
				    <div class="col-sm-8">
				      <input type="password" class="form-control" id="signupPassword2">
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-3 col-sm-8">
				      <button type="submit" class="btn btn-dark-cyan">Sign up</button>&nbsp;
				      <button type="reset" class="btn btn-default">Reset</button>
				    </div>
				  </div>
				  <input type="hidden" id="signupToken" value="{{csrf_token()}}">
				  <input type="hidden" id="signupAction" value="{{route('blog.register')}}">
				</form>
      </div>
    </div>
  </div>
</div>