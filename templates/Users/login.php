<?php
/**
 * Created by PhpStorm.
 * User: santo
 * Date: 13/11/2021
 * Time: 17:09
 */?>

<?php $this->layout = 'login'; ?>

<?= $this->Flash->render() ?>


<div class="card-body p-4">
    <div class="text-center mt-2">
        <h5 class="text-primary">Digite seu email e senha para iniciar a sessão.</h5>
        <p class="text-muted"></p>
    </div>
    <div class="p-2 mt-4">
        <?= $this->Form->create() ?>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" placeholder="Digite seu email" name="email">
            </div>

            <div class="mb-3">
                <div class="float-end">
                    <a href="<?= $this->Url->build('/users/forgot')?>" class="text-muted">Esqueci minha senha</a>
                </div>
                <label class="form-label" for="password-input">Senha</label>
                <div class="position-relative auth-pass-inputgroup mb-3">
                    <input type="password" class="form-control pe-5" placeholder="Digite sua senha" id="password-input" name="password">
                    <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                </div>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="auth-remember-check">
                <label class="form-check-label" for="auth-remember-check">Lembrar-me</label>
            </div>

            <div class="mt-4">
                <button class="btn btn-primary w-100" type="submit">Entrar</button>
            </div>


        <?= $this->Form->end() ?>

    </div>
</div>
<!-- end card body -->

<?php $this->append('scriptBottom'); ?>
    <script>
        // let mostrar_senha = document.getElementById('password-addon');
        // let senha = document.getElementById('password');
        //
        // icon.addEventListener('click', function () {
        //     if(senha.type == 'password'){
        //         senha.type = 'text';
        //     }else{
        //         senha.type = 'password';
        //     }
        // })
    </script>
<?php $this->end(); ?>