/*    function wrapper(wrapper) {
    var now = new Date();    
    var months = new Array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
    var days = new Array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado');
    var date = now.getDate();
    var year = now.getFullYear();
    var month = now.getMonth();
    var day = now.getDay();
    var hour = now.getHours();
    var minute = now.getMinutes();
    var second = now.getSeconds();
    m      = (hour > 12    )? m="PM": m="AM";
    hour   = ( hour > 12   )? hour-12: hour;
    hour   = ( hour < 10   )? "0"+ hour : hour;
    minute = ( minute < 10 )? "0"+minute : minute;
    second = ( second < 10 )? "0"+second : second;
    //var datetime = ''+days[day]+' '+months[month]+' '+date+' '+year+' '+ hour +':'+ minute +':'+ second;
    //$('#wrapper').html(datetime);
    var datetime =hour +':'+ minute +':'+ second+' '+m;
    $('#hor_reg').val(datetime);
    setTimeout("wrapper()",1000)
    }
*/

    var m="A.M.";
function mueveReloj(){
    momentoActual = new Date();
    hora = momentoActual.getHours();
    minuto = momentoActual.getMinutes();
    segundo = momentoActual.getSeconds();

if(hora==12)
{
    m="P.M.";
}
if(hora==13)
{
    hora="0"+1;
    m="P.M.";
}
if(hora==14)
{
    hora="0"+2;
    m="P.M.";
}
if(hora==15)
{
    hora="0"+3;
    m="P.M.";
}
if(hora==16)
{
    hora="0"+4;
    m="P.M.";
}
if(hora==17)
{
    hora="0"+5;
    m="P.M.";
}
if(hora==18)
{
    hora="0"+6;
    m="P.M.";
}
if(hora==19)
{
    hora="0"+7;
    m="P.M.";
}
if(hora==20)
{
    hora="0"+8;
    m="P.M.";
}
if(hora==21)
{
    hora="0"+9;
    M="P.M.";
}
if(hora==22)
{
    hora=10;
    m="P.M.";
}
if(hora==23)
{
    hora=11;
    m="P.M.";
}
if((hora==0)||(hora==24))
{
    hora=12;
    m="A.M.";
}

    str_segundo = new String (segundo)
    if (str_segundo.length == 1)
       segundo = "0" + segundo;

    str_minuto = new String (minuto)
    if (str_minuto.length == 1)
       minuto = "0" + minuto;

    str_hora = new String (hora)
    if (str_hora.length == 1)
       hora = "0" + hora;

    horaImprimible = hora + ":" + minuto + ":" + segundo+" "+m;
    document.reg_equ.reloj.value=horaImprimible;
    setTimeout("mueveReloj()",1000);
}
