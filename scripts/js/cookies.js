
document.addEventListener('DOMContentLoaded', function () {
    getTotalSave();
}, false);

// Saved Items Btn on Click
// const savedItemsBtn = document.getElementById('savedItemsBtn');
// savedItemsBtn.addEventListener('click', () => {
//     getTotalSave();
//     console.log('haha')
// })


function initCookies(prop) {

    const listSaveButtons = document.getElementsByClassName('list-card-save');

    // Add Event Listiner on every like button
    for (let i = 0; i < listSaveButtons.length; i++) {
        listSaveButtons[i].addEventListener('click', () => {
            if (listSaveButtons[i].classList.contains('list-saved')) {
                listDelete(listSaveButtons[i], prop['cookieName']);
            } else {
                listSave(listSaveButtons[i], prop['cookieName']);
            }
        });
    }

    // Check saved items
    if (getCookie(prop['cookieName'])) {
        const savedList = JSON.parse(getCookie(prop['cookieName']));

        savedList.forEach(list => {
            let listElement = document.getElementById('save-btn-' + list);
            let savedListElement = document.getElementById('saved-com-btn-' + list);
            let savedElement = document.getElementById(prop['listingID'] + list);

            (listElement) ? listElement.classList.add('list-saved') : null;
            (savedListElement) ? savedListElement.classList.add('list-saved') : null;

            if (savedElement) {
                savedElement.classList.replace('order-2', 'order-1');
            }
        });
    }
}

function getTotalSave(id, action) {
    const savedTotalElement = document.getElementById('saved-total');
    const savedCommunity = JSON.parse(getCookie('savedCommunity'));
    const savedQuickMoveIns = JSON.parse(getCookie('savedQuickMoveIns'));

    const communityEmptyLable = document.getElementById('communityEmptyLable');
    const QuickMoveInsEmptyLabel = document.getElementById('QuickMoveInsEmptyLabel');

    let comTotal = (savedCommunity) ? savedCommunity.length : 0;
    let qmiTotal = (savedQuickMoveIns) ? savedQuickMoveIns.length : 0;

    savedTotalElement.innerHTML = comTotal + qmiTotal;

    // Add Community to save list
    if (comTotal == 0) {
        communityEmptyLable.classList.remove('d-none')
    } else {
        communityEmptyLable.classList.add('d-none')

        savedCommunity.forEach(comID => {
            document.getElementById('savedCommWrap-' + comID).classList.remove('d-none');
        });
    }

    // Add QMI to save list
    if (qmiTotal == 0) {
        QuickMoveInsEmptyLabel.classList.remove('d-none');
    } else {
        QuickMoveInsEmptyLabel.classList.add('d-none');

        savedQuickMoveIns.forEach(qmiID => {
            document.getElementById('savedQmiWrap-' + qmiID).classList.remove('d-none');
        });
    }

    // Remove Community from save list
    if (id && action == 'remove') {
        const listElement = document.getElementById('savedCommWrap-' + id);
        (listElement) ? listElement.classList.add('d-none') : null;
    }

    // Remove Community from save list
    if (id && action == 'remove') {
        const listElement = document.getElementById('savedQmiWrap-' + id);
        (listElement) ? listElement.classList.add('d-none') : null;
    }
}

function listSave(list, name) {
    const listID = list.dataset.listid;
    const pageID = list.dataset.pageid;
    const sqltable = list.dataset.sqltable;
    const savedListElement = document.getElementById('saved-com-btn-' + listID);

    list.classList.add('list-saved');
    (savedListElement) ? savedListElement.classList.add('list-saved') : null;

    let savedList = [];

    if (getCookie(name)) {
        savedList = JSON.parse(getCookie(name));
    }

    savedList.push(parseInt(listID));

    savedList = savedList.filter(distinct);

    setCookie(name, JSON.stringify(savedList), 365);

    getTotalSave(listID, 'save');

    // Insert saved items with current IP to MySQL DB
    fetch('https://freegeoip.app/json/', { mode: 'cors' })
        .then((resp) => resp.json())
        .then((ip) => {
            ajaxReq(ip, pageID, sqltable)
        });
}

// Ajax POST
function ajaxReq(ipInfo, pageID, sqltable) {

    var formData = new FormData();
    formData.append('pageID', pageID);
    formData.append('sqltable', sqltable);
    for (var k in ipInfo) {
        formData.append(k, ipInfo[k]);
    }

    const xhr = new XMLHttpRequest();
    xhr.open('POST', '../../includes/components/visitorAnalytics/ajaxRequest.php', true);
    xhr.send(formData);

    xhr.onreadystatechange = function () {
        const DONE = 4; // readyState 4 means the request is done.
        const OK = 200; // status 200 is a successful return.
        if (xhr.readyState === DONE) {
            if (xhr.status === OK) {
                console.log(xhr.responseText); // 'This is the returned text.'
            } else {
                console.log('Error: ' + xhr.status); // An error occurred during the request.
            }
        }
    };
}

function listDelete(list, name) {
    const listID = list.dataset.listid;
    const listElement = document.getElementById('save-btn-' + listID);

    list.classList.remove('list-saved');
    listElement.classList.remove('list-saved');

    let savedList = [];

    if (getCookie(name)) {
        savedList = JSON.parse(getCookie(name));
    }

    savedList = savedList.filter(function (value, index, arr) {
        return value != listID
    });

    setCookie(name, JSON.stringify(savedList), 365);

    getTotalSave(listID, 'remove');
}


function setCookie(name, value, days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "") + expires + "; path=/";
}

function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}

function distinct(value, index, self) {
    return self.indexOf(value) === index;
}
