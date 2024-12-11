export function fillFormValues(data) {
  for (const [key, value] of Object.entries(data)) {
    const inputElement = $(`[name=${key}]`);

    if (inputElement.is("input, textarea, select")) {
      inputElement.val(value);
    } else {
      console.warn(`Unhandled input type for name: ${key}`);
    }
  }
}
