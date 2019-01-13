function startMainTabs() {
    //Get the dom obj of the mainController html id
    const mainTabController = document.getElementById('mainTabController');
    //Get the mainController child divs
    const tabControllerList = mainTabController.children;

    //For in -> interact an object 
    for (const key in tabControllerList) {
        if (tabControllerList.hasOwnProperty(key)) {
            const tabController = tabControllerList[key];
            tabController.addEventListener('click', changeTab);
        }
    }
}

function changeTab(event) {
    const tabReference = event.target.getAttribute("newtag");
    const mainContent = document.getElementById('mainContent');
    const contentList = mainContent.children;
    for (const key in contentList) {
        if (contentList.hasOwnProperty(key)) {
            const element = contentList[key];
            const classList = element.classList;
            if (tabReference === element.id) {
                const newClassList = [];
                for (const key in classList) {
                    if (classList.hasOwnProperty(key)) {
                        const elementClass = classList[key];
                        if (elementClass === "content-hidden") {
                            newClassList.push("content-active");
                        } else {
                            newClassList.push(elementClass);
                        }
                    }
                }
                element.setAttribute("class", newClassList.join(" "));
            } else {
                const newClassList = [];
                for (const key in classList) {
                    if (classList.hasOwnProperty(key)) {
                        const elementClass = classList[key];
                        if (elementClass === "content-active") {
                            newClassList.push("content-hidden");
                        } else {
                            newClassList.push(elementClass);
                        }
                    }
                }
                element.setAttribute("class", newClassList.join(" "));
            }
        }
    }
}

startMainTabs();