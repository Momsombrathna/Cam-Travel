<script>
    // Get the image element and the button element
    const img = document.querySelector('.image');
    const btn = document.querySelector('#download-btn');

    // Add a click event listener to the button
    btn.addEventListener('click', async () => {
        try {
            // Fetch the image data as a blob
            const response = await fetch(img.src);
            const blob = await response.blob();

            // Create a URL for the blob
            const url = URL.createObjectURL(blob);

            // Create a link element with the URL and the filename
            const link = document.createElement('a');
            link.href = url;
            link.download = img.src.split('/').pop();

            // Append the link to the document body and click it
            document.body.appendChild(link);
            link.click();

            // Remove the link from the document body and revoke the URL
            document.body.removeChild(link);
            URL.revokeObjectURL(url);
        } catch (error) {
            // Handle any errors
            console.error(error);
        }
    });
</script>