$(document).ready(function() {
    $('#loginForm').on('submit', function(event) {
        event.preventDefault(); // Impede o envio padrão do formulário

        // Limpa mensagens anteriores
        $('#error-messages').hide().empty();
        $('#success-message').hide().empty();

        // Coleta os dados do formulário
        const formData = {
            email: $('#email').val(),
            password: $('#password').val(),
            _token: $('input[name="_token"]').val() // CSRF token
        };

        // Envia os dados via AJAX
        $.ajax({
            url: '/login', // URL da rota de login
            type: 'POST',
            data: formData,
            success: function(response) {
                // Redireciona ou exibe mensagem de sucesso
                $('#success-message').text('Login realizado com sucesso!').show();
                setTimeout(function() {
                    window.location.href = '/marketplace'; // Redireciona após o sucesso
                }, 2000);
            },
            error: function(xhr) {
                // Exibe mensagens de erro se ocorrer algum
                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    const errors = xhr.responseJSON.errors;
                    $.each(errors, function(key, value) {
                        $('#error-messages').append('<li>' + value[0] + '</li>'); // Exibe cada erro
                    });
                    $('#error-messages').show();
                } else {
                    $('#error-messages').text('Credenciais inválidas.').show();
                }
            }
        });
    });

    $('#registerForm').on('submit', function(event) {
        event.preventDefault(); // Impede o envio padrão do formulário

        // Limpa mensagens anteriores
        $('#error-messages').hide().empty();
        $('#success-message').hide().empty();

        // Coleta os dados do formulário
        const formData = {
            name: $('#name').val(),
            email: $('#email').val(),
            password: $('#password').val(),
            password_confirmation: $('#password_confirmation').val(),
            _token: $('input[name="_token"]').val() // CSRF token
        };

        // Envia os dados via AJAX
        $.ajax({
            url: '/register', // URL da rota de registro
            type: 'POST',
            data: formData,
            success: function(response) {
                // Redireciona ou exibe mensagem de sucesso
                $('#success-message').text('Registro realizado com sucesso!').show();
                setTimeout(function() {
                    window.location.href = '/dashboard'; // Redireciona após o sucesso
                }, 2000);
            },
            error: function(xhr) {
                // Exibe mensagens de erro se ocorrer algum
                const errors = xhr.responseJSON.errors;
                if (errors) {
                    $.each(errors, function(key, value) {
                        $('#error-messages').append('<li>' + value[0] + '</li>'); // Exibe cada erro
                    });
                    $('#error-messages').show();
                } else {
                    $('#error-messages').text('Ocorreu um erro ao registrar. Tente novamente.').show();
                }
            }
        });
    });
});