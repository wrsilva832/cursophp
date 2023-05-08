<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <style>
        a {
            float: right;
        }

        .card {
            float: left;
            margin: 10px;
            width: 300px;
        }

        h2 {
            text-align: center;
        }

        #carrinho-principal {
            ` position: fixed;
            right: 10px;
            bottom: 10px;
        }

        .up,
        .down {
            cursor: pointer;
        }
    </style>
    <div class="container mt-3">
        <h2 class="text-center">Helena Nolleto</h2>
        <?php
        include("conectar.php");
        $sql = "select * from produto";
        $resultado = conectar($sql);
        $i = 0;
        while ($linha = $resultado->fetch_assoc()) {
            $nome = $linha["nome"];
            $valor = $linha["valor"];
            $imagem = $linha["imagem"];
            $id = $linha["id"];
        ?>
            <div class="card">
                <img class="card-img-top" src="<?php echo $image; ?>" alt="Card image" style="width:100%">
                <div class="card-body">
                    <h4 class="card-title"><?php echo $nome; ?></h4>
                    <p class="card-text">R$: <?php echo $valor; ?>
                        <a href="#" class="btn btn-outline-info" onclick="addItem(<?php echo $i ?>)">🛒</a>
                    </p>
                </div>
            </div>
        <?php $i++;
        }
        ?>
    </div>

    <a href="#" id="carrinho-principal" class="btn btn-primary btn-lg" onclick="carrinho()" data-bs-toggle="modal" data-bs-target="#myModal">🛒</a>


    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Produtos para encomenda</h4>
                    <button type="modal-title" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- MOdal body -->
                <div class="modal-body" id="modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Produto</th>
                                <th class="col-1">Valor</th>
                                <th class="col-1">Quantidade</th>
                            </tr>
                        </thead>
                        <tbody id="tb-corpo">
                        </tbody>
                    </table>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-sucess" onclick="enviarEncomenda()">Enviar Encomenda</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                </div>


            </div>
        </div>
    </div>

    <script>
        lsCarrinho = [];
        valorEncomenda = 0;

        function addItem(i) {
            if (lsCarrinho[i] != true) {
                lsCarrinho[i] = true;
                document.getElementsByClassName("btn")[i].classList.remove("btn-ouline-info");
                document.getElementsByClassName("btn")[i].classList.add("btn-info");                
            } else {
                lsCarrinho[i] = false;
                document.getElementsByClassName("btn")[i].classList.remove("btn-info");
                document.getElementsByClassName("btn")[i].classList.add("btn-outline-info");                
            }
        }
        lsProduto = [];

        function carrinho() {
            valorEncomenda = 0;
            lsProduto = [];
            for (const i in lsCarrinho) {
                if (lsCarrinho[i]) {
                    p = {};
                    console.log(i);
                    p.id = i;
                    p.nome = document.getElementsByClassName("card-title")[i].innerHTML;
                    p.valor = document.getElementsByClassName("card-text")[i].innerHTML;
                    n = p.valor.indexOf("<");
                    p.valor = p.valor.substring(3,n);
                    p.valor = p.valor.replace(",", ".")
                    p.quantidade = 1;
                    console.log(p);
                    lsProduto.push(p);
                }
            }

            tbCorpo = "";
            for (const i in lsProduto) {
                p = lsProduto[i];
                p.valorUnitario = p.valor;
                tbCorpo +=
                 <tr>
                 <td>${p.nome}</td>
                    <td class="valor">${p.valor}</td>
                    <td>
                    <span class="up" onclick="mudarQt(${i},1)">🔼</span>
                    <span class="qt">${p.quantidade}</span>
                    <span class="down" onclick="mudarQt(${i},-1)">🔽</span>
                    </td>
                    </tr>  
                    ;
                    valorEncomenda += Number(p.valor);              
            }
            tbCorpo += <tr>
                            <td>Valor da Encomenda</td>
                            <td colspan="2" id="vlEncomenda">${Valor da Encomenda}</td>
                            </tr>;
            document.getElementById("tb-corpo").innerHTML = tbCorpo;
        }

        function mudarQt(i, qt) {
            console.log(i);
        }





    </script>
</body>

</html>