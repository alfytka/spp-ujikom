let dataTable3 = new simpleDatatables.DataTable(document.getElementById("table3"));
// Move "per page dropdown" selector element out of label
// to make it work with bootstrap 5. Add bs5 classes.
function adaptPageDropdown() {
  const selector = dataTable3.wrapper.querySelector(".dataTable-selector");
  selector.parentNode.parentNode.insertBefore(selector, selector.parentNode);
  selector.classList.add("form-select");
}

// Add bs5 classes to pagination elements
function adaptPagination() {
  const paginations = dataTable3.wrapper.querySelectorAll(
    "ul.dataTable-pagination-list"
  );

  for (const pagination of paginations) {
    pagination.classList.add(...["pagination", "pagination-primary"]);
  }

  const paginationLis = dataTable3.wrapper.querySelectorAll(
    "ul.dataTable-pagination-list li"
  );

  for (const paginationLi of paginationLis) {
    paginationLi.classList.add("page-item");
  }

  const paginationLinks = dataTable3.wrapper.querySelectorAll(
    "ul.dataTable-pagination-list li a"
  );

  for (const paginationLink of paginationLinks) {
    paginationLink.classList.add("page-link");
  }
}

// Patch "per page dropdown" and pagination after table rendered
dataTable3.on("datatable.init", function () {
    // adaptPageDropdown();
    adaptPagination();
});

// Re-patch pagination after the page was changed
dataTable3.on("datatable.page", adaptPagination);