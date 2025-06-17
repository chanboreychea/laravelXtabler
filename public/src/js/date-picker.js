document.addEventListener("DOMContentLoaded", function () {
  const leaveDateInputs = document.querySelectorAll(".leave-picker");
  leaveDateInputs.forEach((input) => {
    new Litepicker({
      element: input,
      singleMode: true,
      format: "YYYY-MM-DD",
      lang: "kh", // correct for Litepicker
      minDate: new Date(), // Disables past dates by setting the min date to today
      buttonText: {
        previousMonth: `<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="15 6 9 12 15 18" /></svg>`,
        nextMonth: `<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="9 6 15 12 9 18" /></svg>`,
      },
    });
  });

  // Initialize Flatpickr for elements with the 'time-picker' class
  const timeInputs = document.querySelectorAll(".time-picker");
  timeInputs.forEach((timeInput) => {
    flatpickr(timeInput, {
      enableTime: true,
      noCalendar: true,
      dateFormat: "H:i",
      time_24hr: false,
      defaultHour: 12,
      defaultMinute: 0,
      locale: flatpickr.l10ns.km,
      allowInput: true, // Allow users to type directly into the input field
      minuteIncrement: 1, // Set minute intervals to 1 (instead of 5)
    });
  });

  // Check if elements with class 'date-picker' exist before initializing Litepicker
  const dateInputs = document.querySelectorAll(".datepicker");
  dateInputs.forEach((input) => {
    new Litepicker({
      element: input,
      singleMode: true,
      format: "YYYY-MM-DD",
      lang: "kh", // correct for Litepicker
      buttonText: {
        previousMonth: `<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="15 6 9 12 15 18" /></svg>`,
        nextMonth: `<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="9 6 15 12 9 18" /></svg>`,
      },
    });
  });
});
