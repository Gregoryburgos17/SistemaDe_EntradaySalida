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
  divFecha.append(`${hora || ""} ~ ${fecha || ""}`);
};

function withZero(number) {
  let numberLength = number.toString().length;
  return numberLength === 1 ? `0${number}` : number;
}

let _interval = setInterval(setFecha, 1000);

/****************************************
 Animacion al hacer click
*****************************************/
let button = $("#fingerprint");
let scanned = false;
let scanning = false;
let _timeout;
button.mousedown(() => {
  scanning = true;
  showScanner("scanning");
  _timeout = setTimeout(() => {
    scanned = true;
    showScanner("success");
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

const showScanner = (scanner) => {
  let _scanner = $(`#scanner-${scanner}`);
  let scanners = $(".scanner");
  scanners.removeClass("show");
  _scanner.addClass("show");
};
