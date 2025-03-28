/*
Template Name: Velzon - Admin & Dashboard Template
Author: Themesbrand
Website: https://Themesbrand.com/
Contact: Themesbrand@gmail.com
File: Calendar init js
*/


var start_date = document.getElementById("event-start-date");
var timepicker1 = document.getElementById("timepicker1");
var timepicker2 = document.getElementById("timepicker2");
var date_range = null;
var T_check = null;

var date = new Date();
var d = date.getDate();
var m = date.getMonth();
var y = date.getFullYear();
//var Draggable = FullCalendar.Draggable;
var externalEventContainerEl = document.getElementById('external-events');
var defaultEvents = [//{
    //     id: 1,
    //     title: "World Braille Day",
    //     start: "2022-01-04",
    //     className: "bg-soft-info",
    //     allDay: true

    // },
    // {
    //     id: 2,
    //     title: "World Leprosy Day",
    //     start: "2022-01-30",
    //     className: "bg-soft-info",
    //     allDay: true
    // },

    // {
    //     id: 3,
    //     title: "International Mother Language Day",
    //     start: "2022-02-21",
    //     className: "bg-soft-info",
    //     allDay: true
    // },

    // {
    //     id: 4,
    //     title: "International Women's Day",
    //     start: "2022-03-08",
    //     className: "bg-soft-info",
    //     allDay: true
    // },

    // {
    //     id: 5,
    //     title: "World Thinking Day",
    //     start: "2022-02-22",
    //     className: "bg-soft-info",
    //     allDay: true
    // },

    // {
    //     id: 6,
    //     title: "International Mother Language Day",
    //     start: "2022-03-21",
    //     className: "bg-soft-info",
    //     allDay: true
    // },

    // {
    //     id: 7,
    //     title: "World Water Day",
    //     start: "2022-03-22",
    //     className: "bg-soft-info",
    //     allDay: true
    // },

    // {
    //     id: 8,
    //     title: "World Health Day",
    //     start: "2022-04-07",
    //     className: "bg-soft-info",
    //     allDay: true
    // },


    // {
    //     id: 9,
    //     title: "International Special Librarians Day",
    //     start: "2022-04-16",
    //     className: "bg-soft-info",
    //     allDay: true
    // },

    // {
    //     id: 10,
    //     title: "Earth Day",
    //     start: "2022-04-22",
    //     className: "bg-soft-info",
    //     allDay: true
    // },
    // {
    //     id: 153,
    //     title: 'All Day Event',
    //     start: new Date(y, m, 1),
    //     className: 'bg-soft-primary',
    //     location: 'San Francisco, US',
    //     allDay: true,
    //     extendedProps: {
    //         department: 'All Day Event'
    //     },
    //     description: 'An all-day event is an event that lasts an entire day or longer'
    // },
    // {
    //     id: 136,
    //     title: 'Visit Online Course',
    //     start: new Date(y, m, d - 5),
    //     end: new Date(y, m, d - 2),
    //     allDay: true,
    //     className: 'bg-soft-warning',
    //     extendedProps: {
    //         department: 'Long Event'
    //     },
    //     description: 'Long Term Event means an incident that last longer than 12 hours.'
    // },
    // {
    //     id: 999,
    //     title: 'Client Meeting with Alexis',
    //     start: new Date(y, m, d + 22, 20, 0),
    //     end: new Date(y, m, d + 24, 16, 0),
    //     allDay: true,
    //     className: 'bg-soft-danger',
    //     location: 'California, US',
    //     extendedProps: {
    //         department: 'Meeting with Alexis'
    //     },
    //     description: 'A meeting is a gathering of two or more people that has been convened for the purpose of achieving a common goal through verbal interaction, such as sharing information or reaching agreement.'
    // },
    // {
    //     id: 991,
    //     title: 'Repeating Event',
    //     start: new Date(y, m, d + 4, 16, 0),
    //     end: new Date(y, m, d + 9, 16, 0),
    //     allDay: true,
    //     className: 'bg-soft-primary',
    //     location: 'Las Vegas, US',
    //     extendedProps: {
    //         department: 'Repeating Event'
    //     },
    //     description: 'A recurring or repeating event is simply any event that you will occur more than once on your calendar. ',
    // },
    // {
    //     id: 112,
    //     title: 'Meeting With Designer',
    //     start: new Date(y, m, d, 12, 30),
    //     allDay: true,
    //     className: 'bg-soft-success',
    //     location: 'Head Office, US',
    //     extendedProps: {
    //         department: 'Meeting'
    //     },
    //     description: 'Tell how to boost website traffic'
    // },
    // {
    //     id: 113,
    //     title: 'Weekly Strategy Planning',
    //     start: new Date(y, m, d + 9),
    //     end: new Date(y, m, d + 11),
    //     allDay: true,
    //     className: 'bg-soft-danger',
    //     location: 'Head Office, US',
    //     extendedProps: {
    //         department: 'Lunch'
    //     },
    //     description: 'Strategies for Creating Your Weekly Schedule'
    // },
    // {
    //     id: 875,
    //     title: 'Birthday Party',
    //     start: new Date(y, m, d + 1, 19, 0),
    //     allDay: true,
    //     className: 'bg-soft-success',
    //     location: 'Los Angeles, US',
    //     extendedProps: {
    //         department: 'Birthday Party'
    //     },
    //     description: 'Family slumber party – Bring out the blankets and pillows and have a family slumber party! Play silly party games, share special snacks and wind down the fun with a special movie.'
    // },
    // {
    //     id: 783,
    //     title: 'Click for Google',
    //     start: new Date(y, m, 28),
    //     end: new Date(y, m, 29),
    //     allDay: true,
    //     url: 'http://google.com/',
    //     className: 'bg-soft-dark',
    // },
    // {
    //     id: 456,
    //     title: 'Velzon Project Discussion with Team',
    //     start: new Date(y, m, d + 43, 20, 0),
    //     end: new Date(y, m, d + 44, 16, 0),
    //     allDay: true,
    //     className: 'bg-soft-info',
    //     location: 'Head Office, US',
    //     extendedProps: {
    //         department: 'Discussion'
    //     },
    //     description: 'Tell how to boost website traffic'
    // },
];
window.gDefaultEvents = defaultEvents;

function initCalendar () {
    flatPickrInit();
    // Modal de Adicionar evento ao clicar no dia
    // var addEvent = new bootstrap.Modal(document.getElementById('event-modal'), {
    //     keyboard: false
    // });
    // document.getElementById('event-modal');
    var modalTitle = document.getElementById('modal-title');
    var formEvent = document.getElementById('form-event');
    var selectedEvent = null;
    var forms = document.getElementsByClassName('needs-validation');
    /* initialize the calendar */

    // // init draggable
    // new Draggable(externalEventContainerEl, {
    //     itemSelector: '.external-event',
    //     eventData: function (eventEl) {
    //         return {
    //             title: eventEl.innerText,
    //             start: new Date(),
    //             className: eventEl.getAttribute('data-class')
    //         };
    //     }
    // });

    var calendarEl = document.getElementById('calendar');

    // Modal de Adicionar evento ao clicar no dia
    // function addNewEvent(info) {
    //     document.getElementById('form-event').reset();
    //     document.getElementById('btn-delete-event').setAttribute('hidden', true);
    //     addEvent.show();
    //     formEvent.classList.remove("was-validated");
    //     formEvent.reset();
    //     selectedEvent = null;
    //     modalTitle.innerText = 'Adicionar evento';
    //     newEventData = info;
    //     document.getElementById("edit-event-btn").setAttribute("data-id", "new-event");
    //     document.getElementById('edit-event-btn').click();
    //     document.getElementById("edit-event-btn").setAttribute("hidden", true);
    // }

    function getInitialView() {
        if (window.innerWidth >= 768 && window.innerWidth < 1200) {
            return 'timeGridWeek';
        } else if (window.innerWidth <= 768) {
            return 'listMonth';
        } else {
            return 'dayGridMonth';
        }
    }

    var eventCategoryChoice = new Choices("#event-category", {
        searchEnabled: false
    });

    var calendar = new FullCalendar.Calendar(calendarEl, {
        timeZone: 'local',
        locale: 'pt-br',
        editable: true,
        droppable: true,
        selectable: true,
        navLinks: true,
        initialView: getInitialView(),
        themeSystem: 'bootstrap',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
        },
        windowResize: function (view) {
            var newView = getInitialView();
            calendar.changeView(newView);
        },
        eventClick: function (info) {
            if(info.event.extendedProps.modal_url!=''){
                $('#events_view_modal').modal('show');
                if(info.event.classNames[0]=='ticket-open' || info.event.classNames[0]=='ticket-solved'){
                    $('#modal_view').addClass('modal-xl');
                }else{
                    $('#modal_view').removeClass('modal-xl');
                }
                $('#events_view_content_modal').text("Carregando...");
                $.ajax({
                    url: info.event.extendedProps.modal_url,
                    type: "GET",
                    success: function (html) {
                        //$('#events_view_content_modal').html(html);
                        insertHTML(html, 'events_view_modal', 'events_view_content_modal');

                        if(info.event.classNames[0]=='ticket-open' || info.event.classNames[0]=='ticket-solved'){
                            var ckEditors = initEditors();
                            try{
                                var basicRating = raterJs({
                                    starSize: 22,
                                    readOnly: true,
                                    rating: info.event.extendedProps.rating,
                                    element: document.querySelector("#basic-rater")
                                });
                            }catch(e){
                            }
                        }
                    }
                });
            }
        },
        // Modal de Adicionar evento ao clicar no dia
        // dateClick: function (info) {
        //     addNewEvent(info);
        // },
        events: defaultEvents,
        eventReceive: function (info) {
            var newEvent = {
                id: Math.floor(Math.random() * 11000),
                title: info.event.title,
                title_: info.event.title_,
                start: info.event.start,
                allDay: info.event.allDay,
                className: info.event.classNames[0]
            };
            defaultEvents.push(newEvent);
            upcomingEvent(defaultEvents);
        },
        eventDrop: function (info) {
            var indexOfSelectedEvent = defaultEvents.findIndex(function (x) {
                return x.id == info.event.id
            });
            if (defaultEvents[indexOfSelectedEvent]) {
                defaultEvents[indexOfSelectedEvent].title = info.event.title;
                defaultEvents[indexOfSelectedEvent].start = info.event.start;
                defaultEvents[indexOfSelectedEvent].end = (info.event.end) ? info.event.end : null;
                defaultEvents[indexOfSelectedEvent].allDay = info.event.allDay;
                defaultEvents[indexOfSelectedEvent].className = info.event.classNames[0];
                defaultEvents[indexOfSelectedEvent].description = (info.event._def.extendedProps.description) ? info.event._def.extendedProps.description : '';
                defaultEvents[indexOfSelectedEvent].location = (info.event._def.extendedProps.location) ? info.event._def.extendedProps.location : '';
            }
            upcomingEvent(defaultEvents);
        }
    });

    calendar.render();
    window.gCalendar = calendar;

    upcomingEvent(defaultEvents);
    /*Add new event*/
    // Form to add new event
    formEvent.addEventListener('submit', function (ev) {
        ev.preventDefault();
        var updatedTitle = document.getElementById("event-title").value;
        var updatedTitle_ = document.getElementById("event-title_").value;
        var updatedCategory = document.getElementById('event-category').value;
        var start_date = (document.getElementById("event-start-date").value).split("to");
        var updateStartDate = new Date(start_date[0].trim());
        var updateEndDate = (start_date[1]) ? new Date(start_date[1].trim()) : '';

        var end_date = null;
        var event_location = document.getElementById("event-location").value;
        var eventDescription = document.getElementById("event-description").value;
        var eventid = document.getElementById("eventid").value;
        var all_day = false;
        if (start_date.length > 1) {
            var end_date = new Date(start_date[1]);
            end_date.setDate(end_date.getDate() + 1);
            start_date = new Date(start_date[0]);
            all_day = true;
        } else {
            var e_date = start_date;
            var start_time = (document.getElementById("timepicker1").value).trim();
            var end_time = (document.getElementById("timepicker2").value).trim();
            start_date = new Date(start_date + "T" + start_time);
            end_date = new Date(e_date + "T" + end_time);
        }
        var e_id = defaultEvents.length + 1;

        // validation
        if (forms[0].checkValidity() === false) {
            forms[0].classList.add('was-validated');
        } else {
            if (selectedEvent) {
                selectedEvent.setProp("id", eventid);
                selectedEvent.setProp("title", updatedTitle);
                selectedEvent.setProp("title_", updatedTitle_);
                selectedEvent.setProp("classNames", [updatedCategory]);
                selectedEvent.setStart(updateStartDate);
                selectedEvent.setEnd(updateEndDate);
                selectedEvent.setAllDay(all_day);
                selectedEvent.setExtendedProp("description", eventDescription);
                selectedEvent.setExtendedProp("location", event_location);
                var indexOfSelectedEvent = defaultEvents.findIndex(function (x) {
                    return x.id == selectedEvent.id
                });
                if (defaultEvents[indexOfSelectedEvent]) {
                    defaultEvents[indexOfSelectedEvent].title = updatedTitle;
                    defaultEvents[indexOfSelectedEvent].start = updateStartDate;
                    defaultEvents[indexOfSelectedEvent].end = updateEndDate;
                    defaultEvents[indexOfSelectedEvent].allDay = all_day;
                    defaultEvents[indexOfSelectedEvent].className = updatedCategory;
                    defaultEvents[indexOfSelectedEvent].description = eventDescription;
                    defaultEvents[indexOfSelectedEvent].location = event_location;
                }
                calendar.render();
                // default
            } else {
                var newEvent = {
                    id: e_id,
                    title: updatedTitle,
                    title_: updatedTitle_,
                    start: start_date,
                    end: end_date,
                    allDay: all_day,
                    className: updatedCategory,
                    description: eventDescription,
                    location: event_location
                };
                calendar.addEvent(newEvent);
                defaultEvents.push(newEvent);
            }
            addEvent.hide();
            upcomingEvent(defaultEvents);
        }
    });

    document.getElementById("btn-delete-event").addEventListener("click", function (e) {
        if (selectedEvent) {
            for (var i = 0; i < defaultEvents.length; i++) {
                if (defaultEvents[i].id == selectedEvent.id) {
                    defaultEvents.splice(i, 1);
                    i--;
                }
            }
            upcomingEvent(defaultEvents);
            selectedEvent.remove();
            selectedEvent = null;
            addEvent.hide();
        }
    });
    // Modal de Adicionar evento ao clicar no dia
    // document.getElementById("btn-new-event").addEventListener("click", function (e) {
    //     flatpicekrValueClear();
    //     flatPickrInit();
    //     addNewEvent();
    //     document.getElementById("edit-event-btn").setAttribute("data-id", "new-event");
    //     document.getElementById('edit-event-btn').click();
    //     document.getElementById("edit-event-btn").setAttribute("hidden", true);
    // });
}


function flatPickrInit() {
    var config = {
        enableTime: true,
        noCalendar: true,
    };
    var date_range = flatpickr(
        start_date, {
            enableTime: false,
            mode: "range",
            minDate: "today",
            onChange: function (selectedDates, dateStr, instance) {
                var date_range = dateStr;
                var dates = date_range.split("to");
                if (dates.length > 1) {
                    document.getElementById('event-time').setAttribute("hidden", true);
                } else {
                    document.getElementById("timepicker1").parentNode.classList.remove("d-none");
                    document.getElementById("timepicker1").classList.replace("d-none", "d-block");
                    document.getElementById("timepicker2").parentNode.classList.remove("d-none");
                    document.getElementById("timepicker2").classList.replace("d-none", "d-block");
                    document.getElementById('event-time').removeAttribute("hidden");
                }
            },
        });
    flatpickr(timepicker1, config);
    flatpickr(timepicker2, config);

}

function flatpicekrValueClear() {
    start_date.flatpickr().clear();
    timepicker1.flatpickr().clear();
    timepicker2.flatpickr().clear();
}


function eventClicked() {
    document.getElementById('form-event').classList.add("view-event");
    document.getElementById("event-title").classList.replace("d-block", "d-none");
    document.getElementById("event-title_").classList.replace("d-block", "d-none");
    document.getElementById("event-category").classList.replace("d-block", "d-none");
    document.getElementById("event-start-date").parentNode.classList.add("d-none");
    document.getElementById("event-start-date").classList.replace("d-block", "d-none");
    document.getElementById('event-time').setAttribute("hidden", true);
    document.getElementById("timepicker1").parentNode.classList.add("d-none");
    document.getElementById("timepicker1").classList.replace("d-block", "d-none");
    document.getElementById("timepicker2").parentNode.classList.add("d-none");
    document.getElementById("timepicker2").classList.replace("d-block", "d-none");
    document.getElementById("event-location").classList.replace("d-block", "d-none");
    document.getElementById("event-description").classList.replace("d-block", "d-none");
    document.getElementById("event-start-date-tag").classList.replace("d-none", "d-block");
    document.getElementById("event-timepicker1-tag").classList.replace("d-none", "d-block");
    document.getElementById("event-timepicker2-tag").classList.replace("d-none", "d-block");
    document.getElementById("event-location-tag").classList.replace("d-none", "d-block");
    document.getElementById("event-description-tag").classList.replace("d-none", "d-block");
    document.getElementById('btn-save-event').setAttribute("hidden", true);
}

function editEvent(data) {
    var data_id = data.getAttribute("data-id");
    if (data_id == 'new-event') {
        document.getElementById('modal-title').innerHTML = "";
        document.getElementById('modal-title').innerHTML = "Criar novo evento";
        document.getElementById("btn-save-event").innerHTML = "Adicionar evento";
        eventTyped();
    } else if (data_id == 'edit-event') {
        alert('Botão edit foi acionado');
        data.innerHTML = "Cancel";
        data.setAttribute("data-id", 'cancel-event');
        document.getElementById("btn-save-event").innerHTML = "Update Event";
        data.removeAttribute("hidden");
        eventTyped();
    } else {
        alert('Modal Edit foi acionaado');
        data.innerHTML = "Edit";
        data.setAttribute("data-id", 'edit-event');
        eventClicked();
    }
}

function eventTyped() {
    document.getElementById('form-event').classList.remove("view-event");
    document.getElementById("event-title").classList.replace("d-none", "d-block");
    document.getElementById("event-title_").classList.replace("d-none", "d-block");
    document.getElementById("event-category").classList.replace("d-none", "d-block");
    document.getElementById("event-start-date").parentNode.classList.remove("d-none");
    document.getElementById("event-start-date").classList.replace("d-none", "d-block");
    document.getElementById("timepicker1").parentNode.classList.remove("d-none");
    document.getElementById("timepicker1").classList.replace("d-none", "d-block");
    document.getElementById("timepicker2").parentNode.classList.remove("d-none");
    document.getElementById("timepicker2").classList.replace("d-none", "d-block");
    document.getElementById("event-location").classList.replace("d-none", "d-block");
    document.getElementById("event-description").classList.replace("d-none", "d-block");
    document.getElementById("event-start-date-tag").classList.replace("d-block", "d-none");
    document.getElementById("event-timepicker1-tag").classList.replace("d-block", "d-none");
    document.getElementById("event-timepicker2-tag").classList.replace("d-block", "d-none");
    document.getElementById("event-location-tag").classList.replace("d-block", "d-none");
    document.getElementById("event-description-tag").classList.replace("d-block", "d-none");
    document.getElementById('btn-save-event').removeAttribute("hidden");
}

// upcoming Event
function upcomingEvent(a) {
    const dataAtual = new Date();
    const ano = dataAtual.getFullYear();
    const mes = dataAtual.getMonth() + 1;
    const dia = dataAtual.getDate();
    const dataFormatada = `${mes}/${dia}/${ano}`;

    a.sort(function (o1, o2) {
        return (new Date(o1.start)) - (new Date(o2.start));
    });
    
    //Proximos eventos
    //document.getElementById("upcoming-event-list").innerHTML = null;
    // a.forEach(function (element) {
    //     var title = element.title;
    //     var e_dt = element.end ? element.end : null;
    //     if (e_dt == "Invalid Date" || e_dt == undefined) {
    //         e_dt = null;
    //     } else {
    //         e_dt = new Date(e_dt).toLocaleDateString('en', {
    //             year: 'numeric',
    //             month: 'numeric',
    //             day: 'numeric'
    //         });
    //     }
    //     var st_date = str_dt(element.start);
    //     var ed_date = str_dt(element.end);
    //     if (st_date === ed_date) {
    //         e_dt = null;
    //     }
    //     var startDate = element.start;
    //     if (startDate === "Invalid Date" || startDate === undefined) {
    //         startDate = null;
    //     } else {
    //         startDate = new Date(startDate).toLocaleDateString('en', {
    //             year: 'numeric',
    //             month: 'numeric',
    //             day: 'numeric'
    //         });
    //     }

    //     var end_dt = (e_dt) ? " to " + e_dt : '';
    //     var category = (element.className).split("-");
    //     var description = (element.description) ? element.description : "";
    //     var e_time_s = tConvert(getTime(element.start));
    //     var e_time_e = tConvert(getTime(element.end));
    //     if (e_time_s == e_time_e) {
    //         var e_time_s = "Dia Inteiro";
    //         var e_time_e = null;
    //     }
    //     var e_time_e = (e_time_e) ? " to " + e_time_e : "";

    //     u_event = "<div class='card mb-3'>\
    //                     <div class='card-body'>\
    //                         <div class='d-flex mb-3'>\
    //                             <div class='flex-grow-1'><i class='mdi mdi-checkbox-blank-circle me-2 text-" + category[2] + "'></i><span class='fw-medium'>" + startDate + end_dt + " </span></div>\
    //                             <div class='flex-shrink-0'><small class='badge badge-soft-primary ms-auto'>" + e_time_s + e_time_e + "</small></div>\
    //                         </div>\
    //                         <h6 class='card-title fs-16'> " + title + "</h6>\
    //                         <p class='text-muted text-truncate-two-lines mb-0'> " + description + "</p>\
    //                     </div>\
    //                 </div>";
        
    //     if((startDate == dataFormatada) || (startDate <= dataFormatada && (e_dt >= dataFormatada || end_dt==null)) ){
    //         document.getElementById("upcoming-event-list").innerHTML += u_event;
    //     }   
    // });
};

function getTime(params) {
    params = new Date(params);
    if (params.getHours() != null) {
        var hour = params.getHours();
        var minute = (params.getMinutes()) ? params.getMinutes() : 00;
        return hour + ":" + minute;
    }
}

function tConvert(time) {
    var t = time.split(":");
    var hours = t[0];
    var minutes = t[1];
    var newformat = hours >= 12 ? 'PM' : 'AM';
    hours = hours % 12;
    hours = hours ? hours : 12;
    minutes = minutes < 10 ? '0' + minutes : minutes;
    return (hours + ':' + minutes + ' ' + newformat);
}

var str_dt = function formatDate(date) {
    var monthNames = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];
    var d = new Date(date),
        month = '' + monthNames[(d.getMonth())],
        day = '' + d.getDate(),
        year = d.getFullYear();
    if (month.length < 2)
        month = '0' + month;
    if (day.length < 2)
        day = '0' + day;
    return [day + " " + month, year].join(',');
};