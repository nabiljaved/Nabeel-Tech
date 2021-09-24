const u_form = document.getElementById('form')
const alert = document.getElementById('alert')

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
        setTimeout(() => document.querySelector('.alert').remove(), 4000);  
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

            if(name === '' || email === '' || subject === ''  || message === '') {
                UI.displayMessage('Please fill in all fields', 'danger');
                UI.clearFields()
              } else {
                
                const obj = new Email(name, email, message, subject);
                console.log(obj)
                UI.displayMessage('Email Has been Sent', 'success');
                UI.clearFields()
    
            }


        }
)

