$(document).ready(function(){
    $(document).on('submit','#login-form',function(e){
        e.preventDefault();
        const formdata =  new FormData($(this)[0]);
        //get env file
        getEnv().then((env) => {
            //send request to server
            $.ajax({
                method: 'POST',
                url: app_url+env.api.login,
                async: false,
                data: formdata,
                processData:false,
                contentType:false,
                cache:false,
                beforeSend: ()=>{console.log('sending')},
                success: (response)=>{
                    console.log(response);
                    // window.location.reload()
                },
                error: ()=>{}
            })
        })
    })
    
})