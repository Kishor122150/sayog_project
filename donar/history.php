<?php
// history.php
// NO session_start() here because sidebar.php already has it
include 'includes/sidebar.php';
?>

<style>
    .history-container {
        background: white;
        border-radius: 16px;
        padding: 25px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
    }

    .filter-section {
        background: #f8fafc;
        padding: 20px;
        border-radius: 12px;
        margin-bottom: 25px;
    }

    .filter-select,
    .filter-input {
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        padding: 8px 12px;
        width: 100%;
    }

    .badge-status {
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        display: inline-block;
    }

    .badge-completed {
        background: #dcfce7;
        color: #166534;
    }

    .badge-delivered {
        background: #dbeafe;
        color: #1e40af;
    }

    .badge-cancelled {
        background: #fee2e2;
        color: #991b1b;
    }

    .badge-expired {
        background: #fef3c7;
        color: #92400e;
    }

    .history-table {
        width: 100%;
        border-collapse: collapse;
    }

    .history-table th {
        text-align: left;
        padding: 12px 15px;
        background: #f8fafc;
        font-weight: 600;
        color: #1f2937;
        border-bottom: 2px solid #e2e8f0;
    }

    .history-table td {
        padding: 15px;
        border-bottom: 1px solid #e2e8f0;
        vertical-align: middle;
    }

    .history-table tr:hover {
        background: #f8fafc;
    }

    .action-buttons {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }

    .btn-view {
        background: #16a34a;
        color: white;
        border: none;
        padding: 6px 14px;
        border-radius: 6px;
        font-size: 0.75rem;
        cursor: pointer;
        transition: all 0.2s;
    }

    .btn-view:hover {
        background: #14532d;
        transform: scale(1.05);
    }

    .btn-download {
        background: #3b82f6;
        color: white;
        border: none;
        padding: 6px 14px;
        border-radius: 6px;
        font-size: 0.75rem;
        cursor: pointer;
        transition: all 0.2s;
    }

    .btn-download:hover {
        background: #2563eb;
        transform: scale(1.05);
    }

    .pagination {
        display: flex;
        justify-content: center;
        gap: 8px;
        margin-top: 25px;
    }

    .page-btn {
        padding: 8px 14px;
        border: 1px solid #e2e8f0;
        background: white;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.2s;
    }

    .page-btn:hover {
        background: #16a34a;
        color: white;
        border-color: #16a34a;
    }

    .page-btn.active {
        background: #16a34a;
        color: white;
        border-color: #16a34a;
    }

    .stats-summary {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 15px;
        margin-bottom: 25px;
    }

    .stat-summary-card {
        background: linear-gradient(135deg, #f0fdf4, #dcfce7);
        padding: 15px;
        border-radius: 12px;
        text-align: center;
    }

    .stat-summary-number {
        font-size: 28px;
        font-weight: 700;
        color: #16a34a;
    }

    .stat-summary-label {
        font-size: 12px;
        color: #6b7280;
        margin-top: 5px;
    }

    @media (max-width: 768px) {
        .history-table {
            display: block;
            overflow-x: auto;
        }

        .filter-section .row {
            gap: 10px;
        }

        .stats-summary {
            grid-template-columns: repeat(2, 1fr);
        }

        .action-buttons {
            flex-direction: column;
            gap: 5px;
        }

        .btn-view,
        .btn-download {
            width: 100%;
        }
    }

    .empty-state {
        text-align: center;
        padding: 50px;
        color: #94a3b8;
    }

    .empty-state i {
        font-size: 48px;
        margin-bottom: 15px;
    }

    .modal {
        display: none;
        position: fixed;
        z-index: 9999;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
    }

    .modal-content {
        background-color: white;
        margin: 5% auto;
        padding: 25px;
        border-radius: 16px;
        width: 90%;
        max-width: 500px;
        position: relative;
        animation: modalSlideIn 0.3s ease;
    }

    @keyframes modalSlideIn {
        from {
            transform: translateY(-50px);
            opacity: 0;
        }

        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    .modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 1px solid #e2e8f0;
    }

    .close-modal {
        cursor: pointer;
        font-size: 24px;
        color: #94a3b8;
        transition: color 0.2s;
    }

    .close-modal:hover {
        color: #ef4444;
    }

    .detail-row {
        margin-bottom: 12px;
        display: flex;
        flex-wrap: wrap;
    }

    .detail-label {
        width: 120px;
        font-weight: 600;
        color: #4b5563;
    }

    .detail-value {
        flex: 1;
        color: #1f2937;
    }

    .receipt-header {
        text-align: center;
        margin-bottom: 20px;
    }

    .receipt-header i {
        font-size: 48px;
        color: #16a34a;
    }

    .btn-close-modal {
        background: #16a34a;
        color: white;
        border: none;
        padding: 8px 20px;
        border-radius: 6px;
        cursor: pointer;
        transition: all 0.2s;
    }

    .btn-close-modal:hover {
        background: #14532d;
        transform: scale(1.05);
    }

    .toast-notification {
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 9999;
        animation: slideIn 0.3s ease;
    }

    .toast-success {
        background: #16a34a;
        color: white;
        padding: 12px 24px;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    @keyframes slideIn {
        from {
            transform: translateX(100%);
            opacity: 0;
        }

        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
</style>

<div class="history-container">
    <h4 class="mb-4"><i class="bi bi-clock-history me-2"></i>Donation History</h4>

    <!-- Stats Summary -->
    <div class="stats-summary">
        <div class="stat-summary-card">
            <div class="stat-summary-number">48</div>
            <div class="stat-summary-label">Total Donations</div>
        </div>
        <div class="stat-summary-card">
            <div class="stat-summary-number">156</div>
            <div class="stat-summary-label">Meals Donated</div>
        </div>
        <div class="stat-summary-card">
            <div class="stat-summary-number">32</div>
            <div class="stat-summary-label">Happy Recipients</div>
        </div>
        <div class="stat-summary-card">
            <div class="stat-summary-number">₹24,500</div>
            <div class="stat-summary-label">Estimated Value</div>
        </div>
    </div>

    <!-- Filter Section -->
    <div class="filter-section">
        <div class="row g-3">
            <div class="col-md-3">
                <label class="form-label">Status Filter</label>
                <select class="filter-select" id="statusFilter" onchange="filterHistory()">
                    <option value="all">All Status</option>
                    <option value="completed">Completed</option>
                    <option value="delivered">Delivered</option>
                    <option value="cancelled">Cancelled</option>
                    <option value="expired">Expired</option>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label">Date From</label>
                <input type="date" class="filter-input" id="dateFrom" onchange="filterHistory()">
            </div>
            <div class="col-md-3">
                <label class="form-label">Date To</label>
                <input type="date" class="filter-input" id="dateTo" onchange="filterHistory()">
            </div>
            <div class="col-md-3">
                <label class="form-label">Search</label>
                <input type="text" class="filter-input" id="searchInput" placeholder="Search by food item..." onkeyup="filterHistory()">
            </div>
        </div>
    </div>

    <!-- History Table -->
    <div class="table-responsive">
        <table class="history-table" id="historyTable">
            <thead>
                <tr>
                    <th>Donation ID</th>
                    <th>Food Item</th>
                    <th>Quantity</th>
                    <th>Recipient</th>
                    <th>Donated Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="historyTableBody">
                <!-- Data will be populated by JavaScript -->
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="pagination" id="pagination">
        <!-- Pagination buttons will be added by JavaScript -->
    </div>
</div>

<!-- Modal for Donation Details -->
<div id="detailModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="mb-0"><i class="bi bi-info-circle-fill me-2"></i>Donation Details</h5>
            <span class="close-modal" onclick="closeModal()">&times;</span>
        </div>
        <div id="modalBody">
            <!-- Dynamic content will be inserted here -->
        </div>
    </div>
</div>

<script>
    // Sample donation history data
    const donationsHistory = [{
            id: '#DON-001',
            foodItem: 'Fresh Vegetables',
            quantity: '50 kg',
            recipient: 'Annapurna Foundation (NGO)',
            donatedDate: '2024-03-15',
            status: 'completed',
            message: 'Thank you for your generous donation!',
            pickupAddress: '123 Main Street, Mumbai',
            deliveredTo: 'Annapurna Foundation Office',
            deliveredBy: 'Food Delivery Partner',
            deliveryDate: '2024-03-16',
            receiverName: 'Priya Sharma',
            receiverContact: '+91 98765 43210'
        },
        {
            id: '#DON-002',
            foodItem: 'Cooked Meals',
            quantity: '30 plates',
            recipient: 'Local Community Center',
            donatedDate: '2024-03-14',
            status: 'delivered',
            message: 'Received with thanks!',
            pickupAddress: '45 Park Street, Mumbai',
            deliveredTo: 'Community Center',
            deliveredBy: 'Self Pickup',
            deliveryDate: '2024-03-14',
            receiverName: 'Rajesh Kumar',
            receiverContact: '+91 98765 12345'
        },
        {
            id: '#DON-003',
            foodItem: 'Bread Packets',
            quantity: '100 packets',
            recipient: 'Green Earth Mission',
            donatedDate: '2024-03-12',
            status: 'completed',
            message: 'Very helpful for our food drive!',
            pickupAddress: '78 Garden Road, Mumbai',
            deliveredTo: 'Green Earth Mission Center',
            deliveredBy: 'Food Delivery Partner',
            deliveryDate: '2024-03-13',
            receiverName: 'Amit Patel',
            receiverContact: '+91 98765 67890'
        },
        {
            id: '#DON-004',
            foodItem: 'Rice (Basmati)',
            quantity: '25 kg',
            recipient: 'Hope Foundation',
            donatedDate: '2024-03-10',
            status: 'completed',
            message: 'Quality rice, very helpful!',
            pickupAddress: '12/4 Lake View, Mumbai',
            deliveredTo: 'Hope Foundation Office',
            deliveredBy: 'Food Delivery Partner',
            deliveryDate: '2024-03-11',
            receiverName: 'Sunita Verma',
            receiverContact: '+91 98765 54321'
        },
        {
            id: '#DON-005',
            foodItem: 'Fruits (Seasonal)',
            quantity: '40 kg',
            recipient: 'Children\'s Home',
            donatedDate: '2024-03-08',
            status: 'completed',
            message: 'Kids loved the fruits!',
            pickupAddress: '56 Green Fields, Mumbai',
            deliveredTo: 'Children\'s Home',
            deliveredBy: 'Self Pickup',
            deliveryDate: '2024-03-08',
            receiverName: 'Meera Das',
            receiverContact: '+91 98765 98765'
        },
        {
            id: '#DON-006',
            foodItem: 'Dairy Products',
            quantity: '20 litres',
            recipient: 'Old Age Home',
            donatedDate: '2024-03-05',
            status: 'cancelled',
            message: 'Cancelled due to expiry',
            pickupAddress: '90 Sunrise Apartments, Mumbai',
            deliveredTo: 'Not Delivered',
            deliveredBy: 'N/A',
            deliveryDate: 'N/A',
            receiverName: 'N/A',
            receiverContact: 'N/A'
        },
        {
            id: '#DON-007',
            foodItem: 'Packaged Snacks',
            quantity: '200 packets',
            recipient: 'Food Bank',
            donatedDate: '2024-03-01',
            status: 'expired',
            message: 'Expired before pickup',
            pickupAddress: '34 Industrial Area, Mumbai',
            deliveredTo: 'Not Delivered',
            deliveredBy: 'N/A',
            deliveryDate: 'N/A',
            receiverName: 'N/A',
            receiverContact: 'N/A'
        },
        {
            id: '#DON-008',
            foodItem: 'Wheat Flour',
            quantity: '50 kg',
            recipient: 'Women\'s Shelter',
            donatedDate: '2024-02-25',
            status: 'completed',
            message: 'Very helpful for our kitchen!',
            pickupAddress: '67 Community Hall, Mumbai',
            deliveredTo: 'Women\'s Shelter',
            deliveredBy: 'Food Delivery Partner',
            deliveryDate: '2024-02-26',
            receiverName: 'Kavita Singh',
            receiverContact: '+91 98765 11111'
        },
        {
            id: '#DON-009',
            foodItem: 'Vegetables',
            quantity: '35 kg',
            recipient: 'Night Shelter',
            donatedDate: '2024-02-20',
            status: 'delivered',
            message: 'Fresh vegetables received!',
            pickupAddress: '23 Market Road, Mumbai',
            deliveredTo: 'Night Shelter',
            deliveredBy: 'Self Pickup',
            deliveryDate: '2024-02-20',
            receiverName: 'Suresh Yadav',
            receiverContact: '+91 98765 22222'
        },
        {
            id: '#DON-010',
            foodItem: 'Cooked Food',
            quantity: '50 plates',
            recipient: 'Daily Wage Workers',
            donatedDate: '2024-02-15',
            status: 'completed',
            message: 'Warm food for workers!',
            pickupAddress: '101 Construction Site, Mumbai',
            deliveredTo: 'Site Office',
            deliveredBy: 'Self Pickup',
            deliveryDate: '2024-02-15',
            receiverName: 'Ramesh Gupta',
            receiverContact: '+91 98765 33333'
        }
    ];

    let currentPage = 1;
    const rowsPerPage = 5;
    let filteredData = [...donationsHistory];

    function getStatusBadge(status) {
        const badges = {
            'completed': '<span class="badge-status badge-completed"><i class="bi bi-check-circle-fill me-1"></i> Completed</span>',
            'delivered': '<span class="badge-status badge-delivered"><i class="bi bi-truck me-1"></i> Delivered</span>',
            'cancelled': '<span class="badge-status badge-cancelled"><i class="bi bi-x-circle-fill me-1"></i> Cancelled</span>',
            'expired': '<span class="badge-status badge-expired"><i class="bi bi-clock-fill me-1"></i> Expired</span>'
        };
        return badges[status] || badges['completed'];
    }

    function filterHistory() {
        const statusFilter = document.getElementById('statusFilter').value;
        const dateFrom = document.getElementById('dateFrom').value;
        const dateTo = document.getElementById('dateTo').value;
        const searchTerm = document.getElementById('searchInput').value.toLowerCase();

        filteredData = donationsHistory.filter(donation => {
            if (statusFilter !== 'all' && donation.status !== statusFilter) return false;
            if (dateFrom && donation.donatedDate < dateFrom) return false;
            if (dateTo && donation.donatedDate > dateTo) return false;
            if (searchTerm && !donation.foodItem.toLowerCase().includes(searchTerm) &&
                !donation.id.toLowerCase().includes(searchTerm)) return false;
            return true;
        });

        currentPage = 1;
        displayTable();
    }

    function displayTable() {
        const startIndex = (currentPage - 1) * rowsPerPage;
        const endIndex = startIndex + rowsPerPage;
        const pageData = filteredData.slice(startIndex, endIndex);

        const tbody = document.getElementById('historyTableBody');
        if (pageData.length === 0) {
            tbody.innerHTML = `
                <tr>
                    <td colspan="7" class="empty-state">
                        <i class="bi bi-inbox"></i>
                        <p>No donation history found</p>
                    </td>
                </tr>
            `;
        } else {
            tbody.innerHTML = pageData.map(donation => `
                <tr>
                    <td><strong>${donation.id}</strong></td>
                    <td>${donation.foodItem}</td>
                    <td>${donation.quantity}</td>
                    <td>${donation.recipient}</td>
                    <td>${donation.donatedDate}</td>
                    <td>${getStatusBadge(donation.status)}</td>
                    <td>
                        <div class="action-buttons">
                            <button class="btn-view" onclick="viewDetails('${donation.id}')">
                                <i class="bi bi-eye"></i> View
                            </button>
                            ${donation.status === 'completed' ? `<button class="btn-download" onclick="downloadReceipt('${donation.id}')">
                                <i class="bi bi-download"></i> Receipt
                            </button>` : ''}
                        </div>
                    </td>
                </tr>
            `).join('');
        }

        displayPagination();
    }

    function displayPagination() {
        const totalPages = Math.ceil(filteredData.length / rowsPerPage);
        const paginationDiv = document.getElementById('pagination');

        if (totalPages <= 1) {
            paginationDiv.innerHTML = '';
            return;
        }

        let paginationHtml = '';
        paginationHtml += `<button class="page-btn" onclick="changePage(${currentPage - 1})" ${currentPage === 1 ? 'disabled' : ''}>« Prev</button>`;

        for (let i = 1; i <= totalPages; i++) {
            if (i === 1 || i === totalPages || (i >= currentPage - 1 && i <= currentPage + 1)) {
                paginationHtml += `<button class="page-btn ${i === currentPage ? 'active' : ''}" onclick="changePage(${i})">${i}</button>`;
            } else if (i === currentPage - 2 || i === currentPage + 2) {
                paginationHtml += `<span class="page-btn disabled">...</span>`;
            }
        }

        paginationHtml += `<button class="page-btn" onclick="changePage(${currentPage + 1})" ${currentPage === totalPages ? 'disabled' : ''}>Next »</button>`;
        paginationDiv.innerHTML = paginationHtml;
    }

    function changePage(page) {
        const totalPages = Math.ceil(filteredData.length / rowsPerPage);
        if (page >= 1 && page <= totalPages) {
            currentPage = page;
            displayTable();
        }
    }

    function viewDetails(donationId) {
        const donation = donationsHistory.find(d => d.id === donationId);
        if (!donation) return;

        const modalBody = document.getElementById('modalBody');
        modalBody.innerHTML = `
            <div class="receipt-header">
                <i class="bi bi-receipt"></i>
                <h4>Donation Receipt</h4>
                <small>${donation.id}</small>
            </div>
            <div class="detail-row">
                <div class="detail-label">Food Item:</div>
                <div class="detail-value">${donation.foodItem}</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Quantity:</div>
                <div class="detail-value">${donation.quantity}</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Recipient:</div>
                <div class="detail-value">${donation.recipient}</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Donated Date:</div>
                <div class="detail-value">${donation.donatedDate}</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Status:</div>
                <div class="detail-value">${donation.status.toUpperCase()}</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Message:</div>
                <div class="detail-value">"${donation.message}"</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Pickup Address:</div>
                <div class="detail-value">${donation.pickupAddress}</div>
            </div>
            ${donation.status !== 'cancelled' && donation.status !== 'expired' ? `
                <div class="detail-row">
                    <div class="detail-label">Delivered To:</div>
                    <div class="detail-value">${donation.deliveredTo}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Delivered By:</div>
                    <div class="detail-value">${donation.deliveredBy}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Delivery Date:</div>
                    <div class="detail-value">${donation.deliveryDate}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Receiver Name:</div>
                    <div class="detail-value">${donation.receiverName}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Receiver Contact:</div>
                    <div class="detail-value">${donation.receiverContact}</div>
                </div>
            ` : ''}
            <hr>
            <div class="text-center">
                <button class="btn-close-modal" onclick="closeModal()">Close</button>
                ${donation.status === 'completed' ? `<button class="btn-download ms-2" onclick="downloadReceipt('${donation.id}');">Download Receipt</button>` : ''}
            </div>
        `;

        document.getElementById('detailModal').style.display = 'block';
    }

    function closeModal() {
        document.getElementById('detailModal').style.display = 'none';
    }

    function downloadReceipt(donationId) {
        const donation = donationsHistory.find(d => d.id === donationId);
        if (!donation) return;

        const receiptHTML = `
            <!DOCTYPE html>
            <html>
            <head>
                <title>Donation Receipt ${donation.id}</title>
                <style>
                    body { font-family: Arial, sans-serif; padding: 40px; }
                    .receipt { max-width: 600px; margin: 0 auto; border: 1px solid #ddd; padding: 30px; }
                    .header { text-align: center; border-bottom: 2px solid #16a34a; padding-bottom: 20px; margin-bottom: 20px; }
                    .logo { font-size: 24px; color: #16a34a; }
                    .details { margin: 20px 0; }
                    .row { margin: 10px 0; }
                    .label { font-weight: bold; display: inline-block; width: 150px; }
                    .footer { text-align: center; margin-top: 30px; padding-top: 20px; border-top: 1px solid #ddd; font-size: 12px; }
                </style>
            </head>
            <body>
                <div class="receipt">
                    <div class="header">
                        <div class="logo">🍽️ Sayog</div>
                        <h3>Donation Receipt</h3>
                        <p>${donation.id}</p>
                    </div>
                    <div class="details">
                        <div class="row"><span class="label">Food Item:</span> ${donation.foodItem}</div>
                        <div class="row"><span class="label">Quantity:</span> ${donation.quantity}</div>
                        <div class="row"><span class="label">Recipient:</span> ${donation.recipient}</div>
                        <div class="row"><span class="label">Donated Date:</span> ${donation.donatedDate}</div>
                        <div class="row"><span class="label">Status:</span> ${donation.status.toUpperCase()}</div>
                        <div class="row"><span class="label">Pickup Address:</span> ${donation.pickupAddress}</div>
                        ${donation.status !== 'cancelled' && donation.status !== 'expired' ? `
                            <div class="row"><span class="label">Delivered To:</span> ${donation.deliveredTo}</div>
                            <div class="row"><span class="label">Delivery Date:</span> ${donation.deliveryDate}</div>
                            <div class="row"><span class="label">Receiver Name:</span> ${donation.receiverName}</div>
                        ` : ''}
                    </div>
                    <div class="footer">
                        <p>Thank you for your generous donation!</p>
                        <p>Sayog - Making a difference together</p>
                    </div>
                </div>
            </body>
            </html>
        `;

        const blob = new Blob([receiptHTML], {
            type: 'text/html'
        });
        const link = document.createElement('a');
        const url = URL.createObjectURL(blob);
        link.href = url;
        link.download = `receipt_${donation.id}.html`;
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
        URL.revokeObjectURL(url);

        showToast('Receipt downloaded successfully!', 'success');
    }

    function showToast(message, type) {
        const toast = document.createElement('div');
        toast.className = `toast-notification toast-${type === 'success' ? 'success' : 'error'}`;
        toast.innerHTML = `<div class="d-flex align-items-center gap-2"><i class="bi bi-check-circle-fill"></i><span>${message}</span></div>`;
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 3000);
    }

    // Close modal when clicking outside
    window.onclick = function(event) {
        const modal = document.getElementById('detailModal');
        if (event.target === modal) {
            closeModal();
        }
    }

    // Initial display
    displayTable();
</script>

<?php include 'includes/footer.php'; ?>