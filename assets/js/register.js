$(document).ready(function(){
    $(document).on('submit','#registration-form',function(e){
        e.preventDefault();
        const formdata = new FormData($(this)[0]);
        getEnv().then((env)=>{
            $.ajax({
                method:"POST",
                url: app_url+env.api.register,
                data: formdata,
                dataType: 'json',
                processData:false,
                contentType:false,
                cache:false,
                beforeSend:()=>{console.log('beforesend')},
                success:(response)=>{console.log(response)},
                error:()=>{console.log('error')}
            })
        })
    })
})