window.addEventListener('load', () => {
	formularioDbasic.addEventListener('submit', (e) => {
			e.preventDefault(); // EVITA QUE SE RECARGUE LA PAGINA
            
            console.log(myToken.csrfToken);
            document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            //window.axios = require('axios');

            // window.axios.defaults.headers.common = {
            //     'X-Requested-With': 'XMLHttpRequest',
            //     'X-CSRF-TOKEN' : document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            // };

    axios.post("{{URL::to('/insert-cliente-basicos')}}",{
        headers:{
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN' : myToken.csrfToken,            
        },
        nombre: nombre,
        apellidos: apellidos,
        num_documento: num_documento,								        
    }).then(function(response){
        console.log(response)
    }).catch(function (error){
        // if(error.response.data.errors.name){
                alert('Error')
            //$('#error').text(error.response.data.errors.name[0]);
        // }
    });
})
})