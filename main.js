$(document).ready(function(){
					$('#message_button').click(function(){
						if($('#message_button').val() == 'Show Message BOX')
						{
							$('#message_gen').css('display','block');
							$('#message_button').attr('value','Hide Message BOX');
						}
						else if($('#message_button').val() == 'Hide Message BOX')
						{
							$('#message_gen').css('display','none');
							$('#message_button').attr('value','Show Message BOX');
						}
												
					});
			});
			
			
			
			
				
			function load(b){
				var title = $('#message_title').val();
				var desc = $('#message_area').val();
				desc = desc.replace(/\r?\n/g, '<br />');
				var branch = b;
				if(title == '' || desc == '')
				{
						
					alert('Title and Description both are compulsary');
				}
				else
				{
					$.post('update.php', {title:title, desc:desc, branch:branch}, function(data){
						if(data)
						{
								var mydiv = document.createElement('div');
									mydiv.setAttribute("id","m_box");
									mydiv.innerHTML = data;
									mydiv.setAttribute("style","border:1px solid orange;padding:5px;margin-top:5px;border-radius:5px;");
								
									var div1 = document.getElementById('n_m');
									div1.appendChild(mydiv);
									
							$('#erer').text('Message posted').show();
							setTimeout(function(){$('#erer').text('Message posted').hide();},2000);
							document.getElementById('message_title').value = "";
							document.getElementById('message_area').value = "";
							if(document.getElementById('m_box') == 'undefined'){
								alert('undefined');
							}else{
								div1.insertBefore(mydiv, document.getElementById('m_box'));
							}
						}else{
							$('#erer').text('Message not posted').show();
							setTimeout(function(){$('#erer').text('Message not posted').hide();},2000);

						}
								
					});		
				}
						
			}
	