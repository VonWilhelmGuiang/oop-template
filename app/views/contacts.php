<?php 
    session_start(); 
    if(!$_SESSION['user_logged_in']){
        header("Location: login");
    }
    include __DIR__.'/includes/header.php';
    include __DIR__.'/includes/nav.php';
?>

<table class="contacts-list" style="display:none">
    <thead>
        <tr>
            <th>Contact ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Middle Name</th>
            <th>Email Address</th>
            <th>Company</th>
            <th>Phone Number</th>
        </tr>
    </thead>
    <tbody></tbody>
    <tfoot>
        <tr>
            <td colspan=7>
                
                <label for='page'>Page</label>
                <select id='page'>
                    
                </select>

                <label for='rows-per-page'>Rows per Page</label>
                <select id='rows-per-page'></select>
            </td>
        </tr>
    </tfoot>
</table>


<form id="add-contact">
    <label for="first-name" >First Name</label>
    <input type="text" name="first_name" id="first-name"/>

    <label for="last-name">Last Name</label>
    <input type="text" name="last_name" id="last-name"/>

    <label for="middle-name">Middle Name</label>
    <input type="text" name="middle_name" id="middle-name"/>

    <label for="company">Company</label>
    <input type="text" name="company" id="company"/>

    <label for="phone">Phone</label>
    <input type="text" name="phone" id="phone"/>

    <label for="email">Email</label>
    <input type="text" name="email" id="email"/>

    <button type="submit">Submit</button>
</form>


UPDATE


<form id="update-contact">
    <label for="contact-id-update" >Contact ID</label>
    <input type="text" name="contact_id" id="contact-id-update" readonly/>

    <label for="first-name-update" >First Name</label>
    <input type="text" name="first_name" id="first-name-update"/>

    <label for="last-name-update">Last Name</label>
    <input type="text" name="last_name" id="last-name-update"/>

    <label for="middle-name-update">Middle Name</label>
    <input type="text" name="middle_name" id="middle-name-update"/>

    <label for="company-update">Company</label>
    <input type="text" name="company" id="company-update"/>

    <label for="phone-update">Phone</label>
    <input type="text" name="phone" id="phone-update"/>

    <label for="email-update">Email</label>
    <input type="text" name="email" id="email-update"/>

    <button type="submit">Submit</button>
</form>
<?php 
    include __DIR__.'/includes/footer.php';
    includeJSFiles(['contacts.js']);
?>