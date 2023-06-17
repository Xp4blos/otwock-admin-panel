
function zegar()
{
    const timer = document.querySelector(".panel-time");
    let date = new Date();
    let h = date.getHours(); // 0 - 23
    let m = date.getMinutes(); // 0 - 59
    let s = date.getSeconds(); // 0 - 59

    let day = date.getDate();
    let mies = date.getMonth()+1;
    let year = date.getFullYear();
    

    if(day<10){
        day = '0'+day;
    }
    if(mies<10){
        mies = '0'+mies;
    }
    if(h<10){
        h = '0'+h
    }
    if(m<10){
        m = '0'+m
    }
    if(s<10){
        s = '0'+s
    }

    switch(date.getDay()){
        case 0:
            dayName = 'Niedziela'
            break;
        case 1:
            dayName = 'Poniedziałek'
            break;
        case 2:
            dayName = 'Wtorek'
            break;
        case 3:
            dayName = 'Środa'
            break;
        case 4:
            dayName = 'Czwartek'
            break;
        case 5:
            dayName = 'Piątek'
            break;
        case 6:
            dayName = 'Sobota'
            break;
    }
    console.log(day);
    console.log(mies);
    console.log(year);
    console.log(dayName);
    let time = dayName +" " + day + "." + mies + "." + year + " " + h + ":" + m + ":" + s + " ";
    timer.textContent = time;
}


setInterval(zegar, 1000);
    



