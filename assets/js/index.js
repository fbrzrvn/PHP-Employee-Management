// CHANGE ACTIVE PATH
const url = window.location.href.split('/');
const subdomain = url[url.length-1];
document.querySelector('a[href$="' + subdomain + '"]').classList.add('active');

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
    editing: true,
    sorting: true,
    paging: true,
    autoload: true,
    pageSize: 10,
    pageButtonCount: 3,
    deleteConfirm: "Do you really want to delay this data?",

    controller: {
      loadData: function(filter) {
        return $.ajax({
          url: "../resources/employees.json",
          dataType: "json"
        });
      }
    },

    fields: [
      { name: "id", title: "Id", type: "number", width: 40 },
      { name: "name", title: "First Name", type: "text", width: 100, validate: "required" },
      { name: "lastName", title: "Last Name", type: "text", width: 120, validate: "required" },
      { name: "email", title: "Email", type: "text", width: 150, validate: "required" },
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
    ]
  })
});