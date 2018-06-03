<form class="form-horizontal">
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
                           placeholder="Имя" required autofocus>
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
                    <input name="phone" class="form-control" id="phone"
                           placeholder="Номер телефона" required>
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
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <a class="btn btn-link">Отправить код подтверждения</a>
        </div>
    </div>
    <div class="row" style="padding-top: 1rem">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-success"><i class="fa fa-sign-in"></i> Login</button>
        </div>
    </div>
</form>