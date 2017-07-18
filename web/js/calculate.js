function economyCount() {
    // Вход:
    //     p_quantity - количество выбранных ламп
    //     p_cost – общая цена выбранных ламп
    //     p_power – общая мощность выбранных ламп
    //     kwh_price – стоимость 1 КвЧ
    //     h_per_day - количество часов работы лампы в день

    // Константы:
    //     e_life_time – средний срок службы обычной лампы (в днях)
    //     e_price – средняя цена обычной лампы

    // Выход:
    //     payoff_period – период окупаемости

// var payoff_period = Math.round(p_cost / ((p_power * h_per_day * kwh_price * 4 / 1000) + (p_quantity * h_per_day * e_price / e_life_time)));   // // //
    // период окупаемости выбранных ламп
    if (p_quantity == 0)
        payoff_period = 0;


    var infoWin = window.open("", "", "width=620, height=400, toolbar=1, status=1, menubar=1, resizable, location=0");
    infoWin.document.open();

    // 1. Определение (и вывод в окно) исходных параметров.
    // Стоимость 1 КвЧ:
    var kwh_price = parseFloat(document.forms["economy"].price.value);


    // Время работы ламп в день:
    var h_per_day = parseFloat(document.forms["economy"].works.value);

//    speriod = new String;
//    var p_days;                           // расчетный период в днях
//    var nperiod;

    str = new String("<html>\n");
    str += '<head>\n';
    str += '<title>Результаты расчета</title>\n';
    str += '<META http-equiv="Content-Language" content="ru">\n';
    str += '<META http-equiv="Content-Type" content="text/html; charset=Windows-1251">\n';
    str += '<LINK  href="includes/style.css" rel=stylesheet type=text/css>\n';
    str += '</head>\n';
    str += '<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" bgcolor="WHITE">\n';
    str += '<br><p class="listing2">Результаты расчета</p><br>\n';

    str += '<table class="listing2">\n';
    str += '<tr style="padding-top:10px;">\n';
    str += '<td>\n';
    str += 'Цена 1 КвЧ:&nbsp;&nbsp;&nbsp;';
    str += kwh_price;
    str += '&nbsp;руб.';
    str += '</td>\n';
    str += '</tr>\n';
    str += '<tr style="padding-bottom:10px;">\n';
    str += '<td>';
    str += 'Среднее время работы ламп в течение суток:&nbsp;&nbsp;&nbsp;';
    str += h_per_day;
    str += '&nbsp;час.';
    str += '</td>\n';
    str += '</tr>\n';
    str += '</table>\n';

    str += '<br>\n';
    str += '<p class="listing">Заказ:</p>\n';

    str += '<table class="listing" border=1>\n';
    str += '<tr>\n';
    str += '<td>\n';
    str += 'п/п\n';
    str += '</td>\n';
    str += '<td>\n';
    str += 'Наименование\n';
    str += '</td>\n';
    str += '<td>\n';
    str += 'Цена (руб.)\n';
    str += '</td>\n';
    str += '<td>\n';
    str += 'Кол-во\n';
    str += '</td>\n';
    str += '<td>\n';
    str += 'Сумма (руб.)\n';
    str += '</td>\n';
    str += '</tr>\n';

    // 2. Сбор данных
    p_quantity = 0;
    // количество выбранных ламп
    p_cost = 0;
    // общая цена выбранных ламп
    p_power = 0;
    // общая мощность выбранных ламп
    more_lamps = true;
    var i = 1;
    var lampIndex;
    var formIndex;
    var quant;
    var nlamps = 0;
    var pos_power;

    for (var i = 1; i <= 1454; i++) {
        quant = document.getElementById("qtyL" + i).value;
        if (typeof quant != NaN)
            if (quant > 0) {
                nlamps += 1;
                quant = parseInt(quant);
                p_quantity += quant;
                pos_cost = document.getElementById("prcL" + i).value * quant;
                p_cost += pos_cost;
                p_power += document.getElementById("pwrL" + i).value * quant;

                str += '<tr>\n';
                str += '<td>';
                str += nlamps;
                str += '</td>\n';
                str += '<td style="text-align:left;">';
                str += document.getElementById("nmeL" + i).value; // Наименование
                str += '</td>\n';
                str += '<td>';
                str += document.getElementById("prcL" + i).value; // Цена
                str += '</td>\n';
                str += '<td>';
                str += quant;
                str += '</td>\n';
                str += '<td>';
                str += pos_cost;
                str += '.00</td>\n';
                str += '</tr>\n';
            }
    }

    str += '<tr>\n';
    str += '<td style="border-collapse:separate;border-left:0;border-right:0;border-bottom:0;">';
    str += '</td>\n';
    str += '<td style="border-left:0;border-right:0;border-bottom:0;">\n';
    str += '</td>\n';
    str += '<td>\n';
    str += '<b>Итого</b>';
    str += '</td>\n';
    str += '<td><b>\n';
    str += p_quantity;
    str += '</b></td>\n';
    str += '<td><b>\n';
    str += p_cost;
    str += '.00</b></td>\n';
    str += '</table>\n';
    str += '<br>\n';


    // 2. Расчет окупаемости.
    var payoff_period = Math.round(p_cost / ((p_power * h_per_day * kwh_price * 4 / 1000) + (p_quantity * h_per_day * e_price / e_life_time)));   // // //
    // период окупаемости выбранных ламп
    if (p_quantity == 0)
        payoff_period = 0;

    str += '<table class="listing2">\n';
    str += '<tr>\n';
    str += '<td>\n';
    str += '<b>Период окупаемости</b> ламп составит&nbsp;<b>';
    str += payoff_period;
    str += '&nbsp;дней</b>';
    str += '</td>\n';
    str += '</tr>\n';
    str += '</table>\n';
    str += '</body>\n';
    str += '</html>';

    infoWin.document.write(str);
    str = 0;
    infoWin.document.close();
}

var objPopUp = null;

function popUp(event, objectID) {
    objPopTrig = document.getElementById(event);
    objPopUp = document.getElementById(objectID);
    xPos = objPopTrig.offsetLeft;
    yPos = objPopTrig.offsetTop + objPopTrig.offsetHeight;
    if (xPos + objPopUp.offsetWidth > document.body.clientWidth) xPos = xPos - objPopUp.offsetWidth;
    if (yPos + objPopUp.offsetHeight > document.body.clientHeight) yPos = yPos - objPopUp.offsetHeight - objPopTrig.offsetHeight;
    objPopUp.style.left = xPos + 'px';
    objPopUp.style.top = yPos + 'px';
    objPopUp.style.visibility = 'visible';
}

function popHide() {
    objPopUp.style.visibility = 'hidden';
    objPopUp = null;
}
