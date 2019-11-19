function insere_item_na_lista(id){
    var prod = $('#item'+id).html();
    var produto = JSON.parse(JSON.parse(prod));
    var total = $('#total_pedido').text().replace('R$','').trim();
    var listaProdutos = $('#lista_produtos').text().trim();
    // console.log(request.getSession().getAttribute("user"))
    var produtos = []
    for(data in produto['data']){
        if(produto['data'][data]['id'] == id){
            // console.log(produto['data'][data])
            // console.log(id)
            var total = parseFloat(total)+ parseFloat(produto['data'][data]['valor']);
            console.log(listaProdutos)
            if(listaProdutos.length == 0){
                produtos.push({'id': id, 'nome': produto['data'][data]['nome_receita'], 'qtd': 1});
                // request.getSession().setAttribute("dados", produtos)
            }
            }
        }
        $.ajax({
            url: "registro_de_pedidos.php",
            data: { products: produtos[0] }
       });  
    
    // var ProdutoExiste = false;
    //         for(indice in produtos){
    //             if(produtos[indice].hasOwnProperty(id)){
    //                 produtos[indice]['qtd'] = produto[indice]['qtd']+1
    //                 ProdutoExiste = true
    //             }
    //         }
    //         if(!ProdutoExiste){
    //             produtos.push({'id': id, 'nome': produto['data'][data]['nome_receita'], 'qtd': 1});
    //             }  
    console.log(produtos)
    var html = ''
    for(p in produtos){

    }
    $('#lista_produtos').html("<tr>\
    <td>"+'Bolo de cenoura'+"</td>\
    <td style='text-align: center;'>12</td>\
    <td style='text-align: center;'><img src='imagens/icons/delete.png'\
                                                     alt='Excluir produto'\
                                                     title='Excluir produto'></a></td>\
        </tr>");
    $('#total_pedido').html('R$'+total)

};