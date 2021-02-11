// CHANGE ACTIVE PATH
const url = window.location.href.split('/');
const subdomain = url[url.length-1];
document.querySelector('a[href$="' + subdomain + '"]').classList.add('active');

// jsGrid Table
$("#jsGrid").jsGrid({
  width: "100%",
  height: "100%",

  filtering: true,
  inserting: true,
  editing: true,
  sorting: true,
  paging: true,
  autoload: true,
  pageSize: 10,
  pageButtonCount: 3,
  deleteConfirm: "Do you really want to delay this employee?",

  fields: [
    { name: "id", title: "Id", type: "number", width: 50 },
    { name: "name", title: "First Name", type: "text", width: 120, validate: "required" },
    { name: "lastName", title: "Last Name", type: "text", width: 150, validate: "required" },
    { name: "email", title: "Email", type: "text", width: 200, validate: "required" },
    { name: "age", title: "Age", type: "number",
      validate: value => { if (value > 0) return true; }
    },
    { name: "gender", title: "Gender", type: "select",
      items: [
        { Name: "", Id: '' },
        { Name: "Male", Id: 'male' },
        { Name: "Female", Id: 'female' }
      ], valueField: "Id", textField: "Name", validate: "required"
    },
    { type: "control" }
  ]
});