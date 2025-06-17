// @formatter:off
document.addEventListener("DOMContentLoaded", function () {
  var elements = document.querySelectorAll(".tomselect"); // Select all elements with the class ts-select
  elements.forEach(function (el) {
    window.TomSelect &&
      new TomSelect(el, {
        copyClassesToDropdown: false,
        dropdownClass: "dropdown-menu ts-dropdown",
        optionClass: "dropdown-item",
        controlInput: "<input>",
        render: {
          item: function (data, escape) {
            if (data.customProperties) {
              return (
                '<div><span class="dropdown-item-indicator">' +
                data.customProperties +
                "</span>" +
                escape(data.text) +
                "</div>"
              );
            }
            return "<div>" + escape(data.text) + "</div>";
          },
          option: function (data, escape) {
            if (data.customProperties) {
              return (
                '<div><span class="dropdown-item-indicator">' +
                data.customProperties +
                "</span>" +
                escape(data.text) +
                "</div>"
              );
            }
            return "<div>" + escape(data.text) + "</div>";
          },
        },
      });
  });
});
// @formatter:on
