const $tiempo=document.querySelector('.tiempo'),
$fecha= document.querySelector('.fecha');

function Relojdigital(){
    let f=new Date(),
    dia= f.getDate(),
    mes= f.getMonth()+1,
    anio= f.getFullYear(),
    diaSemana=f.getDay();

    dia= ('0'+dia).slice(-2);
    mes=('0'+mes).slice(-2)

    let timeString= f.toLocaleTimeString();
    $tiempo.innerHTML=timeString;
    let semana=['Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado'];
    let showSemana= (semana[diaSemana])
    switch(mes){
        case "1":
            mes="Enero"
            break
        case "2":
            mes="Febrero"
            break
        case "3":
            mes="Marzo"
            break
        case "4":
            mes="Abril"
            break
        case "5":
            mes="Mayo"
            break
        case "6":
            mes="Junio"
            break
        case "7":
            mes="Julio"
            break
        case "8":
            mes="Agosto"
            break
        case "9":
            mes="Septiembre"
            break
        case "10":
            mes="Octubre"
            break
        case "11":
            mes="Noviembre"
            break
        case "12":
            mes="Diciembre"
            break
    }
    $fecha.innerHTML = `${"<b>"+showSemana+"</b>"+"<br>"} ${dia} de ${mes} de ${anio}`
}
setInterval(() =>{
    Relojdigital()
},1000);