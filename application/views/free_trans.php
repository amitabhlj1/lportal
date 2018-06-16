<link href="https://fonts.googleapis.com/css?family=Fira+Sans" rel="stylesheet">
   <style>
    #l_text{
        font-family: 'NTR', monospace;
        font-size: 14px;
    }
    #l_text::placeholder{
        font-size: 250%;
        font-weight: bold;
    }
    .card {
      color: #d4cd96;
      font-family: 'Fira Sans', sans-serif;
      height: 100%;
      left: 0;
      position: absolute;
      top: 0;
      -webkit-transform-origin: 100% 50%;
              transform-origin: 100% 50%;
      -webkit-transform-style: preserve-3d;
              transform-style: preserve-3d;
      width: 100%;
      -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
      transition: -webkit-transform 0.6s cubic-bezier(0.49, 0.23, 0.58, 0.49);
      transition: transform 0.6s cubic-bezier(0.49, 0.23, 0.58, 0.49);
      transition: transform 0.6s cubic-bezier(0.49, 0.23, 0.58, 0.49), -webkit-transform 0.6s cubic-bezier(0.49, 0.23, 0.58, 0.49);
    }
    .card.flipped {
      -webkit-transform: translateX(-100%) rotateY(-180deg);
              transform: translateX(-100%) rotateY(-180deg);
    }

    .card-front,
    .card-back {
      -webkit-backface-visibility: hidden;
              backface-visibility: hidden;
      background: repeating-linear-gradient(135deg, rgba(0, 0, 0, 0.3), transparent 1px, rgba(0, 0, 0, 0.3) 2px);
      background-size: 3px 3px;
      background-color: #302f34;
      border-radius: 1px;
      box-shadow: 0px -6px 8px 0px rgba(0, 0, 0, 0.1), 0px 6px 8px 0px rgba(0, 0, 0, 0.1), 6px 0px 8px 0px rgba(0, 0, 0, 0.1), -6px 0px 8px 0px rgba(0, 0, 0, 0.1);
      cursor: pointer;
      height: 100%;
      left: 0;
      padding: 5%;
      position: absolute;
      top: 0;
      width: 100%;
    }

    .card-back {
      -webkit-transform: rotateY(180deg);
              transform: rotateY(180deg);
    }
    .card-back .layer {
      background: repeating-linear-gradient(135deg, rgba(76, 71, 31, 0.3), transparent 1px, rgba(76, 71, 31, 0.3) 2px);
      background-size: 3px 3px;
      background-color: #d4cd96;
      color: #302f34;
      height: 100%;
      position: relative;
      width: 100%;
    }
    .card-back .layer:after {
      background: linear-gradient(135deg, rgba(0, 0, 0, 0.2), transparent);
      content: '';
      display: block;
      height: 100%;
      left: 0;
      position: absolute;
      top: 0;
      width: 100%;
    }
    .card-back .layer .top,
    .card-back .layer .bottom {
      left: 8%;
      position: absolute;
      z-index: 1;
    }
    .card-back .layer .top {
      top: 12%;
    }
    .card-back .layer .bottom {
      bottom: 12%;
    }
    .card-back .layer h2, .card-back .layer h3, .card-back .layer h4 {
      font-weight: 400;
      margin: 2px 0;
    }
    .card-back .layer h2 {
      font-size: 18px;
      font-weight: 500;
      text-transform: uppercase;
    }
    .card-back .layer h3 {
      font-size: 16px;
    }
    .card-back .layer h4 {
      font-size: 16px;
      font-style: italic;
    }

    .card-front .layer {
      -webkit-backface-visibility: hidden;
              backface-visibility: hidden;
      display: flex;
      flex-direction: column;
      height: 100%;
      justify-content: center;
      position: relative;
      width: 100%;
    }
    .card-front .layer h1 {
      font-size: 20px;
      font-weight: 400;
      letter-spacing: -2px;
      margin: 0 auto;
      padding: 6px 18px 4px;
      text-align: center;
    }
    .card-front .layer .corner {
      -webkit-backface-visibility: hidden;
              backface-visibility: hidden;
      border-right: 2px solid #d4cd96;
      border-top: 2px solid #d4cd96;
      height: 12px;
      position: absolute;
      width: 12px;
    }
    .card-front .layer .corner:nth-of-type(1) {
      right: 0;
      top: 0;
    }
    .card-front .layer .corner:nth-of-type(2) {
      left: 0;
      top: 0;
      -webkit-transform: rotateZ(-90deg);
              transform: rotateZ(-90deg);
    }
    .card-front .layer .corner:nth-of-type(3) {
      bottom: 0;
      left: 0;
      -webkit-transform: rotateZ(180deg);
              transform: rotateZ(180deg);
    }
    .card-front .layer .corner:nth-of-type(4) {
      bottom: 0;
      right: 0;
      -webkit-transform: rotateZ(90deg);
              transform: rotateZ(90deg);
    }

    .card-wrapper {
      height: 275px;
      max-width: 420px;
      -webkit-perspective: 600px;
              perspective: 600px;
      position: relative;
      width: 100%;
      transition: -webkit-transform 1s;
      transition: transform 1s;
      transition: transform 1s, -webkit-transform 1s;
    }
   .resultbody{
     height: 10em !important;
     overflow-x: hidden;
     overflow-y: auto;
   }
</style>
<div class="main">&nbsp;</div><br/><br/>
<section class="module-small bg-dark" data-background="<?php echo base_url(); ?>assets/images/small_sections/localization2.png">
  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-md-8 col-lg-6">
        <div class="callout-text font-alt">
          <h3 class="callout-title">Free Cloud Based Translation</h3>
          <p>Translate and Compare. Achieve accuracy.</p>
        </div>
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
                <form class="form-horizontal" id="p_frm" role="form" method="post" action="<?php echo base_url()?>Translation/goTranslation">
                 <div class="panel panel-default">
                  <div class="panel-heading" style="overflow:hidden;">
                      <div class="col-md-5">
                          <div class="form-group">
                            <label class="control-label col-sm-4">From Language:</label>
                            <div class="col-sm-8"> 
                              <select required="true" class="form-control input-md" id="flng" name="flng" >
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
                          </div>
                      </div>
                      <div class="col-md-2"><center><i class="fa fa-exchange" style="margin-top:5%;"></i></center></div>
                      <div class="col-md-5">
                          <div class="form-group">
                            <label class="control-label col-sm-4" for="pwd">To Language:</label>
                            <div class="col-sm-8"> 
                              <select required="true" class="form-control" id="tlng" name="tlng" >
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
                            </div>
                          </div>
                      </div>
                  </div>
                  <div class="panel-body">
                    <div class="form-group">
                      <p class="help-block"><div id="msg_succ" style="margin-left:200px;color:#44e028"></div></p>
                      <div class="col-sm-12">
                        <textarea id="l_text" name="l_text" class="form-control msg-input" placeholder="Please Type your text here..." rows="6" cols="70" onkeyup="countChar(this)"></textarea>
                      <p id='rev_char_count'></p>
                      <p class="help-block"><div id="err_txt" style="color:#F83A18"></div></p>
                      </div>
                     <div class="col-sm-12">
                         <button type="button" class="btn btn-danger btn-xs form-control" onclick="getTranslation()"><b>Translate</b></button>
                     </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <div class="row">
                     <div class="col-sm-6">
                        <div class="panel panel-default">
                          <div class="panel-heading">Translation By Google Translate</div>
                          <div id="googleresult" class="panel-body resultbody"></div>
                        </div>
        <!--                 <div id='googleresult'></div>-->
                     </div>
                     <div class="col-sm-6">
                         <div class="panel panel-default">
                              <div class="panel-heading">[Google] Back/Reverse Translation</div>
                              <div id="googleresult2" class="panel-body resultbody"></div>
                            </div>
                     </div>
                 </div> 
                 <div class="row">
                     <div class="col-sm-6">
                        <div class="panel panel-default">
                          <div class="panel-heading">Translation By Bing Translate</div>
                          <div id="bingresult" class="panel-body resultbody"></div>
                        </div>
                     </div>
                     <div class="col-sm-6">
                         <div class="panel panel-default">
                              <div class="panel-heading">[Bing] Back/Reverse Translation</div>
                              <div id="bingresult2" class="panel-body resultbody"></div>
                            </div>
                     </div>
        <!--		     <div id='bingresult'></div>-->
                 </div> 
                 <div class="row">
                     <div class="col-sm-6">
                        <div class="panel panel-default">
                          <div class="panel-heading">Translation By Yandex Translate</div>
                          <div id="yandexresult" class="panel-body resultbody"></div>
                        </div>
                     </div>
                     <div class="col-sm-6">
                         <div class="panel panel-default">
                              <div class="panel-heading">[Yandex] Back/Reverse Translation</div>
                              <div id="yandexresult2" class="panel-body resultbody"></div>
                            </div>
                     </div>
        <!--		     <div id='yandexresult'></div>-->
                 </div> 
            </div>
            <div class="col-sm-4">
                <div class='card-wrapper'>
                  <div class='card' data-toggle-class='flipped'>
                    <div class='card-front'>
                      <div class='layer'>
                        <h1>For Large Volume Machine Translation or Professional Manual Translation Solutions</h1>
                        <span class="small" style="border:1px solid #d4cd96;"><center>Contact Us</center></span>
                        <center><img src="<?php echo base_url() ?>assets/images/logo.png" width="30%" /></center>
                        <div class='corner'></div>
                        <div class='corner'></div>
                        <div class='corner'></div>
                        <div class='corner'></div>
                      </div>
                    </div>
                    <div class='card-back'>
                      <div class='layer'>
                        <div class='top'>
                          <h2>LangJobs Translation Services</h2>
                        </div>
                        <div class='bottom'>
                          <h3>
                            Phone:
                            <a href='tel:+91 11 4601 3636'>+91-11-4601-3636</a>
                          </h3>
                          <h3>
                            Email:
                            <a href='mailto:info@langjobs.com'>info@langjobs.com</a>
                          </h3>
                          <h3>
                            Contact Form:
                            <a href='<?php echo base_url(); ?>contact.php' target='_blank'>Contact us</a>
                          </h3>
                          <h3>
                            Website:
                            <a href='<?php echo base_url(); ?>' target='_blank'>LangJobs.com</a>
                          </h3>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>		
    </div>
</section>
<script type="text/javascript">
  var baseurl = "<?php print base_url(); ?>";	
</script>

<script>

    (function() {
    let card = document.getElementsByClassName("card")[0],
        moved = 0,
        interval;

    if (!card) return;

    card.addEventListener("click", function(event) {
        clearInterval(interval);
        card.style.transform = "";

        // Do not flip the card if the user is trying to
        // tap a link.
        if (event.target.nodeName === "A") {
            return;
        }

        let cName = card.getAttribute("data-toggle-class");
        let toggled = card.classList.contains(cName);
        card.classList[toggled ? "remove" : "add"](cName);
    });

    interval = setInterval(function() {
        moved = moved ? 0 : 10;
        card.style.transform = "translateY(" + moved + "px)";
    }, 1500);
})();

    
</script>

<script type="text/javascript">
	function countChar(val) {
        var len = val.value.length;
		var max = 30;
        if (len >= max) {
          val.value = val.value.substring(0, max);
        } 
		else
		{
		  var charBalance = max - len;
          $('#rev_char_count').text(charBalance + ' characters remaing.');
        }
      }
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
			
			$("#googleresult").html(res);
			
			// reverce translation
			rev_gooleTrans(res,tlng,flng);
		},
		error: function (request, status, error) 
		{
			alert(request.responseText);
		}
	});
}

function rev_gooleTrans(l_text,tlng,flng)
{
	$.ajax({
		type: "POST",
		url: baseurl+ "Translation/goTranslation",
		dataType: 'html',
		data: {l_text:l_text,flng:tlng,tlng:flng},
		success: function(res)
		{
			//alert('IN goo '+res);	return false;	
			//alert('IN goo '+res['fir'] + ' == '+ res['sec']);	return false;	
			
			$("#googleresult2").html(res);
			
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
			
			// reverce translation
			rev_bingTrans(res,tlng,flng);
		},
		error: function (request, status, error) 
		{
			alert(request.responseText);
		}
	});
}

function rev_bingTrans(l_text,tlng,flng)
{
	$.ajax({
		type: "POST",
		url: baseurl+ "Translation/bingTranslation",
		dataType: 'html',
		data: {l_text:l_text,flng:tlng,tlng:flng},
		success: function(res)
		{
			//alert('IN BING '+res);	return false;		
			$("#bingresult2").html(res);	
			
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
	var flng   = $("#flng").val();
	var langAPI   = $("#tlng").val();

	var url = "https://translate.yandex.net/api/v1.5/tr.json/translate",
	// keyAPI = "trnsl.1.1.20130922T110455Z.4a9208e68c61a760.f819c1db302ba637c2bea1befa4db9f784e9fbb8";

	keyAPI = "trnsl.1.1.20180615T084040Z.8ffdb797de295596.f1ed5333bc5248f3b9fe4fbacb0f598511c11d7a";
	var xhr = new XMLHttpRequest(),
	
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
				
				// reverse translate
				rev_yandexTrans(textAPI,langAPI,flng);
			}
			else {
				$("#yandexresult").html('yandex doesnot support this language');
				//document.querySelector('#output').innerHTML = "Error Code: " + json.code;
			}
		}
	}
}
	
function rev_yandexTrans(textAPI,langAPI,flng)
{
	var url = "https://translate.yandex.net/api/v1.5/tr.json/translate",

	keyAPI = "trnsl.1.1.20180615T084040Z.8ffdb797de295596.f1ed5333bc5248f3b9fe4fbacb0f598511c11d7a";
	var xhr = new XMLHttpRequest(),

	data = "key="+keyAPI+"&text="+textAPI+"&lang="+flng;
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
				$("#yandexresult2").html(json.text[0]);
				
			}
			else {
				$("#yandexresult2").html('yandex doesnot support this language');
				//document.querySelector('#output').innerHTML = "Error Code: " + json.code;
			}
		}
	}
}
</script>