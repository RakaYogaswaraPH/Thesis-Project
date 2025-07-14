document.getElementById('searchInput').addEventListener('input', filterTable);
document.getElementById('kelasFilter').addEventListener('change', filterTable);

function filterTable() {
    const searchValue = document.getElementById('searchInput').value.toLowerCase();
    const selectedKelas = document.getElementById('kelasFilter').value;
    const rows = document.querySelectorAll('#rankingBody tr');
    const emptyRowId = 'noResultRow';
    const tbody = document.getElementById('rankingBody');

    let visibleCount = 0;

    rows.forEach(row => {
        if (row.id === emptyRowId) {
            return;
        }

        const namaAnak = row.children[1].textContent.toLowerCase();
        const kelas = row.children[2].textContent;

        const matchNama = namaAnak.includes(searchValue);
        const matchKelas = selectedKelas === "" || kelas === selectedKelas;

        if (matchNama && matchKelas) {
            row.style.display = '';
            visibleCount++;
        } else {
            row.style.display = 'none';
        }
    });

    const existingEmptyRow = document.getElementById(emptyRowId);

    if (visibleCount === 0) {
        if (!existingEmptyRow) {
            const tr = document.createElement('tr');
            tr.id = emptyRowId;

            const td = document.createElement('td');
            td.colSpan = 5;
            td.className = 'text-center py-6 text-gray-500';
            td.textContent = 'Nama tidak ditemukan.';

            tr.appendChild(td);
            tbody.appendChild(tr);
        }
    } else {
        if (existingEmptyRow) {
            existingEmptyRow.remove();
        }
    }
}


function downloadPDF() {
    import('https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.28/jspdf.plugin.autotable.min.js').then(() => {
        const {
            jsPDF
        } = window.jspdf;
        const doc = new jsPDF();

        doc.text("Ranking Tes Kecerdasan", 14, 16);
        doc.autoTable({
            startY: 20,
            html: '#rankingTable',
            headStyles: {
                fillColor: [41, 128, 185]
            },
        });

        doc.save("ranking_tes.pdf");
    });
}