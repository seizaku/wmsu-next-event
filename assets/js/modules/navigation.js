import { BASE_URL } from "./base-url.js";

// Utility function to update the browser history
export function setHistory(url) {
  const fullUrl = BASE_URL + url;
  window.history.pushState({ path: fullUrl }, "", fullUrl);
}

// Function to render page content
export function renderPage(url, id = null) {
  $.ajax({
    url: `${BASE_URL}/app/views/pages${url}`,
    type: "GET",
    dataType: "html",
    success(response) {
      $("#main-content").empty().html(response);
      if (id) {
        $(`.nav-link`).removeClass("bg-base-300");
        $(`#${id}`).addClass("bg-base-300");
      }
    },
    error() {
      console.error("Failed to load the page. Please try again.");
      // Optionally, render an error page or message here.
    },
  });
}
