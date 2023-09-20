function deleteRegistro(rotaUrl, id)
{
    if(confirm('Deseja excluir o registro?')){
        $.ajax({
            url: rotaUrl,
            method: 'DELETE',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
                id: id,
            },
            beforeSend: function () {
                $.blockUI({
                    message: 'Aguarde executando a ação...',
                    timeout: 1000,
                });
            },
        }).done(function (data) {
            $.unblockUI();

            if(data.success == true){
                window.location.reload(true);
            }else{
                alert('Não foi possível excluir o registro.');
            }
        }).fail( function(data) {
            $.unblockUI();
            alert('Não foi possível buscar os dados.');
        });
    }
}

$('#valor').mask('#.##0,00', { reverse:true });

$('#cep').blur( function () {
    var cep = $(this).val().replace(/\D/g, '');
    if (cep != "") {
        var validacep = /^[0-9]{8}$/;
        if (validacep.test(cep)){
            $('#logradouro').val(" ");
            $('#endereco').val(" ");
            $('#bairro').val(" ");
            // $('#cidade').val(" ");
            // $('#uf').val(" ");
            // $('#ibge').val(" ");
            $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function (dados){
                if (!("erro" in dados)){
                    $('#logradouro').val(dados.logradouro);
                    $('#endereco').val(dados.complemento);
                    $('#bairro').val(dados.bairro);
                    // $('#cidade').val(dados.cidade.toUpperCase());
                    // $('#uf').val(dados.uf.toUpperCase());
                    // $('#ibge').val(dados.ibge.toUpperCase());
                }else{
                    alert("O " + $('#cep').val() + " não foi encontrado, digite manualmente ou tente novamente");
                    $('#cep').val(" ");
                }
            });
        }
    }
});