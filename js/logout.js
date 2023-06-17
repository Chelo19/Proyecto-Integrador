import {supabase} from './client.js'

document.getElementById("logout").addEventListener("click", logout);

async function logout(){
    const { error } = await supabase.auth.signOut()
    if(!error){
        window.location.href = "http://127.0.0.1:5500/html/login.html";
    }
}