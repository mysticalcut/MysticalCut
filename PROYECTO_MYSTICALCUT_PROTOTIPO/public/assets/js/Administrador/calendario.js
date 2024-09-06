function toggleCalendar() {
    var calendarContainer = document.getElementById('calendarContainer');
    if (calendarContainer.style.display === 'none' || calendarContainer.style.display === '') {
        calendarContainer.style.display = 'block';
    } else {
        calendarContainer.style.display = 'none';
    }
}