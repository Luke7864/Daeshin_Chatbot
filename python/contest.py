# -*- coding: utf-8 -*-
from bs4 import BeautifulSoup
import requests
import base64
data=""
f=open('/var/www/html/python/contest.txt','w')

try:
    url='http://dshs.kr/boardCnts/list.do?type=main&page=1&m=0407&s=dshs&boardID=3828'
    response = requests.get(url)
    soup = BeautifulSoup(response.content, 'html.parser')
    div=soup.find_all('div',{'class':'view_box'})
    for i in range(10):
        strong=div[i].find('strong')
        result='['+str(i+1)+'] '+strong.text+" / "
        data=data+result
    data=data+'<본 정보는 대전대신고등학교 홈페이지에서 확인된 정보로 자세한 정보는 http://dshs.kr/boardCnts/list.do?type=main&page=1&m=0407&s=dshs&boardID=3828 에서 확인부탁드립니다. 본 챗봇은 해당 정보에 책임지지 않습니다.>'
    encoded = data.encode('utf-8')
    bs64 = str(base64.b64encode(encoded))
    realdata = bs64.replace("b", "", 1)
    realdata = realdata.replace("'", "", 2)
    f.write(realdata)
    f.close()
except:
    result='학교홈페이지 서버가 응답하지 않습니다. 학교측에 문의 바랍니다.'
    encoded=result.encode('utf-8')
    bs64=str(base64.b64encode(encoded))
    realdata=bs64.replace("b","",1)
    realdata=realdata.replace("'","",2)
    f.write(realdata)
    f.close()
print('ok')