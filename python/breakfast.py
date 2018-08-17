from bs4 import BeautifulSoup
import requests
import datetime

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

url='https://stu.dje.go.kr/sts_sci_md01_001.do?schulCode=G100000181&insttNm=%EB%8C%80%EC%A0%84%EB%8C%80%EC%8B%A0%EA%B3%A0%EB%93%B1%ED%95%99%EA%B5%90&schulCrseScCode=4&schMmealScCode=1&schYmd='+todaydate
response = requests.get(url)
soup = BeautifulSoup(response.content, 'html.parser')

table=soup.find('table',{'class':'tbl_type3'})

data=[]
for tr in table.find_all('tr'):
	tds=list(soup.find_all('td'))

today=date+8
meal=tds[today].text

if meal=="" or meal==" ":
	txt="오늘은 급식이 없습니다."
	f=open("breakfast.txt",'w')
	f.write(txt)
	f.close()
else:
	f=open("breakfast.txt",'w')
	f.write(meal)
	f.close()
