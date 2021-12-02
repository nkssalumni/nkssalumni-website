(function () {
  const links = document.querySelector(".links");
 
  //Event Delegation
  links.addEventListener("click", event =>
    getModal(event.target.dataset.endpoint)
  );
 
  async function getModal(endpoint) {
    const data = await getModalData(endpoint);
    const html = renderHTML(data);
    const body = document.querySelector("body");
 
    body.insertAdjacentHTML("beforeend", html);
 
    const modal = body.querySelector(".modal");
    modal.classList.add("active");
 
    const modalClose = modal.querySelector("#modal-close");
 
    modalClose.addEventListener("click", function () {
      modal.remove();
    });
  }
 
  //Get data from the server, using a dummy json place holder
  // lets assume it returns{ header: "header 1", title: "Title 1", body: "Lorem Ipsum" }
  async function getModalData() {
    try {
      const response = await new Promise(resolve => {
        setTimeout(() => {
          resolve({header: 'header', title:'title', body: });
        }, 500);
      });
 
      if (response) {
        return response;
      } else {
        console.warn(response);
        return {
          title: "Error",
          id: "Please Try later"
        };
      }
    } catch (error) {
      console.warn(error);
      return {
        title: "Error",
        id: "Please Try later"
      };
    }
  }
 
  //render html
  function renderHTML(data) {
    const renderModalHTML = `
      <div class="modal">
          <div class="modal-overlay"></div>
          <div class="modal-container">
          <div class="modal-header">
              <strong>${data.header}</strong>
              <button id="modal-close">X</button>
          </div>
          <div class="modal-body">
              <h1>${data.title}</h1>
              <p>${data.body}</p>
          </div>
          </div>
      </div>`;
 
    return renderModalHTML;
  }
})();
