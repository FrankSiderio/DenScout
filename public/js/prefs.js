document.addEventListener('DOMContentLoaded', () => {
  // on load here
  //
  const prefs = document.getElementsByClassName('prefs')[0];

  // observe prefs
  const config = { childList: true, subtree: true };
  const onMutate = mutations => {
    for(let m of mutations) {
      if(m.type === 'childList') {
        // check how many prefs are occupied
        const allPrefs = document.getElementsByClassName('pref');

        let occupied = 0;

        for(let p of allPrefs) {
          for(let subp of p.children) {
            if(subp.classList.contains('occupied')) {
              occupied += 1;
            }
          }
        }

        // the button, that is
        if(occupied >= 3) {
          const submitPrefsButton = document.getElementById('submitPrefsButton');
          submitPrefsButton.removeAttribute('disabled');
        } else {
          submitPrefsButton.setAttribute('disabled', true);
        }
      }
    }
  };
  const mo = new MutationObserver(onMutate);
  mo.observe(prefs, config);


});

function onSubPrefs(event) {
  event.preventDefault();

  const form = document.forms[0];
  const prefs = document.getElementsByClassName('ra-drop');
  for(let p of prefs) {
    const hidden = document.createElement('input');
    hidden.setAttribute('type', 'hidden');
    hidden.setAttribute('value', p.children[0].id);
    form.appendChild(hidden);
  }
  form.submit();
}

let sourceParent = null;

// function touchDeviceSelect(elem) {
//   console.log('clicked!');
//   if(!is_touch_device()) {
//     console.log("not touch device");
//     return;
//   }
//
//   // parent is ra then put into next empty pref
//   if(elem.parentNode.classList.contains('ra')) {
//     const prefs = document.getElementsByClassName('pref');
//     const ra = elem.parentNode;
//     for(let pref of prefs) {
//       if(!pref.classList.contains('occupied')) {
//         console.log(pref.children[pref.children.length - 1]);
//         pref.children[pref.children.length - 1].appendChild(elem);
//         pref.classList.add('occupied');
//       }
//     }
//   } else {
//     console.log('no move!');
//   }
//   // parent is pref, put back into ra
// }

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
  //  add the moved element to the target's DOM
  const data = ev.dataTransfer.getData("text");

  const drop_area = ev.currentTarget;

  if(drop_area.classList.contains('occupied') && drop_area.classList.contains('ra-drop')) {
    return;
  }

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
function is_touch_device() {
  return 'ontouchstart' in window        // works on most browsers
  || navigator.maxTouchPoints;       // works on IE10/11 and Surface
};
