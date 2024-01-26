<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Content Example</title>
</head>
<body>

<div id="dynamicContent">
    <!-- Content will be loaded here dynamically -->
</div>
<button onclick="loadDynamicContent()">Load Content</button>

<script>
function loadDynamicContent() {
    // Using the Fetch API to make an asynchronous request to the server
    fetch('book-requests.php')
        .then(response => response.text())
        .then(data => {
            // Update the content of the div with the received data
            document.getElementById('dynamicContent').innerHTML = data;
        })
        .catch(error => console.error('Error:', error));
}
</script>

</body>
</html>
