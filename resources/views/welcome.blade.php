
@extends('layout')

@section('content')

<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            Laravel
        </div>

        <div class="links">
            <a href="https://laravel.com/docs">Docs</a>
            <a href="https://laracasts.com">Laracasts</a>
            <a href="https://laravel-news.com">News</a>
            <a href="https://blog.laravel.com">Blog</a>
            <a href="https://nova.laravel.com">Nova</a>
            <a href="https://forge.laravel.com">Forge</a>
            <a href="https://vapor.laravel.com">Vapor</a>
            <a href="https://github.com/laravel/laravel">GitHub</a>
        </div>

        <a onclick="botmanChatWidget.sayAsBot('Hi');">Try out</a>

    </div>
</div>

@endsection

@section('end')

<style>
    html, body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Nunito', sans-serif;
        font-weight: 200;
        height: 100vh;
        margin: 0;
    }

    .full-height {
        height: 100vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }

    .content {
        text-align: center;
    }

    .title {
        font-size: 84px;
    }

    .links > a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

    .m-b-md {
        margin-bottom: 30px;
    }
</style>

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/assets/css/chat.min.css">

<script>
	var botmanWidget = {
		aboutText: '',
		aboutLink: 'https://www.tuxtla.tecnm.mx/',
		dateTimeFormat: 'd/m/yy HH:MM',
		bubbleAvatarUrl: 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAIAAADYYG7QAAAABmJLR0QA/wD/AP+gvaeTAAADiUlEQVRYhWNUUlRnGEyAaaAdgA5GHUQIsJCtU1xczM/Px8TURFtbk4uLm4OD/enTZ3fv3L106fLmLdseP3pMnrGMZCRqcXGx8opSb29PFhbs/vn///++fQc6O7rv3r1HquHMgoIiJGnw9vacO2+2vr4eExPO6GZkZFRSUoyMCv/w/sOlS5dp6KC4uOj2jhZOTg5iFDMxMTk62nNycBw9eox4K0hIQ56e7vUNtcgiN27cXLVqzdEjx54+fcrIyCQlLWVhbhYZFa6hgUgGaekpz58/X7RoKZG2EJuGpKWltmzdwMfHB+H++vWrtaVj2bIV//79Q1PJxMQUFRVRXVPBxsYGEfn586eXp9+DBw+JsYjYKKuprTQ0NIC7JiEhZfu2Hf///8dU+f///0uXLl+6eMnbx4uZmZmBgYGFhUVaWnrL5q3EWERUOSQtLRUY6A/ntrZ0nDxxCr+Ww4ePdnX2wrlOTg6ycrJUc5CrmwvErwwMDDdv3lq+fCUxuhYuXAzP9kxMTD7enlRzkI2NFZy9atWav3//EqPr79+/yE43NTWhmoP+/oWm3H///u3auZsYLRBw/NgJOFtFVYUYLURl++7uPilJCWkZmUmTpjx79px4Bz1+/ATOFhQUpJqD7ty+4+sbRLw74AA5cpmYGInRQtvaXg4pZ719+44YLbR1kKOTA5x9/foNYrTQ0EFcXFzJyQlw7vHjJ3CpRAY0dFBefo6wsDCE/evXr40bNg+kgzw93VNSEuHcRYuWvn//fsAcZG1t1dPbycgIzVaPHz2eOmU6kXqp7yALS/OZs6ZxcEDbTD9+/MjKyvv06dPAOMjc3HT27BnwFtz///+rq+quXbtOvAnUdJCBgf6cubO4uDjhrmmob96wYRNJhlDNQTIy0jNnTYO7hoGBobW1Y8mSZaSaQx0HMTMzT54yQUREGC7S0tI+f95CMoyijoPi42P19HTh3EkTp5DnGgby+mVogJeX98jR/Tw8PBDu9u07c3MKsLZuiQFUCCFfP2+4a96/f19X20i2a6jjIGtrRHty5crV794RVavjAlRw0I8fPyCM////r161lkLTSO5KY4Lr128YGhpwcXH2903ct+8AhaZRIVFTFwy68aFRBxECow4iBKjgoNVrlt+9d+PuvRsrVxE7CERbBxkZGUIYJibGlJs2HKPszJmzEMbp02coN220pCYERh1ECAAAyKsowb1o1vAAAAAASUVORK5CYII=',
		bubbleBackground: '#222127',

		title: 'Clio',
		mainColor: '#222127',
		headerTextColor: '"#fff',

		placeholderText: 'Escribe un mensaje '
	};

	$(document).on('click', '.desktop-closed-message-avatar img', function() {
		var iframe = document.getElementById("chatBotManFrame");
		iframe.addEventListener('load', function () {
			var htmlFrame = this.contentWindow.document.getElementsByTagName("html")[0];
			var bodyFrame = this.contentWindow.document.getElementsByTagName("body")[0];
			var headFrame = this.contentWindow.document.getElementsByTagName("head")[0];

			var image = "https://images.unsplash.com/photo-1501597301489-8b75b675ba0a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1349&q=80"

			htmlFrame.style.backgroundImage = "url("+image+")";
			bodyFrame.style.backgroundImage = "url("+image+")";
		});
	});

</script>

<script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>

<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
crossorigin="anonymous"></script>

@endsection