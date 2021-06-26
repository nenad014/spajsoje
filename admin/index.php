<?php require_once 'inc/top.inc.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <form class="box" action="adminLog.php" method="POST">
                    <h1>NEW AGE ADMIN</h1>
                    <p class="text-muted"> Unesi admin ime i lozinku</p>
                    <input type="text" name="name" placeholder="Admin">
                    <input type="password" name="password" placeholder="Lozinka">
                    <input type="submit" name="adminLogBtn" value="PRIJAVA">
                </form>
            </div>
        </div>
    </div>
</div>
<?php require_once 'inc/bottom.inc.php'; ?>