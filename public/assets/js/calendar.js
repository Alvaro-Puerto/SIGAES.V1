function getEventAll() {
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
    .then(res => {
        console.log(res);
        res.forEach(event => {
            event.overlap = false;
            event.title = event.title + ' ' + event.users[0].first_name + ' ' + event.users[0].last_name
            calendarConfig.addEvent(event)})
    })
}


function showForm(user = null) {
    //getEvent()
    var x = document.getElementById("form-recurrent");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }

    document.getElementById('formRecurrent').reset()
    document.getElementById('title').value = matterG.matter.name
    document.getElementById('matter_id').value = matterG.matter.id;
    document.getElementById('name_user').value = document.getElementById('user_name').value;
    document.getElementById('user_id').value = document.getElementById('id_user').value;
    getEventAll();
    getEvent();
}

function save() {
    var formEl = document.forms.formRecurrent;

    var formData = new FormData(formEl);
    

    fetch('/event', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),

            'Content-Type': 'application/json'
        },
        body: JSON.stringify(getData(formData))
    }).then(res => res.json())
      .then(res => {
          
          calendarConfig.addEvent(res);
      })
      .catch(err => {
        console.log(err);
      });
}


function getData(formData ) {
    if($('.js-example-basic-multiple').select2('val').length < 1) {
        alert('Selecciona al menos un dia');
        return false;
    }

    let data = {}
    
    for(const key of formData.keys()) {
        data[key] = formData.get(key);
    }

    data['freq'] = $('.js-example-basic-multiple').select2('val');
    return data;
   
}

function getEvent() {
    calendarConfig.removeAllEvents();
    let id = document.getElementById('id_user').value;
    fetch('/calendar/user/all/' + id, {
        method: 'GET'
    }).then(res => res.json())
      .then(res => {
          res.forEach(event => {
              if(calendarConfig.getEventById( event.id) == null) 
             
                calendarConfig.addEvent(event)
            });
      }).catch(err => {
          console.log(err);
      })
}