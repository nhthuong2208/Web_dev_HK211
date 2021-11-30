$(function() {
	$("input[type='password'][data-eye]").each(function(i) {
		var $this = $(this),
			id = 'eye-password-' + i,
			el = $('#' + id);

		$this.wrap($("<div/>", {
			style: 'position:relative',
			id: id
		}));

		$this.css({
			paddingRight: 60
		});
		$this.after($("<div/>", {
			html: 'Hiện',
			class: 'btn btn-warning btn-sm',
			id: 'passeye-toggle-'+i,
		}).css({
				position: 'absolute',
				right: 10,
				top: ($this.outerHeight() / 2) - 13,
				padding: '2px 7px',
				fontSize: 14,
				cursor: 'pointer',
		}));

		$this.after($("<input/>", {
			type: 'hidden',
			id: 'passeye-' + i
		}));

		var invalid_feedback = $this.parent().parent().find('.invalid-feedback');

		if(invalid_feedback.length) {
			$this.after(invalid_feedback.clone());
		}

		$this.on("keyup paste", function() {
			$("#passeye-"+i).val($(this).val());
		});
		$("#passeye-toggle-"+i).on("click", function() {
			if($this.hasClass("show")) {
				$this.attr('type', 'password');
				$this.removeClass("show");
				$(this).removeClass("btn-outline-primary");
			}else{
				$this.attr('type', 'text');
				$this.val($("#passeye-"+i).val());				
				$this.addClass("show");
				$(this).addClass("btn-outline-primary");
			}
		});
	});

	$(".my-login-validation").submit(function() {
		var form = $(this);
        if (form[0].checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
		form.addClass('was-validated');
	});
});

function add_notice(alert, string){
	return '<div class="alert ' + alert + '" role="alert"><strong>' + string + '</strong></div>';
  }

var history_str = document.getElementsByClassName("demo")[0].innerHTML;
document.getElementsByClassName("demo")[0].remove();

var button = document.getElementsByTagName("button")[3];
console.log(history_str);

button.onclick = function(){
	var input =  button.parentNode.parentNode.getElementsByTagName("input");
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function(){
		
		if (this.readyState == 4 && this.status == 200){
			if(this.responseText != "null"){
				document.getElementById("notice").innerHTML = add_notice("success", "Đăng nhập thành công" );
				document.getElementsByClassName("alert")[0].style.display = "block";
				setTimeout(function(){document.getElementsByClassName("alert")[0].style.opacity = 0;}, 1500);
				window.location.href = this.responseText;
			}
			else{
				document.getElementById("notice").innerHTML = add_notice("fail", "Tên đăng nhập hoặc mật khẩu không đúng" );
				document.getElementsByClassName("alert")[0].style.display = "block";
				setTimeout(function(){document.getElementsByClassName("alert")[0].style.opacity = 0;}, 1500);; // addcart -> login => item // nhấn cart => login => cart // nhấn login => home => login đổi logout
			}
		}
	};
	xmlhttp.open("GET", "?url=Home/check_login/" + input[0].value + "/" + input[1].value + "/" + history_str + "/", true);
	xmlhttp.send();
};
