<?php
	putenv("LANG=ko_KR.UTF-8");
	$data = json_decode(file_get_contents('php://input'), true);
	$content = $data["content"];
	
	switch($content)
	{
		case "대전대신고등학교":
			echo '
			{
				"message":
				{
					"text": "대전대신고등학교는 대전대신고등학교 대전광역시 서구 오량1길 98에 위치한 자율형사립고등학교입니다.(사실 그냥 테스트용으로 입력한거에요...개발자도 쓸모없는 정보입니다..)\nhttp://dshs.kr"
				},
				"keyboard":
				{
					"type": "buttons",
					"buttons": ["대전대신고등학교","급식(조식)", "급식(중식)", "급식(석식)", "학교공지", "대회/캠프", "학사일정", "음원차트", "야구(한화)", "안내"]
				}
			}';
				
		case "급식(조식)":
			$command = escapeshellcmd('python3 /var/www/html/python/breakfast.py');
			$rcmd=shell_exec($command);
			$output=file_get_contents('/var/www/html/python/breakfast.txt');
			$out=(base64_decode($output));
			echo '
			{
				"message":
				{
					"text": "'.$out.'"
				},
				"keyboard":
				{
					"type": "buttons",
					"buttons": ["대전대신고등학교","급식(조식)", "급식(중식)", "급식(석식)", "학교공지", "대회/캠프", "학사일정", "음원차트", "야구(한화)", "안내"]
				}
			}';
			break;
		case "급식(중식)":
			$command = escapeshellcmd('python3 /var/www/html/python/lunch.py');
			$rcmd=shell_exec($command);
			$output=file_get_contents('/var/www/html/python/lunch.txt');
			$out=(base64_decode($output));
			echo '
			{
				"message":
				{
					"text": "'.$out.'"
				},
				"keyboard":
				{
					"type": "buttons",
					"buttons": ["대전대신고등학교","급식(조식)", "급식(중식)", "급식(석식)", "학교공지", "대회/캠프", "학사일정", "음원차트", "야구(한화)", "안내"]
				}
			}';
			break;
		case "급식(석식)":
			$command = escapeshellcmd('python3 /var/www/html/python/dinner.py');
			$rcmd=shell_exec($command);
			$output=file_get_contents('/var/www/html/python/dinner.txt');
			$out=(base64_decode($output));
			echo '
			{
				"message":
				{
					"text": "'.$out.'"
				},
				"keyboard":
				{
					"type": "buttons",
					"buttons": ["대전대신고등학교","급식(조식)", "급식(중식)", "급식(석식)", "학교공지", "대회/캠프", "학사일정", "음원차트", "야구(한화)","안내"]
				}
			}';
			break;
		case "학교공지":
			$command = escapeshellcmd('python3 /var/www/html/python/notice.py');
			$rcmd=shell_exec($command);
			$output=file_get_contents('/var/www/html/python/notice.txt');
			$out=(base64_decode($output));
			echo '
			{
				"message":
				{
					"text": "'.$out.'"
				},
				"keyboard":
				{
					"type": "buttons",
					"buttons": ["대전대신고등학교","급식(조식)", "급식(중식)", "급식(석식)", "학교공지", "대회/캠프", "학사일정", "음원차트", "야구(한화)","안내"]
				}
			}';
			break;
		case "대회/캠프":
			$command = escapeshellcmd('python3 /var/www/html/python/contest.py');
			$rcmd=shell_exec($command);
			$output=file_get_contents('/var/www/html/python/contest.txt');
			$out=(base64_decode($output));
			echo '
			{
				"message":
				{
					"text": "'.$out.'"
				},
				"keyboard":
				{
					"type": "buttons",
					"buttons": ["대전대신고등학교","급식(조식)", "급식(중식)", "급식(석식)", "학교공지", "대회/캠프", "학사일정", "음원차트", "야구(한화)","안내"]
				}
			}';
			break;
		case "학사일정":
			$command = escapeshellcmd('python3 /var/www/html/python/schoolplan.py');
			$rcmd=shell_exec($command);
			$output=file_get_contents('/var/www/html/python/schoolplan.txt');
			$out=(base64_decode($output));
			echo '
			{
				"message":
				{
					"text": "'.$out.'"
				},
				"keyboard":
				{
					"type": "buttons",
					"buttons": ["대전대신고등학교","급식(조식)", "급식(중식)", "급식(석식)", "학교공지", "대회/캠프", "학사일정", "음원차트", "야구(한화)","안내"]
				}
			}';
			break;
		case "음원차트":
			$command = escapeshellcmd('python3 /var/www/html/python/genie.py');
			$rcmd=shell_exec($command);
			$output=file_get_contents('/var/www/html/python/genie.txt');
			$out=(base64_decode($output));
			echo '
			{
				"message":
				{
					"text": "'.$out.'"
				},
				"keyboard":
				{
					"type": "buttons",
					"buttons": ["대전대신고등학교","급식(조식)", "급식(중식)", "급식(석식)", "학교공지", "대회/캠프", "학사일정", "음원차트", "야구(한화)","안내"]
				}
			}';
			break;
		case "야구(한화)":
			$command = escapeshellcmd('python3 /var/www/html/python/baseball.py');
			$rcmd=shell_exec($command);
			$output=file_get_contents('/var/www/html/python/baseball.txt');
			$out=(base64_decode($output));
			echo '
			{
				"message":
				{
					"text": "'.$out.'"
				},
				"keyboard":
				{
					"type": "buttons",
					"buttons": ["대전대신고등학교","급식(조식)", "급식(중식)", "급식(석식)", "학교공지", "대회/캠프", "학사일정", "음원차트", "야구(한화)","안내"]
				}
			}';
			break;
			case "안내":
			echo '
			{
				"message":
				{
					"text": "개발자: 신재욱\n해당 챗봇은 2018학년도 기준 DIS와 Team A0V3R 소속 11022 신재욱이 만들었으며, 대전대신고 재학생들을 위해 제작되었습니다. 문의나 버그제보는 luke7864@naver.com으로 해주세요!\n깃헙:https://github.com/Luke7864\n개발환경:Ubuntu16 LTS, Windows10 PRO\n개발언어: Python+PHP 개발일자:2018.8.21\n도움을 주신 분들 : 조준하님, 김윤성님, 엄다니엘님, 이은학님, 그외 생활코딩 멤버분들 감사합니다!"
				},
				"keyboard":
				{
					"type": "buttons",
					"buttons": ["대전대신고등학교","급식(조식)", "급식(중식)", "급식(석식)", "학교공지", "대회/캠프", "학사일정", "음원차트", "야구(한화)","안내"]
				}
			}';
			break;
		default:
			echo '
			{
				"message":
				{
					"text": "잘못된 입력입니다. 해당 접속이 보고되었습니다. 해킹은 금물입니다."
				},
				"keyboard":
				{
					"type": "buttons",
					"buttons": ["대전대신고등학교","급식(조식)", "급식(중식)", "급식(석식)", "학교공지", "대회/캠프", "학사일정", "음원차트", "야구(한화)","안내"]
				}
			}';
			break;
	}
?>