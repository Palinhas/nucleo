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

            swal({
                type: 'error',
                title: 'Oops...',
                text: 'Preencha todos os campos!!!!',
                timer: 3000,
            })


            var erro = true;

        } else if ((senha.length) < 8) {

            swal({
                type: 'error',
                title: 'Oops...',
                text: 'A Passwords têm de ter no minimo 8 caracteres!!!!',
            })

            var erro = true;

        } else if (!(senha).match(senhac)) {

            swal({
                type: 'error',
                title: 'Oops...',
                text: 'As Passwords não coincidem!!!!',
                timer: 3000,
            })

            var erro = true;
        }
        	if (!erro){
            $.ajax({
                url: 'trata.php',
                type: 'POST',
                data: {nome: nome, email: email, senha: senha, socio: socio, acao: 'registar'},
                success: function(retorno){

                    if (retorno.nsocioe == true){

                        swal({
                            type: 'error',
                            title: 'Oops...',
                            text: 'Número de sócio não existe na base de dádos!!!! Se for um erro, por favor contacta-nos.',
                            timer: 6000,
						})

                    }else if (retorno.nomee == true){

                        swal({
                            type: 'error',
                            title: 'Oops...',
                            text: 'O Nome de sócio não coincide com o número de sócio!!!!',
                            timer: 3000,
						})

                    }else if (retorno.emaile == true){

                        swal({
                            type: 'error',
                            title: 'Oops...',
                            text: 'O e-mail que está a tentar registar já está registado!!!!',
                            timer: 3000,
                        })

                    }else if (retorno.socioue == true){
                        swal({
                            type: 'error',
                            title: 'Oops...',
                            text: 'O número de sócio que está a tentar registar já está registado, alguma dúvida contacte-nos !!!!',
                            timer: 6000,
                        })

                    }else if (retorno.registo == true){

                            $('#nome').val('');
                            $("#email").val('');
                            $("#senha").val('');
                            $("#senhac").val('');
                            $("#socio").val('');

                        swal({
                            title: 'Registo efetuado com sucesso!',
                            type: 'success',
                            showConfirmButton: false,
                            timer: 3000
                    })
                        setTimeout(function() {
                            window.location.href = "login.php";
                        }, 3000);
                    }

                },
                error: function(data){
                    console.log(data);

                }
            });

        }
                // console.log("nome : " + nome);
                // console.log("email : " + email);
                // console.log("senha : " + senha);
                // console.log("senhac : " + senhac);
                // console.log("socio : " + socio);
                // console.log("erro: " + erro);
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

    /*  PEDIDO DE CONSULTAR SOCIO PARA EDITAR   */

    $("#editSocio").click(function(e){ // e - evento do coolback
        e.preventDefault();

        var id = $(this).attr('socio-id');
        console.log(id);

        $('#ModalEditarSocio').modal('show');

        $.ajax({
                url: 'trata.php',
                type: 'POST',
                data: {id: id, acao: 'consultarSocio'},
                success: function(retorno){

                    // console.log("ocupacao : " + retorno.ocupacao);

                    var ocupacao = retorno.ocupacao;
                    var socio_scp = retorno.socio_scp;
                    var tipo_scp = retorno.tipo_scp;
                    var contacto = retorno.contacto;
                    var habilitacoes = retorno.habilitacoes;
                    var morada = retorno.morada;
                    var cp = retorno.cp;
                    var localidade = retorno.localidade;
                    var pais = retorno.pais;
                    var nacionalidade = retorno.nacionalidade;

                    $("#mostraOcupacaao").text(ocupacao);
                    $("#ocupacaoM").val(ocupacao);

                    $("#mostraSoScp").text(socio_scp);
                    $("#socio_scpM").val(socio_scp);

                    $("#mostraTipoSocio").text(tipo_scp);
                    $("#tipo_scpM").val(tipo_scp);

                    $("#mostraContacto").text(contacto);
                    $("#contactoM").val(contacto);

                    $("#mostraHabilitacoes").text(habilitacoes);
                    $("#habilitacoesM").val(habilitacoes);

                    $("#mostraMorada").text(morada);
                    $("#moradaM").val(morada);

                    $("#mostraCp").text(cp);
                    $("#cpM").val(cp);

                    $("#mostraLocalidade").text(localidade);
                    $("#localidadeM").val(localidade);

                    $("#mostraPais").text(pais);
                    $("#paisM").val(pais);

                    $("#mostraNacionalidade").text(nacionalidade);
                    $("#nacionalidadeM").val(nacionalidade);

                },
                error: function(data){
                    console.log(data);

                }
            });

    });


    /*  *********************************   */

    /*  PEDIDO DE CONSULTAR SOCIO PARA EDITAR   */

    $("#btnEditSocio").click(function(e){ // e - evento do coolback
        e.preventDefault();

        var id = $(this).attr('socios-id');

        var erro = false;

        var ocupacao = $("#ocupacaoM").val();
        var socio_scp = $("#socio_scpM").val();
        var tipo_scp = $("#tipo_scpM").val();
        var contacto = $("#contactoM").val();
        var habilitacoes = $("#habilitacoesM").val();
        var morada = $("#moradaM").val();
        var cp = $("#cpM").val();
        var localidade = $("#localidadeM").val();
        var pais = $("#paisM").val();
        var nacionalidade = $("#nacionalidadeM").val();

        console.log("IdModal " + id);
        console.log("OcupacaoM " + ocupacao);
        console.log("socio_scpM " + socio_scp);
        console.log("tipo_scpM " + tipo_scp);
        console.log("contactoM " + contacto);
        console.log("habilitacoes " + habilitacoes);
        console.log("moradaM " + morada);
        console.log("cpM " + cp);
        console.log("localidadeM " + localidade);
        console.log("paisM " + pais);
        console.log("nacionalidadeM " + nacionalidade);

        if (ocupacao == '' || socio_scp == '' || tipo_scp == '' || contacto == '' || habilitacoes == '' ||
            morada == '' || cp == '' || localidade == '' || pais == '' || nacionalidade == '') {

            swal({
                type: 'error',
                title: 'Oops...',
                text: 'Não é permitido campos vazios!!!!',
                timer: 3000,
            })

            var erro = true;

        }else if (!erro) {
            $.ajax({
                url: 'trata.php',
                type: 'POST',
                data: {id: id, ocupacao: ocupacao, socio_scp: socio_scp, tipo_scp: tipo_scp, contacto: contacto, habilitacoes: habilitacoes, morada: morada, cp: cp, localidade: localidade, pais: pais, nacionalidade: nacionalidade, acao: 'editarSocio'},
                success: function(retorno){

                    // console.log("Retorno.erro " + retorno.erro);
                    // console.log("Retorno.editou " + retorno.editou);

                    if (retorno.editou == false){

                        swal({
                            type: 'error',
                            title: 'Oops...',
                            text: 'Algo correu mal!!!! Os teus dados de sócio não foram editados.',
                            timer: 6000,
                        })

                    }else if (retorno.editou == true){

                        swal({
                            title: 'Dados esitados com sucesso!',
                            type: 'success',
                            showConfirmButton: false,
                            timer: 3000
                        })
                        setTimeout(function() {

                            $('#ModalEditarSocio').modal('hide');
                            $("#mostraOcupacaao").text(retorno.ocupacaoR);
                            $("#mostraSoScp").text(retorno.socio_scpR);
                            $("#mostraTipoSocio").text(retorno.tipo_scpR);
                            $("#mostraHabilitacoes").text(retorno.habilitacoesR);
                            $("#mostraContacto").text(retorno.contactoR);
                            $("#mostraMorada").text(retorno.moradaR);
                            $("#mostraCp").text(retorno.cpR);
                            $("#mostraLocalidade").text(retorno.localidadeR);
                            $("#mostraPais").text(retorno.paisR);
                            $("#mostraNacionalidade").text(retorno.nacionalidadeR);

                    }, 2000);
                    }

                },
                error: function(data){
                    console.log(data);

                }
            });
        }else{
            swal({
                type: 'error',
                title: 'Oops...',
                text: 'Algo correu mal!!!! Erro de sintaxe.',
                timer: 6000,
            })
        }
    });


    /*  *********************************   */

    /*  PEDIDO DE CONSULTAR SOCIO PARA EDITAR   */

    $("#btnLogin").click(function(e){ // e - evento do coolback
        e.preventDefault();

        var erro = false;

        var email = $("#email").val();
        var senha = $("#senha").val();

        console.log("email " + email);
        console.log("senha " + senha);

        if (email == '' || senha == '' ) {

            swal({
                type: 'error',
                title: 'Oops...',
                text: 'Não é permitido campos vazios!!!!',
                timer: 3000,
            })

            var erro = true;

        }else if (!erro) {
            $.ajax({
                url: 'trata.php',
                type: 'POST',
                data: {email: email, senha: senha, acao: 'login'},
                success: function(retorno){

                     console.log("Retorno.erro " + retorno.erro);
                     console.log("Retorno.login " + retorno.login);
                     console.log("Retorno.login " + retorno.nomer);

                     var idr = retorno.idr;
                     var nomer = retorno.nomer;

                    if (retorno.login == false){

                        swal({
                            type: 'error',
                            title: 'Oops...',
                            text: 'Algo correu mal!!!! Os teus dados de login não estão corretos.',
                            timer: 6000,
                        })
                    }else if (retorno.login == true){
                        swal({
                            title: 'Login efetuado com sucesso!',
                            type: 'success',
                            showConfirmButton: false,
                            timer: 3000
                        })


                        setTimeout(function() {
                            //window.location = "informacao-pessoal.php?idr=" + idr ? idr= + idr;
                            document.cookie = "idr=" + idr ; "expires=Thu, 18 Dec 2013 12:00:00 UTC ;path=/";
                            document.cookie = "nomer=" + nomer ; "expires=Thu, 18 Dec 2013 12:00:00 UTC ;path=/";
                            // document.cookie = "idr=" + idr ;
                            // document.cookie = "nomer=" + nomer ;
                            window.location = "informacao-pessoal.php";
                        }, 1000);
                    }
                },
                error: function(data){
                    console.log(data);

                }
            });
        }else{
            swal({
                type: 'error',
                title: 'Oops...',
                text: 'Pedido não efetuado!!!! Erro de sintaxe.',
                timer: 6000,
            })
        }
    });


    /*  *********************************   */

});