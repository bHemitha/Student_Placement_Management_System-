let accept_buttons = document.getElementsByName('accept');

for (let i = 0; i < accept_buttons.length; i++) 
{
    accept_buttons[i].addEventListener('click',function(ev){
        let form=ev.target.parentElement;
        form.action = "application_accept.php"; 
    })
}

let reject_buttons = document.getElementsByName('reject');

for (let i = 0; i < accept_buttons.length; i++) 
{
    reject_buttons[i].addEventListener('click',function(ev){
        let form=ev.target.parentElement;
        form.action = "application_reject.php"; 
    })
}