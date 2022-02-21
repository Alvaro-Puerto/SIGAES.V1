function getEvent() {
    let couse_id = document.getElementById('course_id').value;
    let school_year_id = document.getElementById('school_year_id').value;

    console.log(couse_id);
    console.log(school_year_id);


    fetch('/calendar/' + couse_id + '/' + school_year_id, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        }
    }).then(res => res.json())
    .catch(error => console.log(error))
    .then(res => console.log(res))
}