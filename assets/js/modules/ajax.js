import { BASE_URL } from "./base-url.js";
import { showToast } from "./toast.js";

export function fetchContent(url, successCallback, errorCallback) {
  $.ajax({
    url: `${BASE_URL}/app/views/pages${url}`,
    type: "GET",
    dataType: "html",
    success: successCallback,
    error:
      errorCallback ||
      function () {
        showToast("Something went wrong.");
      },
  });
}

export function fetchExternal(url, successCallback, errorCallback) {
  $.ajax({
    url: url,
    type: "GET",
    dataType: "json",
    success: successCallback,
    error:
      errorCallback ||
      function () {
        showToast("Something went wrong.");
      },
  });
}

export function fetchData(endpoint, data, successCallback, errorCallback) {
  $.ajax({
    url: `${BASE_URL}/app/controllers/${endpoint}?method=SELECT`,
    type: "POST",
    dataType: "json",
    data,
    success: successCallback,
    error:
      errorCallback ||
      function () {
        showToast("Something went wrong.");
      },
  });
}

export function postData(endpoint, data, successCallback, errorCallback) {
  $.ajax({
    url: `${BASE_URL}/app/controllers/${endpoint}?method=CREATE`,
    type: "POST",
    dataType: "json",
    data,
    success: successCallback,
    error:
      errorCallback ||
      function () {
        showToast("Something went wrong.");
      },
  });
}

export function updateData(endpoint, data, successCallback, errorCallback) {
  $.ajax({
    url: `${BASE_URL}/app/controllers/${endpoint}?method=UPDATE`,
    type: "POST",
    dataType: "json",
    data,
    success: successCallback,
    error:
      errorCallback ||
      function () {
        showToast("Something went wrong.");
      },
  });
}

export function deleteData(endpoint, data, successCallback, errorCallback) {
  $.ajax({
    url: `${BASE_URL}/app/controllers/${endpoint}?method=DELETE`,
    type: "POST",
    dataType: "json",
    data,
    success: successCallback,
    error:
      errorCallback ||
      function () {
        showToast("Something went wrong.");
      },
  });
}
