<?php
	putenv("LANG=ko_KR.UTF-8");
	$data = json_decode(file_get_contents('php://input'), true);
	$content = $data["content"];
	
	switch($content)
	{
		case "급식(조식)":
			$command = escapeshellcmd('python3 /var/www/html/python/breakfast.py');
			system($command);
			$output=file_get_contents('/var/www/html/python/breakfast.txt');
			echo '
			{
				"message":
				{
					"text": "'.$output.'"
				},
				"keyboard":
				{
					"type": "buttons",
					"buttons": ["급식(조식)", "급식(중식)", "급식(석식)", "학교공지", "대회/캠프", "학사일정", "음원차트", "야구(한화)","CTF", "안내"]
				}
			}';
			break;
		case "급식(중식)":
			$command = escapeshellcmd('python3 /var/www/html/python/lunch.py');
			shell_exec($command);
			$output=file_get_contents('/var/www/html/python/lunch.txt');
			echo '
			{
				"message":
				{
					"text": "'.$output.'"
				},
				"keyboard":
				{
					"type": "buttons",
					"buttons": ["급식(조식)", "급식(중식)", "급식(석식)", "학교공지", "대회/캠프", "학사일정", "음원차트", "야구(한화)","CTF", "안내"]
				}
			}';
			break;
		case "급식(석식)":
			$command = escapeshellcmd('python3 /var/www/html/python/dinner.py');
			shell_exec($command);
			$output=file_get_contents('/var/www/html/python/dinner.txt');
			echo '
			{
				"message":
				{
					"text": "'.$output.'"
				},
				"keyboard":
				{
					"type": "buttons",
					"buttons": ["급식(조식)", "급식(중식)", "급식(석식)", "학교공지", "대회/캠프", "학사일정", "음원차트", "야구(한화)","CTF", "안내"]
				}
			}';
			break;
		case "학교공지":
			echo '
			{
				"message":
				{
					"text": "학교공지을 선택하셨습니다."
				},
				"keyboard":
				{
					"type": "buttons",
					"buttons": ["급식(조식)", "급식(중식)", "급식(석식)", "학교공지", "대회/캠프", "학사일정", "음원차트", "야구(한화)","CTF", "안내"]
				}
			}';
			break;
		case "학사일정":
			echo '
			{
				"message":
				{
					"text": "학사일정을 선택하셨습니다."
				},
				"keyboard":
				{
					"type": "buttons",
					"buttons": ["급식(조식)", "급식(중식)", "급식(석식)", "학교공지", "대회/캠프", "학사일정", "음원차트", "야구(한화)","CTF", "안내"]
				}
			}';
			break;
		case "음원차트":
			echo '
			{
				"message":
				{
					"text": "음원차트을 선택하셨습니다."
				},
				"keyboard":
				{
					"type": "buttons",
					"buttons": ["급식(조식)", "급식(중식)", "급식(석식)", "학교공지", "대회/캠프", "학사일정", "음원차트", "야구(한화)","CTF", "안내"]
				}
			}';
			break;
			case "야구(한화)":
			echo '
			{
				"message":
				{
					"text": "야구정보을 선택하셨습니다."
				},
				"keyboard":
				{
					"type": "buttons",
					"buttons": ["급식(조식)", "급식(중식)", "급식(석식)", "학교공지", "대회/캠프", "학사일정", "음원차트", "야구(한화)","CTF", "안내"]
				}
			}';
			break;
			case "CTF":
			echo '
			{
				"message":
				{
					"text": "CTF을 선택하셨습니다."
				},
				"keyboard":
				{
					"type": "buttons",
					"buttons": ["급식(조식)", "급식(중식)", "급식(석식)", "학교공지", "대회/캠프", "학사일정", "음원차트", "야구(한화)","CTF", "안내"]
				}
			}';
			break;
			case "안내":
			echo '
			{
				"message":
				{
					"text": "안내을 선택하셨습니다."
				},
				"keyboard":
				{
					"type": "buttons",
					"buttons": ["급식(조식)", "급식(중식)", "급식(석식)", "학교공지", "대회/캠프", "학사일정", "음원차트", "야구(한화)","CTF", "안내"]
				}
			}';
			break;
		default:
			exec('python3 /var/www/html/python/lunch.py', $okay, $error);
			$output=file_get_contents('/var/www/html/python/lunch.txt');
			echo '
			{
				"message":
				{
					"text": "'.$output.'"
				},
				"keyboard":
				{
					"type": "buttons",
					"buttons": ["급식(조식)", "급식(중식)", "급식(석식)", "학교공지", "대회/캠프", "학사일정", "음원차트", "야구(한화)","CTF", "안내"]
				}
			}';
			break;
	}
?>