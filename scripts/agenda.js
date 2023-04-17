(function(win,doc){
  'use strict';

  //Captura o elemento HTML marcado com a classe
  let calendarEl = document.querySelector('.calendar');
  
  const urlParams = new URLSearchParams(window.location.search);
  const id_profissional_url = urlParams.get('id_profissional');
  
  console.log(id_profissional_url);
  
  //Cria uma instância
  //dayGridMonth - Abre por mês, pode ser semana ou display 
let calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    hiddenDays: [0,1],
    //headerToolBar - configuração da barra superior. O que vai no início, no meio ou no fim
    headerToolbar:{
        start: 'prev,today,next',
        center: 'title',
        end: 'dayGridMonth, timeGridWeek, timeGridDay'
    },
    //buttonText - personaliza o texto dos botões da headerToolBar
    buttonText:{
        today:    'hoje',
        month:    'mês',
        week:     'semana',
        day:      'dia'
    },
    //locale - troca a linguagem
    locale:'pt-br',
    slotDuration: '00:40:00',
    snapDuration: '00:40:00',
    //Captura o evento clique
    dateClick: function(info, id_profissional) {
            if(info.view.type == 'dayGridMonth'){
                calendar.changeView('timeGrid', info.dateStr);
            } else{
                if(info.date.getHours()<7 || info.date.getHours()>20){
                    alert('Nosso horário de funcionamento é de 7:00 às 20:00');
                } else if(info.date.getDay()<2 || info.date.getDay()>6){
                    alert('Nosso horário de funcionamento é de 7:00 às 20:00');
                } else{
                    window.location.href='eventocadastrarform.php?date='+info.dateStr+'&id_profissional='+id_profissional_url;
                }
    
            }            
    },
    //Marca eventos no calendário
    events: 'eventoslistar.php?id_profissional=' + id_profissional_url,
	eventClick: function(info) {
		alert("Esse é o seu evento!");
	}
});
calendar.render();

})(window,document);