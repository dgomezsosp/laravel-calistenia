document.addEventListener('DOMContentLoaded', () => {

  const modal = document.querySelector('.modal-overlay');
  const modalText = document.querySelector('.modal-text span');

  document.addEventListener('showDeleteModal', (event) => {
    modalText.textContent = `¿Estás seguro de eliminar "${event.detail.name}"?`;
    modal.dataset.id = event.detail.id;
    modal.dataset.endpoint = event.detail.endpoint;
    modal.classList.add('active');
  });

  modal.addEventListener('click', async (event) => {

    if (event.target.closest('.btn-confirm')) {
      try {
        modal.classList.remove('active');
        const endpoint = modal.dataset.endpoint
        const recordId = modal.dataset.recordId

        const response = await fetch(endpoint, {
          method: 'DELETE',
          headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Accept': 'application/json',
            'X-Requested-With': 'XMLHttpRequest'
          }
        });

        const data = await response.json();

        if (!response.ok) {
          throw new Error(data.error || 'Error al eliminar el registro');
        }

        document.dispatchEvent(new CustomEvent('notice', {
          detail: {
            message: data.message || 'Registro eliminado correctamente',
            type: 'success'
          }
        }));

        document.dispatchEvent(new CustomEvent('recordDeleted', {
          detail: {
            id: recordId
          }
        }));

      } catch (error) {
        document.dispatchEvent(new CustomEvent('notice', {
          detail: {
            message: error.message || 'No se pudo eliminar el registro',
            type: 'error'
          }
        }));
      }
    }

    if (event.target.closest('.btn-cancel')) {
      modal.classList.remove('active');
    }
    if (event.target.closest('.close-button')) {
      modal.classList.remove('active');
    }

    if (event.target.classList.contains('modal-overlay')) {
      modal.classList.remove('active');
    }
  });

});