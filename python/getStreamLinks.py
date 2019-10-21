import re
import requests
from bs4 import BeautifulSoup

url = "https://live.rbg.tum.de/cgi-bin/streams"
response = requests.get(url)
page = str(BeautifulSoup(response.content))
all_urls = []

# Download all URLs from the TUM livestream page
def getURL(page):
	# https://stackoverflow.com/questions/15517483/how-to-extract-urls-from-an-html-page-in-python
    start_link = page.find("a href")
    if start_link == -1:
        return None, 0
    start_quote = page.find('"', start_link)
    end_quote = page.find('"', start_quote + 1)
    url = page[start_quote + 1: end_quote]
    return url, end_quote

while True:
    url, n = getURL(page)
    page = page[n:]
    if url:
        all_urls.append(url)
    else:
        break


urls = [url for url in all_urls if bool(re.search(r"COMB$", url))] # Keep only stream URLs

stream_urls = []

# Get the m3u8 link for every stream
for url in urls:
	response = requests.get(f"https://live.rbg.tum.de{url}")
	# page = str(BeautifulSoup(response.content))
	print(response.text)
	stream_url = re.search("https://.*\.m3u8", response.text)
	stream_urls.append(stream_url.group(0))
