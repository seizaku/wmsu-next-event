function showToast(message) {
  var $toast = $(".toast");
  var $messageElement = $("#toast-message");

  if (message) {
    $messageElement.text(message);
  }
  $toast.fadeIn(300).removeClass("hidden"); // Show the toast with a fade-in effect

  // Hide the toast after 4 seconds
  setTimeout(() => {
    $toast.fadeOut(300).addClass("hidden"); // Hide the toast with a fade-out effect
  }, 4000); // 4000ms = 4 seconds
}

export { showToast };
