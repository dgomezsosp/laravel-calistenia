
document.querySelector('.table').addEventListener('click', async (event) => {
  if (event.target.closest('.delete-button')) {
    const button = event.target.closest('.delete-button')
    const recordId = button.dataset.id
    const recordName = button.dataset.name
    const endpoint = button.dataset.endpoint

    document.dispatchEvent(new CustomEvent('showDeleteModal', {
      detail: {
        id: recordId,
        name: recordName,
        endpoint: endpoint
      }
    }))
  }


  if (event.target.closest('.edit-button')) {
    const button = event.target.closest('.edit-button')
    const endpoint = button.dataset.endpoint

    const response = await fetch(endpoint)
    const data = await response.json()

    document.dispatchEvent(new CustomEvent('editRecord', {
      detail: {
        data
      }
    }))
  }
})


