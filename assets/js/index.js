// CHANGE ACTIVE PATH
const url = window.location.href.split('/');
const subdomain = url[url.length-1];
document.querySelector('a[href$="' + subdomain + '"]').classList.add('active');

$.ajax({
  type: "GET",
  url: "../../resources/employees.json"
}).done(function(data) {
// jsGrid Table
$("#jsGrid").jsGrid({
  width: "90%",
  height: "400px",

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
        url: "../../resources/employees.json",
        dataType: "json"
      });
    }
  },
  fields: [
    {
      name: "id",
      type: "hidden",
      css: "hide"
    },
    {
      name: "name",
      type: "text",
      width: 150,
      validate: "required"
    },
    {
      name: "lastName",
      type: "text",
      width: 150,
      validate: "required"
    },
    {
      name: "email",
      type: "text",
      width: 150,
      validate: "required"
    },
    {
      name: "age",
      type: "text",
      width: 50,
      validate: function(value) {
        if (value > 0) {
          return true;
        }
      }
    },
    {
      name: "gender",
      type: "select",
      items: [
        { Name: "", Id: '' },
        { Name: "Male", Id: 'male' },
        { Name: "Female", Id: 'female' }
      ],
      valueField: "Id",
      textField: "Name",
      validate: "required"
    },
    {
    type: "control"
    }
  ]
})
});