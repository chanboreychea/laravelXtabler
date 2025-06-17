document
  .getElementById("addMoreProduct")
  .addEventListener("click", function () {
    let container = document.getElementById("productFieldsContainer");
    let original = container.querySelector(".form-fieldset");
    let clone = original.cloneNode(true);

    // Add margin class for spacing
    clone.classList.add("mb-3");

    // Clear input values in the cloned fields
    clone.querySelectorAll("input, select").forEach((input) => {
      if (input.type !== "hidden") {
        input.value = input.name.includes("qty_instock") ? 1 : "";
      }
    });

    // Remove dataset attributes to reinitialize properly
    clone.querySelectorAll("[data-initialized]").forEach((element) => {
      element.removeAttribute("data-initialized");
    });

    // Reset image preview in the cloned section
    clone.querySelector(".image-preview-container").innerHTML = "";

    // Clone and populate select options
    let newSelect = clone.querySelector(".form-select");
    if (newSelect) {
      let originalSelect = original.querySelector(".form-select");
      newSelect.innerHTML = ""; // Clear existing options
      originalSelect.querySelectorAll("option").forEach((option) => {
        let newOption = document.createElement("option");
        newOption.value = option.value;
        newOption.textContent = option.textContent;
        newSelect.appendChild(newOption);
      });
    }

    // Add a remove button
    let removeBtn = document.createElement("button");
    removeBtn.type = "button";
    removeBtn.className = "btn btn-danger mt-3 remove-product";
    removeBtn.textContent = "Remove";
    clone.appendChild(removeBtn);

    // Append the cloned fieldset
    container.appendChild(clone);
  });

// Add mb-3 to the first .form-fieldset manually
document.addEventListener("DOMContentLoaded", function () {
  const firstFieldset = document.querySelector(
    "#productFieldsContainer .form-fieldset"
  );
  if (firstFieldset) {
    firstFieldset.classList.add("mb-3");
  }
});

// Remove cloned section when clicking remove button
document.addEventListener("click", function (event) {
  if (event.target.matches(".remove-product")) {
    const fieldset = event.target.closest(".form-fieldset");
    if (fieldset && fieldset.parentNode.childElementCount > 1) {
      fieldset.remove();
    } else {
      alert("At least one product must remain.");
    }
  }
});

// Image preview handler
document.addEventListener("change", function (event) {
  if (event.target.matches(".image-input")) {
    const input = event.target;
    const imagePreviewContainer = input
      .closest(".form-fieldset")
      .querySelector(".image-preview-container");
    const files = input.files;
    imagePreviewContainer.innerHTML = ""; // Clear previous previews

    if (files.length > 0) {
      Array.from(files).forEach((file) => {
        const reader = new FileReader();
        reader.onload = function (e) {
          const previewLink = document.createElement("a");
          previewLink.href = e.target.result;
          previewLink.setAttribute("data-fancybox", "gallery");

          const previewImage = document.createElement("img");
          previewImage.src = e.target.result;
          previewImage.classList.add("img-fluid", "rounded", "mt-3", "w-100");
          previewImage.style.maxHeight = "200px";
          previewImage.style.cursor = "pointer";
          previewImage.style.objectFit = "cover";

          previewLink.appendChild(previewImage);
          imagePreviewContainer.appendChild(previewLink);
        };
        reader.readAsDataURL(file);
      });
    }
  }
});

// Quantity controls
document.addEventListener("click", function (event) {
  if (event.target.matches(".increment-btn, .decrement-btn")) {
    const button = event.target;
    const inputElement = button
      .closest(".input-group")
      .querySelector(".quantity-input");
    let value = parseInt(inputElement.value);

    if (button.matches(".increment-btn")) {
      inputElement.value = value + 1;
    } else if (button.matches(".decrement-btn") && value > 1) {
      inputElement.value = value - 1;
    }
  }
});

// Log selected dropdowns (optional)
document.addEventListener("change", function (event) {
  if (event.target.matches(".tomselect")) {
    console.log("Selected Unit:", event.target.value);
  }
});
