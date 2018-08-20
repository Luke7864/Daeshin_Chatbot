from bs4 import BeautifulSoup
import requests
import base64

url="https://www.hanwhaeagles.co.kr/html/main/main.asp"
response=requests.get(url)
soup=BeautifulSoup(response.content,'html.parser')

leftdiv=soup.find('div',{'class':'left'})
leftteam=leftdiv.find('strong').text

rightdiv=soup.find('div',{'class':'right'})
rightteam=rightdiv.find('strong').text

score=soup.find('div',{'class':'score'}).text

playdate=soup.find('div',{'class':'date'}).text

result=leftteam+' VS '+rightteam+' / '+score+' / '+playdate

f=open('/var/www/html/python/baseball.txt','w')
encoded=result.encode('utf-8')
bs64=str(base64.b64encode(encoded))
realdata=bs64.replace("b","",1)
realdata=realdata.replace("'","",2)
f.write(realdata)
f.close()