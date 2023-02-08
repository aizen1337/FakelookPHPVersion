    function getMessages() {
        var xhttp = new XMLHttpRequest();
        const id = new URLSearchParams(window.location.search).get('chatUser');
        xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
       document.getElementById("chat").innerHTML = xhttp.responseText;
          }
        };
          xhttp.open("GET", `chat/chat.php?chatUser=${id}`, true);
          xhttp.send();
      }
      function getActiveUsers() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("activeUsers").innerHTML = xhttp.responseText;
          }
        };
          xhttp.open("GET", `authcomponents/getActiveUsers.php`, true);
          xhttp.send();
      }
      function scroll() {
        const chat = document.getElementById('chat');
        setInterval(() => {
          chat.scrollTop = 10000;
        }, 10000)
      }
      $("#form").submit((e) => {
        e.preventDefault();
        const chat = document.getElementById('chat');
        var message = $('#chatbox').val();
        const id = new URLSearchParams(window.location.search).get('chatUser');
        $.ajax( 
          {
          url: `chat/sendMessage.php?chatUser=${id}`, 
          cache: false,
          data: {"chatbox": message},
          type: 'POST',
          success: (() => {
            $('#chatbox').val('');
            chat.scrollTop = chat.scrollHeight;
          }),
          error: ((xhr,status,error) => console.log(xhr,status,error))
        })
      })
      function realtime() {
      setInterval(() => {
        getMessages()
        getActiveUsers()
      },500)
      }
      window.onload = realtime();
      window.onload = scroll()