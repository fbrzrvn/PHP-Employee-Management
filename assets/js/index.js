// CHANGE ACTIVE PATH
const url = window.location.href.split('/');
const subdomain = url[url.length-1];
if(subdomain.length > 12){
  const path = subdomain.split("?")[0];
  document.querySelector('a[href$="' + path + '"]').classList.add('active');
}
else{
  document.querySelector('a[href$="' + subdomain + '"]').classList.add('active');
}

$.ajax({
  type: "GET",
  url: "../resources/employees.json"
}).done(function(data) {
  // jsGrid Table
  $("#jsGrid").jsGrid({
    width: "100%",
    height: "auto",

    filtering: true,
    inserting: true,
    sorting: true,
    paging: true,
    autoload: true,
    pageSize: 10,
    pageButtonCount: 3,
    onItemInserting: function(args){

    },
    onItemInserted: function(args) {
      var fragment =
      `<div class="alert alert-success alert-dismissible fade show">
        <strong>New!</strong> Employee has been added to table.
        <button type="button" class="close" data-dismiss="alert">&times;</button>
      </div>`;
      $('#message').append(fragment);
      setTimeout(function(){
        window.location.reload();
      }, 3000);
    },
    onItemUpdated: function(args) {
      var fragment =
      `<div class="alert alert-info alert-dismissible fade show">
      <strong>Update!</strong> An employee has been modified.
      <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>`;
      $('#message').append(fragment);
    },
    onItemDeleted: function(args) {
      var fragment =
      `<div class="alert alert-danger alert-dismissible fade show">
      <strong>Delete!</strong> An employee has been deleted.
      <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>`;
      $('#message').append(fragment);
    },
    deleteConfirm: "Are you sure you want to delete this employee",
    controller: {
      loadData: function(filter) {
        return $.ajax({
          url: "../resources/employees.json",
          dataType: "json"
        });
      },
      insertItem: function(item) {
        return $.ajax({
          type: "POST",
          url: "../../src/library/employeeController.php",
          data: item
        })
      },
      deleteItem: function(item) {
        return $.ajax({
            type: "DELETE",
            url: "../../src/library/employeeController.php",
            data: item
        });
      },
      updateItem: function(item){
        return $.ajax({
            type: "PUT",
            url: "../../src/library/employeeController.php",
            data: item
        });
      }
    },
    fields: [
      { name: "id", type: "hidden", css: "hide", visbile: "false"},
      { name: "name", title: "First Name", type: "text", width: 100, validate: "required"},
      { name: "lastName", title: "Last Name", type: "text", width: 120, validate: "required" },
      { name: "email", title: "Email", type: "text", width: 150, 
        validate: { 
          message: "Employee already exists",
          validator: function(value) {
            var x = 0;
            data.forEach(element => {
              if(element.email == value){
                x = 1;
              }
            });
            return (x == 1 ? "" : value);
      }}},
      { name: "age", title: "Age", type: "text", width: 50,
        validate: value => { if (value > 0) return true; }
      },
      { name: "gender", title: "Gender", type: "select", width: 70,
        items: [
          { Name: "", Id: '' },
          { Name: "man", title: "Man", Id: 'man' },
          { Name: "woman", title: "Woman", Id: 'woman' }
        ],
        valueField: "Id", textField: "Name", validate: "required"
      },
      { type: "control" }
    ],
    rowClick: function(args){
      window.location.href = `../../src/library/employeeController.php?id=${args.item.id}`;
    }
  })
});
