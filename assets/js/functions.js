async function getEnv() {
    const res = await fetch(js_level_dir+"assets/js/env.json")
    const obj = await res.json();
    return obj
}

// logout user
$(document).on('click','#logout-user',function(){
    getEnv().then((env)=>{
        $.ajax({
            method: "GET",
            url:app_url+env.api.logout,
            success:((response)=>{
                console.log(response);
            }),
            error:((error)=>{
                console.log(error)
            })
        })
    })
})