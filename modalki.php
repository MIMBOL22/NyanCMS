<!-- Modal -->
<div class="modal fade mb-df-ai-center" id="AuthModal" tabindex="-1"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Авторизация</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Ваша почта</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="Ваша почта">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Пароль</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Пароль">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                    <button type="submit" class="btn btn-primary">Войти</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade mb-df-ai-center" id="RegModal" tabindex="-1"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Регистрация</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Ваша почта</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="Ваша почта">
                        <small id="emailHelp" class="form-text text-muted">На которую прийдёт ссылка с
                            подтверждением</small>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="exampleInputPassword1">Имя</label>
                                <input type="text" class="form-control" placeholder="Имя">
                            </div>
                            <div class="col">
                                <label for="exampleInputPassword1">Фамилия</label>
                                <input type="text" class="form-control" placeholder="Фамилия">
                            </div>
                        </div>
                        <small id="emailHelp" class="form-text text-muted">Для опознавания вашей личности</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Ваш пароль</label>
                        <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Ваш пароль">
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" id="chi" type="radio" name="type" checked value="child">
                                <label class="form-check-label" for="inlineRadio1">Ученик</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" id="par" type="radio" name="type" value="parent">
                                <label class="form-check-label" for="inlineRadio1">Учитель</label>
                            </div>
                        </div>
                        <div class="col">
                            <div id="child" style="display: block">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="class"
                                                   value="7a" disabled>
                                            <label class="form-check-label" for="inlineRadio1">7А</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="class"
                                                   value="7b" checked>
                                            <label class="form-check-label" for="inlineRadio1">7Б</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="class"
                                                   value="7v" disabled>
                                            <label class="form-check-label" for="inlineRadio1">7В</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="class"
                                                   value="7g" disabled>
                                            <label class="form-check-label" for="inlineRadio1">7Г</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="parent" style="display: none">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="classone"
                                                   value="7a" disabled>
                                            <label class="form-check-label" for="inlineCheckbox1">7A</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="classtwo"
                                                   value="7b" checked>
                                            <label class="form-check-label" for="inlineCheckbox2">7Б</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="classthr"
                                                   value="7v" disabled>
                                            <label class="form-check-label" for="inlineCheckbox1">7В</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="classtho"
                                                   value="7g" disabled>
                                            <label class="form-check-label" for="inlineCheckbox2">7Г</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            $("#par").on("click", function () {
                                $("#child").css("display", "none");
                                $("#parent").css("display", "block");
                            })
                            $("#chi").on("click", function () {
                                $("#child").css("display", "block");
                                $("#parent").css("display", "none");
                            })
                        </script>
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" checked>
                        <label class="form-check-label" for="exampleCheck1">Подтверждаю обработку моих персоональный и публикации её в сети "Интернет"</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
