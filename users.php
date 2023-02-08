<!DOCTYPE html>
<html lang="en">
    <?php include "components/head.php"?>
<body>
    <?php include "components/navbar.php"?>
</body>
    <div class="flex-container">
        <form class="text-center form">
            <input id="search-input" type="search" id="form1" onkeyup=fetchUsers(this.value) class="searchbar" />
          <button id="search-button" type="button" class="searchbutton">
             <i class="fas fa-search"></i>
          </button>
        </form>
        <div class="posts" id="posts">
        </div>
    </div>
<script>
    function fetchUsers(str) {
        if (str.length == 0) {
          document.getElementById("posts").innerHTML = "";
          return;
        } else {
          const xmlhttp = new XMLHttpRequest();
          xmlhttp.onload = function() {
            document.getElementById("posts").innerHTML = this.responseText;
          }
        xmlhttp.open("GET", "authcomponents/getUsers.php?user=" + str, true);
        xmlhttp.send();
        }
      }
</script>
</html>
