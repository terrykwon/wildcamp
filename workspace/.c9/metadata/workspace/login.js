{"filter":false,"title":"login.js","tooltip":"/login.js","undoManager":{"mark":100,"position":100,"stack":[[{"start":{"row":4,"column":5},"end":{"row":5,"column":0},"action":"insert","lines":["",""],"id":708}],[{"start":{"row":4,"column":5},"end":{"row":5,"column":0},"action":"remove","lines":["",""],"id":709}],[{"start":{"row":4,"column":4},"end":{"row":4,"column":5},"action":"remove","lines":["D"],"id":710}],[{"start":{"row":4,"column":3},"end":{"row":4,"column":4},"action":"remove","lines":["I"],"id":711}],[{"start":{"row":4,"column":2},"end":{"row":4,"column":3},"action":"remove","lines":["/"],"id":712}],[{"start":{"row":4,"column":2},"end":{"row":4,"column":3},"action":"insert","lines":[" "],"id":713}],[{"start":{"row":4,"column":3},"end":{"row":4,"column":4},"action":"insert","lines":["I"],"id":714}],[{"start":{"row":4,"column":4},"end":{"row":4,"column":5},"action":"insert","lines":["D"],"id":715}],[{"start":{"row":4,"column":5},"end":{"row":4,"column":6},"action":"insert","lines":[" "],"id":716}],[{"start":{"row":4,"column":6},"end":{"row":4,"column":7},"action":"insert","lines":["ㅍ"],"id":717}],[{"start":{"row":4,"column":6},"end":{"row":4,"column":7},"action":"remove","lines":["ㅍ"],"id":721}],[{"start":{"row":4,"column":6},"end":{"row":4,"column":7},"action":"insert","lines":["ㅍ"],"id":722}],[{"start":{"row":4,"column":6},"end":{"row":4,"column":7},"action":"remove","lines":["ㅍ"],"id":724}],[{"start":{"row":4,"column":6},"end":{"row":4,"column":7},"action":"insert","lines":["v"],"id":725}],[{"start":{"row":4,"column":7},"end":{"row":4,"column":8},"action":"insert","lines":["a"],"id":726}],[{"start":{"row":4,"column":8},"end":{"row":4,"column":9},"action":"insert","lines":["l"],"id":727}],[{"start":{"row":4,"column":9},"end":{"row":4,"column":10},"action":"insert","lines":["i"],"id":728}],[{"start":{"row":4,"column":10},"end":{"row":4,"column":11},"action":"insert","lines":["d"],"id":729}],[{"start":{"row":4,"column":11},"end":{"row":4,"column":12},"action":"insert","lines":["a"],"id":730}],[{"start":{"row":4,"column":12},"end":{"row":4,"column":13},"action":"insert","lines":["t"],"id":731}],[{"start":{"row":4,"column":13},"end":{"row":4,"column":14},"action":"insert","lines":["i"],"id":732}],[{"start":{"row":4,"column":14},"end":{"row":4,"column":15},"action":"insert","lines":["o"],"id":733}],[{"start":{"row":4,"column":15},"end":{"row":4,"column":16},"action":"insert","lines":["n"],"id":734}],[{"start":{"row":4,"column":16},"end":{"row":5,"column":0},"action":"insert","lines":["",""],"id":735}],[{"start":{"row":34,"column":2},"end":{"row":35,"column":0},"action":"insert","lines":["",""],"id":736},{"start":{"row":35,"column":0},"end":{"row":35,"column":1},"action":"insert","lines":[" "]}],[{"start":{"row":35,"column":1},"end":{"row":36,"column":0},"action":"insert","lines":["",""],"id":737},{"start":{"row":36,"column":0},"end":{"row":36,"column":1},"action":"insert","lines":[" "]}],[{"start":{"row":36,"column":1},"end":{"row":66,"column":2},"action":"insert","lines":["// ID validation",""," var id = document.getElementById('id').value;",""," var num = id.search(/[0-9]/g);",""," var eng = id.search(/[a-z]/ig);",""," var spe = id.search(/[`~!@@#$%^&*|₩₩₩'₩\";:₩/?]/gi);",""," if(id.length < 6 || id.length > 10){","","  alert(\"6자리 ~ 10자리 이내의 ID를 입력해주세요.\");","","  return false;",""," }",""," if(id.search(/₩s/) != -1){","","  alert(\"ID는 공백을 포함할 수 없습니다.\");","","  return false;",""," } if(num < 0 || eng < 0 || spe < 0 ){","","  alert(\"영문,숫자, 특수문자를 혼합한 ID를 입력해주세요.\");","","  return false;",""," }"],"id":738}],[{"start":{"row":36,"column":5},"end":{"row":36,"column":6},"action":"remove","lines":["D"],"id":739}],[{"start":{"row":36,"column":4},"end":{"row":36,"column":5},"action":"remove","lines":["I"],"id":740}],[{"start":{"row":36,"column":4},"end":{"row":36,"column":5},"action":"insert","lines":["P"],"id":741}],[{"start":{"row":36,"column":5},"end":{"row":36,"column":6},"action":"insert","lines":["a"],"id":742}],[{"start":{"row":36,"column":6},"end":{"row":36,"column":7},"action":"insert","lines":["s"],"id":743}],[{"start":{"row":36,"column":7},"end":{"row":36,"column":8},"action":"insert","lines":["s"],"id":744}],[{"start":{"row":36,"column":8},"end":{"row":36,"column":9},"action":"insert","lines":["w"],"id":745}],[{"start":{"row":36,"column":9},"end":{"row":36,"column":10},"action":"insert","lines":["o"],"id":746}],[{"start":{"row":36,"column":10},"end":{"row":36,"column":11},"action":"insert","lines":["r"],"id":747}],[{"start":{"row":36,"column":11},"end":{"row":36,"column":12},"action":"insert","lines":["d"],"id":748}],[{"start":{"row":38,"column":36},"end":{"row":38,"column":37},"action":"remove","lines":["d"],"id":749}],[{"start":{"row":38,"column":35},"end":{"row":38,"column":36},"action":"remove","lines":["i"],"id":750}],[{"start":{"row":38,"column":35},"end":{"row":38,"column":36},"action":"insert","lines":["w"],"id":751}],[{"start":{"row":38,"column":35},"end":{"row":38,"column":36},"action":"remove","lines":["w"],"id":752}],[{"start":{"row":38,"column":35},"end":{"row":38,"column":36},"action":"insert","lines":["p"],"id":753}],[{"start":{"row":38,"column":36},"end":{"row":38,"column":37},"action":"insert","lines":["w"],"id":754}],[{"start":{"row":38,"column":6},"end":{"row":38,"column":7},"action":"remove","lines":["d"],"id":755}],[{"start":{"row":38,"column":5},"end":{"row":38,"column":6},"action":"remove","lines":["i"],"id":756}],[{"start":{"row":38,"column":5},"end":{"row":38,"column":6},"action":"insert","lines":["p"],"id":757}],[{"start":{"row":38,"column":6},"end":{"row":38,"column":7},"action":"insert","lines":["w"],"id":758}],[{"start":{"row":40,"column":12},"end":{"row":40,"column":13},"action":"remove","lines":["d"],"id":759}],[{"start":{"row":40,"column":11},"end":{"row":40,"column":12},"action":"remove","lines":["i"],"id":760}],[{"start":{"row":40,"column":11},"end":{"row":40,"column":12},"action":"insert","lines":["p"],"id":761}],[{"start":{"row":40,"column":12},"end":{"row":40,"column":13},"action":"insert","lines":["w"],"id":762}],[{"start":{"row":42,"column":12},"end":{"row":42,"column":13},"action":"remove","lines":["d"],"id":763}],[{"start":{"row":42,"column":11},"end":{"row":42,"column":12},"action":"remove","lines":["i"],"id":764}],[{"start":{"row":42,"column":11},"end":{"row":42,"column":12},"action":"insert","lines":["p"],"id":765}],[{"start":{"row":42,"column":12},"end":{"row":42,"column":13},"action":"insert","lines":["w"],"id":766}],[{"start":{"row":44,"column":12},"end":{"row":44,"column":13},"action":"remove","lines":["d"],"id":767}],[{"start":{"row":44,"column":11},"end":{"row":44,"column":12},"action":"remove","lines":["i"],"id":768}],[{"start":{"row":44,"column":11},"end":{"row":44,"column":12},"action":"insert","lines":["p"],"id":769}],[{"start":{"row":44,"column":12},"end":{"row":44,"column":13},"action":"insert","lines":["w"],"id":770}],[{"start":{"row":46,"column":5},"end":{"row":46,"column":6},"action":"remove","lines":["d"],"id":771}],[{"start":{"row":46,"column":4},"end":{"row":46,"column":5},"action":"remove","lines":["i"],"id":772}],[{"start":{"row":46,"column":4},"end":{"row":46,"column":5},"action":"insert","lines":["p"],"id":773}],[{"start":{"row":46,"column":5},"end":{"row":46,"column":6},"action":"insert","lines":["w"],"id":774}],[{"start":{"row":46,"column":22},"end":{"row":46,"column":23},"action":"remove","lines":["d"],"id":775}],[{"start":{"row":46,"column":21},"end":{"row":46,"column":22},"action":"remove","lines":["i"],"id":776}],[{"start":{"row":46,"column":21},"end":{"row":46,"column":22},"action":"insert","lines":["p"],"id":777}],[{"start":{"row":46,"column":22},"end":{"row":46,"column":23},"action":"insert","lines":["w"],"id":778}],[{"start":{"row":54,"column":5},"end":{"row":54,"column":6},"action":"remove","lines":["d"],"id":779}],[{"start":{"row":54,"column":4},"end":{"row":54,"column":5},"action":"remove","lines":["i"],"id":780}],[{"start":{"row":54,"column":4},"end":{"row":54,"column":5},"action":"insert","lines":["p"],"id":781}],[{"start":{"row":54,"column":5},"end":{"row":54,"column":6},"action":"insert","lines":["w"],"id":782}],[{"start":{"row":40,"column":8},"end":{"row":40,"column":9},"action":"insert","lines":["2"],"id":783}],[{"start":{"row":42,"column":7},"end":{"row":42,"column":8},"action":"insert","lines":["2"],"id":784}],[{"start":{"row":42,"column":7},"end":{"row":42,"column":8},"action":"remove","lines":["2"],"id":785}],[{"start":{"row":42,"column":8},"end":{"row":42,"column":9},"action":"insert","lines":["2"],"id":786}],[{"start":{"row":44,"column":8},"end":{"row":44,"column":9},"action":"insert","lines":["2"],"id":787}],[{"start":{"row":60,"column":9},"end":{"row":60,"column":10},"action":"insert","lines":["2"],"id":788}],[{"start":{"row":60,"column":21},"end":{"row":60,"column":22},"action":"insert","lines":["2"],"id":789}],[{"start":{"row":60,"column":33},"end":{"row":60,"column":34},"action":"insert","lines":["2"],"id":790}],[{"start":{"row":48,"column":25},"end":{"row":48,"column":26},"action":"remove","lines":["D"],"id":791}],[{"start":{"row":48,"column":24},"end":{"row":48,"column":25},"action":"remove","lines":["I"],"id":792}],[{"start":{"row":48,"column":24},"end":{"row":48,"column":25},"action":"insert","lines":["V"],"id":793}],[{"start":{"row":48,"column":25},"end":{"row":48,"column":26},"action":"insert","lines":["O"],"id":794}],[{"start":{"row":48,"column":25},"end":{"row":48,"column":26},"action":"remove","lines":["O"],"id":795}],[{"start":{"row":48,"column":24},"end":{"row":48,"column":25},"action":"remove","lines":["V"],"id":796}],[{"start":{"row":48,"column":24},"end":{"row":48,"column":25},"action":"insert","lines":["패"],"id":800}],[{"start":{"row":48,"column":25},"end":{"row":48,"column":26},"action":"insert","lines":["스"],"id":803}],[{"start":{"row":48,"column":26},"end":{"row":48,"column":27},"action":"insert","lines":["워"],"id":807}],[{"start":{"row":48,"column":27},"end":{"row":48,"column":28},"action":"insert","lines":["드"],"id":809}],[{"start":{"row":56,"column":10},"end":{"row":56,"column":11},"action":"remove","lines":["D"],"id":810}],[{"start":{"row":56,"column":9},"end":{"row":56,"column":10},"action":"remove","lines":["I"],"id":811}],[{"start":{"row":56,"column":9},"end":{"row":56,"column":10},"action":"insert","lines":["패"],"id":815}],[{"start":{"row":56,"column":10},"end":{"row":56,"column":11},"action":"insert","lines":["스"],"id":818}],[{"start":{"row":56,"column":11},"end":{"row":56,"column":12},"action":"insert","lines":["워"],"id":822}],[{"start":{"row":56,"column":12},"end":{"row":56,"column":13},"action":"insert","lines":["드"],"id":824}],[{"start":{"row":62,"column":27},"end":{"row":62,"column":28},"action":"remove","lines":["D"],"id":825}],[{"start":{"row":62,"column":26},"end":{"row":62,"column":27},"action":"remove","lines":["I"],"id":826}],[{"start":{"row":62,"column":26},"end":{"row":62,"column":27},"action":"insert","lines":["패"],"id":830}],[{"start":{"row":62,"column":27},"end":{"row":62,"column":28},"action":"insert","lines":["스"],"id":833}],[{"start":{"row":62,"column":28},"end":{"row":62,"column":29},"action":"insert","lines":["워"],"id":837}],[{"start":{"row":62,"column":29},"end":{"row":62,"column":30},"action":"insert","lines":["드"],"id":839}]]},"ace":{"folds":[],"scrolltop":611,"scrollleft":0,"selection":{"start":{"row":66,"column":2},"end":{"row":66,"column":2},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":42,"state":"start","mode":"ace/mode/javascript"}},"timestamp":1495919501745,"hash":"6a50ae461158a62ae9090c4f826f90d664f4e731"}