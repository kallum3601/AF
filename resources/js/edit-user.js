

document.addEventListener('DOMContentLoaded', () => {
    const addAddressBtn = document.getElementById('add-extra-address-btn');
    const extraAddressField = document.getElementById('add-extra-address-container');
    
    if (addAddressBtn) {
        console.log('found');
        let addressBtnClicks = 2;

        addAddressBtn.addEventListener('click', (e) => {
            e.preventDefault();
            extraAddressField.insertAdjacentHTML('beforeend', `
                <label for="add-address-${addressBtnClicks}">Add Address:</label>
                <input type="text" name="addresses[]" required>
            `);

            addressBtnClicks += 1;
        });
    }
});