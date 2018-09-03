$(document).ready(function(){

/*  PEDIDO DE REGISTO DE USUARIO   */

	$("#btnRegistar").click(function(e){ // e - evento do coolback
		e.preventDefault();

	var erro = false;

		var nome = $('#nome').val();
		var email = $("#email").val();
		var emailc = $("#emailc").val();
		var senha = $("#senha").val();
		var senhac = $("#senhac").val();
		var socio = $("#socio").val();

		var validEmail = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/
		var myMatchEmail = email.search(validEmail); // Pesquisa do caractere invalido
        var validSocio = /^[0-9]/g;
        var myMatchSocio = socio.search(validSocio); // Pesquisa do caractere invalido

		var contaLetras = $("#senha").val().length; // conta as Letras da password

        if (nome == '') {

            $("#mensagemRegisto").html('<div class="alert alert-danger"><button type="button" class="close">×</button><b>Obrigatório o Nome Completo</b></div>');
		     window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();
            });
        	}, 5000);

      		$('.alert .close').on("click", function(e){
            $(this).parent().fadeTo(500, 0).slideUp(500);
         	});

            erro = true;
		// console.log("Nome RegValidar: " + RegValidar);

        }else if(socio == ''){


		 	$("#mensagemRegisto").html('<div class="alert alert-danger"><button type="button" class="close">×</button><b>O Campo sócio não pode estar vazio</b></div>');
		     window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();
            });
        	}, 5000);

      		$('.alert .close').on("click", function(e){
            $(this).parent().fadeTo(500, 0).slideUp(500);
         	});

//			$("#socio").val('');
             erro = true;
			// console.log("Socio RegValidar: " + RegValidar);

        }else if(myMatchSocio == -1){


            $("#mensagemRegisto").html('<div class="alert alert-danger"><button type="button" class="close">×</button><b>O Campo sócio não pode conter letras</b></div>');
            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                    $(this).remove();
                });
            }, 5000);

            $('.alert .close').on("click", function(e){
                $(this).parent().fadeTo(500, 0).slideUp(500);
            });

            erro = true;
            // console.log("Socio RegValidar: " + RegValidar);
            // console.log("Socio RegValidar: " + RegValidar);
            // console.log("validSocio: " + myMatchSocio);

		}else if(email == ''){

		 $("#mensagemRegisto").html('<div class="alert alert-danger"><button type="button" class="close">×</button><b>O Campo Email não pode estar vazio</b></div>');
		     window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();
            });
        	}, 5000);

      		$('.alert .close').on("click", function(e){
            $(this).parent().fadeTo(500, 0).slideUp(500);
         	});

           erro = true;
            // console.log("Socio RegValidar: " + RegValidar);

	}else if(email !== emailc){

		 $("#mensagemRegisto").html('<div class="alert alert-danger"><button type="button" class="close">×</button><b>A confirmação de E-mail Falhou</b></div>');
		     window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();
            });
        	}, 5000);

      		$('.alert .close').on("click", function(e){
            $(this).parent().fadeTo(500, 0).slideUp(500);
         	});

            erro = true;
            // console.log("Socio RegValidar: " + RegValidar);

        }else if(myMatchEmail == -1){

		 $("#mensagemRegisto").html('<div class="alert alert-danger"><button type="button" class="close">×</button><b>Introduza um E-mail válido!</b></div>');
		     window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();
            });
        	}, 5000);

      		$('.alert .close').on("click", function(e){
            $(this).parent().fadeTo(500, 0).slideUp(500);
         	});

//			$("#email").val('');
            erro = true;
            // console.log("Socio RegValidar: " + RegValidar);
            //     console.log(myMatchEmail);

	}else if(senha == ''){

		 $("#mensagemRegisto").html('<div class="alert alert-danger"><button type="button" class="close">×</button><b>O Campo da Password não pode estar vazio</b></div>');
		     window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();
            });
        	}, 5000);

      		$('.alert .close').on("click", function(e){
            $(this).parent().fadeTo(500, 0).slideUp(500);
         	});

            erro = true;
            // console.log("Socio RegValidar: " + RegValidar);

	}else if(senha !== senhac ){

		 $("#mensagemRegisto").html('<div class="alert alert-danger"><button type="button" class="close">×</button><b>A confirmação da Password Falhou!</b></div>');
		     window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();
            });
        	}, 5000);

      		$('.alert .close').on("click", function(e){
            $(this).parent().fadeTo(500, 0).slideUp(500);
         	});

      		erro = true;
            // console.log("Socio RegValidar: " + RegValidar);

	}else if(contaLetras < 6 ) {

            $("#mensagemRegisto").html('<div class="alert alert-danger"><button type="button" class="close">×</button><b>A password têm de conter no minimo 6 letras!</b></div>');
            window.setTimeout(function () {
                $(".alert").fadeTo(500, 0).slideUp(500, function () {
                    $(this).remove();
                });
            }, 5000);

            $('.alert .close').on("click", function (e) {
                $(this).parent().fadeTo(500, 0).slideUp(500);
            });

            erro = true;
            // console.log("Socio RegValidar: " + RegValidar);
        }

            $.ajax({
                url: 'trata.php',
                type: 'POST',
                data: {socio: socio, nome: nome, acao: 'compara'},
                success: function(retorno){
                    var nomec = retorno.nomec;
                    $("#mensagem").text(nomec);
                    // console.log("Nomec: " + retorno.nomec);
                    // console.log("Moradac: " + retorno.moradac);

                    if(nome !== nomec){


                        $("#nomev").html('<div class="text text-danger"><small><b>Nome inválido</b></small></div>');

                        window.setTimeout(function() {
                            $(".text").fadeTo(500, 0).slideUp(500, function(){
                                $(this).remove();
                            });
                        }, 5000);

                        $('.text .close').on("click", function(e){
                            $(this).parent().fadeTo(500, 0).slideUp(500);
                        });

                        erro = false;
                        console.log("ajax erro: " + erro);

                    }else if (nome == nomec){

                        erro = true;
                        console.log("ajax erro: " + erro);

                        $("#nomev").html('<div class="text text-success"><small><b>Nome Correto</b></small></div>');

                        window.setTimeout(function() {
                            $(".text").fadeTo(500, 0).slideUp(500, function(){
                                $(this).remove();
                            });
                        }, 5000);

                        $('.text .close').on("click", function(e){
                            $(this).parent().fadeTo(500, 0).slideUp(500);
                        });

return erro;
					}


                },
                error: function(data){
                    console.log(data);


                },

            });

            if(!erro){
                $.ajax({
                    url: 'trata.php',
                    type: 'POST',
                    data: {nome: nome, email: email, senha: senha, socio: socio, acao: 'registar'},
                    success: function(retorno){

                        $("#mensagemRegisto").html('<div class="alert alert-success"><button type="button" class="close">×</button><b>Regista efetuado !</b></div>');
                        window.setTimeout(function() {
                            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                                $(this).remove();
                            });
                        }, 5000);

                        $('.alert .close').on("click", function(e){
                            $(this).parent().fadeTo(500, 0).slideUp(500);
                        });

                    },
                    error: function(data){
                        console.log(data);
                        $("#mensagemRegisto").html('<div class="alert alert-danger"><button type="button" class="close">×</button><b>Erro ao efetuar o registo!</b></div>');
                        window.setTimeout(function() {
                            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                                $(this).remove();
                            });
                        }, 5000);

                        $('.alert .close').on("click", function(e){
                            $(this).parent().fadeTo(500, 0).slideUp(500);
                        });
                    },

                });
            }

                console.log("nome : " + nome);
                console.log("email : " + email);
                console.log("emailc : " + emailc);
                console.log("senha : " + senha);
                console.log("senhac : " + senhac);
                console.log("socio : " + socio);
                console.log("myMatchEmail : " + myMatchEmail);
                console.log("erro: " + erro);

        		console.log("validSocio: " + myMatchSocio);


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