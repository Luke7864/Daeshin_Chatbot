# -*- coding: utf-8 -*-
from bs4 import BeautifulSoup
import requests
import datetime
import base64

d=datetime.date.today()
year=str(d.year)
month=d.month
day=d.day

if day<10:
	newday='0'+str(day)
else:
	newday=str(day)

if month<10:
	newmonth='0'+str(month)
else:
	newmonth=str(newmonth)

now_date1=datetime.datetime.now()
date=now_date1.weekday()

todaydate=year+'.'+newmonth+'.'+newday

url='https://stu.dje.go.kr/sts_sci_md01_001.do?schulCode=G100000181&insttNm=%EB%8C%80%EC%A0%84%EB%8C%80%EC%8B%A0%EA%B3%A0%EB%93%B1%ED%95%99%EA%B5%90&schulCrseScCode=4&schMmealScCode=3&schYmd='+todaydate
response = requests.get(url)
soup = BeautifulSoup(response.content, 'html.parser')

table=soup.find('table',{'class':'tbl_type3'})

data=[]
for tr in table.find_all('tr'):
	tds=list(soup.find_all('td'))

today=date+8
meal=tds[today].text

if meal=="" or meal==" ":
	txt='오늘은 석식이 없습니다.'
	f=open("/var/www/html/python/dinner.txt",'w')
	encoded=txt.encode('utf-8')
	bs64=str(base64.b64encode(encoded))
	realdata=bs64.replace("b","",1)
	realdata=realdata.replace("'","",2)
	f.write(realdata)
	f.close()
else:
	f=open("/var/www/html/python/dinner.txt",'w')
	encoded=meal.encode('utf-8')
	bs64=str(base64.b64encode(encoded))
	realdata=bs64.replace("b","",1)
	realdata=realdata.replace("'","",2)
	f.write(realdata)
	f.close()
print('ok')

