from bs4 import BeautifulSoup
import requests
import base64
import datetime

d=datetime.date.today()
day=d.day
num=-1
reslist=[]

url="https://stu.dje.go.kr/sts_sci_sf01_001.do?schulCode=G100000181&schulKndScCode=04&schulCrseScCode=4"
response=requests.get(url)
soup=BeautifulSoup(response.content,'html.parser')

table=soup.find('table',{'class':'tbl_type3 tbl_calendar'})

for tr in table.find_all('tr'):
    for tds in tr.find_all('td'):
        result=tds.text
        reslist.append(result)

reslist.sort()
for i in range(4):
    reslist.remove('\n\n\n\n')
plan=reslist[day-1]
plan=plan.replace("\n","")
print(plan)
plan=plan+'[만약 오늘 날짜만 나오고 아무 학사일정이 나오지 않는다면, 오늘은 학사일정이 없는 것 입니다.]'
f=open('/var/www/html/python/schoolplan.txt','w')
encoded=plan.encode('utf-8')
bs64=str(base64.b64encode(encoded))
realdata=bs64.replace("b","",1)
realdata=realdata.replace("'","",2)
f.write(realdata)
print(realdata)
f.close()