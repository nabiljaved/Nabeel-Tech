const u_form = document.getElementById('form')
const alert = document.getElementById('alert')
const newsForm = document.getElementById('newsletter')



class Email {
    constructor(name, email, subject, message) {
      this.name = name;
      this.email = email;
      this.message = message;
      this.subject = subject;
    }
  }

class UI{
    static displayMessage(message, className){
        alert.className = `alert alert-${className}`;
        alert.appendChild(document.createTextNode(message));
        setTimeout(() => document.querySelector('.alert').remove(), 6000);  
    }

    static clearFields(){
       
        var email = document.getElementById('email').value = ''
        var subject = document.getElementById('subject').value = ''
        var message = document.getElementById('message').value = ''
        var name = document.getElementById('name').value = ''
    }
    
}



u_form.addEventListener('submit', 
        function sendEmail(e){
            e.preventDefault()

            var email = document.getElementById('email').value
            var subject = document.getElementById('subject').value
            var message = document.getElementById('message').value
            var name = document.getElementById('name').value
            var loading = document.getElementById('loader')    

            loading.style.display = 'block'

            if(name === '' || email === '' || subject === ''  || message === '') {
                UI.displayMessage('Please fill in all fields', 'danger');
                UI.clearFields()
                loading.style.display = 'none'
                return
              } else {

                const obj = new Email(name, email, subject, message);

                fetch('https://apinodemailer.herokuapp.com/mail-route', {
                method: 'post',
                headers: {
                        'Accept': 'application/json, text/plain, */*',
                        'Content-Type': 'application/json'
                },
                body: JSON.stringify(obj)
                }).then(res => res.json())
                .then(res => {
                    if(res.error == 'false'){
                        UI.displayMessage('Email Has been Sent', 'success');
                        loading.style.display = 'none'
                        UI.clearFields()   
                    }
                })
                .catch(error => {
                    if(error.error == 'true'){
                        UI.displayMessage('Please Try Again', 'danger');
                        UI.clearFields()   
                    }
                })

                
                
            }
        }
)

newsForm.addEventListener('submit', function(e){
        e.preventDefault()
        newsForm['email'].value = ''
        const timer = document.getElementById('sentletter')
        timer.style.display = 'block'
        setTimeout(() => location.reload(), 3000); 
                   
})

