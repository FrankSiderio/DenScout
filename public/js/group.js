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

    if(members.children.length >= 10) {
      addMemberButton.setAttribute('')
    }
  });

  const members = document.getElementById('members');
  members.
});
