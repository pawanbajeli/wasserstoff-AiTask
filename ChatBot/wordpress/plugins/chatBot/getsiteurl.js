document.addEventListener('DOMContentLoaded', function () {
    var siteUrlElement = document.getElementById('site-url');
    if (siteUrlElement) {
        var siteUrl = siteUrlElement.getAttribute('data-url');
        // Make an API call to your Python script with the site URL
        fetch('http://your-python-server/extract_content', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ url: siteUrl })
        })
        .then(response => response.json())
        .then(data => {
            console.log('Content extracted:', data);
            
        })
        .catch((error) => {
            console.error('Error:', error);
        });
    }
});
