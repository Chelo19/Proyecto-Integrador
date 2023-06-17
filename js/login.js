import {supabase} from './client.js'

const email_input = document.getElementById('username');
const pass_input = document.getElementById('password');
document.getElementById("login").addEventListener("click", login);

async function login(){
    var email = email_input.value;
    var password = pass_input.value;
    console.log(email);
    console.log(password);
    const { data, error } = await supabase.auth.signInWithPassword({
        email: email,
        password: password
    });
    if(data.user == null){
        console.log('No inicia');
    }
    else{
        window.location.href = "http://127.0.0.1:5500/html/home.html";
    }
}

