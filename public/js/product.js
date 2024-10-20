$(document).ready(function() {
    $('#product-form').on('submit', function(e) {
        e.preventDefault(); // Impede o envio normal do formulário

        var formData = new FormData(this); // Cria um FormData com os dados do formulário

        $.ajax({
            url: $(this).attr('action'), // A URL do formulário
            type: $(this).attr('method'), // O método do formulário (POST)
            data: formData,
            contentType: false, // Para enviar o FormData corretamente
            processData: false, // Para não processar os dados
            success: function(response) {
                alert(response.success); // Exibe a mensagem de sucesso
                // Aqui você pode adicionar código para atualizar a UI ou limpar o formulário
                $('#product-form')[0].reset(); // Reseta o formulário
            },
            error: function(xhr) {
                // Se houver erros, você pode exibir a mensagem
                var errors = xhr.responseJSON.errors;
                if (errors) {
                    var errorMessage = '';
                    $.each(errors, function(key, value) {
                        errorMessage += value[0] + '\n'; // Concatena todas as mensagens de erro
                    });
                    alert(errorMessage);
                } else {
                    alert('Erro inesperado. Tente novamente.'); // Mensagem genérica
                }
            }
        });
    });
});