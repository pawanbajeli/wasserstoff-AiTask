from flask import Flask, request, jsonify
import requests
from bs4 import BeautifulSoup

app = Flask(__name__)

def extract_blog_content(url):
    response = requests.get(url)
    soup = BeautifulSoup(response.content, 'html.parser')
    articles = soup.find_all('article')  # Adjust this to match the site's structure
    content = ""
    for article in articles:
        content += article.get_text()
    return content

@app.route('/extract_content', methods=['POST'])
def extract_content():
    data = request.get_json()
    url = data.get('url')
    if not url:
        return jsonify({'error': 'URL is required'}), 400
    content = extract_blog_content(url)
    return jsonify({'content': content})

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5000)
