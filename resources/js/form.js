const formContainer = document.querySelector('.form-component')

document.addEventListener('editRecord', event => {
  const data = event.detail.data
  showElement(data)
})

formContainer.addEventListener('click', async event => {
  if (event.target.closest('.clean-btn')) {
    event.preventDefault()
    formContainer.querySelector('form').reset()
  }

  if (event.target.closest('.save-btn')) {
    event.preventDefault()

    const form = document.querySelector('form')
    const formData = new FormData(form)
    const tableEndpoint = event.target.dataset.endpoint

    try {
      const response = await fetch(form.action, {
        method: 'POST',
        body: formData,
        headers: {
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
      })

      document.dispatchEvent(new CustomEvent('refreshTable', {
        detail: {
          endpoint: tableEndpoint
        }
      }))

    } catch (error) {
      console.log(error)
    }
  }
})

const showElement = data => {
  Object.entries(data.element).forEach(([key, value]) => {
    const input = formContainer.querySelector(`[name="${key}"]`)
    if (input) {
      input.value = value
    }
  })
}
