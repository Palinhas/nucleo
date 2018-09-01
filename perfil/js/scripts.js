$(document).ready(function(){

/*  PEDIDO DE REGISTO DE USUARIO   */

	$("#btnRegistar").click(function(e){ // e - evento do coolback
		e.preventDefault();
                
	var RegValidar = true;	
        
		var nome = $('#nome').val();
		var email = $("#email").val();
		var emailc = $("#emailc").val();
		var senha = $("#senha").val();
		var senhac = $("#senhac").val();
		var socio = $("#socio").val();
                
		var validEmail = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/
		var myMatchEmail = email.search(validEmail); // Pesquisa do caractere invalido
                
		var contaLetras = $("#senha").val().length; // conta as Letras da password
                
        var ver_nome;
        var ver_socio;    

        if (nome == '') {
            bootstrapValidate('#nome', 'min:10:Minimo 10 Caracteres!')
            bootstrapValidate('#nome', 'required:<b>Campo Obrigatório!</b>')
            $("#mensagemRegisto").html('<div class="alert alert-danger"><button type="button" class="close">×</button><b>O Campo Nome não pode estar vazio</b></div>');
		     window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();
            });
        	}, 5000);

      		$('.alert .close').on("click", function(e){
            $(this).parent().fadeTo(500, 0).slideUp(500);
         	});
			
//			$("#nome").val('');	
                RegValidar = false;
		console.log("Nome RegValidar: " + RegValidar);	
   
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
                RegValidar = false;
		console.log("Socio RegValidar: " + RegValidar);	

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
			
//			$("#email").val('');	
                RegValidar = false;
		console.log("Socio RegValidar: " + RegValidar);	

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
			
//			$("#email").val('');	
                RegValidar = false;
		console.log("Email Carateres RegValidar: " + RegValidar);	
        
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
                RegValidar = false;
		console.log("Email myMatchEmail: " + RegValidar);
                console.log(myMatchEmail);

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
			
//			$("#email").val('');	
                RegValidar = false;
		console.log("Email Carateres RegValidar: " + RegValidar);	

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
			
//			$("#email").val('');	
                RegValidar = false;
		console.log("Email Carateres RegValidar: " + RegValidar);	

	}else if(contaLetras < 6 ){
                    
		 $("#mensagemRegisto").html('<div class="alert alert-danger"><button type="button" class="close">×</button><b>A password têm de conter no minimo 6 letras!</b></div>');
		     window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
            });
        	}, 5000);
      		
      		$('.alert .close').on("click", function(e){
            $(this).parent().fadeTo(500, 0).slideUp(500);
         	});
			
//			$("#email").val('');	
                RegValidar = false;
		console.log("Email Carateres RegValidar: " + RegValidar);

    }else if(nome !== ''){

            $.ajax({
                url: 'trata.php',
                type: 'POST',
                data: {socio: socio, nome: nome, acao: 'compara'},
                success: function(retorno){
                	var compara = retorno;
                    $("#mensagem").text(compara);

					if (nome == compara){

                        $("#nomev").html('<div class="text text-success"><small><b>Nome Válido</b></small></div>');

                        window.setTimeout(function() {
                            $(".text").fadeTo(500, 0).slideUp(500, function(){
                                $(this).remove();
                            });
                        }, 5000);

                        $('.text .close').on("click", function(e){
                            $(this).parent().fadeTo(500, 0).slideUp(500);
                        });

                        RegValidar = true;

					}else if(nome !== compara){


                        $("#nomev").html('<div class="text text-danger"><small><b>Nome inválido</b></small></div>');

                        window.setTimeout(function() {
                            $(".text").fadeTo(500, 0).slideUp(500, function(){
                                $(this).remove();
                            });
                        }, 5000);

                        $('.text .close').on("click", function(e){
                            $(this).parent().fadeTo(500, 0).slideUp(500);
                        });

                    }
                    RegValidar = false;
                },
                error: function(data){
                    console.log(data);

                }

            });
            console.log(RegValidar);
        }
        
                console.log("nome : " + nome);
                console.log("email : " + email);
                console.log("emailc : " + emailc);
                console.log("senha : " + senha);
                console.log("senhac : " + senhac);
                console.log("socio : " + socio);
                console.log("myMatchEmail : " + myMatchEmail);
                console.log(RegValidar);
                
                 
		return false;
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