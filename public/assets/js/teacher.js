function search() {
    var el = document.getElementById('list-teacher');
    let teacherName = document.getElementById('search-teacher').value;
    var url = '/teacher/search/' + teacherName;
    el.innerHTML = '';
    fetch(url, {
        method: 'GET'
    }).then(res => res.json())
    .catch(err => {
        alert('Hubo un error al procesar tu solicitud');
    }).then(res => {
        console.log(res);
        for (const item of res) {
            let strEl = '<li class="list-group-item">' + 
                                '<div class="row">' + 
                                    '<div class="col-7">'+
                                        '<p>'+ item.user.first_name + ' ' + item.user.last_name +'</p>'
                                        +'<small class="font-weight-bold">' + item.user.email + '</small>'
                                    +'</div>'
                                    +'<div class="col-5 d-flex justify-content-end">'+
                                        '<button class="btn btn-primary" onclick="saveAddTeacher('+item.id+')">Anexar</button>'
                                    +'</div>' + 
                                '</div>' 
                            +'</li>'
            el.innerHTML += strEl;
        }
    })
}