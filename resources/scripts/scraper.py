import requests
from bs4 import BeautifulSoup
import json
import os

def scrape_lelarian():
    url = "https://lelarian.com/cari/"
    headers = {
        "User-Agent": "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36"
    }

    try:
        response = requests.get(url, headers=headers, timeout=30)
            
        # CEK 1: Apakah koneksi diblokir?
        if response.status_code != 200:
            print(json.dumps({"error": f"Status Code: {response.status_code}"}))
            return

        # CEK 2: Paksa tulis file debug di folder yang PASTI (root project)
        debug_path = os.path.join(os.getcwd(), "debug_page.html")
        with open(debug_path, "w", encoding="utf-8") as f:
            f.write(response.text)

        soup = BeautifulSoup(response.text, 'html.parser')
            
        # CEK 3: Cari semua link (<a>) saja dulu untuk tes apakah ada data
        links = soup.find_all('a')
            
        events = []
        for link in links:
            text = link.text.strip()
            if text:
                events.append({"text": text})

        # Kirim hasil
        print(json.dumps(events[:25])) # Kirim 10 data pertama saja buat tes

    except Exception as e:
        # Kirim error asli ke Laravel/Terminal
        print(json.dumps({"error_python": str(e)}))

if __name__ == "__main__":
    scrape_lelarian()