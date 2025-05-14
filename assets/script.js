document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('modal');
    const openModal = document.getElementById('openModal');
    const closeModalBtns = document.querySelectorAll('.close, .close-btn');

    openModal.onclick = () => modal.style.display = 'flex';
    closeModalBtns.forEach(btn => btn.onclick = () => modal.style.display = 'none');

    window.onclick = (e) => {
        if (e.target == modal) modal.style.display = 'none';
    };

    const form = document.getElementById('productForm');
    form.addEventListener('submit', e => {
        e.preventDefault();

        fetch('api.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify({
                title: form.title.value,
                price: form.price.value,
                dateTime: form.dateTime.value
            })
        })
        .then(res => res.json())
        .then(res => {
            document.querySelectorAll('.error').forEach(e => e.textContent = '');

            if (res.status === 'error') {
                Object.entries(res.errors).forEach(([field, msg]) => {
                    document.getElementById(`error-${field}`).textContent = msg;
                });
            } else {
                updateTable(res.products);
                form.reset();
                modal.style.display = 'none';
            }
        });
    });

    const updateTable = (products) => {
        const tbody = document.querySelector('#productTable tbody');
        tbody.innerHTML = '';
        products.forEach((p, i) => {
            tbody.innerHTML += `
                <tr>
                    <td data-label="#">${i+1}</td>
                    <td data-label="Title">${p.title}</td>
                    <td data-label="Price, USD">${p.price}</td>
                    <td data-label="Date and time">${p.dateTime}</td>
                </tr>`;
        });
    };

    fetch('api.php').then(r => r.json()).then(data => updateTable(data.products || []));
});
