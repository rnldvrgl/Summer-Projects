const listsContainer = document.querySelector('[data-lists]')
const newListForm = document.querySelector('[data-new-list-form]')
const newListInput = document.querySelector('[data-new-list-input]')

const LOCAL_STORAGE_LIST_KEY = 'task.lists'
const LOCAL_STORAGE_LIST_ID_KEY = 'task.selectedListId'
let lists = JSON.parse(localStorage.getItem(LOCAL_STORAGE_LIST_KEY)) || []

let selecterdListId = localStorage.getItem(LOCAL_STORAGE_LIST_ID_KEY)

listsContainer.addEventListener('click', e => {
   if (e.target.tagName.toLowerCase() === 'li') {
      selecterdListId = e.target.dataset.listId
      saveAndRender()
   }
})

newListForm.addEventListener('submit', e => {
   e.preventDefault()
   const listName = newListInput.value
   if (listName == null || listName === '') return
   const list = createList(listName)
   newListInput.value = null
   lists.push(list)
   saveAndRender()
})


function createList(name) {
   return {
      id: Date.now().toString(),
      name: name,
      tasks: []
   }
}

function saveAndRender() {
   save()
   render()
}

function save() {
   localStorage.setItem(LOCAL_STORAGE_LIST_KEY, JSON.stringify(lists))
   localStorage.setItem(LOCAL_STORAGE_LIST_ID_KEY, selecterdListId)
}

function render() {
   clearElement(listsContainer)
   lists.forEach(list => {
      const listElement = document.createElement('li')
      listElement.dataset.listId = list.id
      listElement.classList.add("list-name")
      listElement.innerText = list.name
      if (list.id === selecterdListId) {
         listElement.classList.add('active-list')
      }
      listsContainer.appendChild(listElement)
   })
}

function clearElement(element) {
   while (element.firstChild) {
      element.removeChild(element.firstChild)
   }
}

render()