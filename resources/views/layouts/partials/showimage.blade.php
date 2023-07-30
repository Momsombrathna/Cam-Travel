<script>
    // This function takes an image URL as input and displays it in a div element
    function showImage(url) {
    // Create a new image element
    let image = document.createElement("img");
    // Set the source attribute to the URL
    image.src = url;
    // Set the width and height attributes to fit the div
    image.width = 300;
    image.height = 200;
    // Find the div element by its id
    let container = document.getElementById("image-container");
    // Use a try...catch block to handle any errors
    try {
      // Use an if statement to check if the div already has an image
      if (container.hasChildNodes()) {
        // Use the removeChild() method to remove the existing image
        container.removeChild(container.firstChild);
      }
      // Append the new image element to the div
      container.appendChild(image);
    }
    catch (error) {
      // Log any errors to the console
      console.error(error);
    }
    
    }
  </script>