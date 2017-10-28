<?php
require_once 'autoload.php';

verificaAcesso();

$total = 10 + (20 / 4);

$soma = 0;
for($i = 1; $i <= 1000; $i++){
    $soma = $soma + $i;
}
?>
<div class="row">
    <div class="page-header">
        <h1>
            <i class="fa fa-calculator"></i> Página de Contas
            <a href="/" class="btn btn-default pull-right">
                <i class="fa fa-arrow-left"></i> Voltar
            </a>
        </h1>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <p>Resultado para 10+(20/4) : <?=$total?></p>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <p>Soma dos 1000 primeiros números: <?=$soma?></p>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <p>
            <?php
                $fat = 1;
                for($i = 1; $i <= 10; $i++){
                    $fat *= $i;
            ?>
                    <span>Fatorial de <?=$i?>: <?=$fat?></span>
                    <br>
            <?php 
                }
            ?>
        </p>
    </div>
</div>
<?php include 'templates/footer.php';?>