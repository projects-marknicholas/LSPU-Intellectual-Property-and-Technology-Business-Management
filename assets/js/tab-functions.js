document.addEventListener("DOMContentLoaded", function() {
  const tabs = document.querySelectorAll(".tab");
  const contents = document.querySelectorAll(".content");
  const mission = document.getElementById("mission-circle");
  const vision = document.getElementById("vision-circle");
  const mandate = document.getElementById("mandate-circle");
  
  contents[0].style.display = "block";

  tabs.forEach(tab => {
    tab.addEventListener("click", function() {
      const tabId = this.id;
      const contentId = `content${tabId.slice(-1)}`;

      contents.forEach(content => {
        content.style.display = "none";
      });

      tabs.forEach(tab => {
        tab.classList.remove("active-tab");
      });

      document.getElementById(contentId).style.display = "block";
      this.classList.add("active-tab");

      if (contentId === "content1") {
      	mission.classList.remove("fade");
        vision.classList.add("fade");
        mandate.classList.add("fade");
      } 
      else if (contentId === "content2") {
      	vision.classList.remove("fade");
        mission.classList.add("fade");
        mandate.classList.add("fade");
      } 
      else if (contentId === "content3") {
      	mandate.classList.remove("fade");
        mission.classList.add("fade");
        vision.classList.add("fade");
      } 
      else {
      	mission.classList.remove("fade");
        vision.classList.add("fade");
        mandate.classList.add("fade");
      }
    });
  });
});