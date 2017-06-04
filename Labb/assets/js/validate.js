var button =document.getElementById('btn');
    button.addEventListener("click", validateForm);
function validateForm() 
{
    var name=document.newForm.namn.value;
    var mail=document.newForm.mail.value;
    var comments=document.newFornm.comment.value;
if ((name == "") || (mail == "") || (comment == "")) 
{
    alert("ERROR");
}
}
