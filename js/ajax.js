function done_del(element) {
    var ssylka = element.dataset.ssylka;
    var ajax = new XMLHttpRequest();
    ajax.open("GET", ssylka, false);
    ajax.send();
    task_list.innerHTML = ajax.response;
}
function task(element) {
    var ssylka = element.dataset.ssylka;
    var ajax = new XMLHttpRequest();
    ajax.open("GET", ssylka, false);
    ajax.send();
    tasks.innerHTML = ajax.response;
}
