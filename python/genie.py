from bs4 import BeautifulSoup
import requests
import base64
songlist=""
number=0

url="http://www.genie.co.kr/chart/top200"
response=requests.get(url)
soup=BeautifulSoup(response.content,'html.parser')

table=soup.find('table',{'class':'list-wrap'})

for tr in table.find_all('tr',{'class':'list'}):
    number=number+1
    tds=str(tr.find('td',{'class':'check'}))
    tds=tds.replace('<td class="check"><input class="select-check" title="','')
    tds=tds.replace('" type="checkbox"/></td>','')
    rank='['+str(number)+'위] '
    result=rank+tds
    songlist=songlist+' / '+result
    if number==10:
        break

f=open('/var/www/html/python/genie.txt','w')
data='<실시간 지니(genie.co.kr) 차트>'+songlist
encoded=data.encode('utf-8')
bs64=str(base64.b64encode(encoded))
realdata=bs64.replace("b","",1)
realdata=realdata.replace("'","",2)
f.write(realdata)
f.close()