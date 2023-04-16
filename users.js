const searchBar = document.querySelector(".usuarios .search input"),
searchButton = document.querySelector(".usuarios .search button"),
userList = document.querySelector(".usuarios .lista-usuarios");

searchButton.onclick = () =>{
    searchBar.focus();
    searchButton.style.background = "#f8f5f5";
    searchButton.style.color = "red";
    searchButton.style.cursor = "pointer";
    searchButton.style.borderRadius = "5px 5px 5px 5px";
    searchBar.classList.toggle("active");
    searchButton.classList.toggle("active");
    searchBar.value = "";
    console.log(searchBar.classList);
        searchBar.onblur = () => {
            searchButton.classList.toggle("active");
            searchBar.classList.remove("active");
            searchButton.style.position = "relative";
            searchButton.style.margin = "14px";
            searchButton.style.zIndex = "1";
            searchButton.style.width = "45px";
            searchButton.style.height = "42px";
            searchButton.style.fontSize = "17px";
            searchButton.style.cursor = "pointer";
            searchButton.style.border = "none";
            searchButton.style.background = "#fff";
            searchButton.style.color = "#333";
            searchButton.style.outline = "none";
            searchButton.style.borderRadius = "0 5px 5px 0";
            searchButton.style.transition = "all 0.2s ease";
            searchButton.style.background = "#f50243";
            searchButton.style.color = "#fff";
            searchButton.style.borderRadius = "20%";
            console.log(searchButton.classList);
        }
    }   


searchBar.onkeyup = ()=>{
  let searchTerm = searchBar.value;
  if(searchTerm != ""){
    searchBar.classList.add("active");
  }else{
    searchBar.classList.remove("active");
  }
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/search.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          let data = xhr.response;
          userList.innerHTML = data;
        }
    }
  }
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("searchTerm=" + searchTerm);
}

setInterval(() =>{
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "php/users.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          let data = xhr.response;
          if(!searchBar.classList.contains("active")){
            userList.innerHTML = data;
          }
        }
    }
  }
  xhr.send();
}, 500);

