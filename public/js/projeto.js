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

$('#valor').mask('#.##0,00', { reverse:true })
