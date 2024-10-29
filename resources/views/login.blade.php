<!doctype html>
<html lang="en">
    <head>
        @include('chunks.head')
    </head>
    <body class="d-flex align-items-center py-4 bg-body-tertiary">
        <main class="form-signin w-100 m-auto">
            <form id="login-form" method="POST" action="#">
                <h1 class="h3 mb-3 fw-normal text-center">Login</h1>

                <div class="form-floating">
                    <input type="email" class="form-control" id="inp-email" placeholder="name@example.com">
                    <label for="inp-email">Username</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="inp-password" placeholder="Password">
                    <label for="inp-password">Password</label>
                </div>

                <button id="tn-login" class="btn btn-primary w-100" type="submit">Login <iconify-icon icon="mdi:send" width="24" height="24"></iconify-icon></button>
            </form>
        </main>

        @include('chunks.scripts')

        <script type="module">
            import { Login } from "./assets/js/Login.class.js";

            new Login({
                'csrf_hash': '<?= csrf_token() ?>'
            });
        </script>
    </body>
</html>