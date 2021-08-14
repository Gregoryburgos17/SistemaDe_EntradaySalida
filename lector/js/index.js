/**************************************
 Mostrando fecha y hora actual
******************************************/
let divFecha = $("#fecha");

const setFecha = () => {
  let _date = new Date();
  divFecha.empty();
  let fecha = `${withZero(_date.getDate())}/${withZero(
    _date.getMonth()
  )}/${withZero(_date.getFullYear())}`;

  let hora = `${withZero(_date.getHours())}:${withZero(
    _date.getMinutes()
  )}:${withZero(_date.getSeconds())}`;
  divFecha.append(`${hora || ""} · ${fecha || ""}`);
};

function withZero(number) {
  let numberLength = number.toString().length;
  return numberLength === 1 ? `0${number}` : number;
}

let _interval = setInterval(setFecha, 1000);
let empleados = []
/****************************************
 Pedir todas las empleados 
*****************************************/
const getEntries = async () => {
  let result = await fetch('ListarEmpleados.php')
  let response = await result.json();
  empleados = response?.respuesta
}
getEntries()
/****************************************
 Animacion al hacer click
*****************************************/
let button = $("#fingerprint");
let scanned = false;
let scanning = false;
let _timeout;
let response;
button.mousedown(() => {
  scanning = true;
  showScanner("scanning");
  _timeout = setTimeout(() => {
    scanned = true;
    const save = async() => {
      let id = Math.round(Math.random() * (empleados?.length - 1))
      id = empleados[id]?.id_empleado
      let result = await fetch('RegistrarEntradaSalida.php',{
        method:'POST',
        body: JSON.stringify({id})
      })
      let _response = await result.json()
      response = _response
      if(response.code === 200){
        showScanner("success", response.mensaje);
      }
      else{
        showScanner("error", response.mensaje);
      }
    }
    save()
    
  }, 2000);
});
button.mouseup(() => {
  scanning = false;
  if (!scanned) {
    clearInterval(_timeout);
    showScanner("error");
  }
  scanned = false;
  setTimeout(() => {
    if (!scanning) {
      $(".scanner").removeClass("show");
    }
  }, 2000);
});

const showScanner = (scanner, text = '') => {
  let _scanner = $(`#scanner-${scanner}`);
  let scanners = $(".scanner");
  scanners.removeClass("show");
  if(text != ''){
    _scanner.empty();
    _scanner.append(text);
  }
  _scanner.addClass("show");
};
