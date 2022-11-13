
var list_permission = [];
var list_permission_remove = [];

function assignPermission(id) {
    let el = document.getElementById('permission_id_' + id);

    if (el.classList.contains('active')) {
        el.classList.remove('active');
        el.classList.remove('text-white');
        list_permission.splice(list_permission.indexOf(id),1);
    } else {
        el.classList.add('active');
        el.classList.add('text-white');
        list_permission.push(id);
    }
}

function removePermission(id) {
    let el = document.getElementById('permission_asign_id_' + id);

    if (el.classList.contains('active')) {
        el.classList.remove('active');
        el.classList.remove('text-white');
        list_permission_remove.splice(list_permission_remove.indexOf(id),1);
    } else {
        el.classList.add('active');
        el.classList.add('text-white');
        list_permission_remove.push(id);
    }
}


function save() {
    const url = '/roles/permission';
    let role = document.getElementById('role_id').value;
    let data = {
        'permission': list_permission,
        'role_id': role
    };

    fetch(url, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),

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
          console.log(status);
          console.log(message);
          console.log(ok); 
      })
}

function remove() {
    let role = document.getElementById('role_id').value;
    const url = '/roles/permission/' + role;
    let data = {
        'permission': list_permission_remove
    };

    fetch(url, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),

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
          console.log(status);
          console.log(message);
          console.log(ok); 
      });

}