// onload
document.addEventListener('DOMContentLoaded', () => {
  const addMemberButton = document.getElementById('add-invite-member');
  addMemberButton.addEventListener('click', (event) => {
    event.preventDefault();
    const members = document.getElementById('members');

    const lbl = document.createElement('label');
    lbl.textContent = "CWID"

    const newField = document.createElement('input');
    newField.setAttribute('type','number');
    newField.setAttribute('name', 'member[]');

    members.appendChild(lbl);
    members.appendChild(newField);
  });

  const remove = document.getElementById('remove-invite-member');
  remove.addEventListener('click', (event) => {
    event.preventDefault();
    const members = document.getElementById('members');

    // input
    members.childNodes[members.childNodes.length - 1].remove();

    // label
    members.childNodes[members.childNodes.length - 1].remove();
  });

  const members = document.getElementById('members');
  const config = { childList: true };
  const cb = (mutations) => {
    for(let mutation of mutations) {
      if(mutation.type == 'childList') {
        const tooMany = members.querySelectorAll('input').length >= 6;
        if(tooMany) {
          addMemberButton.setAttribute('disabled', 'true');
          //data-position="bottom" data-tooltip="I am a tooltip"
          addMemberButton.setAttribute('data-position', 'top');
          addMemberButton.setAttribute('data-tooltip', '"You\'ve exceeded the maximum amount of group members."')
        } else {
          addMemberButton.removeAttribute('disabled');
        }
      }
    }
  }
  const mo = new MutationObserver(cb);
  mo.observe(members, config);
});
