$(document).ready(function(){

/*  PEDIDO DE REGISTO DE USUARIO   */

	$("#btnRegistar").click(function(e){ // e - evento do coolback
		e.preventDefault();

	var erro = false;

		var nome = $('#nome').val();
		var email = $("#email").val();
		var senha = $("#senha").val();
		var senhac = $("#senhac").val();
		var socio = $("#socio").val();

        if (nome == '' || email == '' || senha == '' || senhac == '' || socio == '') {

        	$("#mensagemRegisto").html('<div class="alert alert-danger"><button type="button" class="close">×</button><b>Preencha todos os campos!!!!</b></div>');
            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                    $(this).remove();
                });
            }, 5000);

            $('.alert .close').on("click", function(e){
                $(this).parent().fadeTo(500, 0).slideUp(500);
            });

            var erro = true;

        } else if ((senha.length) < 8) {

            $("#mensagemRegisto").html('<div class="alert alert-danger"><button type="button" class="close">×</button><b>A Passwords têm de ter no minimo 8 caracteres!!!!</b></div>');
            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                    $(this).remove();
                });
            }, 5000);

            $('.alert .close').on("click", function(e){
                $(this).parent().fadeTo(500, 0).slideUp(500);
            });

            var erro = true;

        } else if (!(senha).match(senhac)) {

            $("#mensagemRegisto").html('<div class="alert alert-danger"><button type="button" class="close">×</button><b>As Passwords não coincidem!!!!</b></div>');
            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                    $(this).remove();
                });
            }, 5000);

            $('.alert .close').on("click", function(e){
                $(this).parent().fadeTo(500, 0).slideUp(500);
            });

            var erro = true;
        }
        	if (!erro){
            $.ajax({
                url: 'trata.php',
                type: 'POST',
                data: {nome: nome, email: email, senha: senha, socio: socio, acao: 'registar'},
                success: function(retorno){
                    $("#teste").text(retorno.registo);

                    if (retorno.nsocioe == true){
                        $("#mensagemRegisto").html('<div class="alert alert-danger"><button type="button" class="close">×</button>' +
                            '<p><b>Número de sócio não existe na base de dádos!!!! Por favor, consulte o administrador se realmente este for o seu número de sócio.</b></p>' +
                            '</div>');
                        window.setTimeout(function() {
                            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                                $(this).remove();
                            });
                        }, 5000);

                        $('.alert .close').on("click", function(e){
                            $(this).parent().fadeTo(500, 0).slideUp(500);
                        });

                    }else if (retorno.nomee == true){
                        $("#mensagemRegisto").html('<div class="alert alert-danger"><button type="button" class="close">×</button>' +
                            '<p><b>O Nome de sócio não coincide com o número de sócio!!!!</b></p>' +
                            '</div>');
                        window.setTimeout(function() {
                            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                                $(this).remove();
                            });
                        }, 5000);

                        $('.alert .close').on("click", function(e){
                            $(this).parent().fadeTo(500, 0).slideUp(500);
                        });

                    }else if (retorno.emaile == true){
                        $("#mensagemRegisto").html('<div class="alert alert-danger"><button type="button" class="close">×</button>' +
                            '<p><b>O e-mail que está a tentar registar já está registado!!!!</b></p>' +
                            '</div>');
                        window.setTimeout(function() {
                            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                                $(this).remove();
                            });
                        }, 5000);

                        $('.alert .close').on("click", function(e){
                            $(this).parent().fadeTo(500, 0).slideUp(500);
                        });

                    }else if (retorno.socioue == true){
                        $("#mensagemRegisto").html('<div class="alert alert-danger"><button type="button" class="close">×</button>' +
                            '<p><b>O número de sócio que está a tentar registar já está registado!!!!</b></p>' +
                            '</div>');
                        window.setTimeout(function() {
                            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                                $(this).remove();
                            });
                        }, 5000);

                        $('.alert .close').on("click", function(e){
                            $(this).parent().fadeTo(500, 0).slideUp(500);
                        });

                    }else if (retorno.registo == true){

                        document.location.href = "login.php";
                        $("#mensagemLogin").html('<div class="alert alert-success"><button type="button" class="close">×</button>' +
                            '<p><b>Registo efetuado com sucesso!!!!</b></p>' +
                            '</div>');
                        window.setTimeout(function() {
                            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                                $(this).remove();
                            });
                        }, 5000);

                        $('.alert .close').on("click", function(e){
                            $(this).parent().fadeTo(500, 0).slideUp(500);
                        });
                    }

                },
                error: function(data){
                    console.log(data);

                }
            });

        }

                console.log("nome : " + nome);
                console.log("email : " + email);

                console.log("senha : " + senha);
                console.log("senhac : " + senhac);
                console.log("socio : " + socio);

                console.log("erro: " + erro);




	});



/*  *********************************   */
	
/*  PEDIDO DE UPDATE DE EMAIL   */

	$("#btnSubEmail").click(function(e){ // e - evento do coolback
		e.preventDefault();

		var email = $("#email").val();
		var emailc = $("#emailc").val();
		var id = $(this).attr('data-id');
		
		var emailValidar = true;

		var validEmail = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/
		var myMatchEmail = email.search(validEmail); // Pesquisa do caractere invalido


		if(email == ''){
			
		 $("#mensagemEmail").html('<div class="alert alert-danger"><button type="button" class="close">×</button><b>O email não pode estar vazio</b></div>');
		     window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
            });
        	}, 5000);
      		
      		$('.alert .close').on("click", function(e){
            $(this).parent().fadeTo(500, 0).slideUp(500);
         	});
			
			$("#email").val('');
			$("#emailc").val('');
			emailValidar = false;
			

			}else if(email !== emailc){
			 $("#mensagemEmail").html('<div class="alert alert-danger"><button type="button" class="close">×</button><b>Confirmação de e-mail incorreta!</b></div>');
			     window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                    $(this).remove(); 
                });
            	}, 5000);
          		
          		$('.alert .close').on("click", function(e){
                $(this).parent().fadeTo(500, 0).slideUp(500);
             	});
				
				$("#email").val('');
				$("#emailc").val('');
				emailValidar = false;
					
					}else if(myMatchEmail == -1){
					$("#mensagemEmail").html('<div class="alert alert-danger"><button type="button" class="close">×</button><b>Têm de usar um email válido!</b></div>');
					     window.setTimeout(function() {
		                $(".alert").fadeTo(500, 0).slideUp(500, function(){
		                    $(this).remove(); 
		                });
		            	}, 5000);
		          		
		          		$('.alert .close').on("click", function(e){
		                $(this).parent().fadeTo(500, 0).slideUp(500);
		             	});
						
						$("#email").val('');
						$("#emailc").val('');
						emailValidar = false;

						}else if (emailValidar == true ){

							$.ajax({
								url: 'trata.php',
								type: 'post',
								data: {id: id, email: email, acao: 'updateEmail'},
								success: function(retorno){
									
									$("#mensagemEmail").html('<div class="alert alert-success"><button type="button" class="close">×</button><b>Email editado com sucesso!</b></div>');
									     window.setTimeout(function() {
						                $(".alert").fadeTo(500, 0).slideUp(500, function(){
						                    $(this).remove(); 
						                });
						            	}, 5000);
						          		
						          		$('.alert .close').on("click", function(e){
						                $(this).parent().fadeTo(500, 0).slideUp(500);
						             	});

						          	$("#mostraEmail").text(retorno);
									$("#email").val('');
									$("#emailc").val('');

									console.log(retorno);

								}, 
								error: function(data){
									console.log(data);
								}
							});
				
					}else{
						return false;
					}

		
		$('#ModalEditarEmail').modal('hide');

		// console.log("email : " + email + " | emailc : " +emailc);

		return false;
	});

/*  *********************************   */

/*  PEDIDO DE UPDATE DE PASSWORD   */
	

	$("#btnSubSenha").click(function(e){ // e - evento do coolback
		e.preventDefault();

		var senha = $("#senha").val();
		var senhac = $("#senhac").val();
		var id = $(this).attr('data-id');

		var stristr = /([?,_,^,~,.,»,«,¨,´,`,,,-,ç,<,>,(,),[,º,º,},{])/g; // caracteres invalidos
		var myMatch = senha.search(stristr); // Pesquisa do caractere invalido

		var validated = true; // condicao por defeito
		var contaLetras = $("#senha").val().length; // conta as Letras da password
			
			if (senha == ''){
		
			$("#mensagemPassword").html('<div class="alert alert-danger"><button type="button" class="close">×</button><b>A password deve de ter pelo menos 6 Caracteres</b></div>');
			    window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                    $(this).remove(); 
                });
            	}, 5000);
          		
          		$('.alert .close').on("click", function(e){
                $(this).parent().fadeTo(500, 0).slideUp(500);
             	});

				$("#senha").val('');
				$("#senhac").val('');
				validated = false;

				}else if (contaLetras < 6 ) {  // Senha minimo 6 caracteres
		
				$("#mensagemPassword").html('<div class="alert alert-danger"><button type="button" class="close">×</button><b>A password deve ter pelo menos 6 Caracteres</b></div>');
				    window.setTimeout(function() {
	                $(".alert").fadeTo(500, 0).slideUp(500, function(){
	                    $(this).remove(); 
	                });
	            	}, 5000);
	          		
	          		$('.alert .close').on("click", function(e){
	                $(this).parent().fadeTo(500, 0).slideUp(500);
	             	});

					$("#senha").val('');
					$("#senhac").val('');
					validated = false;

					}else if(senha !== senhac){
					
					$("#mensagemPassword").html('<div class="alert alert-danger"><button type="button" class="close">×</button><b>As passwords não coincidem!</b></div>');
					    window.setTimeout(function() {
		                $(".alert").fadeTo(500, 0).slideUp(500, function(){
		                    $(this).remove(); 
		                });
		            	}, 5000);
		          		
		          		$('.alert .close').on("click", function(e){
		                $(this).parent().fadeTo(500, 0).slideUp(500);
		             	});

						$("#senha").val('');
						$("#senhac").val('');
						validated = false;
								
				    		}else if(myMatch !== -1) {  // Senha proibir caracteres
								
							$("#mensagemPassword").html('<div class="alert alert-danger"><button type="button" class="close">×</button><b>Usou um caracter inválido</b></div>');
							    window.setTimeout(function() {
				                $(".alert").fadeTo(500, 0).slideUp(500, function(){
				                    $(this).remove(); 
				                });
				            	}, 5000);
				          		
				          		$('.alert .close').on("click", function(e){
				                $(this).parent().fadeTo(500, 0).slideUp(500);
				             	});

								$("#senha").val('');
								$("#senhac").val('');
								validated = false;
								
								    }else if (validated == true){
										$.ajax({
											url: 'trata.php',
											type: 'post',
											data: {id: id, senha: senha, acao: 'updateSenha'},
											success: function(retorno){
									
											$("#mensagemPassword").html('<div class="alert alert-success"><button type="button" class="close">×</button><b>Password alterada com sucesso!</b></div>');
											     window.setTimeout(function() {
								                $(".alert").fadeTo(500, 0).slideUp(500, function(){
								                    $(this).remove(); 
								                });
								            	}, 5000);
								          		
								          		$('.alert .close').on("click", function(e){
								                $(this).parent().fadeTo(500, 0).slideUp(500);
								             	});

												/*$("#mensagem").html("<h5 style='color:green;'><b>Password alterada com sucesso!</b></h5>");
												
												setTimeout(function() {
												$("#mensagem").html('');	
												}, 4000)*/

												$("#mostraSenha").text(retorno);
												$("#senha").val('');
												$("#senhac").val('');
											   	
												console.log(retorno);
												
											}, 
											error: function(data){
												/*console.log(data);*/

											}
										});
									}else{

									}	
	

	$('#ModalEditarPassword').modal('hide');

		// console.log("senha : " + senha + " | senhac : " + senhac);

		return false;
	});


	/*  *********************************   */

});