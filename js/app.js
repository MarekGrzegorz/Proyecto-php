let elements =[];
let contad = 0;

function thousands_separators(num){
    var num_parts = num.toString().split(".");
    num_parts[0] = num_parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, " ");
    return num_parts.join(" ");
  }

function recopilarDatos(){
    elements.push( document.getElementsByClassName('datosEscondidos')[contad].innerHTML.split("~#")); 
    contad++
}

function creaWindow(elem){
    let idElem = (elem.target.parentElement.getAttribute('class') == 'window_A' )? elem.target.parentElement.id : elem.target.id;
    let el_123 = elements.find(x => x[0] == idElem);
    let img1 = document.getElementById('img1') 
    let img2 = document.getElementById('img2') 
    let img3 = document.getElementById('img3') 
    img1.src = `${el_123[1]}/img/${el_123[2]}`
    img1.alt = el_123[3];
    img2.src = `${el_123[1]}/img/${el_123[4]}`
    img2.alt = el_123[5];
    img3.src = `${el_123[1]}/img/${el_123[6]}`
    img3.alt = el_123[7];
    document.getElementsByClassName('auto-slider')[0].style.visibility = 'visible';
    document.getElementById('A_123desc').innerHTML = ` ${el_123[8]} 
    <p>Fecha de viaje: ${el_123[11]} - ${el_123[12]}</p> <p>Periodo de preparacion: ${el_123[13]}</p>
    <p>Puerto Espacial: ${el_123[10]}</p> <p>Precio: ${thousands_separators(el_123[15])}</p> 
    `
}

function procesarDatos(){
    let x = 0;
    for (elem of elements){
        document.getElementById(elem[0]).addEventListener('click', creaWindow)
    }
}