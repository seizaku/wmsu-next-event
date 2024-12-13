import { renderPage, setHistory } from "./modules/navigation.js";
import { deleteData, postData } from "./modules/ajax.js";
import { BASE_URL } from "./modules/base-url.js";
import { showToast } from "./modules/toast.js";

$(document).ready(function () {
  // Routing

  function handleLogin(formData) {
    postData(`AuthController.php`, formData, (response) => {
      if (response.status) {
        renderPage("/user/home/view.php");
        setHistory("/home");
      } else {
        showToast(`Login failed`);
      }
    });
  }

  function handleLogout() {
    deleteData(`AuthController.php`, {}, (response) => {
      if (response.status) {
        renderPage("/user/sign-in/view.php");
        setHistory("/sign-in");
      } else {
        showToast(`Something went wrong`);
      }
    });
  }

  function render(page) {
    renderPage(`/user/${page}/view.php`, page);
    setHistory(`/${page}`);
  }

  $(document).on("submit", `#login-form`, function (e) {
    e.preventDefault();
    handleLogin($(this).serialize());
  });

  $(document).on("click", `#logout`, function (e) {
    e.preventDefault();
    handleLogout();
  });

  $(document).on("click", `#home`, function (e) {
    e.preventDefault();
    render("home");
  });

  $(document).on("click", `#events`, function (e) {
    e.preventDefault();
    render("events");
  });

  $(document).on("click", `#certificates`, function (e) {
    e.preventDefault();
    render("certificates");
  });

  $(document).on("click", `.rsvp`, function (e) {
    e.preventDefault();

    postData(
      "EventAttendeeController.php",
      {
        event_id: $(this).attr("data-event_id"),
      },
      function () {
        showToast(`Event joined`);
        render("events");
      }
    );
  });

  let page = window.location.href
    .replace(BASE_URL, "")
    .split("/")
    .join("")
    .trim();

  console.log(page);

  $(`#${page}`).addClass("bg-base-300");
});
