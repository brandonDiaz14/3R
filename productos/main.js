const contador = document.getElementById("contar");
const precio = document.getElementById("precio");
const sumar = document.getElementById("incr");
const restar = document.getElementById("decr");
const reset = document.getElementById("reset");
const valor = document.getElementsByName("valor")[0].value;

let numero = 1;

sumar.addEventListener("click", ()=>{
    numero++;
    contador.innerHTML = numero + " Kg";
    precio.innerHTML = numero*valor + " $";
});

restar.addEventListener("click", ()=>{

    if(numero==1){}
    else{
        numero--;
        contador.innerHTML = numero + " Kg";
        precio.innerHTML = numero*valor + " $";
    }

});

reset.addEventListener("click", ()=>{
    numero = 1;
    contador.innerHTML = numero + " Kg";
    precio.innerHTML = valor + " $";
});

