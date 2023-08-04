window.addEventListener('load', () => { 
    let botonValida = document.getElementById("btnValida");
    botonValida.addEventListener('click', () => {

					let idEvolMed2 = document.getElementsByName('nun_documento')[0].value
					let data = new FormData()
					data.append("nun_documento",idEvolMed2);
					let valuesDatE = [...data.entries()];
					console.log(valuesDatE);	
                    const anulaReg = async () => {
                            await axios.post("{{URL::to('/validaDocumentoBsco')}}",data,{

                            }).then((response) => {

                                 console.log(response.data)
                                // if(response.data['message'] == "Success"){  
                                    if (response.data){
                                        console.log(response.data)
                                }    
							}).catch(function(error) {
								Swal.fire({
									icon: 'error',
									title: 'Error interno',
									text: 'Por favor reinicie la apliación, si el problema continua comuniquese con su asesor' +
										'  ' + error,
									footer: ''
								})
							// console.log(error);
						})
					}
					anulaReg();
                })
            })