function addPensumTeacher(id_matter) {
    let id = document.getElementById('id_pensum_id').value;

    document.getElementById('pensum_id').value = id;
    document.getElementById('matter_id').value = id_matter;
    document.getElementById('alert-header').innerHTML = '';
    document.getElementById('list-teacher').innerHTML = '';
    console.log(id_matter);
}

function saveAddTeacher(id) {
    //document.getElementById('alert-header').innerHTML = '';
    let data = {
        'pensum_id': document.getElementById('pensum_id').value,
        'matter_id': document.getElementById('matter_id').value,
        'teacher_id': id
    }

    //let id_pensum = document.getElementById('pensum_id').value;
    let url = '/course/pensum/matter';

    fetch(url, {
        method: 'POST',
        headers: {
            
            'X-CSRF-TOKEN': window.CSRF_TOKEN,// <--- aquí el token
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    }).then((response) => {
        return new Promise((resolve) => response.json()
          .then((message) => resolve({
            status: response.status,
            ok: response.ok,
            message,
          })));
      }).then(({ status, message, ok }) => {
    
        let color = 'black';
        switch (status) {
          case 400:
            document.getElementById('alert-header').innerHTML = message;
            break;
          case 201:
          case 200:
            window.location.reload();
          break;
          case 500:
          default:
            handleUnexpected({ status, json, ok });
        }
      })
}
  