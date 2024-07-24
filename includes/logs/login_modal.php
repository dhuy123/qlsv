<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content login-modal">
      <div class="modal-header login-modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="loginModalLabel">Đăng Nhập Hệ Thống</h4>
      </div>
      <div class="modal-body">
        <div class="text-center">
          <div role="tabpanel" class="login-tab">
            <!-- Tab panes -->
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active text-center" id="home">
                &nbsp;&nbsp;
                <span id="login_fail" class="response_error" style="display: none;">Loggin failed, please try again.</span>
                <div class="clearfix"></div>
                <form action="includes/logs/login.php" method="POST">
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-addon"><i class="fa fa-user"></i></div>
                      <input type="text" class="form-control" id="login_username" placeholder="Nhập mã định danh..." name="uid">
                    </div>
                    <span class="help-block has-error" id="email-error"></span>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                      <input type="password" class="form-control" id="password" placeholder="Nhập mật khẩu" name="upwd">
                    </div>
                  </div>
                  <button type="submit" id="login_btn" class="btn btn-block bt-login" name="submit">Đăng Nhập</button>
                  <div class="clearfix"></div>
                  <!--
                  <div class="login-modal-footer">
                    <div class="row">
                      <div class="col-xs-8 col-sm-8 col-md-8">
                        <i class="fa fa-lock"></i>
                        <a href="javascript:;" class="forgetpass-tab"> Forgot password? </a>
                      </div>

                      <div class="col-xs-4 col-sm-4 col-md-4">
                        <i class="fa fa-check"></i>
                        <a href="javascript:;" class="signup-tab"> Sign Up </a>
                      </div>
                    </div>
                  </div>
                  -->
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
<!-- - Login Model Ends Here -->