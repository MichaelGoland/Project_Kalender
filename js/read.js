var left = document.getElementById("left");
var right = document.getElementById("right");
var month = document.getElementById("month");
var year = document.getElementById("year");
const monthofYear = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

function changeMonthLeft(){
    var monthValue = month.innerHTML;
    var monthIndex = monthofYear.indexOf(monthValue);
    var monthIndexLeft = monthIndex - 1;
    if (monthIndexLeft < 0){
        monthIndexLeft = 11;
        year.innerHTML =" " + (parseInt(year.innerHTML) - 1);
    }
    month.innerHTML = monthofYear[monthIndexLeft];
    DynamicCalender();
}

function changeMonthRight(){
    var monthValue = month.innerHTML;
    var monthIndex = monthofYear.indexOf(monthValue);
    var monthIndexRight = monthIndex + 1;
    if (monthIndexRight > 11){
        monthIndexRight = 0;
        year.innerHTML =" " +(parseInt(year.innerHTML) + 1);
    }
    month.innerHTML = monthofYear[monthIndexRight];
    DynamicCalender();
}

function getEventsByDay(events, day) {
    var filteredEvents = events.filter(function(event) {
      var eventDay = new Date(event.tgl_mulai).getDate();
      return eventDay === day;
    });
    return filteredEvents;
 }

function filterEventsByMonth(events, targetMonth) {
    return events.filter(function(event) {
      var eventDate = new Date(event.tgl_mulai);
      var eventMonth = eventDate.getMonth() + 1;
      return eventMonth === targetMonth;
    });
  }

function DynamicCalender(){
    var monthValue = month.innerHTML;
    var monthIndex = monthofYear.indexOf(monthValue);
    var yearValue = year.innerHTML;
    //prrint year
    //print month
    
    var dateofcal = new Date(yearValue, monthIndex);
    var firstDay = dateofcal.getDay();
    var totalDay = new Date(yearValue, monthIndex + 1, 0).getDate();
    var calender = document.getElementById("calender");
    // clear calender
    calender.innerHTML = "";
    //get ajax from json.php
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "json.php", true);
    xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
        var data = JSON.parse(xhr.responseText);
        data = filterEventsByMonth(data, monthIndex + 1);
        console.log(data);
      
        
        //create dynamic caleder
        let day = 0;
        let date = 0;
        for (let i = 0; i < 6; i++){
            if (date >= totalDay){
                break; 
            } 
            const row = document.createElement("tr");
            for (let j = 0; j < 7; j++) {
                const cell = document.createElement("td");
                if (day == firstDay){
                    if (date >= totalDay){
                    } else {
                        date += 1;
                        cell.innerText = date;
                        var todayEvent = getEventsByDay(data, date);
                        if (todayEvent.length != 0){                
                            for (var event of todayEvent) {
                                yearevent = event.tgl_mulai.substring(0,4);
                                console.log("yearevent "+yearevent.length)
                                console.log("yearvalue " + yearValue.substring(1,5))              
                                if (yearevent === yearValue.substring(1,5)){
                                    var paragraph = document.createElement("p");
                                    paragraph.innerText = event.lokasi;
                                    cell.appendChild(paragraph);
                                }
                              } 
                        }
                    }
                } else {
                    day += 1;
                }
                row.appendChild(cell);
            }
            calender.appendChild(row);
        } 


        }
    }
    // check ajax
    xhr.send();


}

left.addEventListener("click", changeMonthLeft);
right.addEventListener("click", changeMonthRight);
DynamicCalender();