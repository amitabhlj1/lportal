<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<style>
    .well{
        font-family: 'Josefin Slab', cursive;
        border: 1px solid;
        padding: 1%;
        height: 185px;
        border-radius: 2px;
        background-color: #f95c39;
        color: #fff;
    }
    .ename{
        font-size: 140%;
    }
</style>
<div class="main">&nbsp;</div><br/><br/>
<section class="module-small bg-dark" data-background="<?php echo base_url(); ?>assets/images/small_sections/blog.jpg">
  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-md-8 col-lg-6 col-lg-offset-2">
        
      </div>
      <div class="col-sm-6 col-md-4 col-lg-2">
        &nbsp;
      </div>
    </div>
  </div>
</section>

<section class="module" style="padding:40px 0px;">
    <div class="container">
        <div class="row">
            <div class="mb-sm-20 wow fadeInUp col-md-12 col-sm-12 col-xs-12 table-responsive">
                <fieldset>
                    <div class="row">
                       <div class="col-lg-10">
						<section class="panel">
							<header class="panel-heading">
							  Google Translate		
							</header>
							<div class="panel-body">
								<p class="help-block"><div id="msg_succ" style="color:#44e028"></div></p>

								<form class="form-horizontal" id="p_frm" role="form" method="post" action="<?php echo base_url()?>Translation/goTranslation">

									<div class="form-group">					
									  <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">From</label>
									  <div class="col-lg-2">
											<select required="true" class="form-control m-b-10" id="flng" name="flng" >
												<option value="af">Afrikaans</option>
												<option value="sq">Albanian</option>
												<option value="am">Amharic</option>
												<option value="ar">Arabic</option>
												<option value="hy">Armenian</option>
												<option value="az">Azerbaijani</option>
												<option value="eu">Basque</option>
												<option value="be">Belarusian</option>
												<option value="bn">Bengali</option>
												<option value="bs">Bosnian</option>
												<option value="bg">Bulgarian</option>
												<option value="ca">Catalan</option>
												<option value="ceb">Cebuano</option>
												<option value="ny">Chichewa</option>
												<option value="zh-CN">Chinese (simp)</option>
												<option value="zh-TW">Chinese (trad)</option>
												<option value="co">Corsican</option>
												<option value="hr">Croatian</option>
												<option value="cs">Czech</option>
												<option value="da">Danish</option>
												<option value="nl">Dutch</option>
												<option selected="" value="en">English</option>
												<option value="eo">Esperanto</option>
												<option value="et">Estonian</option>
												<option value="tl">Filipino</option>
												<option value="fi">Finnish</option>
												<option value="fr">French</option>
												<option value="fy">Frisian</option>
												<option value="gl">Galician</option>
												<option value="ka">Georgian</option>
												<option value="de">German</option>
												<option value="el">Greek</option>
												<option value="gu">Gujarati</option>
												<option value="ht">Haitian Creole</option>
												<option value="ha">Hausa</option>
												<option value="haw">Hawaiian</option>
												<option value="iw">Hebrew</option>
												<option value="hi">Hindi</option>
												<option value="hmn">Hmong</option>
												<option value="hu">Hungarian</option>
												<option value="is">Icelandic</option>
												<option value="ig">Igbo</option>
												<option value="id">Indonesian</option>
												<option value="ga">Irish</option>
												<option value="it">Italian</option>
												<option value="ja">Japanese</option>
												<option value="jw">Javanese</option>
												<option value="kn">Kannada</option>
												<option value="kk">Kazakh</option>
												<option value="km">Khmer</option>
												<option value="ko">Korean</option>
												<option value="ku">Kurdish</option>
												<option value="ky">Kyrgyz</option>
												<option value="lo">Lao</option>
												<option value="la">Latin</option>
												<option value="lv">Latvian</option>
												<option value="lt">Lithuanian</option>
												<option value="lb">Luxembourgish</option>
												<option value="mk">Macedonian</option>
												<option value="mg">Malagasy</option>
												<option value="ms">Malay</option>
												<option value="ml">Malayalam</option>
												<option value="mt">Maltese</option>
												<option value="mi">Maori</option>
												<option value="mr">Marathi</option>
												<option value="mn">Mongolian</option>
												<option value="my">Myanmar (Burmese)</option>
												<option value="ne">Nepali</option>
												<option value="no">Norwegian</option>
												<option value="ps">Pashto</option>
												<option value="fa">Persian</option>
												<option value="pl">Polish</option>
												<option value="pt">Portuguese</option>
												<option value="pa">Punjabi</option>
												<option value="ro">Romanian</option>
												<option value="ru">Russian</option>
												<option value="sm">Samoan</option>
												<option value="gd">Scots Gaelic</option>
												<option value="sr">Serbian</option>
												<option value="st">Sesotho</option>
												<option value="sn">Shona</option>
												<option value="sd">Sindhi</option>
												<option value="si">Sinhala</option>
												<option value="sk">Slovak</option>
												<option value="sl">Slovenian</option>
												<option value="so">Somali</option>
												<option value="es">Spanish</option>
												<option value="su">Sundanese</option>
												<option value="sw">Swahili</option>
												<option value="sv">Swedish</option>
												<option value="tg">Tajik</option>
												<option value="ta">Tamil</option>
												<option value="te">Telugu</option>
												<option value="th">Thai</option>
												<option value="tr">Turkish</option>
												<option value="uk">Ukrainian</option>
												<option value="ur">Urdu</option>
												<option value="uz">Uzbek</option>
												<option value="vi">Vietnamese</option>
												<option value="cy">Welsh</option>
												<option value="xh">Xhosa</option>
												<option value="yi">Yiddish</option>
												<option value="yo">Yoruba</option>
												<option value="zu">Zulu</option>							
											</select>
									  </div>
									  <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">To</label>
									  <div class="col-lg-2">
											<select required="true" class="form-control m-b-10" id="tlng" name="tlng" >
												<option value="af">Afrikaans</option>
															<option value="sq">Albanian</option>
															<option value="am">Amharic</option>
															<option value="ar">Arabic</option>
															<option value="hy">Armenian</option>
															<option value="az">Azerbaijani</option>
															<option value="eu">Basque</option>
															<option value="be">Belarusian</option>
															<option value="bn">Bengali</option>
															<option value="bs">Bosnian</option>
															<option value="bg">Bulgarian</option>
															<option value="ca">Catalan</option>
															<option value="ceb">Cebuano</option>
															<option value="ny">Chichewa</option>
															<option value="zh-CN">Chinese (simp)</option>
															<option value="zh-TW">Chinese (trad)</option>
															<option value="co">Corsican</option>
															<option value="hr">Croatian</option>
															<option value="cs">Czech</option>
															<option value="da">Danish</option>
															<option value="nl">Dutch</option>
															<option value="en">English</option>
															<option value="eo">Esperanto</option>
															<option value="et">Estonian</option>
															<option value="tl">Filipino</option>
															<option value="fi">Finnish</option>
															<option value="fr">French</option>
															<option value="fy">Frisian</option>
															<option value="gl">Galician</option>
															<option value="ka">Georgian</option>
															<option value="de">German</option>
															<option value="el">Greek</option>
															<option value="gu">Gujarati</option>
															<option value="ht">Haitian Creole</option>
															<option value="ha">Hausa</option>
															<option value="haw">Hawaiian</option>
															<option value="iw">Hebrew</option>
															<option value="hi">Hindi</option>
															<option value="hmn">Hmong</option>
															<option value="hu">Hungarian</option>
															<option value="is">Icelandic</option>
															<option value="ig">Igbo</option>
															<option value="id">Indonesian</option>
															<option value="ga">Irish</option>
															<option value="it">Italian</option>
															<option value="ja">Japanese</option>
															<option value="jw">Javanese</option>
															<option value="kn">Kannada</option>
															<option value="kk">Kazakh</option>
															<option value="km">Khmer</option>
															<option value="ko">Korean</option>
															<option value="ku">Kurdish</option>
															<option value="ky">Kyrgyz</option>
															<option value="lo">Lao</option>
															<option value="la">Latin</option>
															<option value="lv">Latvian</option>
															<option value="lt">Lithuanian</option>
															<option value="lb">Luxembourgish</option>
															<option value="mk">Macedonian</option>
															<option value="mg">Malagasy</option>
															<option value="ms">Malay</option>
															<option value="ml">Malayalam</option>
															<option value="mt">Maltese</option>
															<option value="mi">Maori</option>
															<option value="mr">Marathi</option>
															<option value="mn">Mongolian</option>
															<option value="my">Myanmar (Burmese)</option>
															<option value="ne">Nepali</option>
															<option value="no">Norwegian</option>
															<option value="ps">Pashto</option>
															<option value="fa">Persian</option>
															<option value="pl">Polish</option>
															<option value="pt">Portuguese</option>
															<option value="pa">Punjabi</option>
															<option value="ro">Romanian</option>
															<option value="ru">Russian</option>
															<option value="sm">Samoan</option>
															<option value="gd">Scots Gaelic</option>
															<option value="sr">Serbian</option>
															<option value="st">Sesotho</option>
															<option value="sn">Shona</option>
															<option value="sd">Sindhi</option>
															<option value="si">Sinhala</option>
															<option value="sk">Slovak</option>
															<option value="sl">Slovenian</option>
															<option value="so">Somali</option>
															<option value="es">Spanish</option>
															<option value="su">Sundanese</option>
															<option value="sw">Swahili</option>
															<option value="sv">Swedish</option>
															<option value="tg">Tajik</option>
															<option value="ta">Tamil</option>
															<option value="te">Telugu</option>
															<option value="th">Thai</option>
															<option value="tr">Turkish</option>
															<option value="uk">Ukrainian</option>
															<option value="ur">Urdu</option>
															<option value="uz">Uzbek</option>
															<option value="vi">Vietnamese</option>
															<option value="cy">Welsh</option>
															<option value="xh">Xhosa</option>
															<option value="yi">Yiddish</option>
															<option value="yo">Yoruba</option>
															<option value="zu">Zulu</option>			    
											</select>
										  <p class="help-block"><div id="err_lan" style="color:#F83A18"></div></p>
									  </div>	
									</div>
							
									<div class="form-group">
										<p class="help-block"><div id="msg_succ" style="margin-left:200px;color:#44e028"></div></p>
									  <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Text</label>
									  <div class="col-lg-10">
										<textarea id="l_text" name="l_text" class="msg-input" placeholder="text to translate..." rows="6" cols="70"></textarea>
										  <p id='rev_char_count'></p>
										  <p class="help-block"><div id="err_txt" style="color:#F83A18"></div></p>
									  </div>
									</div>

									<div class="form-group">
									  <div class="col-lg-offset-2 col-lg-10">
										  <button type="button" class="btn btn-danger" onclick="getTranslation()">Save</button>
									  </div>
									</div>
								</form>
								</div>
							</section>	  
						</div>  
                    </div>
                </fieldset>
            </div>
        </div>
		
		
		 <div class="row">
			 <div id='googleresult'></div>
			 <div id='bingresult'></div>
			 <div id='yandexresult'></div>
			</div> 
    </div>
</section>
<script type="text/javascript">
  var baseurl = "<?php print base_url(); ?>";	
</script>

<script type="text/javascript">
	$('#l_text').on('input propertychange', function() {
		var max_len = 300;
		var len = $(this).val().trim().length; 
		len = max_len -len;
		$('#rev_char_count').text(len > 0 ? (len + ' character' + (len == 1 ? '' : 's')  + ' remaining.') : '');
		
		// restrict to max length
		$(this).val($(this).val().substring(0, max_len));
	});
	
	$('#b_l_text').on('input propertychange', function() {
		var max_len = 300;
		var len = $(this).val().trim().length; 
		len = max_len -len;
		$('#b_rev_char_count').text(len > 0 ? (len + ' character' + (len == 1 ? '' : 's')  + ' remaining.') : '');
		
		// restrict to max length
		$(this).val($(this).val().substring(0, max_len));
	});
	
</script>

<script>
function getTranslation()
{		
	$("#err_txt").html('');
	$("#err_lan").html('');
	
	var l_text   = $("#l_text").val();
	var flng     = $("#flng").val();
	var tlng     = $("#tlng").val();
	
	if(flng == tlng)
	{
		$("#err_lan").html('both languages cannot be same');		
		return false;
	}
	
	if(l_text == '')
	{
		$("#err_txt").html('please enter text');		
		return false;
	}	
	
	//$("#p_frm").submit();
	gooleTrans();
	bingTrans();
	yandexTrans();
}
	
function gooleTrans()
{
	var l_text = $("#l_text").val();
	var flng   = $("#flng").val();
	var tlng   = $("#tlng").val();

	$.ajax({
		type: "POST",
		url: baseurl+ "Translation/goTranslation",
		dataType: 'html',
		data: {l_text:l_text,flng:flng,tlng:tlng},
		success: function(res)
		{
			//alert('IN goo '+res);	return false;		
			$("#googleresult").html(res);								
		},
		error: function (request, status, error) 
		{
			alert(request.responseText);
		}
	});
}
	
function bingTrans()
{
	var l_text = $("#l_text").val();
	var flng   = $("#flng").val();
	var tlng   = $("#tlng").val();

	$.ajax({
		type: "POST",
		url: baseurl+ "Translation/bingTranslation",
		dataType: 'html',
		data: {l_text:l_text,flng:flng,tlng:tlng},
		success: function(res)
		{
			//alert('IN BING '+res);	return false;		
			$("#bingresult").html(res);								
		},
		error: function (request, status, error) 
		{
			alert(request.responseText);
		}
	});
}
	
	function yandexTrans()
	{
		var textAPI = $("#l_text").val();
		//var flng   = $("#flng").val();
		var langAPI   = $("#tlng").val();
		
		var url = "https://translate.yandex.net/api/v1.5/tr.json/translate",
   		// keyAPI = "trnsl.1.1.20130922T110455Z.4a9208e68c61a760.f819c1db302ba637c2bea1befa4db9f784e9fbb8";
	
		keyAPI = "trnsl.1.1.20180615T084040Z.8ffdb797de295596.f1ed5333bc5248f3b9fe4fbacb0f598511c11d7a";
		var xhr = new XMLHttpRequest(),
        //textAPI = document.querySelector('#source').value,
		
		//textAPI = 'how are you',
        //langAPI =  'ru'; //document.querySelector('#lang').value
        data = "key="+keyAPI+"&text="+textAPI+"&lang="+langAPI;
		xhr.open("POST",url,true);
		xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xhr.send(data);
		xhr.onreadystatechange = function() {
			if (this.readyState==4 && this.status==200) {
				var res = this.responseText;
				//document.querySelector('#json').innerHTML = res;
				var json = JSON.parse(res);
				if(json.code == 200) {
					//document.querySelector('#output').innerHTML = json.text[0];
					//alert('Yandex:  '+json.text[0]);
					$("#yandexresult").html(json.text[0]);
				}
				else {
					$("#yandexresult").html('yandex doesnot support this language');
					//document.querySelector('#output').innerHTML = "Error Code: " + json.code;
				}
			}
		}
	}
</script>