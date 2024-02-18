
function sendEmail(){
    Email.send({
        Host : "smtp.gmail.com",
        Username : "jpcslengman@gmail.com",
        Password : "46386057",
        To : 'jp.chagasslengman@gmail.com',
        From : document.getElementById("email").value,
        Subject : "This is the subject",
        Body : "And this is the body"
    }).then(
      message => alert(message)
    );    
}