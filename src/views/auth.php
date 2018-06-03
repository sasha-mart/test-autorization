<form class="form-horizontal js--auth-form">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h2>Авторизация</h2>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="form-group has-danger">
                <label class="sr-only" for="name">Имя</label>
                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                    <input type="text" name="name" class="form-control" id="name"
                           placeholder="Имя" autofocus>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-control-feedback">
                        <span class="text-danger align-middle js--error-name">
                        </span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="sr-only" for="phone">Телефон</label>
                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                    <input name="phone" class="form-control js--phone" id="phone"
                           placeholder="Номер телефона">
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-control-feedback">
                        <span class="text-danger align-middle js--error-phone">
                        </span>
            </div>
        </div>
    </div>
    <div class="row js-send-code-raw">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <span class="btn btn-link js--send-code-btn">Отправить код подтверждения</span>
        </div>
        <div class="loader js--validate-loader" style="display: none;"></div>
    </div>
    <div class="js--code-raws" style="display: none;">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="code">Код подтверждения</label>
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <input name="code" class="form-control js--code" id="code"
                               placeholder="Введите код из SMS">
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-control-feedback">
                        <span class="text-danger align-middle js--error-code">
                        </span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <span class="btn btn-link js--repeat-code-btn">Отправить код повторно</span>
            </div>
        </div>
    </div>
    <input type="hidden" name="csrf" value="<?php echo $_SESSION['csrf_token'];?>">
</form>
<div class="row" style="padding-top: 1rem">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <button class="btn btn-success js--login-btn" disabled>Войти</button>
    </div>
    <div class="loader js--login-loader" style="display: none;"></div>
</div>