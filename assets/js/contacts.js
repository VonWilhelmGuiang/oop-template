$(document).ready(function(){
    

    // functions here
    function createSelectOptions(opt){
        let options = '';
        let counter = 1
        
        if(Number.isInteger(opt)){
            while(opt >= counter){
                options+= `<option value="${counter}"> ${counter} </option>`;
                counter++;
            }
        }
        else if(Array.isArray(opt)){
            options = opt.map( 
                (option)=> `<option value="${option}"> ${option} </option>`
            )
        }
        return options;
    }

    function getContacts(rows_per_page, page){
        getEnv().then((env) => {
            //send request to server
            $.ajax({
                method: 'GET',
                url: app_url+env.api.all_contacts+'/'+rows_per_page+'/'+page,
                async: false,
                data: { },
                dataType: 'json',
                beforeSend: ()=>{},
                success: (response)=>{
                    const contacts = response.contacts;

                    //show contacts table
                    const contactsTable = contacts.map(
                        (contact) => 
                            `<tr class="contact-details">
                                <td data-contact-id  ="${contact.contact_id}"> ${contact.contact_id}</td>
                                <td data-first-name  ="${contact.first_name}"> ${contact.first_name} </td>
                                <td data-last-name   ="${contact.last_name}"> ${contact.last_name} </td>
                                <td data-middle-name ="${contact.middle_name}"> ${contact.middle_name} </td>
                                <td data-email       ="${contact.email}"> ${contact.email} </td>
                                <td data-company     ="${contact.company}"> ${contact.company} </td>
                                <td data-phone       ="${contact.phone}"> ${contact.phone} </td>
                            </tr>`
                    );
                    $('.contacts-list').children('tbody').html(()=>contactsTable)
                    $('.contacts-list').fadeIn("slow")
                },
                error: ()=>{
                    alert('An Error Has Occured Listing Contacts');
                }
            })
        });
    }

    function getPageCount(){
        getEnv().then((env) => {
            $.ajax({
                method: 'GET',
                url: app_url+env.api.number_of_pages,
                data:{},
                dataType:'json',
                beforeSend: ()=>{},
                success:(response)=>{
                    const max_page = response.page_count;
                    
                    if(max_page){
                        const format_page_nums =createSelectOptions(max_page);
                        const format_rows_per_page= createSelectOptions([10,20,30,40,50]);
                        $('#rows-per-page').html(format_rows_per_page);
                        $('#page').html(format_page_nums);
                        $('#rows-per-page option:eq(0) , #page option:eq(0)').prop('selected',true);
                        getContacts($('#rows-per-page').val(),$('#page').val()) //get contacts
                    }
                },
                error:()=>{
                    alert('An Error Has Occured Setting Up Contact List');
                }
            })
        });
    }


    // contact list
        getPageCount();
        $(document).on('change','#rows-per-page, #page',function(){
            getContacts($('#rows-per-page').val(),$('#page').val());
        })
        

    // saving contacts
    $(document).on('submit','#add-contact',function(e){
        e.preventDefault();
        const formdata = new FormData($(this)[0])
        for (const [key, value] of formdata) {
             console.log(key,value);
        }
        
        getEnv().then((env) => {
            $.ajax({
                method: 'POST',
                url: app_url+env.api.save_contact,
                data: formdata,
                dataType:'json',
                contentType: false,
                processData:false,
                beforeSend: ()=>{},
                success:(response)=>{
                    console.log(response)
                    getPageCount();//refresh page count and contacts
                },
                error:()=>{
                    alert('An Error Has Occured Saving Contact');
                }
            })
        })
    })

    // editing contacts
    $(document).on('click','.contact-details',function(){
        const contact_objects = $(this).children('td').map((index,element)=> $(element).data());
        var contact_details = Object.assign({}, ...contact_objects );
        $('#contact-id-update').val( contact_details.contactId );
        $('#first-name-update').val( contact_details.firstName );
        $('#last-name-update').val( contact_details.lastName );
        $('#middle-name-update').val( contact_details.middleName );
        $('#email-update').val( contact_details.email );
        $('#company-update').val( contact_details.company );
        $('#phone-update').val( contact_details.phone );
    })

    $(document).on('submit','#update-contact',function(e){
        e.preventDefault();
        const formdata = new FormData($(this)[0])
        getEnv().then((env)=>{
            $.ajax({
                method:'POST',
                url:app_url+env.api.update_contact,
                data: formdata,
                dataType:'json',
                contentType: false,
                processData:false,
                beforeSend: ()=>{},
                success:(response)=>{
                    console.log(response)
                    getPageCount();//refresh page count and contacts
                },
                error:()=>{}
            })
        })
    })

})