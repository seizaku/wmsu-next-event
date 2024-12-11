import { renderPage, setHistory } from "./modules/navigation.js";
import {
  deleteData,
  fetchContent,
  fetchExternal,
  fetchData,
  postData,
  updateData,
} from "./modules/ajax.js";
import { initMap } from "./google-map/map.js";
import { BASE_URL } from "./modules/base-url.js";
import { showToast } from "./modules/toast.js";
import { fillFormValues } from "./modules/form.js";

$(document).ready(function () {
  lucide.createIcons();

  function handleLogin(formData) {
    postData(`AuthController.php`, formData, (response) => {
      if (response.status) {
        setHistory("/admin/dashboard");
        renderPage("/admin/dashboard/view.php", "dashboard");
      } else {
        showToast(`Login failed`);
      }
    });
  }

  function handleLogout() {
    deleteData(`AuthController.php`, {}, (response) => {
      if (response.status) {
        renderPage("/admin/sign-in/view.php");
        setHistory("/admin/sign-in");
      } else {
        showToast(`Something went wrong`);
      }
    });
  }

  function render(page) {
    renderPage(`/admin/${page}/view.php`, page);
    setHistory(`/admin/${page}`);
  }

  $(document).on("submit", `#login-form`, function (e) {
    e.preventDefault();
    handleLogin($(this).serialize());
  });

  $(document).on("click", `#logout`, function (e) {
    e.preventDefault();
    handleLogout();
  });

  $(document).on("click", `#dashboard`, function (e) {
    e.preventDefault();
    render("dashboard");
  });

  $(document).on("click", `#events`, function (e) {
    e.preventDefault();
    render("events");
  });

  $(document).on("click", `#attendance-logs`, function (e) {
    e.preventDefault();
    render("attendance-logs");
  });

  $(document).on("click", `#certificates`, function (e) {
    e.preventDefault();
    render("certificates");
  });

  $(document).on("click", `#users`, function (e) {
    e.preventDefault();
    render("users");
  });

  let page = window.location.href
    .replace(BASE_URL, "")
    .split("/")
    .join(" ")
    .trim()
    .split(" ")[1];

  if (window.location.href.includes("admin")) {
    render(page);
  }

  $(window).on("popstate", function (event) {
    if (page != "undefined") {
      render(page);
    } else {
      render("dashboard");
    }
  });

  $(document).on("click", `#create-event`, function (e) {
    e.preventDefault();
    fetchContent(
      "/admin/events/components/create-form.php",
      function (response) {
        $("#modal-container").empty().html(response);
        modal.showModal();
        initMap();

        $(document).on("blur", `#location-input`, function (e) {
          e.preventDefault();
          if (!this.value.trim().length) return;
          fetchExternal(
            `https://maps.googleapis.com/maps/api/geocode/json?address=${encodeURIComponent(
              this.value
            )}&key=AIzaSyBRz4JKuhrkAP5XwuHokIh-W71DeGa8wKo`,
            function (response) {
              console.log(response);
              if (!response.results.length) return;
              initMap(response.results[0].geometry.location);
              $("#latitude").val(response.results[0].geometry.location.lat);
              $("#longitude").val(response.results[0].geometry.location.lng);
            },
            function () {
              console.log("Failed to fetch google map");
            }
          );
        });

        $(document).on("submit", "#create-event-form", function (e) {
          e.preventDefault();
          postData(
            "EventController.php",
            $("#create-event-form").serialize(),
            function () {
              render("events");
              modal.close();
              showToast(`Event created`);
            }
          );
        });

        $("#submit-form").on("click", function (e) {
          e.preventDefault();
          $("#create-event-form").submit();
        });
      }
    );
  });

  $(document).on("click", `.update-event`, function (e) {
    e.preventDefault();
    const event_id = $(this).attr("data-id");
    fetchContent(
      "/admin/events/components/update-form.php",
      function (response) {
        $("#modal-container").empty().html(response);

        fetchData(
          `EventController.php`,
          {
            event_id,
          },
          fillFormValues
        );

        modal.showModal();
        initMap();

        $(document).on("blur", `#location-input`, function (e) {
          e.preventDefault();
          if (!this.value.trim().length) return;
          fetchData(
            `https://maps.googleapis.com/maps/api/geocode/json?address=${encodeURIComponent(
              this.value
            )}&key=AIzaSyBRz4JKuhrkAP5XwuHokIh-W71DeGa8wKo`,
            function (response) {
              console.log(response);
              if (!response.results.length) return;
              initMap(response.results[0].geometry.location);
              $("#latitude").val(response.results[0].geometry.location.lat);
              $("#longitude").val(response.results[0].geometry.location.lng);
            },
            function () {
              console.log("Failed to fetch google map");
            }
          );
        });

        $(document).on("submit", "#update-event-form", function (e) {
          e.preventDefault();
          updateData(
            "EventController.php",
            $("#update-event-form").serialize(),
            function () {
              render("events");
              modal.close();
              showToast(`Event updated`);
            }
          );
        });

        $("#submit-form").on("click", function (e) {
          e.preventDefault();
          $("#update-event-form").submit();
        });
      }
    );
  });

  $(document).on("click", `.delete-event`, function (e) {
    e.preventDefault();
    deleteData(
      `/EventController.php`,
      {
        event_id: $(this).attr("data-id"),
      },
      function () {
        render("events");
        showToast(`Event deleted`);
      }
    );
  });
});
