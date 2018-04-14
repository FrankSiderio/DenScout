document.addEventListener('DOMContentLoaded', () => {
  // on load here
});

let sourceParent = null;

function dragstart_handler(ev) {
  // Add the target element's id to the data transfer object

  ev.dataTransfer.setData("text/plain", ev.target.id);
  ev.dropEffect = "move";
  ev.dataTransfer.dropEffect = "copy";

  sourceParent = ev.currentTarget.parentNode;
}

function dragover_handler(ev) {
 ev.preventDefault();
 // Set the dropEffect to move
 ev.dataTransfer.dropEffect = "move"
}

function drop_handler(ev) {
 ev.preventDefault();
 // Get the id of the target and add the moved element to the target's DOM
 const data = ev.dataTransfer.getData("text");

 const drop_area = ev.currentTarget;

if(drop_area.classList.contains('occupied') && drop_area.classList.contains('ra-drop')) {
  return;
}

 console.log(drop_area);
 console.log(sourceParent);
 if(sourceParent === drop_area) {
   return;
 } else {
   sourceParent.classList.remove('occupied')
 }
 
 drop_area.appendChild(document.getElementById(data));
 drop_area.classList.add('occupied');
}

/*
function dragstart_handler(ev) {
 // Add the target element's id to the data transfer object
 ev.dataTransfer.setData("text/plain", ev.target.id);
 ev.dropEffect = "move";
}
function dragover_handler(ev) {
 ev.preventDefault();
 // Set the dropEffect to move
 ev.dataTransfer.dropEffect = "move"
}
function drop_handler(ev) {
 ev.preventDefault();
 // Get the id of the target and add the moved element to the target's DOM
 var data = ev.dataTransfer.getData("text");
 ev.target.appendChild(document.getElementById(data));
}
 */
