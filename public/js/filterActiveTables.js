function filterTables(element) {
    const diningArea = element.getAttribute('data-dining-area');
    const diningAreaButtons = document.querySelectorAll('[data-dining-area]');

    diningAreaButtons.forEach((button) => {
        button.classList.remove('bg-indigo-100', 'text-indigo-700', 'rounded-full');
    });

    element.classList.add('bg-indigo-100', 'text-indigo-700', 'rounded-full');

    const tables = document.querySelectorAll('tr[data-dining-area]');
    tables.forEach((table) => {
        table.style.display = 'none';
    });

    const filteredTables = document.querySelectorAll(`tr[data-dining-area="${diningArea}"]`);
    filteredTables.forEach((table) => {
        table.style.display = 'table-row';
    });
}

document.addEventListener('DOMContentLoaded', () => {
    const firstButton = document.querySelector('[data-dining-area]');
    filterTables(firstButton);
});
